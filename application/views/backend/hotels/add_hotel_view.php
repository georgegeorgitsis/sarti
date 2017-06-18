<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'hotels/addHotel' ?>" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Hotel name</label>
                        <input class="form-control" type="text" name="hotel_name" value="<?php echo set_value('hotel_name'); ?>" required="required"/>
                    </div>

                    <div class="col-md-12 form-group">
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
                                            <input class="form-control" type="text" name="hotel_short_description_<?= $language['lang_id'] ?>" value="<?php echo set_value('hotel_short_description_' . $language['lang_id']); ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Long Description</label>
                                            <textarea class="form-control" name="hotel_long_description_<?= $language['lang_id'] ?>"><?php echo set_value('hotel_long_description_' . $language['lang_id']); ?></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Meta TItle</label>
                                            <input class="form-control" type="text" name="hotel_seo_title_<?= $language['lang_id'] ?>" value="<?php echo set_value('hotel_seo_title_' . $language['lang_id']); ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Meta Description</label>
                                            <input class="form-control" type="text" name="hotel_seo_meta_description_<?= $language['lang_id'] ?>" value="<?php echo set_value('hotel_seo_meta_description_' . $language['lang_id']); ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Seo Keywords</label>
                                            <input class="form-control" type="text" name="hotel_seo_keywords_<?= $language['lang_id'] ?>" value="<?php echo set_value('hotel_seo_keywords_' . $language['lang_id']); ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Friendly URL</label>
                                            <input class="form-control" type="text" name="hotel_friendly_url_<?= $language['lang_id'] ?>" value="<?php echo set_value('hotel_friendly_url_' . $language['lang_id']); ?>"/>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Hotel Stars</label>
                        <select name="stars" class="form-control">
                            <?php for ($i = 0; $i <= 5; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Distance From Sea (in meters)</label>
                        <input class="form-control" type="text" name="distance_from_sea" value="<?php echo set_value('distance_from_sea'); ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Distance From Center (in meters)</label>
                        <input class="form-control" type="text" name="distance_from_center" value="<?php echo set_value('distance_from_center'); ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Package</label>
                        <select name="package_id" class="form-control">
                            <?php foreach ($packages as $package) { ?>
                                <option value="<?= $package['package_id']; ?>"><?= $package['package_type']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Minimum Stay (only if package is allotment)</label>
                        <select name="minimum_stay" class="form-control">
                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Location</label>
                        <select name="location_id" class="form-control">
                            <?php foreach ($locations as $location) { ?>
                                <option value="<?= $location['location_id']; ?>"><?= $location['location_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Facilities</label><br/>
                        <div class="form-control clearfix" style="height: auto">
                            <?php foreach ($facilities as $facility) { ?>
                                <div class="col-md-3" style="border: 1px solid #ddd; margin-right: 5px;">
                                    <label for="facility-<?= $facility['facility_id']; ?>"><?= $facility['facility_type'] ?>: </label>
                                    Enable<input id="facility-<?= $facility['facility_id']; ?>" type="checkbox" name="facilities[]" value="<?= $facility['facility_id']; ?>"> - 
                                    is main?<input id="facility-main-<?= $facility['facility_id']; ?>" type="checkbox" name="facilities_main[]" value="<?= $facility['facility_id']; ?>"><br/>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Longitude</label>
                        <input class="form-control" type="text" name="longitude" value="<?php echo set_value('longitude'); ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Latitude</label>
                        <input class="form-control" type="text" name="latitude" value="<?php echo set_value('latitude'); ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Is Active</label>
                        <select name="hotel_active">
                            <option value="0">No</option>
                            <option value="1" selected="selected">Yes</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Featured</label>
                        <select name="hotel_featured">
                            <option value="0" selected="selected">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <!--
                    <div class="col-md-12 form-group">
                        <label>Hotel Thumb</label>
                        <input class="form-control" type="file" name="hotel_thumb" value="<?php echo set_value('hotel_thumb'); ?>"/>
                    </div>
                    -->
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

