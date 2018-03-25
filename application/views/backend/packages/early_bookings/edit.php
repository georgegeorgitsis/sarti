<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <form method="POST" action="<?= $this->config->item('admin_url') . 'packages/early_bookings_update' ?>">
                <input type="hidden" name="id" value="<?= (isset($early_booking['id'])) ? $early_booking['id'] : ""  ?>">
                <div class="col-md-12">
                    <label>Early Booking (%)</label>
                    <input type="text" class="form-control" name="percentage"
                        value="<?=(isset($early_booking['percentage']))  ? $early_booking['percentage'] : "" ?>"/>
                </div>
                <div class="col-md-12">
                    <label>Early Booking Until</label>
                    <input type="text" class="form-control early_booking_until" name="valid_until" 
                        value="<?=(isset($early_booking['valid_until'])) ? $early_booking['valid_until'] : "" ?>"/>
                </div>

                <div class="col-md-12">
                    <label>Is Early Booking Active</label>
                    <select name="active" >
                        <option value="0" <?=(isset($early_booking['active']) && $early_booking['active']) == false ? "selected" : "" ?>>No</option>
                        <option value="1" <?= (isset($early_booking['active']) && $early_booking['active']) == true ? "selected" : "" ?>>Yes</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-success">Save</button>
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