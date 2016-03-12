var Sahlstroms = {

    init : function() {
        this.slickSliders();
        this.navLinks();
        this.ajaxForms();
        this.mobileMenu();
        this.happyEaster();
    },

    slickSliders : function() {
        $('#homeSlider').slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 5000,
            speed: 2000,
            fade: true,
            cssEase: 'linear',
            autoplay:true
        });

        $('#brandsSlider').slick({
            dots: false,
            infinite: true,
            autoplaySpeed: 5000,
            speed: 200,
            cssEase: 'linear',
            autoplay:true,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive : [{
                breakpoint: 750,
                settings: {
                    slidesToShow: 2
                }
            },{
                breakpoint: 600,
                settings: {
                    slidesToShow: 1
                }
            }
            ]
        });
    },

    navLinks : function() {
        var $navLinks = $('#navLinks');

        $navLinks.dropit({
            action: 'mouseenter'
        });

        $navLinks.on('click', '.dropit-trigger > a', function(e) {
            e.preventDefault();
        });
    },

    ajaxForms : function() {
        var form = $('#ajax-contact');
        var formMessages = $('#form-messages');
        $(form).submit(function(e) {
            e.preventDefault();

            var formData = $(form).serialize();

            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            })
            .done(function(response) {
                $(formMessages).removeClass('error');
                $(formMessages).addClass('success');
                $(formMessages).text("Your message was successfully sent.");

                $('#name').val('');
                $('#email').val('');
                $('#message').val('');
                $('#phonenumber').val('');
                $('#citystate').val('');
            })
            .fail(function(data) {
                $(formMessages).removeClass('success');
                $(formMessages).addClass('error');
                $(formMessages).text("Oops! An error occured and your message could not be sent.");
                if (data.responseText !== '') {
                    $(formMessages).text(data.responseText);
                } else {
                    $(formMessages).text('Oops! An error occured and your message could not be sent.');
                }
            });
        });
    },

    mobileMenu : function() {
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
    },

    happyEaster : function() {
        var $VanHolder = $('#VanHolder');
        $VanHolder.css('height', $(window).height());
        var egg = new Egg("s,a,h,l,s,t,r,o,m", function() {
            $VanHolder.addClass('move');

            setTimeout(function(){
                $VanHolder.removeClass('move');
            }, 9000);
        }).listen();
    },
};

$(document).ready(function(){
    Sahlstroms.init();
});


