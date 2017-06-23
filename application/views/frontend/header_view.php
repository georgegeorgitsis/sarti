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
        <link href="<?= base_url('assets/css/front/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/f_style.css'); ?>" rel="stylesheet">

        <script src="<?= base_url('assets/js/front/jquery-3.2.1.min'); ?>"></script>
        <script src="<?= base_url('assets/js/front/bootstrap.min.js'); ?>"></script>

    </head>
    <body>
        <header>
            Header
        </header>
        <div class="wrapper">
            <div class="container">
                <div class="col-md-3">
                    <div class="my-search">
                        <div class="title">
                            <h3>Accommodation Search</h3>
                        </div>
                        <div class="search">
                            <form method="GET" action="<?= base_url('hotels/searchAllotment') ?>">
                                <div class="col-md-12">
                                    <label>Checkin</label>
                                    <input type="text" name="checkin"/>
                                </div>
                                <div class="col-md-12">
                                    <label>Checkout</label>
                                    <input type="text" name="checkout"/>
                                </div>
                                <div class="col-md-12">
                                    <label>Adults</label>
                                    <select name="adults">
                                        <?php for ($i = 0; $i <= 10; $i++) { ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">