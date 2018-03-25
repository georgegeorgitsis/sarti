<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'banners/create' ?>" enctype="multipart/form-data" novalidate>
                <div class="col-md-12 form-group">
                    <label>Name (For administrator use) *</label>
                    <input class="form-control" type="text" name="name"/>
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
                        <div id="tabs-<?= $language['lang_id'] ?>">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label><?= $language['lang_name'] ?> Title </label>
                                    <input class="form-control" type="text" name="<?= 'title_'. $language['lang_id'] ?>"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label><?= $language['lang_name'] ?> Description </label>
                                    <textarea class="form-control" name="<?= 'description_'. $language['lang_id'] ?>"
                                        rows="5"></textarea>
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
                            <input type="color" name="background_color" id="background_color" value="#ffffff">
                        </div>
                    </div>
                    <div class="row">
                        <h3>Banner Link</h3>
                        <div class="col-md-6 form-group">
                            <label>URL *</label>
                            <input class="form-control" type="text" name="url" required="required"/>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Target</label>
                            <input class="form-control" type="text" name="target" placeholder="_blank"/>
                        </div>
                    </div>                   
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="image"/>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Icon</label>
                            <input class="form-control" type="file" name="icon"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Active</label>
                            <input type="checkbox" name="active" />
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

