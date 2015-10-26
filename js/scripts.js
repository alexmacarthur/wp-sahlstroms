$('body').removeClass('no-js');

$( document ).ready(function(){
    initMobileMenu();
    initMobileLinkResize();
});

$('.home-slider').slick({
    dots: false,
    infinite: true,
    autoplaySpeed: 5000,
    speed: 2000,
    fade: true,
    cssEase: 'linear',
    autoplay:true
});

window.onresize = function(){
    initMobileLinkResize();
};

function initMobileMenu(){
    $('#mobile-menu-toggle').click(function(){
        if($('.mobile-nav-links').hasClass('open-mobile-menu')){
            $('.mobile-nav-links').removeClass('open-mobile-menu');
        }else{
            $('.mobile-nav-links').addClass('open-mobile-menu');
        }
    });
    
    $('#close-mobile-menu').click(function(){
        $('.mobile-nav-links').removeClass('open-mobile-menu');
    });
}

function initMobileLinkResize(){
    var windowHeight = $(window).height();
    var linksHeight = $('.mobile-nav-links ul').height();
    var newMargin = (windowHeight - linksHeight)/2;
    $('.mobile-nav-links ul').css("margin-top",newMargin);
}

/* ajax contact form */
$(function() {

    // Get the form.
    var form = $('#ajax-contact');

    // Get the messages div.
    var formMessages = $('#form-messages');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();

        // Serialize the form data.
        var formData = $(form).serialize();

        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData
        })
        .done(function(response) {
            // Make sure that the formMessages div has the 'success' class.
            $(formMessages).removeClass('error');
            $(formMessages).addClass('success');

            // Set the message text.
            $(formMessages).text("Your message was successfully sent.");

            // Clear the form.
            $('#name').val('');
            $('#email').val('');
            $('#message').val('');
            $('#phonenumber').val('');
            $('#citystate').val('');

        })
        .fail(function(data) {
            // Make sure that the formMessages div has the 'error' class.
            $(formMessages).removeClass('success');
            $(formMessages).addClass('error');
            $(formMessages).text("Oops! An error occured and your message could not be sent.");

            // Set the message text.
            if (data.responseText !== '') {
                $(formMessages).text(data.responseText);
            } else {
                $(formMessages).text('Oops! An error occured and your message could not be sent.');
            }
        });

    });

});