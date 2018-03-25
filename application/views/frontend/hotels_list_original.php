<?php if (isset($hotels) && !empty($hotels)): ?>
    <?php foreach ($hotels as $hotel): ?>
        <div class="row">
            <div class="each-hotel clearfix">
                <?php if( $hotel['min_price_room']['eb_is_active'] == 1 && $hotel['min_price_room']['early_booking'] > 0 && (time()-(60*60*24)) <= strtotime($hotel['min_price_room']['early_booking_until']) ): ?>
                <span class="offer-banner" > Early Booking </span>
                <?php elseif($hotel['min_price_room']['special_offer'] > 0): ?>
                <span class="offer-banner" > Special Offer </span>
                <?php endif;?>
                
                <div class="col-md-12 clearfix">
                    <div class="row flex">
                    <div class="col-md-4 no-padding hotels-main-image">
                        <img src="<?= base_url('assets/uploads/') . $hotel['thumb']['image_name'] ?>"/>
                    </div>
                    <div class="col-md-8 p-14 clearfix">
                        <div class="col-md-12 clearfix">
                            <div class="row hotel-title no-margin flex align-center">    
                                <div class="col-md-6">
                                    <a href="<?= base_url('hotel/' . $hotel['hotel_id']) ?>">
                                        <h3 class="txt-cyan" ><?= $hotel['hotel_name'] ?></h3>
                                    </a>
                                </div>
                                <div class="col-md-6 flex flex-end align-center">
                                    <?php if(isset($hotel['rooms_distinct_types']) && $hotel['rooms_distinct_types']): ?>
                                        <?php foreach ($hotel['rooms_distinct_types'] as $hotel_room_dis_type): ?>
                                        <span class="icon-sign flex flex-col flex-center">
                                            <span class="flex flex-center align-center">
                                                <?php for($i = 1; $i <= $hotel_room_dis_type['min_adults']; $i++): ?>
                                                    <img  class="people-img-small icon-small" src="<?= base_url('assets/images/person/person-black.png') ?>" alt="">
                                                <?php endfor;?> 
                                                <?php if( $hotel_room_dis_type['max_adults'] > $hotel_room_dis_type['min_adults'] ): ?>
                                                    <?php for( $i = 1; $i <= ($hotel_room_dis_type['max_adults'] - $hotel_room_dis_type['min_adults']); $i++ ): ?>
                                                        <img class="people-img-small icon-small" src="<?= base_url('assets/images/person/pesron-grey.png') ?>" alt="">
                                                    <?php endfor;?> 
                                                <?php endif;?>
                                            </span>
                                            <h5 style="margin: 0; text-align: center;"> <?= $hotel_room_dis_type['type'] ?> </h5>
                                        </span>
                                        <?php endforeach; ?>
                                    <?php endif;?>
                                    <span class="icon-sign">
                                        <span class="flex flex-center align-center">
                                            <img class="icon-small" src="<?= base_url('assets/images/beach.png') ?>" alt="">
                                        </span>
                                        <h5 style="margin: 0; text-align: center;"> <?= $hotel['distance_from_sea']  ?>m </h5>
                                    </span>
                                    <span class="icon-sign">
                                        <span class="flex flex-center align-center">
                                            <img class="icon-small" src="<?= base_url('assets/images/city.png') ?>" alt="">
                                        </span>
                                        <h5 style="margin: 0; text-align: center;"> <?= $hotel['distance_from_center'] ?>m </h5>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 clearfix">
                            <div class="row flex ">
                            <div class="col-md-9">
                                <div class="hotel-box-wrapper clearfix">
                                    <div class="col-md-12 clearfix no-padding">
                                        <div class="location-distances clearfix">
                                            <?php if ($hotel['location_name']): ?>
                                                <span class="location-name txt-cyan"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $hotel['location_name'] ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if (isset($hotel['facilities']) && !empty($hotel['facilities'])): ?>
                                        <div class="col-md-12 no-padding clearfix">
                                            <div class="hotel-main-facilities">
                                                <?php foreach ($hotel['facilities'] as $fac): ?>
                                                    <?php if($fac['fac_is_main'] && (isset($fac['facility_icon']) && trim($fac['facility_icon']) != "")): ?>
                                                    <span class="main-facility">
                                                        <img width="24px" src="<?= base_url('assets/uploads/facilities/' . $fac['facility_icon']) ?>" 
                                                            data-toggle="tooltip" data-placement="bottom" title="<?= $fac['facility_name'] ?>"/> 
                                                        <?="" //$fac['facility_name'] ?>
                                                    </span>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-12 no-padding clearfix">
                                        <div class="hotel-desc">
                                            <p>
                                                <?php if(isset($hotel['hotel_short_description']) && trim($hotel['hotel_short_description']) != ""):?>
                                                <?= mb_substr($hotel['hotel_short_description'], 0, 200) . "..." ?>
                                                <?php else: ?>
                                                <?= mb_substr($hotel['hotel_long_description'], 0, 200) . "..." ?>
                                                <?php endif;?>
                                                <span class="read-more"><a href="<?= base_url('hotel/' . $hotel['hotel_id']) ?>">Read more</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 no-padding from-div"> 
                                <?php if(isset($hotel['min_price_room']) && $hotel['min_price_room']): ?>
                                
                                <div class="calendar">

                                </div>

                                    <div class="disp-calendar">
                                        <div class="disp-calendar-header">
                                            <span>starting from</span> 
                                        </div>
                                        <div class="disp-calendar-body flex flex-col flex-center align-center">
                                            <span class="from-price txt-green">
                                                <?php if( $hotel['min_price_room']['eb_is_active'] == 1 && $hotel['min_price_room']['early_booking'] > 0 && (time()-(60*60*24)) <= strtotime($hotel['min_price_room']['early_booking_until']) ): ?>
                                                    <?= ($hotel['min_price_room']['price'] - ($hotel['min_price_room']['price'] * $hotel['min_price_room']['early_booking']/100))?> 
                                                <?php elseif($hotel['min_price_room']['special_offer'] > 0): ?>
                                                    <?= ($hotel['min_price_room']['price'] - ($hotel['min_price_room']['price'] * $hotel['min_price_room']['special_offer']/100))?> 
                                                <?php else:?>
                                                    <?= $hotel['min_price_room']['price']?> 
                                                <?php endif;?>
                                                &euro;
                                            </span>
                                            <?php if($hotel['min_price_room']['is_package_type'] == 1): ?>
                                            <span class="from-price-type text-muted">per night</span>
                                            <?php elseif($hotel['min_price_room']['is_package_type'] == 2) :?>
                                            <span class="from-price-type text-muted">for 7 day packages</span>
                                            <?php else: ?>
                                            <span class="from-price-type text-muted">for 10 day packages</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <a type="button" href="<?= base_url('hotel/' . $hotel['hotel_id']) ?>" class="btn btn-success bg-green request-btn">
                                        Request Now!
                                    </a>

                                <?php else: ?>
                                    <h5>No offers available at the moment...</h5>
                                    <h6 class="text-slate">Contact property for information</h6>
                                    <button class="btn btn-success bg-green">
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
        </div>
    <?php endforeach; ?>
    <?php if($total_hotel_count > 10): ?>
        <p><?= $links; ?></p>
    <?php endif; ?>
<?php endif; ?>