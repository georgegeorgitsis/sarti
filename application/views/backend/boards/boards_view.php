<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/boards/addBoard') ?>" class="btn btn-info">
                Add Board
            </a>
            <table class="table table-striped table-bordered" id="boards" width="100%">
                <thead>
                    <tr>
                        <th>Board ID</th>
                        <th>Board Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($boards) && !empty($boards)) { ?>
                        <?php foreach ($boards as $board) { ?>
                            <tr>
                                <td><?= $board['board_id'] ?></td>
                                <td><?= $board['board_name'] ?></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'boards/editBoard/' . $board['board_id']; ?>'>Edit</a>
                                    |
                                    <a class='btn btn-danger' href='<?= $admin_url . 'boards/deleteBoard/' . $board['board_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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
                                    $("#boards").DataTable({
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