$(function () {

    var $form = $('#payment-form');

    $form.submit(function (event) {
        // Disable the submit button to prevent repeated clicks:

        //$form.find('.submit').prop('disabled', true);
        // Request a token from Stripe:
        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from being submitted:
        return false;
    });

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

function stripeResponseHandler(status, response) {
    // Grab the form:
    var $form = $('#payment-form');
    if (response.error) { // Problem!
        console.clear()
        console.log(response.error.message)
        // Show the errors on the form:
        $('.payment-errors').removeClass('hidden')
        $('.payment-errors').html(response.error.message);
        $form.find('.submit').prop('disabled', false); // Re-enable submission

    } else { // Token was created!

        // Get the token ID:
        var token = response.id;
        console.log(token)

        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));

        // Submit the form:
        $form.get(0).submit();
    }
};
