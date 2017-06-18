<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'packages/addPackage' ?>">
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Package Type</label>
                        <input class="form-control" type="text" name="package_type" value="<?php echo set_value('package_type'); ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Is Allotment</label>
                        <select name="is_allotment">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
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
                                        <label><?= $language['lang_name'] ?> Package Name</label>
                                        <input class="form-control" type="text" name="package_name_<?= $language['lang_id'] ?>" value="<?php echo set_value('package_name_' . $language['lang_id']); ?>"/>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
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

