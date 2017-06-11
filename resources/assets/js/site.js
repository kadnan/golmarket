$(function () {

    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
    });

    var navoffeset = $(".agileits_header").offset().top;
    $(window).scroll(function () {
        var scrollpos = $(window).scrollTop();
        if (scrollpos >= navoffeset) {
            $(".agileits_header").addClass("fixed");
        } else {
            $(".agileits_header").removeClass("fixed");
        }
    });

    $('.flexslider').flexslider({
        animation: "slide",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });

    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function () {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );

    // here stars scrolling icon
    $().UItoTop({easingType: 'easeOutQuart'});

    // Mini Cart
    paypal.minicart.render({
        action: '#'
    });


});
