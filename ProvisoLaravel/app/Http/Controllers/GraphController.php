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

        
        //set graph node style
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

        //Classes/Taken
      
        $prereq = Prerequisite::select('Prereq')->get();
        $taken = Taken::select('Class')->where('ID', Auth::guard('user')->user()->id)->get();       
        //Company/Career
        $careerSelected = CareerSelected::select('CareerID')->where('ID', Auth::guard('user')->user()->id)->first();
        $careerName = Careers::select('Title')->where('ID', $careerSelected->CareerID)->get();
        $companySelected = Selection::select('CompanyID')->where('ID', Auth::guard('user')->user()->id)->first();
        $companyName = Company::select('Name')->where('ID', $companySelected->CompanyID)->get();

        //Skills
        $skillsRequired = Requires::select('SkillID')->where('CompanyID', $companySelected->CompanyID)->get();
        $skillsClasses = Teaches::select('Class')->whereIn('SkillID', $skillsRequired)->get();

        //classes that have not been taken yet
        $classesRemainingAll = Classes::select('Class')->whereNotIn('Class',$taken)->get();
        $classesRemainingMajor = Classes::select('Class','Year','Semester','ID')
            ->whereNotIn('Class',$taken)
            ->orderBy('Year','asc')//changed year to id
            ->where('ID', '<', '10000')->get();
        //added for collection of class only
         $classesRemainingMajor_Class = Classes::select('Class')
            ->whereNotIn('Class',$taken)
            ->orderBy('Year','asc')//changed year to id
            ->where('ID', '<', '10000')->get();

        //added for collection of class only
        $prereqByYear_Class = Classes::select('Class')
        ->whereIn('Class',$prereq)
        ->whereNotIn('Class', $taken)
        ->orderby('Year','asc')
        ->get();
        $prereqByYear = Classes::select('Class','Year')
        ->whereIn('Class',$prereq)
        ->whereNotIn('Class', $taken)
        ->orderby('Year','asc')
        ->get();
        
        //get minor information
        $minorSelectedID = MinorSelected::select('MinorID')->where('ID', Auth::guard('user')->user()->id)->first();
        $minorSelectedName = Minors::select('Minor','Subject')->where('ID',$minorSelectedID->MinorID)->first();
        $minorClasses = Classes::select('Class')
            ->where('ID','>=',10000)
            ->where('Subject',$minorSelectedName->Subject)->get();
        $minorNotNeeded = Classes::select('Class')->whereNotIn('Class', $minorClasses)
            ->where('ID', '>=', 20000)->get();

        $electiveClasses = Classes::select('Class')
            ->where('ID','>=',10000)
            ->where('ID','<',20000)
            ->whereNotIn('Class',$taken)
            ->get();

            //recommended classes
            //remaining classes after prereq
        $recommendedClasses = Classes::select('Class','Year','Semester')
            ->whereNotIn('Class',$prereqByYear_Class)
            ->whereIn('Class',$classesRemainingMajor_Class)
            ->orderBy('Year')//changed year to id
            ->get();

        // iterater for years
        $i = [1,2,3,4];

        //how many classes a semester, maybe credits
        $classLimit = 8; // Max of 5 classes allowed per semester as of now
        $class_count_iter = 0; //track classes added to semester
        $currYear = 1;
        $graph->setAttribute('graphviz.graph.rankdir', 'TB'); // TB - top down; LR - left right          
        $classTempReq = NULL;
       

    //iterate through all years and set year/semester nodes 
        foreach ($i as $b){   

            switch($b){
                //year 1 
                case('1'):
                    $vertexHead = $graph->createVertex();
                    $vertexHead->setAttribute('id', 'Year 1');
                    $vertexHead->setAttribute('graphviz.color', 'orange');
                    $vertexFall1 = $graph->createVertex();
                    $vertexFall1->setAttribute('id', 'Fall-1');
                    $vertexFall1->setAttribute('graphviz.color', '#FFCC66');

                    $vertexSpring1 = $graph->createVertex();
                    $vertexSpring1->setAttribute('id', 'Spring-1'); 
                    $vertexSpring1->setAttribute('graphviz.color', '#FFCC66');
                    $graph->createEdgeDirected($vertexHead, $vertexFall1);
                    $graph->createEdgeDirected($vertexHead, $vertexSpring1);
                    $lastHead = $vertexHead;

                    break;
                //year 2

                case('2'):

                    $vertexHead = $graph->createVertex();
                    $vertexHead->setAttribute('id', 'Year 2');
                    $vertexHead->setAttribute('graphviz.color', 'orange');
                    $graph->createEdgeDirected($lastHead, $vertexHead);
                    $vertexFall2 = $graph->createVertex();
                    $vertexFall2->setAttribute('id', 'Fall-2');
                    $vertexFall2->setAttribute('graphviz.color', '#FFCC66');
                    $vertexSpring2 = $graph->createVertex();
                    $vertexSpring2->setAttribute('id', 'Spring-2');
                    $vertexSpring2->setAttribute('graphviz.color', '#FFCC66');
                    $graph->createEdgeDirected($vertexHead, $vertexFall2);
                    $graph->createEdgeDirected($vertexHead, $vertexSpring2);
                    $lastHead = $vertexHead;

                    break;
                //year 3 

                case('3'):
                    $vertexHead = $graph->createVertex();
                    $vertexHead->setAttribute('id', 'Year 3');
                    $vertexHead->setAttribute('graphviz.color', 'orange');
                    $graph->createEdgeDirected($lastHead, $vertexHead);
                    $vertexFall3 = $graph->createVertex();
                    $vertexFall3->setAttribute('id', 'Fall-3');
                    $vertexFall3->setAttribute('graphviz.color', '#FFCC66');

                    $vertexSpring3 = $graph->createVertex();
                    $vertexSpring3->setAttribute('id', 'Spring-3');
                    $vertexSpring3->setAttribute('graphviz.color', '#FFCC66');
                    $graph->createEdgeDirected($vertexHead, $vertexFall3);
                    $graph->createEdgeDirected($vertexHead, $vertexSpring3);
                    $lastHead = $vertexHead;

                    break;
                //year 4 

                case('4'):
                    $vertexHead = $graph->createVertex();
                    $vertexHead->setAttribute('id', 'Year 4');
                    $vertexHead->setAttribute('graphviz.color', 'orange');
                    $graph->createEdgeDirected($lastHead, $vertexHead);

                    $vertexFall4 = $graph->createVertex();
                    $vertexFall4->setAttribute('id', 'Fall-4');
                    $vertexFall4->setAttribute('graphviz.color', '#FFCC66');
                    $vertexSpring4 = $graph->createVertex();
                    $vertexSpring4->setAttribute('id', 'Spring-4');
                    $vertexSpring4->setAttribute('graphviz.color', '#FFCC66');
                    $graph->createEdgeDirected($vertexHead, $vertexFall4);
                    $graph->createEdgeDirected($vertexHead, $vertexSpring4);
                    $lastHead = $vertexHead;

                    break;      
                //electives/minors
                //currently not added because foreach iterates through classesRequiredMajor and not recommendedClasses 
                         
            }
        }

        
        //add classes to graph
        foreach($prereqByYear as $recommended){
            //set graph node of class
            $vertex1 = $graph->createVertex();
            $vertex1->setAttribute('id', $recommended->Class);
            //$vertex1->setAttribute('graphviz.color', 'white');

            if($currYear == 1 ){
                    
                   if($class_count_iter == 0 ){
                        //add first class to fall
                    
                        $edge = $graph->createEdgeDirected($vertexFall1,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;

                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){
                        //add first class to spring
                    
                       $edge = $graph->createEdgeDirected($vertexSpring1,$vertex1);
                       $edge->setAttribute('graphviz.color', 'white');
                       $lastVertex = $vertex1;

                        $class_count_iter += 1;
                   }
                    elseif($class_count_iter < $classLimit){
                        //add rest of classes to fall or spring
                     
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                    
                        //added to keep last vertex of fall semester
                        if($class_count_iter == ($classLimit/2)-1){

                            $vertexFall1 = $vertex1;
                        }//keep last vertex of spring1 
                        elseif($class_count_iter == $classLimit-1){
                            
                            $vertexSpring1 = $vertex1;
                        }

                        $class_count_iter += 1;
                      
                    }else{
                        
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                       
                        $vertexElective = $graph->createVertex();
                        $vertexElective->setAttribute('id', 'Elective/Minor');
                        $vertexElective->setAttribute('graphviz.color', '#40c9ff');
                        $edge = $graph->createEdgeDirected($vertexFall1,$vertexElective);
                        $edge->setAttribute('graphviz.color', 'green');
  
                        $currYear = 2;
                        $class_count_iter = 0;
                    }
                //Year 2
                }
                
                elseif( $currYear == 2){
                   if($class_count_iter == 0){
                       
                        $edge = $graph->createEdgeDirected($vertexFall2,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

                        $edge = $graph->createEdgeDirected($vertexSpring2,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                 
                            $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                            $edge->setAttribute('graphviz.color', 'white');
                            $lastVertex = $vertex1;
                               //added to keep last vertex of fall semester
                        if($class_count_iter == ($classLimit/2)-1){

                            $vertexFall2 = $vertex1;
                        }//keep last vertex of spring1 
                        elseif($class_count_iter == $classLimit-1){
                            
                            $vertexSpring2 = $vertex1;
                        }
                        $class_count_iter += 1;
                    }else{
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $currYear = 3;
                        $class_count_iter = 0;
                    }
                //Year 3
                }elseif($currYear == 3){
                   if($class_count_iter == 0){
                 
                        $edge = $graph->createEdgeDirected($vertexFall3,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

               
                        $edge = $graph->createEdgeDirected($vertexSpring3,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                 
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
    
                        $lastVertex = $vertex1; 
                           //added to keep last vertex of fall semester
                           if($class_count_iter == ($classLimit/2)-1){

                            $vertexFall3 = $vertex1;
                        }//keep last vertex of spring1 
                        elseif($class_count_iter == $classLimit-1){
                            
                            $vertexSpring3 = $vertex1;
                        }
                        $class_count_iter += 1;

                    }else{
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $currYear = 4;
                        $class_count_iter = 0;
                    }
                //Year 4& 
                }elseif($currYear == 4 ){
                   if($class_count_iter == 0){
                     
                        $edge = $graph->createEdgeDirected($vertexFall4,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

                   
                        $edge = $graph->createEdgeDirected($vertexSpring4,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                  
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
    
                        $lastVertex = $vertex1;
                           //added to keep last vertex of fall semester
                           if($class_count_iter == ($classLimit/2)-1){

                            $vertexFall4 = $vertex1;
                        }//keep last vertex of spring 
                        elseif($class_count_iter == $classLimit-1){
                            
                            $vertexSpring4 = $vertex1;
                        } 
                        $class_count_iter += 1;
                    }else{
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $currYear = 5;
                        $class_count_iter = 0;
                    }
                }
                else{
                    $vertex1->setAttribute('graphviz.color', '#45CAF');
                    $vertex1->setAttribute('graphviz.color', 'green');

                }
   

        }

        //Add remaining classes to schedule after prereqs are sorted and added
        //code in for loop same as above loop
        foreach($recommendedClasses as $recommended){
            //set graph node of class
            $vertex1 = $graph->createVertex();
            $vertex1->setAttribute('id', $recommended->Class);
          //  $vertex1->setAttribute('graphviz.color', 'white');

            if($currYear == 1){
                    
                   if($class_count_iter == 0 ){
                        //add first class to fall
                    
                        $edge = $graph->createEdgeDirected($vertexFall1,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;

                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){
                        //add first class to spring
                    
                       $edge = $graph->createEdgeDirected($vertexSpring1,$vertex1);
                       $edge->setAttribute('graphviz.color', 'white');
                       $lastVertex = $vertex1;

                        $class_count_iter += 1;
                   }
                    elseif($class_count_iter < $classLimit){
                        //add rest of classes to fall or spring
                     
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                    
                        //added to keep last vertex of fall semester
                        if($class_count_iter == ($classLimit/2)-1){

                            $vertexFall1 = $vertex1;
                        }//keep last vertex of spring1 
                        elseif($class_count_iter == $classLimit-1){
                            
                            $vertexSpring1 = $vertex1;
                        }

                        $class_count_iter += 1;
                      
                    }else{
                        
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                       
                        $vertexElective = $graph->createVertex();
                        $vertexElective->setAttribute('id', 'Elective/Minor');
                        $vertexElective->setAttribute('graphviz.color', '#40c9ff');
                        $edge = $graph->createEdgeDirected($vertexFall1,$vertexElective);
                        $edge->setAttribute('graphviz.color', 'green');
  
                        $currYear = 2;
                        $class_count_iter = 0;
                    }
                //Year 2
                }
                
                elseif( $currYear == 2){
                   if($class_count_iter == 0){
                       
                        $edge = $graph->createEdgeDirected($vertexFall2,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

                        $edge = $graph->createEdgeDirected($vertexSpring2,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                 
                            $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                            $edge->setAttribute('graphviz.color', 'white');
                            $lastVertex = $vertex1;
                               //added to keep last vertex of fall semester
                        if($class_count_iter == ($classLimit/2)-1){

                            $vertexFall2 = $vertex1;
                        }//keep last vertex of spring1 
                        elseif($class_count_iter == $classLimit-1){
                            
                            $vertexSpring2 = $vertex1;
                        }
                        $class_count_iter += 1;
                    }else{
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $currYear = 3;
                        $class_count_iter = 0;
                    }
                //Year 3
                }elseif($currYear == 3){
                   if($class_count_iter == 0){
                 
                        $edge = $graph->createEdgeDirected($vertexFall3,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

               
                        $edge = $graph->createEdgeDirected($vertexSpring3,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                 
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
    
                        $lastVertex = $vertex1; 
                           //added to keep last vertex of fall semester
                           if($class_count_iter == ($classLimit/2)-1){

                            $vertexFall3 = $vertex1;
                        }//keep last vertex of spring1 
                        elseif($class_count_iter == $classLimit-1){
                            
                            $vertexSpring3 = $vertex1;
                        }
                        $class_count_iter += 1;

                    }else{
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $currYear = 4;
                        $class_count_iter = 0;
                    }
                //Year 4
                }elseif($currYear == 4 ){
                   if($class_count_iter == 0){
                     
                        $edge = $graph->createEdgeDirected($vertexFall4,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

                   
                        $edge = $graph->createEdgeDirected($vertexSpring4,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                  
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $lastVertex = $vertex1;
    
                        $lastVertex = $vertex1;
                           //added to keep last vertex of fall semester
                           if($class_count_iter == ($classLimit/2)-1){

                            $vertexFall4 = $vertex1;
                        }//keep last vertex of spring 
                        elseif($class_count_iter == $classLimit-1){
                            
                            $vertexSpring4 = $vertex1;
                        } 
                        $class_count_iter += 1;
                    }else{
                        $edge = $graph->createEdgeDirected($lastVertex,$vertex1);
                        $edge->setAttribute('graphviz.color', 'white');
                        $currYear = 5;
                        $class_count_iter = 0;
                    }
                }
                else{
                    $vertex1->setAttribute('graphviz.color', '#45CAF');
                    $vertex1->setAttribute('graphviz.color', 'green');

                }
   

        }
    

   // echo $graphviz->createScript($graph);
   // $graphviz->display($graph);
    $dotContent = $graphviz->createScript($graph);

    // Save DOT file to a local file
    $dotFile = 'dotfiles/recommendationsgraph.dot';
    file_put_contents($dotFile, $dotContent);

    $imageFile = 'images/recommendationsgraph.png'; // specify the file path for the image file
    exec("dot -Tpng {$dotFile} -o {$imageFile}");

    return response()->json(['imagePath' => 'images/recommendationsgraph.png']);
    }
    
   


    public function print_skills(){

    }
    
    public function print_all_skills(){

    }
    
    // career graph 
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
        $dotFile = 'dotfiles/careergraph.dot';
        file_put_contents($dotFile, $dotContent);

        $imageFile = 'images/careergraph.png'; // specify the file path for the image file
        exec("dot -Tpng {$dotFile} -o {$imageFile}");

        return response()->json(['imagePath' => 'images/careergraph.png']);
    }
    public function print_minor_recommendations(){

        //set graph node style
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

        //Classes/Taken
        $classes = Classes::select('Class','Year','Semester')->get();
        $classes2 = Classes::select('Class','Year','Semester')->get();
        $prereq = Prerequisite::select('Class', 'Prereq')->get();
        $taken = Taken::select('Class')->where('ID', Auth::guard('user')->user()->id)->get();       


        //get minor information
        $minorSelectedID = MinorSelected::select('MinorID')->where('ID', Auth::guard('user')->user()->id)->first();
        $minorSelectedName = Minors::select('Minor','Subject')->where('ID',$minorSelectedID->MinorID)->first();
        $minorClasses = Classes::select('Class')
            ->where('ID','>=',10000)
            ->where('Subject',$minorSelectedName->Subject)->get();
        $minorNotNeeded = Classes::select('Class')->whereNotIn('Class', $minorClasses)
            ->where('ID', '>=', 20000)->get(); 
        //minor classes that have not been taken yet
        $classesRemainingMinor = Classes::select('Class')
            ->whereNotIn('Class',$taken)
            ->whereIn('Class',$minorClasses)->get();

        //recommended classes
        $recommendedClasses = Classes::select('Class','Year','Semester')
            ->whereNotIn('Class',$minorNotNeeded)
            ->whereIn('Class',$minorClasses)
            ->orderBy('Year')
            ->get();


        $i = [1,2,3,4,5];
        //how many classes a semester, maybe credits
        //may make it ask before generating
        $classLimit = 2; // Max of 5 classes allowed per semester as of now
        $class_count_iter = 0; // Var to track classes added to semester
        $currYear = 1;
        $graph->setAttribute('graphviz.graph.rankdir', 'TB'); // TB - top down; LR - left right          
        $classTempReq = NULL;
        //iterate through all years and set year/semester nodes
        foreach ($i as $b){   

            switch($b){

                case('1'):
                    $vertexHead = $graph->createVertex();
                    $vertexHead->setAttribute('label', 'Year 1');
                    $vertexFall1 = $graph->createVertex();
                    $vertexFall1->setAttribute('id', 'Fall-1');
                    $vertexSpring1 = $graph->createVertex();
                    $vertexSpring1->setAttribute('id', 'Spring-1'); 
                    $graph->createEdgeDirected($vertexHead, $vertexFall1);
                    $graph->createEdgeDirected($vertexHead, $vertexSpring1);

                    break;

                case('2'):
                    $vertexHead = $graph->createVertex();
                    $vertexHead->setAttribute('label', 'Year 2');
                    $vertexFall2 = $graph->createVertex();
                    $vertexFall2->setAttribute('id', 'Fall-2');
                    $vertexSpring2 = $graph->createVertex();
                    $vertexSpring2->setAttribute('id', 'Spring-2');
                    $graph->createEdgeDirected($vertexHead, $vertexFall2);
                    $graph->createEdgeDirected($vertexHead, $vertexSpring2);

                    break;

                case('3'):
                    $vertexHead = $graph->createVertex();
                    $vertexHead->setAttribute('label', 'Year 3');
                    $vertexFall3 = $graph->createVertex();
                    $vertexFall3->setAttribute('id', 'Fall-3');
                    $vertexSpring3 = $graph->createVertex();
                    $vertexSpring3->setAttribute('id', 'Spring-3');
                    $graph->createEdgeDirected($vertexHead, $vertexFall3);
                    $graph->createEdgeDirected($vertexHead, $vertexSpring3);

                    break;

                case('4'):
                    $vertexHead = $graph->createVertex();
                    $vertexHead->setAttribute('label', 'Year 4');
                    $vertexFall4 = $graph->createVertex();
                    $vertexFall4->setAttribute('id', 'Fall-4');
                    $vertexSpring4 = $graph->createVertex();
                    $vertexSpring4->setAttribute('id', 'Spring-4');
                    $graph->createEdgeDirected($vertexHead, $vertexFall4);
                    $graph->createEdgeDirected($vertexHead, $vertexSpring4);

                    break; 


            }
        }
            //add classes to graph
        foreach($recommendedClasses as $recommended){

            //Electives/Minors
            //if($recommended->Year == 0){
                //    $vertex1 = $graph->createVertex();
              //      $vertex1->setAttribute('id', $recommended->Class);
             //       $graph->createEdgeDirected($vertexFall1,$vertex1);
             //       $lastVertex = $vertex1;

                //Year 1  
                if($recommended->Year < 2){

                   if($class_count_iter == 0 && $currYear != 2){
                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($vertexFall1,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2 && $class_count_iter < $classLimit){
                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($vertexSpring1,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                    elseif($class_count_iter < $classLimit){
                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($lastVertex,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                        $lastVertex = $vertex1; 
                    }else{
                        $currYear = 2;
                        $class_count_iter = 0;
                    }
                //Year 2
                }elseif($recommended->Year < 3){
                   if($class_count_iter == 0){
                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($vertexFall2,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($vertexSpring2,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                            $vertex1 = $graph->createVertex();
                            $vertex1->setAttribute('id', $recommended->Class);
                            $graph->createEdgeDirected($lastVertex,$vertex1);
                            $lastVertex = $vertex1;
                            $class_count_iter += 1;
                            $lastVertex = $vertex1; 
                    }else{
                        $currYear = 3;
                        $class_count_iter = 0;
                    }
                //Year 3
                }elseif($recommended->Year < 4){
                   if($class_count_iter == 0){
                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($vertexFall3,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($vertexSpring3,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($lastVertex,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                        $lastVertex = $vertex1; 
                    }else{
                        $currYear = 4;
                        $class_count_iter = 0;
                    }
                //Year 4
                }elseif($recommended->Year <= 4){
                   if($class_count_iter == 0){
                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($vertexFall4,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;
                   }
                   elseif($class_count_iter == $classLimit/2){

                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($vertexSpring4,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                   }
                    elseif($class_count_iter < $classLimit){
                        $vertex1 = $graph->createVertex();
                        $vertex1->setAttribute('id', $recommended->Class);
                        $graph->createEdgeDirected($lastVertex,$vertex1);
                        $lastVertex = $vertex1;
                        $class_count_iter += 1;

                        $lastVertex = $vertex1; 
                    }else{
                        $currYear = 5;
                        $class_count_iter = 0;
                    }
                }


        }


    echo $graphviz->createScript($graph);
    $graphviz->display($graph);


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

