$(document).ready(function () {  
    var token = getInputValByName('token_insta'), like_btn = getInputValByName('showlikebtn');
    likebtn_content = parseInt(like_btn)?'<button  class="like-btn"></button>':'';
    if(getInputValByName('pagination') == '1'){
        var nb_item_first = parseInt(getInputValByName('start_nombre_pagination')),
            item_per_pagination = parseInt(getInputValByName('item_per_pagination'));
        $.ajax({ 
            // the first ajax request returns the ID of user rudrastyh
            url: 'https://graph.instagram.com/me/media?fields=caption,id,media_type,media_url,permalink,thumbnail_url,timestamp,username',
            dataType: 'jsonp',
            type: 'GET',
            data: {
                access_token: token
            }, // actually it is just the search by username
            success: function (data) {
                console.log(data);
                var cnt = 0;
                var fi = 0;
                var li = 0;
                var datas = data.data;
                for (x in datas) {
                    if (cnt % item_per_pagination == 0) {
                        fi = getRndInteger(32, 34);
                        prec = fi;
                    }
                    if (cnt % item_per_pagination == 1) {
                        li = getRndInteger(32, 34);
                        prec = li;
                    }
                    if (cnt % item_per_pagination == 2) {
                        prec = 96.6 - li - fi;
                    }
                    var hidden_pag = (cnt >= nb_item_first) ? "hidden" : "";
                    console.log(datas[x]);
                    picture = datas[x]['media_type'] == "VIDEO" ? datas[x]['thumbnail_url'] : datas[x]['media_url'];
                    $('#instafeed').append('<div class="' + hidden_pag + ' item_instagram"><a href="' + datas[x]['permalink'] + '" title="'+ datas[x]['caption']+'" class="item_insta" style="background-image:url(' + picture + ')" onclick="window.open(this.href);return false">'+likebtn_content+'</a></div>');
                    cnt++;
                }
            },
            error: function (data) {}
        });
    }
    else{
      var   nb_items = getInputValByName('item_desktop_insta'),
        nb_items_mobile = getInputValByName('item_mobile_insta');
        var feed = new Instafeed({
            accessToken: token,
            template: '<div class="item_instagram"><a href="{{link}}" title="{{caption}}" class="item_insta" style="background-image:url({{image}})" target="_blank">likebtn_content</a></div>',
            limit: window.innerWidth < 800?parseInt(nb_items_mobile):parseInt(nb_items),
        });
        feed.run();
    }
});

$(document).on('click','.more_instagram',function () {
    var current = 0, item_per_pagination = parseInt(getInputValByName('item_per_pagination'));
    $("#instafeed .hidden").each(function () {
        if (current < item_per_pagination) {
            $(this).removeClass("hidden");
            current++;
        }
    });
    if (current < item_per_pagination) {
        $(".more_instagram").hide();
    }
});

function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

function getInputValByName(name){
    return $('input[name="'+name+'"]').val();
}

