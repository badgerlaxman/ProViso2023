<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- mobile metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <!-- site metas -->
        <title>Proviso Advising Dashboard</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Responsive-->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
        <!-- Tweaks for older IEs-->
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        <style>
            .modal-image {
                display: block;
                height: 100%;
                scroll-snap-align: start;
                width: auto;
                margin: 0 auto;
            }

            .modal-image:hover {
                transform: scale(1.5); 
            } 

            .modal-image-container {
                height: 100%;
                overflow-x: scroll;
                overflow-y: scroll;
                display: flex;
                justify-content: center;
                align-items: center;
                scroll-snap-type: x mandatory;
                scroll-behavior: smooth;
            }
        </style>

    </head>
    <body class="main-layout">
        <!-- loader  -->
        <div class="loader_bg">
            <div class="loader"><img src="images/loading.gif" alt="#"/></div>
        </div>
        <!-- end loader -->
        <!-- header -->
        <header class="full_bg">
            <!-- header inner -->
            <div class="header" style="">
                <div class="header_top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <ul class = "">
                                    <li style='display:inline;'><img src="images/profileIcon.png" style='width: 20px; height: 20px' alt="#"/></li>
                                    <li style='display:inline; padding:15px'><a href="{{ route('profile') }}">{{ Auth::guard('user')->user()->name }}</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="social_icon_top text_align_center  ">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <ul class = "">
                                    <li style="align-content: end; display:inline; padding-left:200px"><a href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="header_bottom">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                                        <div class="full">
                                            <div class="center-desk">
                                                <div class="logo">
                                                    <a href="{{ route('dashboard') }}">Proviso</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                                        <nav class="navigation navbar navbar-expand-md navbar-dark">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                                <ul class="navbar-nav mr-auto">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Home</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#addCareer">Add Career</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#company">Select Company</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#skills">Add Skills</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#addMinor">Add Minor</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#addClass">Add Classes</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#recommendationsgraph">Schedule</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end header inner -->
            <!-- end header -->
            <!-- banner -->
        </header>
		
		@if (session('success'))
		<div id="status" class="alert alert-success" role="alert">
			{{ session('success') }}
		</div>
		@endif

        <!-- dream career -->
        <div class="clients" id="addCareer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Select Your Desired Career</h2>
                            <span>Select your desired career from the drop down menu (only one career can be selected at a time). If you do not have a desired career, skip this section. To deselect the chosen career, check the delete box next to the entry and click submit.</span>
                            @if(!is_null($car) && !is_null($comp))
                            <h3>You have selected a career and a company! Want to generate your career graph?
                                <br>
                                <a href="#careergraph">Scroll to Career Graph</a>
                            </h3>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="testimo_ban_bg">
                            <div id="testimp" class="carousel slide testimo_ban" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#testimo" data-slide-to="0" class="active"></li>
                                    <li data-target="#testimo" data-slide-to="1"></li>
                                    <li data-target="#testimo" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="container parile0">
                                            <div class="carousel-caption relative2">
                                                <div class="row d_flex">
                                                    <div class="col-md-12">
                                                        <div class="consect">
                                                            @if(!is_null($car))
                                                            @if(!is_null($comp))
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px">Selected Career</h3>
                                                            <!-- Show careers that have already been added -->
                                                            @csrf
                                                            <table class="customers">
                                                                <tr>
                                                                    <th style="padding-right: 15px">Career</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="padding-right:15px">{{ $car->Title }}</td>
                                                                </tr>
                                                            </table>
                                                            <br>
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px"></h3>
                                                            <p>Description of {{ $car->Title }} Career:</p>
															<blockquote style="margin-top: 0; margin-bottom: 0; padding-top: 20px; padding-bottom: 10px">{{ $car->Description }}</blockquote>    
                                                            <!-- if a career chosen recommends a minor) -->
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px"></h3>
                                                            <p> Minor Recommendation: </p>
                                                            <blockquote style="margin-top: 0; margin-bottom: 0; padding-top: 20px; padding-bottom: 10px">You want to be a {{ $car->Title }}! ProViso recommends you get a {{ $minorrecommend->Minor }} minor!</blockquote>    
                                                            <a href="#addMinor"> Scroll to Minor </a>
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px"></h3>
                                                            <h3>If you want to change your desired career, please deselect a company first.</h3>
                                                            <a href="#company">Scroll to Company</a>
                                                            @else
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px">Selected Career</h3>
                                                            <!-- Show minors that have already been added -->
                                                            <form action="{{ route('career.post') }}" method="POST" role="form">
                                                                @csrf
                                                                <table class="customers">
                                                                    <tr>
                                                                        <th style="padding-right: 15px">Career</th>
                                                                        <th style="padding-right: 15px">Delete</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-right:15px">{{ $car->Title }}</td>

                                                                        <td>
                                                                            <input type="checkbox" name="KeyToDelete" value="{{ $car->CareerID }}"/>
                                                                        </td>
                                                                        <td><input type="submit" name="submitDeleteBtn" value="Submit"/></td>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                            <br>
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px"></h3>
															<p>Description of {{ $car->Title }} Career:</p>
															<blockquote style="margin-top: 0; margin-bottom: 0; padding-top: 20px; padding-bottom: 10px">{{ $car->Description }}</blockquote>
                                                            <!-- if a career chosen recommends a minor) -->
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px"></h3>
                                                            <p> Minor Recommendation: </p>
                                                            <blockquote style="margin-top: 0; margin-bottom: 0; padding-top: 20px; padding-bottom: 10px">You want to be a {{ $car->Title }}! ProViso recommends you get a {{ $minorrecommend->Minor }} minor!</blockquote>    
                                                            <a href="#addMinor"> Scroll to Minor </a>                                                            
                                                            @endif
                                                            @else
                                                            <br>
                                                            <!-- drop down menu -->
                                                            <h3 style="border-bottom: 1px solid black;margin-bottom: 15px">Add a Career</h3>
                                                            <form action='{{ route('addCareer') }}' method='POST'>
                                                                @csrf
                                                                <select name="CareerID" class="dropdown" required>
                                                                    <option value=''>--Career--</option>
                                                                    @foreach($career as $c)
                                                                    <option value="{{ $c->ID }}">{{$c->Title}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="submit" name="submit" value="Add"/>
                                                            </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end dream job section -->

        <!--divider -->
        <div class="divider" style="background-color: grey; width: none !important; padding:0px !important">
            <div class='row' style="padding:0px !important" >
                <br>
            </div>
        </div>
        <!-- end divider -->

        <!--Companies or positions -->
        <div class="clients" id="company">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Select a Company</h2>
                            <span>Select from the drop down menu a company you are interested in and then click add. 
                                Only relevant companies hiring the career selected will be displayed. If no career is selected, then all companies will be listed.
                                To deselect the chosen company, check the delete box next to the entry and click submit.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="testimo_ban_bg">
                            <div id="testimo" class="carousel slide testimo_ban" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#testimo" data-slide-to="0" class="active"></li>
                                    <li data-target="#testimo" data-slide-to="1"></li>
                                    <li data-target="#testimo" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="container parile0">
                                            <div class="carousel-caption relative2">
                                                <div class="row d_flex">
                                                    <div class="col-md-12">
                                                        <div class="consect">
                                                           @if(!is_null($comp))
                                                           <h3 style="border-bottom: 1px solid black; margin-bottom: 15px">Selected Company</h3>
                                                           <!--Show positions they've already added-->  
                                                            <form action="{{ route('company.post') }}" method="POST" role="form">
                                                                @csrf
                                                                <table class="customers">
                                                                    <tr>
                                                                        <th style="padding-right: 15px">Company</th>
                                                                        <th style="padding-right: 15px">Delete</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>                                             
                                                                        <td style ="padding-right:15px">{{ $comp->Name }}</td>
                                                                     
                                                                        <td>
                                                                            <input type="checkbox" name="KeyToDelete" value="{{ $comp->CompanyID }}"/>
                                                                        </td>
                                                                        <td><input type="submit" name="submitDeleteBtn" value="Submit"/></td>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                            <br>
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px"></h3>
															@if($comp->Responsibilities == 'Custom skills.')
															<p>Your chosen skills are saved to this company even if it's deselected.</p>
															@elseif($comp->Responsibilities != '')
															<p>Example responsibilities of employees at {{ $comp->Name }}:</p>
															<blockquote style="margin-top: 0; margin-bottom: 0; padding-top: 20px; padding-bottom: 10px">{{ $comp->Responsibilities }}</blockquote>
                                                            @endif
															@else
                                                            @if(!is_null($car))
                                                            <br>
                                                            <!-- add drop down menus-->
                                                            <h3 style="border-bottom: 1px solid black;margin-bottom: 15px">Add A Company</h3>
                                                            <form action='{{ route('addCompany') }}' method='POST'>
                                                                @csrf
																<select name="CompanyID" class="dropdown" required>
																	<option value=''>--Companies--</option>
																	@foreach($careersavailable as $c)
																	<option value="{{ $c->ID }}">{{$c->Name}}
																	</option>
																	@endforeach
																</select>
																<input type="submit" name="submit" value="Add"/>
                                                            </form>
                                                            <!-- testing for errors -->
                                                            @if ($errors->any())
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                            @else
                                                            <br>
                                                            <!-- add drop down menus-->
                                                            <h3 style="border-bottom: 1px solid black;margin-bottom: 15px">Add A Company</h3>
                                                            <form action='{{ route('addCompany') }}' method='POST'>
                                                                @csrf
																<select name="CompanyID" class="dropdown" required>
																	<option value=''>--Companies--</option>
																	@foreach($company as $c)
																	<option value="{{ $c->ID }}">{{$c->Name}}
																	</option>
																	@endforeach
																</select>
																<input type="submit" name="submit" value="Add"/>
                                                            </form>
                                                            @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end company -->

        <!--divider -->
        <div class="divider" style="background-color: grey; width: none !important; padding:0px !important">
            <div class='row' style="padding:0px !important" >
                <br>
            </div>
        </div>
        <!-- end divider -->

        <!--Add Skills-->
        <div class="clients" id="skills">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Select skills</h2>
                            <span>If you can't find a company or position you are looking for,
                                add the skills your future job would require.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="testimo_ban_bg">
                            <div id="testimo" class="carousel slide testimo_ban" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#testimo" data-slide-to="0" class="active"></li>
                                    <li data-target="#testimo" data-slide-to="1"></li>
                                    <li data-target="#testimo" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="container parile0">
                                            <div class="carousel-caption relative2">
                                                <div class="row d_flex">
                                                    <div class="col-md-12">
                                                        <div class="consect">
                                                            @if(!empty($skills))
                                                            <!--Show positions they've already added-->
                                                            <h3 style="border-bottom: 1px solid black;margin-bottom: 15px">Added Skills</h3>
                                                            <form action="{{ route('skills.post') }}" method="POST" role="form">
                                                                @csrf
                                                                <table class="customers">
                                                                    <tr>
                                                                        <th style="padding-right: 15px">Skill</th>
                                                                        <th style="padding-right: 15px">Delete</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    @foreach ($skills as $s)
                                                                    <tr>
                                                                        <td style ="padding-right:15px">{{ App\Models\Skill::select('Name')->where('ID', $s->SkillID)->first()->Name }}</td>
                                                                     
                                                                        <td>
                                                                            <input type="checkbox" name="KeyToDelete" value="{{ $s->SkillID }}"/>
                                                                        </td>
                                                                        <td><input type="submit" name="submitDeleteBtn" value="Submit"/></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </table>
                                                            </form>
															<a href="{{ route('newCompany') }}"><u>Are these skills for a company not yet in our database? Suggest it to us here!</u></a>
															<br/>
                                                            @endif
															@if(!is_null($comp) && $comp->Responsibilities != 'Custom skills.')
															<p>Choosing specific skills will cancel the company selection above.</p>
															@endif
                                                            <br>
                                                            <!-- add drop down menus-->
                                                            <h3 style="border-bottom: 1px solid black;margin-bottom: 15px">Add Skills</h3>
                                                            <form action='{{ route('addSkill') }}' method='POST'>
                                                                @csrf
																<select name="skills" class="dropdown" required>
																	<option value=''>--Skills--</option>
																	@foreach($skill as $row)
																	<option value="{{ $row->ID }}">{{$row->Name}}
																	</option>
																	@endforeach
																</select>
																<input type="submit" name="submit" value="Add"/>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end skills -->

        <!--divider -->
        <div class="divider" style="background-color: grey; width: none !important; padding:0px !important">
            <div class='row' style="padding:0px !important" >
                <br>
            </div>
        </div>
        <!-- end divider -->

        <!-- recommended classes graph -->
        <!-- if company and career are chosen, display the career graph -->
        @if(!is_null($comp) && !is_null($car))
        <div class="clients" style="background-color: goldenrod; width: none !important" id="careergraph">
            <div class="container">
                <div class='row' style="width:100%; padding:0px !important" >
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Career Graph</h2>
                            <span>You have chosen a career and company, so you can create a career graph. A career graph will show you the required skills needed for a career at a certain company. The graph will also show you classes offered at your institution that teach that skill. If a class is a prerequisite to another course, it will be below that class node with a red arrow, so you can see which courses to take first. You can use the class recommendations from the career graph to choose your technical electives. Click the button below to generate your career graph for your desired company!</span>
                            <br/>
                            <button type="button" class="btn btn-secondary career_graph" id="careergraphbutton">Generate Career Graph</button>
                            <!-- Career Graph -->
                            <div class="container w-100 career_graph">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Graph Modal-->
		<div class="modal fade" id="career_modal" tabindex="-1" role="dialog" aria-labelledby="career_modal_label" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" style="max-width: 1300px; margin: auto" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="skill_modal_label">Career Graph</h5>
                        <div class="legend">
                            <h3> LEGEND </h3>
                            <ul style="direction: ltr;">
                                <li><span class="legend-item careergraphcolor1"></span> Desired Career & Company</li>
                                <li><span class="legend-item careergraphcolor2"></span> Required Skills for Career & Company</li>
                                <li><span class="legend-item careergraphcolor3"></span> Classes Offered that teach the Skill</li>
                                <li><span class="legend-item careergraphcolor4"></span> Classes That have already been taken</li>
                                <li><span class="legend-item careergraphcolor5"></span> Arrow to indicate this course is a prerequisite</li>
                            </ul>
                        </div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body row w-100 text-center" style="margin: auto; padding: 0">
                        <div class="modal-image-container">
                            <img id="career-graph-img" src="{{ asset('images/careergraph.png') }}" alt="career graph" class="modal-image img-fluid mx-auto d-block"  style="margin: 0 auto">
                        </div>
                    </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
        <!-- end modal -->

        <!--divider -->
        <div class="divider" style="background-color: grey; width: none !important; padding:0px !important">
            <div class='row' style="padding:0px !important" >
                <br>
            </div>
        </div>
        <!-- end divider -->
        @endif

        <!-- end career graph -->

        <!-- minor -->
        <div class="clients" id="addMinor">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Select Your Minor</h2>
                            <span>Select your minor from the drop down menu (only one minor can be selected at a time). If you do not have a minor, skip this section. To deselect the chosen minor, check the delete box next to the entry and click submit.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="testimo_ban_bg">
                            <div id="testimp" class="carousel slide testimo_ban" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#testimo" data-slide-to="0" class="active"></li>
                                    <li data-target="#testimo" data-slide-to="1"></li>
                                    <li data-target="#testimo" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="container parile0">
                                            <div class="carousel-caption relative2">
                                                <div class="row d_flex">
                                                    <div class="col-md-12">
                                                        <div class="consect">
                                                            @if(!is_null($min))
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px">Selected Minor</h3>
                                                            <!-- Show minors that have already been added -->
                                                            <form action="{{ route('minor.post') }}" method="POST" role="form">
                                                                @csrf
                                                                <table class="customers">
                                                                    <tr>
                                                                        <th style="padding-right: 15px">Minor</th>
                                                                        <th style="padding-right: 15px">Delete</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="padding-right:15px">{{ $min->Minor }}</td>

                                                                        <td>
                                                                            <input type="checkbox" name="KeyToDelete" value="{{ $min->MinorID }}"/>
                                                                        </td>
                                                                        <td><input type="submit" name="submitDeleteBtn" value="Submit"/></td>
                                                                    </tr>
                                                                </table>
                                                            </form>
                                                            <br>
                                                            <h3 style="border-bottom: 1px solid black; margin-bottom: 15px"></h3>
															<p>Description of {{ $min->Minor }} Minor:</p>
															<blockquote style="margin-top: 0; margin-bottom: 0; padding-top: 20px; padding-bottom: 10px">{{ $min->Description }}</blockquote>
                                                            @else
                                                            <br>
                                                            <!-- drop down menu -->
                                                            <h3 style="border-bottom: 1px solid black;margin-bottom: 15px">Add a Minor</h3>
                                                            <form action='{{ route('addMinor') }}' method='POST'>
                                                                @csrf
                                                                <select name="MinorID" class="dropdown" required>
                                                                    <option value=''>--Minors--</option>
                                                                    @foreach($minor as $m)
                                                                    <option value="{{ $m->ID }}">{{$m->Minor}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="submit" name="submit" value="Add"/>
                                                            </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end minor -->

        <!-- divider -->
        <div class="divider" style="background-color: grey; width: none !important; padding:0px !important">
            <div class="row" style="padding:0px !important">
                <br>
            </div>
       </div>
        <!-- end divider -->

        <!-- classes -->
        <div class="clients" id="addClass">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Add Your Classes</h2>
                            <span>Select from the drop down menu a class you have taken, the semester you have taken it and then click add.
                                Do not add classes you have not passed. Check the delete box next to the entry and click submit to delete that class.</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="testimo_ban_bg">
                            <div id="testimo" class="carousel slide testimo_ban" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#testimo" data-slide-to="0" class="active"></li>
                                    <li data-target="#testimo" data-slide-to="1"></li>
                                    <li data-target="#testimo" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="container parile0">
                                            <div class="carousel-caption relative2">
                                                <div class="row d_flex">
                                                    <div class="col-md-12">
                                                        <div class="consect">
                                                            @if(count($taken) > 0)
                                                            <h3 style="border-bottom: 1px solid black;margin-bottom: 15px">Added Classes</h3>
                                                            <!--Show classes they've already added-->
                                                            <form action="{{ route('dashboard.post') }}" method="POST" role="form">
                                                                @csrf
                                                                <table class="customers">
                                                                    <tr>
                                                                        <th style="padding-right: 15px">Class</th>
                                                                        <th style="padding-right: 15px">Grade</th>
                                                                        <th style="padding-right: 15px">Year</th>
                                                                        <th style="padding-right: 15px">Delete</th>
                                                                        <th></th>
                                                                    </tr>
                                                                    @foreach ($taken as $take)
                                                                    <tr>
                                                                        <td>{{ $take->Class }}</td>
                                                                        <td>{{ $take->Grade }}</td>
                                                                        <td>{{ $take->Year }}</td>
                                                                        <td>
                                                                            <input type="checkbox" name="KeyToDelete" value="{{ $take->Class }}">
                                                                        </td>
                                                                        <td>
																			<input type="submit" name="submitDeleteBtn" value="Submit">
																		</td>
                                                                    </tr>                                                                   
                                                                    @endforeach
                                                                </table>
                                                            </form>
                                                            @endif
                                                            <!-- add drop down menus-->
                                                            <br>
                                                            <h3 style="border-bottom: 1px solid black;margin-bottom: 15px">Add Classes</h3>
                                                            <form action='{{ route('addClass') }}' method='POST'>
                                                                @csrf
                                                                <select name="Class" class="dropdown" required>
                                                                    <option value=''>--Major Classes--</option>

                                                                
                                                                    @foreach($aval as $row)
                                                                    @if($row->ID < 20000)
                                                                    <option value="{{ $row->Class }}">{{ $row->Class }}
                                                                    </option>
                                                                    @endif
                                                                    @endforeach
                                                                    
                                                                 <!-- if no minor is selected -->
                                                                    @if(is_null($min))

                                                                 <!-- ...do nothing... -->

                                                                 <!-- if math minor is selected -->
                                                                    @elseif(strcmp( $min->Minor, "Mathematics") == 0)
                                                                    <option value=''>--Math Minor--</option>
                                                                    @foreach($aval as $row)
                                                                    @if($row->ID > 20000 && $row->ID < 30000)
                                                                    <option value="{{ $row->Class }}">{{ $row->Class }}
                                                                    </option>
                                                                    @endif
                                                                    @endforeach

                                                                 <!-- if music minor is selected -->
                                                                    @elseif(strcmp( $min->Minor, "Music") == 0)
                                                                    <option value=''>--Music Minor--</option>
                                                                    @foreach($aval as $row)
                                                                    @if($row->ID > 30000)
                                                                    <option value="{{ $row->Class }}">{{ $row->Class }}
                                                                    </option>
                                                                    @endif
                                                                    @endforeach

                                                                    @endif


                                                                </select>
                                                                <select name='Grade' class="dropdown" required>
                                                                    <option value=''>--Grade--</option>
                                                                    <option value='A'>A</option>
                                                                    <option value='B'>B</option>
                                                                    <option value='C'>C</option>
                                                                    <option value='D'>D</option>
                                                                    <option value='F'>F</option>
                                                                </select>
                                                                <select name='Year' class="dropdown" required>
                                                                    <option value=''>--Year--</option>
                                                                    <option value='1'>1</option>
                                                                    <option value='2'>2</option>
                                                                    <option value='3'>3</option>
                                                                    <option value='4'>4</option>
                                                                </select>
                                                                <input type="submit" name="submit" value="Add"/>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end classes -->

                <!-- recommended minor graph -->
        <!-- if a minor is chosen, display the minor graph -->
        @if(!is_null($min))
        <div class="clients" style="background-color: goldenrod; width: none !important" id="minorgraph">
            <div class="container">
                <div class='row' style="width:100%; padding:0px !important" >
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Recommended Class Graph for Selected Minor</h2>
                            <span>You have selected a minor! Click the button below to generate your recommended minor class graph!</span>
                            <br/>
                            <button type="button" class="btn btn-secondary minor_graph" id="minorgraphbutton">Generate Minors Graph</button>
                            <!-- Minor Graph -->
                            <div class="container w-100 minor_graph">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Graph Modal-->
		<div class="modal fade" id="minor_modal" tabindex="-1" role="dialog" aria-labelledby="minor_modal_label" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" style="max-width: 1300px; margin: auto" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="Minor_modal_label">Recommended Minors Graph</h5>
                      
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body row w-100 text-center" style="margin: auto; padding: 0">
                        <div class="modal-image-container">
                           <img id="minor-graph-img" src="{{ asset('images/minorgraph.png') }}" alt="minor graph" class="modal-image img-fluid mx-auto d-block"  style="margin: 0 auto">
					
                           </div>
                        </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
        <!-- end modal -->
        @endif

        <!-- recommendations without company/career/minor selected -->        
        @if(is_null($comp) || is_null($car) || is_null($min))
        <div class="clients" style="background-color: goldenrod; width: none !important" id="recommendationsgraph">
            <div class="container">
                <div class='row' style="width:100%; padding:0px !important" >
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Please complete your profile to generate your recommended major Graph</h2>
                                <div class="container w-100 recommendations">
        
                            @if(is_null($car))
                                <a href="#addCareer">Add Career</a>
                            @endif
                            <br/>
                            @if(is_null($comp))
                                <a href="#company">Select Company</a>
                            @endif
                            <br/>
                            @if(is_null($min))
                                <a href="#addMinor">Select Minor</a>
                            @endif

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- recommendations graph -->
        <!-- if company, career and minor are chosen, display the  graph -->

        @if(!is_null($comp) && !is_null($car) && !is_null($min))
        <div class="clients" style="background-color: goldenrod; width: none !important" id="recommendationsgraph">
            <div class="container">
                <div class='row' style="width:100%; padding:0px !important" >
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Recommended Class Graph</h2>
                            <span>You have completed your profile. Click the button below to generate your recommended class graph!</span>
                            <br/>
                            <button type="button" class="btn btn-secondary recommendations_graph" id="recommendationsgraphbutton">Generate Recommendations Graph</button>
                            <!-- Recommendations Graph -->
                            <div class="container w-100 recommendations_graph">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Graph Modal-->
		<div class="modal fade" id="recommendations_modal" tabindex="-1" role="dialog" aria-labelledby="recommendations_modal_label" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" style="max-width: 1300px; margin: auto" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="Recommendations_modal_label">Recommended Class Graph</h5>
                      
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body row w-100 text-center" style="margin: auto; padding: 0">
                        <div class="modal-image-container">
                           <img id="recommendations-graph-img" src="{{ asset('images/recommendationsgraph.png') }}" alt="recommendations graph" class="modal-image img-fluid mx-auto d-block"  style="margin: 0 auto">
					
                           </div>
                        </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
        <!-- end modal -->
      
				
        <!--divider -->
        <div class="divider" style="background-color: grey; width: none !important; padding:0px !important">
            <div class='row' style="padding:0px !important" >
                <br>
            </div>
        </div>
        <!-- end divider -->
        @endif


        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- sidebar -->
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/custom.js"></script>
        <script type='text/javascript'>
			$('button.class_graph').click(function () {
				$('div.class_graph').html('<p>Click the graph to open it in a larger window.</p><button type="button" class="btn btn-secondary w-50" data-toggle="modal" data-target="#skill_modal"><img src="wsgi/classGraph?ID={{ Auth::guard('user')->user()->id }}" alt="Graph showing basic CS class progression."/></button>');
                $('div.minorclass_graph').html('<p>Click the graph to open it in a larger window.</p><button type="button" class="btn btn-secondary w-50" data-toggle="modal" data-target="#skill_modal"><img src="wsgi/minorGraph?ID={{ Auth::guard('user')->user()->id }}" alt="Graph showing selected minor class progression."/></button>');
				$('div.skill_graph').html('<p>Click the graph to open it in a larger window.</p><button type="button" class="btn btn-secondary w-50" data-toggle="modal" data-target="#skill_modal"><img src="wsgi/skillGraph?ID={{ Auth::guard('user')->user()->id }}" alt="Graph showing recommended classes to learn the skills required by the selected company."/></button>');
			});
            $('button.career_graph').click(function () {
                // make an AJAX request to the laravel route
                $.ajax({
                    url: "{{ route('print.classes.and.skills') }}", // Replace with your Laravel route URL
                    type: "GET", 
                    cache: false, // Disable caching
                    success: function(response) {
                        // Handle the response from the Laravel route
                        console.log(response);
                        $('div.career_graph').html('<p>Click the graph to open it in a larger window.</p><button type="button" class="btn btn-secondary w-50" data-toggle="modal" data-target="#career_modal"><img src="'+response.imagePath+'?'+Date.now()+'" alt="career graph"></button>');
                        $('#career-graph-img').attr('src', response.imagePath + '?' + Date.now());
                    },
                    error: function(error) {
                        console.log(error);
                        // Handle any error that may occur during the AJAX request
                    }
                });
			});

            $('button.recommendations_graph').click(function () {
       // make an AJAX request to the laravel route
                $.ajax({
                    url: "{{ route('print.recommendations') }}", // Replace with your Laravel route URL
                    type: "GET", 
                    cache: false, // Disable caching
                    success: function(response) {
                        // Handle the response from the Laravel route
                        console.log(response);
                        $('div.recommendations_graph').html('<p>Click the graph to open it in a larger window.</p><button type="button" class="btn btn-secondary w-50" data-toggle="modal" data-target="#recommendations_modal"><img src="'+response.imagePath+'?'+Date.now()+'" alt="recommendations graph"></button>');
                        $('#recommendations-graph-img').attr('src', response.imagePath + '?' + Date.now());
                    },
                    error: function(error) {
                        console.log(error);
                        // Handle any error that may occur during the AJAX request
                    }
                });
			});

            $('button.minor_graph').click(function () {
       // make an AJAX request to the laravel route
                $.ajax({
                    url: "{{ route('print.minor.recommendations') }}", // Replace with your Laravel route URL
                    type: "GET", 
                    cache: false, // Disable caching
                    success: function(response) {
                        // Handle the response from the Laravel route
                        console.log(response);
                        $('div.minor_graph').html('<p>Click the graph to open it in a larger window.</p><button type="button" class="btn btn-secondary w-50" data-toggle="modal" data-target="#minor_modal"><img src="'+response.imagePath+'?'+Date.now()+'" alt="minor graph"></button>');
                        $('#minor-graph-img').attr('src', response.imagePath + '?' + Date.now());
                    },
                    error: function(error) {
                        console.log(error);
                        // Handle any error that may occur during the AJAX request
                    }
                });
			});
        </script>
    </body>
</html>