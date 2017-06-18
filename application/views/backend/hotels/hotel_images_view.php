<section id="main-content">
    <section class="wrapper">
        <form method="POST" action="<?= $this->config->item('admin_url') . 'hotels/images/' . $hotel['hotel_id'] ?>" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Hotel Images</label>
                    <input class="form-control" type="file" name="images[]" value="" multiple="multiple"/>
                </div>
            </div>

            <?php if (isset($images) && !empty($images)) { ?>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <?php foreach ($images as $image) { ?>
                            <div class="col-md-3">
                                <div class="file-div clearfix">
                                    <a target="_blank" href="<?= base_url('assets/uploads/' . $image['image_name']) ?>">
                                        <?= $image['image_original_name'] ?>
                                    </a>
                                    <img style="max-width:100px;" src="<?= base_url('assets/uploads/' . $image['image_name']) ?>"/>
                                    <br/>
                                    Is Thumb? <input type="radio" value="<?= $image['hotel_image_id'] ?>" name="is_thumb" <?php if($image['is_thumb'] == 1) echo "checked='checked'" ?>/>
                                    <br/>
                                    Delete Image? <input type="checkbox" value="1" name="delete_file_<?= $image['hotel_image_id'] ?>"/>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <br/><br/>
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>

        </form>
    </section>
</section>

<style>
    .file-div {
        padding: 10px;
        border: 1px solid #cecece;
        border-radius: 5px;
        text-align: center;
    }
</style>
