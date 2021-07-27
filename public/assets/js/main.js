(function ($) {
    "use strict";

    $(document).ready(function(){

        // toaster js initial
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        // mobile-menu dropdown
        function mobileDropdown() {
            var dropdownBtn = $('.nav-item.dropdown');
            // dropdownBtn.on('click', function(){
                
            // });
            dropdownBtn.find('.nav-link').on('click', function(){
                $(this).siblings('.dropdown-menu').slideToggle(100);
                $(this).parents('.dropdown').siblings().find('.dropdown-menu').slideUp(100);
            });
            
        }

        mobileDropdown();

        // navbar button mobile
        var mobileWrapper = $('.mobile-navbar-wrapper');
        var navbarBtn = $('.header').find('.navbar-toggler');
        navbarBtn.on('click', function(){
            mobileWrapper.toggleClass('open');
            $('.mainmenu').toggleClass('open');
            $(this).toggleClass('close-btn');
        });

        // slick slider
        $('.Vertical-Slider').slick({ 
            autoplay:true,
            autoplaySpeed:2000,
            speed:800,
            slidesToShow:3,
            slidesToScroll:1,
            pauseOnHover:false,
            arrows:false,
            cssEase:'linear',
            vertical:true,
            verticalSwiping:true,
            responsive: [
                {
                    breakpoint: 479,
                    settings: {            
                        autoplaySpeed:2000,
                        speed: 500,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                }
            ]
        });

        // how to work section positioning
        var how_to_works_section = $('.how-to-works');
        var how_to_works_height = how_to_works_section.outerHeight();
        var half_of_how_to_work_section = how_to_works_height / 2;
        var banner_section = $('.banner');
        var header_section = $('.header');
        var header_section_height = header_section.outerHeight();
        
        how_to_works_section.css('margin-top', - half_of_how_to_work_section );
        banner_section.css('padding-bottom', half_of_how_to_work_section + 150 + 'px');
        banner_section.css('padding-top', header_section_height + 150 + 'px');

        
        // modal video
        $(".js-video-button").modalVideo({
			youtube:{
				controls:0,
				nocookie: true
			}
        });

        // gateway slider
        $(".gateway-slider").slick({
            slidesToScroll:1,
            slidesToShow: 1,
            autoplay: true,
            speed: 1000,
            arrows: false,
            infinite: true,
            variableWidth: true,
            autoplay:true,
            autoplaySpeed:1000,
        });


        // testimonial slider
        $(".testi-text-slider").slick({
            autoplay: true,
            speed: 1000,
            arrows: true,
            asNavFor: ".testi-user-slider",
            infinite: true,
        });
        $(".testi-user-slider").slick({
            slidesToShow:3,
            slidesToScroll:1,
            speed: 1000,    
            asNavFor: ".testi-text-slider",
            centerMode: true,
            dots: true,
            draggable: false,
            centerPadding: '0',
            infinite: true,
        });

        // banner slider
        $(".inner-content").slick({
            slidesToScroll:1,
            slidesToShow: 1,
            autoplay: true,
            speed: 1000,
            arrows: true,
            infinite: true,
            autoplay:true,
            autoplaySpeed:1000,
            fade: true
        });

        $('.inner-content').on('beforeChange', function(event, slick, direction){
            $('.banner').removeClass('slide-2');
            $('.banner').removeClass('slide-3');
            if($('.slick-active').hasClass('slide-no-2')) {
                $('.banner').addClass('slide-2');
            } else if ($('.slick-active').hasClass('slide-no-3')) {
                $('.banner').addClass('slide-3');
            }
        });

        // initialize live clock
        const clock = new Clock();
        clock.start();

        // invest package select
        var planIcon = $('.plan-icon');
        var checkIcon = $('.icon-completed').html();
        $(checkIcon).insertBefore('.icon-img');
        planIcon.find('svg').css('display', 'none');
        $('.single-plan').parent().addClass('single-plan-parent');

        $('.price-button').on('click', function(e){
            e.preventDefault();
                $(this).parents('.single-plan-parent').siblings().find('.single-plan').removeClass('active');
                $(this).parents('.single-plan-parent').siblings().find('.single-plan').find('.plan-icon').find('.icon-img').css('display', 'inline-block');
                $(this).parents('.single-plan-parent').siblings().find('.single-plan').find('.plan-icon').find('svg').css('display', 'none');
                $(this).parents('.single-plan-parent').siblings().find('.single-plan').find('.price-button').html('Invest Now');
                $(this).parent().addClass('active');
                $(this).html('Selected');
                $(this).siblings('.plan-icon').find('.icon-img').css('display', 'none');
                $(this).siblings('.plan-icon').find('svg').css('display', 'inline-block');
        });
        
    });
    
    $(window).on('load',function(){
        var preLoder = $(".preloader");
        preLoder.fadeOut(1000);
       
    });
    
    $(window).on('scroll', function(){
        var headerSection = $('.header');
        var backToTopBtn = $('.back-to-top-btn a');

        if ($(window).scrollTop() > 300) {
            headerSection.addClass('header-fixed fadeInDown animated');
            backToTopBtn.addClass('active');
        } else {
            headerSection.removeClass('header-fixed fadeInDown animated');
            backToTopBtn.removeClass('active');
        }
        
    });

}(jQuery));	