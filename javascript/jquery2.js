$(document).ready(function () {
    $("#aboutheader").click(function () {
        $('html, body').stop(true, false).animate({
            scrollTop: $("#about").offset().top
        }, 1000);
    });
    $("#serviceheader").click(function () {
        $('html, body').stop(true, false).animate({
            scrollTop: $("#services").offset().top
        }, 1000);
    });
});