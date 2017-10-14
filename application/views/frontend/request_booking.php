<div class="row">
    <h2 class="text-center mb-32">Contact the property for a reservation</h2>
</div>
<div class="row">
    <div class="container">
        <div class="col-md-6">
            <div class="hotel-info-group">
                <span class="text-semibold text-center"> Period: </span>
                <span class="text-center"><?= $period['period_from']?> to <?= $period['period_to']?></span>
            </div>
            <div class="hotel-info-group">
                <span class="text-semibold text-center"> Occupants: </span>
                <span class="text-center"></span>
            </div>
            <?php if(isset($room)):?>
            <div class="hotel-info-group">
                <span class="text-semibold text-center"> Hotel: </span>
                <span class="text-center"><?= $hotel['hotel_name']?></span>
            </div>            
            <div class="hotel-info-group">
                <span class="text-semibold text-center"> Room: </span>
                <span class="text-center"><?= $room['room_name'] ?></span>
            </div>
            <?php endif;?>
        </div>
        <div class="col-md-6">
            <form class="form form-horizontal" action="">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tel">Phone Number</label>
                    <input type="text" id="tel" name="tel" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="4" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Request</button>
            </form>
        </div>
    </div>
</div>