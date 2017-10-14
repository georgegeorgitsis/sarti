<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <a href="<?= base_url('backend/languages/addLanguage') ?>" class="btn btn-info">
                Add language
            </a>
            <table class="table table-striped table-bordered" id="languages" width="100%">
                <thead>
                    <tr>
                        <th>Language ID</th>
                        <th>Language Name</th>
                        <th>Language Abbreviation</th>
                        <th>Language Icon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($languages) && !empty($languages)) { ?>
                        <?php foreach ($languages as $language) { ?>
                            <tr>
                                <td><?= $language['lang_id'] ?></td>
                                <td><?= $language['lang_name'] ?></td>
                                <td><?= $language['lang_abbreviation'] ?></td>
                                <td><img style="max-width: 50px;" src="<?= base_url('assets/uploads/langs/') . $language['lang_icon'] ?> "/></td>
                                <td>
                                    <a class='btn btn-info' href='<?= $admin_url . 'languages/editLanguage/' . $language['lang_id']; ?>'>Edit</a>
                                    <a class='btn btn-danger' href='<?= $admin_url . 'languages/deleteLanguage/' . $language['lang_id']; ?>' onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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