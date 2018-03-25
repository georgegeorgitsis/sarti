<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/packages/early_bookings_add?pid='. $package_id) ?>" class="btn btn-info">
                Add Early Booking
            </a>
            <table class="table table-striped table-bordered dataTable" id="packages" width="100%">
                <thead>
                    <tr>
                        <th>Early Booking ID</th>
                        <th>Percentage</th>
                        <th>Valid Until</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($early_bookings) && !empty($early_bookings)) { ?>
                        <?php foreach ($early_bookings as $eb) { ?>
                            <tr>
                                <td><?= $eb['id'] ?></td>
                                <td><?= $eb['percentage'] ?></td>
                                <td><?= $eb['valid_until'] ?></td>                                
                                <td><?= $eb['active'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'packages/early_bookings_edit?ebid=' . $eb['id'] ?>'>Edit</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'packages/early_bookings_delete?ebid=' . $eb['id'].'&pid='.$package_id?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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
                                    $(".dataTable").DataTable({
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