<?php
include("include/session.php");
include("include/db_conx.php");
include("functions/get_all_job_information.php");

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
                                    <h2 class="title-1">Overview Of All Jobs</h2>
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
                                                    <h2><?php echo get_total_no_of_jobs($conn, $cust_id); ?></h2>
                                                    <span>Total Unique Jobs Added</span>
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
                                                    <h2 id="active-internal-count"><?php echo get_total_no_active_interanl_jobs($conn, $cust_id); ?></h2>
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
                                                    <h2 id="active-external-count"><?php echo get_total_no_active_external_jobs($conn, $cust_id); ?></h2>
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
                                                    <h2 id="completed-jobs"><?php echo get_total_no_completed_jobs($conn, $cust_id); ?></h2>
                                                    <span>Total Completed Jobs</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border float-right">
                                        
                                        </div>
                                        <div class="rs-select2--dark rs-select2--lg m-r-10 rs-select2--border float-left">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="fa fa-search"></i>&#160;Search</span>
                                              </div>
                                              <input type="text" id="job-search" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="table-responsive table-data">
                                        <table class="table table-data2" id="table">
                                            <thead>
                                                <tr>
                                                    <th onclick="sortTable(0)"><a style="color: #555;" href="#">job id</a></th>
                                                    <th onclick="sortTable(1)"><a style="color: #555;" href="#">#invoice</a></th>
                                                    <th onclick="sortTable(2)"><a style="color: #555;" href="#">name</a></th>
                                                    <th onclick="sortTable(3)"><a style="color: #555;" href="#">type</a></th>
                                                    <th onclick="sortTable(4)"><a style="color: #555;" href="#">status</a></th>
                                                    <th onclick="sortTable(5)"><a style="color: #555;" href="#">date issued</a></th>
                                                    <th>job details</th>
                                                </tr>
                                            </thead>
                                            <tbody id="job-table-search">
                                                <?php echo $view_all_jobs_table; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
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
                <div class="modal fade" id="view_internal_job" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel"><div id="internal_job_title"></div></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <form method="post" enctype="multipart/form-data" class="form-horizontal" id="update_internal_job">
                                   <div class="card-body card-block" id="internal_form">
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Invoice No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="i-invoice-input" name="i-invoice-input" placeholder="Text" class="form-control">
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class="form-control-label">Article</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="i-article-input" name="i-article-input" placeholder="Text" class="form-control">
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Model No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="i-model-input" name="i-model-input" placeholder="Text" class="form-control">
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="text-input" class=" form-control-label">Aux Equip With</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="text" id="i-aux-input" name="i-aux-input" placeholder="Text" class="form-control">
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class=" form-control-label">Fault</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <textarea name="i-fault-input" id="i-fault-input" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class=" form-control-label">Damages Noted</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <textarea name="i-damages-input" id="i-damages-input" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div class="row form-group">
                                           <div class="col col-md-3">
                                               <label for="textarea-input" class="form-control-label">Job Description</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="hidden" id="i-customer-input" name="i-customer-input" value="<?php echo clean_input($_GET["cust"]) ?>">
                                               <textarea name="i-description-input" id="i-description-input" rows="4" placeholder="Content..." class="form-control"></textarea>
                                           </div>
                                       </div>
                                       <div id="add-spare-list"></div>
                                       <div id="spare-list"></div>
                                       <div class="card-footer">
                                           <button type="submit" name="insert" id="insert" value="Insert" value="Insert" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Update
                                            </button>
                                           <button type="button" class="btn btn-success btn-sm" id="add">
                                               <i class="fa fa-plus"></i> Add Spares
                                           </button>
                                           <div id="internal_status"></div>
                                       </div>
                                   </div> 
                               </form>
                            </div>
                            <div class="modal-footer">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal" id="job_active_status_change_internal">
                                    <div id="active_change_buttons_internal"></div>
                                </form>
                                <form action="functions/create_pdf.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="create_internal_pdf" target="_blank">
                                    <button type="submit" name="create_pdf" id="get_internal_pdf" value="Download PDF" class="btn btn-danger btn-sm">
                                        <i class="fa fa-file"></i> Download PDF
                                    </button>
                                </form>
                                <button type="submit" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times"></i> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal large -->
                <div class="modal fade" id="view_external_job" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel"><div id="external_job_title"></div></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <form method="post" enctype="multipart/form-data" class="form-horizontal" id="update_external_job">
                                    <div class="card-body card-block" id="external_form">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">Invoice No</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="invoice-input-e" name="invoice-input-e" placeholder="Text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Job Description</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="hidden" id="e-customer-input" name="e-customer-input" value="<?php echo clean_input($_GET["cust"]) ?>">
                                                <textarea name="description-input-e" id="description-input-e" rows="4" placeholder="Content..." class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="insert" id="insert" value="Insert" value="Insert" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Update
                                            </button>
                                            <div id="external_status"></div>
                                        </div>
                                    </div>
                               </form>
                            </div>
                            <div class="modal-footer">
                                <form method="post" enctype="multipart/form-data" class="form-horizontal" id="job_active_status_change_external">
                                    <div id="active_change_buttons_external"></div>
                                </form>
                                <form action="functions/create_pdf.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="create_external_pdf" target="_blank">
                                    <button type="submit" name="create_pdf" id="get_external_pdf" value="Download PDF" class="btn btn-danger btn-sm">
                                        <i class="fa fa-file"></i> Download PDF
                                    </button>
                                </form>
                                <button type="submit" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times"></i> Close
                                </button>
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