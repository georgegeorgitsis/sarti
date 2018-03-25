<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'banners/update/'.$banner['id'] ?>" enctype="multipart/form-data" novalidate>
                <div class="col-md-12 form-group">
                    <label>Name (For administrator use) *</label>
                    <input class="form-control" type="text" name="name" value="<?= $banner['name'] ?>"/>
                </div>
                
                <div class="tabs col-md-12">
                    <ul>
                        <?php if (isset($languages) && !empty($languages)): ?>
                            <?php foreach ($languages as $language): ?>
                                <li><a href="#tabs-<?= $language['lang_id'] ?>"><?= $language['lang_name'] ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <?php if (isset($languages) && !empty($languages)) : ?>
                        <?php foreach ($languages as $language): ?>
                        <?php 
                            $locale = array();
                            $locale = array_filter($banner['locales'], function($loc) use($language){
                                if($loc['lang_id'] == $language['lang_id']){
                                    return $loc;
                                }
                            });
                            $locale = array_values($locale);
                        ?>
                        <div id="tabs-<?= $language['lang_id'] ?>">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label><?= $language['lang_name'] ?> Title </label>
                                    <input class="form-control" type="text" name="<?= 'title_'. $language['lang_id'] ?>"
                                        value="<?= (isset($locale[0]['title'])) ? $locale[0]['title'] : "" ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label><?= $language['lang_name'] ?> Description </label>
                                    <textarea class="form-control" name="<?= 'description_'. $language['lang_id'] ?>" rows="5"><?= (isset($locale[0]['description'])) ? $locale[0]['description'] : "" ?></textarea>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-6">
                            <label>Background Color</label>
                            <input type="color" name="background_color" id="background_color" value="<?= $banner['background_color'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <h3>Banner Link</h3>
                        <div class="col-md-6 form-group">
                            <label>URL *</label>
                            <input class="form-control" type="text" name="url" required="required" value="<?= $banner['link_url'] ?>"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Target</label>
                            <input class="form-control" type="text" name="target" placeholder="_blank"
                                value="<?= (isset($banner['link_target'])) ? $banner['link_target'] : "" ?>"/>
                        </div>
                    </div>                   
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="image"/>
                            <?php if(isset($banner['image_url'])): ?>
                                <img style="max-width:50px;" src="<?= base_url('assets/uploads/banners/').$banner['image_url'] ?>"/>
                            <?php endif;?>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Icon</label>
                            <input class="form-control" type="file" name="icon"/>
                            <?php if(isset($banner['icon_url'])): ?>
                                <img style="max-width:50px;" src="<?= base_url('assets/uploads/banners/').$banner['icon_url'] ?>"/>
                            <?php endif;?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Active</label>
                            <input type="checkbox" name="active" <?= ($banner['active']) ? "checked" : "" ?>/>
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

