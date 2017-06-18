<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'boards/editBoard' ?>" enctype="multipart/form-data">
                <input type="hidden" name="board_id" value="<?= $board['board_id']; ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Board Name</label>
                        <input class="form-control" type="text" name="board_name" value="<?= $board['board_name'] ?>" required="required"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

