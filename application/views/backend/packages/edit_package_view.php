<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'packages/editPackage' ?>">
                <input type="hidden" name="package_id" value="<?= $package['package_id'] ?>"/>
                <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Package Type</label>
                        <input class="form-control" type="text" name="package_type" value="<?= $package['package_type']; ?>"/>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 form-group">
                    <label>Is Type</label>
                    <select name="is_package_type">
                        <option value="1" <?php if ($package['is_package_type'] == 1) echo "selected='selected'"; ?>>Allotment</option>
                        <option value="2" <?php if ($package['is_package_type'] == 2) echo "selected='selected'"; ?>>7 Days</option>
                        <option value="3" <?php if ($package['is_package_type'] == 3) echo "selected='selected'"; ?>>10 Days</option>
                    </select>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <div class="tabs">
                        <ul>
                            <?php if (isset($languages) && !empty($languages)) { ?>
                                <?php foreach ($languages as $language) { ?>
                                    <li><a href="#tabs-<?= $language['lang_id'] ?>"><?= $language['lang_name'] ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                        <?php if (isset($languages) && !empty($languages)) { ?>
                            <?php foreach ($languages as $language) { ?>
                                <div id="tabs-<?= $language['lang_id'] ?>">
                                    <div class="col-md-12 form-group">
                                        <label><?= $language['lang_name'] ?> Package Name</label>
                                        <input class="form-control" type="text" name="package_name_<?= $language['lang_id'] ?>" value="<?= $packageLocales[$language['lang_id']]['package_name']; ?>"/>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                    <label>Early Booking (%)</label>
                    <input type="text" class="form-control" name="early_booking" value="<?= $package['early_booking'] ?>"/>
                </div>
                <div class="col-md-12">
                    <label>Early Booking Until</label>
                    <input type="text" class="form-control early_booking_until"  name="early_booking_until" value="<?= $package['early_booking_until'] ?>"/>
                </div>
                </div>
                <div class="col-md-12">
                    <label>Is Early Booking Active</label>
                    <select name="eb_is_active">
                        <option value="0">No</option>
                        <option value="1" <?= $package['eb_is_active'] ? "selected" : "" ?>>Yes</option>
                    </select>
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
        $(".early_booking_until").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            minDate: new Date(),
            startDate: new Date()
        });
    })

</script>