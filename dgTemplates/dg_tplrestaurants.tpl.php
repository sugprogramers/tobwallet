<style>
    .contentRestaurant{
        /*background-color: white;*/
        padding: 10px;
    }
</style>

<div class="col-sm-4 contentRestaurant">
    <div class="row" style="height: 180px">
        <div class="col-sm-12">
            <img class="thumbnail" src="<?php _p(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/upload/' . $_ITEM->Logo)?>" style="max-height: 100%;max-width: 100%">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button type="button" class="btn btn-block btn-info btn-load-offers" 
                    data-content="<?php _p($_ITEM->RestaurantName) ?>" 
                    data-trigger="hover" data-toggle="popover" data-original-title=""
                  tabindex="0" title="" data-placement="top"
                    onclick="loadoffers('<?php _p($_ITEM->IdRestaurant)?>')">View Offers</button>
        </div>
    </div>
</div>
