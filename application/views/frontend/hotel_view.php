<div class="hotels-list">
    <?php if (isset($hotel) && !empty($hotel)) { ?>
        <div class="container-fluid">   
            <div class="row">
                <div class="hotel-wrapper clearfix">
                    <!--hotel's name-->
                    <div class="col-md-12 no-padding clearfix">
                        <h3>Onoma hotel : <?= $hotel['hotel_name']; ?></h3>
                    </div>
                    <!--package id in hotel-->
                    <div class="col-md-12 no-padding clearfix">
                        <h3>Paketo id : <?= $hotel['package_id']; ?></h3>
                    </div>
                    <!--location id in hotel-->
                    <div class="col-md-12 no-padding clearfix">
                        <h3>Location id : <?= $hotel['location_id']; ?></h3>
                    </div>
                    <!--distance from sea in hotel-->
                    <div class="col-md-12 no-padding clearfix">
                        <h3>distance_from_sea : <?= $hotel['distance_from_sea']; ?></h3>
                    </div>
                    <!--distance from center in hotel-->
                    <div class="col-md-12 no-padding clearfix">
                        <h3>distance_from_center : <?= $hotel['distance_from_center']; ?></h3>
                    </div>
                    <!--main image in hotel-->
                    <div class="col-md-12 no-padding clearfix">
                        <h3>                   
                            hotel_image :  <img src="<?= base_url('assets/uploads/' . $hotel_image['image_name']) ?>"/> </h3>
                    </div>
                    <!--thumbs in hotel-->
                    <div class="col-md-12 no-padding clearfix">
                        <?php
                        foreach ($hotel_image_thumbs as $image_from_hotel) {
                            ?>
                            <h3>hotel_image thumbs :  <img src="<?= base_url('assets/uploads/' . $hotel_image['image_name']) ?>"/> </h3>
                            <?php
                        }
                        ?>
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
                </div>
            </div>
        </div>
    <?php } ?>
</div>

