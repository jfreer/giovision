<?php
include("include/session.php");
include("include/db_conx.php");
include("functions/get_all_jobs.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include("include/header.php"); ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include("include/sidebar.php"); ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include("include/header-desktop.php"); ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <center>
                                                    <h2><?php echo get_total_no_of_customers($conn); ?></h2>
                                                    <span>Total Unique Customers</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <center>
                                                    <h2><?php echo get_total_no_of_internal_active_jobs($conn); ?></h2>
                                                    <span>Total Active Internal Jobs</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <center>
                                                    <h2><?php echo get_total_no_of_external_active_jobs($conn) ?></h2>
                                                    <span>Total Active External Jobs</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-check"></i>
                                            </div>
                                            <div class="text">
                                                <center>
                                                    <h2><?php echo get_total_no_of_jobs_completed($conn) ?></h2>
                                                    <span>Total Completed Jobs</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <hr>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--dark rs-select2--lg rs-select2--dark2">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search"></i>&#160;Search</span>
                                              </div>
                                              <input type="text" id="customer-search" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#largeModal">
                                            <i class="zmdi zmdi-plus"></i>add customer</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" id="table">
                                        <thead>
                                            <tr>
                                                <th onclick="sortTable(0)"><a style="color: #555;" href="#">#ID</a></th>
                                                <th onclick="sortTable(1)"><a style="color: #555;" href="#">Name</a></th>
                                                <th onclick="sortTable(2)"><a style="color: #555;" href="#">Email</a></th>
                                                <th onclick="sortTable(3)"><a style="color: #555;" href="#">Cell No.</a></th>
                                                <th onclick="sortTable(4)"><a style="color: #555;" href="#">Residential Address</a></th>
                                                <th onclick="sortTable(5)"><a style="color: #555;" href="#">No. Open Jobs</a></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="customer-table-search">
                                           <?php echo get_all_customer_information($conn); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal large -->
                <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Add New Customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <div id="customer_success"></div>
                               <div class="card-body card-block" id="customer_form">
                                   <form method="post" enctype="multipart/form-data" class="form-horizontal" id="insert_form">
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Name</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="name-input" name="name-input" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your name</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="email-input" class=" form-control-label">Email</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="email" id="email-input" name="email-input" placeholder="Enter Email" class="form-control">
                                               <small class="help-block form-text">Please enter your email</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Telephone No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="number" id="tel-input" name="tel-input" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your telephone number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Cell No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="number" id="cell-input" name="cell-input" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your cell number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class=" form-control-label">Residential Address</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <textarea name="residential-input" id="residential-input" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class=" form-control-label">Postal Address</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <textarea name="postal-input" id="postal-input" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Multichoice No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="multichoice-input" name="multichoice-input" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your multichoice account number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">SABC License No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="sabc-input" name="sabc-input" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your SABC license number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label class=" form-control-label">Payment Method</label>
                                           </div>
                                           <div class="col col-md-9">
                                               <div class="form-check">
                                                   <div class="radio">
                                                       <label for="radio1" class="form-check-label ">
                                                           <input type="radio" id="radio1" name="payment-input" value="cash" class="form-check-input" checked>Cash
                                                       </label>
                                                   </div>
                                                   <div class="radio">
                                                       <label for="radio2" class="form-check-label ">
                                                           <input type="radio" id="radio2" name="payment-input" value="card" class="form-check-input">Card
                                                       </label>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-footer">
                                           <button type="submit" name="insert" id="insert" value="Insert" class="btn btn-primary btn-sm">
                                               <i class="fa fa-dot-circle-o"></i> Submit
                                           </button>
                                           <button type="reset" class="btn btn-danger btn-sm">
                                               <i class="fa fa-ban"></i> Reset
                                           </button>
                                       </div>
                                   </form>
                               </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal large -->
                <!-- modal large linked to update -->
                <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Update Customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <div id="customer_success"></div>
                               <div class="card-body card-block" id="customer_form">
                                   <form method="post" enctype="multipart/form-data" class="form-horizontal" id="update_customer_form">
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Name</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="name-input-u" name="name-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your name</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="email-input" class=" form-control-label">Email</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="email" id="email-input-u" name="email-input-u" placeholder="Enter Email" class="form-control">
                                               <small class="help-block form-text">Please enter your email</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Telephone No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="number" id="tel-input-u" name="tel-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your telephone number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Cell No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="number" id="cell-input-u" name="cell-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your cell number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class=" form-control-label">Residential Address</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <textarea name="residential-input-u" id="residential-input-u" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class=" form-control-label">Postal Address</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <textarea name="postal-input-u" id="postal-input-u" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Multichoice No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="multichoice-input-u" name="multichoice-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your multichoice account number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">SABC License No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="sabc-input-u" name="sabc-input-u" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your SABC license number</small>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label class=" form-control-label">Payment Method</label>
                                           </div>
                                           <div class="col col-md-9">
                                               <div class="form-check">
                                                   <div class="radio">
                                                       <label for="radio1" class="form-check-label ">
                                                           <input type="radio" id="radio1-u" name="payment-input-u" value="cash" class="form-check-input" checked>Cash
                                                       </label>
                                                   </div>
                                                   <div class="radio">
                                                       <label for="radio2" class="form-check-label ">
                                                           <input type="radio" id="radio2-u" name="payment-input-u" value="card" class="form-check-input">Card
                                                       </label>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="card-footer">
                                           <button type="submit" name="insert-u" id="insert-u" value="Update" class="btn btn-primary btn-sm">
                                               <i class="fa fa-dot-circle-o"></i> Update
                                           </button>
                                       </div>
                                   </form>
                               </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal large -->
                <div class="modal fade" id="create_job" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Add New Job</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <div id="job_modal"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!--Custom Javascript -->
    <script src="js/ajax-calls.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->