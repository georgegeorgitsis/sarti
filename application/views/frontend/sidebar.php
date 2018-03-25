<aside>
    <div class="my-search">
        <div class="form-group clearfix">
            <div class="col-md-12 no-padding">
                <div class="hotels-count">
                    <h3 class="hotels-found">
                        <i class="fa fa-search" aria-hidden="true"></i> 
                        <span id="hotels-count-num" class="txt-cyan"> 
                            <?= $total_hotel_count ?> 
                        </span>
                        <?php if($total_hotel_count > 1): ?>  
                        results found
                        <?php else: ?>
                        result found
                        <?php endif; ?>
                    </h3>
                </div>
            </div>
        </div>

        
        <div class="search clearfix">
            <div class="form-group clearfix">
                <div class="col-md-12 no-padding">
                    <div class="md-box accommodation-search clearfix">
                        <form method="GET" action="<?= base_url('seven-day-packages') ?>">
                            <div class="col-md-12">
                                <h4 class="title tcenter txt-cyan">Show me the 7 day DEALS</h4>
                            </div>
                            <div class="col-md-12">
                                <input id="p-7-dp" type="text" class="form-control calendar" placeholder="Select a month" 
                                    value="<?= (isset($search) && isset($search['packageType']) && $search['packageType'] == 2 && $search['checkin']) ? date("F-Y",strtotime($search['checkin'])) : ''?>">
                                <select class="mt" name="p" id="p7" required="required">
                                    <option value="" selected disabled>Select a month in the field above</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt">
                                <div class="row clearfix">
                                    <span class="tcenter col-md-12 no-padding tbold label-span txt-cyan">Persons</span>
                                    <div style="width: 100%; display: flex; justify-content:center; height: 34px;">
                                        <div class="person-icon-search p-i-selected" id="person-i-1" > </div>
                                        <div class="person-icon-search p-i-selected" id="person-i-2" ></div>
                                        <div class="person-icon-search" id="person-i-3" ></div>
                                        <div class="person-icon-search" id="person-i-4"></div>
                                        <div class="person-icon-search" id="person-i-5" ></div>
                                        <div class="person-icon-search" id="person-i-6" ></div>
                                    </div>
                                    <span class="person-7pack col-md-12 no-padding">
                                        <span> <b>2</b> </span>
                                        <input class="data-slider" id="7per" name="a" data-slider-id='7perSlider' type="text" 
                                            data-slider-min="2" 
                                            data-slider-max="6" data-slider-step="1" 
                                            data-slider-value="<?= (isset($search) && isset($search['packageType']) && $search['packageType'] == 2 && $search['adults']) ? $search['adults'] : 2 ?>"/>
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
                </div>
            </div>  

            <div class="form-group clearfix">
                <div class="col-md-12 no-padding">
                    <div class="md-box accommodation-search clearfix">
                        <form method="GET" action="<?= base_url('ten-day-packages') ?>">
                            <div class="col-md-12">
                                <h4 class="title tcenter txt-cyan">Show me the 9-15 day DEALS</h4>
                            </div>
                            <div class="col-md-12">
                                <input type="text" id="p-10-dp" class="form-control calendar" placeholder="Select a month"
                                    value="<?= (isset($search) && isset($search['packageType']) && $search['packageType'] == 3 && $search['checkin']) ? date("F-Y",strtotime($search['checkin'])) : ''?>"/>
                                <select class="mt" name="p" id="p10" required="required">
                                    <option value="" selected disabled>Select a month in the field above.</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt">
                                <div class="row clearfix">
                                    <span class="tcenter col-md-12 no-padding tbold label-span txt-cyan">Persons</span>
                                    <span class="person-10pack col-md-12 no-padding">
                                        <span> <b>2</b> </span>
                                        <input class="data-slider" id="10per" name="a" data-slider-id='10perSlider' type="text" 
                                            data-slider-min="2" 
                                            data-slider-max="6" data-slider-step="1" 
                                            data-slider-value="<?= (isset($search) && isset($search['packageType']) && $search['packageType'] == 3 && $search['adults']) ? $search['adults'] : 2 ?>"/>
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
                </div>  
            </div> 
            <div class="form-group clearfix">
                <div class="col-md-12 no-padding">
                    <div class="md-box accommodation-search clearfix">
                        <form method="GET" action="<?= base_url('allotment-packages') ?>">
                            <div class="col-md-12">
                                <h4 class="title tcenter txt-cyan">I have the dates</h4>
                            </div>
                            <div class="col-md-12 check-box">
                                <label class="txt-cyan">Checkin</label>
                                <input type="text" name="checkin"
                                    value="<?= (isset($search) && isset($search['packageType']) && $search['packageType'] == 1 && $search['checkin']) ? date("d-m-Y",strtotime($search['checkin'])) :  date('d-m-Y') ?>"
                                    required="required"/> 
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-12 check-box mt">
                                <label class="txt-cyan">Checkout</label>
                                <input type="text" name="checkout" 
                                    value="<?= (isset($search) && isset($search['packageType']) && isset($search['packageType']) && $search['packageType'] == 1 && $search['checkout']) ? date("d-m-Y",strtotime($search['checkout'])) :  date('d-m-Y', strtotime(' +1 day')) ?>"
                                    required="required"/> 
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-12 mt">
                                <div class="row clearfix">
                                    <span class="tcenter col-md-12 no-padding tbold label-span txt-cyan">Persons</span>
                                    <span class="person-allot col-md-12 no-padding">
                                        <span> <b>2</b> </span>
                                        <input class="data-slider" id="allot-per" name="a" data-slider-id='allot-perSlider' type="text" 
                                            data-slider-min="2" 
                                            data-slider-max="6" data-slider-step="1" 
                                            data-slider-value="<?= (isset($search) && isset($search['packageType']) && $search['packageType'] == 1 && $search['adults']) ? $search['adults'] : 2 ?>"/>
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
                </div>
            </div>
            <div class="form-group clearfix filters">
                <div class="col-md-12 no-padding">
                    <div class="md-box accommodation-search destination clearfix">
                        <div class="col-md-12">
                            <h4 class="title txt-cyan">
                                Destination:
                            </h4>
                            <select name="search_destination">
                                <option value="">All Destinations</option>
                                <?php foreach ($locations as $location): ?>
                                    <option value="<?= $location['location_id'] ?>"><?= $location['location_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group clearfix filters">
                <div class="col-md-12 no-padding">
                    <div class="md-box accommodation-search room-types clearfix">
                        <div class="col-md-12">
                            <h4 class="title txt-cyan">Room Types</h4>
                        </div>
                        <?php foreach ($room_types as $type): ?>
                            <div class="col-md-12">
                                <input type="checkbox" name="room_type" class="room-type" value="<?= $type ?>"
                                <?= isset($search) && isset( $search['filters']['room_types'] ) && in_array($type, $search['filters']['room_types']) ? "checked" : "" ?>>
                                <?= $type ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>      
            </div>          
            <div class="form-group clearfix filters">
                <div class="col-md-12 no-padding">
                    <div class="md-box accommodation-search boards clearfix">
                        <div class="col-md-12">
                            <h4 class="title txt-cyan">Boards</h4>
                        </div>
                        <?php foreach ($boards as $board): ?>
                            <div class="col-md-12">
                                <input type="checkbox" name="board" class="board" value="<?= $board['board_id'] ?>"
                                    <?= isset($search) && isset( $search['filters']['boards'] ) && in_array($board['board_id'], $search['filters']['boards']) ? "checked" : "" ?>> 
                                <?= $board['board_name'] ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>        
            </div>
            <div class="form-group clearfix filters">
                <div class="col-md-12 no-padding">
                    <div class="md-box accommodation-search facilities clearfix">
                        <div class="col-md-12">
                            <h4 class="title txt-cyan">Facilities</h4>
                        </div>
                        <?php foreach ($facilities as $facility):  ?>
                            <?php if($facility['is_main']): ?>
                            <div class="col-md-12">
                                <input type="checkbox" name="facility" class="facility" value="<?= $facility['facility_id'] ?>"
                                    <?= isset($search) && isset( $search['filters']['facilities'] ) && in_array($facility['facility_id'], $search['filters']['facilities']) ? "checked" : "" ?>>
                                <?php if(isset($facility['facility_icon']) && trim($facility['facility_icon']) != ""): ?> 
                                    <img src="<?= base_url('assets/uploads/facilities/' . $facility['facility_icon']) ?>"/>
                                <?php endif;?>
                                <?= $facility['facility_name'] ?>
                            </div>
                            <?php endif;?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="form-group clearfix filters">
                <div class="col-md-12 no-padding">
                    <div class="md-box accommodation-search facilities clearfix">
                        <div class="col-md-12">
                            <h4 class="title txt-cyan">Floor</h4>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="floor" class="floor" value="upper_floor"
                            <?= isset($search) && isset( $search['filters']['floors'] ) && in_array("upper_floor", $search['filters']['floors']) ? "checked" : "" ?> >
                            Upper Floor
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="floor" class="floor" value="ground_floor"
                            <?= isset($search) && isset( $search['filters']['floors'] ) && in_array("ground_floor", $search['filters']['floors']) ? "checked" : "" ?>>
                            Ground Floor
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="floor" class="floor" value="basement"
                            <?= isset($search) && isset( $search['filters']['floors'] ) && in_array("basement", $search['filters']['floors']) ? "checked" : "" ?>>
                            Semi - Basement
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<style>

    .person-icon-search{
        width: 25px;
        height: 34px;
        background-image: url("<?= base_url('assets/images/person/person-azure-1.png') ?>");
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
    .person-icon-search.p-i-selected{
        background-image: url("<?= base_url('assets/images/person/person-blue.png') ?>");
    }

</style>
<script type="text/javascript">
    function grabData() {
        // sorting
        var sortingTitle = $('select[name="sort-select-title"]').val();
        var sortingPrice = $('select[name="sort-select-price"]').val();
        var search_destination = $("select[name='search_destination']").val();
        var selected_floors = [];
        $("input[name='floor']:checked").each(function () {
            selected_floors.push($(this).val());
        });
        var selected_room_types = [];
        $("input[name='room_type']:checked").each(function () {
            selected_room_types.push($(this).val());
        });
        var selected_boards = [];
        $("input[name='board']:checked").each(function () {
            selected_boards.push($(this).val());
        });
        var selected_facilities = [];
        $("input[name='facility']:checked").each(function () {
            selected_facilities.push($(this).val());
        });
        var jsonFilters = new Object();
        jsonFilters.destination = search_destination;
        jsonFilters.room_types = selected_room_types;
        jsonFilters.boards = selected_boards;
        jsonFilters.facilities = selected_facilities;
        jsonFilters.floors = selected_floors;
        jsonFilters.sortingTitle = sortingTitle;   
        jsonFilters.sortingPrice = sortingPrice;
        
        <?php if( isset($package_type) && trim($package_type) != "" ): ?>
        jsonFilters.packageType = "<?= $package_type ?>";
        <?php endif; ?>

        return jsonFilters;
    }

    function ajaxFiltering() {
        jsonFilters = grabData();
        $('.loader-wrapper').toggle();
        $.post("<?= base_url('hotels/ajaxFilters') ?>", jsonFilters, function (result) {

        })
        .done(function (result) {
            var parsed = JSON.parse(result);
            $(".hotels-list").html();
            $(".hotels-list").html(parsed.html);
            $("#hotels-count-num").html(parsed.total_count);
            $("#filters_string").html(parsed.filters_string);     
            $("#clear-btn").removeClass('hidden');
            $('.loader-wrapper').toggle();
        })
        .fail(function () {
            alert("An error occured while calculating the total price. Please contact the adminstrator for further information");
        });

    }

    $(window).load(function () {

        $('#10per').bootstrapSlider({
            formatter: function(value) {
                return 'Persons: ' + value;
            }
        }).on('slide', function(value){
            for (i = 2; i <= value; i++) { 
                $('person-'+i).addClass('p-i-selected');
            }
            if(value < 6){
                for (i = value+1; i <= 6; i++) { 
                    $('person-'+i).removeClass('p-i-selected');
                } 
            }
        });
        $('#7per').bootstrapSlider({
            formatter: function(value) {
                return 'Persons: ' + value;
            }
        }).on('change', function(value){
            var change = value.value.newValue;
            for (i = 2; i <= change; i++) { 
                var el = $('#person-i-'+i);
                console.log(el);
                el.addClass('p-i-selected');
            }
            if(change < 6){
                for (i = change+1; i <= 6; i++) { 
                    $('#person-i-'+i).removeClass('p-i-selected');
                } 
            }
        });
        $('#allot-per').bootstrapSlider({
            formatter: function(value) {
                return 'Persons: ' + value;
            }
        });

        
        
        $("input[name='checkout']").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            minDate: new Date()
        });
        $("input[name='checkin']").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            minDate: new Date()
        }).on("changeDate", function(e){
            // console.log(e);
            $("input[name='checkout']").datepicker('setDate', e.date);
            $("input[name='checkout']").datepicker('setStartDate', e.date);
        });

        $("#p-7-dp").datepicker({
            minDate: new Date(),
            format: "M-yyyy",
            viewMode: "months", 
            minViewMode: "months",
            autoclose: true,
            startDate: new Date()
        })
        .on('changeDate', function(selected){
            let dateString = selected.date.getFullYear() + "/" + (selected.date.getMonth() + 1) + "/" + selected.date.getDate();

            var dateFilter = new Object();
            dateFilter.dateFrom = dateString;

            $.ajax({
                type: "POST",
                url: "<?= base_url('hotels/get7PackagesFromDate') ?>",
                data: dateFilter
            }).done(function(data) {
                $('#p7').empty().append(data);
            });
        });

        

        $('#p-10-dp').datepicker({ 
            minDate: new Date(),
            format: "M/yyyy",
            viewMode: "months", 
            minViewMode: "months",
            autoclose: true,
            startDate: new Date()
        })
        .on('changeDate', function(selected){
            let dateString = selected.date.getFullYear() + "/" + (selected.date.getMonth() + 1) + "/" + selected.date.getDate();

            var dateFilter = new Object();
            dateFilter.dateFrom = dateString;

            $.ajax({
                type: "POST",
                url: "<?= base_url('hotels/get10PackagesFromDate') ?>",
                data: dateFilter
            }).done(function(data) {
                $('#p10').empty().append(data);

            });
        });


        <?php if(isset($search) && !empty($search) && isset($search['packageType'])): ?>
            var searchPackage = "<?= $search['packageType'] ?>";
            
            var date = new Date("<?= $search['checkin'] ?>"), y = date.getFullYear(), m = date.getMonth();
            var firstDay = new Date(y, m, 1);
            firstDay = moment(firstDay).format("DD-MM-YYYY");
           
            var dateFil = new Object();
            dateFil.dateFrom = firstDay;

            if(searchPackage == 2){
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('hotels/get7PackagesFromDate') ?>",
                    data: dateFil
                }).done(function(data) {
                    $('#p7').empty().append(data);
                });
            }
            else if(searchPackage == 3){
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('hotels/get10PackagesFromDate') ?>",
                    data: dateFil
                }).done(function(data) {
                    $('#p10').empty().append(data);
                });
            }
        <?php endif; ?>

        $(".filters input[type='checkbox']").click(function () {
            ajaxFiltering();
        });

        $("select[name='search_destination']").change(function () {
            ajaxFiltering();
        });
        $("#sort-select-title").change(function(){
            ajaxFiltering();
        });
        $("#sort-select-price").change(function(){
            ajaxFiltering();
        });
    });
</script>