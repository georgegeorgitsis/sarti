<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'facilities/addFacility' ?>" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Facility Type</label>
                        <input class="form-control" type="text" name="facility_type" value="<?php echo set_value('facility_type'); ?>"/>
                    </div>

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
                                        <label><?= $language['lang_name'] ?> Facility Name</label>
                                        <input class="form-control" type="text" name="facility_name_<?= $language['lang_id'] ?>" value="<?php echo set_value('facility_name_' . $language['lang_id']); ?>" required="required"/>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Facility Icon</label>
                        <input class="form-control" type="file" name="facility_icon" value="<?php echo set_value('facility_icon'); ?>" required="required"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

