<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'rooms/editRoomPrices' ?>">
                <input type="hidden" name="room_id" value="<?= $room_id ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Room</label>
                        <input class="form-control" type="text" value="<?= $room['room_name'] ?>" disabled="disabled"/>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <fieldset>
                        <legend>Periods</legend>
                        <?php if (isset($package_periods_new) && !empty($package_periods_new)) { ?>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <?php foreach ($package_periods_new as $package_period_new) { ?>
                                        <div class="col-md-12 form-group clearfix">
                                            <div class="col-md-2">
                                                <label>From</label>
                                                <input type="text" class="form-control" value="<?= $package_period_new['period_from'] ?>" disabled="disabled"/>
                                            </div>
                                            <div class="col-md-2">
                                                <label>To</label>
                                                <input type="text" class="form-control" value="<?= $package_period_new['period_to'] ?>" disabled="disabled"/>
                                            </div>

                                            <?php if (isset($package_period_new['prices']) && !empty($package_period_new['prices'])) { ?>
                                                <?php foreach ($package_period_new['prices'] as $Adult_key => $perPeriodAdult) { ?>
                                                    <div class="col-md-1">
                                                        <label><?= $Adult_key ?> Adults &euro;</label>
                                                        <input type="text" class="form-control" name="price_<?= $package_period_new['package_period_id'] ?>_<?= $Adult_key; ?>" placeholder="Price" value="<?= $perPeriodAdult['price'] ?>"/>
                                                    </div>
                                                <?php } ?>
                                                <div class="col-md-1">
                                                    <label>SpecialOffer%</label>
                                                    <input type="text" class="form-control" value="<?= $package_period_new['extras']['special_offer'] ?>" name="special_offer_<?= $package_period_new['package_period_id'] ?>"/>
                                                </div>
                                                <div class="col-md-1">
                                                    <label>E. Booking%</label>
                                                    <input type="text" class="form-control" value="<?= $package_period_new['extras']['early_booking'] ?>" name="early_booking_<?= $package_period_new['package_period_id'] ?>"/>
                                                </div>
                                                <div class="col-md-1">
                                                    <label>E. B. Until</label>
                                                    <input type="text" class="form-control early_booking_until" value="<?= $package_period_new['extras']['early_booking_until'] ?>" name="early_booking_until_<?= $package_period_new['package_period_id'] ?>"/>
                                                </div>
                                                <div class="col-md-1">
                                                    <label>Is Active</label>
                                                    <select name="is_active_<?= $package_period_new['package_period_id'] ?>">
                                                        <option value="0" <?php if ($package_period_new['extras']['is_active'] == 0) echo "selected='selected'"; ?>>No</option>
                                                        <option value="1" <?php if ($package_period_new['extras']['is_active'] == 1) echo "selected='selected'"; ?>>Yes</option>
                                                    </select>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <hr/>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </fieldset>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

<script type="text/javascript">

    $(window).load(function () {
        $(".early_booking_until").datetimepicker({
            format: 'YYYY-MM-DD'
        });
    })

</script>