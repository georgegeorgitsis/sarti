<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sarti.gr Backend">
        <meta name="keyword" content="Sarti.gr Backend">
        <link rel="shortcut icon" href="img/favicon.png">
        <title>Sarti.gr Backend</title>
        
        <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/bootstrap-theme.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/elegant-icons-style.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" />    
        <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/select2.min.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.min.css'); ?>"/>
        <?php if (isset($css_files)) { ?>
            <?php foreach ($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
        <?php } ?>
        
        <script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
        <!-- <script src="<?= "" //base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script> -->
        <script src="<?= base_url('assets/js/jquery-ui-1.9.2.custom.min.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
        <script src="<?= base_url('assets/js/select2.full.min.js'); ?>"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/moment.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap-datepicker.min.js') ?>"></script>
        
        <?php if (isset($js_files)) { ?>
            <?php foreach ($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>
        <?php } ?>
        
    </head>
    <body>
        <!-- container section start -->
        <section id="container" class="">
            
            <header class="header dark-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>
                <a href="<?= $admin_url ?>/dashboard" class="logo">Sarti.<span class="lite">gr</span></a>
                <div class="top-nav notification-row">                
                    <ul class="nav pull-right top-menu">
                        <li id="mail_notificatoin_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-envelope-l"></i>
                                <span class="badge bg-important">5</span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                <div class="notify-arrow notify-arrow-blue"></div>
                                <li>
                                    <p class="blue">You have 5 new messages</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src=""></span>
                                        <span class="subject">
                                            <span class="from">Greg  Martin</span>
                                            <span class="time">1 min</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src=""></span>
                                        <span class="subject">
                                            <span class="from">Bob   Mckenzie</span>
                                            <span class="time">5 mins</span>
                                        </span>
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src=""></span>
                                        <span class="subject">
                                            <span class="from">Phillip   Park</span>
                                            <span class="time">2 hrs</span>
                                        </span>
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src=""></span>
                                        <span class="subject">
                                            <span class="from">Ray   Munoz</span>
                                            <span class="time">1 day</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">See all messages</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= $admin_url . "auth/logout" ?>">
                                <span class="username">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </header>      
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <ul class="sidebar-menu">                
                        <li class="active">
                            <a class="" href="<?= $admin_url ?>dashboard">
                                <i class="icon_house_alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a class="">
                                <i class="icon_document_alt"></i>
                                <span>Languages</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "languages") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'languages' ?>">All Languages</a></li>
                                <li><a class="" href="<?= $admin_url . 'languages/addLanguage' ?>">Add Language</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="">
                                <i class="icon_document_alt"></i>
                                <span>Packages</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "packages") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'packages' ?>">All Packages</a></li>
                                <li><a class="" href="<?= $admin_url . 'packages/addPackage' ?>">Add Package</a></li>
                                <li><a class="" href="<?= $admin_url . 'packages/showPackagePeriods' ?>">Package Periods</a></li>
                                <li><a class="" href="<?= $admin_url . 'packages/massSpecialOffer' ?>">Mass Special Offer</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_desktop"></i>
                                <span>Facilities</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "facilities") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'facilities/categories' ?>">Facility Categories</a></li>
                                <li><a class="" href="<?= $admin_url . 'facilities/addCategory' ?>">Add Category</a></li>
                                <li><a class="" href="<?= $admin_url . 'facilities' ?>">All Facilities</a></li>
                                <li><a class="" href="<?= $admin_url . 'facilities/addFacility' ?>">Add Facility</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="">
                                <i class="icon_document_alt"></i>
                                <span>Boards</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "boards") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'boards' ?>">All Boards</a></li>
                                <li><a class="" href="<?= $admin_url . 'boards/addBoard' ?>">Add Board</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="">
                                <i class="icon_document_alt"></i>
                                <span>Locations</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "locations") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'locations' ?>">All Locations</a></li>
                                <li><a class="" href="<?= $admin_url . 'locations/addLocation' ?>">Add Location</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_desktop"></i>
                                <span>Hotels</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "hotels") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'hotels' ?>">All Hotels</a></li>
                                <li><a class="" href="<?= $admin_url . 'hotels/addHotel' ?>">Add Hotel</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_desktop"></i>
                                <span>Rooms</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "rooms") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'rooms/showRoomTypes' ?>">All Room Types</a></li>
                                <li><a class="" href="<?= $admin_url . 'rooms/addRoomType' ?>">Add Room Type</a></li>
                                <li><a class="" href="<?= $admin_url . 'rooms' ?>">All Rooms</a></li>
                                <li><a class="" href="<?= $admin_url . 'rooms/groundPlans' ?>">Ground Plans</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="">
                                <i class="icon_document_alt"></i>
                                <span>Banners</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "boards") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'banners' ?>">All Banners</a></li>
                                <li><a class="" href="<?= $admin_url . 'banners/add' ?>">Add Banner</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="">
                                <i class="icon_document_alt"></i>
                                <span>Menus</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "boards") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'menus' ?>">All Menus</a></li>
                                <li><a class="" href="<?= $admin_url . 'menus/add' ?>">Add Menu</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon_desktop"></i>
                                <span>Bookings</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub" <?php if($controller == "bookings") echo "style='display:block'" ?>>
                                <li><a class="" href="<?= $admin_url . 'bookings' ?>">All Bookings</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
            <?php
            $message = $this->session->flashdata('message');
            $error = $this->session->flashdata('error');
                
            if (!empty($message)) {
                ?>
            <section id="main-content">
                <section class="wrapper">
                    <div class="">
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong><?php echo $message; ?></strong>
                        </div>
                    </div>
                </section>
            </section>
            <?php } ?>
            <?php if (!empty($error)) { ?>
            <section id="main-content">
                <section class="wrapper">
                    <div class="">
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong><?= $error; ?></strong>
                        </div>
                    </div>
                </section>
            </section>
            <?php } ?>
            <?php
            $validation_errors = validation_errors();
            if (!empty($validation_errors)) {
                ?>
            <section id="main-content">
                <section class="wrapper">
                    <div class="row">
                        <div class="">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h3><?php echo validation_errors(); ?></h3>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
                <?php
            }
            ?>