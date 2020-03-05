$(document).ready(function() {
    var def_height = $('#main').height();
    $(".nav a").click(function() {
        var link = $(this);
        var closest_ul = link.closest("ul");
        var parallel_active_links = closest_ul.find(".active");
        var closest_li = link.closest("li");
        var link_status = closest_li.hasClass("active");
        var count = 0;

        closest_ul.find("ul").slideUp(300, function() {
            if (++count == closest_ul.find("ul").length){
                parallel_active_links.removeClass("active");
                //flexi(def_height);
            }
        });

        if (!link_status) {
            closest_li.children("ul").slideDown(300, function() {
                //flexi(def_height);
            });
            closest_li.addClass("active");
            closest_ul.addClass("active");
        }

    });
});

$('.btn-toogle').click(function() {
    if(pos == 0){
        make_half();
        pos = 1;
    } else if(pos == 1){
        make_hide();
        pos = 2;
    } else {
        make_show();
        pos = 0;
    }
});

/*function col_adjust(){
   t_current.columns.adjust();
}
function sidenav_res()
{
   col_adjust();
}*/

function make_show(){
    $("#mySidenav").css('width','220px');
    $("#back").css('width','100%');
    $("#back").css('opacity','1');
    $("#main").css('padding-left','220px');

    //setTimeout(sidenav_res, 200);
}

function make_half(){
    $("#mySidenav").css('width','50px');
    $("#back").css('width','100%');
    $("#back").css('opacity','1');
    $("#main").css('padding-left','50px');
    //setTimeout(sidenav_res, 200);
}

function make_hide(){
    $("#mySidenav").css('width','0');
    $("#back").css('width','0');
    $("#back").css('opacity','0');
    $("#main").css('padding-left','0');
    //setTimeout(sidenav_res, 200);
}



$('.back').click(function() {
    $("#mySidenav").css('width','0');
    $("#back").css('width','0');
    $("#back").css('opacity','0');
    $("#main").css('padding-left','0');
    //setTimeout(sidenav_res, 200);
});

/*function flexi(def_height)
{
    var sidenav = $('.sidenav').height();
    var main = $('#main').height();
    if(sidenav > main){
        $('#main').height(sidenav);
    } else {
        $('#main').height(def_height);
    }
}*/

function screenres(){
    var w = window.innerWidth;
    if(w >= 1024 ){
        pos = 0;
    } else if(w > 768 && w < 1024 ){
        pos = 1;
    } else {
        pos = 3;
    }
    $('.c3 svg').css('width','100%');
}

screenres();

$( window ).resize(function() {
  screenres();
});

$(".notification-button").click(function(){
    $(".new-notification").toggleClass("new-notification-active")
});

$(".notification-close").click(function(){
    $(".new-notification").removeClass("new-notification-active")
});

$(".btn-toogle").click(function(){
    $(".new-notification").removeClass("new-notification-active")
});

$("#back").click(function(){
    $(".new-notification").removeClass("new-notification-active")
});
// select2

//$('.basic-single').select2();
//$('.basic-multiple').select2();
//$('.basic-multiple').select2();
//$('.select2-search__field').attr("placeholder", 'Pilih');
//$('.select2-search__field').css("width", '100%');
     