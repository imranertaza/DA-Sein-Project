<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DA-SEIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/dist/css/custom.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url()?>/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link rel="stylesheet" href="<?php print base_url(); ?>/admin/bower_components/select2/dist/css/select2.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" >

    <header class="main-header" id="reload">
        <!-- Logo -->
        <a href="<?php echo base_url()?>/Admin/Dashboard" class="logo">
            <span class="logo-lg"><b>DA-SEIN</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
<!--        <nav class="navbar navbar-static-top">-->
        <nav class="navbar navbar-fixed-top  mainnav" id="stickyNav" style="height: 50px;">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">


                <ul class="nav navbar-nav">
                    <li style="padding: 10px;"><button onclick="goBack()" class="btn btn-warning"> <i class="fa fa-fw fa-angle-double-left"></i> Go Back</button></li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url()?>/uploads/admin_image/<?php echo user(newSession()->userId)->pic;?>" class="img-circle" alt="User Image" width="25" height="25">
                            <span class="hidden-xs"><?php echo newSession()->name;?> <i class="fa fa-sign-out" aria-hidden="true"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo base_url()?>/uploads/admin_image/<?php echo user(newSession()->userId)->pic;?>" class="img-circle" alt="User Image" >

                                <p>
                                    <?php //echo profile_name();?>
                                    <?php echo newSession()->name;?>
                                    <!--                                    <small>Member since Nov. 2012</small>-->
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
<!--                                    <a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url('Admin/Login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <!--                    <li>-->
                    <!--                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
                    <!--                    </li>-->
                </ul>
            </div>
        </nav>
    </header>

    <div id="loading-image" style="background-color: #000;width: 100%;height: 100%;display: block;z-index: 3000;position: fixed;opacity: 0.6; display: none; " >
        <img style="position: absolute;z-index: 5000;top: 200px;left: 606px;"  src="<?php echo base_url() ?>/admin/uploads/loading.gif" />
        <p style="    position: absolute;
    z-index: 5000;
    top: 150px;
    left: 562px;
    font-size: 25px;
    color: #fff;"><?php //echo get_sup_settings_by_lavel('loading_message')?></p>
    </div>

