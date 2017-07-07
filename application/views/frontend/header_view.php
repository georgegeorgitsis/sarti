<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sarti.gr Backend">
        <meta name="keyword" content="Sarti.gr Backend">
        <link rel="shortcut icon" href="img/favicon.png">

        <title>Sarti.gr Front</title>

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=greek,latin' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="<?= base_url('assets/css/bootstrap-theme_f.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet" />    
        <link href="<?= base_url('assets/css/jquery-ui-1.10.4.min.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-datetimepicker.min.css'); ?>"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.css"/>


        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/f_style.css'); ?>"/>
        <?php if (isset($css_files)) { ?>
            <?php foreach ($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
        <?php } ?>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/moment.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap-datetimepicker.min.js') ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js"></script>
        <script type="text/javascript">
            $(window).load(function () {
                $("input[name='checkin'], input[name='checkout']").datetimepicker({
                    format: 'YYYY-MM-DD'
                });

                $(".slider").bxSlider({
                    pager: false
                });
            })

        </script>
    </head>
    <body>
        <header>
            Header
        </header>
        <div class="wrapper">

