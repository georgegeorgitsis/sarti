<div class="row">
    <h2 class="text-center mb-32">Contact the property for a reservation</h2>
</div>
<div class="row">
    <div class="container">
        <div class="col-md-9">
            <form class="form form-horizontal" action="">
                <h2>Personal Information</h2>
                <div class="row">
                    <div class="col-md-6 padding-5">
                        <label for="first_name">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control">
                    </div>
                    <div class="col-md-6 padding-5">
                        <label for="last_name">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-6 padding-5">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" class="form-control">
                    </div>
                    <div class=" col-md-6 padding-5">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                </div>
                <div class="row">
                <div class=" col-md-6 padding-5">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class=" col-md-6 padding-5">
                    <label for="tel">Phone Number</label>
                    <input type="text" id="tel" name="tel" class="form-control">
                </div>
                </div>
                <h2>Additional Information</h2>
                <div class="row">
                <div class=" col-md-4 padding-5">
                    <h3>Guest Info</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="padding-5">
                                <label for="guest_first_name">Guest First Name</label>
                                <input type="text" id="guest_first_name" name="guest_first_name" class="form-control">
                            </div>
                            <div class="padding-5">
                                <label for="guest_last_name">Guest Last Name</label>
                                <input type="text" id="guest_last_name" name="guest_last_name" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-md-8 padding-5">
                    <h3>Special Request</h3>
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="5" class="form-control"></textarea>
                </div>
                </div>
                
                <button type="submit" class="btn btn-primary pull-right">Request</button>
            </form>
        </div>
        <div class="col-md-3 booking-details md-box">
            <h3> Booking Details</h3>
            <div class="hotel-info-group">
                <img src="" alt="">
            </div>
            <div class="hotel-info-group">
                <h4 class="text-center"><?= $hotel['hotel_name']?></h4>
            </div> 
            <div class="hotel-info-group">
                <span class="text-semibold text-center"> Check in: </span>
                <span class="text-center"><?= $period['period_from']?> </span>
            </div>
            <div class="hotel-info-group">
                <span class="text-semibold text-center"> Check out: </span>
                <span class="text-center"><?=  $period['period_to'] ?></span>
            </div>
            <div class="hotel-info-group">
                <span class="text-semibold text-center"> Occupants: </span>
                <span class="text-center"></span>
            </div>
            <?php if(isset($room)):?>
                       
            <div class="hotel-info-group">
                <span class="text-semibold text-center"> Room: </span>
                <span class="text-center"><?= $room['room_name'] ?></span>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>