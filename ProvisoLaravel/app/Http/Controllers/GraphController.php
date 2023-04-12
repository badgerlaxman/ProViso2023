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
use App\Models\CareerSelected;
use App\Models\CareersAvailable;
use App\Models\Taken;
use App\Models\Selection;
use App\Models\Requires;
use App\Models\Prerequisite;
use Hash;
use Graphp\Graph\Graph;
use Graphp\GraphViz\GraphViz;

require_once '/Applications/XAMPP/htdocs/CS360/ProViso/ProViso2023/ProvisoLaravel/bootstrap/app.php'; // bootstrap info


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

        // create some vertices
        $vertex1 = $graph->createVertex(array('name' => 'A'));
        $vertex2 = $graph->createVertex(array('name' => 'B'));
        $vertex3 = $graph->createVertex(array('name' => 'C'));
        /*$vertex1 = $graph->createVertex('A');
        $vertex2 = $graph->createVertex('B');
        $vertex3 = $graph->createVertex('C');*/

        // create some edges
        $graph->createEdgeDirected($vertex1, $vertex2);
        $graph->createEdgeDirected($vertex2, $vertex3);
        $graph->createEdgeDirected($vertex3, $vertex1);
        /*$edge1 = $vertex1->createEdgeTo($vertex2);
        $edge2 = $vertex2->createEdgeTo($vertex3);
        $edge3 = $vertex3->createEdgeTo($vertex1);*/

        // display the graph (will open up in preview)
        //$graphviz = new Graphp\GraphViz\GraphViz();
        $graphviz = new GraphViz();
        $graphviz->display($graph);
        //$image = $graphviz->createImageFile($graph);
        //file_put_contents('/Users/nyahnelson/Desktop/gimage.png', $image);
    }

    public function get_taken($year){

    }

    public function get_skills(){

    }

    public function print_classes(){
        $graph = new Graph();
        $graphviz = new GraphViz();
        $graphviz->setFormat('png');
        //$graphviz->setEngine('dot');
        // filename

        // Set attributes for the GraphViz object
        //$graph->setFormat('png');
        //$graph->setEngine('dot');
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


        // Generate the graphviz script
        //$graphvizScript = $graphviz->createScript($graph);
        
        // Display the graph
        //$graphviz->display($graphvizScript);

        echo $graphviz->createScript($graph);
        $graphviz->display($graph);

    }

    public function print_recommendations(){

    }

    public function print_skills(){

    }
    
    public function print_all_skills(){

    }
    public function print_classes_and_skills(){

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

