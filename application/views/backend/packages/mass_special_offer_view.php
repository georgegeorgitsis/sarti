<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <?php if (isset($non_allotment_packages) && !empty($non_allotment_packages)) { ?>
            <form method="POST" action="<?= $this->config->item('admin_url') . 'packages/massSpecialOffer' ?>" onsubmit="return confirm('Are you sure? This will override all saved Special Offer Discount for all rooms that are related to selected package periods!')">
                    <div class="col-md-12 clearfix">
                        <div class="col-md-1">
                            <label>Select Period</label>
                        </div>
                        <div class="col-md-2">
                            <label>Package</label>
                        </div>
                        <div class="col-md-2">
                            <label>Period From</label>
                        </div>
                        <div class="col-md-2">
                            <label>Period To</label>
                        </div>
                    </div>
                    <?php foreach ($non_allotment_packages as $period) { ?>
                        <div class="col-md-12 clearfix">
                            <div class="col-md-1">
                                <input type="checkbox" name="period_<?= $period['package_period_id'] ?>" value="1"/>
                            </div>
                            <div class="col-md-2">
                                <label><?= $period['package_type'] ?></label>
                            </div>
                            <div class="col-md-2">
                                <label><?= $period['period_from'] ?></label>
                            </div>
                            <div class="col-md-2">
                                <label><?= $period['period_to'] ?></label>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-md-12">
                        <hr/>
                    </div>

                    <div class="col-md-12 clearfix">
                        <div class="col-md-2 form-group"  style="border: 1px solid #cecece;">
                            <label>Special Offer %</label>
                            <input type="text" name="special_offer" value="" class="form-control"/>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </section>
</section>
