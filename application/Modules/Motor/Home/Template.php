<?php


if (isset($_COOKIE['kota-filter'])) {
    $kota_ygmjdcookie = $_COOKIE['kota-filter'];
    $selectedkota = strtolower($kota_ygmjdcookie);
} else if (isset($_COOKIE['kota'])) {
    $kota_ygmjdcookie = $_COOKIE['kota'];
    $selectedkota = strtolower($kota_ygmjdcookie);
} else {
    $kota_ygmjdcookie = 'Anda';
    $selectedkota = strtolower('jakarta');
}

$url_tdp = yii\helpers\Url::to([
    'leasing/list',
    'merkname' => 'semuamerek',
    'modelname' => 'semuamodel',
    'tahun' => date('Y'),
    'id_city' => isset($_COOKIE['idkota-filter']) ? $_COOKIE['idkota-filter'] : 'jkt',
    'promo_type' => 1,
    'tdp' => 30000000,
]);

$url_angsuran = yii\helpers\Url::to([
    'leasing/list',
    'merkname' => 'semuamerek',
    'modelname' => 'semuamodel',
    'tahun' => date('Y'),
    'id_city' => isset($_COOKIE['idkota-filter']) ? $_COOKIE['idkota-filter'] : 'jkt',
    'promo_type' => 1,
    'dp' => '',
    'angsuran' => 5000000,
]);
?>

<div class="page-home">
    <input type="hidden" id="cookie_kotanya" value="<?php echo ucwords($kota_ygmjdcookie); ?>">
    <input type="hidden" id="img_location" value="<?php echo $this->theme->getUrl('images/bg/location.gif'); ?>">
    <p class="popup-city"><a class="alert" style="display:none;" id="alertkota">Alert!</a></p>

    <!--  Cari Mobil Slider Section -->
    <div class="container top-space hidden-md hidden-lg">
        <div class="row">
            <div class="col-xs-4 no-pad-r">
                <a href="javascript:void(0);" class="route-to-mobil-baru">
                    <div class="home-icon-top">
                        <img src='data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"> <defs> <linearGradient id="a" x1="50%" x2="50%" y1="0%" y2="100%"> <stop offset="0%" stop-color="#F16033"/> <stop offset="100%" stop-color="#F76B1C"/> </linearGradient> </defs> <g fill="none" fill-rule="evenodd"> <circle cx="20" cy="20" r="20" fill="url(#a)"/> <g fill="#FFF" fill-rule="nonzero"> <g stroke="#F16033" stroke-linecap="round" stroke-linejoin="round"> <path d="M25.255 27.141H15.237l-.889 2.175-.154.377h1.932a.33.33 0 0 1-.005-.052V28.698a.33.33 0 0 1 .328-.331.33.33 0 0 1 .328.33v.944a.33.33 0 0 1-.005.052h3.151a.33.33 0 0 1-.005-.052V28.698a.33.33 0 0 1 .328-.331.33.33 0 0 1 .329.33v.944a.33.33 0 0 1-.006.052h3.151a.33.33 0 0 1-.005-.052V28.698a.33.33 0 0 1 .328-.331.33.33 0 0 1 .329.33v.944a.33.33 0 0 1-.005.052h1.931l-.154-.377-.889-2.175z"/> <path d="M33.802 18.654c-.066-.192-.297-.341-.49-.341h-2.513c-.193 0-.425.15-.49.34-.09.264-.147.488-.174.7-1.105-2.143-2.328-4.529-2.328-4.529a1 1 0 0 0-.763-.65 38.031 38.031 0 0 0-6.797-.622c-2.247 0-4.535.21-6.799.622a1 1 0 0 0-.762.65s-1.224 2.386-2.329 4.529a3.508 3.508 0 0 0-.173-.7c-.066-.191-.297-.34-.49-.34H7.18c-.193 0-.425.149-.49.34-.255.747-.254 1.174 0 1.92.065.192.297.34.49.34H9.69c0 .032.002.064.005.095a1.296 1.296 0 0 0-.913 1.242V30.82c0 .345.277.624.619.624h3.116c.341 0 .619-.28.619-.624v-1.505h.504l1.075-2.631a.328.328 0 0 1 .303-.205h10.458c.133 0 .253.08.304.205l1.075 2.63h.504v1.506c0 .345.277.624.619.624h3.116c.342 0 .619-.28.619-.624V22.25c0-.586-.385-1.08-.914-1.242.004-.031.005-.063.006-.094h2.507c.194 0 .425-.15.49-.341.255-.746.255-1.173 0-1.92zm-19.735-3.095s1.496-.382 6.18-.382c4.682 0 6.178.382 6.178.382l2.196 5.355h-16.75l2.196-5.355zm-2.73 9.266v-1.76h3.784l1.123 1.76h-4.906zm17.818 0h-4.907l1.124-1.76h3.783v1.76z"/> </g> <path d="M30.52 9.953l-.006-.018.006.018zM30.519 9.948l-.002-.005.002.005zM30.517 9.944l-.005-.017.005.017zM30.525 9.967a1.956 1.956 0 0 0-.007-.022l.007.022z"/> <path d="M30.535 9.997a8.96 8.96 0 0 1-.014-.042l.014.042zM30.527 9.975a.486.486 0 0 0-.396-.33l-.796-.114-.356-.713a.488.488 0 0 0-.44-.27.488.488 0 0 0-.44.27l-.356.713-.796.114a.486.486 0 0 0-.396.33.478.478 0 0 0 .124.497l.576.555-.136.783c-.067.389.358.695.712.511l.712-.37.712.37c.353.184.78-.122.712-.51l-.136-.784.576-.555a.477.477 0 0 0 .124-.497zm-1.427.58a.481.481 0 0 0-.142.43l.045.26-.236-.123a.496.496 0 0 0-.456 0l-.236.122.045-.26a.481.481 0 0 0-.14-.428l-.192-.184.264-.038a.49.49 0 0 0 .37-.265l.117-.236.118.236a.49.49 0 0 0 .37.265l.263.038-.19.184zM30.543 10.022c.004.012.003.01 0 0zM30.513 9.931c-.003-.01-.003-.009 0 0zM30.541 10.016l.004.013-.004-.013z"/> <path d="M30.527 9.975l.01.031c-.002-.01-.006-.02-.01-.031zM30.532 9.99l.019.057-.019-.057zM26.26 12.536a.495.495 0 0 0-.655.167 24.428 24.428 0 0 1-2.306 3.181c-.945 1.104-2 2.137-3.135 3.07-.2.164-.22.45-.046.638a.49.49 0 0 0 .361.155.494.494 0 0 0 .315-.111 26.064 26.064 0 0 0 3.25-3.183 25.336 25.336 0 0 0 2.392-3.3.439.439 0 0 0-.177-.617z"/> <g> <path d="M20.296 13.381v-.001c.018.076.024.1 0 .001z"/> <path d="M21.122 13.186a6.818 6.818 0 0 0-.828-1.982.428.428 0 0 0-.584-.137.417.417 0 0 0-.14.577c.328.525.578 1.125.726 1.736-.027-.112-.112-.463 0 0a.429.429 0 0 0 .522.308.423.423 0 0 0 .304-.502z"/> </g> <g> <path d="M19.13 18.827c-.003-.002-.003-.002 0 0z"/> <path d="M19.21 18.908a88.41 88.41 0 0 1-.081-.082l.081.082zM21.124 15.048c-.304-.139-.648.035-.767.388a10.027 10.027 0 0 1-1.198 2.421c-.202.298-.158.73.099.964.253.231.632.18.831-.114a11.47 11.47 0 0 0 1.37-2.77c.12-.353-.03-.75-.335-.89z"/> </g> <g> <path d="M28.006 19.796l.19.163-.19-.163zM28.01 19.8c-.01-.01-.01-.01 0 0zM28.196 19.96c-.514-.444-1.926-1.47-3.951-1.43a5.897 5.897 0 0 0-3.585 1.323.416.416 0 0 0-.057.59c.15.18.417.205.598.057.5-.41 1.564-1.1 3.061-1.13 1.728-.036 2.936.842 3.375 1.221a.432.432 0 0 0 .627-.074.42.42 0 0 0-.068-.558z"/> </g> <path d="M23.006 9c-.83 0-1.506.668-1.506 1.488s.676 1.488 1.506 1.488 1.506-.667 1.506-1.488c0-.82-.676-1.488-1.506-1.488zm0 2.137a.654.654 0 0 1-.657-.649c0-.358.295-.649.657-.649.362 0 .657.291.657.65a.654.654 0 0 1-.657.648zM29.006 14.5c-.83 0-1.506.668-1.506 1.488s.676 1.488 1.506 1.488 1.506-.667 1.506-1.488c0-.82-.676-1.488-1.506-1.488zm0 2.137a.654.654 0 0 1-.657-.649c0-.358.295-.649.657-.649.362 0 .657.291.657.65a.654.654 0 0 1-.657.648z"/> </g> </g> </svg>'
                             alt="icon-mobil-baru">
                        <p> Mobil Baru</p>
                    </div>
                </a>
            </div>
            <div class="col-xs-4 pad-5-l-r">
                <a href="javascript:void(0);" class="route-to-mobil-bekas">
                    <div class="home-icon-top">
                        <img src='data:image/svg+xml;utf8;, <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"> <defs> <linearGradient id="a" x1="50%" x2="50%" y1="0%" y2="100%"> <stop offset="0%" stop-color="#F16033"/> <stop offset="100%" stop-color="#F76B1C"/> </linearGradient> </defs> <g fill="none" fill-rule="evenodd"> <circle cx="20" cy="20" r="20" fill="url(#a)"/> <g fill="#FFF" fill-rule="nonzero"> <g stroke="#F16033" stroke-linecap="round" stroke-linejoin="round"> <path d="M24.696 27.156h-9.987l-.885 2.012-.154.35h1.926a.284.284 0 0 1-.006-.049v-.873c0-.169.147-.306.328-.306.18 0 .327.137.327.306v.873a.284.284 0 0 1-.005.048h3.14a.284.284 0 0 1-.005-.048v-.873c0-.169.147-.306.328-.306.18 0 .327.137.327.306v.873a.284.284 0 0 1-.005.048h3.14a.284.284 0 0 1-.004-.048v-.873c0-.169.146-.306.327-.306.18 0 .327.137.327.306v.873a.284.284 0 0 1-.005.048h1.925l-.153-.349-.886-2.012z"/> <path d="M33.215 19.45c-.065-.178-.296-.316-.489-.316h-2.504c-.193 0-.424.138-.489.315-.09.244-.147.451-.173.647-1.101-1.983-2.321-4.191-2.321-4.191a.98.98 0 0 0-.76-.603 40.746 40.746 0 0 0-6.776-.575c-2.24 0-4.52.194-6.777.575a.98.98 0 0 0-.76.603s-1.22 2.208-2.321 4.191a3.057 3.057 0 0 0-.173-.647c-.065-.177-.296-.315-.489-.315H6.68c-.193 0-.424.138-.489.315-.253.69-.253 1.086 0 1.777.065.177.296.315.489.315h2.5c0 .03.002.059.005.088-.527.15-.91.607-.91 1.149V30.712c0 .319.276.577.616.577h3.106c.341 0 .618-.258.618-.577v-1.394h.502l1.072-2.435c.05-.115.17-.19.302-.19h10.425c.133 0 .252.075.302.19l1.072 2.435h.503v1.394c0 .319.276.577.617.577h3.106c.34 0 .617-.258.617-.577v-7.934c0-.542-.384-1-.911-1.15a.866.866 0 0 0 .006-.087h2.499c.193 0 .424-.138.489-.315.253-.69.253-1.086 0-1.777zm-19.672-2.865s1.491-.354 6.16-.354c4.668 0 6.159.354 6.159.354l2.19 4.956H11.353l2.189-4.956zm-2.72 8.576v-1.628h3.77l1.12 1.628h-4.89zm17.76 0H23.69l1.12-1.628h3.772v1.628z"/> </g> <path stroke="#FFF" d="M30.151 14.563a1.91 1.91 0 0 0-1.36-.563c-.513 0-.995.2-1.358.563l-.736.736a1.1 1.1 0 0 0 0 1.553l.01.01-.484.483a.157.157 0 0 0-.021.026l-.254.394-.393.253a.156.156 0 0 0-.047.047l-.253.393-.394.254a.157.157 0 0 0-.047.047l-.253.393-.394.254a.157.157 0 0 0-.047.047l-.251.39-.337.2a.157.157 0 0 0-.077.141l.036.89a.157.157 0 0 0 .15.15l.89.035h.005a.157.157 0 0 0 .111-.046l3.206-3.205.009.01c.214.213.496.32.777.32s.563-.107.777-.32l.735-.736c.75-.75.75-1.97 0-2.719zm-6.09 5.531a.157.157 0 0 0 .051-.05l.253-.393.394-.254a.157.157 0 0 0 .047-.047l.253-.393.394-.254a.157.157 0 0 0 .047-.046l.253-.394.394-.253a.156.156 0 0 0 .046-.047l.263-.408.472-.472.368.368-3.466 3.467-.032-.002-.026-.651.288-.17zm.413.85l-.219-.01 3.262-3.261.114.113-3.157 3.157zm5.456-3.884l-.736.736a.786.786 0 0 1-1.11 0l-1.165-1.165a.78.78 0 0 1-.23-.556.78.78 0 0 1 .23-.555l.735-.736a1.599 1.599 0 0 1 1.138-.47c.43 0 .834.167 1.138.47l.11-.11-.11.11a1.611 1.611 0 0 1 0 2.276z"/> <path stroke="#FFF" d="M29.634 15.106a1.181 1.181 0 0 0-1.3-.263.157.157 0 0 0-.05.254l1.323 1.343a.157.157 0 0 0 .255-.047 1.171 1.171 0 0 0-.228-1.287zm.007.922l-.946-.959a.852.852 0 0 1 .945.96z"/> </g> </g> </svg> '
                             alt="icon-mobil-bekas">
                        <p> Mobil Bekas</p>
                    </div>
                </a>
            </div>
            <div class="col-xs-4 no-pad-l">
                <a href="https://berita.rajamobil.com/">
                    <div class="home-icon-top">
                        <img src='data:image/svg+xml;utf8;, <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40"> <defs> <linearGradient id="a" x1="50%" x2="50%" y1="0%" y2="100%"> <stop offset="0%" stop-color="#F16033"/> <stop offset="100%" stop-color="#F76B1C"/> </linearGradient> </defs> <g fill="none" fill-rule="evenodd"> <circle cx="20" cy="20" r="20" fill="url(#a)"/> <g fill="#FFF" fill-rule="nonzero"> <path d="M26.604 12.81v-2.628H10.182v17.407a2.96 2.96 0 0 0 2.956 2.956h14.451a2.96 2.96 0 0 0 2.956-2.956V12.81h-3.94zM13.138 28.574a.986.986 0 0 1-.985-.986V12.152h12.48V27.59c0 .346.06.677.17.986H13.138zm15.437-.986a.986.986 0 0 1-1.97 0V14.78h1.97v12.81z"/> <path d="M19.076 17.077h-2.127l-.189.473-.033.082h.41a.074.074 0 0 1 0-.01V17.415a.07.07 0 0 1 .069-.072.07.07 0 0 1 .07.072V17.62l-.001.011h.669a.074.074 0 0 1-.002-.01V17.415a.07.07 0 0 1 .07-.072.07.07 0 0 1 .07.072V17.62l-.001.011h.669a.074.074 0 0 1-.001-.01V17.415a.07.07 0 0 1 .07-.072.07.07 0 0 1 .069.072V17.62l-.001.011h.41l-.033-.082-.188-.473z"/> <path d="M21.07 15.279a.119.119 0 0 0-.105-.074h-.533a.119.119 0 0 0-.104.074.78.78 0 0 0-.037.152l-.495-.986a.214.214 0 0 0-.161-.142 7.877 7.877 0 0 0-1.444-.135c-.477 0-.962.045-1.443.135a.214.214 0 0 0-.162.142l-.494.986a.78.78 0 0 0-.037-.152.119.119 0 0 0-.104-.075h-.534a.119.119 0 0 0-.104.075.56.56 0 0 0 0 .418.119.119 0 0 0 .104.074h.533v.02a.282.282 0 0 0-.193.27v1.867c0 .076.059.137.131.137h.662c.072 0 .131-.061.131-.136V17.6h.107l.229-.573a.07.07 0 0 1 .064-.045h2.22a.07.07 0 0 1 .065.045l.228.573h.107v.328c0 .075.059.136.132.136h.661c.073 0 .131-.061.131-.136v-1.867a.282.282 0 0 0-.193-.27v-.021h.533c.041 0 .09-.033.104-.074a.56.56 0 0 0 0-.418zm-4.19-.674s.317-.084 1.311-.084 1.312.084 1.312.084l.466 1.166h-3.556l.466-1.166zm-.58 2.018v-.383h.803l.239.383H16.3zm3.783 0H19.04l.238-.383h.804v.383zM14.123 19.378h8.54v1.97h-8.54zM14.123 22.663h8.54v1.97h-8.54z"/> </g> </g> </svg>'
                             alt="icon-review-mobil">
                        <p> Review Mobil</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container nop ">
        <div class="row-fluid">
            <h2 class="home-subHeader-top"><span></span>Cari Mobil Berdasarkan</h2>
            <div class="merek-slide-container"></div>
            <div class="clearfix"></div>
            <div class="model-container"></div>
        </div>
    </div>

    <div id="boxes">
        <div id="dialogs" class="window">
            <div id="header">
                <!--<a href="#" class="disagree">close</a>-->
                <?php echo Html::img($this->theme->getUrl('images/komponen/banner-newsletter.jpg'), []); ?>
            </div>
            <div id="isiemail" class="hiddenxx">
                <span class="jangan">Jangan ketinggalan info ratusan promo mobil baru setiap minggunya</span>
                <hr>
                <span class="langganan">Langganan disini:</span>
                <?php
                echo Html::input('text', 'email', '', ['class' => 'form-control', 'placeholder' => 'Alamat Email']);
                echo Html::label('', 'emptyemail', ['class' => '']);
                echo Html::button('Langganan', ['class' => 'btn btn-langganan']);
                ?>
            </div>
            <div id="isipilihan" class="hidden">
                Pilih Promo Angsuran :
                <div id="lorem">
                    <?php
                    $list = [1 => 'DP termurah dengan angsuran ringan', 2 => 'Angsuran ringan', 3 => 'DP termurah', 4 => 'Angsuran mulai dari 1jt/bulan', 5 => 'Paket suka suka'];
                    $list2 = [1, 5];
                    echo Html::checkboxList('check', $list2, $list);
                    echo Html::button('Selesai', ['class' => 'btn btn-selesai']);
                    ?>
                </div>
            </div>
            <div class="testimoni"></div>
        </div>
        <div style="" id="mask"></div>
    </div>

    <?php

    if (isset($promoMobilBaru['count']) &&
        $promoMobilBaru['count']['toyota'] == 0 &&
        $promoMobilBaru['count']['suzuki'] == 0 &&
        $promoMobilBaru['count']['daihatsu'] == 0 &&
        $promoMobilBaru['count']['honda'] == 0 &&
        $promoMobilBaru['count']['datsun'] == 0 &&
        $promoMobilBaru['count']['mitsubishi'] == 0) {
        //jika tidak ada harga di semua merek sesuai dg parent id city yang dipilih (gf_citygroup)
        ?>
        <input type="hidden" id="cekadaharga" value="0">
    <?php } else { //jika ada harga ?>
        <input type="hidden" id="cekadaharga" value="1">
    <?php } ?>

    <!--/10205490/new_design_rajamobil_homepage_top_728x90-->
    <div class="banner-dfp">
        <div id='div-gpt-ad-1488184309241-0'>
            <script type='text/javascript'>
                googletag.cmd.push(function () {
                    googletag.display('div-gpt-ad-1488184309241-0');
                });
            </script>
        </div>
    </div>

    <?= $list_terpopuler_terbaru; ?>

    <!--
        mel ini bannernya
        new_design_rajamobil_homepage_728x90
    -->
<!--    <div class="outer-wrapper">-->
<!--        <div class="container-ads space-bottom">-->
<!--            <div class="banner-billboard">-->
<!--                <div id="div-gpt-ad-1464662770834-0">-->
<!--                    <script type="text/javascript">-->
<!--                        googletag.cmd.push(function () {-->
<!--                            googletag.display("div-gpt-ad-1464662770834-0");-->
<!--                        });-->
<!---->
<!--                    </script>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <div class="container pad-lr-15 lists-homepage">
        <div class="row-fluid">
            <ul class="list-banner-home-middle">
                <li>
                    <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/banners/RajaMobil-Banner-TDP-30-Juta.png'), 'class' => 'image-list-banner-home', 'alt' => 'Promo Kredit TDP kurang dari 30 juta', 'title' => 'Promo Kredit TDP kurang dari 30 juta']), Url::toRoute([$url_tdp]), ['class' => "gaevent", 'data-galabel' => 'BANNER_HOME', 'data-gakategori' => 'Banner Home Page', 'data-gaaction' => 'Banner-home-page-middle']); ?>
                </li>
                <li>
                    <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/banners/RajaMobil-Banner-Angsuran-5juta.png'), 'class' => 'image-list-banner-home', 'alt' => 'Promo Kredit TDP angsuran kurang dari 5 juta', 'title' => 'Promo Kredit TDP angsuran kurang dari 5 juta']), Url::toRoute([$url_angsuran]), ['class' => "gaevent", 'data-galabel' => 'BANNER_HOME', 'data-gakategori' => 'Banner Home Page', 'data-gaaction' => 'Banner-home-page-middle']); ?>
                </li>
                <li>
                    <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/banners/RajaMobil-City-Car.png'), 'class' => 'image-list-banner-home', 'alt' => 'Mobil baru city car', 'title' => 'Mobil baru city car']), Url::toRoute(['jual/mobil/baru', 'tipebody' => 'hatchback']), ['class' => "gaevent", 'data-galabel' => 'BANNER_HOME', 'data-gakategori' => 'Banner Home Page', 'data-gaaction' => 'Banner-home-page-middle']); ?>
                </li>
                <li>
                    <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/banners/RajaMobil-Family-Car.png'), 'class' => 'image-list-banner-home', 'alt' => 'Mobil baru family car', 'title' => 'Mobil baru family car']), Url::toRoute(['jual/mobil/baru', 'tipebody' => 'mpv']), ['class' => "gaevent", 'data-galabel' => 'BANNER_HOME', 'data-gakategori' => 'Banner Home Page', 'data-gaaction' => 'Banner-home-page-middle']); ?>
                </li>
            </ul>
        </div>
    </div>

    <?= $list_bandingkan; ?>

    <!-- <div class="container lists-homepage">
    <div class="row-fluid">
    <h2 class="home-subHeader-top"><span></span>Dealer Terpopuler</h2>
    <div class="lists-containers">
        <ul class="rounded-lists">
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-image.png'), 'class' => 'dealer-img', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga | 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-image.png'), 'class' => 'dealer-img', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Auto 2000 Bogor</h5>
              <p>25 Wiraniaga | 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-image.png'), 'class' => 'dealer-img', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Suzuki Sejahtera Buana</h5>
              <p>25 Wiraniaga | 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-image.png'), 'class' => 'dealer-img', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga | 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-image.png'), 'class' => 'dealer-img', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga | 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-image.png'), 'class' => 'dealer-img', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga | 35 Promo</p>
            </li>
        </ul>
    </div>
    <i class="icon-logo-footer"></i>    
        <div class="clearfix"></div>
    </div>
</div>  
<div class="container lists-homepage">
    <div class="row-fluid">
    <h2 class="home-subHeader-top"><span></span>Wiraniaga Terpopuler</h2>
    <div class="lists-containers">
        <ul class="rounded-lists">
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-person.png'), 'class' => '', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['target' => '_blank', 'class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
            <h5>Trevor Carr</h5>  
            <p>Plaza Toyota Tendean <br/> 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-person.png'), 'class' => '', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['target' => '_blank', 'class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga <br/> 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-person.png'), 'class' => '', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['target' => '_blank', 'class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga <br/> 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-person.png'), 'class' => '', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['target' => '_blank', 'class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga <br/> 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-person.png'), 'class' => '', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['target' => '_blank', 'class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga <br/> 35 Promo</p>
            </li>
            <li>
            <?= Html::a(Html::img(Yii::$app->rajamobil->getLoaderImage(2), ['data-src' => Url::to('@web/themes/rmperjuangan/images/new-home/no-person.png'), 'class' => '', 'alt' => 'Dealer-1', 'title' => 'Dealer-1']), Url::toRoute([$url_tdp]), ['target' => '_blank', 'class' => "gaevent", 'data-galabel' => 'Dealer-Terpopuler', 'data-gakategori' => 'List Dealer homepage', 'data-gaaction' => 'Dealer Terpopuler']); ?>
              <h5>Plaza Toyota Tendean</h5>
              <p>25 Wiraniaga <br/> 35 Promo</p>
            </li>
        </ul>
    </div>
        <div class="clearfix"></div>
    </div>
</div>     -->
    <?php // if (!empty($berita)) { ?>
        <?php // $berita ?>
    <?php //} ?>

    <?= $list_cbu; ?>

    <?= $list_preloved; ?>

    <div class="container mt60">
        <div class="row-fluid">
            <h2 class="home-subHeader-pilihrajamobil">KENAPA PILIH MOBIL BARU DI RAJAMOBIL.COM?</h2>
            <h3 class="pilihrajamobil-subheader"> RajaMobil.com menyediakan promo mobil baru dengan fasilitas lengkap,
                aman, nyaman dan terpercaya</h3>
        </div>
        <div class="row-fluid">
            <ul class="list-pilihrajamobil">
                <li class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                    <div class="icon icon-lengkap icon-lengkap-dims"></div>
                    <div class="keterangan"><h3 class="sub-header-pilihanrajamobil">Lengkap</h3> RajaMobil.com memiliki
                        34 merk mobil di Indonesia.
                        500+ Dealer memiliki promo dan harga bersaing.
                    </div>
                </li>
                <li class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                    <div class="icon icon-promo-harga-bersaing icon-promo-harga-bersaing-dims"></div>

                    <div class="keterangan">
                        <h3 class="sub-header-pilihanrajamobil">Promo dan Harga Bersaing</h3>
                        5000+ Wiraniaga yang memberikan promo mobil terbaru setiap hari.
                        Semua sales resmi dari authorized dealer siap melayani Anda di mana saja.
                        Minta penawaran, negosiasi harga, hingga test drive di rumah.
                    </div>
                </li>
                <li class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                    <div class="icon icon-aman-terpecaya icon-aman-terpecaya-dims"></div>
                    <div class="keterangan"><h3 class="sub-header-pilihanrajamobil">Aman dan Nyaman</h3>
                        Semua authorized dealer yang akan menghubungi Anda.
                        Anda bisa pesan mobil dari mana saja.
                    </div>
                </li>
            </ul>
        </div>
        <div class="row btn-panduan">
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12 text-right"><?= Html::a('Pesan Mobil Baru', Url::toRoute('/panduan/user'), ['class' => 'btn-block-home btn-outline-a', 'target' => '_blank']) ?></div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12"><?= Html::a('Berjualan di RajaMobil', Url::toRoute('/panduan/sales'), ['class' => ' btn-block-home btn-outline-a', 'target' => '_blank']) ?></div>
        </div>
    </div>
</div>
