<?php

/* general/themes/header.twig */
class __TwigTemplate_3a65249d75a0f36a3b22396211c77539391b2d36a8829cf9c5c55e5d90537e80 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'header' => array($this, 'block_header'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('header', $context, $blocks);
    }

    public function block_header($context, array $blocks = array())
    {
        // line 2
        echo "<header>
    <div class=\"top-header hidden-xs hidden-sm\">
        <div class=\"container\">
            <ul class=\"hidden-sm hidden-xs\">
                <li><a href=\"/jual/mobil/baru\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-br\"></i>Promo Mobil Baru</a></li>
                <li><a href=\"/jual/mobil/bekas\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-bekas\"></i>Promo Mobil Bekas</a></li>
                <li><a href=\"https://my.rajamobil.com\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-jmb\"></i>Jualan Mobil Baru</a></li>
                <li><a href=\"/pasangiklan\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-ps\"></i>Pasang Iklan Mobil</a></li>
                <li><a href=\"http://berita.rajamobil.com\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-bm\"></i>Berita Mobil</a></li>
                <li class=\"act-tracking-buy\"><a href=\"#\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-tp\"></i>Tracking Pembelian</a></li>
            </ul>
        </div>
    </div>

    <div id=\"head-tracker-buy\" class=\"floating-tracker hidden-sm hidden-xs\">
        <div class=\"arrow-up\"></div>
        <div class=\"content\">
            <p> Tracking Pembelian Mobil</p>
            <form id=\"tracking-form\" action=\"/sales/tracking\" method=\"get\">
                <input type=\"text\" name=\"tracking_code\" class=\"track-buy\" placeholder=\"Masukkan Kode Pesanan\" required=\"\">
                <input type=\"submit\" id=\"subscribe-btn\" class=\"btn btn-rm-sm\" value=\"Lihat\">
            </form>
        </div>
    </div>

    <!-- Main Menu Desktop View -->
    <div class=\"header-l2\">
        <div class=\"container pad-menu-top\">
            <div class=\"logo left\">
                <a class=\"gaevent\" href=\"/\" data-galabel=\"click Logo Header\" data-gakategori=\"Global\" data-gaaction=\"Header Area\">
                    <img src=\"/assets/images/logo/logo-rajamobil.png\" alt=\"Rajamobil\">
                </a>
            </div>

            <!-- Search Header -->
            <div class=\"search-header\">
                <select id=\"searchmobilheader\" class=\"minimal hidden-sm hidden-xs\" name=\"kondisikendaraan\">
                    <option value=\"0\" selected=\"\">Mobil Baru</option>
                </select>
                <div class=\"inner-addon right-addon\">
                    <i class=\"glyphicon glyphicon-search\"></i>
                    <input type=\"text\" class=\"top-search-action tsaw\" name=\"top-search\" value=\"\" maxlength=\"100\" placeholder=\"Temukan mobil idaman Anda\">
                </div>

                <div class=\"search-result hidden-xs hidden-sm\">
                    <div class=\"mobile-result\"> </div>
                    <div class=\"sales-result\"></div>
                    <div class=\"dealer-result\"></div>
                    <div class=\"cleaner\"></div>
                </div>
                <div class=\"cleaner\"></div>
            </div>

            <!-- Search Header -->
            <div id=\"morphsearch\" class=\"morphsearch\">
                <form class=\"morphsearch-form\">
                    <div class=\"arrow-left\">
                        <img src=\"data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDI2OC44MzMgMjY4LjgzMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjY4LjgzMyAyNjguODMzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTI1Ni4zMzMsMTIxLjkxNkg0Mi42NzlsNTguNjU5LTU4LjY2MWM0Ljg4Mi00Ljg4Miw0Ljg4Mi0xMi43OTYsMC0xNy42NzhjLTQuODgzLTQuODgxLTEyLjc5Ny00Ljg4MS0xNy42NzgsMGwtNzkuOTk4LDgwICAgYy00Ljg4Myw0Ljg4Mi00Ljg4MywxMi43OTYsMCwxNy42NzhsODAsODBjMi40MzksMi40MzksNS42NCwzLjY2MSw4LjgzOSwzLjY2MXM2LjM5Ny0xLjIyMiw4LjgzOS0zLjY2MSAgIGM0Ljg4Mi00Ljg4Miw0Ljg4Mi0xMi43OTYsMC0xNy42NzhsLTU4LjY2MS01OC42NjFoMjEzLjY1NGM2LjkwMywwLDEyLjUtNS41OTgsMTIuNS0xMi41ICAgQzI2OC44MzMsMTI3LjUxMywyNjMuMjM2LDEyMS45MTYsMjU2LjMzMywxMjEuOTE2eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=\">
                    </div>
                    <input class=\"morphsearch-input\" type=\"search\" placeholder=\"Cari mobil impian anda?\">
                </form>
                <div class=\"morphsearch-content\">
                    <ul class=\"search-type\">
                        <li class=\"active\" style=\"visibility: hidden\"><a data-toggle=\"pill\" href=\"#mobil-baru\" data-mobilid=\"1\">Mobil Baru</a></li>
                        <!-- <li><a data-toggle=\"pill\" href=\"#mobil-bekas\" data-mobilID=\"2\">Mobil Bekas</a></li>-->
                        <!-- <li><a data-toggle=\"pill\" href=\"#mobil-cbu\" data-mobilID=\"3\">Mobil Baru Importir Umum</a></li>-->
                    </ul>
                    <div class=\"tab-content\">
                        <div id=\"mobil-baru\" class=\"tab-pane fade in active\">
                            <div class=\"result-car-mob\"></div>
                            <div class=\"result-sales-mob\"></div>
                            <!-- <div class=\"result-dealer-mob\"></div> -->
                        </div>
                        <div id=\"mobil-bekas\" class=\"tab-pane fade\"></div>
                        <div id=\"mobil-cbu\" class=\"tab-pane fade\"></div>
                    </div>
                </div>
                <span class=\"morphsearch-close\"></span>
            </div>


            <div class=\"sudahlogin right hidden-sm hidden-xs\">
                <div class=\"sign-btn\">
                    <ul>
                        <li><a class=\"bnt\" href=\"/panduan/user\" title=\"bantuan panduan user\" target=\"_blank\"><i class=\"icon-bantuan\"></i>Bantuan</a> </li>
                        <li><a class=\"btn-white-sm\" href=\"https://my.rajamobil.com/#/loginpage\" title=\"masuk\" target=\"_blank\">Masuk</a> </li>
                        <li><a class=\"btn-rm-sm\" href=\"https://my.rajamobil.com/#/daftarbaru\" title=\"daftar\" target=\"_blank\">Daftar</a> </li>
                    </ul>
                </div>
            </div>
            <div class=\"cleaner\"></div>
        </div>
    </div>

    <!-- section untuk menampilkan form pencarian-->
    <div style=\"clear: both;\"></div>
    <div class=\"menu-content-pencarian open\" style=\"display: block;height: auto;\">
        <!-- banner slides homepage -->
        <div class=\"billboard-home\">
            <ul class=\"wrapper-billboard-home-list\">
                <li class=\"slide_0 active\" index=\"0\" style=\"margin-left: 0%;\">
                    <a class=\"gaevent\" href=\"https://www.datsun.co.id/mobil/mobil-baru/cross.html?utm_source=RAJAMOBIL&amp;utm_medium=BANNER_AD_1660X415&amp;utm_term=DATSUN&amp;utm_content=MAY_K2D&amp;utm_campaign=K2D_MAY2018\" data-galabel=\"Datsun Promo Mei\" data-gakategori=\"Homepage\"
                        data-gaaction=\"Click-Banner-Hompage\" target=\"_blank\">
                        <img class=\"img-responsive\" src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/-rajamobil_1660x415px_dekstop.jpg\" alt=\"Datsun Promo Mei\" title=\"Datsun Promo Mei\" data-src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/-rajamobil_1660x415px_dekstop.jpg\">
                    </a>
                </li>
                <li class=\"slide_1\" index=\"1\" style=\"margin-left: 0%;\">
                    <a class=\"gaevent\" href=\"https://nissanid.com/form-promo-nissan-funtastic-festival-rajamobil.html\" data-galabel=\"Nissan Promo April\" data-gakategori=\"Homepage\" data-gaaction=\"Click-Banner-Hompage\" target=\"_blank\">
                        <img class=\"img-responsive\" src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/nissan-april_dekstop.jpg\" alt=\"Nissan Promo April\" title=\"Nissan Promo April\" data-src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/nissan-april_dekstop.jpg\">
                    </a>
                </li>
                <li class=\"slide_2\" index=\"2\" style=\"margin-left: 0%;\">
                    <a class=\"gaevent\" href=\"http://www.rajamobil.com/jual/mobil/baru&#9;\" data-galabel=\"Upgrade Mobil\" data-gakategori=\"Homepage\" data-gaaction=\"Click-Banner-Hompage\" target=\"_blank\">
                        <img class=\"img-responsive\" src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/web-upgrade_dekstop-1_dekstop.jpg\" alt=\"Upgrade Mobil\" title=\"Upgrade Mobil\" data-src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/web-upgrade_dekstop-1_dekstop.jpg\">
                    </a>
                </li>
                <li class=\"slide_3\" index=\"3\" style=\"margin-left: 0%;\">
                    <a class=\"gaevent\" href=\"http://www.rajamobil.com/jual/mobil/baru&#9;\" data-galabel=\"Waktunya\" data-gakategori=\"Homepage\" data-gaaction=\"Click-Banner-Hompage\" target=\"_blank\">
                        <img class=\"img-responsive\" src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/web-waktunya_dekstop.jpg\" alt=\"Waktunya\" title=\"Waktunya\" data-src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/web-waktunya_dekstop.jpg\">
                    </a>
                </li>
            </ul>
            <ul class=\"wrappper-billboard-indicator\" style=\"padding-left: 48%;\">
                <li class=\"indicator_0 active\" index=\"0\"></li>
                <li class=\"indicator_1\" index=\"1\"></li>
                <li class=\"indicator_2\" index=\"2\"></li>
                <li class=\"indicator_3\" index=\"3\"></li>
            </ul>
        </div>
        <!-- menu cari mobil -->
        <div class=\"container\">
            <div class=\"hidden hidden-sm hidden-xs\">
                <button class=\"btn btn-md btn-rm show-menu-search right\">Ganti Pencarian <i class=\"fa fa-chevron-down\"></i></button>
                <button class=\"btn btn-md btn-rm show-menu-search-btn right\">Ganti Pencarian <i class=\"fa fa-chevron-up\"></i></button>
            </div>
        </div>

        <input type=\"hidden\" id=\"tab_cari_ganti\" value=\"0\">

        <section id=\"menu-cari-mobil\" class=\"menu-cari-mobil  hidden-xs hidden-sm animated slideInUp\">
            <div class=\"container\">
                <div class=\"new-search-form\">
                    <ul class=\"nav nav-tabs \">
                        <li class=\"active\"><a data-toggle=\"tab\" href=\"#mobil-baru\" data-id=\"0\" class=\"ganti_data\">Mobil Baru</a></li>
                        <li><a data-toggle=\"tab\" href=\"#mobil-bekas\" data-id=\"1\" class=\"ganti_data\">Mobil Bekas</a></li>
                        <li><a data-toggle=\"tab\" href=\"#mobil-import\" data-id=\"2\" class=\"ganti_data\">Mobil Baru Importir Umum</a></li>
                    </ul>
                    <div class=\"tab-content\">
                        <div class=\"cari-header\">
                            <h1 title=\"Cari Promo Mobil Terbaik di Kota Anda\">Cari Promo Mobil Baru Terbaik di Kota Anda</h1>
                        </div>
                        <div id=\"mobil-baru\" class=\"tab-pane fade in active\">
                            <div class=\"mpencarian hidden-xs hidden-sm\">
                                <form id=\"carimobil-form\" action=\"/jual/cari-mobil-parse\" method=\"POST\">
                                    <input type=\"hidden\" name=\"_csrf\" value=\"#\">
                                    <div class=\"basic\">
                                        <div class=\"row-select left select-search\">
                                            <label for=\"berdasarkan\">Cari Berdasarkan</label>
                                            <select id=\"cariberdasarkan\" class=\"dropdown-list-sm icon-dropdown \" name=\"\">
                                                <option value=\"0\">Merek</option>
                                                <option value=\"1\">Harga</option>
                                            </select>
                                            <i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i>
                                            <div class=\"cleaner\"></div>
                                        </div>

                                        <div class=\"row-select left master-tooltips1 select-search\">
                                            <label for=\"berdasarkan\">Lokasi</label>
                                            <div id=\"pencarian\">
                                                <select class=\"chosen-select\" id=\"lokasi-baru\" name=\"lokasi\" style=\"vertical-align: middle; display: none;\"><option value=\"\">Semua lokasi</option><optgroup label=\"Kota Popular\"><option value=\"jadetabek\">Jadetabek</option><option value=\"jkt\">DKI Jakarta</option><option value=\"176\">Balikpapan</option><option value=\"195\">Bandar Lampung</option><option value=\"60\">Bandung</option><option value=\"109\">Banyuwangi</option><option value=\"189\">Batam</option><option value=\"189\">Batam</option><option value=\"7\">Bekasi</option><option value=\"9\">Bogor</option><option value=\"113\">Bojonegoro</option><option value=\"82\">Cilacap</option><option value=\"65\">Cirebon</option><option value=\"14\">Denpasar</option><option value=\"8\">Depok</option><option value=\"116\">Jember</option><option value=\"68\">Karawang</option><option value=\"118\">Kediri</option><option value=\"251\">Kupang</option><option value=\"303\">Makassar</option><option value=\"123\">Malang</option><option value=\"245\">Mataram</option><option value=\"373\">Medan</option><option value=\"344\">Padang</option><option value=\"172\">Palangkaraya</option><option value=\"361\">Palembang</option><option value=\"26\">Pangkal Pinang</option><option value=\"129\">Pasuruan</option><option value=\"286\">Pekan Baru</option><option value=\"144\">Pontianak</option><option value=\"99\">Semarang</option><option value=\"30\">Serang</option><option value=\"133\">Sidoarjo</option><option value=\"100\">Solo</option><option value=\"72\">Subang</option><option value=\"73\">Sukabumi</option><option value=\"136\">Surabaya</option><option value=\"6\">Tangerang</option><option value=\"475\">Tangerang Selatan</option><option value=\"75\">Tasikmalaya</option><option value=\"104\">Tegal</option><option value=\"138\">Tuban</option><option value=\"392\">Yogyakarta</option></optgroup></select>
                                                <div class=\"chosen-container chosen-container-single\" style=\"width: 210px; position: absolute; z-index: 3;\" title=\"\" id=\"lokasi_baru_chosen\"><a class=\"chosen-single\" tabindex=\"-1\"><span>Semua lokasi<i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i></span><div><b></b></div></a>
                                                    <div class=\"chosen-drop\">
                                                        <div class=\"chosen-search\"><input type=\"text\" autocomplete=\"off\"></div>
                                                        <ul class=\"chosen-results\"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=\"row-select left select-search\" id=\"select-merek\">
                                            <label for=\"merek\">Pilih Merek Mobil</label>
                                            <input type=\"text\" placeholder=\"Pilih Merek\" class=\"input-merek\" readonly=\"\">
                                            <input type=\"hidden\" name=\"merek\" id=\"merek-value\" value=\"\">
                                            <i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i>
                                            <div id=\"merek\"></div>
                                            <div id=\"show-merek\" class=\"list-harga\">
                                                <ul>
                                                    <li class=\"pick-merek-web\" data-merek=\"32\" data-tampil=\"TOYOTA\">TOYOTA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"15\" data-tampil=\"HONDA\">HONDA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"12\" data-tampil=\"DAIHATSU\">DAIHATSU</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"31\" data-tampil=\"SUZUKI\">SUZUKI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"26\" data-tampil=\"NISSAN\">NISSAN</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"25\" data-tampil=\"MITSUBISHI\">MITSUBISHI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"8\" data-tampil=\"AUDI\">AUDI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"9\" data-tampil=\"BMW\">BMW</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"11\" data-tampil=\"CHEVROLET\">CHEVROLET</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"63\" data-tampil=\"DATSUN\">DATSUN</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"94\" data-tampil=\"DFSK Sokon\">DFSK Sokon</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"62\" data-tampil=\"HINO\">HINO</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"16\" data-tampil=\"HYUNDAI\">HYUNDAI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"17\" data-tampil=\"ISUZU\">ISUZU</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"18\" data-tampil=\"JAGUAR\">JAGUAR</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"53\" data-tampil=\"JEEP\">JEEP</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"19\" data-tampil=\"KIA\">KIA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"21\" data-tampil=\"LAND ROVER\">LAND ROVER</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"22\" data-tampil=\"LEXUS\">LEXUS</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"23\" data-tampil=\"MAZDA\">MAZDA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"24\" data-tampil=\"MERCEDES BENZ\">MERCEDES BENZ</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"42\" data-tampil=\"MINI\">MINI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"29\" data-tampil=\"PROTON\">PROTON</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"48\" data-tampil=\"RENAULT\">RENAULT</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"76\" data-tampil=\"TATA\">TATA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"33\" data-tampil=\"VOLKSWAGEN\">VOLKSWAGEN</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"93\" data-tampil=\"WULING\">WULING</li>
                                                </ul>
                                            </div>
                                            <div class=\"cleaner\"></div>
                                        </div>

                                        <div class=\"row-select left  select-search\" id=\"select-model\">
                                            <label for=\"model\">Pilih Model Mobil</label>
                                            <input type=\"text\" placeholder=\" Models\" class=\"input-model\" readonly=\"\">
                                            <input type=\"hidden\" name=\"model\" id=\"model-value\" value=\"\">
                                            <i class=\"fa fa-chevron-down\" aria-hidden=\"true\" style=\"top:0;\"></i>
                                            <div id=\"show-model\" class=\"list-harga\"></div>
                                            <div class=\"cleaner\"></div>
                                        </div>

                                        <div class=\"row-select left select-search\" id=\"select-price\" style=\"display: none;\">
                                            <label for=\"berdasarkan\">Harga</label>
                                            <input type=\"text\" placeholder=\"Pilih Harga\" class=\"input-price\" readonly=\"\">
                                            <input type=\"hidden\" name=\"price_start\" id=\"inp-price-start\" value=\"\">
                                            <input type=\"hidden\" name=\"price_finish\" id=\"inp-price-finish\" value=\"\">
                                            <i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i>
                                            <div id=\"show-harga\" class=\"list-harga\">
                                                <ul>
                                                    <li class=\"pick-harga\" data-mulai=\"0\" data-sampai=\"99999999\" data-tampil=\"Dibawah harga Rp. 100juta\">
                                                        Dibawah harga Rp. 100juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"100000000\" data-sampai=\"149999999\" data-tampil=\"Dibawah harga Rp. 150juta\">
                                                        Dibawah harga Rp. 150juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"150000000\" data-sampai=\"199999999\" data-tampil=\"Dibawah harga Rp. 200juta\">
                                                        Dibawah harga Rp. 200juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"200000000\" data-sampai=\"400000000\" data-tampil=\"Rp. 200juta - Rp. 400juta\">
                                                        Rp. 200juta - Rp. 400juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"400000000\" data-sampai=\"800000000\" data-tampil=\"Rp. 400juta - Rp. 800juta\">
                                                        Rp. 400juta - Rp. 800juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"800000000\" data-sampai=\"1000000000\" data-tampil=\"Rp. 800juta - Rp. 1 Miliar\">
                                                        Rp. 800juta - Rp. 1 Miliar
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"1000000000\" data-sampai=\"1300000000\" data-tampil=\"Rp. 1 Miliar - Rp. 1,3 Miliar\">
                                                        Rp. 1 Miliar - Rp. 1,3 Miliar
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"1300000000\" data-sampai=\"1500000000\" data-tampil=\"Rp. 1,3 Miliar - Rp. 1,5 Miliar\">
                                                        Rp. 1,3 Miliar - Rp. 1,5 Miliar
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"1500000000\" data-sampai=\"200000000\" data-tampil=\"Rp. 1,5 Miliar - Rp. 2 Miliar\">
                                                        Rp. 1,5 Miliar - Rp. 2 Miliar
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class=\"cleaner\"></div>
                                        <input type=\"hidden\" id=\"cekkondisibaru\" value=\"0\" name=\"kondisikendaraan\">
                                        <input type=\"hidden\" id=\"merekname\" name=\"mrrk\">
                                        <input type=\"hidden\" id=\"modelname\" name=\"mdl_name\">
                                        <input type=\"hidden\" id=\"yearstart\" name=\"year_start\">
                                        <input type=\"hidden\" id=\"yearfinish\" name=\"year_finish\">
                                        <input type=\"hidden\" id=\"transmisi\" name=\"transmisi\">
                                        <input type=\"hidden\" id=\"warna\" name=\"warna\">
                                        <!--<input type=\"hidden\" id=\"lokasi-baru2\" name=\"lokasi\" />  -->
                                        <div class=\"button right\">
                                            <input type=\"submit\" id=\"submit-search\" name=\"submit\" value=\"Cari Mobil\"> </div>
                                    </div>
                                    <div class=\"cleaner\"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <a class=\"textboxx\">
                    <div class=\"textbox hidden-md hidden-lg\">
                        <label>Temukan mobil idaman anda</label>
                        <div class=\"textbox-search bgg\"></div>
                    </div>
                </a>
            </div>
        </section>
    </div>

    <!-- Menu Mobile View -->
    <div class=\"button-mm hidden-lg hidden-md\">
        <button class=\"hamburger hamburger--spin\" type=\"button\">
        <span class=\"hamburger-box\">
            <span class=\"hamburger-inner\"></span>
        </span>
    </button>
    </div>
    <div class=\"menu-samping hidden-lg hidden-md\">
        <div class=\"linkx left\">
            <a class=\"logo-side\" href=\"/\" data-galabel=\"click Logo Header\" data-gakategori=\"Global\" data-gaaction=\"Header Area\">
                <img src=\"/assets/images/logo/logo-mobile-slide.svg\" alt=\"logo rajamobil 2017\" title=\"logo rajamobil 2017\"></a>
            <ul class=\"beranda\">
                <li class=\"menu-beranda\"><a href=\"/\" title=\"Beranda\" class=\"gaevent\" data-galabel=\"Beranda\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Beranda</a></li>
            </ul>
            <hr class=\"menu-devider\">
            <ul class=\"lainnya\">
                <li class=\"cari-mobil-baru-action menu-mobil-baru chevron-right\"><a href=\"javascript:void(0)\" title=\"Cari Mobil Baru\" class=\"gaevent\" data-galabel=\"Cari Mobil Baru\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Cari Mobil Baru</a></li>
                <li class=\"cari-mobil-bekas-action menu-mobil-bekas chevron-right\"><a href=\"javascript:void(0)\" title=\"Cari Mobil Bekas\" class=\"gaevent\" data-galabel=\"Cari Mobil Bekas\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Cari Mobil Bekas</a></li>
                <li class=\"menu-review-mobil\"><a href=\"https://berita.rajamobil.com/\" title=\"Review Mobil\" class=\"gaevent\" data-galabel=\"Review Mobil\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Review Mobil</a></li>
                <li class=\"menu-jualan-mobilbaru\"><a href=\"https://my.rajamobil.com/#/home\" title=\"Berjualan Mobil Baru\" class=\"gaevent\" data-galabel=\"Berjualan Mobil Baru\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Berjualan Mobil Baru</a></li>
                <li class=\"menu-pasangiklan\"><a href=\"/pasangiklan\" title=\"Pasang Iklan Mobil Bekas\" class=\"gaevent\" data-galabel=\"Pasang Iklan Mobil Bekas\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Pasang Iklan Mobil Bekas</a></li>
            </ul>
            <hr class=\"menu-devider\">
            <ul class=\"lainnya\">
                <li class=\"menu-hubungi-kami\"><a href=\"/panduan/user\" title=\" Bantuan\" class=\"gaevent\" data-galabel=\" Bantuan\" data-gakategori=\"global\" data-gaaction=\"Header Area\"> Bantuan</a></li>
                <li class=\"menu-daftar\"><a href=\"https://my.rajamobil.com/#/daftarbaru\" title=\"Daftar\" class=\"gaevent\" data-galabel=\"Daftar\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Daftar</a></li>
                <li class=\"menu-masuk\"><a href=\"https://my.rajamobil.com/#/loginpage\" title=\"Masuk\" class=\"gaevent\" data-galabel=\"Masuk\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Masuk</a></li>
            </ul>
        </div>
        <div class=\"cleaner\"></div>
    </div>
    <div class=\"hidden-md hidden-lg\">
        <div class=\"carimobil-menu-samping\">
            <div class=\"header\">
                <i class=\"fa fa-times close-mmb\"> </i>
                <h1>Pilih Mobil Baru</h1>
            </div>
            <div class=\"content\">
                <span></span>
                <div id=\"show-merek-mobile\" class=\"lists\"></div>
            </div>
        </div>
        <div class=\"carimobil-model-mobile\">
            <div class=\"header\">
                <i class=\"fa fa-times close-mmb-model\"> </i>
                <h1>Pilih Mobil Baru</h1>
            </div>
            <div class=\"content\">
                <div class=\"backto-merek\">
                    <i class=\"fa fa-chevron-left\"> </i> Kembali ke Semua Merek
                </div>

                <div id=\"show-model-mobile\" class=\"lists\">
                    <span id=\"title-merek\"></span>
                </div>
            </div>
        </div>
    </div>

</header>
";
    }

    public function getTemplateName()
    {
        return "general/themes/header.twig";
    }

    public function getDebugInfo()
    {
        return array (  30 => 2,  24 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block header %}
<header>
    <div class=\"top-header hidden-xs hidden-sm\">
        <div class=\"container\">
            <ul class=\"hidden-sm hidden-xs\">
                <li><a href=\"/jual/mobil/baru\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-br\"></i>Promo Mobil Baru</a></li>
                <li><a href=\"/jual/mobil/bekas\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-bekas\"></i>Promo Mobil Bekas</a></li>
                <li><a href=\"https://my.rajamobil.com\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-jmb\"></i>Jualan Mobil Baru</a></li>
                <li><a href=\"/pasangiklan\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-ps\"></i>Pasang Iklan Mobil</a></li>
                <li><a href=\"http://berita.rajamobil.com\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-bm\"></i>Berita Mobil</a></li>
                <li class=\"act-tracking-buy\"><a href=\"#\" target=\"_blank\" rel=\"follow\"><i class=\"p-mobil-tp\"></i>Tracking Pembelian</a></li>
            </ul>
        </div>
    </div>

    <div id=\"head-tracker-buy\" class=\"floating-tracker hidden-sm hidden-xs\">
        <div class=\"arrow-up\"></div>
        <div class=\"content\">
            <p> Tracking Pembelian Mobil</p>
            <form id=\"tracking-form\" action=\"/sales/tracking\" method=\"get\">
                <input type=\"text\" name=\"tracking_code\" class=\"track-buy\" placeholder=\"Masukkan Kode Pesanan\" required=\"\">
                <input type=\"submit\" id=\"subscribe-btn\" class=\"btn btn-rm-sm\" value=\"Lihat\">
            </form>
        </div>
    </div>

    <!-- Main Menu Desktop View -->
    <div class=\"header-l2\">
        <div class=\"container pad-menu-top\">
            <div class=\"logo left\">
                <a class=\"gaevent\" href=\"/\" data-galabel=\"click Logo Header\" data-gakategori=\"Global\" data-gaaction=\"Header Area\">
                    <img src=\"/assets/images/logo/logo-rajamobil.png\" alt=\"Rajamobil\">
                </a>
            </div>

            <!-- Search Header -->
            <div class=\"search-header\">
                <select id=\"searchmobilheader\" class=\"minimal hidden-sm hidden-xs\" name=\"kondisikendaraan\">
                    <option value=\"0\" selected=\"\">Mobil Baru</option>
                </select>
                <div class=\"inner-addon right-addon\">
                    <i class=\"glyphicon glyphicon-search\"></i>
                    <input type=\"text\" class=\"top-search-action tsaw\" name=\"top-search\" value=\"\" maxlength=\"100\" placeholder=\"Temukan mobil idaman Anda\">
                </div>

                <div class=\"search-result hidden-xs hidden-sm\">
                    <div class=\"mobile-result\"> </div>
                    <div class=\"sales-result\"></div>
                    <div class=\"dealer-result\"></div>
                    <div class=\"cleaner\"></div>
                </div>
                <div class=\"cleaner\"></div>
            </div>

            <!-- Search Header -->
            <div id=\"morphsearch\" class=\"morphsearch\">
                <form class=\"morphsearch-form\">
                    <div class=\"arrow-left\">
                        <img src=\"data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDI2OC44MzMgMjY4LjgzMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjY4LjgzMyAyNjguODMzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTI1Ni4zMzMsMTIxLjkxNkg0Mi42NzlsNTguNjU5LTU4LjY2MWM0Ljg4Mi00Ljg4Miw0Ljg4Mi0xMi43OTYsMC0xNy42NzhjLTQuODgzLTQuODgxLTEyLjc5Ny00Ljg4MS0xNy42NzgsMGwtNzkuOTk4LDgwICAgYy00Ljg4Myw0Ljg4Mi00Ljg4MywxMi43OTYsMCwxNy42NzhsODAsODBjMi40MzksMi40MzksNS42NCwzLjY2MSw4LjgzOSwzLjY2MXM2LjM5Ny0xLjIyMiw4LjgzOS0zLjY2MSAgIGM0Ljg4Mi00Ljg4Miw0Ljg4Mi0xMi43OTYsMC0xNy42NzhsLTU4LjY2MS01OC42NjFoMjEzLjY1NGM2LjkwMywwLDEyLjUtNS41OTgsMTIuNS0xMi41ICAgQzI2OC44MzMsMTI3LjUxMywyNjMuMjM2LDEyMS45MTYsMjU2LjMzMywxMjEuOTE2eiIgZmlsbD0iIzAwMDAwMCIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=\">
                    </div>
                    <input class=\"morphsearch-input\" type=\"search\" placeholder=\"Cari mobil impian anda?\">
                </form>
                <div class=\"morphsearch-content\">
                    <ul class=\"search-type\">
                        <li class=\"active\" style=\"visibility: hidden\"><a data-toggle=\"pill\" href=\"#mobil-baru\" data-mobilid=\"1\">Mobil Baru</a></li>
                        <!-- <li><a data-toggle=\"pill\" href=\"#mobil-bekas\" data-mobilID=\"2\">Mobil Bekas</a></li>-->
                        <!-- <li><a data-toggle=\"pill\" href=\"#mobil-cbu\" data-mobilID=\"3\">Mobil Baru Importir Umum</a></li>-->
                    </ul>
                    <div class=\"tab-content\">
                        <div id=\"mobil-baru\" class=\"tab-pane fade in active\">
                            <div class=\"result-car-mob\"></div>
                            <div class=\"result-sales-mob\"></div>
                            <!-- <div class=\"result-dealer-mob\"></div> -->
                        </div>
                        <div id=\"mobil-bekas\" class=\"tab-pane fade\"></div>
                        <div id=\"mobil-cbu\" class=\"tab-pane fade\"></div>
                    </div>
                </div>
                <span class=\"morphsearch-close\"></span>
            </div>


            <div class=\"sudahlogin right hidden-sm hidden-xs\">
                <div class=\"sign-btn\">
                    <ul>
                        <li><a class=\"bnt\" href=\"/panduan/user\" title=\"bantuan panduan user\" target=\"_blank\"><i class=\"icon-bantuan\"></i>Bantuan</a> </li>
                        <li><a class=\"btn-white-sm\" href=\"https://my.rajamobil.com/#/loginpage\" title=\"masuk\" target=\"_blank\">Masuk</a> </li>
                        <li><a class=\"btn-rm-sm\" href=\"https://my.rajamobil.com/#/daftarbaru\" title=\"daftar\" target=\"_blank\">Daftar</a> </li>
                    </ul>
                </div>
            </div>
            <div class=\"cleaner\"></div>
        </div>
    </div>

    <!-- section untuk menampilkan form pencarian-->
    <div style=\"clear: both;\"></div>
    <div class=\"menu-content-pencarian open\" style=\"display: block;height: auto;\">
        <!-- banner slides homepage -->
        <div class=\"billboard-home\">
            <ul class=\"wrapper-billboard-home-list\">
                <li class=\"slide_0 active\" index=\"0\" style=\"margin-left: 0%;\">
                    <a class=\"gaevent\" href=\"https://www.datsun.co.id/mobil/mobil-baru/cross.html?utm_source=RAJAMOBIL&amp;utm_medium=BANNER_AD_1660X415&amp;utm_term=DATSUN&amp;utm_content=MAY_K2D&amp;utm_campaign=K2D_MAY2018\" data-galabel=\"Datsun Promo Mei\" data-gakategori=\"Homepage\"
                        data-gaaction=\"Click-Banner-Hompage\" target=\"_blank\">
                        <img class=\"img-responsive\" src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/-rajamobil_1660x415px_dekstop.jpg\" alt=\"Datsun Promo Mei\" title=\"Datsun Promo Mei\" data-src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/-rajamobil_1660x415px_dekstop.jpg\">
                    </a>
                </li>
                <li class=\"slide_1\" index=\"1\" style=\"margin-left: 0%;\">
                    <a class=\"gaevent\" href=\"https://nissanid.com/form-promo-nissan-funtastic-festival-rajamobil.html\" data-galabel=\"Nissan Promo April\" data-gakategori=\"Homepage\" data-gaaction=\"Click-Banner-Hompage\" target=\"_blank\">
                        <img class=\"img-responsive\" src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/nissan-april_dekstop.jpg\" alt=\"Nissan Promo April\" title=\"Nissan Promo April\" data-src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/nissan-april_dekstop.jpg\">
                    </a>
                </li>
                <li class=\"slide_2\" index=\"2\" style=\"margin-left: 0%;\">
                    <a class=\"gaevent\" href=\"http://www.rajamobil.com/jual/mobil/baru&#9;\" data-galabel=\"Upgrade Mobil\" data-gakategori=\"Homepage\" data-gaaction=\"Click-Banner-Hompage\" target=\"_blank\">
                        <img class=\"img-responsive\" src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/web-upgrade_dekstop-1_dekstop.jpg\" alt=\"Upgrade Mobil\" title=\"Upgrade Mobil\" data-src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/web-upgrade_dekstop-1_dekstop.jpg\">
                    </a>
                </li>
                <li class=\"slide_3\" index=\"3\" style=\"margin-left: 0%;\">
                    <a class=\"gaevent\" href=\"http://www.rajamobil.com/jual/mobil/baru&#9;\" data-galabel=\"Waktunya\" data-gakategori=\"Homepage\" data-gaaction=\"Click-Banner-Hompage\" target=\"_blank\">
                        <img class=\"img-responsive\" src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/web-waktunya_dekstop.jpg\" alt=\"Waktunya\" title=\"Waktunya\" data-src=\"https://static.rajamobil.com/resize/1440x360/media/images/banner/web-waktunya_dekstop.jpg\">
                    </a>
                </li>
            </ul>
            <ul class=\"wrappper-billboard-indicator\" style=\"padding-left: 48%;\">
                <li class=\"indicator_0 active\" index=\"0\"></li>
                <li class=\"indicator_1\" index=\"1\"></li>
                <li class=\"indicator_2\" index=\"2\"></li>
                <li class=\"indicator_3\" index=\"3\"></li>
            </ul>
        </div>
        <!-- menu cari mobil -->
        <div class=\"container\">
            <div class=\"hidden hidden-sm hidden-xs\">
                <button class=\"btn btn-md btn-rm show-menu-search right\">Ganti Pencarian <i class=\"fa fa-chevron-down\"></i></button>
                <button class=\"btn btn-md btn-rm show-menu-search-btn right\">Ganti Pencarian <i class=\"fa fa-chevron-up\"></i></button>
            </div>
        </div>

        <input type=\"hidden\" id=\"tab_cari_ganti\" value=\"0\">

        <section id=\"menu-cari-mobil\" class=\"menu-cari-mobil  hidden-xs hidden-sm animated slideInUp\">
            <div class=\"container\">
                <div class=\"new-search-form\">
                    <ul class=\"nav nav-tabs \">
                        <li class=\"active\"><a data-toggle=\"tab\" href=\"#mobil-baru\" data-id=\"0\" class=\"ganti_data\">Mobil Baru</a></li>
                        <li><a data-toggle=\"tab\" href=\"#mobil-bekas\" data-id=\"1\" class=\"ganti_data\">Mobil Bekas</a></li>
                        <li><a data-toggle=\"tab\" href=\"#mobil-import\" data-id=\"2\" class=\"ganti_data\">Mobil Baru Importir Umum</a></li>
                    </ul>
                    <div class=\"tab-content\">
                        <div class=\"cari-header\">
                            <h1 title=\"Cari Promo Mobil Terbaik di Kota Anda\">Cari Promo Mobil Baru Terbaik di Kota Anda</h1>
                        </div>
                        <div id=\"mobil-baru\" class=\"tab-pane fade in active\">
                            <div class=\"mpencarian hidden-xs hidden-sm\">
                                <form id=\"carimobil-form\" action=\"/jual/cari-mobil-parse\" method=\"POST\">
                                    <input type=\"hidden\" name=\"_csrf\" value=\"#\">
                                    <div class=\"basic\">
                                        <div class=\"row-select left select-search\">
                                            <label for=\"berdasarkan\">Cari Berdasarkan</label>
                                            <select id=\"cariberdasarkan\" class=\"dropdown-list-sm icon-dropdown \" name=\"\">
                                                <option value=\"0\">Merek</option>
                                                <option value=\"1\">Harga</option>
                                            </select>
                                            <i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i>
                                            <div class=\"cleaner\"></div>
                                        </div>

                                        <div class=\"row-select left master-tooltips1 select-search\">
                                            <label for=\"berdasarkan\">Lokasi</label>
                                            <div id=\"pencarian\">
                                                <select class=\"chosen-select\" id=\"lokasi-baru\" name=\"lokasi\" style=\"vertical-align: middle; display: none;\"><option value=\"\">Semua lokasi</option><optgroup label=\"Kota Popular\"><option value=\"jadetabek\">Jadetabek</option><option value=\"jkt\">DKI Jakarta</option><option value=\"176\">Balikpapan</option><option value=\"195\">Bandar Lampung</option><option value=\"60\">Bandung</option><option value=\"109\">Banyuwangi</option><option value=\"189\">Batam</option><option value=\"189\">Batam</option><option value=\"7\">Bekasi</option><option value=\"9\">Bogor</option><option value=\"113\">Bojonegoro</option><option value=\"82\">Cilacap</option><option value=\"65\">Cirebon</option><option value=\"14\">Denpasar</option><option value=\"8\">Depok</option><option value=\"116\">Jember</option><option value=\"68\">Karawang</option><option value=\"118\">Kediri</option><option value=\"251\">Kupang</option><option value=\"303\">Makassar</option><option value=\"123\">Malang</option><option value=\"245\">Mataram</option><option value=\"373\">Medan</option><option value=\"344\">Padang</option><option value=\"172\">Palangkaraya</option><option value=\"361\">Palembang</option><option value=\"26\">Pangkal Pinang</option><option value=\"129\">Pasuruan</option><option value=\"286\">Pekan Baru</option><option value=\"144\">Pontianak</option><option value=\"99\">Semarang</option><option value=\"30\">Serang</option><option value=\"133\">Sidoarjo</option><option value=\"100\">Solo</option><option value=\"72\">Subang</option><option value=\"73\">Sukabumi</option><option value=\"136\">Surabaya</option><option value=\"6\">Tangerang</option><option value=\"475\">Tangerang Selatan</option><option value=\"75\">Tasikmalaya</option><option value=\"104\">Tegal</option><option value=\"138\">Tuban</option><option value=\"392\">Yogyakarta</option></optgroup></select>
                                                <div class=\"chosen-container chosen-container-single\" style=\"width: 210px; position: absolute; z-index: 3;\" title=\"\" id=\"lokasi_baru_chosen\"><a class=\"chosen-single\" tabindex=\"-1\"><span>Semua lokasi<i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i></span><div><b></b></div></a>
                                                    <div class=\"chosen-drop\">
                                                        <div class=\"chosen-search\"><input type=\"text\" autocomplete=\"off\"></div>
                                                        <ul class=\"chosen-results\"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=\"row-select left select-search\" id=\"select-merek\">
                                            <label for=\"merek\">Pilih Merek Mobil</label>
                                            <input type=\"text\" placeholder=\"Pilih Merek\" class=\"input-merek\" readonly=\"\">
                                            <input type=\"hidden\" name=\"merek\" id=\"merek-value\" value=\"\">
                                            <i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i>
                                            <div id=\"merek\"></div>
                                            <div id=\"show-merek\" class=\"list-harga\">
                                                <ul>
                                                    <li class=\"pick-merek-web\" data-merek=\"32\" data-tampil=\"TOYOTA\">TOYOTA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"15\" data-tampil=\"HONDA\">HONDA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"12\" data-tampil=\"DAIHATSU\">DAIHATSU</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"31\" data-tampil=\"SUZUKI\">SUZUKI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"26\" data-tampil=\"NISSAN\">NISSAN</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"25\" data-tampil=\"MITSUBISHI\">MITSUBISHI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"8\" data-tampil=\"AUDI\">AUDI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"9\" data-tampil=\"BMW\">BMW</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"11\" data-tampil=\"CHEVROLET\">CHEVROLET</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"63\" data-tampil=\"DATSUN\">DATSUN</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"94\" data-tampil=\"DFSK Sokon\">DFSK Sokon</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"62\" data-tampil=\"HINO\">HINO</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"16\" data-tampil=\"HYUNDAI\">HYUNDAI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"17\" data-tampil=\"ISUZU\">ISUZU</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"18\" data-tampil=\"JAGUAR\">JAGUAR</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"53\" data-tampil=\"JEEP\">JEEP</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"19\" data-tampil=\"KIA\">KIA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"21\" data-tampil=\"LAND ROVER\">LAND ROVER</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"22\" data-tampil=\"LEXUS\">LEXUS</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"23\" data-tampil=\"MAZDA\">MAZDA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"24\" data-tampil=\"MERCEDES BENZ\">MERCEDES BENZ</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"42\" data-tampil=\"MINI\">MINI</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"29\" data-tampil=\"PROTON\">PROTON</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"48\" data-tampil=\"RENAULT\">RENAULT</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"76\" data-tampil=\"TATA\">TATA</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"33\" data-tampil=\"VOLKSWAGEN\">VOLKSWAGEN</li>
                                                    <li class=\"pick-merek-web\" data-merek=\"93\" data-tampil=\"WULING\">WULING</li>
                                                </ul>
                                            </div>
                                            <div class=\"cleaner\"></div>
                                        </div>

                                        <div class=\"row-select left  select-search\" id=\"select-model\">
                                            <label for=\"model\">Pilih Model Mobil</label>
                                            <input type=\"text\" placeholder=\" Models\" class=\"input-model\" readonly=\"\">
                                            <input type=\"hidden\" name=\"model\" id=\"model-value\" value=\"\">
                                            <i class=\"fa fa-chevron-down\" aria-hidden=\"true\" style=\"top:0;\"></i>
                                            <div id=\"show-model\" class=\"list-harga\"></div>
                                            <div class=\"cleaner\"></div>
                                        </div>

                                        <div class=\"row-select left select-search\" id=\"select-price\" style=\"display: none;\">
                                            <label for=\"berdasarkan\">Harga</label>
                                            <input type=\"text\" placeholder=\"Pilih Harga\" class=\"input-price\" readonly=\"\">
                                            <input type=\"hidden\" name=\"price_start\" id=\"inp-price-start\" value=\"\">
                                            <input type=\"hidden\" name=\"price_finish\" id=\"inp-price-finish\" value=\"\">
                                            <i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i>
                                            <div id=\"show-harga\" class=\"list-harga\">
                                                <ul>
                                                    <li class=\"pick-harga\" data-mulai=\"0\" data-sampai=\"99999999\" data-tampil=\"Dibawah harga Rp. 100juta\">
                                                        Dibawah harga Rp. 100juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"100000000\" data-sampai=\"149999999\" data-tampil=\"Dibawah harga Rp. 150juta\">
                                                        Dibawah harga Rp. 150juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"150000000\" data-sampai=\"199999999\" data-tampil=\"Dibawah harga Rp. 200juta\">
                                                        Dibawah harga Rp. 200juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"200000000\" data-sampai=\"400000000\" data-tampil=\"Rp. 200juta - Rp. 400juta\">
                                                        Rp. 200juta - Rp. 400juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"400000000\" data-sampai=\"800000000\" data-tampil=\"Rp. 400juta - Rp. 800juta\">
                                                        Rp. 400juta - Rp. 800juta
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"800000000\" data-sampai=\"1000000000\" data-tampil=\"Rp. 800juta - Rp. 1 Miliar\">
                                                        Rp. 800juta - Rp. 1 Miliar
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"1000000000\" data-sampai=\"1300000000\" data-tampil=\"Rp. 1 Miliar - Rp. 1,3 Miliar\">
                                                        Rp. 1 Miliar - Rp. 1,3 Miliar
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"1300000000\" data-sampai=\"1500000000\" data-tampil=\"Rp. 1,3 Miliar - Rp. 1,5 Miliar\">
                                                        Rp. 1,3 Miliar - Rp. 1,5 Miliar
                                                    </li>
                                                    <li class=\"pick-harga\" data-mulai=\"1500000000\" data-sampai=\"200000000\" data-tampil=\"Rp. 1,5 Miliar - Rp. 2 Miliar\">
                                                        Rp. 1,5 Miliar - Rp. 2 Miliar
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class=\"cleaner\"></div>
                                        <input type=\"hidden\" id=\"cekkondisibaru\" value=\"0\" name=\"kondisikendaraan\">
                                        <input type=\"hidden\" id=\"merekname\" name=\"mrrk\">
                                        <input type=\"hidden\" id=\"modelname\" name=\"mdl_name\">
                                        <input type=\"hidden\" id=\"yearstart\" name=\"year_start\">
                                        <input type=\"hidden\" id=\"yearfinish\" name=\"year_finish\">
                                        <input type=\"hidden\" id=\"transmisi\" name=\"transmisi\">
                                        <input type=\"hidden\" id=\"warna\" name=\"warna\">
                                        <!--<input type=\"hidden\" id=\"lokasi-baru2\" name=\"lokasi\" />  -->
                                        <div class=\"button right\">
                                            <input type=\"submit\" id=\"submit-search\" name=\"submit\" value=\"Cari Mobil\"> </div>
                                    </div>
                                    <div class=\"cleaner\"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <a class=\"textboxx\">
                    <div class=\"textbox hidden-md hidden-lg\">
                        <label>Temukan mobil idaman anda</label>
                        <div class=\"textbox-search bgg\"></div>
                    </div>
                </a>
            </div>
        </section>
    </div>

    <!-- Menu Mobile View -->
    <div class=\"button-mm hidden-lg hidden-md\">
        <button class=\"hamburger hamburger--spin\" type=\"button\">
        <span class=\"hamburger-box\">
            <span class=\"hamburger-inner\"></span>
        </span>
    </button>
    </div>
    <div class=\"menu-samping hidden-lg hidden-md\">
        <div class=\"linkx left\">
            <a class=\"logo-side\" href=\"/\" data-galabel=\"click Logo Header\" data-gakategori=\"Global\" data-gaaction=\"Header Area\">
                <img src=\"/assets/images/logo/logo-mobile-slide.svg\" alt=\"logo rajamobil 2017\" title=\"logo rajamobil 2017\"></a>
            <ul class=\"beranda\">
                <li class=\"menu-beranda\"><a href=\"/\" title=\"Beranda\" class=\"gaevent\" data-galabel=\"Beranda\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Beranda</a></li>
            </ul>
            <hr class=\"menu-devider\">
            <ul class=\"lainnya\">
                <li class=\"cari-mobil-baru-action menu-mobil-baru chevron-right\"><a href=\"javascript:void(0)\" title=\"Cari Mobil Baru\" class=\"gaevent\" data-galabel=\"Cari Mobil Baru\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Cari Mobil Baru</a></li>
                <li class=\"cari-mobil-bekas-action menu-mobil-bekas chevron-right\"><a href=\"javascript:void(0)\" title=\"Cari Mobil Bekas\" class=\"gaevent\" data-galabel=\"Cari Mobil Bekas\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Cari Mobil Bekas</a></li>
                <li class=\"menu-review-mobil\"><a href=\"https://berita.rajamobil.com/\" title=\"Review Mobil\" class=\"gaevent\" data-galabel=\"Review Mobil\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Review Mobil</a></li>
                <li class=\"menu-jualan-mobilbaru\"><a href=\"https://my.rajamobil.com/#/home\" title=\"Berjualan Mobil Baru\" class=\"gaevent\" data-galabel=\"Berjualan Mobil Baru\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Berjualan Mobil Baru</a></li>
                <li class=\"menu-pasangiklan\"><a href=\"/pasangiklan\" title=\"Pasang Iklan Mobil Bekas\" class=\"gaevent\" data-galabel=\"Pasang Iklan Mobil Bekas\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Pasang Iklan Mobil Bekas</a></li>
            </ul>
            <hr class=\"menu-devider\">
            <ul class=\"lainnya\">
                <li class=\"menu-hubungi-kami\"><a href=\"/panduan/user\" title=\" Bantuan\" class=\"gaevent\" data-galabel=\" Bantuan\" data-gakategori=\"global\" data-gaaction=\"Header Area\"> Bantuan</a></li>
                <li class=\"menu-daftar\"><a href=\"https://my.rajamobil.com/#/daftarbaru\" title=\"Daftar\" class=\"gaevent\" data-galabel=\"Daftar\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Daftar</a></li>
                <li class=\"menu-masuk\"><a href=\"https://my.rajamobil.com/#/loginpage\" title=\"Masuk\" class=\"gaevent\" data-galabel=\"Masuk\" data-gakategori=\"global\" data-gaaction=\"Header Area\">Masuk</a></li>
            </ul>
        </div>
        <div class=\"cleaner\"></div>
    </div>
    <div class=\"hidden-md hidden-lg\">
        <div class=\"carimobil-menu-samping\">
            <div class=\"header\">
                <i class=\"fa fa-times close-mmb\"> </i>
                <h1>Pilih Mobil Baru</h1>
            </div>
            <div class=\"content\">
                <span></span>
                <div id=\"show-merek-mobile\" class=\"lists\"></div>
            </div>
        </div>
        <div class=\"carimobil-model-mobile\">
            <div class=\"header\">
                <i class=\"fa fa-times close-mmb-model\"> </i>
                <h1>Pilih Mobil Baru</h1>
            </div>
            <div class=\"content\">
                <div class=\"backto-merek\">
                    <i class=\"fa fa-chevron-left\"> </i> Kembali ke Semua Merek
                </div>

                <div id=\"show-model-mobile\" class=\"lists\">
                    <span id=\"title-merek\"></span>
                </div>
            </div>
        </div>
    </div>

</header>
{% endblock %}", "general/themes/header.twig", "/Users/risdyanto/projects/ramo/rajamotor/application/general/themes/header.twig");
    }
}
