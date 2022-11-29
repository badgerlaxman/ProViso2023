<!DOCTYPE html>
<html>
<head>
    <!DOCTYPE html>
<html lang="en">
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
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

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
                            <li style='display:inline;'><img src="images/profile.png" style='width: 20px; height: 20px' alt="#"/></li>
                            <li style='display:inline; padding:15px'><a href='{{route('profile')}}'>Name Here</a></li>
                            <li style='display:inline; padding:15px'><a href='{{route('login')}}'>Logout</a></li>
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
                                       <a href="{{route('dashboard')}}">Proviso</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                              <nav class="navigation navbar navbar-expand-md navbar-dark ">
                                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="navbar-toggler-icon"></span>
                                 </button>
                                 <div class="collapse navbar-collapse" id="navbarsExample04">
                                    <ul class="navbar-nav mr-auto">
                                       <li class="nav-item active">
                                          <a class="nav-link" href="{{route('dashboard')}}">Home</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="#addClass">Add Classes</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="#company">Select Company</a>
                                       </li>
                                        <li class="nav-item">
                                          <a class="nav-link" href="#skills">Add Skills</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link" href="#schedule">Schedule</a>
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
      <!-- classes -->
      <div class="clients" id="addClass">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Add Your Classes</h2>
                     <span>Select from the drop down menu a class you have taken, the semester you have taken it and then click add.
                     Do not add classes you have not passed. </span>
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
                                                <!--Show classes they've already added-->  
                                                <!-- add drop down menus-->
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
      <!--divider -->
      <div style="background-color: grey; width: none !important; padding:0px !important">
          <div class='row' style="padding:0px !important" >
              <br>
          </div>
      </div>
      <!--Companies or positions -->
      <div class="clients" id="company">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Select a Company or Position</h2>
                     <span>Select from the drop down menu a company or position you are interested in and then click add.
                     To delete a company or position select the red x next to the entry.</span>
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
                                                <!--Show positions they've already added-->  
                                                <!-- add drop down menus-->
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
      <!--divider -->
      <div style="background-color: grey; width: none !important; padding:0px !important">
          <div class='row' style="padding:0px !important" >
              <br>
          </div>
      </div>
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
                                                <!--Show positions they've already added-->  
                                                <!-- add drop down menus-->
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
      <!--divider -->
      <div style="background-color: grey; width: none !important; padding:0px !important">
          <div class='row' style="padding:0px !important" >
              <br>
          </div>
      </div>
      <!--generate schedule -->
      <div class = "clients" style="background-color: goldenrod; width: none !important" id="schedule">
          <div class="container">
          <div class='row' style="width:100%; height:300px; padding:0px !important" >
              <div class="col-md-12">
              <div class="titlepage">
              <h2>Your Schedule</h2>
              <br>
              </div>
                  </div>
          </div>
          </div>
      </div>
      <!--divider -->
      <div style="background-color: grey; width: none !important; padding:0px !important">
          <div class='row' style="padding:0px !important" >
              <br>
          </div>
      </div>
      
     
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-lg-3 col-md-6">
                     
                     <p class="many">
                        
                     </p>
                  </div>
                  <div class="col-lg-2 offset-lg-1 col-md-6">
                     <h3>QUICK LINKS</h3>
                     <ul class="link_menu">
                        <li><a href="indexTemp.blade.php.html">Home</a></li>
                        <li><a href="about.html"> About</a></li>
                        <li><a href="project.html">Projects</a></li>
                        <li><a href="staff.html">Staff</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                     </ul>
                  </div>
                  
                  
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8 offset-md-2">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
</body>

</html>































<?php
//include auth_session.php file on all user panel pages
//include("auth_session.php");
//require('db.php');

/*<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:gold"> 
            <div class="container">
                <a href="dashboard.php" class="navbar-brand">Home</a>
                <div class="collaspe navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="AddForm.php" class="nav-link">Add Taken Classes</a>
                        </li>
                    </ul>
                </div>
            </div>
</nav>
    <div class="form">
        <p>Hey!</p>
        <h2>You are now on the students dashboard page.</h2>   
    </div>
    @if (session('success'))

                        <div class="alert alert-success" role="alert">

                            {{ session('success') }}

                        </div>

                    @endif
    <div class="form">
        <p><a href="logout.php">Logout</a></p>
    </div>
    
    
</body>
</html>
 * 
 */