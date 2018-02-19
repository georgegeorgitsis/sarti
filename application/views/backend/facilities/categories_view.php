<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/facilities/addCategory') ?>" class="btn btn-info">
                Add Category
            </a>
            <table class="table table-striped table-bordered" id="facilities" width="100%">
                <thead>
                    <tr>
                        <!-- <th>Category ID</th> -->
                        <th>Category Type</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($categories) && !empty($categories)) : ?>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <!-- <td>$category['id'] </td> -->
                                <td><?= $category['description'] ?></td>
                                <td><?= $category['order'] ?></td>
                                <td>
                                    <a class='btn btn-info' 
                                        href='<?= $admin_url . 'facilities/editCategory/' . $category['id']; ?>'>
                                            Edit
                                    </a>
                                    |
                                    <a class='btn btn-danger' 
                                        href='<?= $admin_url . 'facilities/deleteCategory/' . $category['id']; ?>' 
                                        onclick="return confirm('Are you sure you want to delete this record?');">
                                            Delete
                                    </a>
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
                                        "order": [[0, "asc"]],
                                        aLengthMenu: [
                                            [10, 25, 50, 100, 200, -1],
                                            [10, 25, 50, 100, 200, "All"]

                                        ]
                                    });
                                });
</script>