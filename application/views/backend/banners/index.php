<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/banners/add') ?>" class="btn btn-info">
                Add Banner
            </a>
            <table class="table table-striped table-bordered" id="banners" width="100%">
                <thead>
                    <tr>
                        <th>Banner ID</th>
                        <th>Banner Name</th>
                        <th>Is Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($banners) && !empty($banners)) { ?>
                        <?php foreach ($banners as $banner) { ?>
                            <tr>
                                <td><?= $banner['id'] ?></td>
                                <td><?= $banner['name'] ?></td>
                                <td><?= $banner['active'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'banners/edit/' . $banner['id']; ?>'>Edit</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'banners/delete/' . $banner['id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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
                                    $("#banners").DataTable({
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