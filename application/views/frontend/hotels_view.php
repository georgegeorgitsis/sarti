
<div class="container">
    <div class="row flex flex-end">
    <?php if (isset($is_search) && $is_search == true && isset($search)): ?>
        <div class="col-md-6 col-md-offset-3  no-padding">
            <h4 class="text-bold search-display">
                <?php if(isset($search['checkin'])):?>
                Your results for: <?= date("d-m-y", strtotime($search['checkin'])) ." - ".date("d-m-y", strtotime($search['checkout']))." for ".$search['adults']. " people" ?>
                <?php else:?>
                <?php endif;?>
            </h4>
        </div>
        <div class="col-md-2 col-md-offset-1 flex flex-end no-padding">
            <?php if( isset( $package_type ) && trim($package_type) != "" ): ?>
                <?php if( $package_type == 2 ): ?>
                <a href="<?= base_url('seven-day-packages?clear=1') ?>" class="btn btn-success bg-light-orange">Clear Search</a>
                <?php elseif( $package_type == 3 ): ?>
                <a href="<?= base_url('ten-day-packages?clear=1') ?>" class="btn btn-success bg-light-orange">Clear Search</a>
                <?php elseif( $package_type == 1 ): ?>
                <a href="<?= base_url('allotment-packages?clear=1') ?>" class="btn btn-success bg-light-orange">Clear Search</a>
                <?php endif; ?>
            <?php else: ?>
            <a href="<?= base_url('?clear=1') ?>" class="btn btn-success bg-light-orange">Clear Filters</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    </div>
    <div class="row">
    <div class="col-md-3">
        <?php require_once(VIEWPATH . 'frontend/sidebar.php'); ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12 clearfix">
                <div class="row  hotels-sorting ">
                    <div class="col-md-4 no-padding">
                            <!-- <select class="form-control" name="search-hotel-title" id="ajax-select">
                                <option ></option>
                            </select> -->
                            <input class="form-control" type="text" name="" id="h_title" placeholder="Search for a hotel...">
                    </div> 
                    <div class="col-md-6 col-md-offset-2 clearfix flex flex-end no-padding">
                        <div class="col-md-2 col-md-offset-4 no-padding"> <h4 class="">Sort By</h4></div>
                        <div class="col-md-3 flex flex-end no-padding mx-2">
                            <select class="form-control" name="sort-select-title" id="sort-select-title">
                                <option value="none" disabled selected>Title</option> 
                                <option value="title-asc">Ascending</option>
                                <option value="title-desc">Descending</option>
                            </select>
                        </div>
                        <div class="col-md-3 flex flex-end no-padding">
                            <select class="form-control" name="sort-select-price" id="sort-select-price">
                                <option value="none" disabled selected>Price</option> 
                                <option value="price-asc">Ascending</option>
                                <option value="price-desc">Descending</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hotels-list">
            <?php require_once(VIEWPATH . 'frontend/hotels_list.php'); ?>
        </div>
    </div>
    </div>

    <script>
    $(window).load(function () {

        $('#h_title').keyup(function(){             
                var query = $(this).val().trim();
                console.log(query);
                if(query.length > 0){
                    $.ajax({
                        url: "<?=base_url('hotels/title_filter?query=')?>"+query, 
                        type: "GET",
                        success: function(result){
                            $(".hotels-list").html();
                            $(".hotels-list").html(result);
                            // console.log(result);
                            console.log($(".each-hotel").length);
                            $("#hotels-count-num").html($(".each-hotel").length);
                        }
                    });
                }
        });
        

    });
    </script>

