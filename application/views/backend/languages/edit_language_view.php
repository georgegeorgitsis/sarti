<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'languages/editLanguage' ?>" enctype="multipart/form-data">
                <input type="hidden" name="lang_id" value="<?= $language['lang_id'] ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Language name</label>
                        <input class="form-control" type="text" name="lang_name" value="<?= $language['lang_name']; ?>" required="required"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Lang abbreviation</label>
                        <input class="form-control" type="text" name="lang_abbreviation" value="<?= $language['lang_abbreviation']; ?>" required="required"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Language Icon</label>
                        <input class="form-control" type="file" name="lang_icon" value="<?php echo set_value('lang_icon'); ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <img style="max-width:50px;" src="<?= base_url('assets/uploads/langs/') . $language['lang_icon'] ?>"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>