<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/locations/addLocation') ?>" class="btn btn-info">
                Add Location
            </a>
            <table class="table table-striped table-bordered" id="locations" width="100%">
                <thead>
                    <tr>
                        <th>Location ID</th>
                        <th>Location Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($locations) && !empty($locations)) { ?>
                        <?php foreach ($locations as $location) { ?>
                            <tr>
                                <td><?= $location['location_id'] ?></td>
                                <td><?= $location['location_name'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'locations/editLocation/' . $location['location_id']; ?>'>Edit</a>
                                    <a class='btn btn-danger' href='<?= $admin_url . 'locations/deleteLocation/' . $location['location_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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
                                            $("#locations").DataTable({
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