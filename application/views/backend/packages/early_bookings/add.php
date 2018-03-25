<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'packages/early_bookings_save' ?>">
                <input type="hidden" name="pid" value="<?= $package_id ?>">
                <div class="col-md-12">
                    <label>Early Booking (%)</label>
                    <input type="text" class="form-control" name="percentage"/>
                </div>
                <div class="col-md-12">
                    <label>Early Booking Until</label>
                    <input type="text" class="form-control early_booking_until"  name="valid_until"/>
                </div>

                <div class="col-md-12">
                    <label>Is Early Booking Active</label>
                    <select name="active">
                        <option value="0" >No</option>
                        <option value="1">Yes</option>
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
        $(".early_booking_until").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            minDate: new Date(),
            startDate: new Date()
        });
    })

</script>