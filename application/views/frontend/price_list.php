<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>Room</th>
            <th>Period</th>
            <th>Nights</th>
            <th>Occupants</th>
            <th>Price</th>
            <th>Request a reservation</th>
        </tr> 
    </thead>
    <tbody>
    <?php foreach ($hotel_rooms as $room): ?>
        <?php if(isset($room['has_prices']) && $room['has_prices']): ?>
            <?php $first_pass = true;?>
            <?php foreach ($room['available_periods'] as $period_key => $room_period): ?>
                <?php if($room_period['all_prices']): ?>
                    <?php for($i = $room['min_adults']; $i <= $room['max_adults']; $i++): ?>
                    <?php if(($room_period['has_prices'] && (isset($room_period['all_prices'][$i - $room['min_adults']]) && $room_period['all_prices'][$i - $room['min_adults']]['price'] >0)) || $first_pass):?>
                        <?php if($first_pass): ?>
                        <tr class="first-room-row">
                        <?php else: ?>
                        <tr>
                        <?php endif;?>
                        <?php if($first_pass): ?>
                        <td rowspan="<?= $room['available_prices'] ?>">
                            <div class="row no-margin">
                                <h4 class="text-semibold"> 
                                    <?= ucfirst($room['room_type_name']) ?> - <?= ucfirst($room['floor']) ?> 
                                </h4>
                            </div>
                            <div class="row no-margin">
                                <?php if(isset($room['ground_plan_image'])): ?>
                                <div class="col-md-5">
                                <div class="floor-plan">
                                    <img width="100%" height="100%" src="<?= base_url('assets/uploads/ground_plans/'.$room['ground_plan_image']) ?>" alt="Floor plans">
                                </div>
                                </div>
                                
                                <?php endif;?>
                                <?php if(isset($room['room_facilities']) && !empty($room['room_facilities'])): ?>
                                <div class="col-md-7">
                                    <div class="row">
                                    <?php foreach($room['room_facilities'] as $fac):?>
                                        <div class="col-md-6">
                                            <span><?= $fac['facility_type']?></span>
                                        </div>
                                    <?php endforeach;?>
                                    </div>
                                </div>
                                <?php endif;?>
                            </div>
                            
                        </td>
                        <?php endif; ?>
                        <?php if($i == $room['min_adults'] && $room_period['has_prices']): ?>
                        <td rowspan="<?= $room_period['prices_amount'] ?>">
                            <span>
                                <?= $room_period['period_from'] ." - ". $room_period['period_to'] ?>
                            </span>
                        </td>
                        <td rowspan="<?= $room_period['prices_amount'] ?>">
                            <span>
                                <?php 
                                    $date_from = new DateTime($room_period['period_from']); 
                                    $date_to = new DateTime($room_period['period_to']);
                                ?>
                                <?= $date_to->diff($date_from)->format("%a") ?> 
                            </span>
                        </td>
                        <?php endif; ?>
                        <?php if(isset($room_period['all_prices'][$i - $room['min_adults']]) && $room_period['all_prices'][$i - $room['min_adults']]['price'] >0): ?>
                        <td>
                            <span>
                                <?= $i ?>
                            </span>
                        </td>
                        
                        <td class="flex-cell">

                            <?php if(isset($room_period['all_prices'][$i - $room['min_adults']]['special_offer']) && $room_period['all_prices'][$i - $room['min_adults']]['special_offer']>0): ?>
                            <span class="special_offer_price">
                                <?= ($room_period['all_prices'][$i - $room['min_adults']]['price']) - ($room_period['all_prices'][$i - $room['min_adults']]['price']*$room_period['all_prices'][$i - $room['min_adults']]['special_offer']/100) ?>
                                &euro;
                            </span>
                            <span class="before_special_offer_price"> 
                                <?= $room_period['all_prices'][$i - $room['min_adults']]['price'] ?> &euro;
                            </span>
                            <?php else:?>
                                <?= $room_period['all_prices'][$i - $room['min_adults']]['price'] ?> &euro;
                            <?php endif;?>    
                        </td>
                        <?php endif;?>
                        <?php if($first_pass): ?>
                        <?php $first_pass = false; ?>
                        <td rowspan="<?= $room['available_prices'] ?>">
                            <a href="<?= base_url('hotel/requestBooking/'. $room['room_id'].'/'.$room_period['package_period_id']) ?>" type="button" class="btn btn-success small-btn">
                                Request
                            </a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endif;?>
                    <?php endfor; ?>
                <?php endif; ?>
                <?php $first_pass = false; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>