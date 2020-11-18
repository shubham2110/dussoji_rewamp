<?php session_start();include("database/database.php");if(!isset($_SESSION["email"])){header("location:auth-login-basic.html");}?>
<!DOCTYPE html>
<!--
********************************************
Version: 1.0
Name: Dussoji Video Conferencing Main User Dashboard
Developed By: www.impactcart.in
All Rights & License Reserved by D IT Solutions
Author: Shyam Shanbhag
Contact: shyam@ditsolutions.net
Deployed for: www.dussoji.com
Pre-Owned by: D IT Solutions (www.ditsolutions.net)
********************************************
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Account Settings - Profile - Hostcomm Video</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous"></script>
    <script src="js/validation.js"></script>
</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
      <a class="navbar-brand" href="index.php"><img src="assets/img/log.png"></a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
        <form class="form-inline mr-auto d-none d-md-block">
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
            <?php $email=$_SESSION["email"];$con=new DbConnector();$my_query="select * from d_registration where uemail like '$email'";$result = $con->query($my_query);if(($con->getNumRows($result) ==1)){$row=$con->fetchArray($result);$dbfname=$row['fname'];$dblname=$row['lname'];$uname="$dbfname $dblname";$dbbirth=$row['birthdate'];$dbmob=$row['phone'];$dborg=$row['orgname'];$dbgeo=$row['geoloc'];$dbavatar=$row['avatar'];}?>
            <li class="nav-item dropdown no-caret mr-sm-3 mr-xs-0 d-md-none">
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
          <!--  <li class="nav-item dropdown no-caret mr-sm-3 mr-2 dropdown-notifications">
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
            </li>-->

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
                    <a class="dropdown-item" onclick="logout();" style="color: black;">
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
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="user"></i></div>
                                        Account Settings - Profile
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container mt-4">
                    <!-- Account page navigation-->
                    <nav class="nav nav-borders">
                        <a class="nav-link active ml-0" href="account-profile.php">Profile</a>
                        
                        <a class="nav-link" href="account-security.php">Security</a>
                        <!-- <a class="nav-link" href="account-notifications.html">Notifications</a> -->
                    </nav>
                    <hr class="mt-0 mb-4" />
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <!-- Profile picture image-->
                                    <img class="img-account-profile rounded-circle mb-2" src="<?php echo $dbavatar; ?>" alt="image" />
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                    <!-- Profile picture upload button-->
                                    <form method="post" enctype="multipart/form-data" action="controller/upload.php" name="sendfile" id="sendfile">
                                        <button class="btn btn-primary" type="button" id="upload" onclick="uploadimage();">Upload new image</button>
                                        <input id="fileid" type="file" name="fileid" accept="image/x-png,image/jpeg" onchange="uploadfile();" hidden />
                                    </form>
                                    <!-- <script type="text/javascript"></script> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form>
                                        <!-- Form Group (username)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value='<?php echo $uname;?>' disabled="true" />
                                        </div>
                                        <!-- Form Row-->
                                        <div class="form-row">
                                            <!-- Form Group (first name)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First name</label>
                                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value='<?php echo $dbfname;?>' disabled="true" />
                                            </div>
                                            <!-- Form Group (last name)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value='<?php echo $dblname;?>' disabled="true" />
                                            </div>
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="form-row">
                                            <!-- Form Group (organization name)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Organization name</label>
                                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value='<?php echo $dborg;?>' disabled="true" />
                                            </div>
                                            <!-- Form Group (location)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputLocation">Location</label>
                                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value='<?php echo $dbgeo;?>' disabled="true" />
                                            </div>
                                        </div>
                                        <!-- Form Group (email address)-->
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value='<?php echo $email;?>' disabled="true" />
                                        </div>
                                        <!-- Form Row-->
                                        <div class="form-row">
                                            <!-- Form Group (phone number)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value='<?php echo $dbmob;?>' disabled="true" />
                                            </div>
                                            <!-- Form Group (birthday)-->
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday" value='<?php echo $dbbirth;?>' disabled="true" />
                                            </div>
                                        </div>
                                        <!-- Save changes button-->
                                        <button class="btn btn-primary" type="button" onclick="savechange();" id="savechanges" disabled="true">Save changes</button>
                                        <button class="btn btn-primary" type="button" id="editchanges" onclick="editchange();"> Edit </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/date-range-picker-demo-single.js"></script>
</body>

</html>
