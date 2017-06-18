<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/packages/addPackagePeriod') ?>" class="btn btn-info">
                Add Period
            </a>
            <div style="float:right">
                <a href="<?= base_url('backend/packages/add1Year') ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to change ALL PERIODS to next year?')">
                    Change All Periods to next year
                </a>
                |
                <a href="<?= base_url('backend/packages/minus1Year') ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to change ALL PERIODS to previous year?')">
                    Change All Periods to previous year
                </a>
            </div>
            <table class="table table-striped table-bordered dataTable" id="packages" width="100%">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Period From</th>
                        <th>Period To</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($packagePeriods) && !empty($packagePeriods)) { ?>
                        <?php foreach ($packagePeriods as $packagePeriod) { ?>
                            <tr>
                                <td><?= $packagePeriod['package_type'] ?></td>
                                <td><?= $packagePeriod['period_from'] ?></td>
                                <td><?= $packagePeriod['period_to'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'packages/editPackagePeriod/' . $packagePeriod['package_period_id']; ?>'>Edit</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'packages/deletePackagePeriod/' . $packagePeriod['package_period_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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