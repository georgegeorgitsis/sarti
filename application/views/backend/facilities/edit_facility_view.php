<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'facilities/editFacility' ?>" enctype="multipart/form-data">
                <input type="hidden" name="facility_id" value="<?= $facility['facility_id']; ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Facility type</label>
                        <input class="form-control" type="text" name="facility_type" value="<?= $facility['facility_type'] ?>"/>
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
                                        <label><?= $language['lang_name'] ?> Hotel Short Description</label>
                                        <input class="form-control" type="text" name="facility_name_<?= $language['lang_id'] ?>" value="<?= $facilityLocale[$language['lang_id']]['facility_name']; ?>" required="required"/>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Facility Icon</label>
                        <input class="form-control" type="file" name="facility_icon" value=""/>
                    </div>
                    <div class="col-md-12 form-group">
                        <img style="max-width:50px;" src="<?= base_url('assets/uploads/facilities/') . $facility['facility_icon'] ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

