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
        <link href="<?= base_url('assets/css/style-responsive.css'); ?>" rel="stylesheet" />
        <link href="<?= base_url('assets/css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datetimepicker.min.css'); ?>"/>
        <?php if (isset($css_files)) { ?>
            <?php foreach ($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
        <?php } ?>

        <script src="<?= base_url('assets/js/jquery.js'); ?>"></script>
        <script src="<?= base_url('assets/js/jquery-1.8.3.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/jquery-ui-1.9.2.custom.min.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
        <script src="<?= base_url('assets/js/scripts.js'); ?>"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/moment.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap-datetimepicker.min.js') ?>"></script>

        <?php if (isset($js_files)) { ?>
            <?php foreach ($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>
        <?php } ?>

    </head>
    <body>
        <header>
            Header
        </header>
        <div class="wrapper">
            <div class="container">
            <div class="col-md-3">
                sidebar
            </div>
            <div class="col-md-9">