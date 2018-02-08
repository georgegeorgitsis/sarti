
<div class="container">
    <div class="row flex flex-end">
    <?php if (isset($is_search) && $is_search == 1 && isset($search)): ?>
        <div class="col-md-1 no-padding">
            <a href="<?= base_url('hotels') ?>" class="btn btn-success bg-light-orange">Clear search</a>
        </div>
        <div class="col-md-8 text-center no-padding">
            <h4 class="text-bold bg-green search-display">
                Your results for: <?= date("d-m-y", strtotime($search['checkin'])) ." - ".date("d-m-y", strtotime($search['checkout']))." for ".$search['adults']. " people" ?>
            </h4>
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
                <div class="row  hotels-sorting">
                    <div class="col-md-4">
                        <div class="">
                            <select class="form-control" name="search-hotel-title" id="ajax-select">
                                <option ></option>
                            </select>
                        </div>
                    </div> 
                    <div class="col-md-8 clearfix">
                        <div class="col-md-3"> <h3 class="">Sort By</h3></div>
                        <div class="col-md-4">
                            <select class="form-control" name="sort-select-title" id="sort-select-title">
                                <option value="none" disabled selected>Title</option> 
                                <option value="title-asc">Ascending</option>
                                <option value="title-desc">Descending</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-md-offset-1">
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

        $("#ajax-select").select2({
            placeholder: "Search for a property...",
            minimumInputLength: 2,
            allowClear: true,
            ajax: {
                url: '<?= base_url('hotels/getHotelNames') ?>',
                dataType: 'json',
                delay: 750,
                data: function (params) {
                    var query = {
                        search: params.term
                    }
                    return query;
                },
                
                processResults: function (data, params) {
                    var results = [];
                    $.each(data.results, function (i, v) {
                        var o = {};
                        o.id = v.id;
                        o.name = v.name;
                        results.push(o);
                    })
                    return {
                        results: results
                    };
                }
            },
            escapeMarkup: function (markup) { return markup;},
            templateResult: function (reqs) {
                if (reqs.loading)
                    return reqs.subject;
                var markup = '<option value="'+ reqs.id +'"> <a href="<?= base_url('hotel/')?>'+reqs.id+'">'+reqs.name+'</a></option>';
                return markup;
            },
            templateSelection: function (reqs) { return reqs.name || reqs.id }
        });

    });
    </script>

