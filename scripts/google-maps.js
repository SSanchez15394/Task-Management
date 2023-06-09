
(function () {
    var setting = {
        "height": 300,
        "width": 803,
        "zoom": 17,
        "queryString": "UAX - Universidad Alfonso X El Sabio, Avenida Universidad, Villanueva de la Cañada, España",
        "place_id": "ChIJmaRM-nuZQQ0R-KGION5XMgw",
        "satellite": true,
        "centerCoord": [40.450793363539475, -3.9872344999999987],
        "cid": "0xc3257de3888a1f8",
        "lang": "es",
        "cityUrl": "/spain/madrid",
        "cityAnchorText": "Mapa de Madrid, Comunidad de Madrid, España",
        "id": "map-9cd199b9cc5410cd3b1ad21cab2e54d3",
        "embed_id": "937956"
    };
    var d = document;
    var s = d.createElement('script');
    s.src = 'https://1map.com/js/script-for-user.js?embed_id=937956';
    s.async = true;
    s.onload = function (e) {
        window.OneMap.initMap(setting);
    };
    var to = d.getElementsByTagName('script')[0];
    to.parentNode.insertBefore(s, to);
})();
