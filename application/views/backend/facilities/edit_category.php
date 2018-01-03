<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'facilities/editCategory' ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $category['id']; ?>"/>
                <div class="col-md-12">
                    <div class="col-md-6 col-md-offset-3 form-group">
                        <label>Category</label>
                        <input class="form-control" type="text" name="category" value="<?= $category['description'] ?>"/>
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
