<?php if (isset($hotels) && !empty($hotels)): ?>
    <?php foreach ($hotels as $hotel): ?>
        <div class="row">
            <div class="each-hotel clearfix">
                <div class="col-md-12 no-padding clearfix">
                    <div class="col-md-4 padd-ex-left">
                        <img src="<?= base_url('assets/uploads/') . $hotel['thumb']['image_name'] ?>"/>
                    </div>
                    <div class="col-md-8 no-padding clearfix">
                        <div class="col-md-12 no-padding clearfix">
                            <div class="row hotel-title no-margin flex align-center">    
                                <div class="col-md-6">
                                    <a href="<?= base_url('hotel/' . $hotel['hotel_id']) ?>">
                                        <h3><?= $hotel['hotel_name'] ?></h3>
                                    </a>
                                </div>
                                <div class="col-md-6 flex flex-end align-center">
                                    <span class="icon-sign flex align-center">
                                        <span class="flex flex-center">
                                            <img class="icon-small" src="<?= base_url('assets/images/beach.png') ?>" alt="">
                                        </span>
                                        <h5> <?= $hotel['distance_from_sea']  ?>m </h5>
                                    </span>
                                    <span class="icon-sign flex align-center">
                                        <span class="flex flex-center">
                                            <img class="icon-small" src="<?= base_url('assets/images/city.png') ?>" alt="">
                                        </span>
                                        <h5> <?= $hotel['distance_from_center'] ?>m </h5>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding clearfix">
                            <div class="row flex no-margin">
                            <div class="col-md-8 no-padding">
                                <div class="hotel-box-wrapper clearfix">
                                    <div class="col-md-12 clearfix no-padding">
                                        <div class="location-distances clearfix">
                                            <?php if ($hotel['location_name']): ?>
                                                <span class="location-name"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $hotel['location_name'] ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if (isset($hotel['facilities']) && !empty($hotel['facilities'])): ?>
                                        <div class="col-md-12 no-padding clearfix">
                                            <div class="hotel-main-facilities">
                                                <?php foreach ($hotel['facilities'] as $fac): ?>
                                                    <?php if($fac['fac_is_main']): ?>
                                                    <span class="main-facility">
                                                        <img width="32px" src="<?= base_url('assets/uploads/facilities/' . $fac['facility_icon']) ?>"/> 
                                                        <?= $fac['facility_name'] ?>
                                                    </span>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
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
                            <div class="col-md-4 no-padding from-div">
                                <?php if(isset($hotel['min_price']) && $hotel['min_price']): ?>
                                    <span class="from-label">Starting from:</span>
                                    <span class="from-price"><?= $hotel['min_price']['price']?> &euro;</span>
                                    <a type="button" href="<?= base_url('hotel/' . $hotel['hotel_id']) ?>" class="btn btn-success">
                                        Request Now!
                                    </a>
                                <?php else: ?>
                                    <h5>No offers available at the moment...</h5>
                                    <h6 class="text-slate">Contact property for information</h6>
                                    <button class="btn btn-success">
                                        Contact Property
                                    </button>
                                <?php endif;?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <p><?php echo $links; ?></p>
<?php endif; ?>