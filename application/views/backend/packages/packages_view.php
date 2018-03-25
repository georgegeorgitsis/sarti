<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/packages/addPackage') ?>" class="btn btn-info">
                Add Package
            </a>
            <table class="table table-striped table-bordered dataTable" id="packages" width="100%">
                <thead>
                    <tr>
                        <th>Package ID</th>
                        <th>Package Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($packages) && !empty($packages)) { ?>
                        <?php foreach ($packages as $package) { ?>
                            <tr>
                                <td><?= $package['package_id'] ?></td>
                                <td><?= $package['package_type'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'packages/early_bookings?pid=' . $package['package_id']; ?>'>Early Bookings</a>
                                    |
                                    <a class='btn btn-info' href='<?= $admin_url . 'packages/editPackage/' . $package['package_id']; ?>'>Edit</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'packages/deletePackage/' . $package['package_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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