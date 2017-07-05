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
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/f_style.css'); ?>"/>
        <?php if (isset($css_files)) { ?>
            <?php foreach ($css_files as $file): ?>
                <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
            <?php endforeach; ?>
        <?php } ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/moment.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap-datetimepicker.min.js') ?>"></script>

        <script type="text/javascript">
            $(window).load(function () {
                $("input[name='checkin'], input[name='checkout']").datetimepicker({
                    format: 'YYYY-MM-DD'
                });
            })

        </script>
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
                        <?php if (isset($is_search) && $is_search == 1) { ?>
                            <a href="<?= base_url('hotels') ?>" class="btn btn-info">Show all Hotels</a>
                        <?php } ?>
                        <div class="search">
                            <div class="accommodation-search destination clearfix">
                                Destination: 
                                <select name="search_destination">
                                    <?php foreach ($locations as $location) { ?>
                                        <option value="<?= $location['location_id'] ?>"><?= $location['location_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="accommodation-search clearfix">
                                <form method="GET" action="<?= base_url('hotels/searchHotels/1') ?>">
                                    <div class="col-md-12">
                                        <h4>I have the days</h4>
                                    </div>
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
                                                <option value="<?= $i; ?>" <?= ($i == 2) ? "selected" : "" ?>><?= $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info">
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="accommodation-search clearfix">
                                <form method="GET" action="<?= base_url('hotels/searchHotels/2') ?>">
                                    <div class="col-md-12">
                                        <h4>Show me the 7 days DEALS</h4>
                                    </div>
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
                                                <option value="<?= $i; ?>" <?= ($i == 2) ? "selected" : "" ?>><?= $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info">
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="accommodation-search clearfix">
                                <form method="GET" action="<?= base_url('hotels/searchHotels/3') ?>">
                                    <div class="col-md-12">
                                        <h4>Show me the 9-10-11-12 days DEALS</h4>
                                    </div>
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
                                                <option value="<?= $i; ?>" <?= ($i == 2) ? "selected" : "" ?>><?= $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info">
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="accommodation-search room-types clearfix">
                                <div class="col-md-12">
                                    <h4>Room Types</h4>
                                </div>
                                <?php foreach ($room_types as $type) { ?>
                                    <div class="col-md-12">
                                        <input type="checkbox" name="room_type" class="room-type" value="<?= $type['room_type_id'] ?>"> <?= $type['room_type_name'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="accommodation-search boards clearfix">
                                <div class="col-md-12">
                                    <h4>Boards</h4>
                                </div>
                                <?php foreach ($boards as $board) { ?>
                                    <div class="col-md-12">
                                        <input type="checkbox" name="board" class="board" value="<?= $board['board_id'] ?>"> <?= $board['board_name'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="accommodation-search facilities clearfix">
                                <div class="col-md-12">
                                    <h4>Facilities</h4>
                                </div>
                                <?php foreach ($facilities as $facility) { ?>
                                    <div class="col-md-12">
                                        <input type="checkbox" name="facility" class="facility" value="<?= $facility['facility_id'] ?>"> 
                                        <img src="<?= base_url('assets/uploads/' . $facility['facility_icon']) ?>"/>
                                        <?= $facility['facility_name'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">