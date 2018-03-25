<section id="main-content">
    <section class="wrapper">
        <form method="POST" action="<?= $this->config->item('admin_url') . 'hotels/saveGroundPlans' ?>" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
            <input type="hidden" value="<?= $hotel_id ?>" name="hotel">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Ground Plans</label>
                    <input class="form-control" type="file" name="plans[]" value="" multiple="multiple"/>
                </div>
            </div>

            <?php if (isset($plans) && !empty($plans)) { ?>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <div class="row">
                        <?php foreach ($plans as $image) { ?>
                            <div class="col-md-3">
                                <div class="file-div clearfix">
                                    <a target="_blank" href="<?= base_url('assets/uploads/ground_plans/' . $image['ground_plan_image']) ?>">
                                        <?= $image['ground_plan_original_image'] ?>
                                    </a>
                                    <img style="max-width:100px;" src="<?= base_url('assets/uploads/ground_plans/' . $image['ground_plan_image']) ?>"/>
                                    <br/>
                                    <input type="text" name="plan_description_<?= $image['id'] ?>" id="plan_description_<?= $image['id'] ?>" 
                                        value="<?= (isset($image['ground_plan_description'])) ? $image['ground_plan_description'] : "" ?>">
                                    <br/><br/>
                                    Delete Image? <input type="checkbox" value="1" name="delete_file_<?= $image['id'] ?>"/>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
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
