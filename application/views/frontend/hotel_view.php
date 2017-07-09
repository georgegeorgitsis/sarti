<div class="hotels-list">
    <?php if (isset($hotel) && !empty($hotel)) { ?>
        <div class="container-fluid">   
            <div class="row">
                <div class="hotel-wrapper clearfix">
                    <div class="col-md-12 no-padding clearfix">
                        <h3>Onoma hotel : <?= $hotel['hotel_name']; ?></h3>
                    </div>
                    <div class="col-md-12 no-padding clearfix">
                        <h3>Paketo id : <?= $hotel['package_id']; ?></h3>
                    </div>
                    <div class="col-md-12 no-padding clearfix">
                        <h3>Location id : <?= $hotel['location_id']; ?></h3>
                    </div>
                    <div class="col-md-12 no-padding clearfix">
                        <h3>distance_from_sea : <?= $hotel['distance_from_sea']; ?></h3>
                    </div>

                    <div class="col-md-12 no-padding clearfix">
                        <h3>distance_from_center : <?= $hotel['distance_from_center']; ?></h3>
                    </div>
                    <div class="col-md-12 no-padding clearfix">
                        <h3>hotel_thumb : <?= $hotel['hotel_thumb']; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

