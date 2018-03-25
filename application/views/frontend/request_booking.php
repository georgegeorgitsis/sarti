<div class="row">
    <h2 class="text-center mb-32">Contact the property for a reservation</h2>
</div>
<div class="container">
    <div class="row flex">
        <div class="col-md-9">
            <form class="form form-horizontal" action="">
                <div class="md-box p-x-1 p-t-0">
                    <div class="row padding-x-5 bg-light-orange padding-y-2">
                        <h2>Personal Information</h2>
                    </div>
                    <div class="row padding-5">
                        <div class="col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="row padding-5">
                        <div class=" col-md-6">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" class="form-control">
                        </div>
                        <div class=" col-md-6">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="row padding-5">
                        <div class=" col-md-6">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class=" col-md-6">
                            <label for="tel">Phone Number</label>
                            <input type="text" id="tel" name="tel" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="md-box p-x-1 p-t-0 m-t-1">
                    <div class="row padding-x-5 bg-light-orange padding-y-2">
                        <h2>Additional Information</h2>
                    </div>
                    <div class="row padding-5">
                        <div class=" col-md-4">
                            <h3>Guest Info</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label for="guest_first_name">Guest First Name</label>
                                        <input type="text" id="guest_first_name" name="guest_first_name" class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <label for="guest_last_name">Guest Last Name</label>
                                        <input type="text" id="guest_last_name" name="guest_last_name" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3>Special Request</h3>
                            <label for="message">Message</label>
                            <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right margin-top-1">Request</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3 booking-details md-box flex flex-col">
            <div class="row">
                <div class="col-md-12 border-bottom bg-light-orange padding-y-2">
                    <h2 class="text-center tbold">Booking Details</h2>
                </div>
            </div>
            <div class="row flex margin-top-2">
                <div class="hotel-info-group col-md-6 flex flex-col flex-center">
                    <h5 class="tbold txt-green"><?= $hotel['hotel_name']?></h5>
                    <h6><?= $location['location_name']?></h6>
                </div> 
                <div class="hotel-info-group hotel-thumb col-md-6" >
                    <div class="hotel-thumb"
                        style="background-image:url('<?= base_url('assets/uploads/') . $hotel['thumb']['image_name'] ?>');">

                    </div>
                </div>
            </div>
            <div class="row margin-top-2">
                <div class="col-md-6 hotel-info-group">
                    <h5 class="tbold text-center txt-light-cyan"> Check in </h5>
                    <h5 class="text-center"><?= $period['period_from']?> </h5>
                </div>
                <div class="col-md-6 hotel-info-group">
                    <h5 class="tbold text-center txt-light-cyan"> Check out </h5>
                    <h5 class="text-center"><?=  $period['period_to'] ?></h5>
                </div>
                <div class="col-md-12">
                    <h5 class="tbold text-center txt-light-cyan">
                    <?php 
                        $date_from = new DateTime($period['period_from']); 
                        $date_to = new DateTime($period['period_to']);
                    ?>
                    <?= $date_to->diff($date_from)->format("%a") ?> 
                    </h5>
                    <h5 class="text-muted text-center">
                        nights
                    </h5>
                </div>
            </div>
            <div class="row margin-top-3 padding-y-2 stretch-self flex flex-col">    
                <div class="col-md-12 border-bottom">
                    <h3 class="text-center tbold">Room Details</h3>
                </div>
                <div class="col-md-12 hotel-info-group margin-top-2">
                    <h5 class="text-center tbold"><?= $room['room_name'] ?></h5>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 hotel-info-group">
                            <h5 class="text-semibold text-right txt-light-cyan"> Adults: </h5>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-left"><?=  $price['adults'] ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 hotel-info-group">
                            <h5 class="text-semibold text-right txt-light-cyan"> Room Price: </h5>
                        </div>
                        <div class="col-md-6">
                            <h5 class="text-left"><?=  $price['price'] ?> &euro;</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 margin-top-3 padding-y-2 border-top bg-light-green">
                    <div class="row padding-y-3 flex align-center flex-center">
                        <div class="col-md-6 hotel-info-group">
                            <h4 class="text-semibold text-right txt-light"> Total Price: </h4>
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-center txt-light-orange txt-light bg-light round-border"><?=  $price['price']?> &euro;</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
