<div class="container">
    <div class="hotels-list">
        <?php //var_dump($hotels); ?>
        <?php if (isset($hotels) && !empty($hotels)) { ?>
            <?php foreach ($hotels as $hotel) { ?>
                <div class="row">
                    <div class="each-hotel clearfix">
                        <div class="col-md-12 clearfix">
                            <div class="col-md-3">
                                <img src="<?= base_url('assets/uploads/') . $hotel['thumb']['image_name'] ?>"/>
                            </div>
                            <div class="col-md-9">
                                <div class="hotel-title">
                                    <h3><?= $hotel['hotel_name'] ?></h3>
                                    <div class="distance">
                                        <?php if ($hotel['distance_from_sea']) { ?>
                                            <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $hotel['distance_from_sea'] ?>m</span>
                                        <?php } ?>
                                        <?php if ($hotel['distance_from_center']) { ?>
                                            <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $hotel['distance_from_center'] ?>m</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="hotel-desc">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <p><?php echo $links; ?></p>
        <?php } ?>
    </div>
</div>

