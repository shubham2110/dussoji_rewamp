<?php session_start();include("database/database.php");if(!isset($_SESSION["email"])){header("location:auth-login-basic.html");}?>
<!DOCTYPE html>
<!--
********************************************
Version: 1.0
Name: Hostcomm Support Main User Dashboard
Developed By: www.impactcart.in
All Rights & License Reserved by Damodar IT Solutions Pvt. Ltd.
Author: Shyam Shanbhag
Contact: shyam@ditsolutions.net
Deployed for: www.hostcommservers.com
********************************************
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Dashboard - Hostcomm Video</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="assets/img/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="assets/img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="assets/img/favicon-128.png" sizes="128x128" />


    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script type="text/javascript" src="intl-tel-input/build/js/intlTelInput-jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="intl-tel-input/build/css/intlTelInput.css">
</head>

<style>
    .tooltip-inner {
        max-width: 190px;
        padding: 3px 5px;
        color: #000;
        text-align: center;
        background-color: #fff;
        border-radius: .25rem;
        border: 1px solid #000;
    }

    .bs-tooltip-bottom .arrow::before,
    .bs-tooltip-auto[x-placement^=bottom] .arrow::before {
        bottom: 0;
        border-width: 0 0.5rem 0.5rem;
        border-bottom-color: #e3a131 !important;
    }

    .info {
        color: #e3a131;
        font-size: 15px;
    }

    .iti {
        display: block !important;
    }

    .validate {
        color: red;
        font-weight: 400;
        font-size: 13px;
    }

</style>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand" href="index.php"><img src="assets/img/log.png"></a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
        <form class="form-inline mr-auto d-none">
            <div class="input-group input-group-joined input-group-solid">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                <div class="input-group-append">
                    <div class="input-group-text"><i data-feather="search"></i></div>
                </div>
            </div>
        </form>
        <ul class="navbar-nav align-items-center ml-auto">
            <!-- <li class="nav-item dropdown no-caret mr-3 d-none d-md-inline">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownDocs" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="d-none d-md-inline font-weight-500">Documentation</div>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right py-0 mr-sm-n15 mr-lg-0 o-hidden animated--fade-in-up" aria-labelledby="navbarDropdownDocs">
                        <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro" target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="book"></i></div>
                            <div>
                                <div class="small text-gray-500">Documentation</div>
                                Usage instructions and reference
                            </div>
                        </a>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/components" target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="code"></i></div>
                            <div>
                                <div class="small text-gray-500">Components</div>
                                Code snippets and reference
                            </div>
                        </a>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item py-3" href="https://docs.startbootstrap.com/sb-admin-pro/changelog" target="_blank">
                            <div class="icon-stack bg-primary-soft text-primary mr-4"><i data-feather="file-text"></i></div>
                            <div>
                                <div class="small text-gray-500">Changelog</div>
                                Updates and changes
                            </div>
                        </a>
                    </div>
                </li> -->
            <li class="nav-item dropdown no-caret mr-sm-3 mr-xs-0 d-none">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
                <!-- Dropdown - Search-->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100">
                        <div class="input-group input-group-joined input-group-solid">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i data-feather="search"></i></div>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <?php $email=$_SESSION["email"];$con=new DbConnector();$my_query="select * from d_registration where uemail like '$email'";$result = $con->query($my_query);if(($con->getNumRows($result) ==1)){$row=$con->fetchArray($result);$dbfname=$row['fname'];$dblname=$row['lname'];$uname="$dbfname $dblname";$dbbirth=$row['birthdate'];$dbmob=$row['phone'];$dborg=$row['orgname'];$dbgeo=$row['geoloc'];$dbavatar=$row['avatar'];$dbrole=$row['urole'];}?>
            <!--    <li class="nav-item dropdown no-caret mr-sm-3 mr-2 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="bell"></i>
                        Alerts Center
                    </h6>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 29, 2019</div>
                            <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing serious, but it requires your attention.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-info"><i data-feather="bar-chart"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 22, 2019</div>
                            <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click here to view!</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-danger"><i class="fas fa-exclamation-triangle"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 8, 2019</div>
                            <div class="dropdown-notifications-item-content-text">Critical system failure, systems shutting down.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-success"><i data-feather="user-plus"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 2, 2019</div>
                            <div class="dropdown-notifications-item-content-text">New user request. Woody has requested access to the organization.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
                </div>
            </li> -->

            <li class="nav-item no-caret mr-sm-3 mr-xs-2 d-none d-sm-block">
                <a class="btn btn-icon btn-transparent-dark" target="_blank" data-toggle="modal" data-target="#support" style="cursor:pointer;">
                    <i data-feather="life-buoy"></i>
                </a>
            </li>

            <!-- <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="mail"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="mail"></i>
                        Message Center
                    </h6>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <img class="dropdown-notifications-item-img" src="https://source.unsplash.com/vTL_qy03D1I/60x60" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="dropdown-notifications-item-content-details">Emily Fowler · 58m</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <img class="dropdown-notifications-item-img" src="https://source.unsplash.com/4ytMf8MgJlY/60x60" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="dropdown-notifications-item-content-details">Diane Chambers · 2d</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-footer" href="#!">Read All Messages</a>
                </div>
            </li> -->
            <li class="nav-item dropdown no-caret mr-sm-2 mr-2 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="<?php echo $dbavatar; ?>" /></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="<?php echo $dbavatar; ?>" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name"><?php echo $uname;?></div>
                            <div class="dropdown-user-details-email"><?php echo $email;?></div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="account-profile.php">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" onclick="logout();" style="color: black;cursor:pointer;">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">

                        <a class="nav-link " href="index.php">
                            <div class="nav-link-icon"><i data-feather="activity"></i></div>
                            Dashboard

                        </a>

                        <a class="nav-link" href="join-webinar.php">
                            <div class="nav-link-icon"><i data-feather="user-plus"></i></div>
                            Join Webinar
                            <span class="badge badge-primary-soft text-primary ml-auto">Beta</span>
                        </a>


                        <nav class="nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                <div class="nav-link-icon"><i data-feather="user"></i></div>
                                Account
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAccount" data-parent="#accordionSidenavPagesMenu">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="account-profile.php">
                                        Profile
                                        <span class="badge badge-primary-soft text-primary ml-auto">New</span>
                                    </a>

                                    <a class="nav-link" href="account-security.php">
                                        Security
                                        <span class="badge badge-primary-soft text-primary ml-auto">New</span>
                                    </a>
                                    <!-- <a class="nav-link" href="account-notifications.html">
                                        Notifications
                                        <span class="badge badge-primary-soft text-primary ml-auto">New</span>
                                    </a> -->
                                </nav>
                            </div>
                        </nav>

                        <a class="nav-link" target="_blank" data-toggle="modal" data-target="#support" style="cursor:pointer;">
                            <div class="nav-link-icon"><i data-feather="life-buoy"></i></div>
                            Support
                            <span class="badge badge-primary-soft text-primary ml-auto">New</span>
                        </a>

                        <a class="nav-link" target="_blank" data-toggle="modal" data-target="#feedback" style="cursor:pointer;">
                            <div class="nav-link-icon"><i data-feather="clipboard"></i></div>
                            Feedback
                            <span class="badge badge-primary-soft text-primary ml-auto">New</span>
                        </a>

                    </div>
                </div>
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Logged in as:</div>
                        <div class="sidenav-footer-title"><?php echo $uname;?></div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="support" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center ml-4 mr-auto w-100" id="exampleModalLabel">Support Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><label class="text-dark" for="inputProblem">Problems with</label><select class="form-control" style="height:3.125rem" id="inputProblem" name="inputProblem">
                                <option value="" selected disabled>Please Select</option>
                                <option>Video</option>
                                <option>Audio</option>
                                <option>Connectivity Issues</option>
                                <option>Browser Support</option>
                                <option>Recording</option>
                                <option>New Feature</option>
                            </select></div>

                        <div class="form-group"><label class="text-dark" for="inputMessage">Message</label><textarea class="form-control py-3" id="inputMessage" name="inputMessage" type="text" placeholder="Enter your message..." rows="4"></textarea></div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success mx-auto" id="support_submit" onclick="submitsup();">Submit</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center ml-4 mr-auto w-100" id="exampleModalLabel">Feedback Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label class="text-dark" for="quality">Rate our Video / Audio Quality</label>
                        <div class="form-group stars text-center">
                            <input class="star star-5" id="star-5" type="radio" name="star" />
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" />
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" />
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" />
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star" />
                            <label class="star star-1" for="star-1"></label>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12"><label class="text-dark" for="feed_problem">Any Specific Problems you faced? If yes Kindly Explain.</label><input class="form-control py-4" id="feed_problem" name="feed_problem" type="text" placeholder="Your answer" /></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12"><label class="text-dark" for="feed_problem">How was your overall experience? </label>
                                <div class="form-row justify-content-center">
                                    <div class="mx-3 mx-sm-4"><input class="mr-1" style="margin-top:0.3rem" type="radio" name="feed_exp" id="poor" /><label class="text-dark">Poor</label></div>
                                    <div class="mx-3 mx-sm-4"><input class="mr-1" style="margin-top:0.3rem" type="radio" name="feed_exp" id="good" /><label class="text-dark">Good</label></div>
                                    <div class="mx-3 mx-sm-4"><input class="mr-1" style="margin-top:0.3rem" type="radio" name="feed_exp" id="best" /><label class="text-dark">Best</label></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12"><label class="text-dark" for="feed_suggestion">Any Suggestions</label><input class="form-control py-4" id="feed_suggestion" name="feed_suggestion" type="text" placeholder="Your answer" /></div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success mx-auto" id="support_submit" onclick="submitfeed();">Submit</button>
                    </div>
                </div>
            </div>
        </div>




        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                                        Dashboard
                                    </h1>
                                    <div class="page-header-subtitle">Welcome to Hostcomm Video. Get ready for a Wonderful Experience.</div>
                                </div>
                                <!--    <div class="col-12 col-xl-auto mt-4">
                                    <button class="btn btn-white btn-sm line-height-normal p-3" id="reportrange">
                                        <i class="mr-2 text-primary" data-feather="calendar"></i>
                                        <span></span>
                                        <i class="ml-1" data-feather="chevron-down"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </header>


                <!-- Main page content-->
                <div class="container mt-n10">
                    <div class="row">

                        <!-- Create Organization-->
                        <div class="col-xxl-6 col-lg-6 mb-4">
                            <div class="card text-center h-100">
                                <div class="card-body px-5 pt-5 d-flex flex-column">
                                    <div>
                                        <div class="h3 text-primary font-weight-600">Create</div>
                                        <p class="text-muted mb-4">Create a Meeting and invite new members</p>
                                    </div>
                                    <div class="icons-org-create align-items-center mx-auto mt-auto">
                                        <i class="icon-users" data-feather="users"></i>
                                        <i class="icon-plus fas fa-plus"></i>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent px-5 py-4">
                                    <div class="small text-center"><a class="btn btn-block btn-primary" target="_blank" data-toggle="modal" data-target="#createvideo" style="<?php if($dbrole=="USER"){echo "pointer-events: none;
        cursor: default;";}?>">Create new Meeting</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Join Organization-->
                        <div class="col-xxl-6 col-lg-6 mb-4">
                            <div class="card text-center h-100">
                                <div class="card-body px-5 pt-5 d-flex flex-column align-items-between">
                                    <div>
                                        <div class="h3 text-secondary font-weight-600">Join</div>
                                        <p class="text-muted mb-4">Enter Meeting ID to join a meeting</p>
                                    </div>
                                    <div class="icons-org-join align-items-center mx-auto">
                                        <i class="icon-user" data-feather="user"></i>
                                        <i class="icon-arrow fas fa-long-arrow-alt-right"></i>
                                        <i class="icon-users" data-feather="users"></i>
                                    </div>
                                </div>
                                <div class="card-footer bg-transparent px-5 py-4">
                                    <div class="small text-center"><a class="btn btn-block btn-secondary" target="_blank" data-toggle="modal" data-target="#joinvideo">Join a Meeting</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="createvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create a Meeting</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="post" role="form" id="contact_form">
                                    <div class="modal-body" id="meeting_create">

                                        <div class="form-row">
                                            <div class="form-group col-md-12"><label class="text-dark" for="meetingName">Meeting name</label><input class="form-control py-4" id="inputName" name="inputName" type="text" placeholder="Meeting Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                                <div class="validate"></div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12"><label class="text-dark" for="inputTopic">Topic</label><input class="form-control py-4" id="inputTopic" name="inputTopic" type="text" placeholder="Your topic" data-toggle="tooltip" data-placement="bottom" title="" data-trigger="manual" data-html="true" data-rule="required" data-msg="Enter meeting topic" />
                                                <div class="validate"></div>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label class="text-dark" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="inputPassword" type="text" placeholder="BBB9876" data-rule="required" data-msg="Please enter password" />
                                                <div class="validate"></div>
                                            </div>

                                            <div class="form-group col-md-6"><label class="text-dark" for="inputDate">Date</label><input class="form-control py-4" id="date" name="date" type="date" min="<?php date_default_timezone_set("Europe/London"); echo date("Y-m-d"); ?>" data-rule="required" data-msg="Please enter date" />
                                                <div class="validate"></div>
                                            </div>
                                            <!-- <script type="text/javascript">
                                                $(function() {
                                                    var dtToday = new Date();

                                                    var month = dtToday.getMonth() + 1;
                                                    var day = dtToday.getDate();
                                                    var year = dtToday.getFullYear();
                                                    if (month < 10)
                                                        month = '0' + month.toString();
                                                    if (day < 10)
                                                        day = '0' + day.toString();

                                                    var maxDate = year + '-' + month + '-' + day;
                                                    $('#date').attr('min', maxDate);
                                                });

                                            </script> -->
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-row">
                                                    <label class="text-dark col-md-12" for="inputTime">Time</label>
                                                    <div class="form-group col-md-12"><input type="time" class="form-control py-4" name="inputTime" id="inputTime">
                                                        <div class="time-valid validate"></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-row">

                                                    <label class="text-dark col-md-12" for="inputTime">Duration</label>
                                                    <div class="form-group col-md-6"><select class="form-control" style="height:3.125rem" name="num_hours" id="num_hours">
                                                            <option selected disabled>Hours</option>
                                                        </select></div>

                                                    <div class="form-group col-md-6"><select class="form-control" style="height:3.125rem; padding:0.5rem 0.7rem;" name="num_minutes" id="num_minutes">
                                                            <option selected disabled>Minutes</option>
                                                        </select></div>
                                                    <div class="duration-valid validate" style="margin-top:-16px; margin-left:5px;"></div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="form-group"><label class="text-dark" for="inputAttendees">Attendees</label><textarea class="form-control py-3" id="inputAttendees" name="inputAttendees" type="text" placeholder="Enter a comma separated list of email ids" rows="3"></textarea>
                                            <div class="valid-attend validate"></div>
                                        </div>

                                        <div class="form-group"><label class="text-dark" for="smsinvite">SMS Invite</label><input class="form-control py-3" id="smsinvite" type="tel" />
                                            <div class="validate valid-phone"></div>
                                        </div>




                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" id="create_me" style="margin: auto" onclick="createmeeting();">Create Meeting</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $("#inputTopic").on('keyup change input', function(event) {
                            meeting = $(this).val();
                            var specials = /[?&:'"%#]/;
                            if (specials.test(meeting)) {
                                meeting = meeting.replace(/[ ?&:'"%#.]/g, "");
                                $(this).val(meeting);
                                var text = "<i class='fa fa-info-circle info'></i> Meeting name should not contain any of these characters: ?, &, :, ', &quot;, %, #";
                                var text = text.replace(/&quot;/g, '\"');
                                $(this).attr('data-original-title', text).tooltip('show');

                            }

                        });
                        $("#inputTopic").on('blur', function() {
                            $(this).tooltip('hide');
                        });



                        var telInput = $("#smsinvite");
                        telInput.intlTelInput({
                            utilsScript: "intl-tel-input/build/js/utils.js",
                            preferredCountries: ["in", "us"],
                            separateDialCode: true,
                            initialCountry: "auto",
                            geoIpLookup: function(success, failure) {
                                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                                    var countryCode = (resp && resp.country) ? resp.country : "";
                                    success(countryCode);
                                });
                            }
                        });

                    </script>



                    <!-- Modal -->
                    <div class="modal fade" id="joinvideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Enter Meeting Name</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input class="form-control" type="text" placeholder="Your Meeting Name" id="join" data-toggle="tooltip" data-placement="bottom" title="" data-trigger="manual" data-html="true" onchange="loadmeets();">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" id="join_me">Join Meeting</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $("#join").tooltip({
                                trigger: 'manual'
                            });

                            $("#join_me").click(function() {
                                meeting = $("#join").val();
                                var specials = /[?&:'"%#]/;

                                if (meeting == "") {
                                    $("#join").attr('data-original-title', "<i class='fa fa-info-circle info'></i> Please Enter Meeting Name").tooltip('show');
                                } else if (specials.test(meeting)) {
                                    var text = "<i class='fa fa-info-circle info'></i> Meeting name should not contain any of these characters: ?, &, :, ', &quot;, %, #";
                                    var text = text.replace(/&quot;/g, '\"');
                                    $("#join").attr('data-original-title', text).tooltip('show');
                                } else {
                                    var link = "https://hostcommservers.com/join/" + $("#join").val();
                                    window.location.href = link;
                                }

                            });

                            $("#join_me").blur(function() {
                                $("#join").tooltip('hide');
                            });

                        });


                        var hour = document.getElementById("num_hours");
                        for (i = 0; i <= 23; i++) {
                            var opt = document.createElement('option');
                            if (i.toString().length == 1) {
                                opt.innerHTML = "0".concat(i.toString(), " hrs");
                                opt.value = "0".concat(i.toString(), " hrs");
                            } else {
                                opt.innerHTML = i.toString().concat(" hrs");
                                opt.value = i.toString().concat(" hrs");
                            }
                            hour.appendChild(opt);
                        }

                        var minute = document.getElementById("num_minutes");
                        for (i = 0; i <= 59; i++) {
                            var opt = document.createElement('option');
                            if (i.toString().length == 1) {
                                opt.value = "0".concat(i.toString(), " mins");
                                opt.innerHTML = "0".concat(i.toString(), " mins");
                            } else {
                                opt.value = i.toString().concat(" mins");
                                opt.innerHTML = i.toString().concat(" mins");
                            }

                            minute.appendChild(opt);
                        }

                    </script>



                    <div class="row">

                        <div class="col-xxl-6 col-xl-6 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Recent Meetings

                                </div>
                                <div class="card-body">
                                    <div class="timeline timeline-xs">
                                        <!-- Timeline Item 1-->
                                        <?php $email=$_SESSION["email"];
                                            $con=new DbConnector();
                                            $my_query="select * from u_meetings where (uemail like '$email' or mattend like '%$email%') and mdatetime<=sysdate() ORDER BY mdatetime desc;";
                                            $result = $con->query($my_query);
                                             while(($row=$con->fetchArray($result)))
                                                {
                                                    
                                                    $dbmname=$row['mname'];
                                                    $dbmtopic=$row['mtopic'];
                                                    $dbmpass=$row['mpass'];
                                                    $dbmdatetime=$row['mdatetime'];
                                                    $dbmexpdatetime=$row['mexpdatetime'];
                                                    $dbmduration=$row['mduration'];
                                                    $dbmattend=$row['mattend'];
                                                    $dbmuniq=$row['muniq'];
                                                   
                                                        
                                                    
                            ?>
                                        <div class="timeline-item">
                                            <div class="timeline-item-marker">
                                                <div class="timeline-item-marker-text"><span id="rd1"><?php  $mdate=explode(" ", $dbmdatetime); echo "$mdate[0]";?></span><br><span id="rt1"> <?php echo "$dbmduration";?> min</span></div>
                                                <div class="timeline-item-marker-indicator bg-yellow"></div>
                                            </div>
                                            <div class="timeline-item-content font-weight-bold text-dark">
                                                <?php echo "$dbmname";?>
                                            </div>
                                        </div><?php }?>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xxl-6 col-xl-6 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Scheduled Meetings

                                </div>
                                <div class="card-body">
                                    <div class="timeline timeline-xs">
                                        <!-- Timeline Item 1-->
                                        <?php $email=$_SESSION["email"];
                                            $con=new DbConnector();
                                            $my_query="select * from u_meetings where (uemail like '$email' or mattend like '%$email%') and mdatetime>=sysdate() ORDER BY mdatetime;";
                                            $result = $con->query($my_query);
                                             while(($row=$con->fetchArray($result)))
                                                {
                                                    
                                                    $dbmname=$row['mname'];
                                                    $dbmtopic=$row['mtopic'];
                                                    $dbmpass=$row['mpass'];
                                                    $dbmdatetime=$row['mdatetime'];
                                                    $dbmexpdatetime=$row['mexpdatetime'];
                                                    $dbmduration=$row['mduration'];
                                                    $dbmattend=$row['mattend'];
                                                    $dbmuniq=$row['muniq'];
                                                   
                                                        
                                                    
                            ?>
                                        <div class="timeline-item">
                                            <div class="timeline-item-marker">
                                                <div class="timeline-item-marker-text"><span id="sd1">
                                                        <?php  $mdate=explode(" ", $dbmdatetime); echo "$mdate[0]";?>

                                                    </span><br><span id="st1">
                                                        <?php echo "$dbmduration";?> min</span></div>
                                                <div class="timeline-item-marker-indicator bg-green"></div>
                                            </div>
                                            <div class="timeline-item-content font-weight-bold text-dark">
                                                <a class="scheduled" target="_blank" data-toggle="modal" data-target='#reschedulemeet' onclick="fetchdata('<?php echo "$dbmuniq";?>');">
                                                    <?php echo "$dbmname";?> </a>
                                            </div>
                                        </div><?php  }?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->

                        <div class="modal fade" id='reschedulemeet' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center ml-4 mr-auto w-100" id="exampleModalLabel">Meeting Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body reschedule-form">

                                        <div class="form-row">
                                            <input type="hidden" name="uniqid" id="uniqid" value='<?php echo "$dbmuniq"; ?>'>
                                            <div class="form-group col-md-6"><label class="text-dark" for="meetingName">Meeting Name</label><input class="form-control py-4" id="meetingName" name="meetingName" placeholder="Meeting Name" type="text" data-rule="minlen:4" data-msg="Please enter at least 4 chars" disabled />
                                                <div class="validate"></div>
                                            </div>

                                            <div class="form-group col-md-6"><label class="text-dark" for="topic">Topic</label><input class="form-control py-4" id="topic" name="topic" type="text" placeholder="Your topic" data-toggle="tooltip" data-placement="bottom" title="" data-trigger="manual" data-html="true" data-rule="required" data-msg="Enter meeting topic" disabled />
                                                <div class="validate"></div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label class="text-dark" for="Password">Password</label><input class="form-control py-4" id="password" name="password" type="text" placeholder="BBB9876" data-rule="required" data-msg="Please enter password" disabled />
                                                <div class="validate"></div>
                                            </div>

                                            <div class="form-group col-md-6"><label class="text-dark" for="Date">Date</label><input class="form-control py-4" id="schedule_date" name="schedule_date" type="date" min="<?php date_default_timezone_set("Europe/London"); echo date("Y-m-d"); ?>" data-rule="required" data-msg="Please enter date" disabled />
                                                <div class="validate"></div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label class="text-dark" for="time">Time</label><input class="form-control py-4" id="schedule_time" name="schedule_time" type="time" disabled />
                                                <div class="time-res validate"></div>
                                            </div>

                                            <div class="form-group col-md-6"><label class="text-dark" for="duration">Duration(Minutes)</label><input class="form-control py-4" id="schedule_duration" name="schedule_duration" type="text" placeholder="Duration in minutes" data-rule="required" data-msg="Please enter duration" disabled />
                                                <div class="validate"></div>
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="text-dark" for="inputAttendees">Attendees</label><textarea class="form-control py-3" id="inputAttendes" name="inputAttendes" type="text" rows="3" placeholder="Enter a comma separated list of email ids" rows="3" data-rule="required" data-msg="Please enter atleast one email id" disabled></textarea>
                                            <div class="validate"></div>
                                        </div>


                                        <label class="text-dark" for="meetsms">SMS Invite</label>
                                        <div class="form-row">
                                            <div class="form-group col-md-8"><input class="form-control py-4" id="meetsms" name="meetsms" type="text" disabled /></div>

                                            <div class="form-group col-md-4"><button type='button' class='btn btn-primary w-100' style="padding:12px;" id='sendsms' onclick="sendsms();"><i class="mr-2" data-feather="send"></i> Send SMS</button></div>
                                        </div>


                                    </div>
                                    <div class="modal-footer mx-auto text-center">
                                        <?php 
                                         if($dbrole=="USER"){
                                           echo "<form method='post' action='/hostcomm/join/".$dbmuniq."'><input type='hidden' name='pass' value='".$dbmpass."'><button type='submit' class='btn btn-success' id='joinmeeting'>Join</button></form>";

                                         }else{
                                            echo "<button type='button' class='btn btn-success' id='reschedule_1' onclick='validateresc();'>Reschedule</button>";
                                            echo "<button type='button' class='btn btn-success' id='save_1' onclick='savemeeting();' hidden>Save</button>";
                                            echo "<form method='post' action='/hostcomm/join/".$dbmuniq."'><input type='hidden' name='pass' value='".$dbmpass."'><button type='submit' class='btn btn-success' id='joinmeeting'>Join</button></form>";
                                            echo "<button type='button' class='btn btn-danger' id='cancel_schedule_1' onclick='meetcancel();'>Cancel</button>";

                                         }
                                        ?>


                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>

                </div>
            </main>
            <script>
                $("#topic").on('keyup change input', function(event) {
                    meeting = $(this).val();
                    var specials = /[?&:'"%#]/;
                    if (specials.test(meeting)) {
                        meeting = meeting.replace(/[ ?&:'"%#.]/g, "");
                        $(this).val(meeting);
                        var text = "<i class='fa fa-info-circle info'></i> Meeting name should not contain any of these characters: ?, &, :, ', &quot;, %, #";
                        var text = text.replace(/&quot;/g, '\"');
                        $(this).attr('data-original-title', text).tooltip('show');

                    }

                });
                $("#topic").on('blur', function() {
                    $(this).tooltip('hide');
                });
                
                

            </script>
            
            <footer class="footer mt-auto footer-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">&copy; 2020, <span>Hostcomm Video</span>. All Rights Reserved<br>Made with ❤ by <a href="https://ditsolutions.net"><span>D IT Solutions</span></a></div>


                        <div class="col-md-6 text-md-right small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/date-range-picker-demo.js"></script>
     <script src="js/validation.js"></script>
</body>

</html>
