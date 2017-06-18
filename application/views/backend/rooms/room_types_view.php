<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/rooms/addRoomType') ?>" class="btn btn-info">
                Add Room Type
            </a>
            <table class="table table-striped table-bordered" id="roomTypes" width="100%">
                <thead>
                    <tr>
                        <th>Room Type ID</th>
                        <th>Room Type Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($roomTypes) && !empty($roomTypes)) { ?>
                        <?php foreach ($roomTypes as $roomType) { ?>
                            <tr>
                                <td><?= $roomType['room_type_id'] ?></td>
                                <td><?= $roomType['room_type_name'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'rooms/editRoomType/' . $roomType['room_type_id']; ?>'>Edit</a>
                                    <a class='btn btn-danger' href='<?= $admin_url . 'rooms/deleteRoomType/' . $roomType['room_type_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </section>
</section>

<link href="<?= base_url('assets/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
<script type="text/javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>


<script type="text/javascript">
                                        $(window).load(function () {
                                            $("#roomTypes").DataTable({
                                                "language": {
                                                    "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Greek.json",
                                                },
                                                "order": [[0, "desc"]],
                                                aLengthMenu: [
                                                    [10, 25, 50, 100, 200, -1],
                                                    [10, 25, 50, 100, 200, "All"]

                                                ]
                                            });
                                        });
</script>