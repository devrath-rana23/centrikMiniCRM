$(function () {
    $('.hamburger').click(function () {
        $('.sidebar-menu').toggleClass('show');
        return false;
    })
    $('.sidebar-menu .close').click(function () {
        $(this).parent().toggleClass('show')
    });
    $('.Expand').click(function () {
        if ($('.Expand').attr("class") == 'expand-more Expand expand') {
            $('.logout-btn').css('display', 'block');
            $(".Expand").attr("class", "expand-less Expand");
        } else {
            $('.logout-btn').css('display', 'none');

            $(".Expand").attr("class", "expand-more Expand expand");
        }
    });
})
