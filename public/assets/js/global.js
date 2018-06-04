/* -------------------------------------------------------------------/
 *  Rajamobil Global Script
 *  to add script globally, add object function within rajamobil object
 *---------------------------------------------------------------------*/
var ctrl = $('body').data('ctrl');
var rajamobil = {
    base_url: base_url,
    elem: {
        form_mrk_mobile_existed: false,
        form_mrk_web_existed: false
    },
    init: function() {

        this.chosen();
        this.new_menu_header_mobile();
        this.ga_onclick();
        this.getLocation();

        /*added by Aris*/
        this.new_popup_form_pencarian();
        this.new_footer_mobile_menu();
        this.new_search_form();
        this.close_body();
        this.getdatacars();
    },
    ga_onclick: function() {
        // page detail mobil baru
        $(document).on('click', '.pilihan-warna li', function(e) {
            var kategori = '';
            if ($(window).width() < 991) {
                kategori = 'Warna Mobile';
            } else {
                kategori = 'Warna Desktop';
            }

            var label = 'PILIH_WARNA_MOBIL_BARU_DETAIL';
            var action = 'Click';
            $.ajax({
                type: 'POST',
                url: base_url + '/site/trackga',
                data: {
                    label: label,
                    kategori: kategori,
                    action: action
                },
                beforeSend: function() {},
                success: function(data) {
                    $('head').append(data);
                },
                complete: function() {},
            });
        });
    },
    getLocation: function() {
        var url_domain_current = rajamobil.base_url + "/";
        var document_url = document.URL;
        if (document_url == url_domain_current) {
            if (navigator.geolocation) {
                if (rajamobil.getCookie("kota") == "") {
                    navigator.geolocation.getCurrentPosition(rajamobil.geoSuccess, rajamobil.geoError);
                }
            } else {
                console.log("Geolocation is not support by this browser");
            }
        }

        $('#home-label-baru').html("Promo Mobil Baru");
        var namakota = '';
        if (rajamobil.getCookie("kota-filter")) {
            namakota = rajamobil.uppercase(rajamobil.getCookie("kota-filter").replace('-', ' '));
            $('#home-label-baru').html("Promo Mobil Baru " + namakota);
        } else {
            if (rajamobil.getCookie("kota")) {
                namakota = rajamobil.getCookie("kota").charAt(0).toUpperCase() + rajamobil.getCookie("kota").substr(1);
                $('#home-label-baru').html("Promo Mobil Baru " + namakota.replace('-', ' '));
            }
        }

    },
    uppercase: function(str) {
        var splitStr = str.toLowerCase().split(' ');
        for (var i = 0; i < splitStr.length; i++) {
            splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);
        }
        return splitStr.join(' ');
    },
    geoSuccess: function(position) {
        var pos = position.coords.latitude + "," + position.coords.longitude;
        $.get("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + pos + "&sensor=true", function(data) {
            $.each(data.results[0].address_components, function(id, val) {
                //get province
                if (val.types[0] == 'administrative_area_level_1') {
                    var provinceName = val.short_name;
                    if (provinceName == 'Daerah Khusus Ibukota Jakarta') {
                        rajamobil.setCookie("province", 'Jakarta', 1);
                    } else {
                        rajamobil.setCookie("province", provinceName, 1);
                    }
                }

                if (val.types[0] == 'administrative_area_level_2') {
                    var cityName = val.short_name;

                    cityName = cityName.replace("Kota ", "");
                    cityName = cityName.toLowerCase(cityName);
                    if (cityName == 'jakarta utara' || cityName == 'jakarta timur' || cityName == 'jakarta barat' || cityName == 'jakarta pusat' || cityName == 'jakarta selatan') {
                        rajamobil.setCookie("kota", 'Jakarta', 1);
                    } else {
                        rajamobil.setCookie("kota", cityName, 1);
                    }
                    var url_domain = window.location.hostname;
                    $.ajax({
                        'url': rajamobil.base_url + '/site/getcityid',
                        'data': {
                            kota: cityName
                        },
                        'dataType': 'JSON',
                        success: function(data) {
                            if (cityName == 'jakarta utara' || cityName == 'jakarta timur' || cityName == 'jakarta barat' || cityName == 'jakarta pusat' || cityName == 'jakarta selatan') {
                                rajamobil.setCookie("geocityid", 'jkt', 1);
                            } else {
                                rajamobil.setCookie("geocityid", data.cityid, 1);
                            }
                            window.location.reload();
                        }
                    });
                }
            });
        });
    },
    geoError: function(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                //console.log("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                // console.log("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                console.log("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                console.log("An unknown error occurred.");
                break;
        }
    },
    setCookie: function(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    },
    getCookie: function(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    },
    sticky_textbox: function() {
        var menu = $(".textboxx"),
            pos = menu.offset(),
            btnMenuGroup = $(".btn-group-permintaan"),
            menucarimobil = $(".menu-cari-mobil");

        function sticky() {
            var width_browser = $(window).width();
            if ($(this).scrollTop() > 420 && $(this).scrollTop() > pos.top) {
                if (width_browser < 992) {
                    if (window.location.pathname == "/komparasi/mobil") {
                        return false;
                    }
                    menu.addClass("fixed");

                    if ($('.menu-content-pencarian-fix').text() != '') {
                        var clientHeight1 = document.getElementById('menu-cari-mobil').clientHeight,
                            heightnya1 = "-" + clientHeight1 + "px";

                        $(".menu-cari-mobil").css("margin-top", heightnya1);
                        $(".menu-cari-mobil").css("position", "relative");
                    }
                    if ($(this).scrollTop() > $(".header-l2").height()) {
                        btnMenuGroup.removeClass('remove');
                    } else {
                        btnMenuGroup.addClass('remove');
                    }
                } else {
                    menu.removeClass('fixed');
                    if ($('.menu-content-pencarian-fix').text() != '') {
                        var clientHeight2 = document.getElementById('menu-cari-mobil').clientHeight;
                        var heightnya2 = "-" + clientHeight2 + "px";
                        $(".menu-cari-mobil").css("margin-top", heightnya2);
                        $(".menu-cari-mobil").css("position", "relative");
                    }
                }
            } else if ($(this).scrollTop() <= pos.top) {
                menu.removeClass('fixed');
                if ($('.menu-content-pencarian-fix').text() != '') {
                    var clientHeight3 = document.getElementById('menu-cari-mobil').clientHeight,
                        heightnya3 = "-" + clientHeight3 + "px";

                    $(".menu-cari-mobil").css("margin-top", heightnya3);
                    $(".menu-cari-mobil").css("position", "relative");
                }
                btnMenuGroup.addClass('remove');
            }
            var foot = parseInt($('#page')[0].clientHeight) - (parseInt(menu[0].clientHeight) / 1.2);
            if ($(this).scrollTop() > foot) {
                var tinggi = parseInt(foot) - parseInt($(this).scrollTop());
                $('.fixed').css('top', tinggi);
                $('.fixed').css('margin-left', 0);
                $('.btn-group-permintaan').css('top', tinggi + 0);
            } else {
                $('.fixed').css('top', 0);
                $('.fixed').css('margin-left', 0);
                $('.btn-group-permintaan').css('top', 0);
            }
        }
        $(window).scroll(sticky);
        $(window).resize(sticky);
    },
    search_processing: function(val) {

        rajamobil.new_ajaxify_html({
            key: val
        }, base_url + '/site/topsearch', ).done(function(res) {
            if (isMobile) {
                show_result_on_mobile(JSON.parse(res));
            } else {
                show_result_on_desktop(JSON.parse(res));
            }
        });

        function show_result_on_desktop(val) {
            var car = val.data.car,
                sales = val.data.sales,
                dealer = val.data.dealer,
                search_node = $('.search-result').find('.mobile-result'),
                search_node_sls = $('.search-result').find('.sales-result'),
                search_dealer = $('.search-result').find('.dealer-result'),
                mob_res = search_node.find('.cont-search'),
                sls_res = search_node_sls.find('.cont-sales'),
                del_res = search_dealer.find('.cont-dealer');

            if (mob_res.length >= 1) mob_res.remove();
            if (sls_res.length >= 1) sls_res.remove();
            if (del_res.length >= 1) del_res.remove();

            if (val.data !== [] && typeof car !== undefined) {
                var theme = "<div class=\"cont-search\"><p>Pencarian Mobil Baru</p>";
                theme += "<ul class=\"mob-res\">";

                for (var i = 0; i < car.length; i++) {
                    theme += "<li><a href=\"" + car[i].url + "\" target=\"_blank\">" +
                        "<img src=\"https://imgcdn.rajamobil.com/resize2/public/media/images/databasemobil/mobilbaru/color/" + car[i].image + "?v=50\" alt=\"" + car[i].merek_name + "\">" +
                        "" + car[i].merek_name + ' ' + car[i].model_name + "<span class=\"harga\">Rp. " + car[i].harga + "</span>" +
                        "</a>" +
                        "</li>";
                }
                theme += "</ul></div>";

                var sales_theme = "<div class=\"cont-sales\"><p>Sales Authorized</p>" +
                    "<ul class=\"sal-res\">";

                for (var i = 0; i < sales.length; i++) {
                    var imge = (sales[i].img !== "") ? "https://imgcdn.rajamobil.com/resize2/public/media/images/clients/original/" + sales[i].img : "themes/rmperjuangan/images/bg/salesman.svg";
                    sales_theme += "<li><a href=\"" + sales[i].url + "\" target=\"_blank\">" +
                        "<img src=\"" + imge + "\" alt=\"" + sales[i].fullname + "\">" +
                        "<span>" + sales[i].fullname + "</span>" +
                        "</a></li>";
                }

                sales_theme += "</ul></div>";

                var dealer_theme = "<div class=\"cont-dealer\"><p>Dealer Authorized</p>" +
                    "<ul class=\"del-res\">";

                for (var i = 0; i < dealer.length; i++) {
                    dealer_theme += "<li><a href=\"" + dealer[i].url + "\" target=\"_blank\">" +
                        "<img src=\"themes/rmperjuangan/images/new-home/no-person.png\" alt=\"" + dealer[i].dealer_name + "\">" +
                        "<span>" + dealer[i].dealer_name + "</span>" +
                        "</a></li>";
                }

                dealer_theme += "</ul></div>";
                search_node.append(theme);
                search_node_sls.append(sales_theme);
                search_dealer.append(dealer_theme);
            }
        }

        function show_result_on_mobile(val) {

            var car = val.data.car,
                sales = val.data.sales,
                dealer = val.data.dealer,
                result_car = $('#mobil-baru').find('.result-car-mob'),
                result_sales = $('#mobil-baru').find('.result-sales-mob'),
                result_dealer = $('#mobil-baru').find('.result-dealer-mob'),
                car_res = result_car.find('.res-sc-mobil'),
                sales_res = result_sales.find('.res-sc-sales'),
                dealer_res = result_dealer.find('.res-sc-dealer');

            if (car_res.length >= 1) car_res.remove();
            if (sales_res.length >= 1) sales_res.remove();
            if (dealer_res.length >= 1) dealer_res.remove();

            if (val.data !== [] && typeof car !== undefined) {

                var theme = "<div class=\"res-sc-mobil\"><small>Pencarian Mobil Baru</small>";
                theme += "<ul class=\"listmobile\">";

                for (var i = 0; i < car.length; i++) {
                    theme += "<li><a href=\"" + car[i].url + "\" target=\"_blank\">" +
                        "<img src=\"https://imgcdn.rajamobil.com/resize2/public/media/images/databasemobil/mobilbaru/color/" + car[i].image + "?v=50\" alt=\"" + car[i].merek_name + "\">" +
                        "" + car[i].merek_name + ' ' + car[i].model_name + "<span class=\"harga\">Rp. " + car[i].harga + "</span>" +
                        "</a>" +
                        "</li>";
                }
                theme += "</ul></div>";

                var sales_theme = "<div class=\"res-sc-sales\"><small>Sales Authorized</small>" +
                    "<ul class=\"listsales\">";
                for (var i = 0; i < sales.length; i++) {
                    var imge = (sales[i].img !== "") ? "https://imgcdn.rajamobil.com/resize2/public/media/images/clients/original/" + sales[i].img : "http://rajamobil.dev/themes/rmperjuangan/images/bg/salesman.svg";
                    sales_theme += "<li><a href=\"" + sales[i].url + "\" target=\"_blank\">" +
                        "<img src=\"" + imge + "\" alt=\"" + sales[i].fullname + "\">" + sales[i].fullname +
                        "</a></li>";
                }
                sales_theme += "</ul></div>";

                // var dealer_theme = "<div class=\"res-sc-dealer\"><small>Dealer Authorized</small>" +
                //     "<ul class=\"listdealer\">";
                // for (var i = 0; i < dealer.length; i++) {
                //     dealer_theme += "<li><a href=\"#\" target=\"_blank\">" +
                //         "<img src=\"http://rajamobil.dev/themes/rmperjuangan/images/new-home/no-person.png\" alt=\"" + dealer[i].dealer_name + "\">" +
                //         dealer[i].dealer_name +
                //         "</a></li>";
                // }
                // dealer_theme += "</ul></div>";

                result_car.append(theme);
                result_sales.append(sales_theme);
                //result_dealer.append(dealer_theme);
            }


        }
    },
    new_popup_form_pencarian: function() {

        /* Event for top search menu New Header 
         * added by : Risdyanto Kurniawan
         * date : Monday, 11 September 20179
         */

        var elem = $('.top-header');

        if (elem.length > 0) {
            var ev_form_search = $('.tsaw'),
                cont_search = $('.search-result');

            ev_form_search.on('click', function(e) {
                e.preventDefault();
                cont_search.toggle();
                e.stopPropagation();
            });

            ev_form_search.on('keyup', function() {
                if (!cont_search.is(':visible')) {
                    cont_search.toggle();
                }
                rajamobil.search_processing($(this).val());
            });

            var morphSearch = document.getElementById('morphsearch'),
                input_2 = morphSearch.querySelector('input.morphsearch-input'),
                input = document.querySelector('input.top-search-action'),
                ctrlClose = morphSearch.querySelector('span.morphsearch-close'),
                btnmm = document.querySelector('.button-mm'),
                isOpen = isAnimating = false,

                toggleSearch = function(evt) {

                    if (evt.type.toLowerCase() === 'focus' && isOpen) return false;

                    var offsets = morphsearch.getBoundingClientRect();
                    if (isOpen) {
                        classie.remove(morphSearch, 'open');
                        if (input_2.value !== '') {
                            setTimeout(function() {
                                classie.add(morphSearch, 'hideInput');
                                setTimeout(function() {
                                    classie.remove(morphSearch, 'hideInput');
                                    input_2.value = '';
                                }, 300);
                            }, 500);
                        }

                        input_2.blur();
                        btnmm.style.position = "fixed";
                        btnmm.style.zIndex = "669";
                    } else {
                        classie.add(morphSearch, 'open');
                        setTimeout(function() {
                            btnmm.style.position = "absolute";
                            btnmm.style.zIndex = "0";
                        }, 200);
                        input_2.focus();
                    }
                    isOpen = !isOpen;
                };

            input.addEventListener('focus', toggleSearch);
            ctrlClose.addEventListener('click', toggleSearch);

            input_2.onkeyup = function(e) {
                    rajamobil.search_processing(e.target.value);
                }
                // esc key closes search overlay
                // keyboard navigation events
            document.addEventListener('keydown', function(ev) {
                var keyCode = ev.keyCode || ev.which;
                if (keyCode === 27 && isOpen) {
                    toggleSearch(ev);
                }
            });

            /***** for demo purposes only: don't allow to submit the form *****/
            //morphSearch.querySelector('button[type="submit"]').addEventListener('click', function(ev) { ev.preventDefault(); });
        }


    },
    cek_user_cookie: function() {
        // Karena cache page
        // script ini digunakan untuk menampilkan nama user yg sudah login di header
        // console.log(document.cookie);
        var re = new RegExp('cookie_rajamobil' + "=([^;]+)");
        var value = re.exec(document.cookie);
        if (value != null) {
            $.ajax({
                url: rajamobil.base_url + '/auth/userx',
                dataType: 'html',
                beforeSend: function(send) {
                    // $('.header-topnav .userx').html("<img src='" + rajamobil.base_url + "/themes/rmperjuangan/images/loadingbar/subscribe.gif') . ' /> Loading User ..");
                },
                success: function(data) {

                    $('.header-topnav .userx').html(data);
                    $('.daftarlogin').remove();
                },
                complete: function(lengkap) {

                },
            });
        } else {
            $('.daftarlogin').fadeIn(500);
        }
    },
    chosen: function() {
        $(".chosen-select").chosen();
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {
                allow_single_deselect: true
            },
            '.chosen-select-no-single': {
                disable_search_threshold: 10
            },
            '.chosen-select-no-results': {
                no_results_text: 'Oops, nothing found!'
            },
            '.chosen-select-width': {
                width: "95%"
            }
        };
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
        $('.basic .chosen-container').css({
            "position": "absolute",
            "width": "210px",
            "z-index": "3"
        });
        $('.field-client-lokasi_dealer .chosen-container').css({
            "position": "absolute",
            "width": "431px"
        });
        $('#prospek-form .chosen-container').css({
            "position": "relative",
            "width": "444px"
        });
    },
    after_load_page: function() {
        $(window).on("load", function() {
            var urlcurrent = window.location.href,
                kondisi;
            if (urlcurrent.match(/bekas.*/g)) {
                kondisi = 1;
            } else if (urlcurrent.match(/baru-importir-umum.*/g)) {
                kondisi = 2;
            } else {
                kondisi = 0;
            }

            // get merek
            var lokasi = rajamobil.getQueryVariable("kota");
            if (lokasi != false) {
                lokasi = lokasi;
            } else {
                lokasi = '';
            }

            rajamobil.setJakarta(kondisi);
        });

    },
    getIdKotaPopuler: function(variable) {
        var kota_populer = {
            jadetabek: "1,2,3,4,5,6,7,8",
            jkt: "1,2,3,4,5",
            bgr: "9",
            tgr: "6",
            bks: "7",
            bdg: "60",
            yog: "388,391,392",
            sby: "133,136",
            mdn: "373",
        };
        return kota_populer['' + variable + ''];
    },
    getNameKotaPopuler: function(variable) {
        var kota_populer = {
            '1-2-3-4-5-6-7-8-9': 'jadetabek',
            '1-2-3-4-5': 'jkt',
            '9': 'bgr',
            '6': 'tgr',
            '7': 'bks',
            '60': 'bdg',
            '388-391-392': 'yog',
            '133-136': 'sby',
            '373': 'mdn',
        };
        return kota_populer['' + variable + ''];
    },
    getQueryVariable: function(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return (false);
    },
    setJakarta: function(kondisi) {

        var kota = rajamobil.getQueryVariable("lokasi"),
            idkota = rajamobil.getCookie("idkota-filter"),
            geocity = rajamobil.getCookie("geocityid");

        if (kota === '') {
            $('.basic a.chosen-single span').text('Lokasi');
            $('.basic a.chosen-single span').css('color', '#585858');
            $('.basic .chosen-container').css({
                "pointer-events": ""
            });

            /* just added by Risdyanto, to show icon chevron-down*/
            $('.basic a.chosen-single span').append('<i class="fa fa-chevron-down" aria-hidden="true"></i>');
        }

        //jika user menyetujui untuk share location
        if (geocity != '' || idkota != '') {
            /*comment to set statis_kota, uncomment to set dinamis_kota di fungsi setJakarta ini
            set kota di form pencarian*/

            if (kondisi == 1 || kondisi == 2) {
                if (idkota) {
                    /*set kota di form pencarian saat cr mobil bekas*/
                    document.getElementById('lokasi-baru').value = idkota;
                    $('#lokasi-baru').trigger('chosen:updated');
                    $("#lokasi-selected").val(idkota);
                } else {
                    /*set kota di form pencarian saat menggunakan geolocation*/
                    document.getElementById('lokasi-baru').value = geocity;
                    $('#lokasi-baru').trigger('chosen:updated');
                    $("#lokasi-selected").val(geocity);
                }
            } else {
                if (idkota) {

                    var lokasi = $('#lokasi-baru');
                    lokasi.val(idkota);
                    lokasi.trigger('chosen:updated');
                    $("#lokasi-selected").val(idkota);
                } else {
                    var lokasi = $('#lokasi-baru');
                    lokasi.val('jkt');
                    lokasi.trigger('chosen:updated');
                    $("#lokasi-selected").val('jkt');
                }
            }

            /*set kota di form header detail mobil baru*/
            var cookie_kotanya = '';
            if (rajamobil.getCookie("kota-filter")) {
                cookie_kotanya = rajamobil.getCookie("kota-filter");
            } else {
                cookie_kotanya = rajamobil.getCookie("kota");
            }

            /*set kota di form penawaran*/
            var cookie_kotaid = '',
                parentcity = '';

            if (rajamobil.getCookie("idkota-filter")) {
                cookie_kotaid = rajamobil.getCookie("idkota-filter");
                parentcity = rajamobil.getCookie("province-filter").replace('+', ' ');
            } else if (rajamobil.getCookie("geocityid")) {
                cookie_kotaid = rajamobil.getCookie("geocityid");
                parentcity = rajamobil.getCookie("province").replace('+', ' ');
            } else {
                cookie_kotaid = 1;
                parentcity = 'Jakarta';
            }

            var selectkota = $("#permintaan-id_city optgroup[label='" + parentcity + "'] option[value='" + cookie_kotaid + "']");
            selectkota.prop('selected', true);

            /*set kota di form header detail mobil baru*/
            var selectkotaheader = $("#provincedetail optgroup[label='" + parentcity + "'] option[value='" + cookie_kotaid + "']");
            selectkotaheader.prop('selected', true);
        }
    },
    get_merek: function(lokasi, kondisi, foruse) {
        /* ---------------------------------- 
        * new get merek logic
        * refactored by : Risdyanto Kurniawan
        * date: 12 September 2017
        * date modified ; 23 May 2018
        -----------------------------------*/

        var tab = $("#cekkondisibaru").val(),
            csrf_token = $("input[name=csrf_token]"),
            merekstored = rajamobil.storageManagement.getdata('merek'),
            kategori = 'motor';

        if (tab == '0') {
            axios.post('/ajax/get-merek-baru', {
                    csrf_token: csrf_token.val(),
                    kategori: kategori
                })
                .then(function(response) {
                    //rajamobil.set_merek(JSON.parse(response), foruse, kondisi);
                    //rajamobil.storageManagement.create('merek', response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        } else {
            axios.post('/ajax/get-merek-bekas', {
                    csrf_token: csrf_token.val(),
                })
                .then(function(response) {

                    rajamobil.set_merek(JSON.parse(response), foruse, kondisi);
                    rajamobil.storageManagement.create('merek', response);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

    },
    set_merek: function(params, use, kondisi) {
        switch (use) {
            case 1:
                var element = "<ul>";
                for (let i = 0, len = params.length; i < len; i++) {
                    element += "<li class=\"pick-merek-web\" data-merek=\"" + params[i].id + "\"  data-tampil=\"" + params[i].name + "\">" + params[i].name + "</li>";
                }
                element += "</ul>";
                rajamobil.new_carimobil_merek_web(element);
                break;
            case 2:
                var element = "<ul id=\"list-merek-mobil\">";
                for (let i = 0, len = params.length; i < len; i++) {
                    element += "<li class=\"pick-merek-mob\" data-merek=\"" + params[i].id + "\"  data-tampil=\"" + params[i].name + "\">" + params[i].name + "<i class=\"fa fa-chevron-right\"> </i></li>";
                }
                element += "</ul>";
                rajamobil.new_carimobil_merek_mob(element, kondisi);
                break;
            default:
                break;
        }
    },
    set_model: function(foruse, params, merekid, namamerek) {
        var kondisi = $('#cekkondisibaru').val();
        switch (foruse) {
            case 1:
                var element = "<ul id=\"list-model-web\">";
                for (let i = 0, len = params.length; i < len; i++) {
                    if (parseInt(params[i].merek) === parseInt(merekid) && params[i].name !== null) {
                        element += "<li class=\"pick-model\" data-model=\"" + params[i].model + "\"  data-tampil=\"" + params[i].name + "\">" + params[i].name + "</li>";
                    }
                }
                element += "</ul>";
                rajamobil.new_list_model_web(element, kondisi, merekid, namamerek);
                break;

            case 2:
                var element = "<ul id=\"list-model-mobil\">";
                for (let i = 0, len = params.length; i < len; i++) {
                    if (parseInt(params[i].merek) === parseInt(merekid) && params[i].name !== null) {
                        element += "<li class=\"pick-model-mob\" data-model=\"" + params[i].model + "\"  data-tampil=\"" + params[i].name + "\">" + params[i].name + "<i class=\"fa fa-chevron-right\"></i>";
                    }
                }
                element += "</ul>";
                rajamobil.new_list_model_mob(element, kondisi, merekid, namamerek);
                break;
            default:
                break;
        }
    },
    new_ajaxify_html: function(data, url) {
        /* -------------------------------------
         * New Ajax for generic purpose data call
         * added by : Risdyanto Kurniawan
         * date : 12 September 2017
         * ---------------------------------------*/

        return $.ajax({
            url: url,
            dataType: "html",
            type: "POST",
            data: data
        });
    },
    new_ajaxify_json: function(data, url) {
        /* -------------------------------------
         * New Ajax for generic purpose data call
         * added by : Risdyanto Kurniawan
         * date : 12 September 2017
         * ---------------------------------------*/

        return $.ajax({
            url: url,
            dataType: "json",
            type: "POST",
            data: data
        });
    },
    selected_lokasi_baru: function() {
        var urlcurrent = window.location.href;
        if (urlcurrent.match(/baru.*/g)) {
            var lokasi = rajamobil.getQueryVariable("kota");
            //rajamobil.get_merek(lokasi);
        }
    },
    selected_tipe: function(tipe) {
        tipe = tipe.split("-");
        for (i = 0; i < tipe.length; i++) {
            $('div[id=model] input[name="tipe[]"][value=' + tipe[i] + ']').prop('selected', true);
        }
    },
    new_searching: function(kondisi, merekid, modelid, merekname, modelname) {
        //new_searching: function(data) {

        /* -------------------------------------
         * New Ajax for searching new cars
         * added by : Risdyanto Kurniawan
         * date : 13 September 2017
         * ---------------------------------------*/
        var csrfToken = $("meta[name='csrf-token']").attr('content');
        rajamobil.new_ajaxify_html({
            kondisikendaraan: kondisi,
            merek: merekid,
            model: modelid,
            mrrk: merekname,
            mdl_name: modelname,
            price_start: '',
            price_finish: '',
            year_start: '',
            year_finish: '',
            transmisi: '',
            warna: '',
            _csrf: csrfToken
        }, base_url + '/jual/cari-mobil-parse').done(function(res) {
            // console.log(res)
        });
    },
    new_get_model: function(merekid, lokasi, foruse, namamerek) {

        /* -------------------------------------
         * New Ajax for get car model
         * added by : Risdyanto Kurniawan
         * date : 13 September 2017
         * ---------------------------------------*/

        var csrfToken = $("meta[name='csrf-token']").attr('content'),
            modelstored = rajamobil.storageManagement.getdata('models');

        var tab = $("#tab_cari_ganti").val();

        if (tab == '0') {
            if (modelstored === null) {
                rajamobil.new_ajaxify_html({
                    _csrf: csrfToken
                }, rajamobil.base_url + '/site/getmodelbyid').done(function(res) {
                    rajamobil.storageManagement.create('models', res);
                    //home.setdefaultmodel(JSON.parse(res), 32), 'TOYOTA';
                    rajamobil.set_model(foruse, JSON.parse(res), merekid, namamerek);
                });

            } else {
                //home.setdefaultmodel(JSON.parse(modelstored), 32, 'TOYOTA');
                rajamobil.set_model(foruse, JSON.parse(modelstored), merekid, namamerek);
                return false;
            }
        } else {
            rajamobil.new_ajaxify_html({
                _csrf: csrfToken
            }, rajamobil.base_url + '/site/getmodelall').done(function(res) {
                //rajamobil.storageManagement.create('models', res);
                console.log(res);
                rajamobil.set_model(foruse, JSON.parse(res), merekid, namamerek);
            });
        }
    },
    pen_video: function() {
        var pathname = window.location.pathname.substring(1);
        if (pathname != '') {
            $('.mpecarian-video').remove();
            var today = new Date();
            var month = today.getMonth();
        }
    },
    new_list_model_mob: function(data, kondisi, merekid, merekname) {
        /* -------------------------------------
         * Jquery actions for searching car model
         * added by : Risdyanto Kurniawan
         * date : 13 September 2017
         * ---------------------------------------*/
        var el = $(data),
            pick_model = el.find('.pick-model-mob'),
            elem = $('#show-model-mobile'),
            close_form_model = $('.close-mmb-model'),
            form_cari_model = $('.carimobil-model-mobile'),
            list_model = $("#show-model-mobile"),
            backto_merek = $(".backto-merek"),
            form_cari_merek = $('.carimobil-menu-samping'),
            list_merek = $("#show-merek-mobile"),
            kondisi_saved = rajamobil.storageManagement.getdata('kondisi'),
            cek_kondisi = $('#cekkondisibaru');


        if (kondisi_saved === null) {
            cek_kondisi.val(0);
            rajamobil.setJakarta(0);
        } else {
            cek_kondisi.val(kondisi_saved);
            rajamobil.setJakarta(kondisi_saved);
        }

        pick_model.click(function(e) {
            e.preventDefault();
            var link = $(this),
                modelid = link.data('model'),
                modelname = link.data("tampil");
            rajamobil.new_searching(kondisi_saved, merekid, modelid, merekname, modelname);
        });

        elem.append(el);

        close_form_model.click(function(e) {
            e.preventDefault();
            form_cari_model.removeClass('carimobil-model-mobile-open');
            form_cari_model.css('right', '100%');
            list_model.hide();
            el.remove();
        });

        backto_merek.click(function(e) {
            e.preventDefault();
            form_cari_model.removeClass('carimobil-model-mobile-open');
            form_cari_model.css('right', '100%');
            list_model.hide();
            el.remove();

            form_cari_merek.addClass('carimobil-menu-samping-open');
            form_cari_merek.css('left', '0');
            list_merek.show('500');
        });
    },
    new_carimobil_merek_web: function(data) {
        var el = $(data),
            pick_merek = el.find('.pick-merek-web'),
            elem = $("#show-merek"),
            merek_val = $('#merek-value'),
            input_merek = $('.input-merek'),
            elemodel = $('#show-model'),
            $element = "";

        pick_merek.on("click", function(e) {
            e.preventDefault();
            var link = $(this),
                merek = link.data("merek"),
                namamerek = link.data("tampil");
            elem.removeClass('lh-open');
            merek_val.val(merek);
            input_merek.val(namamerek);
            $('#merekname').val(namamerek);
            rajamobil.new_get_model(merek, 1, 1, namamerek);


            //rajamobil.setCookie("merekid", merek, 1);

            rajamobil.storageManagement.create('merek_selected', JSON.stringify({
                "merek_val": merek,
                "merek_name": namamerek
            }));

            elemodel.addClass('lh-open');
        });
        elem.html('');
        elem.append(el);
    },
    new_list_model_web: function(data, kondisi, merekid, namamerek) {

        var el = $(data),
            form_select = $('.mpencarian .selectmodel'),
            elem = $('#show-model'),
            input_model = $('.input-model'),
            pick_model = el.find('.pick-model'),
            model_val = $('#model-value'),
            list_model = $('#list-model-web'),
            merek_name = $('#merekname'),
            model_name = $('#modelname');

        list_model.remove();
        form_select.css('border-bottom', 'none');

        input_model.click(function(e) {
            e.preventDefault();
            elem.addClass('lh-open');
            e.stopPropagation();
        });

        elem.append(el);

        pick_model.click(function(e) {

            var el = $(this),
                modelid = el.data("model"),
                modelname = el.data("tampil");

            elem.removeClass('lh-open');
            model_val.val(modelid);
            input_model.val(modelname);
            merek_name.val(namamerek);
            model_name.val(modelname);
            //rajamobil.setCookie("modelid", modelid, 1);
            //rajamobil.setCookie("modelname", modelname, 1);
            //rajamobil.setCookie("merekname", namamerek, 1);

            rajamobil.storageManagement.create('model_selected', JSON.stringify({
                "modelid": merekid,
                "modelname": modelname
            }));
            //rajamobil.new_searching(kondisi, merekid, modelid, merekname, modelname);
        });
    },
    new_carimobil_merek_mob: function(data, kondisi) {
        /* -------------------------------------
         * Jquery Actions for searching merek
         * added by : Risdyanto Kurniawan
         * date : 13 September 2017
         * ---------------------------------------*/
        var el = $(data),

            pick_merek = el.find('.pick-merek-mob'),
            elem = $("#show-merek-mobile"),
            list_model = $("#show-model-mobile"),
            list_merek = $("#show-merek-mobile"),
            merek_title = $('#title-merek'),
            form_cari_merek = $('.carimobil-menu-samping'),
            form_cari_model = $('.carimobil-model-mobile');

        pick_merek.on("click", function(e) {

            e.preventDefault();
            var link = $(this),
                merek = link.data("merek"),
                namamerek = link.data("tampil");

            rajamobil.new_get_model(merek, 1, 2, namamerek);
            form_cari_model.addClass('.carimobil-model-mobile-open');
            form_cari_model.css('right', '0');
            list_model.show('500');
            list_merek.hide();
            merek_title.text('Semua Model ' + namamerek);
            form_cari_merek.removeClass('carimobil-menu-samping-open');
            form_cari_merek.css('left', '100%');

        });

        elem.append(el);
    },
    new_menu_header_mobile: function() {

        /* -----------------------------------
         * New Mobile Header 
         * Refactored by Risdyanto Kurniawan
         * Date : Senin, 4 September 2017
         *------------------------------------*/

        var body = $('body'),
            open_button = $('.button-mm'),
            layer_menu = $(".menu-samping"),
            iconnya = $(".hamburger"),
            icon_open = $('.hamburger-inner'),
            overlay = $('.overlay-body'),
            overlay_menu = $('.overlay-menu'),
            cari_mobil_baru = $('.cari-mobil-baru-action'),
            cari_mobil_bekas = $('.cari-mobil-bekas-action'),
            form_cari_merek = $('.carimobil-menu-samping'),
            form_cari_model = $('.carimobil-model-mobile'),
            close_form_mmb = $('.close-mmb'),
            close_mmb_model = $('.close-mmb-model'),
            list_merek = $("#show-merek-mobile"),
            list_model = $("#show-model-mobile"),
            overlay_active = $('.activate-overlay'),
            headertxtbaru = "Pilih Mobil Baru",
            headertxtlama = "Pilih Mobil Bekas",
            spantxtbaru = "Semua Merek Mobil Baru",
            spantxtlama = "Semua Merek Mobil Bekas";

        var hidelayer = function() {
            layer_menu.removeClass('open');
            iconnya.removeClass('is-active');
            open_button.removeClass('button-active');
            icon_open.removeClass('hamburg-active');
            overlay.removeClass('activate-overlay');
            form_cari_merek.addClass('carimobil-menu-samping-open');
            form_cari_merek.css('left', '0');
            list_merek.show('500');
        };

        open_button.click(function(e) {
            layer_menu.toggleClass('open');
            iconnya.toggleClass('is-active');
            $(this).toggleClass('button-active');
            icon_open.toggleClass('hamburg-active');
            overlay.toggleClass('activate-overlay');
            body.toggleClass('noscroll');
            bodyclick();
        });

        function bodyclick() {
            overlay.click(function() {
                layer_menu.removeClass('open');
                iconnya.removeClass('is-active');
                open_button.removeClass('button-active');
                icon_open.removeClass('hamburg-active');
                overlay.removeClass('activate-overlay');
                body.removeClass('noscroll');
            })
        }

        cari_mobil_baru.click(function(e) {
            e.preventDefault();
            if (!rajamobil.elem.form_mrk_mobile_existed) {
                rajamobil.get_merek('', 0, 2);
            }
            hidelayer();
            form_cari_merek.find('.header h1').text(headertxtbaru);
            form_cari_merek.find('.content span').text(spantxtbaru);
            form_cari_model.find('.header h1').text(headertxtbaru);
            form_cari_model.find('.content span').text(spantxtbaru);
            overlay_menu.toggleClass('activate-ov-menu');

            rajamobil.storageManagement.create('kondisi', 0);
        });

        cari_mobil_bekas.click(function(e) {
            e.preventDefault();
            if (!rajamobil.elem.form_mrk_mobile_existed) {
                rajamobil.get_merek('', 1, 2);
            }
            hidelayer();
            form_cari_merek.find('.header h1').text(headertxtlama);
            form_cari_merek.find('.content span').text(spantxtlama);
            form_cari_model.find('.header h1').text(headertxtlama);
            form_cari_model.find('.content span').text(spantxtlama);
            overlay_menu.toggleClass('activate-ov-menu');
            rajamobil.storageManagement.create('kondisi', 1);
        });

        close_form_mmb.click(function(e) {
            e.preventDefault();
            form_cari_merek.removeClass('carimobil-menu-samping-open');
            form_cari_merek.css('left', '100%');
            list_merek.hide();
            body.removeClass('noscroll');
            overlay_menu.removeClass('activate-ov-menu');
        });

        close_mmb_model.click(function(e) {
            e.preventDefault();
            body.removeClass('noscroll');
            overlay_menu.removeClass('activate-ov-menu');
        });

    },
    new_footer_mobile_menu: function() {

        /*---------------------------------------------
         * Show Footer Dropdown Menu Only On Mobile
         * coded by : Risdyanto Kurniawan
         * kanban-task : TD-151 (html css footer)
         * created at: Wednesday,  August, 30, 2017
         * ------------------------------------------*/

        var show_menu = function(el) {
                $(el).toggleClass('activate', 'slow', 'easeOutSine');
            },
            actions = {
                cari_mobil: function(event) {
                    show_menu('.m-dropdown-a');
                },
                pembeli: function(event) {
                    show_menu('.m-dropdown-b');
                },
                wiraniaga: function(event) {
                    show_menu('.m-dropdown-c');
                },
                berita_mobil: function(event) {
                    show_menu('.m-dropdown-d');
                },
                mobil_terpopuler: function(event) {
                    show_menu('.m-dropdown-e');
                }
            };

        $("div[data-action]").on("click", function(event) {
            var link = $(this),
                action = link.data("action");
            if (typeof actions[action] === "function") {
                actions[action].call(this, event);
            }
        });
    },
    new_search_form: function() {

        /*---------------------------------------------
         * New Search in Homepage
         * coded by : Risdyanto Kurniawan
         * kanban-task : TD-161 (Form Pencarian)
         * created at: Wednesday,  September, 6, 2017
         * -------------------------------------------*/

        var cek_kondisi = $('#cekkondisibaru'),
            select_search = $('.select-search'),
            select_price = $('#select-price'),
            cariberdasar = $('#cariberdasarkan'),
            select_model = $('#select-model'),
            select_merek = $('#select-merek'),
            data_toggle = $("a[data-toggle]"),
            show_harga = $('#show-harga'),
            show_merek = $('#show-merek'),
            merek_val = $('#merek-value'),
            pick_harga = $('.pick-harga'),
            input_price = $('.input-price'),
            price_start = $('#inp-price-start'),
            price_end = $('#inp-price-finish'),
            input_merek = $('.input-merek'),
            pick_merek = $('.pick-merek'),
            show_model = $('#show-model'),
            input_model = $('.input-model'),
            model_val = $('#model-value'),
            cari_header = $('.cari-header'),
            btn_show_menu = $('.show-menu-search'),
            form_cari = $('.menu-cari-mobil'),
            tracking_buy = $('.act-tracking-buy'),
            submit_search = $('#submit-search'),
            arrow_merek = $('.mpencarian .row-select .fa'),
            lokasi_baru = $('#lokasi-baru'),
            kondisi_saved = rajamobil.storageManagement.getdata('kondisi'),
            tipe_cari = rajamobil.storageManagement.getdata('tipecari'),
            merek_selected = rajamobil.storageManagement.getdata('merek_selected'),
            model_selected = rajamobil.storageManagement.getdata('model_selected'),
            price_selected = rajamobil.storageManagement.getdata('price_selected');


        if (kondisi_saved === null) {
            cek_kondisi.val(0);
            rajamobil.setJakarta(0);
        } else {
            cek_kondisi.val(kondisi_saved);
            rajamobil.setJakarta(kondisi_saved);
        }

        if (!rajamobil.elem.form_mrk_web_existed) rajamobil.get_merek("", 0, 1);

        select_search.hover(function() {
            $(this).find('label').css('color', '#f16033');
            $(this).find('select').css('border-bottom', '1px solid #f16033');
            $(this).find('.fa').css('color', '#f16033');
            $(this).find('.chosen-container span').css('border-bottom', '1px solid #f16033');
        }, function() {
            $(this).find('label').css('color', 'rgba(0, 0, 0, 0.5)');
            $(this).find('select').css('border-bottom', '1px solid #dedede');
            $(this).find('.fa').css('color', '#dedede');
            $(this).find('.chosen-container span').css('border-bottom', '1px solid #dedede');
        });

        var selection = function(value) {
            switch (parseInt(value)) {
                case 0:
                    select_model.show();
                    select_merek.show();
                    select_price.hide();
                    break;
                case 1:
                    select_model.hide();
                    select_merek.hide();
                    select_price.show();
                    break;
            }
        };

        select_price.hide();

        cariberdasar.change(function() {
            var value = parseInt($(this).val());
            rajamobil.storageManagement.create('tipecari', value);
            selection(value);
        });

        select_price.hover(function() {
            $(this).find('input').css('border-bottom', '1px solid #f16033');
        }, function() {
            $(this).find('input').css('border-bottom', '1px solid #dedede');
        });

        select_merek.hover(function() {
            $(this).find('input').css('border-bottom', '1px solid #f16033');
        }, function() {
            $(this).find('input').css('border-bottom', '1px solid #dedede');
        });

        var change_title = function(id) {
            switch (id) {
                case 0:
                    cari_header.find('h1').text("Cari Promo Mobil Baru Terbaik di Kota Anda");
                    rajamobil.storageManagement.create('kondisi', 0);
                    break;
                case 1:
                    cari_header.find('h1').text("Cari Promo Mobil Bekas Terbaik di Kota Anda");
                    rajamobil.storageManagement.create('kondisi', 1);
                    break;
                case 2:
                    cari_header.find('h1').text("Cari Promo Mobil Import Terbaik di Kota Anda");
                    rajamobil.storageManagement.create('kondisi', 2);
                    break;
                case 3:
                    cari_header.find('h1').text("Cari Promo Motor Baru Terbaik di Kota Anda");
                    //rajamobil.storageManagement.create('kondisi', 2);
                    break;
                default:
                    break;
            }
        };

        lokasi_baru.on("change", function(e) {

            $('#lokasi-baru2').val($(this).val());

        });

        data_toggle.on("click", function(event) {
            var link = $(this),
                kondisi = parseInt(link.data("id"));
            rajamobil.reset_form();
            cek_kondisi.val(kondisi);
            rajamobil.get_merek('', kondisi, 1);

            change_title(kondisi);
        });

        input_price.click(function(e) {
            e.preventDefault();
            show_harga.addClass('lh-open');
            e.stopPropagation();
        });

        pick_harga.on("click", function(ev) {
            var el = $(this),
                mulai = el.data("mulai"),
                sampai = el.data("sampai"),
                tampil = el.data("tampil");
            show_harga.removeClass('lh-open');
            input_price.val(tampil);
            price_start.val(mulai);
            price_end.val(sampai);

            rajamobil.storageManagement.create('price_selected', JSON.stringify({
                "input_price": tampil,
                "price_start": mulai,
                "price_end": sampai
            }));
        });

        input_merek.click(function(e) {
            e.preventDefault();
            show_merek.addClass('lh-open');
            $('body').addClass('no-scroll');
            show_model.removeClass('lh-open');
            input_model.val('Pilih Model');
            model_val.val('');

            e.stopPropagation();
        });

        arrow_merek.click(function(e) {
            e.preventDefault();
            show_merek.addClass('lh-open');
            $('body').addClass('no-scroll');
            show_model.removeClass('lh-open');
            input_model.val('Pilih Model');
            model_val.val('');
        });

        tracking_buy.click(function(e) {
            e.preventDefault();
            $('#head-tracker-buy').toggle();
            e.stopPropagation();
        });

        var cekkondisi = function() {

            if (ctrl === 'index') {
                rajamobil.reset_form();
                rajamobil.storageManagement.remove('kondisi');
            }

            if (kondisi_saved !== null && ctrl !== 'index') {
                change_title(parseInt(kondisi_saved));
            } else {

                if ($('#menu-cari-mobil').data('drive') === 'motor') {
                    change_title(3);
                } else {
                    change_title(0);
                }
            }

            if (tipe_cari !== null) {
                selection(tipe_cari);
                cariberdasar.val(tipe_cari);
            }

            if (merek_selected !== null) {
                var val_saved = JSON.parse(merek_selected);
                merek_val.val(val_saved.merek_val);
                input_merek.val(val_saved.merek_name);
                $("#merekname").val(val_saved.merek_name);
                rajamobil.new_get_model(val_saved.merek_val, 1, 1, val_saved.merek_name);
            }

            if (model_selected !== null) {
                var val_saved = JSON.parse(model_selected);
                input_model.val(val_saved.modelname);
                model_val.val(val_saved.modelid);
                $("#modelname").val(val_saved.modelname);
            }

            if (price_selected !== null) {
                var val_saved = JSON.parse(price_selected);
                input_price.val(val_saved.input_price);
                price_start.val(val_saved.price_start);
                price_end.val(val_saved.price_end);
            }
        };

        submit_search.click(function(e) {
            if (tipe_cari !== null) {
                switch (parseInt(tipe_cari)) {
                    case 0:
                        price_start.val('');
                        price_end.val('');
                        break;
                    case 1:
                        merek_val.val('');
                        model_val.val('');
                        break;
                    default:
                        break;
                }
            }

            show_model.removeClass('lh-open');
            $('.cari-header').html('<h1><img src="' + base_url + '/themes/rmperjuangan/images/loadingbar/loader-mini.svg">Mohon tunggu sebentar</h1>');
        });

        var executeToggle = function() {
                $('.menu-content-pencarian').find('.show-menu-search-btn').click(function(e) {
                    form_cari.addClass('hidden').slideUp('1000').removeClass('mcm-hide');
                    form_cari.find('.tab-content').removeClass('bordered');
                    $(this).hide();
                    btn_show_menu.show();
                });
            },
            executeToggle1 = function() {
                btn_show_menu.click(function(e) {
                    e.preventDefault();
                    form_cari.find('.new-search-form').css('bottom', '0');
                    form_cari.removeClass('hidden').slideDown('1000').addClass('mcm-hide');
                    form_cari.find('.tab-content').addClass('bordered');
                    $(this).hide();
                    $('.show-menu-search-btn').show();
                    executeToggle();
                });
            };

        executeToggle1();
        cekkondisi();

    },
    reset_form: function() {
        var lokasi = $('#lokasi-baru'),
            merek = $('#merek-value'),
            model = $('#model-value'),
            merekview = $('.input-merek'),
            modelview = $('.input-model'),
            price = $('.input-price'),
            price_start = $('#inp-price-start'),
            price_finish = $('#inp-price-finish');

        lokasi.val('');
        merek.val('');
        model.val('');
        merekview.val('');
        modelview.val('');
        price.val('');
        price_start.val('');
        price_finish.val('');
        rajamobil.storageManagement.remove('tipecari');
        rajamobil.storageManagement.remove('price_selected');
        rajamobil.storageManagement.remove('model_selected');
        rajamobil.storageManagement.remove('merek_selected');

    },
    storageManagement: {
        getdata: function(id) {
            var datastored = sessionStorage.getItem(id);
            if (typeof(datastored) !== undefined && datastored !== null) {
                return datastored;
            } else {
                return null;
            }
        },
        create: function(id, data) {
            try {

                if (sessionStorage.setItem(id, data)) {
                    return true;
                }
            } catch (error) {
                return error;
            }
        },
        remove: function(id) {
            return sessionStorage.removeItem(id);
        }
    },
    close_body: function() {
        var show_merek = $('#show-merek'),
            show_harga = $('#show-harga'),
            show_model = $('#show-model');

        $(document).click(function(e) {


            if (!$(e.target).is('.lh-open') && show_merek.hasClass('lh-open')) {
                if ($('.lh-open').is(':visible')) {
                    setTimeout(function() {
                        show_merek.removeClass('lh-open');
                    }, 100);
                }
            }

            if (!$(e.target).is('#head-tracker-buy') || !$(e.target).is('#tracking-form') || !$(e.target).is('.track-buy')) {

                if ($('#head-tracker-buy').is(':visible') && (e.target.className !== 'track-buy')) {
                    setTimeout(function() {
                        $('#head-tracker-buy').hide();
                    }, 100);

                }
            }

            if (!$(e.target).is('.lh-open') && show_harga.hasClass('lh-open')) {
                if ($('.lh-open').is(':visible')) {
                    setTimeout(function() {
                        show_harga.removeClass('lh-open');
                    }, 100);
                }
            }

            if (!$(e.target).is('.pick-merek-web') && show_model.hasClass('lh-open')) {
                if ($('.lh-open').is(':visible')) {
                    setTimeout(function() {
                        show_model.removeClass('lh-open');
                    }, 100);
                }
            }

            if (!$(e.target).is('.search-result')) {
                if ($('.search-result').is(':visible')) {
                    setTimeout(function() {
                        $('.search-result').hide();
                    }, 100);
                }
            }

            if (!$(e.target).is('.jam-layanan') && isMobile && !$(e.target).is('.show-time') && $('.jam-layanan').hasClass('jam-layanan-open')) {
                if ($('.jam-layanan').is(':visible')) {
                    setTimeout(function() {
                        $('.jam-layanan').removeClass('jam-layanan-open');

                    }, 100);
                }
            }

        });
    },
    getdatacars: function() {

        var alldata = rajamobil.storageManagement.getdata('_mobil_baru');

        if (null === alldata) {
            var csrfToken = $("meta[name='csrf-token']").attr('content'),
                all = 1;

            var ajax = function() {
                // rajamobil.new_ajaxify_html({
                //     all: all,
                //     _csrf: csrfToken
                // }, rajamobil.base_url + '/ajax/get-list-mobil-baru').done(function(res) {
                //     var data = JSON.parse(res);

                //     if (data.docs.length > 0) {
                //         var versiondate = new Date().getTime(),
                //             datastore = {
                //                 'total': data.numFound,
                //                 'versi': versiondate,
                //                 'data': data.docs
                //             };
                //         rajamobil.storageManagement.create('_mobil_baru', JSON.stringify(datastore));
                //     }

                //     if (null !== alldata) {
                //         carimobil.storing();
                //     }
                // });

                axios.post('/ajax/get-list-mobil-baru', {
                        csrf_token: '',
                        all: all
                    })
                    .then(function(response) {
                        var data = JSON.parse(response);

                        if (data.docs.length > 0) {
                            var versiondate = new Date().getTime(),
                                datastore = {
                                    'total': data.numFound,
                                    'versi': versiondate,
                                    'data': data.docs
                                };
                            rajamobil.storageManagement.create('_mobil_baru', JSON.stringify(datastore));
                        }

                        if (null !== alldata) {
                            carimobil.storing();
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            };
            ajax();
        }
    }
};

var scrollto = {
    init: function() {},
    top: function() {
        if ($(window).scrollTop() < 1200)
            $(".go-top").addClass("hide");
        else
            $(".go-top").removeClass("hide");
    },
    header: function() {
        if ($(window).scrollTop() >= 200) {
            $('.header-l2').addClass('fixed-header');
        } else {
            $('.header-l2').removeClass('fixed-header');
        }
    }
};


/* ----------------------------------- 
 * Jquery Functions Start Here
 * Refactored by: Risdyanto Kurniawan
 *-------------------------------------*/
$(document).ready(function() {
    $(".go-top").addClass("hide");
    rajamobil.init();

    $(window).scroll(function() {
        scrollto.top();
        scrollto.header();
    });

    $(".go-top").click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 'normal');
        return false;
    });

    // begin
    // subscribe form
    $("#subscribe-form").submit(function() {
        $.ajax({
            // tipe submit : POST
            type: 'POST',
            // tipe data : JSON
            dataType: 'json',
            // data yang di-serialize
            data: $(this).serialize(),
            // url yang dituju ketika klik submit button
            url: $(this).attr('action'),
            beforeSend: function(send) {
                // disabled subscribe button, untuk mencegah diclick lebih dari  1x
                $('#subscribe-btn').attr('disabled', 'disabled');
                // munculkan loading bar
                $('.gabung-notifikasi').fadeIn();
            },
            success: function(data) {
                // munculkan pesan sukses
                // $('.gabung-label').text('Email berhasil disimpan');
                // sembunyikan loading bar
                $('.gabung-loadbar').hide();

                // munculkan pesan sukses
                if (data.status == 1)
                    $('.gabung-label').html(data.msg);
                else
                    $('.gabung-label').html(data.msg);
            },
            complete: function(lengkap) {
                // sembunyikan loading bar / notification bar
                $('.gabung-notifikasi').delay(5000).hide(0, function() {
                    // reset label kembali ke teks "Menyimpan"
                    $('.gabung-label').html('Menyimpan');
                    // reset loading bar
                    $('.gabung-loadbar').show();
                });
                // enable subscribe button
                $('#subscribe-btn').attr('disabled', false);
            }
        });
        return false;
    });
    // end
    // subscribe form

    $('.carousel').carousel({
        interval: 5000
    });

});