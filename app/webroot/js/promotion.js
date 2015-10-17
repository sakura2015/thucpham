/**
 * Popup quảng cáo simple v1.0
 * @author : dzung.tt
 * @date : 2013-1-8
 * @require : cookies.js
 * */

/*
 * Hàm set vị trí của promo
 * @param JSON window_size
 * @param JSON promo_img_size
 */
function promo_position(window_size, promo_img_size) {

    promo_content = $('#main_promo div.content');
    promo_position = {
        "top": ((window_size.height - promo_img_size.height) / 2),
        "left": ((window_size.width - promo_img_size.width) / 2)
    };
    if (window_size.height > promo_img_size.height && window_size.width > promo_img_size.width) {

    } else {
        if (window_size.height < promo_img_size.height) {
            promo_position.top = 0;
        }
        if (window_size.width < promo_img_size.width) {
            promo_position.left = 0;
        }
    }
    promo_content.css(promo_position);
}
/*
 * Hàm khởi tạo vị trí cho promo
 */
function main_promotion() {
    promo_img = $('#main_promo_img');
    w_size = getWindowSize();
    promo_img_size = {
        "width": promo_img.width(),
        "height": promo_img.height()
    };
    promo_position(w_size, promo_img_size);
}
/*
 * Hàm lấy kích thước cửa sổ
 * @returns {getWindowSize}
 */
function getWindowSize() {
    w_height = $(window).height();
    w_width = $(window).width();
    w_size = {
        "width": w_width,
        "height": w_height
    };
    return  w_size;
}
/**
 * Hàm khởi tạo sub promotion
 */
function sub_promotion(){
    if( getCookie('sub_promo') ) {
        // có cookie : giá trị ẩn => animate hide 
        if(getCookie('sub_promo') == 'hide') {
            var img_height = $('#sub_promo_img').height();
            $('#sub_promo').animate({"bottom": ( img_height * -1 )}, 500);
            setTimeout(function() {
                $('#sub_promo_controls').addClass('minimize');
            }, 500);
        }
    }else{
        writePersistentCookie('sub_promo', 'show', 'session', 0);
    }
}

$(function() {

    $('#main_promo_img').click(function(){
        $('#main_promo').remove();
        writePersistentCookie('close_main_promo', 'active', 'session', 0);
    });
    
    /* Main promotion */
    $('#main_promo_close').click(function() {
        $('#main_promo').remove();
        writePersistentCookie('close_main_promo', 'active', 'session', 0);
    });
    if (getCookie('close_main_promo') === 'active') {
        $('#main_promo').remove();
    } else {
        $('#main_promo').fadeIn('slow');
        main_promotion();
    }

    /*Sub promotion*/
    sub_promotion();
    
    $('#sub_promo_controls').click(function() {

        var img_height = $('#sub_promo_img').height();
        var $this = $(this);
        
        if ( ! $(this).hasClass('minimize')) {
            
            // đang hiện : ghi cookies, ẩn quảng cáo
            $('#sub_promo').animate({"bottom": ( img_height * -1 )}, 500);
            writePersistentCookie('sub_promo', 'hide', 'session', 0);
            setTimeout(function() {
                $this.addClass('minimize');
            }, 500);

        } else {
        
            // đang ẩn : ghi cookies, hiện quảng cáo
            $('#sub_promo').animate({"bottom": 0 }, 500);
            writePersistentCookie('sub_promo', 'show', 'session', 0);
            setTimeout(function() {
                $this.removeClass('minimize');
            }, 500);
        }
    });
});
