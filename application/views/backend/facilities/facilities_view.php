<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/facilities/addFacility') ?>" class="btn btn-info">
                Add Facility
            </a>
            <table class="table table-striped table-bordered" id="facilities" width="100%">
                <thead>
                    <tr>
                        <th>Facility ID</th>
                        <th>Facility Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($facilities) && !empty($facilities)) : ?>
                        <?php foreach ($facilities as $facility): ?>
                            <tr>
                                <td><?= $facility['facility_id'] ?></td>
                                <td><?= $facility['facility_type'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'facilities/editFacility/' . $facility['facility_id']; ?>'>Edit</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'facilities/deleteFacility/' . $facility['facility_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </section>
</section>

<link href="<?= base_url('assets/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
<script type="text/javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>


<script type="text/javascript">
                                $(window).load(function () {
                                    $("#facilities").DataTable({
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