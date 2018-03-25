<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/hotels/addHotel') ?>" class="btn btn-info">
                Add Hotel
            </a>
            <table class="table table-striped table-bordered" id="languages" width="100%">
                <thead>
                    <tr>
                        <th>Hotel ID</th>
                        <th>Hotel Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($hotels) && !empty($hotels)) { ?>
                        <?php foreach ($hotels as $hotel) { ?>
                            <tr>
                                <td><?= $hotel['hotel_id'] ?></td>
                                <td><?= $hotel['hotel_name'] ?></td>
                                <td>
                                    <a class='btn btn-success' href='<?= $admin_url . 'hotels/handleGroundPlans/' . $hotel['hotel_id']; ?>'>Manage Ground Plans</a>
                                    |
                                    <a class='btn btn-success' href='<?= $admin_url . 'rooms/addRoom/' . $hotel['hotel_id']; ?>'>Add Room</a>
                                    |
                                    <a class='btn btn-info' href='<?= $admin_url . 'hotels/editHotel/' . $hotel['hotel_id']; ?>'>Edit</a>
                                    |
                                    <a class='btn btn-info' href='<?= $admin_url . 'hotels/images/' . $hotel['hotel_id']; ?>'>Images</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'hotels/deleteHotel/' . $hotel['hotel_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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
        $("#languages").DataTable({
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