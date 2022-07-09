$(function () {
    $('.hamburger').click(function () {
        $('.sidebar-menu').toggleClass('show');
        return false;
    })
    $('.sidebar-menu .close').click(function () {
        $(this).parent().toggleClass('show')
    });
    $('.textMore').click(function () {
        if ($('.textMore').text() == 'Read more') {
            $('.showLess').css("display", "none");
            $('.showMore').css("display", "block");
            $(".textMore").text("Read less");
            $(".textMore").attr("class", "read-less textMore");
        } else {
            $('.showLess').css("display", "block");
            $('.showMore').css("display", "none");
            $(".textMore").text("Read more");
            $(".textMore").attr("class", "read-more textMore");
        }
    });
})
