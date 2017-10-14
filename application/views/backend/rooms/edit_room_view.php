<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'rooms/editRoom/' . $room_id ?>" enctype="multipart/form-data">
                <input type="hidden" name="room_id" value="<?= $room_id ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Room name</label>
                        <input class="form-control" type="text" name="room_name" value="<?= $room['room_name'] ?>" required="required"/>
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
                            <?php if (isset($languages) && !empty($languages)): ?>
                                <?php foreach ($languages as $language): ?>
                                    <div id="tabs-<?= $language['lang_id'] ?>">
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Short Description</label>
                                            <input class="form-control" type="text" name="room_short_description_<?= $language['lang_id'] ?>" 
                                                value="<?php
                                                    if(isset($roomLocale[$language['lang_id']]['room_short_description']) && $roomLocale[$language['lang_id']]['room_short_description']) {
                                                        echo $roomLocale[$language['lang_id']]['room_short_description'] ;
                                                    } ?>"/>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Long Description</label>
                                            <textarea class="form-control" name="room_description_<?= $language['lang_id'] ?>">
                                                <?php if(isset($roomLocale[$language['lang_id']]['room_description']) && $roomLocale[$language['lang_id']]['room_description']){
                                                    echo  $roomLocale[$language['lang_id']]['room_description']; 
                                                }?>
                                            </textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Seo Title</label>
                                            <textarea class="form-control" name="room_seo_title_<?= $language['lang_id'] ?>">
                                                <?php if(isset( $roomLocale[$language['lang_id']]['room_seo_title']) && $roomLocale[$language['lang_id']]['room_seo_title']){
                                                    echo $roomLocale[$language['lang_id']]['room_seo_title'];
                                                } ?>
                                            </textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Seo Meta Title</label>
                                            <textarea class="form-control" name="room_seo_meta_description_<?= $language['lang_id'] ?>">
                                                <?php if(isset( $roomLocale[$language['lang_id']]['room_seo_meta_description']) && $roomLocale[$language['lang_id']]['room_seo_meta_description']){
                                                    echo $roomLocale[$language['lang_id']]['room_seo_meta_description'];
                                                } ?>
                                            </textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Seo Keywords</label>
                                            <textarea class="form-control" name="room_seo_keywords_<?= $language['lang_id'] ?>">
                                                <?php if(isset($roomLocale[$language['lang_id']]['room_seo_keywords']) && $roomLocale[$language['lang_id']]['room_seo_keywords']){
                                                    echo $roomLocale[$language['lang_id']]['room_seo_keywords'];
                                                } ?>
                                            </textarea>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label><?= $language['lang_name'] ?> Hotel Friendly URL</label>
                                            <textarea class="form-control" name="room_friendly_url_<?= $language['lang_id'] ?>">
                                                <?php if(isset($roomLocale[$language['lang_id']]['room_friendly_url']) && $roomLocale[$language['lang_id']]['room_friendly_url']){
                                                    echo $roomLocale[$language['lang_id']]['room_friendly_url'];
                                                } ?>
                                            </textarea>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Package</label>
                        <select name="package_id" class="form-control">
                            <?php foreach ($packages as $package) { ?>
                                <option value="<?= $package['package_id']; ?>" <?php
                                if ($package['package_id'] == $room['room_package_id']) {
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
                                <option value="<?= $roomType['room_type_id']; ?>"<?php
                                if ($roomType['room_type_id'] == $room['room_type_id']) {
                                    echo "selected='selected'";
                                }
                                ?>><?= $roomType['room_type_name']; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Boards</label>
                        <select name="board_id" class="form-control">
                            <?php foreach ($boards as $board) { ?>
                                <option value="<?= $board['board_id']; ?>" <?php if ($room['board_id'] == $board['board_id']) echo "selected='selected'"; ?>><?= $board['board_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Floor</label>
                        <select name="floor" class="form-control">
                            <option value="basement" <?php if ($room['floor'] == "basement") echo "selected='selected'" ?>>basement</option>
                            <option value="ground_floor" <?php if ($room['floor'] == "ground_floor") echo "selected='selected'" ?>>ground floor</option>
                            <option value="upper_floor" <?php if ($room['floor'] == "upper_floor") echo "selected='selected'" ?>>upper floor</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Sea View</label>
                        <select name="sea_view">
                            <option value="0" <?php if ($room['sea_view'] == 0) echo "selected='selected'"; ?>>No</option>
                            <option value="1" <?php if ($room['sea_view'] == 1) echo "selected='selected'"; ?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Facilities</label><br/>
                        <div class="form-control">
                            <?php foreach ($facilities as $facility) { ?>
                                <label for="facility-<?= $facility['facility_id']; ?>"><?= $facility['facility_type'] ?></label> <input id="facility-<?= $facility['facility_id']; ?>" <?php
                                if (in_array($facility['facility_id'], $roomFacilities)) {
                                    echo "checked='checked'";
                                }
                                ?> type="checkbox" name="facilities[]" value="<?= $facility['facility_id']; ?>"> &nbsp; &nbsp;<?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Min Persons</label>
                        <select name="min_adults" class="form-control">
                            <?php for ($i = 1; $i <= 20; $i++) { ?>
                                <option value="<?= $i; ?>" <?php
                                if ($i == $room['min_adults']) {
                                    echo "selected='selected'";
                                }
                                ?>><?= $i; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Max Persons</label>
                        <select name="max_adults" class="form-control">
                            <?php for ($i = 1; $i <= 20; $i++) { ?>
                                <option value="<?= $i; ?>" <?php
                                if ($i == $room['max_adults']) {
                                    echo "selected='selected'";
                                }
                                ?>><?= $i; ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Is Active</label>
                        <select name="room_active">
                            <option value="0" <?php if ($room['room_active'] == 0) echo "selected='selected'"; ?>>No</option>
                            <option value="1" <?php if ($room['room_active'] == 1) echo "selected='selected'"; ?>>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Featured</label>
                        <select name="room_featured">
                            <option value="0" <?php if ($room['room_featured'] == 0) echo "selected='selected'"; ?>>No</option>
                            <option value="1" <?php if ($room['room_featured'] == 1) echo "selected='selected'"; ?>>Yes</option>
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
                                        Select Ground Plan <input type="radio" value="<?= $image['ground_plan_id'] ?>" name="ground_plan" <?php if ($room['ground_plan_id'] == $image['ground_plan_id']) echo "checked='checked'" ?>/>
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
                    <div class="col-md-12 form-group">
                        <img style="max-width:200px;" src="<?= base_url('assets/uploads/') . $room['room_thumb'] ?>"/>
                    </div>
                    -->
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

