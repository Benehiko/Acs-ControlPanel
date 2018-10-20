<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Vehicles</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2
     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css"/>
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css"/>
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/>
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css"/>
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body class="skin-blue">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo"><b>ACS</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs"><?= $_SESSION['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                                <p>
                                    <?= $_SESSION['username'] ?>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a id="logout-button" href="#" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p><?= $_SESSION['username'] ?></p>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>

                <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="vehicles.php"><i class="fa fa-wheelchair"></i> Vehicles</a></li>
                <li><a href="users.php"><i class="fa fa-users"></i> Users</a></li>
                <li><a href="devices.php"><i class="fa fa-mobile"></i> Devices</a></li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Fleet Vehicle and Vehicle Management
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Add Fleet Vehicle</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form id="fleet-vehicle-form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Registration</label>
                                    <input id="registration" type="text" name="registration" class="form-control"
                                           placeholder="Registration">
                                </div>
                                <div class="form-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="fleet-user">Add User</label>
                                    </div>
                                    <select class="custom-select" id="fleet-user">
                                    </select>
                                </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button id="add-vehicle" type="submit" class="btn btn-primary">Add Fleet Vehicle
                                </button>
                            </div>
                        </form>
                        <hr/>
                        <!-- form End -->
                        <div class="box-header">
                            <h3 class="box-title">Search Fleet Vehicle</h3>
                        </div>
                        <form id="search-fleet-vehicle-form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Registration</label>
                                    <input id="fleet-numberplate" type="text" name="registration" class="form-control"
                                           placeholder="Registration">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button id="search-fleet-vehicle" type="submit" class="btn btn-primary">Search Fleet
                                    Vehicle
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-pane-right">
                        <div class="box-header">
                            <h3 class="box-title">Filtered Vehicles</h3>
                        </div><!-- /.box-header -->

                        <div class="box-body table-responsive no-padding">
                            <table id="vehicles-filter-table" class="table table-hover">
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Search Vehicles</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">From</label>
                                    <input id="vehicle-from" type="text" class="form-control" placeholder="From">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">To</label>
                                    <input id="vehicle-to" type="text" class="form-control" placeholder="To">
                                </div>
                                <div class="form-group">
                                    <label for="">Registration</label>
                                    <input id="vehicle-numberplate" type="text" class="form-control"
                                           placeholder="Registration">
                                </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button id="vehicle-filter" type="submit" class="btn btn-primary">Search Vehicles
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div><!-- /.content-wrapper -->
    <!-- Scripts -->
    <div>
        <!-- Bootstrap && Jquery + UI -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <!--<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!-- Morris.js charts -->
        <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
        <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>

        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <!-- Bootstrap WYSIHTML5 -->
        <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <!--<script src="dist/js/demo.js" type="text/javascript"></script>-->
        <!-- JQuery UI -->
        <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
        <!--<script src="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>-->

        <script src="jQuery/postData.js" type="text/javascript"></script>
        <script src="jQuery/checklogin.js" type="text/javascript"></script>
        <script src="jQuery/logout.js" type="text/javascript"></script>
        <script src="jQuery/filterVehicles.js" type="text/javascript"></script>
        <script src="jQuery/users.js" type="text/javascript"></script>
        <script>
            $("#vehicle-from").datetimepicker({
                dateFormat: "yy-mm-dd",
                timeFormat: "hh",
                changeMonth: true,
                changeYear: true
            });
            $("#vehicle-to").datetimepicker({
                dateFormat: "yy-mm-dd",
                timeFormat: "hh",
                changeMonth: true,
                changeYear: true
            });
            loadfleetUser();
        </script>
    </div>
</body>
</html>