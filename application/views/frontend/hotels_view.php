<div class="container">
    <?php //var_dump($hotels); ?>
    <?php if (isset($hotels) && !empty($hotels)) { ?>
        <?php foreach ($hotels as $hotel) { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="hotel-title">
                        <?= $hotel['hotel_name'] ?>
                        <img src="<?= base_url('assets/uploads/'). $hotel['thumb']['image_name'] ?>"/>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>