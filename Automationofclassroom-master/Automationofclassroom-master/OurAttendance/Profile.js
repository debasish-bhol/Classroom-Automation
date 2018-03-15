$(document).ready(function() {
    $("nav > ul > li").mouseover(function() {
        var the_width = $(this).find("a").width();
        var child_width = $(this).find("ul").width();
        var width = parseInt((child_width - the_width)/2);
        $(this).find("ul").css('left', -width);
    });
});