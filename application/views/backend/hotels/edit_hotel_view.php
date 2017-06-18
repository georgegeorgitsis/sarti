<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'hotels/editHotel' ?>" enctype="multipart/form-data">
                <input type="hidden" name="hotel_id" value="<?= $hotel['hotel_id']; ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Hotel name</label>
                        <input class="form-control" type="text" name="hotel_name" value="<?= $hotel['hotel_name'] ?>"/>
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
                                            <input class="form-control" type="text" name="hotel_short_description_<?= $language['lang_id'] ?>" value="<?= $hotelLocale[$language['lang_id']]['hotel_short_description']; ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Long Description</label>
                                            <textarea class="form-control" name="hotel_long_description_<?= $language['lang_id'] ?>"><?= $hotelLocale[$language['lang_id']]['hotel_long_description']; ?></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Meta TItle</label>
                                            <input class="form-control" type="text" name="hotel_seo_title_<?= $language['lang_id'] ?>" value="<?= $hotelLocale[$language['lang_id']]['hotel_seo_title']; ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Meta Description</label>
                                            <input class="form-control" type="text" name="hotel_seo_meta_description_<?= $language['lang_id'] ?>" value="<?= $hotelLocale[$language['lang_id']]['hotel_seo_meta_description']; ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Seo Keywords</label>
                                            <input class="form-control" type="text" name="hotel_seo_keywords_<?= $language['lang_id'] ?>" value="<?= $hotelLocale[$language['lang_id']]['hotel_seo_keywords']; ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Friendly URL</label>
                                            <input class="form-control" type="text" name="hotel_friendly_url_<?= $language['lang_id'] ?>" value="<?= $hotelLocale[$language['lang_id']]['hotel_friendly_url']; ?>"/>
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
                                <option value="<?= $i; ?>" <?php if ($i == $hotel['stars']) {
                                echo "selected='selected'";
                            } ?>><?= $i; ?></option>
<?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Distance From Sea (in meters)</label>
                        <input class="form-control" type="text" name="distance_from_sea" value="<?= $hotel['distance_from_sea']; ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Distance From Center (in meters)</label>
                        <input class="form-control" type="text" name="distance_from_center" value="<?= $hotel['distance_from_center']; ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Package</label>
                        <select name="package_id" class="form-control">
                            <?php foreach ($packages as $package) { ?>
                                <option value="<?= $package['package_id']; ?>" <?php if ($package['package_id'] == $hotel['package_id']) {
                                echo "selected='selected'";
                            } ?>><?= $package['package_type']; ?></option>
<?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Minimum Stay (only if package is allotment)</label>
                        <select name="minimum_stay" class="form-control">
<?php for ($i = 1; $i <= 30; $i++) { ?>
                                <option value="<?= $i; ?>" <?php if ($hotel['minimum_stay'] == $i) echo "selected='selected'"; ?>><?= $i; ?></option>
<?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Location</label>
                        <select name="location_id" class="form-control">
<?php foreach ($locations as $location) { ?>
                                <option value="<?= $location['location_id']; ?>" <?php if ($location['location_id'] == $hotel['location_id']) {
        echo "selected='selected'";
    } ?>><?= $location['location_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Facilities</label><br/>
                        <div class="form-control clearfix" style="height: auto">
                            <?php foreach ($facilities as $facility) { ?>
                                <div class="col-md-3" style="border: 1px solid #ddd; margin-right: 5px;">
                                    <label for="facility-<?= $facility['facility_id']; ?>"><?= $facility['facility_type'] ?>: </label>
                                    Enable<input id="facility-<?= $facility['facility_id']; ?>" <?php if (in_array($facility['facility_id'], $hotelFacilities)) {
                                    echo "checked='checked'";
                                } ?> type="checkbox" name="facilities[]" value="<?= $facility['facility_id']; ?>">
                                    is main?<input id="facility-main-<?= $facility['facility_id']; ?>" <?php if (in_array($facility['facility_id'], $hotelFacilitiesMain)) {
                                    echo "checked='checked'";
                                } ?> type="checkbox" name="facilities_main[]" value="<?= $facility['facility_id']; ?>"><br/>
                                </div>

<?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Longitude</label>
                        <input class="form-control" type="text" name="longitude" value="<?= $hotel['longitude'] ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Latitude</label>
                        <input class="form-control" type="text" name="latitude" value="<?= $hotel['latitude'] ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Is Active</label>
                        <select name="hotel_active">
                            <option value="0" <?php if ($hotel['hotel_active'] == 0) echo "selected='selected'"; ?>>No</option>
                            <option value="1" <?php if ($hotel['hotel_active'] == 1) echo "selected='selected'"; ?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Featured</label>
                        <select name="hotel_featured">
                            <option value="0" <?php if ($hotel['hotel_featured'] == 0) echo "selected='selected'"; ?>>No</option>
                            <option value="1" <?php if ($hotel['hotel_featured'] == 1) echo "selected='selected'"; ?>>Yes</option>
                        </select>
                    </div>
                    <!--
                    <div class="col-md-12 form-group">
                        <label>Hotel Thumb</label>
                        <input class="form-control" type="file" name="hotel_thumb" value=""/>
                    </div>
                    <div class="col-md-12 form-group">
                        <img style="max-width:200px;" src="<?= base_url('assets/uploads/') . $hotel['hotel_thumb'] ?>"/>
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

