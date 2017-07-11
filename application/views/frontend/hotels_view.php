
<!--<div class="slider-wrapper">
    <div class="slider">
        <img src="http://pull1.sweeticecoltd.netdna-cdn.com/wp-content/uploads/2015/03/rev_slider_original_4.jpg?bc3caa"/>
        <img src="http://www.hare.com/wp-content/uploads/2015/05/yas-island-hotel-bridges2-1920x600.jpg"/>
    </div>
</div>
-->
<?php //var_dump($hotels) ?>
<div class="container">
    <div class="col-md-3">
        <?php require_once(VIEWPATH . 'frontend/sidebar.php'); ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12 clearfix no-padding">
                <div class="hotels-sorting clearfix">
                    <div class="col-md-3">
                        SORT BY:
                    </div>
                    <div class="col-md-3">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">TITLE
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">ASCENDING</a></li>
                                <li><a href="#">DESCENDING</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">PRICE
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">ASCENDING</a></li>
                                <li><a href="#">DESCENDING</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">LOCATION
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">ASCENDING</a></li>
                                <li><a href="#">DESCENDING</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hotels-list">
            <?php require_once(VIEWPATH . 'frontend/hotels_list.php'); ?>
        </div>
    </div>

