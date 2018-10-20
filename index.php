<?php
include("include/db_conx.php");
include("functions/get_all_jobs.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/dashboard-includes.php"); ?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php include("include/dashboard-sidebar.php"); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php include("include/include/dashboard-topbar.php"); ?>

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
                                                    <h2>100</h2>
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
                                                <i class="zmdi zmdi-power"></i>
                                            </div>
                                            <div class="text">
                                                <center>
                                                    <h2>38</h2>
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
                                                    <h2>49</h2>
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
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <center>
                                                    <h2>16</h2>
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
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="table-data__tool-right">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#largeModal">
                                            <i class="zmdi zmdi-plus"></i>add customer</button>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Cell No.</th>
                                                <th>Residential Address</th>
                                                <th>No. Open Jobs</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                <h5 class="modal-title" id="largeModalLabel">Add New Customer</h5>
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