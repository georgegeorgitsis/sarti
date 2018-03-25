<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/menus/add') ?>" class="btn btn-info">
                Add Menu
            </a>
            <table class="table table-striped table-bordered" id="menus" width="100%">
                <thead>
                    <tr>
                        <th>Menu ID</th>
                        <th>Menu Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($menus) && !empty($menus)) { ?>
                        <?php foreach ($menus as $menu) { ?>
                            <tr>
                                <td><?= $menu['id'] ?></td>
                                <td><?= $menu['name'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'menus/edit/' . $menu['id']; ?>'>Edit</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'menus/delete/' . $menu['id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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
                                    $("#menus").DataTable({
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