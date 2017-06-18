<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <table class="table table-striped table-bordered" id="rooms" width="100%">
                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Hotel Name</th>
                        <th>Room Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($rooms) && !empty($rooms)) { ?>
                        <?php foreach ($rooms as $room) { ?>
                            <tr>
                                <td><?= $room['room_id'] ?></td>
                                <td><?= $room['hotel_name'] ?></td>
                                <td><?= $room['room_name'] ?></td>
                                <td>
                                    <a class='btn btn-success' href='<?= $admin_url . 'rooms/editRoomPrices/' . $room['room_id']; ?>'>Edit Room Prices</a>
                                    |
                                    <a class='btn btn-info' href='<?= $admin_url . 'rooms/editRoom/' . $room['room_id']; ?>'>Edit</a>
                                    |
                                    <a class='btn btn-info' href='<?= $admin_url . 'rooms/images/' . $room['room_id']; ?>'>Images</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'rooms/deleteRoom/' . $room['room_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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
                                            $("#rooms").DataTable({
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