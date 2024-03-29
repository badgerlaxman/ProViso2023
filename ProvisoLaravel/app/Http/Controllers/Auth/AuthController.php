<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Student;
use App\Models\User;
use App\Models\Classes;
use App\Models\Skill;
use App\Models\Company;
use App\Models\Minors;
use App\Models\MinorSelected;
use App\Models\Careers;
use App\Models\CareerSelected;
use App\Models\CareersAvailable;
use App\Models\Taken;
use App\Models\Selection;
use App\Models\Requires;
use App\Models\Prerequisite;
use Hash;

/**
 * Controller to manage all blade views and allow pages to interface with the database.
 */
class AuthController extends Controller {

    /**
     * Returns the index view.
     *
     * @return index view.
     */
    public function index() {
        return view('index');
    }

	/**
	 * Returns the login view.
	 *
	 * @return login view.
	 */
    public function login() {
        return view('auth.login');
    }

    /**
     * Returns the registration view.
     *
     * @return registration view.
     */
    public function registration() {

        return view('auth.registration');
    }

    /**
     * Checks if the information in the login form was correct.
     *
     * @return redirect to the dashboard if the information was correct, redirect to login with a message otherwise.
     */
    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

		// Check if the credentials can be authenticated
        $credentials = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('You have successfully logged in.');
        }

        return redirect("login")->withSuccess('You have entered invalid credentials.');
    }

    /**
     * Adds the given information to the users and students table when the registration form is completed.
     *
     * @return redirect to login with a success message.
     */
    public function postRegistration(Request $request) {
        $request->validate([
            'ID' => 'required|unique:students',
            'Password' => 'required',
            'email' => 'required|unique:users',
            'First' => 'required',
            'Last' => 'required',
            'Major' => 'required',
            'Year' => 'required'
        ]);

		// Update the database with the registered user's information
        $this->create($request);

        return redirect("login")->withSuccess('Great! You have successfully registered!');
    }

    /**
     * Sets all the necessary global variables for the dashboard blade and returns the view.
     *
     * @return dashboard view if the user is logged in, redirect to the login page otherwise.
     */
    public function dashboard() {
        if (Auth::guard('user')->check()) {
            $flag = false;
            $taken = Taken::select('*')->where('ID', Auth::guard('user')->user()->id)->get();
            $class = Classes::all();
            $aval = array();
            $skill = Skill::all()->all();
            $userid = Company::select('ID')->where('Name', $this->company_name())->first();
            $requires = array();
            if (!is_null($userid)) {
				if (!is_null(Selection::select('*')->where('CompanyID', $userid->ID)->first())) {
					$requires = Requires::select('*')->where('CompanyID', $userid->ID)->get();
				}
            }
            $company = Company::select('*')->where('Responsibilities', '<>', 'Custom skills.')->orWhere('Name', $this->company_name())->get();
            $selection = Selection::select('*')->where('ID', Auth::guard('user')->user()->id);
            foreach ($class as $c) {
                foreach ($taken as $t) {
                    if ($t["Class"] == $c["Class"]) {
                        $flag = true;
						break;
                    }
                }
				
                if (!$flag) {
                    array_push($aval, $c);
                }
                $flag = false;
            }
			
            // If a company has been selected i.e. selection is not null for their id, update dropdown menu of company to not have any values
            $compID = Selection::select('*')->where('ID', Auth::guard('user')->user()->id)->first();
            $comp = null;
            if (!is_null($compID)) {
                $comp = Company::select('Name', 'Responsibilities')->where('ID', $compID->CompanyID)->first();
                $company = Company::select('Name')->where('ID', $compID->CompanyID)->get();
            }

            // selecting a minor for the first time
            $minor = Minors::all();
            $minorselected = MinorSelected::select('*')->where('ID', Auth::guard('user')->user()->id);

            // If a minor has already been selected i.e. selection is not null for their id, update dropdown menu of minor to not have any values
            $minID = MinorSelected::select('*')->where('ID', Auth::guard('user')->user()->id)->first();
            $min = null;
            if (!is_null($minID)) {
                $min = Minors::select('Minor', 'Description')->where('ID', $minID->MinorID)->first();
                $minor = Minors::select('Minor')->where('ID', $minID->MinorID)->get();
            }

            // selecting a career for the first time
            $career = Careers::all();
            $careerselected = CareerSelected::select('*')->where('ID', Auth::guard('user')->user()->id);

            // If a career has already been selected i.e. carID is not null for their id, update dropdown menu of minor to not have any values
            $carID = CareerSelected::select('*')->where('ID', Auth::guard('user')->user()->id)->first();
            $car = null;
            $minorrecommend = null;
            if (!is_null($carID)) {
                $car = Careers::select('Title', 'Description')->where('ID', $carID->CareerID)->first();
                $career = Careers::select('Title')->where('ID', $carID->CareerID)->get();
                // get minor that is recommended for the career
                $minorrecommendID = Careers::select('MinorIDRecommend')->where('ID', $carID->CareerID)->first();
                $minorrecommend = Minors::select('Minor')->where('ID', $minorrecommendID->MinorIDRecommend)->first();
            }
			
			// If the custom company has been created, and the user has selected it, then update the skills drop down to remove duplicates
			$custom = Company::select('ID')->where('Name', $this->company_name())->first();
			if (!is_null($custom)) {
				$skill = array();
				$flag = false;
				
				foreach (Skill::all() as $s) {
					foreach (Requires::select('*')->where('CompanyID', $custom->ID)->get() as $r) {
						if ($s->ID == $r->SkillID) {
							$flag = true;
							break;
						}
					}
					
					if (!$flag) {
						array_push($skill, $s);
					}
					$flag = false;
				}
			}

            // if a career is selected, update dropdown menu to all the companies that are hiring that career. 
            // careersavailID = ID of the career selected on the dashboard
            $careersavailID = CareerSelected::select('*')->where('ID', Auth::guard('user')->user()->id)->first();
            // careersavail = (empty) variable for all the company IDs that are hiring the selected career 
            $careersavail = null;
            // careersavailable = (empty) array of companies that are hiring the selected career
            $careersavailable = array();
            // $compsavail = (empty) variable to store the Name and Resonsibilities of the company
            $compsavail = null;
            // if there is a career selected on the dashboard, then careersavailID will not be null
            if (!is_null($careersavailID)) {
                // careersavail = all the company IDs that are hiring the selected career 
                $careersavail = CareersAvailable::select('CompanyID')->where('CareerID', $careersavailID->CareerID)->get();
                // for each company ID, retrieve the Name and Responsibilities from that company and store in $careersavailable array
                foreach($careersavail as $c)
                {
                    // retrieve the Name and Responsibilities associated with the company ID
                    $compsavail = Company::select('*')->where('ID', $c->CompanyID)->first();
                    // add the $compsavail data to the array
                    array_push($careersavailable, $compsavail);
                }
            }

            return view(view: 'dashboard', data: ['taken' => $taken, 'company' => $company, 'aval' => $aval, 'skill' => $skill, 'selection' => $selection, 'comp' => $comp, 'skills' => $requires, 'min' => $min, 'minor' => $minor, 'car' => $car, 'career' => $career, 'careersavail' => $careersavail, 'careersavailable' => $careersavailable, 'minorrecommend' => $minorrecommend]);
        }

        return redirect("login")->withSuccess('Please log in to access your dashboard.');
    }
	
	/**
	 * Removes the selected class from the taken table for this user.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function postDashboard(Request $result) {
        $class = $result->input('KeyToDelete');
        $userid = Auth::guard('user')->user()->id;
        // Find the row for this user and matching class to delete
        Taken::where('ID', $userid)->where('Class', $class)->delete();

        return redirect("dashboard")->withSuccess('Successfully removed ' . $class . ' from your list of taken classes.');
    }

    /**
     * Add the user's information to the users and students tables when they register.
     */
    public function create(Request $data) {
		Student::create([
			'ID' => $data['ID'],
			'Password' => Hash::make($data['Password']),
			'First' => $data['First'],
			'Last' => $data['Last'],
			'Major' => $data['Major'],
			'Year' => $data['Year']
        ]);

        User::create([
			'name' => $data['First'] . " " . $data['Last'],
			'id' => $data['ID'],
			'email' => $data['email'],
			'password' => Hash::make($data['Password'])
        ]);
    }

    /**
     * Verifies that the grade was sufficient for credit, and adds the chosen class to the taken table.
     *
     * @return redirect to the dashboard with a message explaining any issues
     */
    public function addClass(Request $request) {
		// Find all classes that need a C or better
		foreach (Prerequisite::where('Requirement', 'C or better')->get() as $p) {
			if ($p->Prereq == $request->Class && ($request->Grade == 'D' || $request->Grade == 'F')) {
				// If the chosen class doesn't have a good enough grade, return without adding to the table
				return redirect('dashboard')->withSuccess('You needed to have a C or better in ' . $request->Class . ' to get credit.');
			}
		}

        // Check that they have selected from each drop down
		$request->validate([
            'Class' => 'required',
            'Grade' => 'required',
            'Year' => 'required'
        ]);

		// Add the entry to the Taken table
        $this->createClass($request);

        return redirect('dashboard')->withSuccess('Great! You have successfully added ' . $request->Class . '!');
    }
	
    /**
	 * Adds the class to the taken table using Eloquent syntax.
	 */
    public function createClass(Request $data) {		
        Taken::create([
            'ID' => Auth::guard('user')->user()->id,
            'Class' => $data['Class'],
            'Grade' => $data['Grade'],
            'Year' => $data['Year']
        ]);
    }
    
	/**
	 * Adds the given company to the selections table.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function addCompany(Request $request) {

        $request->validate([
            'CompanyID'=>'required',
        ]);

        //check that they have selected from each drop down
        $this->createSelection($request);

        return redirect('dashboard')->withSuccess('Great! You have successfully selected a company!');
    }
	
    /**
	 * Adds the class to the selection table using Eloquent syntax.
	 */
    public function createSelection(Request $data) {
        Selection::create([
            'ID' => Auth::guard('user')->user()->id,
            'CompanyID' => $data['CompanyID']
        ]);
    }
    
    /**
	 * Deletes an entry with the same CompanyID from the selections table.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function postCompany(Request $result){
        $comp = $result->input('KeyToDelete');
        $userid = Auth::guard('user')->user()->id;
        // Where the ID and the current user match
        Selection::where('ID', $userid)->delete();

        return redirect('dashboard')->withSuccess('Cleared selected company.');
    }

    /**
	 * Adds the given minor to the selections table.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function addMinor(Request $request) {

        $request->validate([
            'MinorID'=>'required',
        ]);

        //check that they have selected from each drop down
        $this->createMinor($request);

        return redirect('dashboard')->withSuccess('Great! You have successfully selected a Minor!');
    }
	
    /**
	 * Adds the minor to the selection table using Eloquent syntax.
	 */
    public function createMinor(Request $data) {
        MinorSelected::create([
            'ID' => Auth::guard('user')->user()->id,
            'MinorID' => $data['MinorID']
        ]);
    }
    
    /**
	 * Deletes an entry with the same MinorID from the selections table.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function postMinor(Request $result){
        $min = $result->input('KeyToDelete');
        $userid = Auth::guard('user')->user()->id;
        // Where the ID and the current user match
        MinorSelected::where('ID', $userid)->delete();

        return redirect('dashboard')->withSuccess('Cleared selected minor.');
    }

    /**
	 * Adds the given career to the careerselected table.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function addCareer(Request $request) {

        $request->validate([
            'CareerID'=>'required',
        ]);

        //check that they have selected from each drop down
        $this->createCareer($request);

        return redirect('dashboard')->withSuccess('Great! You have successfully selected a Career!');
    }
	
    /**
	 * Adds the career to the careerselected table using Eloquent syntax.
	 */
    public function createCareer(Request $data) {
        CareerSelected::create([
            'ID' => Auth::guard('user')->user()->id,
            'CareerID' => $data['CareerID']
        ]);
    }
    
    /**
	 * Deletes an entry with the same CareerID from the careerselected table.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function postCareer(Request $result){
        $car = $result->input('KeyToDelete');
        $userid = Auth::guard('user')->user()->id;
        // Where the ID and the current user match
        CareerSelected::where('ID', $userid)->delete();

        return redirect('dashboard')->withSuccess('Cleared selected career.');
    }
    
    /**
	 * Add a custom company for the current user so they can add skills individually.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function addSkill(Request $request) {

        // Update the database with the new skill and company and selection if needed
        $this->createSkill($request);

        return redirect('dashboard')->withSuccess('Skill successfully selected.');
    }
	
    /**
	 * Adds the chosen skill to the custom company for this user, creating and selecting it if necessary.
	 */
    public function createSkill(Request $data) {
		// Don't do anything if the empty option in the dropdown was selected
		if (is_null($data->skills)) {
			return;
		}
		
		// Create the custom company if it doesn't exist for this user
		$comp = Company::select('ID')->where('Name', $this->company_name())->first();
        if (is_null($comp)) {
            Company::create([
                'Name' => $this->company_name(),
				'Responsibilities' => 'Custom skills.'
            ]);
			
			$comp = Company::select('ID')->where('Name', $this->company_name())->first();
		}
		
		// Add the custom company to the selection table if it isn't selected yet
		if (is_null(Selection::select('*')->where('CompanyID', $comp->ID)->first())) {
			// Delete the old selection
			Selection::where('ID', Auth::guard('user')->user()->id)->delete();
			// Add the custom company for this user
			Selection::create([
				'ID' => Auth::guard('user')->user()->id,
                'CompanyID' => $comp->ID
			]);
        }
        
		// Add the skill for the custom company
        Requires::create([
            'CompanyID' => $comp->ID,
            'SkillID' => $data->skills,
            'Priority' => 0
        ]);
    }
    
	/**
	 * Removes the skill with the given ID from the requires table for the user's custom company.
	 *
	 * @return redirect to the dashboard with a success message.
	 */
    public function postSkill(Request $result){
        $skill = $result->input('KeyToDelete');
        $userid = Company::select('ID')->where('Name', $this->company_name())->first()->ID;
        // Select where the CompanyID matches the custom company and the skill that they input matches the skill's ID
        Requires::where('CompanyID', $userid)->where('SkillID', $skill)->delete();

        return redirect("dashboard")->withSuccess('Skill deselected.');
    }
	
	/**
	 * Adds the provided company to the database with the attached required skills.
	 *
	 * @return dashboard view.
	 */
	public function postNewCompany(Request $request){		
		$name = $request->input('Company');
		$desc = $request->input('Description');
		
		# If the user is not an admin, add their info to the suggestions table
		if (Auth::guard('user')->user()->id != 360) {
			return redirect('dashboard')->withSuccess('Successfully added ' . $name . ' to the suggestions table.');
		}
		
		// Check if the company is already in the database
		$comp = Company::where('Name', $name)->first();
		if (!is_null($comp)) {
			return redirect('dashboard')->withSuccess('This company is already in the database.');
		}
		
		// Add the new company, with an empty responsibilities column if none was provided
		Company::create([
			'Name' => $name,
			'Responsibilities' => is_null($desc) ? '' : $desc
		]);
		
		$newID = Company::select('ID')->where('Name', $name)->first()->ID;
		
		// Add the skills for this company to the requires table
		$skillIDs = Requires::select('SkillID')->where('CompanyID', Company::select('ID')->where('Name', $this->company_name())->first()->ID)->get();
		foreach ($skillIDs as $ID) {
			Requires::create([
				'CompanyID' => $newID,
				'SkillID' => $ID->SkillID,
				'Priority' => 1
			]);
		}
		
		return redirect('dashboard')->withSuccess('Successfully added ' . $name . ' to the company database.');
	}
	
	/**
	 * Returns the page with the form to add a new company to the database.
	 *
	 * @return new_company view or dashboard redirect if no skills have been selected.
	 */
	public function newCompany(){
		// If the custom company has been created, get all of the skills it requires
		$custom = Company::select('ID')->where('Name', $this->company_name())->first();
		if (!is_null($custom)) {
			$skillIDs = Requires::select('SkillID')->where('CompanyID', $custom->ID)->get();
			$skills = Skill::whereIn('ID', $skillIDs)->get();
			
			return view(view: 'new_company', data: ['skills' => $skills]);
		}
		else {
			return redirect('dashboard')->withSuccess('You have not selected any specific skills!');
		}
	}
    
	/**
	 * Returns the profile view.
	 *
	 * @return profile view.
	 */
    public function profile(){
        $userid = Auth::guard('user')->user()->id;
        $info = Student::select('Major', 'Year')->where('ID', $userid)->first();
        return view(view: 'profile', data: ['info' => $info]);
    }
    
    /**
	 * Returns the profile view.
	 *
	 * @return profile view.
	 */
    public function postProfile(Request $request){
        $year = Student::select('Year')->where('ID', Auth::guard('user')->user()->id)->first()->Year;
        $major = Student::select('Major')->where('ID', Auth::guard('user')->user()->id)->first()->Major;
        Student::where('ID', Auth::guard('user')->user()->id)->update([
           'Year' => is_null($request->input('Year')) ? $year : $request->input('Year'),
           'Major' => is_null($request->input('Major')) ? $major : $request->input('Major')
        ]);
        return redirect('profile')->withSuccess("Profile updated successfully");
    }

	/**
	 * Removes the session cookies and resets Auth.
	 *
	 * @return redirect to the index page.
	 */
    public function logout() {
        Session::flush();
        Auth::logout();

        return redirect('index');
    }

	/**
	 * Getter method for the name to use when creating and querying the user's custom company.
	 *
	 * @return string name of the the custom company for this user.
	 */
	private function company_name() {
		return Auth::guard('user')->user()->name . '\'s custom selection';
	}

    /**
	 * Getter method for the name to use when creating and querying the user's minor.
	 *
	 * @return string name of the the minor for this user.
	 */
	private function minor_name() {
		return Auth::guard('user')->user()->name . '\'s custom selection';
	}

    // return minor information
    public function get_minor(){
        $minor = Minors::select('Minor')->first();
        return minor;
    }
}
