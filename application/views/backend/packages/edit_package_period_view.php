<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'packages/editPackagePeriod' ?>">
                <input type="hidden" name="package_period_id" value="<?= $packagePeriod['package_period_id'] ?>"/>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Period From</label>
                        <input type="text" name="period_from" class="form-control" value="<?= $packagePeriod['period_from']; ?>" required="required"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <label>Period To</label>
                        <input type="text" name="period_to" class="form-control" value="<?= $packagePeriod['period_to']; ?>" required="required"/>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                        <label>Is Active</label>
                        <select name="package_active">
                            <option value="0" <?php if($packagePeriod['package_active'] == 0) echo "selected='selected'"; ?>>No</option>
                            <option value="1" <?php if($packagePeriod['package_active'] == 1) echo "selected='selected'"; ?>>Yes</option>
                        </select>
                    </div>
                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</section>

<script type="text/javascript">

    $(window).load(function () {
        $("input[name='period_from'], input[name='period_to']").datepicker({
            minDate: new Date(),
            format: "dd-mm-yyyy",
            autoclose: true,
            startDate: new Date()
        });
    })

</script>