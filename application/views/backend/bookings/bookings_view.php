<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <table class="table table-striped table-bordered" id="languages" width="100%">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Client Name</th>
                        <th>Hotel</th>
                        <th>Room</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($bookings) && !empty($bookings)) { ?>
                        <?php foreach ($bookings as $booking) { ?>
                            <tr>
                                <td><?= $booking['booking_id'] ?></td>
                                <td><?= $booking['client_name'] . " " . $booking['client_surname'] ?></td>
                                <td><?= $booking['hotel_name'] ?></td>
                                <td><?= $booking['room_name'] ?></td>
                                <td><?= $booking['checkin'] ?></td>
                                <td><?= $booking['checkout'] ?></td>
                                <td>
                                    <a class='btn btn-success' href='<?= $admin_url . 'bookings/viewBooking/' . $booking['booking_id']; ?>'>View Booking</a>
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