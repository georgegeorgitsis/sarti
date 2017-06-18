<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'packages/addPackagePeriod' ?>">
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Package</label>
                        <select name="package_id" class="form-control">
                            <?php foreach ($packages as $package) { ?>
                                <option value="<?= $package['package_id'] ?>" 
                                <?php
                                if (isset($selected_package_id) && !empty($selected_package_id)) {
                                    if ($package['package_id'] == $selected_package_id) {
                                        echo "selected='selected'";
                                    }
                                }
                                ?>><?= $package['package_type'] ?></option>
                                    <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Period From</label>
                        <input type="text" name="period_from" class="form-control" value="<?php echo set_value('period_from'); ?>" required="required"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Period To</label>
                        <input type="text" name="period_to" class="form-control" value="<?php echo set_value('period_to'); ?>" required="required"/>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label>Is Active</label>
                    <select name="package_active">
                        <option value="0">No</option>
                        <option value="1" selected="selected">Yes</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
        <?php if (isset($packagePeriods) && !empty($packagePeriods)) { ?>        
            <div class="row">
                <table class="table table-striped table-bordered dataTable" id="packages" width="100%">
                    <thead>
                        <tr>
                            <th>Package Period ID</th>
                            <th>Period From</th>
                            <th>Period To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($packagePeriods as $period) { ?>
                            <tr>
                                <td>
                                    <?= $period['package_period_id'] ?>
                                </td>
                                <td>
                                    <?= $period['period_from'] ?>
                                </td>
                                <td>
                                    <?= $period['period_to'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
    </section>
</section>

<link href="<?= base_url('assets/css/jquery.dataTables.min.css'); ?>" rel="stylesheet">
<script type="text/javascript" src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>

<script type="text/javascript">

    $(window).load(function () {
        $("input[name='period_from'], input[name='period_to']").datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $(".dataTable").DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.13/i18n/Greek.json",
            },
            "order": [[0, "desc"]],
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]

            ]
        });
    })

</script>