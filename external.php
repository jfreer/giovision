<?php
include("include/db_conx.php");
include("functions/get_customer_information.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ("include/dashboard-includes.php"); ?>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php include("include/dashboard-sidebar.php"); ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php include("include/dashboard-topbar.php"); ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Add External Job</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#largeModal">
                                        <i class="zmdi zmdi-plus"></i>add customer
                                    </button>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="card">
                            <div class="card-header">
                                <strong>Customer</strong> Information
                            </div>
                            <div class="card-body card-block" id="customer_form">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name-input" name="name-input" value="<?php echo $name ?>" class="form-control" disabled>
                                        <small class="form-text text-muted">Please enter your name</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="email-input" name="email-input" value="<?php echo $email ?>" class="form-control" disabled>
                                        <small class="help-block form-text">Please enter your email</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Telephone No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="tel-input" name="tel-input" value="<?php echo $tel_no ?>" class="form-control" disabled>
                                        <small class="form-text text-muted">Please enter your telephone number</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Cell No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number" id="cell-input" name="cell-input" value="<?php echo $cell_no ?>" class="form-control" disabled>
                                        <small class="form-text text-muted">Please enter your cell number</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Residential Address</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="residential-input" id="residential-input" rows="4" value="" class="form-control" disabled><?php echo $residential_address ?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Postal Address</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="postal-input" id="postal-input" rows="4" value="" class="form-control" disabled><?php echo $postal_address ?></textarea>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Multichoice No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="multichoice-input" name="multichoice-input" value="<?php echo $multichoice_acc ?>" class="form-control" disabled>
                                        <small class="form-text text-muted">Please enter your multichoice account number</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">SABC License No</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="sabc-input" name="sabc-input" value="<?php echo $sabc_license ?>" class="form-control" disabled>
                                        <small class="form-text text-muted">Please enter your SABC license number</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Payment Method</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <?php echo get_payment_option($payment_method) ?>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button value="Insert" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Update
                                    </button>
                                </div>
                            </div>
                        </div>

                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="insert_external_job">
                            <div class="card">
                                <div class="card-header">
                                    <strong>External Job</strong> Information
                                </div>
                                <div class="card-body card-block" id="customer_form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Job Description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="hidden" id="customer-input" name="customer-input" value="<?php echo clean_input($_GET["cust"]) ?>">
                                            <textarea name="description-input" id="description-input" rows="4" placeholder="Content..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="insert" id="insert" value="Insert" value="Insert" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

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
                                   <form action="posth.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="insert_form">
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
                                               <label for="text-input" class=" form-control-label">ID No</label>
                                           </div>
                                           <div class="col-12 col-md-9">
                                               <input type="number" id="id-input" name="id-input" placeholder="Text" class="form-control">
                                               <small class="form-text text-muted">Please enter your ID number</small>
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
