
<div class="container">
<?php if (isset($is_search) && $is_search == 1) { ?>
    <div class="form-group clearfix">
        <div class="col-md-12">
            <a href="<?= base_url('hotels') ?>" class="btn btn-info">Clear filters</a>
        </div>
    </div>
<?php } ?>
    <div class="col-md-3">
        <?php require_once(VIEWPATH . 'frontend/sidebar.php'); ?>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12 clearfix no-padding">
                <div class="hotels-sorting clearfix">
                    <div class="col-md-5 col-md-offset-3">
                        <select class="form-control" name="sort-select" id="sort-select">
                            <option value="none" disabled selected>Sort by...</option>
                            <optgroup label="Title">        
                                <option value="title-asc">Title Ascending</option>
                                <option value="title-desc">Title Descending</option>
                            </optgroup>
                            <optgroup label="Price">        
                                <option value="price-asc">Price Ascending</option>
                                <option value="price-desc">Price Descending</option>
                            </optgroup>
                            <!-- <optgroup label="Location">        
                                <option value="loc-asc">Location Ascending</option>
                                <option value="loc-desc">Location Descending</option>
                            </optgroup> -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="hotels-list">
            <?php require_once(VIEWPATH . 'frontend/hotels_list.php'); ?>
        </div>
    </div>

