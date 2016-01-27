$('#body').removeClass('no-js');

$(document).ready(function(){
    initMobileMenu();
    initMobileLinkResize();

    $('#homeSlider').slick({
        dots: false,
        infinite: true,
        autoplaySpeed: 5000,
        speed: 2000,
        fade: true,
        cssEase: 'linear',
        autoplay:true
    });

    $('#navLinks').dropit({
        action: 'mouseenter'
    });

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

});

window.onresize = function(){
    initMobileLinkResize();
};

function initMobileMenu(){
    var $mobileNavLinks = $('#mobileNavLinks');

    $('#mobile-menu-toggle').click(function(){
        if($mobileNavLinks.hasClass('open-mobile-menu')){
            $mobileNavLinks.removeClass('open-mobile-menu');
        }else{
            $mobileNavLinks.addClass('open-mobile-menu');
        }
    });
    
    $('#close-mobile-menu').click(function(){
       $mobileNavLinks.removeClass('open-mobile-menu');
    });
}

function initMobileLinkResize(){
    var $mobileNavLinksList = $('#mobileNavLinksList');
    var windowHeight = $(window).height();
    var linksHeight = $mobileNavLinksList.height();
    var newMargin = (windowHeight - linksHeight)/2;
    $mobileNavLinksList.css("margin-top",newMargin);
}
