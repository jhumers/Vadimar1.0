<?php headAdmin($data); ?>

<?php headerAdmin($data); ?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-xl-9 d-none d-md-block d-xl-block">
                <div class="overflow-x-hidden overflow-y-hidden h-auto with-custom-webkit-scrollbars">
                    <div id="map" class="map" style="height: calc(100vh - 5rem)">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-xl-3 border-left">
                <div id="areaDate">
                </div>
                <div class="overflow-x-hidden h-auto with-custom-webkit-scrollbars">
                    <div id="areaRoute" class="" style="max-height: calc(100vh - 10rem) !important; overflow-x:hidden;position:relative; padding-bottom:15px; margin-bottom:15px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php footerAdmin($data); ?>
