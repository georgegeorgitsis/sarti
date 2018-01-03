<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'rooms/addRoomPrices' ?>">
                <input type="hidden" name="room_id" value="<?= $room_id ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Room</label>
                        <input class="form-control" type="text" value="<?= $room['room_name'] ?>" disabled="disabled"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Periods</label>
                        <?php if (isset($package_periods) && !empty($package_periods)) { ?>
                            <?php foreach ($package_periods as $package_period) { ?>
                                <div class="col-md-12 form-group">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" value="<?= $package_period['period_from'] ?>" disabled="disabled"/>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" value="<?= $package_period['period_to'] ?>" disabled="disabled"/>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="price_<?= $package_period['package_period_id'] ?>" placeholder="Price"/>
                                    </div>
                                </div>
                                <br/>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

<script type="text/javascript">

    $(window).load(function () {
        $("input[name='period_from']").datepicker({
            format: 'dd-mm-yyyy',
            minDate: new Date(),
            startDate: new Date(),
            autoclose: true
        });
    })

</script>