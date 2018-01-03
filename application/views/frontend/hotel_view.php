<div class="container">
    <?php if (isset($hotel) && !empty($hotel)): ?>   
    <div class="row header-row">
        <div class="col-md-12 mb-sm flex">
            <div class="auto-mr">
                <h2 class="text-semibold"><?= $hotel['hotel_name']; ?></h2>
            </div>
            <div class="auto-ml flex flex-end">
                <span class="icon-sign">
                    <span class="flex flex-center">
                        <img class="icon" src="<?= base_url('assets/images/beach.png') ?>" alt="">
                    </span>
                    <h5> <?= $hotel['distance_from_sea']  ?>m </h5>
                </span>
                <span class="icon-sign">
                    <span class="flex flex-center">
                        <img class="icon" src="<?= base_url('assets/images/city.png') ?>" alt="">
                    </span>
                    <h5> <?= $hotel['distance_from_center'] ?>m </h5>
                </span>
                <?php if(isset($rooms_distinct_type) && $rooms_distinct_type): ?>
                    <?php foreach ($rooms_distinct_type as $hotel_room): ?>
                    <span class="icon-sign">
                        <span class="flex flex-center">
                            <?php for($i = 1; $i <= $hotel_room['min_adults']; $i++): ?>
                                <img class="people-img icon" src="<?= base_url('assets/images/person/person-black.png') ?>" alt="">
                            <?php endfor;?> 
                            <?php if( $hotel_room['max_adults'] > $hotel_room['min_adults'] ): ?>
                                <?php for( $i = 1; $i <= ($hotel_room['max_adults'] - $hotel_room['min_adults']); $i++ ): ?>
                                    <img class="people-img icon" src="<?= base_url('assets/images/person/pesron-grey.png') ?>" alt="">
                                <?php endfor;?> 
                            <?php endif;?>
                        </span>
                        <h5> <?= $hotel_room['room_type_name'] ?> </h5>
                    </span>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>
        </div>
        <div class="col-md-12 flex clearfix">

            <div class="auto-mr">
                <h4><?= $location['location_name']; ?></h4>
            </div>

            <div class="auto-ml flex flex-end align-center">
                <a href="https://twitter.com/intent/tweet?url=<?=base_url(uri_string());?>" target="_blank" class="tweet">
                    <i></i>
                    <span>Tweet</span>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url(uri_string());?>" target="_blank">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADkAAAAUCAMAAAAA9GVfAAACnVBMVEU0TI01TIw1TY01TY41TY81To82TY42TY8
                    5UZU6U5k7VJs7VZ07VaE8VZs8Vp08VqE8VqI8V6I9Vp49V6A9V6M+WJ8+WKA+WKQ+WaQ+WaU/WaM/WaQ/WaY/WqY/WqdAW6ZAW6dAW6hBW6dBXKhBXKlCXa
                    pCXatCXqpCXqxDXqtDXqxDX6xEX65EYK5EYK9FX65FYK9FYa9FYbBGYbBGYrFGYrJHYrFHY7JHY7NIZLNIZLRIZbRJZbVJZrZKZrZKZ7dLZ7hLaLhLaLlMa
                    blSaKpSaaxTaq1ZcbVbc7hfdLJfdbNfdbRfdrZgdrdhd7dhe8Fiebtie8Fofr9qgcFsgb5shMVthcZugrhugrtvgrxwhL1whL5xhb9xhcBzh8JziL9ziMJz
                    iMN1isV1isZ2iL12ir52isF5jMWAjreAk8eEk7+ElMOFlseFmMiIl7yKmsqOnL+RnsGSnsGVpdCXp9SeqsmfrNKfrNOfrdSgrdOgrdSgrtOgrtWhrtShrtW
                    hr9Sir9WisNaisNejsNimstWoss+qtM+suNesudyuudmwvNyyvNazvNizvdqzvtqzvtu0vtu0vty0v9y0v961v921v962v9i3v9a3wd24wt65wtu5w+G8xe
                    G8xuG9xNq+xtzAyeHAyePByuHCyd7Dy+DEzOPFzOHGz+fGz+nJ0OLL0uXN1OjP1urQ1+vS1+bS2OfT2evU2uzV2+vW2+jY3evZ3uzZ3u3b4O7c4vHd4ezd4
                    /Le4/Df4+3f4+/g5PHg5fHh5vHk5/Dk6PLn6vXo6/Xo7Pbp7PTq7fbr7vTr7vbt8Pbx8vfx8vjx8/j09fr09vn19vr19/v29/r3+Pv5+vz6+/z6+/37+/37
                    /P78/P38/P78/f79/f7+/v////+ZYdejAAACCUlEQVR4AWNYEebkTAYMXMHg7+BIFgxlsLMnEzLY2tja7LqHBHYARYiBDFbWVtb3UABQhBjIYGlhaQHTszw
                    5uOTePZCIpakoEwOvmQarMpCNHTKYmJuYQzUeBbKT7t0DiZj4rbtzd09K49UpQDZ2yGBibGIM1dlsEnQESIFETFquL+i4sbzhajcbs5SxkRATA6e+PCMHs5
                    IYMxOfAVgFg56hniFUZ5NeIogCiehNvjuPS12v/uqxazcXa3uvv3P3YOqke6duzVx5687mcLAKBl0dXR2wviNNcboeTbPv3QOJ6KYfv7szT6L26u6EQ6czu8
                    5ktd6cOOnepoBZF4oKLy0Dq2DQ0tbSButcC2JpFd+7B6a1QxZevD2t+uoMrVXnc13a9l65N2HCvQnaW0Aq94FVMGiqaaqBdR6uidV0r1lz7x5IRJObRTr+xL
                    EZV/s1V53PWXJ9afvVfqBOta3ns6XZhcEqGFRUVVSh/qxTiQFRIBGV1ddKM84e6LzapwLUue1ywfy7Pb33elXn3J5eemUuWAWDiqKKIlRnlUo0WKciEKbtv3
                    P3ZH7ttSkqqy/mVJy7e/zyhqn3pir6brh1Z6MPWAWDnIKcAlRnpVwUiAKKEAMZZGVkZaA6y2UjQRRQhBjIIC4pLrkdorNMPAJIbgeKEAMZxEXIhAxuggJkQS
                    +GRZ78PGRA10UAUdSA0BPiLlkAAAAASUVORK5CYII=" 
                    width="57" />
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">

            <div class="col-md-12 no-padding">
                <div class="md-box accommodation-search clearfix">
                    <form method="GET" action="<?= base_url('hotels/searchHotels/2') ?>">
                        <div class="col-md-12">
                            <h4 class="title">Show me the 7 days DEALS</h4>
                        </div>
                        <div class="col-md-12">
                            <label>Periods</label>
                            <input id="p-7-dp" type="text" class="form-control calendar" placeholder="Select a month">
                            <select class="form-control" name="p" id="p7" required="required">
                                <option value="" selected disabled>Select a month in the field above</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="row clearfix">
                                <span class="tcenter col-md-12 no-padding tbold label-span">Capacity</span>
                                <span class="person-7pack-selection col-md-12 no-padding">
                                    <?php for ($i = $minMax7Days['max_adults']; $i >= 1; $i--): ?>
                                        <?php if($i == $minMax7Days['min_adults']):?>
                                            <input type="radio" id="7per-rating-<?=$i?>" name="a" value="<?=$i?>" checked>
                                            <label for="7per-rating-<?=$i?>"><?=$i?></label>
                                        <?php else:?>
                                            <input type="radio" id="7per-rating-<?=$i?>" name="a" value="<?=$i?>" >
                                            <label for="7per-rating-<?=$i?>"><?=$i?></label>
                                        <?php endif;?>
                                    <?php endfor; ?>
                                </span>      
                            </div>                          
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            
            <div class="col-md-12 no-padding mt">
                <div style="height:340px; width:100%;" id="hotel_map" class="md-box hotel_map clearfix">
                </div>
            </div> 
        </div>
        <div class="col-md-9">
            <?php if(isset($hotel_images) && $hotel_images && count($hotel_images) > 0): ?>
            <div class="row">
                <div class="col-md-12 clearfix no-padding">
                    <ul id="imageGallery">
                        
                        <?php foreach($hotel_images as $h_i_key => $h_i):?>
                        <li class="sliderItem" data-thumb="<?= base_url('assets/uploads/' . $h_i['image_name']) ?>" 
                            data-src="<?= base_url('assets/uploads/' . $h_i['image_name']) ?>">
                            <img src="<?= base_url('assets/uploads/' . $h_i['image_name']) ?>" />
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endif;?>
            
            <?php if(isset($hotel['hotel_long_description']) && strlen($hotel['hotel_long_description'])>0): ?>
            <div class="row mt">
                <h3>
                    Description
                </h3>
                <span>
                    <?= $hotel['hotel_long_description'] ?>
                </span>
            </div>
            <?php elseif(isset($hotel['hotel_short_description']) && strlen($hotel['hotel_short_description'])>0) :?>
            <div class="row mt">
                <h3>
                    Description
                </h3>
                <span>
                    <?= $hotel['hotel_short_description'] ?>
                </span>
            </div>
            <?php endif;?>

            <?php if(isset($hotel_facilities) && $hotel_facilities): ?>
            <div class="row mt">
                <h3>
                    Facilities
                </h3>
                <div class="col-md-12 no-padding flex flex-wrap">
                    <?php foreach ($hotel_facilities as $hotel_facility): ?>
                        <span class="icon-sign flex">
                            <?php if(isset($hotel_facility['facility_icon']) && trim($hotel_facility['facility_icon']) != ""): ?>
                            <span class="flex flex-center">
                                <img class="icon" src="<?= base_url('assets/uploads/facilities/'.$hotel_facility['facility_icon']) ?>" alt="Facility icon">
                            </span>
                            <?php endif; ?>
                            <h5><?= $hotel_facility['facility_name'] ?> </h5>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif;?>

            <?php if(isset($hotel_rooms) && $hotel_rooms):?>
            <div class="row mt">
                <?php require_once(VIEWPATH . 'frontend/price_list.php'); ?>                
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
    <?php if (isset($hotel['latitude'] ) && isset($hotel['longitude']) && trim($hotel['latitude']) != "" && trim($hotel['longitude']) != ""):?>
        var hotel_lat = <?=$hotel['latitude']?>;
        var hotel_lng = <?=$hotel['longitude']?>;
        var zoom = 14;
    <?php else: ?>
        var hotel_lat = 40.0981789;
        var hotel_lng = 23.973239;
        var zoom = 9;
    <?php endif;?>
    var center = {lat: hotel_lat, lng: hotel_lng}
    var map;
    var marker;
    function initMap() {
        map = new google.maps.Map(document.getElementById('hotel_map'), {
            center: center,
            zoom: zoom,
            mapTypeId: 'satellite'
        });
        marker = new google.maps.Marker({
          position: center,
          map: map
        });
    }

    $(document).ready(function() {
        $('.datatables').DataTable();

        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true,
            thumbItem:9,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }   
        });  
        
        
        $("input[name='checkin'], input[name='checkout']").datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            minDate: new Date()
        });

        $("#p-7-dp").datepicker({
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
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtj9odHIASxZuUQXxx2RSk3mvMpNe8HLI&callback=initMap"
    async defer></script>