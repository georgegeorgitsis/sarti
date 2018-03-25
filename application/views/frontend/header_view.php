<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sarti.gr Backend">
        <meta name="keyword" content="Sarti.gr Backend">
        <link rel="shortcut icon" href="assets/img/favicon.png">

        <title>Rooms Sarti</title>

        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Raleway:300,400,500&amp;subset=latin-ext" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->
        <style>
        /* Absolute Center Spinner */
            .loader-wrapper{
                position: fixed;
                width: 100%;
                height: 100%;
                background-color: #fcfcfc;
                z-index: 999999;
            }
            .loading {
            position: fixed;
            z-index: 999;
            height: 2em;
            width: 2em;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            }

            /* Transparent Overlay */
            .loading:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(225,225,225,0.3);
            }

            /* :not(:required) hides these rules from IE9 and below */
            .loading:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
            }

            .loading:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 1500ms infinite linear;
            -moz-animation: spinner 1500ms infinite linear;
            -ms-animation: spinner 1500ms infinite linear;
            -o-animation: spinner 1500ms infinite linear;
            animation: spinner 1500ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(50, 180, 200, 0.75) 1.5em 0 0 0, rgba(50, 180, 200, 0.75) 1.1em 1.1em 0 0, rgba(50, 180, 200, 0.75) 0 1.5em 0 0, rgba(50, 180, 200, 0.75) -1.1em 1.1em 0 0, rgba(50, 180, 200, 0.75) -1.5em 0 0 0, rgba(50, 180, 200, 0.75) -1.1em -1.1em 0 0, rgba(50, 180, 200, 0.75) 0 -1.5em 0 0, rgba(50, 180, 200, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(50, 180, 200, 0.75) 1.5em 0 0 0, rgba(50, 180, 200, 0.75) 1.1em 1.1em 0 0, rgba(50, 180, 200, 0.75) 0 1.5em 0 0, rgba(50, 180, 200, 0.75) -1.1em 1.1em 0 0, rgba(50, 180, 200, 0.75) -1.5em 0 0 0, rgba(50, 180, 200, 0.75) -1.1em -1.1em 0 0, rgba(50, 180, 200, 0.75) 0 -1.5em 0 0, rgba(50, 180, 200, 0.75) 1.1em -1.1em 0 0;
            }

            /* Animation */

            @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
            }
            @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
            }
            @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
            }
            @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
            }
        </style>
        
        <link href="<?= base_url('assets/css/fonts.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
        <link href="<?= base_url('assets/css/bootstrap-theme_f.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/front/flexbox.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" />    
        <link href="<?= base_url('assets/css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/jCalendar.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/select2.min.css'); ?>" rel="stylesheet"/>

        <link href="<?= base_url('assets/css/vendor/lightslider.min.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/vendor/lightgallery.min.css'); ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/vendor/bootstrap-slider.min.css'); ?>" rel="stylesheet"/>

        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendor/datatables/datatables.min.css'); ?>">
  
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datepicker.min.css'); ?>"/>

        <link rel="stylesheet" href="https://rooms.sarti.gr/shared-assets/components-style.css">

        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/f_style.css'); ?>"/>
        <?php if (isset($css_files) && count($css_files) > 0): ?>
            <?php foreach ($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
        <?php endif; ?>
        <script type="text/javascript" src="<?= base_url('assets/js/vendor/jquery.min.js') ?>"></script>
        <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> -->
        
    </head>
    <body>
    <div class="loader-wrapper">
    <div class="loading">Loading&#8230;</div>
    </div>
    <?php require_once(VIEWPATH . 'frontend/shared/header.php'); ?>

        
        <div class="wrapper">

