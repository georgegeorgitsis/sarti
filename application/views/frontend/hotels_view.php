<div class="slider-wrapper">
    <div class="slider">
        <img src="http://pull1.sweeticecoltd.netdna-cdn.com/wp-content/uploads/2015/03/rev_slider_original_4.jpg?bc3caa"/>
        <img src="http://www.hare.com/wp-content/uploads/2015/05/yas-island-hotel-bridges2-1920x600.jpg"/>
    </div>
</div>
<?php //var_dump($hotels) ?>
<div class="container">
    <div class="col-md-3">
        <?php require_once(VIEWPATH . 'frontend/sidebar.php'); ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12 clearfix no-padding">
                <div class="hotels-sorting clearfix">
                    <div class="col-md-3">
                        SORT BY:
                    </div>
                    <div class="col-md-3">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">TITLE
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">ASCENDING</a></li>
                                <li><a href="#">DESCENDING</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">PRICE
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">ASCENDING</a></li>
                                <li><a href="#">DESCENDING</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">LOCATION
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">ASCENDING</a></li>
                                <li><a href="#">DESCENDING</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hotels-list">
            <?php if (isset($hotels) && !empty($hotels)) { ?>
                <?php foreach ($hotels as $hotel) { ?>
                    <div class="row">
                        <div class="each-hotel clearfix">
                            <div class="col-md-12 no-padding clearfix">
                                <div class="col-md-4 no-padding">
                                    <img src="<?= base_url('assets/uploads/') . $hotel['thumb']['image_name'] ?>"/>
                                </div>
                                <div class="col-md-8 no-padding">
                                    <div class="hotel-box-wrapper">
                                        <div class="hotel-title">
                                            <a href="<?= base_url('hotel/' . $hotel['hotel_id']) ?>">
                                                <h3><?= $hotel['hotel_name'] ?></h3>
                                            </a>
                                            <div class="distance">
                                                <?php if ($hotel['distance_from_sea']) { ?>
                                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $hotel['distance_from_sea'] ?>m</span>
                                                <?php } ?>
                                                <?php if ($hotel['distance_from_center']) { ?>
                                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $hotel['distance_from_center'] ?>m</span>
                                                <?php } ?>
                                                <?php if ($hotel['location_name']) { ?>
                                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $hotel['location_name'] ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="hotel-main-facilities">
                                            <?php if (isset($hotel['main_facilities']) && !empty($hotel['main_facilities'])) { ?>
                                                <?php foreach ($hotel['main_facilities'] as $fac) { ?>
                                                    <span class="main-facility">
                                                        <img src="<?= base_url('assets/uploads/' . $fac['facility_icon']) ?>"/> <?= $fac['facility_name'] ?>
                                                    </span>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <div class="hotel-desc">
                                            <p>
                                                <?= mb_substr($hotel['hotel_short_description'], 0, 100) ?>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="hotel-rooms">
                                    <?php if (isset($hotel['rooms']) && !empty($hotel['rooms'])) { ?>
                                        <?php foreach ($hotel['rooms'] as $room) { ?>
                                            <div class="col-md-12">
                                                <?= $room['room_name'] ?>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <p><?php echo $links; ?></p>
            <?php } ?>
        </div>
    </div>

