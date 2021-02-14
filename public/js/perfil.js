$(document).ready(function() {
    $(".setsize").each(function() {
        $(this).height($(this).width());
    });
});
$(window).on("resize", function() {
    $(".setsize").each(function() {
        $(this).height($(this).width());
    });
});
