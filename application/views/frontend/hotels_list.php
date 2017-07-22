<?php if (isset($hotels) && !empty($hotels)) { ?>
    <?php foreach ($hotels as $hotel) { ?>
        <div class="row">
            <div class="each-hotel clearfix">
                <div class="col-md-12 no-padding clearfix">
                    <div class="col-md-4 no-padding">
                        <img src="<?= base_url('assets/uploads/') . $hotel['thumb']['image_name'] ?>"/>
                    </div>
                    <div class="col-md-8 no-padding clearfix">
                        <div class="col-md-12 no-padding clearfix">
                            <div class="hotel-title">
                                <a href="<?= base_url('hotel/' . $hotel['hotel_id']) ?>">
                                    <h3><?= $hotel['hotel_name'] ?></h3>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding clearfix">
                            <div class="col-md-8 no-padding">
                                <div class="hotel-box-wrapper clearfix">
                                    <div class="col-md-12 clearfix no-padding">
                                        <div class="location-distances clearfix">
                                            <?php if ($hotel['location_name']) { ?>
                                                <span class="location-name"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $hotel['location_name'] ?></span>
                                            <?php } ?>
                                            <span class="distance">
                                                <?php if ($hotel['distance_from_sea']) { ?>
                                                    <span><i class="fa fa-car" aria-hidden="true"></i> <?= $hotel['distance_from_sea'] ?>m from sea</span>
                                                <?php } ?>
                                                <?php if ($hotel['distance_from_center']) { ?>
                                                    <span><i class="fa fa-car" aria-hidden="true"></i> <?= $hotel['distance_from_center'] ?>m from center</span>
                                                <?php } ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php if (isset($hotel['main_facilities']) && !empty($hotel['main_facilities'])) { ?>
                                        <div class="col-md-12 no-padding clearfix">
                                            <div class="hotel-main-facilities">
                                                <?php foreach ($hotel['main_facilities'] as $fac) { ?>
                                                    <span class="main-facility">
                                                        <img src="<?= base_url('assets/uploads/' . $fac['facility_icon']) ?>"/> <?= $fac['facility_name'] ?>
                                                    </span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-12 no-padding clearfix">
                                        <div class="hotel-desc">
                                            <p>
                                                <?= mb_substr($hotel['hotel_short_description'], 0, 150) . "..." ?>
                                                <span class="read-more"><a href="<?= base_url('hotel/' . $hotel['hotel_id']) ?>">Read more</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 no-padding">

                            </div>
                        </div>
                    </div>
                </div>
                <?php /* ?>
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
                 * <?php */ ?>
            </div>
        </div>
    <?php } ?>
    <p><?php echo $links; ?></p>
<?php } ?>