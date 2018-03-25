<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'locations/addLocation' ?>" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Language name</label>
                        <input class="form-control" type="text" name="location_name" value="<?= set_value('location_name'); ?>" required="required"/>
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
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label><?= $language['lang_name'] ?> Package Name</label>
                                        <input class="form-control" type="text" name="location_name_<?= $language['lang_id'] ?>" value="<?php echo set_value('location_name_' . $language['lang_id']); ?>"/>
                                    </div>
                                </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>