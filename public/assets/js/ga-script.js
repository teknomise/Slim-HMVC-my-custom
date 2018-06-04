! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
        n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
}(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '141766013181566');
fbq('track', 'PageView');

var uri = window.location.pathname,
    maker = uri.split("/"),
    googletag = googletag || {};
googletag.cmd = googletag.cmd || [],
    function() {
        var e = document.createElement("script");
        e.async = !0, e.type = "text/javascript";
        document.location.protocol;
        e.src = "https://www.googletagservices.com/tag/js/gpt.js";
        var a = document.getElementsByTagName("script")[0];

        a.parentNode.insertBefore(e, a)
    }(), googletag.cmd.push(function() {
        var e = googletag.sizeMapping().addSize([1200, 0], [728, 90]).addSize([992, 0], [728, 90]).addSize([768, 0], [728, 90]).addSize([480, 0], [320, 50]).addSize([320, 0], [
            [320, 50],
            [320, 100],
            [320, 200],
            [300, 250],
            [1, 1]
        ]).build();
        googletag.defineSlot("/10205490/listing_mobil_baru_acc_daihatsu_728_90", [728, 90], "div-gpt-ad-1485493373176-0").defineSizeMapping(e).addService(googletag.pubads()),
            googletag.defineSlot("/10205490/new_design_rajamobil_homepage_top_728x90", [728, 90], "div-gpt-ad-1488184309241-0").defineSizeMapping(e).addService(googletag.pubads()),
            googletag.defineSlot("/10205490/new_design_rajamobil_homepage_728x90", [728, 90], "div-gpt-ad-1464662770834-0").defineSizeMapping(e).addService(googletag.pubads()),
            googletag.defineSlot("/10205490/new_design_rajamobil_list_mobil_baru_728x90", [728, 90], "div-gpt-ad-1476350206464-0").defineSizeMapping(e).addService(googletag.pubads()),
            googletag.defineSlot("/10205490/rjmobil_detail_mobil_showcase_1", [728, 90], "div-gpt-ad-1502348452688-0").defineSizeMapping(e).addService(googletag.pubads()),
            googletag.defineSlot("/10205490/banner_mobile_top_320_50", [320, 50], "div-gpt-ad-1463409690594-0").defineSizeMapping(e).addService(googletag.pubads());

        var a = googletag.defineSlot("/10205490/new_raja_listmobil_showcase_1", [300, 250], "div-gpt-ad-1463540084926-0").addService(googletag.pubads());
        googletag.defineSlot("/10205490/rjmobil_list_mobil_showcase_2", [300, 250], "div-gpt-ad-1463635221642-0").addService(googletag.pubads()),
            googletag.defineSlot("/10205490/rjmobil_list_mobil_showcase_3", [300, 250], "div-gpt-ad-1463635089663-0").addService(googletag.pubads());

        maker.length > 5 && a.setTargeting("url", maker[maker.length - 1]), googletag.pubads().enableSingleRequest(), googletag.enableServices()
    }),
    function(e, a, g, t, o, i, d) {
        e.fbq || (o = e.fbq = function() {
            o.callMethod ? o.callMethod.apply(o, arguments) : o.queue.push(arguments)
        }, e._fbq || (e._fbq = o), o.push = o, o.loaded = !0, o.version = "2.0", o.queue = [], (i = a.createElement(g)).async = !0, i.src = "https://connect.facebook.net/en_US/fbevents.js", (d = a.getElementsByTagName(g)[0]).parentNode.insertBefore(i, d))
    }(window, document, "script"), fbq("init", "333899566821205"), fbq("track", "PageView"),
    function(e, a, g, t, o) {
        e[t] = e[t] || [], e[t].push({
            "gtm.start": (new Date).getTime(),
            event: "gtm.js"
        });
        var i = a.getElementsByTagName(g)[0],
            d = a.createElement(g);
        d.async = !0, d.src = "//www.googletagmanager.com/gtm.js?id=GTM-NF5RJ6", i.parentNode.insertBefore(d, i)
    }(window, document, "script", "dataLayer");