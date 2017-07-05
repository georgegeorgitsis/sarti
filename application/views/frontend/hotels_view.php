<div class="col-md-12 clearfix">
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
                                <div class="hotel-desc">
                                    <p>
                                        <?= $hotel['hotel_short_description'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <p><?php echo $links; ?></p>
    <?php } ?>
</div>

