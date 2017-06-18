<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'rooms/editRoomType' ?>" enctype="multipart/form-data">
                <input type="hidden" name="room_type_id" value="<?= $roomType['room_type_id'] ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Language name</label>
                        <input class="form-control" type="text" name="room_type_name" value="<?= $roomType['room_type_name']; ?>" required="required"/>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>