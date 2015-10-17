﻿//def
function change_page(offset, per_page)
{
    var current_uri = $('input[name=url]').val();

    var page = offset / per_page + 1;
    var url = '';
    if (current_uri.search('@') != -1)
        url = current_uri.replace('@', '/trang-' + page)
    else
        url = current_uri + '/trang-' + page;

    location.href = url;
    return;
}

function set_slide_show()
{
    $('.slideshow').slideShow({
        'interval': 3
    });
}


function run_slide_products_related($ele) {
    $($ele).jcarousel({
        wrap: 'last',
        visible: 4,
        scroll: 1,
        initCallback: function(carousel) {
            carousel.buttonNext.bind('click', function() {
                carousel.startAuto(5);
            });
            carousel.buttonPrev.bind('click', function() {
                carousel.startAuto(5);
            });

            carousel.clip.hover(function() {
                carousel.stopAuto(5);
            }, function() {
                carousel.startAuto(5);
            });
        }
    });
}
function run_slide_product_images($ele) {
    $($ele).jcarousel({
        auto: 5,
        wrap: 'last',
        visible: 3,
        scroll: 1,
        initCallback: function(carousel) {
            carousel.buttonNext.bind('click', function() {
                carousel.startAuto(5);
            });
            carousel.buttonPrev.bind('click', function() {
                carousel.startAuto(5);
            });

            carousel.clip.hover(function() {
                carousel.stopAuto(5);
            }, function() {
                carousel.startAuto(5);
            });
        }
    });
}

function jump_to($ele) {
    var new_position = $($ele).offset();
    $('body, html').animate({
        "scrollTop": new_position.top - 140,
        "scrollLeft": new_position.left
    }, 1000);
}

$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        $('#back-top').fadeIn();
    } else {
        $('#back-top').fadeOut();
    }
});

function remove_product_in_cart(row_id)
{

    $.ajax(
            {
                type: 'post',
                url: '/remove_product_in_cart',
                data: {
                    'is-ajax': 1,
                    'id': row_id
                },
                success: function(responseText)
                {
                    location.href = '/gio-hang';
                }
            });
}

function update_quantity(id)
{
    var quantity = $('input[name=' + id + ']').val();
    $.ajax(
            {
                type: 'post',
                url: 'update_product_in_cart',
                data: {
                    'id': id,
                    'quantity': quantity
                },
                success: function()
                {
                    location.href = '/gio-hang';
                }
            });
}

function get_district(obj) {
    var parent_id = $('select[name=city]').val();

    $.ajax(
            {
                type: 'post',
                url: '/get_district',
                data: {
                    'is-ajax': 1,
                    'parent_id': parent_id
                },
                success: function(responseText) {
                    if ($('#district'))
                        $('#district').html(responseText);
                }
            });
}

function tabs()
{
    $(".tab_content").hide(); //Hide all content
    $("ul.tabs li:first").addClass("tab_active").show(); //Activate first tab
    $(".tab_content:first").show(); //Show first tab content

    //On Click Event
    $("ul.tabs li").click(function() {
        $("ul.tabs li").removeClass("tab_active"); //Remove any "active" class
        $(this).addClass("tab_active"); //Add "active" class to selected tab
        $(".tab_content").hide(); //Hide all tab content

        var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active ID content
        return false;
    });
}

function product_contact(uri, title) {
    if (uri != '') {
        window.location.href = '/lien-he' + '?title=' + encodeURIComponent(title) + '&uri=' + encodeURIComponent(uri);
    }
    return false;
}

function related_product_ajax($pid) {

    if ($pid) {

        $('#related_products_page a').click(function() {
            $page = $(this).html();
            $current = $(this);
            $.ajax(
                    {
                        type: 'post',
                        url: '/get_products_related_ajax',
                        beforeSend: function() {
                            $('<img />').attr('src', '/img/ajax-loader.gif')
                                    .css('margin-right', '10px')
                                    .insertBefore($('#related_products_page a:first'));
                        },
                        data: {
                            'is_ajax': 1,
                            'pid': $pid,
                            'page': $page
                        },
                        success: function(responseText) {
                            $('#related_products_page img').remove();
                            $('#related_products').html(responseText);
                            $('#related_products_page a').removeClass('selected');
                            $current.addClass('selected');
                        }
                    });
        });
    }
    return false;
}
function show_fancy_box()
{
    $("a[rel=example_group]").fancybox({
        'overlayShow': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'titlePosition': 'over',
        'titleFormat': function(title, currentArray, currentIndex, currentOpts) {
        }
    });
}

$(function() {
    set_slide_show();
});
