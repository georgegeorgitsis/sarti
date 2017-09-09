<div class="container">
    <?php if (isset($hotel) && !empty($hotel)): ?>   
        <div class="row header-row">

            <div class="col-md-12 clearfix">
                <h2 class="text-semibold"><?= $hotel['hotel_name']; ?></h2>
            </div>

            <div class="col-md-4 clearfix">
                <h4><?= $location['location_name']; ?></h4>
            </div>

            <div class="col-md-5 clearfix">
                <h4>
                    <?= $hotel['distance_from_sea']; ?>m from the beach. 
                    <?= $hotel['distance_from_center']; ?>m from the center.
                </h4>
            </div>

            <div class="col-md-3">
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
        <div class="row">

            
            <div class="col-md-12 clearfix">
                <div id="hotel-image-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#hotel-image-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#hotel-image-carousel" data-slide-to="1"></li>
                        <li data-target="#hotel-image-carousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                        <img src="<?= base_url('assets/uploads/' . $hotel_image['image_name']) ?>" alt="Hotel Image">
                        <div class="carousel-caption">
                            ...
                        </div>
                        </div>
                        <div class="item">
                        <img src="..." alt="...">
                        <div class="carousel-caption">
                            ...
                        </div>
                        </div>
                        ...
                    </div>

                    <!-- Controls -->
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

            <!--thumbs in hotel-->
            <div class="col-md-12 no-padding clearfix">
                <?php foreach ($hotel_image_thumbs as $image_from_hotel): ?>
                    <h3>hotel_image thumbs :  <img src="<?= base_url('assets/uploads/' . $hotel_image['image_name']) ?>"/> </h3>
                <?php endforeach; ?>
            </div>

            <!--long description in hotel-->
            <div class="col-md-12 no-padding clearfix">
                <h3> hotel_long_description : <?= $hotel['hotel_long_description'] ?> </h3>

            </div>
            <!--facilities in hotel-->
            <div class="col-md-12 no-padding clearfix">
                <?php
                foreach ($hotel_facilities as $hotel_facility) {
                    ?>
                    <h3> facility name in this hotel is  : <?= $hotel_facility['facility_name'] ?> </h3>
                    <?php
                }
                ?>
            </div>
            <!--room types in this hotel-->
            <div class="col-md-12 no-padding clearfix">
                <?php
                foreach ($hotel_rooms as $hotel_room) {
                    ?>
                    <h3> available room in this hotel is  : <?= $hotel_room['room_type_name'] ?> </h3>
                    <?php
                }
                ?>
            </div>
            <!--room facilities in this hotel-->
            <div class="col-md-12 no-padding clearfix">
                <?php
                foreach ($hotel_rooms_facilities as $hotel_rooms_facility) {
                    ?>
                    <h3> available facility in this room hotel is  : <?= $hotel_rooms_facility['facility_name'] ?> </h3>
                    <?php
                }
                ?>
            </div>
            <!--room prices in this hotel-->
            <div class="col-md-12 no-padding clearfix">
                <table style="width:100%;height:200px;">                                


                    <thead>
                        <tr>
                            <th>Period</th>
                            <th>Type of Room</th> 
                            <th>Max number of adults</th>
                            <?php
                            foreach ($hotel_rooms_prices as $hotel_rooms_price) {
                                ?>
                                <th><?= $hotel_rooms_price['period_from']; ?> - <?= $hotel_rooms_price['period_to']; ?></th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <?php
                    foreach ($hotel_rooms_prices as $hotel_rooms_price) {
                        ?>
                        <tr>
                            <td><?= $hotel_rooms_price['floor']; ?></td>
                            <td><?= $hotel_rooms_price['room_type_name']; ?></td>                                
                            <td><?= $hotel_rooms_price['max_adults']; ?></td>
                            <td><?= $hotel_rooms_price['price']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>