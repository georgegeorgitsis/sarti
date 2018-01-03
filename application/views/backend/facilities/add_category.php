<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'facilities/addCategory' ?>" enctype="multipart/form-data" novalidate>
                <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 form-group">
                        <label>Category</label>
                        <input class="form-control" type="text" name="category" 
                            value="<?php echo set_value('category'); ?>"/>
                    </div>
                </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-3 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

