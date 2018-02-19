<aside>
    <div class="my-search">        
        <div class="search clearfix">
            <div class="form-group clearfix">
                <div class="col-md-12 no-padding">
                    <?php if($has_seven):?>
                    <div class="md-box accommodation-search clearfix">
                        <form method="GET" action="<?= base_url('hotels/index') ?>"> 
                            <input type="hidden" name="pt" value="2">
                            <div class="col-md-12">
                                <h4 class="title tcenter txt-cyan">Show me the 7 day DEALS</h4>
                            </div>
                            <div class="col-md-12">
                                <!-- <label>Periods</label> -->
                                <input id="p-7-dp" type="text" class="form-control calendar" placeholder="Select a month" 
                                    value="<?= (isset($search) && $search['packageType'] == 2 && $search['checkin']) ? date("F-Y",strtotime($search['checkin'])) : ''?>">
                                <select name="p" id="p7" required="required">
                                
                                    <option value="" selected disabled>Select a month in the field above</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="row clearfix">
                                    <span class="tcenter col-md-12 no-padding tbold label-span txt-cyan">Persons</span>
                                    
                                    <span class="person-7pack col-md-12 no-padding">
                                        <span> <b>1</b> </span>
                                        <input class="data-slider" id="7per" name="a" data-slider-id='7perSlider' type="text" 
                                            data-slider-min="1" 
                                            data-slider-max="6" data-slider-step="1" 
                                            data-slider-value="<?= (isset($search) && $search['packageType'] == 2 && $search['adults']) ? $search['adults'] : 2 ?>"/>
                                        <span><b>6</b> </span>
                                        <!-- <?php /* for ($i = 6; $i >= 1; $i--): ?>
                                            <?php if($i == $minMax7Days['min_adults'] || $i == 2):?>
                                                <input type="radio" id="7per-rating-<?=$i?>" name="a" value="<?=$i?>" checked>
                                                <label for="7per-rating-<?=$i?>"><?=$i?></label>
                                            <?php else:?>
                                                <input type="radio" id="7per-rating-<?=$i?>" name="a" value="<?=$i?>" >
                                                <label for="7per-rating-<?=$i?>"><?=$i?></label>
                                            <?php endif;?>
                                        <?php endfor; */ ?> -->
                                    </span>      
                                </div>                          
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info bg-cyan">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>  

            <div class="form-group clearfix">
                <div class="col-md-12 no-padding">
                    <?php if($has_ten):?>
                    <div class="md-box accommodation-search clearfix">
                        <form method="GET" action="<?= base_url('hotels/index') ?>">
                        <input type="hidden" name="pt" value="3">
                            <div class="col-md-12">
                                <h4 class="title tcenter txt-cyan">Show me the 9-15 day DEALS</h4>
                            </div>
                            <div class="col-md-12">
                                <!-- <label>Periods</label> -->
                                <input type="text" id="p-10-dp" class="form-control calendar" placeholder="Select a month"
                                    value="<?= (isset($search) && $search['packageType'] == 3 && $search['checkin']) ? date("F-Y",strtotime($search['checkin'])) : ''?>"/>
                                <select name="p" id="p10" required="required">
                                    <option value="" selected disabled>Select a month in the field above.</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="row clearfix">
                                    <span class="tcenter col-md-12 no-padding tbold label-span txt-cyan">Persons</span>
                                    <span class="person-10pack col-md-12 no-padding">
                                        <span> <b>1</b> </span>
                                        <input class="data-slider" id="10per" name="a" data-slider-id='10perSlider' type="text" 
                                            data-slider-min="1" 
                                            data-slider-max="6" data-slider-step="1" 
                                            data-slider-value="<?= (isset($search) && $search['packageType'] == 3 && $search['adults']) ? $search['adults'] : 2 ?>"/>
                                        <span><b>6</b> </span>
                                    </span>      
                                </div>                          
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info bg-cyan">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    <?php endif;?>
                </div>  
            </div> 
            <div class="form-group clearfix">
                <div class="col-md-12 no-padding">
                    <?php if($has_allot):?>
                    <div class="md-box accommodation-search clearfix">
                        <form method="GET" action="<?= base_url('hotels/index') ?>">
                        <input type="hidden" name="pt" value="1">
                            <div class="col-md-12">
                                <h4 class="title tcenter txt-cyan">I have the dates</h4>
                            </div>
                            <div class="col-md-12 check-box">
                                <label class="txt-cyan">Checkin</label>
                                <input type="text" name="checkin"
                                    value="<?= (isset($search) && $search['packageType'] == 1 && $search['checkin']) ? date("d-m-Y",strtotime($search['checkin'])) :  date('d-m-Y') ?>"
                                    required="required"/> 
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-12 check-box">
                                <label class="txt-cyan">Checkout</label>
                                <input type="text" name="checkout" 
                                    value="<?= (isset($search) && $search['packageType'] == 1 && $search['checkout']) ? date("d-m-Y",strtotime($search['checkout'])) :  date('d-m-Y', strtotime(' +1 day')) ?>"
                                    required="required"/> 
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-12">
                                <div class="row clearfix">
                                    <span class="tcenter col-md-12 no-padding tbold label-span txt-cyan">Persons</span>
                                    <span class="person-allot col-md-12 no-padding">
                                        <span> <b>1</b> </span>
                                        <input class="data-slider" id="allot-per" name="a" data-slider-id='allot-perSlider' type="text" 
                                            data-slider-min="1" 
                                            data-slider-max="6" data-slider-step="1" 
                                            data-slider-value="<?= (isset($search) && $search['packageType'] == 1 && $search['adults']) ? $search['adults'] : 2 ?>"/>
                                        <span><b>6</b> </span>
                                    </span>      
                                </div>                          
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info bg-cyan">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</aside>
    