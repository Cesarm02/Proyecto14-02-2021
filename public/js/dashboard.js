$(document).ready(function() {
    //tooltip
    $('[data-toggle="tooltip"]').tooltip();

    $(".submenu-toggle").click(function() {
        $(this)
            .parent()
            .children("ul.submenu")
            .toggle(200);
    });
});

