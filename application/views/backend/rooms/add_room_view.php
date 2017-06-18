<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'rooms/addRoom/' . $hotel_id ?>" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Room name</label>
                        <input class="form-control" type="text" name="room_name" value="<?php echo set_value('room_name'); ?>" required="required"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Hotels</label>
                        <select name="hotel_id" class="form-control">
                            <option value="<?= $hotel['hotel_id']; ?>"><?= $hotel['hotel_name']; ?></option>
                        </select>
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
                                            <label><?= $language['lang_name'] ?> Room Short Description</label>
                                            <input class="form-control" type="text" name="room_short_description_<?= $language['lang_id'] ?>" value="<?php echo set_value('room_short_description_' . $language['lang_id']); ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Room Long Description</label>
                                            <textarea class="form-control" name="room_description_<?= $language['lang_id'] ?>"><?php echo set_value('room_description_' . $language['lang_id']); ?></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Room Seo Title</label>
                                            <textarea class="form-control" name="room_seo_title_<?= $language['lang_id'] ?>"><?php echo set_value('room_seo_title_' . $language['lang_id']); ?></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Room Seo Meta Description</label>
                                            <textarea class="form-control" name="room_seo_meta_description_<?= $language['lang_id'] ?>"><?php echo set_value('room_seo_meta_description_' . $language['lang_id']); ?></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Room Seo Keywords</label>
                                            <textarea class="form-control" name="room_seo_keywords_<?= $language['lang_id'] ?>"><?php echo set_value('room_seo_keywords_' . $language['lang_id']); ?></textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Room Friendly URL</label>
                                            <textarea class="form-control" name="room_friendly_url_<?= $language['lang_id'] ?>"><?php echo set_value('room_friendly_url_' . $language['lang_id']); ?></textarea>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Package</label>
                        <select name="package_id" class="form-control">
                            <?php foreach ($packages as $package) { ?>
                                <option value="<?= $package['package_id']; ?>" <?php
                                if ($hotel_package_id == $package['package_id']) {
                                    echo "selected='selected'";
                                }
                                ?>><?= $package['package_type']; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Room Type</label>
                        <select name="room_type_id" class="form-control">
                            <?php foreach ($roomTypes as $roomType) { ?>
                                <option value="<?= $roomType['room_type_id']; ?>"><?= $roomType['room_type_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Boards</label>
                        <select name="board_id" class="form-control">
                            <?php foreach ($boards as $board) { ?>
                                <option value="<?= $board['board_id']; ?>"><?= $board['board_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Floor</label>
                        <select name="floor" class="form-control">
                            <option value="basement">basement</option>
                            <option value="ground_floor">ground floor</option>
                            <option value="upper_floor" selected="selected">upper floor</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Sea View</label>
                        <select name="sea_view">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Facilities</label><br/>
                        <div class="form-control">
                            <?php foreach ($facilities as $facility) { ?>
                                <label for="facility-<?= $facility['facility_id']; ?>"><?= $facility['facility_type'] ?></label> <input id="facility-<?= $facility['facility_id']; ?>" <?php
                                if (in_array($facility['facility_id'], $hotelFacilities)) {
                                    echo "checked='checked'";
                                }
                                ?> type="checkbox" name="facilities[]" value="<?= $facility['facility_id']; ?>"> &nbsp; &nbsp;<?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Min Persons</label>
                        <select name="min_adults" class="form-control">
                            <?php for ($i = 1; $i <= 20; $i++) { ?>
                                <option value="<?= $i; ?>" <?php if ($i == 2) echo "selected='selected'" ?>><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Max Persons</label>
                        <select name="max_adults" class="form-control">
                            <?php for ($i = 1; $i <= 20; $i++) { ?>
                                <option value="<?= $i; ?>" <?php if ($i == 2) echo "selected='selected'" ?>><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Is Active</label>
                        <select name="room_active">
                            <option value="0">No</option>
                            <option value="1" selected="selected">Yes</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Featured</label>
                        <select name="room_featured">
                            <option value="0" selected="selected">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <?php if (isset($ground_plans) && !empty($ground_plans)) { ?>
                        <div class="col-md-12 form-group clearfix">
                            <div class="col-md-12">
                                <label>Select Ground Plan</label>
                            </div>
                            <?php foreach ($ground_plans as $image) { ?>
                                <div class="col-md-3">
                                    <div class="file-div clearfix">
                                        <a target="_blank" href="<?= base_url('assets/uploads/' . $image['ground_plan_image']) ?>">
                                            <?= $image['ground_plan_original_image'] ?>
                                        </a>
                                        <img style="max-width:100px;" src="<?= base_url('assets/uploads/' . $image['ground_plan_image']) ?>"/>
                                        <br/><br/>
                                        Select Ground Plan <input type="radio" value="<?= $image['ground_plan_id'] ?>" name="ground_plan"/>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <!--
                    <div class="col-md-12 form-group">
                        <label>Room Thumb</label>
                        <input class="form-control" type="file" name="room_thumb" value="<?php echo set_value('room_thumb'); ?>"/>
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
