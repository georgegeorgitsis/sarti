<div class="container">
    <?php if (isset($hotel) && !empty($hotel)): ?>   
        <div class="row header-row">

            <div class="col-md-12 mb-sm flex">
                <div class="auto-mr">
                    <h2 class="text-semibold"><?= $hotel['hotel_name']; ?></h2>
                </div>
                <div class="auto-ml flex flex-end">
                    <span class="icon-sign">
                        <span class="flex flex-center">
                        <img class="icon" src="<?= base_url('assets/images/beach.png') ?>" alt="">
                        </span>
                        <h5> <?= $hotel['distance_from_sea']  ?>m </h5>
                    </span>
                    <span class="icon-sign">
                        <span class="flex flex-center">
                        <img class="icon" src="<?= base_url('assets/images/city.png') ?>" alt="">
                        </span>
                        <h5> <?= $hotel['distance_from_center'] ?>m </h5>
                    </span>
                    <?php if(isset($rooms_distinct_type) && $rooms_distinct_type): ?>
                        <?php foreach ($rooms_distinct_type as $hotel_room): ?>
                            <span class="icon-sign">
                                <span class="flex flex-center">
                                    <?php for($i = 0; $i < $hotel_room['min_adults']; $i++): ?>
                                        <img class="people-img icon" src="<?= base_url('assets/images/person/person-black.png') ?>" alt="">
                                    <?php endfor;?> 
                                    <?php if( $hotel_room['max_adults'] > $hotel_room['min_adults'] ): ?>
                                        <?php for( $i = 0; $i < ($hotel_room['max_adults'] - $hotel_room['min_adults']); $i++ ): ?>
                                            <img class="people-img icon" src="<?= base_url('assets/images/person/pesron-grey.png') ?>" alt="">
                                        <?php endfor;?> 
                                    <?php endif;?>
                                </span>
                                <h5> <?= $hotel_room['room_type_name'] ?> </h5>
                            </span>
                        <?php endforeach; ?>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-md-12 clearfix">

                <div class="auto-mr">
                    <h4><?= $location['location_name']; ?></h4>
                </div>

                <div class="auto-ml flex flex-end">
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
            <div class="col-md-12 clearfix no-padding">
                <div id="hotel-image-carousel" class="carousel slide fixed-carousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach($hotel_images as $h_i_key => $h_i):?>
                            <?php if($h_i_key == 0): ?>
                                <li data-target="#hotel-image-carousel" class="active" data-slide-to="<?= $h_i_key ?>"  ></li>
                            <?php else: ?>
                                <li data-target="#hotel-image-carousel" data-slide-to="<?= $h_i_key ?>" ></li>  
                            <?php endif;?>  
                        <?php endforeach; ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php foreach($hotel_images as $image_key => $image): ?>
                            <?php if($image_key == 0): ?>
                                <div class="item active">
                                <div style="background-image: url(<?= base_url('assets/uploads/' . $image['image_name']) ?>); 
                                    height: 420px; background-size: cover; margin: 0px auto; width: 95%; background-repeat: no-repeat;"></div>
                                </div>
                            <?php else: ?>
                                <div class="item">
                                <div style="background-image: url(<?= base_url('assets/uploads/' . $image['image_name']) ?>); 
                                    height: 420px; background-size: cover; margin: 0px auto; width: 95%; background-repeat: no-repeat;"></div>
                                </div>
                            <?php endif;?> 
                        <?php endforeach;?>
                    </div>
                    <a class="left carousel-control" href="#hotel-image-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#hotel-image-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt">
            <div class="panel panel-flat">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Description
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <?= $hotel['hotel_long_description'] ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt">
            <?php if(isset($hotel_facilities) && $hotel_facilities): ?>
                <div class="panel panel-flat">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                            Facilities
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body flex flex-center">
                            <?php foreach ($hotel_facilities as $hotel_facility): ?>
                                <span class="icon-sign">
                                    <span class="flex flex-center">
                                        <img class="icon" src="<?= base_url('assets/uploads/facilities/'.$hotel_facility['facility_icon']) ?>" alt="Facility icon">
                                    </span>
                                    <h5><?= $hotel_facility['facility_name'] ?> </h5>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else:?>
                <div class="col-md-12 no-padding flex flex-center">
                <h4> No facilities registered for this property... </h4>
                </div>
            <?php endif;?>
        </div>

        <?php if(isset($hotel_rooms) && $hotel_rooms):?>
            <div class="row mt flex flex-center">
                <?php foreach ($hotel_rooms as $room): ?>
                    <?php if(isset($room['has_prices']) && $room['has_prices']): ?>
                        <div class="col-md-5 room-prices">
                            <h4 class="text-center text-semibold"> <?= $room['room_name'] ?> </h4>
                            <table class="table table-responsive room-prices-table">                                
                                <thead>
                                    <tr class="text-center">
                                        <th>From</th>
                                        <th>To</th> 
                                        <?php for($i = $room['min_adults']; $i <= $room['max_adults']; $i++): ?>
                                            <th class="text-center"><?= $i ?> occupants</th>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($room['available_periods'] as $room_period): ?>
                                        <?php if($room_period['all_prices']): ?>
                                            <tr class="text-center">
                                                <td><?= $room_period['period_from'] ?></td>
                                                <td><?= $room_period['period_to'] ?></td>
                                                <?php for($i = $room['min_adults']; $i <= $room['max_adults']; $i++): ?>
                                                    <?php if(isset($room_period['all_prices'][$i - $room['min_adults']])): ?>
                                                        <td><?= $room_period['all_prices'][$i - $room['min_adults']]['price'] ?> &euro;</td>
                                                    <?php else: ?>
                                                        <td> - </td>
                                                    <?php endif;?>
                                                <?php endfor;?>
                                                <td>
                                                    <a href="<?= base_url('hotel/requestBooking/'. $room['room_id'].'/'.$room_period['package_period_id']) ?>" type="button" class="btn btn-success small-btn">
                                                        Book
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endif;?>
                                    <?php endforeach; ?> 
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>