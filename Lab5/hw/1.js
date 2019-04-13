$(document).ready(() => {
    $(".menu").hover(
        () => {
            $("ul.dropdown-menu").slideDown("medium");
        },
        () => {
            $("ul.dropdown-menu").slideUp("medium");
        }
    );

    $(".dropdownablewrapper li").hover(
        function() {
            $(this).children("ul").slideDown("medium");
        },
        function() {
            $(this).children("ul").slideUp("medium");
        }
    );
})