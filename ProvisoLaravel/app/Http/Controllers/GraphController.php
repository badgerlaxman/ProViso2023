<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
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
use App\Models\CareerRequires;
use App\Models\CareerSelected;
use App\Models\CareersAvailable;
use App\Models\Taken;
use App\Models\Teaches;
use App\Models\Selection;
use App\Models\Requires;
use App\Models\Prerequisite;
use Hash;
use Graphp\Graph\Graph;
use Graphp\GraphViz\GraphViz;

//require_once __DIR__ . '\..\..\..\bootstrap\app.php';

//require_once '/Applications/XAMPP/htdocs/CS360/ProViso/ProViso2023/ProvisoLaravel/bootstrap/app.php'; // bootstrap info


/**
 * Controller to manage all blade views and allow pages to interface with the database.
 */
class GraphController extends BaseController {

    public function index() {
        return view('index');
    }

    public function dbconnector() {
        /*$host = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "provisoadvising";

        // Create a new MySQLi object and establish a connection
        $con = new mysqli($host, $username, $password, $database);

        // Check if the connection was successful
        if ($con->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }*/

        // Access Laravel configuration
        $dbConnection = config('database.default'); // 'mysql'
        $dbHost = config('database.connections.' . $dbConnection . '.host');
        $dbPort = config('database.connections.' . $dbConnection . '.port');
        $dbDatabase = config('database.connections.' . $dbConnection . '.database');
        $dbUsername = config('database.connections.' . $dbConnection . '.username');
        $dbPassword = config('database.connections.' . $dbConnection . '.password');

        // Establish database connection
        $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase, $dbPort);
        // Check for connection errors
        if ($conn->connect_errno) {
            die("Failed to connect to MySQL: " . $mysqli->connect_error);
        }

        // Return the database connection or any other desired output
        return $conn;

    }

    public function basic_graph()
    {
        // create a new graph object
        $graph = new Graph();
        // Set graph attributes
        $graph->setAttribute('graphviz.graph.size', '5,5'); // Set width and height to 5 inches

        // Set node attributes
        $graph->setAttribute('graphviz.node.size', '1,1'); // Set width and height of nodes to 1 inch

        $graphviz = new GraphViz();
        $graphviz->setFormat('png');

        // create some vertices
        $vertex1 = $graph->createVertex(array('name' => 'A'));
        $vertex2 = $graph->createVertex(array('name' => 'B'));
        $vertex3 = $graph->createVertex(array('name' => 'C'));

        // create some edges
        $graph->createEdgeDirected($vertex1, $vertex2);
        $graph->createEdgeDirected($vertex2, $vertex3);
        $graph->createEdgeDirected($vertex3, $vertex1);

        $graphviz->createScript($graph);

        $dotContent = $graphviz->createScript($graph);
    }

    public function get_taken($year){

    }

    public function get_skills(){

    }

    public function print_classes(){
        $graph = new Graph();
        $graphviz = new GraphViz();
        $graphviz->setFormat('png');

        $graph->setAttribute('graphviz.graph.bgcolor', 'transparent');
        $graph->setAttribute('graphviz.graph.rankdir', 'LR');
        $graph->setAttribute('graphviz.graph.pad', '1');
        $graph->setAttribute('graphviz.graph.compound', 'true');
        $graph->setAttribute('graphviz.graph.forcelabels', 'true');
        $graph->setAttribute('graphviz.node.shape', 'square');
        $graph->setAttribute('graphviz.node.style', 'rounded,filled');
        $graph->setAttribute('graphviz.node.width', '2');
        $graph->setAttribute('graphviz.node.fixedsize', 'shape');
        $graph->setAttribute('graphviz.edge.minlen', '2');

        $vertex1 = $graph->createVertex(array('name' => 'A'));
        $vertex2 = $graph->createVertex(array('name' => 'B'));
        $vertex3 = $graph->createVertex(array('name' => 'C'));

        // create some edges
        $graph->createEdgeDirected($vertex1, $vertex2);
        $graph->createEdgeDirected($vertex2, $vertex3);
        $graph->createEdgeDirected($vertex3, $vertex1);

    }

    public function print_recommendations(){

    }

    public function print_skills(){

    }
    
    public function print_all_skills(){

    }
    
    public function print_classes_and_skills(){
        $graph = new Graph();
        $graphviz = new GraphViz();
        $graphviz->setFormat('png');

        // Set attributes for the GraphViz object
        $graph->setAttribute('graphviz.graph.bgcolor', 'transparent');
        $graph->setAttribute('graphviz.graph.rankdir', 'BT'); // BT - bottom to top
        $graph->setAttribute('graphviz.graph.pad', '1');
        $graph->setAttribute('graphviz.graph.compound', 'true');
        $graph->setAttribute('graphviz.graph.forcelabels', 'true');
        $graph->setAttribute('graphviz.node.shape', 'square');
        $graph->setAttribute('graphviz.node.style', 'rounded,filled');
        $graph->setAttribute('graphviz.node.width', '2');
        $graph->setAttribute('graphviz.node.fixedsize', 'shape');
        $graph->setAttribute('graphviz.edge.minlen', '2');
        $graph->setAttribute('graphviz.graph.fontname', 'Comic Sans MS');

        // retrieve the careerID for the career selected
        $careerselected = CareerSelected::select('CareerID')->where('ID', Auth::guard('user')->user()->id)->first();
        $careerName = Careers::select('Title')->where('ID', $careerselected->CareerID)->get();
        $companyselected = Selection::select('CompanyID')->where('ID', Auth::guard('user')->user()->id)->first();
        $companyName = Company::select('Name')->where('ID', $companyselected->CompanyID)->get();

        // retrieve the skillIDs for the career (or company?)
        $skillsrequired = CareerRequires::select('SkillID')->where('CareerID', $careerselected->CareerID)->get();

        // join career and company name
        $careerName = $careerName[0]['Title'];
        $companyName = $companyName[0]['Name'];
        $rootName = $companyName . " " . $careerName;

        // create root node (career)
        $careerNode = $graph->createVertex();
        $careerNode->setAttribute('id', $rootName);
        $careerNode->setAttribute('graphviz.color', '#FFCC66');

        // create skills nodes and edges from skills nodes to career node
        foreach($skillsrequired as $skill)
        {
            // retrieve skill name using skillID
            $skillName = Skill::select('Name')->where('ID', $skill->SkillID)->first();
            
            // make skill node
            $skillNode = $graph->createVertex();
            $skillNode->setAttribute('id', $skillName->Name);
            $skillNode->setAttribute('graphviz.color', '#FFFF99');

            // make direted edge from skill node to career node
            $careerskilledge = $graph->createEdgeDirected($skillNode, $careerNode);

            // retrieve the classes for each skill in the skills required table for the career
            $classesperskill = Teaches::select('Class')->where('SkillID', $skill->SkillID)->get();            

            // create classes nodes and edges from classes nodes to skills nodes
            foreach($classesperskill as $class)
            {
                $className = Classes::select('Title')->where('Class', $class->Class)->first();
                $classNode = $graph->createVertex();
                $classNodeID = $class->Class . " " . $className->Title;
                $classNode->setAttribute('id', $classNodeID);
                $classNode->setAttribute('graphviz.color', '#FFFFCC');
            
                // make directed edge from class node to skill node
                $skillclassedge = $graph->createEdgeDirected($classNode, $skillNode);
            }
        }

        $dotContent = $graphviz->createScript($graph);

        // Save DOT file to a local file
        $dotFile = '/Users/nyahnelson/Desktop/careergraph.dot'; // specify the file path
        //$dotFile = 'dotfiles/careergraph.dot';
        file_put_contents($dotFile, $dotContent);

        $imageFile = 'images/careergraph.png'; // specify the file path for the image file
        exec("dot -Tpng {$dotFile} -o {$imageFile}");

        return response()->json(['imagePath' => 'images/careergraph.png']);
    }

    public function print_classes_and_skills_legend(){

    }

    public function create_class_graph($user){

    }

    public function create_skill_graph($user){

    }

    public function update_student($user){

    }

    // initialize ID and student
    /*id = '2';
    con.execute(q.get_student_query(id));
    studen = con.fetchall()[0];*/


}

