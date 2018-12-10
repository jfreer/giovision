<?php
include("include/session.php");
include("include/db_conx.php");
include("functions/get_customer_information.php");
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
                                    <h2 class="title-1">Add Internal Job</h2>
                                </div>
                            </div>
                        </div>

                        <br>

                        <form method="post" enctype="multipart/form-data" class="form-horizontal" id="insert_internal_job">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Internal Job</strong> Information
                                </div>
                                <div class="card-body card-block" id="customer_form">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Invoice No<span style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="invoice-input" name="invoice-input" placeholder="Text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Article<span style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="article-input" name="article-input" placeholder="Text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Model No<span style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="model-input" name="model-input" placeholder="Text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Aux Equip With<span style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="aux-input" name="aux-input" placeholder="Text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Fault<span style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="fault-input" id="fault-input" rows="4" placeholder="Content..." class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Damages Noted<span style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="damages-input" id="damages-input" rows="4" placeholder="Content..." class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Job Description<span style="color: red;">*</span></label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="hidden" id="customer-input" name="customer-input" value="<?php echo clean_input($_GET["cust"]) ?>">
                                            <textarea name="description-input" id="description-input" rows="4" placeholder="Content..." class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">List Of Spares</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="text" name="spares-input[]" id="spares-input" class="form-control" placeholder="Spares">
                                        </div>
                                        <div class="col-2">
                                            <input type="text" name="qty-input[]" id="spares-input" class="form-control" placeholder="Qty">
                                        </div>
                                        <div class="col-2">
                                            <input type="text" name="amount-input[]" id="spares-input" class="form-control" placeholder="Amount">
                                        </div>
                                    </div>
                                    <div id="spare-list"></div>
                                    <div class="card-footer">
                                        <button type="submit" name="insert" id="insert" value="Insert" value="Insert" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm" id="add">
                                            <i class="fa fa-plus"></i> Add Spares
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
