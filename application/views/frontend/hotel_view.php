<a href="<?= base_url() ?>" type="button" role="button" class="btn btn-floating"> < Back to List </a>
<div class="container">
    <?php if (isset($hotel) && !empty($hotel)): ?>   
    <div class="row header-row">
        <div class="col-md-12 mb-sm flex">
            <div class="auto-mr">
                <h2 class="text-semibold txt-cyan"><?= $hotel['hotel_name']; ?></h2>
            </div>
            <div class="auto-ml flex flex-end p-t-7">
                <?php if(isset($rooms_distinct_type) && $rooms_distinct_type): ?>
                    <?php foreach ($rooms_distinct_type as $hotel_room): ?>
                    <span class="icon-sign">
                        <span class="flex flex-center">
                            <?php for($i = 1; $i <= $hotel_room['min_adults']; $i++): ?>
                                <img class="people-img icon" src="<?= base_url('assets/images/person/person-blue.png') ?>" alt="">
                            <?php endfor;?> 
                            <?php if( $hotel_room['max_adults'] > $hotel_room['min_adults'] ): ?>
                                <?php for( $i = 1; $i <= ($hotel_room['max_adults'] - $hotel_room['min_adults']); $i++ ): ?>
                                    <img class="people-img icon" src="<?= base_url('assets/images/person/person-azure.png') ?>" alt="">
                                <?php endfor;?> 
                            <?php endif;?>
                        </span>
                        <h5 class="text-center txt-cyan"> <?= explode(' ',trim($hotel_room['room_type_name']))[0] ?> </h5>
                    </span>
                    <?php endforeach; ?>
                <?php endif;?>
                <?php if(isset($main_facility_icons) && $main_facility_icons): ?>
                    <?php foreach ($main_facility_icons as $main_icon): ?>
                    <span class="icon-sign">
                        <span class="flex flex-center">
                            <img class="icon" src="<?= base_url('assets/uploads/facilities/').$main_icon['facility_icon'] ?>" alt=""
                                data-toggle="tooltip" data-placement="bottom" title="<?= $main_icon['facility_name'] ?>">
                        </span>
                    </span>
                    <?php endforeach; ?>
                <?php endif;?>
                <span class="icon-sign">
                    <span class="flex flex-center">
                        <img class="icon" src="<?= base_url('assets/images/beach-blue.png') ?>" alt="">
                    </span>
                    <h5 class="txt-cyan"> <?= $hotel['distance_from_sea']  ?>m </h5>
                </span>
                <span class="icon-sign">
                    <span class="flex flex-center">
                        <img class="icon" src="<?= base_url('assets/images/city-blue.png') ?>" alt="">
                    </span>
                    <h5 class="txt-cyan"> <?= $hotel['distance_from_center'] ?>m </h5>
                </span>
            </div>
        </div>
        <div class="col-md-12 flex clearfix">

            <div class="auto-mr">
                <h4><?= $location['location_name']; ?></h4>
            </div>

            <div class="auto-ml flex flex-end align-center">
                <a href="https://twitter.com/intent/tweet?url=<?=base_url(uri_string());?>" target="_blank" class="tweet">
                    <i></i>
                    <span>Tweet</span>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url(uri_string());?>" target="_blank">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADkAAAAUCAMAAAAA9GVfAAACnVBMVEU0TI01TIw1TY01TY41TY81To82TY42TY8
                    5UZU6U5k7VJs7VZ07VaE8VZs8Vp08VqE8VqI8V6I9Vp49V6A9V6M+WJ8+WKA+WKQ+WaQ+WaU/WaM/WaQ/WaY/WqY/WqdAW6ZAW6dAW6hBW6dBXKhBXKlCXa
                    pCXatCXqpCXqxDXqtDXqxDX6xEX65EYK5EYK9FX65FYK9FYa9FYbBGYbBGYrFGYrJHYrFHY7JHY7NIZLNIZLRIZbRJZbVJZrZKZrZKZ7dLZ7hLaLhLaLlMa
                    blSaKpSaaxTaq1ZcbVbc7hfdLJfdbNfdbRfdrZgdrdhd7dhe8Fiebtie8Fofr9qgcFsgb5shMVthcZugrhugrtvgrxwhL1whL5xhb9xhcBzh8JziL9ziMJz
                    iMN1isV1isZ2iL12ir52isF5jMWAjreAk8eEk7+ElMOFlseFmMiIl7yKmsqOnL+RnsGSnsGVpdCXp9SeqsmfrNKfrNOfrdSgrdOgrdSgrtOgrtWhrtShrtW
                    hr9Sir9WisNaisNejsNimstWoss+qtM+suNesudyuudmwvNyyvNazvNizvdqzvtqzvtu0vtu0vty0v9y0v961v921v962v9i3v9a3wd24wt65wtu5w+G8xe
                    G8xuG9xNq+xtzAyeHAyePByuHCyd7Dy+DEzOPFzOHGz+fGz+nJ0OLL0uXN1OjP1urQ1+vS1+bS2OfT2evU2uzV2+vW2+jY3evZ3uzZ3u3b4O7c4vHd4ezd4
                    /Le4/Df4+3f4+/g5PHg5fHh5vHk5/Dk6PLn6vXo6/Xo7Pbp7PTq7fbr7vTr7vbt8Pbx8vfx8vjx8/j09fr09vn19vr19/v29/r3+Pv5+vz6+/z6+/37+/37
                    /P78/P38/P78/f79/f7+/v////+ZYdejAAACCUlEQVR4AWNYEebkTAYMXMHg7+BIFgxlsLMnEzLY2tja7LqHBHYARYiBDFbWVtb3UABQhBjIYGlhaQHTszw
                    5uOTePZCIpakoEwOvmQarMpCNHTKYmJuYQzUeBbKT7t0DiZj4rbtzd09K49UpQDZ2yGBibGIM1dlsEnQESIFETFquL+i4sbzhajcbs5SxkRATA6e+PCMHs5
                    IYMxOfAVgFg56hniFUZ5NeIogCiehNvjuPS12v/uqxazcXa3uvv3P3YOqke6duzVx5687mcLAKBl0dXR2wviNNcboeTbPv3QOJ6KYfv7szT6L26u6EQ6czu8
                    5ktd6cOOnepoBZF4oKLy0Dq2DQ0tbSButcC2JpFd+7B6a1QxZevD2t+uoMrVXnc13a9l65N2HCvQnaW0Aq94FVMGiqaaqBdR6uidV0r1lz7x5IRJObRTr+xL
                    EZV/s1V53PWXJ9afvVfqBOta3ns6XZhcEqGFRUVVSh/qxTiQFRIBGV1ddKM84e6LzapwLUue1ywfy7Pb33elXn3J5eemUuWAWDiqKKIlRnlUo0WKciEKbtv3
                    P3ZH7ttSkqqy/mVJy7e/zyhqn3pir6brh1Z6MPWAWDnIKcAlRnpVwUiAKKEAMZZGVkZaA6y2UjQRRQhBjIIC4pLrkdorNMPAJIbgeKEAMZxEXIhAxuggJkQS
                    +GRZ78PGRA10UAUdSA0BPiLlkAAAAASUVORK5CYII=" 
                    width="57" />
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="col-md-12 no-padding">
                <?php require_once(VIEWPATH . 'frontend/single_hotel_sidebar.php'); ?>
            </div>
            <div class="col-md-12 no-padding mt">
                <div style="height:340px; width:100%;" id="hotel_map" class="md-box hotel_map clearfix">
                </div>
                <div style="font-size: 1.2em;">
                <img width="26" height="26" src="<?= base_url('assets/images/marker.png') ?>" alt="">
                N <?= (isset($hotel['latitude'] )) ? $hotel['latitude'] : "-" ?> / E <?= (isset($hotel['longitude'] )) ? $hotel['longitude'] : "-" ?>
                </div>
            </div> 
            <div class="md-box col-md-12 mt">
                <h3 class="tbold">Need Help?</h3>
                <div class="row">
                    <div class="col-md-12">
                        <p>Contact us! Our team is at your disposal in order to help you find your studio or 
                        apartment in Sithonia Halkidiki, Greece</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2" style="font-size:1.5em; margin-top:6px; margin-bottom:12px;">
                        <a href="#" data-toggle="modal" data-target="#contactModal"> <i class="fa fa-envelope txt-orange"></i> info@sarti.gr </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <?php if(isset($hotel_images) && $hotel_images && count($hotel_images) > 0): ?>
            <div class="row">
                <div class="col-md-12 clearfix no-padding">
                    <ul id="imageGallery">
                        
                        <?php foreach($hotel_images as $h_i_key => $h_i):?>
                        <li class="sliderItem" data-thumb="<?= base_url('assets/uploads/' . $h_i['image_name']) ?>" 
                            data-src="<?= base_url('assets/uploads/' . $h_i['image_name']) ?>">
                            <img src="<?= base_url('assets/uploads/' . $h_i['image_name']) ?>" />
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endif;?>
            
            <?php if(isset($hotel['hotel_long_description']) && strlen($hotel['hotel_long_description'])>0): ?>
            <div class="row mt">
                <h3 class="txt-cyan border-bottom-orange">
                    Description
                </h3>
                <p>
                    <?= $hotel['hotel_long_description'] ?>
                </p>
            </div>
            <?php elseif(isset($hotel['hotel_short_description']) && strlen($hotel['hotel_short_description'])>0) :?>
            <div class="row mt">
                <h3 class="txt-cyan border-bottom-orange">
                    Description
                </h3>
                <p>
                    <?= $hotel['hotel_short_description'] ?>
                </p>
            </div>
            <?php endif;?>

            <?php if(false): ?>
            <div class="row mt">
                <h3 class="txt-cyan border-bottom-orange">
                    Facilities
                </h3>
                <div class="col-md-12 no-padding">
                    <div class="row">
                    <?php foreach ($hotel_facilities as $hotel_facility_cat): ?>
                        <div class="hv_facility_categories col-md-3">
                            <ul id="accordion_<?= $hotel_facility_cat['id'] ?>">
                                <li>
                                    <h4 class="text-underline text-bold txt-light-cyan">
                                        <?= $hotel_facility_cat['description'] ?> 
                                    </h4>
                                </li>
                                <ul class="sub-list collapse in" id="sub_<?= $hotel_facility_cat['id'] ?>">
                                <?php foreach($hotel_facility_cat['facilities'] as $fac): ?>
                                    <li class="flex flex-start text-muted">
                                        <h5>
                                            <img class="fac-icon" src="<?= base_url("assets/images/checkmark.png") ?>" alt="Facility Icon"> 
                                            <?= $fac['facility_type'] ?> 
                                        </h5>
                                    </li> 
                                <?php endforeach;?>
                                </ul>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>

            <?php if(isset($hotel_facilities) && $hotel_facilities): ?>
            <div class="row mt">
                <h3 class="txt-cyan border-bottom-orange">
                    Facilities
                </h3>
                <div class="col-md-12 no-padding">
                    <?php foreach ($hotel_facilities as $hotel_facility_cat): ?>
                        <div class="hv_facility_categories">
                            <ul id="accordion_<?= $hotel_facility_cat['id'] ?>">
                                <li>
                                    <h4 class="text-underline text-bold txt-light-cyan">
                                        <?= $hotel_facility_cat['description'] ?> 
                                    </h4>
                                </li>
                                <ul style="display: flex; flex-wrap: wrap; justify-content: flex-start;" 
                                    class="sub-list collapse in" id="sub_<?= $hotel_facility_cat['id'] ?>">
                                <?php foreach($hotel_facility_cat['facilities'] as $fac): ?>
                                    <li class="flex flex-start text-muted" style="margin-right: 24px;">
                                        <h5>
                                            <img class="fac-icon" src="<?= base_url("assets/images/checkmark.png") ?>" alt="Facility Icon"> 
                                            <?= $fac['facility_type'] ?> 
                                        </h5>
                                    </li>
                                <?php endforeach;?>
                                </ul>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif;?>

            <?php if(isset($ground_plans) && !empty($ground_plans)): ?>
            <div class="row mt">
                <h3 class="txt-cyan border-bottom-orange">
                    Ground Plans
                </h3>
                <div class="col-md-12">
                    <div class="row flex flex-wrap">
                        <?php foreach($ground_plans as $plan): ?>
                            <div class="col-md-3">
                                <div class="plan-image" 
                                    style="background-image: url('<?= base_url('assets/uploads/ground_plans/'.$plan['ground_plan_image']) ?>');"></div>
                                <h5 class="text-center text-muted"><a href="#" data-toggle="modal" data-target="#groundPlanModal"> <?= (isset($plan['ground_plan_description'])) ? $plan['ground_plan_description'] : "" ?> </a></h5>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <?php endif;?>

            <?php if(isset($hotel_rooms) && $hotel_rooms):?>
            <div class="row mt" id="rooms_row">
                <h3 class="txt-cyan border-bottom-orange">
                    Rooms
                </h3>
                <h5 class="text-right"> *<a href="#" data-toggle="modal" data-target="#taxModal">Overnight stay</a> tax is NOT included in prices.</h5>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php foreach($hotel_rooms as $room):?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading_<?= $room['room_id']?>">
                                <div class="row heading-padding">
                                <div class="col-md-10">
                                <div class="row">
                                <h4 class="col-md-8" style="width: auto;">
                                    <?= ucfirst($room['room_type_name']) ?>
                                    <?php if( isset($room['floor']) && $room['floor'] == 'Basement' ):?>   
                                    - Semi-Basement
                                    <?php elseif( isset($room['floor']) && $room['floor'] == 'Ground Floor' ):?> 
                                    - Ground Floor
                                    <?php elseif( isset($room['floor']) && $room['floor'] == 'Upper Floor' ):?>
                                    - Upper Floor
                                    <?php endif;?>
                                    <?php if( isset($room['sea_view']) && trim($room['sea_view']) != "" && $room['sea_view'] != "0" ):?> 
                                    - <?= $room['sea_view'] ?>
                                    <?php endif;?>
                                </h4>
                                <h4 class="txt-danger tbold col-md-4" style="width: auto;">
                                    <?php if(isset($room['early_booking_offer']) && $room['early_booking_offer']['active'] == true 
                                        && $room['early_booking_offer']['percentage']>0): ?>
                                        <?= $room['early_booking_offer']['percentage'] ?>% Early Booking until <?= $room['early_booking_offer']['valid_until'] ?>
                                    <?php endif;?>
                                </h4>
                                </div>
                                </div>
                                <div class="col-md-2 flex flex-center">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $room['room_id']?>" 
                                        aria-expanded="true" aria-controls="collapse_<?= $room['room_id']?>" 
                                        class="text-center tbold">
                                    Price List
                                </a>
                                </div>                                
                                </div>

                                <?php if(isset($room['searched_room_period'])): ?>
                                <div class="row margin-top-1 heading-padding">
                                    <div class="col-md-10" >
                                        <?php 
                                            $date_from = new DateTime($room['searched_room_period']['from']); 
                                            $date_to = new DateTime($room['searched_room_period']['to']);
                                        ?>
                                        <h4>
                                        <span class="tbold txt-green">
                                            <?= $date_to->diff($date_from)->format("%a") ?> Day Deal 
                                        </span>
                                        <span>
                                        - Period: <?= date("d/m/y", strtotime($room['searched_room_period']['from'])) ?> - <?= date("d/m/y", strtotime($room['searched_room_period']['to'])) ?>
                                        - Persons: <?= $room['searched_room_period']['adults'] ?> - 
                                        </span>
                                        
                                        <?php if(isset($room['searched_room_period']['offer']) && $room['searched_room_period']['offer'] > 0): ?>
                                        <span class="txt-danger tbold">
                                            Price: <?= ($room['searched_room_period']['price']) - ($room['searched_room_period']['price']*$room['searched_room_period']['offer']/100) ?> 
                                            &euro;
                                        </span>
                                        <?php else: ?>

                                        <span class="txt-danger tbold">
                                            Price: <?=  $room['searched_room_period']['price'] ?> &euro; 
                                        </span>

                                        <?php endif;?>
                                        </h4>
                                    </div>
                                    <div class="col-md-2 ">
                                        <form action="<?= base_url('hotel/requestBooking') ?>" method="POST">
                                        <input type="hidden" value="<?=$room['room_id']?>" name="room">
                                        <input type="hidden" value="<?=$room['searched_room_period']['period_id']?>" name="period">
                                        <input type="hidden" value="<?=$room['searched_room_period']['adults']?>" name="adults_select">
                                        <button type="submit" class="btn btn-primary btn-stretch">
                                            Request Now
                                        </button>
                                        </form>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div id="collapse_<?= $room['room_id']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?= $room['room_id']?>">
                            <div class="panel-body">
                            <table class="table table-responsive table-bordered">
                            <thead>
                                <tr>
                                    <th width="35%" class="text-center">Period</th>
                                    <th width="15%" class="text-center">Nights</th>
                                    <th width="10%" class="text-center">Persons</th>
                                    <!-- <th>Rooms</th> -->
                                    <th width="20%" class="text-center">Price</th>
                                    <th width="20%" class="text-center">Request a reservation</th>
                                </tr> 
                            </thead>
                            <tbody>
                            <?php if(isset($room['has_prices']) && $room['has_prices']): ?>
                                <?php foreach ($room['available_periods'] as $period_key => $room_period): ?>
                                    <?php if(($room_period['has_prices'] && (isset($room_period['all_prices'][0]) 
                                        && $room_period['all_prices'][0]['price'] >0))):?>
                                    <form action="<?= base_url('hotel/requestBooking') ?>" method="POST">
                                    <input type="hidden" value="<?=$room['room_id']?>" name="room">
                                    <input type="hidden" value="<?=$room_period['package_period_id']?>" name="period">
                                    <tr>
                                        <?php if($room_period['has_prices']): ?>
                                            <td class="text-center tbold">
                                                <?= date("d/m/y", strtotime($room_period['period_from'])) ." - ". date("d/m/y", strtotime($room_period['period_to'])) ?>
                                            </td>
                                            <td class="text-center" >
                                                <?php if($room_period['is_allotment']):?>
                                                    Per Night
                                                <?php else:?>
                                                <span>
                                                    <?php 
                                                        $date_from = new DateTime($room_period['period_from']); 
                                                        $date_to = new DateTime($room_period['period_to']);
                                                    ?>
                                                    <?= $date_to->diff($date_from)->format("%a") ?> 
                                                </span>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                        <?php if(isset($room_period['all_prices'][0]) && $room_period['all_prices'][0]['price'] >0): ?>
                                            <td>
                                                <select class="adults_select form-control" name="adults_select" id="adults_select_<?= $room['room_id']?>" 
                                                    data-room-id="<?= $room['room_id']?>" data-period-id="<?=$room_period['package_period_id']?>">
                                                    <?php for($j = $room['min_adults']; $j <= $room['max_adults']; $j++): ?>
                                                        <option value="<?=$j?>"><?=$j?></option>
                                                    <?php endfor;?>
                                                </select>
                                            </td>
                                            <td class="text-center" id="price<?= $room['room_id']?>_<?=$room_period['package_period_id']?>">
                                                <?php if(isset($room['early_booking_offer']) && $room['early_booking_offer']['active'] == true 
                                                     && $room['early_booking_offer']['percentage']>0):  ?>
                                                    <h4 class="special_offer_price txt-danger">
                                                    <?= ($room_period['all_prices'][0]['price']) - ($room_period['all_prices'][0]['price']*$room['early_booking_offer']['percentage']/100) ?>
                                                        &euro;
                                                    </h4>
                                                    <span class="before_special_offer_price "> 
                                                        <?= $room_period['all_prices'][0]['price'] ?> &euro;
                                                    </span>
                                                <?php elseif(isset($room_period['all_prices'][0]['special_offer']) 
                                                    && $room_period['all_prices'][0]['special_offer'] > 0): ?>
                                                <h4 class="special_offer_price txt-danger">
                                                    <?= ($room_period['all_prices'][0]['price']) - ($room_period['all_prices'][0]['price']*$room_period['all_prices'][0]['special_offer']/100) ?>
                                                    &euro;
                                                </h4>
                                                <span class="before_special_offer_price "> 
                                                    <?= $room_period['all_prices'][0]['price'] ?> &euro;
                                                </span>
                                                <?php else:?>
                                                <span class="normal-price"> 
                                                    <?= $room_period['all_prices'][0]['price'] ?> &euro;
                                                </span>
                                                <?php endif;?>    
                                            </td>
                                        <?php endif;?>
                                        <td align="center">
                                            <button type="submit" class="btn btn-primary">
                                                Request Now
                                            </button>
                                        </td>
                                    </tr>
                                    </form>
                                    <?php endif;?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>            
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<div class="modal fade" id="taxModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title tbold text-center">Stay over tax notification</h4>
      </div>
      <div class="modal-body">
        <p class="text-center">The <b>stay-over tax</b> (introduced by the Greek Ministry of Tourism) will be applied to hotels / houses 
            and will be calculated based on the number of overnight stays and the accommodation's category, 
            <u>paid directly by the guests upon check in.</u>
        </p>
        <p class="text-center">
            The amount will range from 0.50 euro to 4 euro per room per day:
        </p>
        <ul style="width: 100%; margin-left: auto; margin-right: auto; list-style: none; text-align:center;">
            <li>5* hotels: 4 euro per room per overnight</li>
            <li>4* hotels: 3 euro per room per overnight</li>
            <li>3* hotels: 1.50 euro per room per overnight</li>
            <li>1 &amp; 2* hotels: 0.50 euro per room per overnight</li>
            <li><b>Studios &amp; Apartments: 0.50 euro per room per overnight</b></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="groundPlanModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title tbold text-center">Ground Plan Notification</h4>
      </div>
      <div class="modal-body">
        <p class="text-center">
        The specific layouts represent the approximate layout of the rooms. Almost all of them match with the actual construction 
        of the rooms. In some cases certain units, due to their position in the building itself and other technical reasons, 
        differ from the layout presented in the blueprints.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>
                        <span class="help-block">
                            <p id="characterLeft" class="help-block ">You have reached the limit</p>
                        </span>                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php if (isset($hotel['latitude'] ) && isset($hotel['longitude']) && trim($hotel['latitude']) != "" && trim($hotel['longitude']) != ""):?>
        var hotel_lat = <?=$hotel['latitude']?>;
        var hotel_lng = <?=$hotel['longitude']?>;
        var zoom = 16;
    <?php else: ?>
        var hotel_lat = 40.0981789;
        var hotel_lng = 23.973239;
        var zoom = 9;
    <?php endif;?>
    var center = {lat: hotel_lat, lng: hotel_lng}
    var map;
    var marker;
    function initMap() {
        map = new google.maps.Map(document.getElementById('hotel_map'), {
            center: center,
            zoom: zoom,
            mapTypeId: 'satellite'
        });
        marker = new google.maps.Marker({
          position: center,
          map: map
        });
    }

    $(document).ready(function() {

        $('.adults_select').change(function(){
            var room = $(this).data('room-id');
            var period = $(this).data('period-id');
            var adults = $(this).val();
            var query = new Object();
            query.room = room;
            query.period = period;
            query.adults = adults;

            $.ajax({
                type: "GET",
                url: "<?= base_url('hotel/getPeriodPriceForAdults') ?>",
                data: query
            }).done(function(data) {
                console.log(data);
                $('#price'+room+"_"+period).empty().append(data);

            });
        });

        $('.datatables').DataTable();

        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true,
            thumbItem:9,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }   
        });  
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtj9odHIASxZuUQXxx2RSk3mvMpNe8HLI&callback=initMap"
    async defer></script>