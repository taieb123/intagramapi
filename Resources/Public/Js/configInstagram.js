$(document).ready(function () {
    var nb_items = $('input[name="item_desktop_insta"]').val(),
        nb_items_mobile = $('input[name="item_mobile_insta"]').val();

    var feed = new Instafeed({
        accessToken: $('input[name="token_insta"]').val(),
        template: '<div class="item_instagram"><a href="{{link}}" title="{{caption}}" class="item_insta" style="background-image:url({{image}})" target="_blank"></a></div>',
        limit: window.innerWidth < 800?parseInt(nb_items_mobile):parseInt(nb_items),
    });
    feed.run();
});