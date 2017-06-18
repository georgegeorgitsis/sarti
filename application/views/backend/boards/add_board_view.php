<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'boards/addBoard' ?>">
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Board Name</label>
                        <input class="form-control" type="text" name="board_name" value="<?php echo set_value('board_name'); ?>"/>
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

