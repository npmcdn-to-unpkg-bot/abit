/*
                              -
                             +Ns
                            +NMMs`
                           oNMMMMy`
                          sMMm/hMMh`
                        `sMMd. `hMMh`  .
                    .dy.yMMd.   `yMMh.om:
                   -mMMNMMh.     `yMMmMMN:
                  -mMMMMMd`       `yMMMMMN/
                 :mMMoyMMd.       `yMMdoNMN+
                :NMN+ `yMMd.     `yMMh. :NMN+
               /NMN+   `sMMd-   .hMMh`   :mMNo
         -+syyhNMN/      oMMmyyydMMy`     -mMMhyyy+-`
       .yNMmddNMMh`      -NMNmddNMMo       sMMNddmNNh-
      `dMN+`  .sMMs     .mMm:`  .yMMo     +MMh-` `:mMN-
      .MMm     .MMm     /MMy     -MMd     hMM:     sMM+
      `hMMs-..:hMNo     `dMN+...:hMN/     :NMd:...+NMm.
       `omNMNNMNd/       .smNNmNNNd:       :hNMNmNMmy.
         `:+o+/-           `:+o+/-           ./+o+:.
*/

AOS.init({
    offset: 100,
    duration: 600,
    easing: 'ease-in-sine',
    delay: 50,
});

jQuery(document).ready(function($) {

// search
    $("header .fa-search").click(function(e) {
        e.preventDefault();
        $("#search-site").slideToggle();
        $(this).toggleClass('fa-times');
    });

// USI Number
    $(".product-addon-your-usi .addon-name").text('Enter your USI').append(' <a class="qusetion" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i></a>');
    $(".product-addon-your-usi").append('<p class="tooltip"><small>Creating a Unique Student Identifier (USI) is quick, easy and free. View a step by step tutorial showing you exactly what you will need to follow to create your USI.</small><br><br><a class="button button-outline" target="_blank" href="https://www.usi.gov.au/students/how-do-i-create-usi">Create your USI</a></p>');
    $(".tooltip").hide();
    $("a.qusetion").click(function(e) {
        e.preventDefault();
        $('.tooltip').slideToggle('fast');
    });

    $('.breadcrumbs a').each(function() {
        if ($(this).text() == 'products') {
            $(this).text('course');
        }
    });

// rellax parallax
    var rellax = new Rellax('.rellax');

// Flipper
    $(".product-category a").flip({
        axis: 'x',
        trigger: 'hover',
        reverse: true
    });

// mobile nav
    $(".icon").click(function() {
        $(".top-menu").toggleClass("top-animate");
        $(".mid-menu").toggleClass("mid-animate");
        $(".bottom-menu").toggleClass("bottom-animate");
        $(".mobile-menu").slideToggle();
        $(this).toggleClass('open');
        $('.mobile-logo').slideToggle('slow');
    });
    /*var window_size = $(document).height();
    $('.mobile-menu').css({'height': window_size + 'px'});*/
    $('.mobile-menu .menu-item-has-children > a').append('&nbsp;&nbsp; <i class="fa fa-plus"></i>');
    $(".mobile-menu .sub-menu").hide();

// Click the + icon to expand the subnav
    $('.mobile-menu .menu-item-has-children .fa').click(function(event) {
        event.preventDefault();
        $(this).closest('li').find(".sub-menu").slideToggle();
        $(this).toggleClass("fa-minus");
    });

// scroll
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 550) {
            $("header").addClass("solid");
        } else {
            $("header").removeClass("solid");
        }
    });

// Sudo Required select dropdown on change.
    $("form.cart").each(function(){
        var $this = $(this);
        if ($this.find("select").length) {
            $(".single_add_to_cart_button", this).attr('disabled', 'disabled');
        }
        $this.find("select").change(function() {
            if ($this.find("select option:selected").val() !== "") {
                $this.find(".single_add_to_cart_button").removeAttr('disabled');
            } else {
                $this.find(".single_add_to_cart_button").attr('disabled', 'disabled');
            }
        }).trigger("change");
    });

// Flickity Sliders
    $('.flickity').flickity({
        setGallerySize: true,
        wrapAround: true,
        pageDots: false,
        prevNextButtons: false,
        autoPlay: 2500
    });
    $('.feature-slider, .slider').flickity({
        setGallerySize: true,
        wrapAround: true,
        pageDots: true,
        prevNextButtons: true,
        autoPlay: 2500
    });

// add sticky sidebar to student page
    $(".sidebar").stick_in_parent();
    $("a.toscroll").on('click', function(e) {
        $('a.toscroll').removeClass('active');
        $(this).addClass('active');
        var url = e.target.href;
        var hash = url.substring(url.indexOf("#") + 1);
        $('html, body').animate({
            scrollTop: $('#' + hash).offset().top
        }, 500);
        return false;
    });

// Fillter click
    function choose_click() {
        $(".choose").click(function(e) {
            e.preventDefault();
            $(".links").slideDown();
            $('.links a').each(function(index) {
                //console.log( index + ': ' + $(this).prop('class') );
                $(this).click(function(e) {
                    $('.links a').show();
                    $(this).hide();
                    $('.choose').text($(this).text());
                    $(".links").slideUp();
                });
            });
        });
    }

// sort location for caourses
    if ($('body').hasClass('post-type-archive-product') || $('body').hasClass('tax-product_cat')) {
        choose_click();
        var categoryPath = window.location.pathname;
        $('.links').prepend('<a href="' + categoryPath + '">All</a>');
        $('.products').mixItUp();
    }

// Blog header filter by category
    if ($('body').hasClass('category') || $('body').hasClass('blog')) {
        choose_click();
        var pathArray = window.location.pathname.split('/');
        $('.links a').each(function(index) {
            if ($(this).prop('class') == pathArray[2]) {
                $(this).hide();
                $('.choose').text($(this).text());
            }
        });
        $('.links').prepend('<a href="/blog/">All</a>');
    }

// sort quotes Community page
    if ($('body').hasClass('page-template-page-community-featured') || $('body').hasClass('tax-quote_location')) {
        choose_click();
        var currentPath = window.location.pathname.split('/');
        $('.links a').each(function(index) {
            if ($(this).prop('class') == currentPath[2]) {
                $(this).hide();
                $('.choose').text($(this).text());
            }
        });
		$('.links').prepend('<a href="/community/">All</a>');
    }


// Fix min height issue flickity
    $(window).bind("load", function() {

        $('.wrap-quote').flickity({
            setGallerySize: true,
            wrapAround: true,
            pageDots: true,
            prevNextButtons: false,
            autoPlay: 4500
        });

        (function teamslider() {
            $('.team-controler a').click(function(e) {
                e.preventDefault();
                var index = $(this).index();
                slider.flickity('select', index);
            });

            function updateNav() {
                var flkty = slider.data('flickity');
                $('.team-controler a').removeClass('active');
                $('.team-controler a:nth-child(' + (flkty.selectedIndex + 1) + ')').addClass('active');
            }

            var slider = $('#team-slider').flickity({
                setGallerySize: true,
                wrapAround: true,
                imagesLoaded: true,
                pageDots: false,
                prevNextButtons: false,
            });
            slider.on('cellSelect', updateNav);
        })();

        (function courseslider() {
            var courseSlider;
            $('#choose_location a').click(function(event) {
                $('#course-slider').removeClass('zipped');
                $('.click-location').removeClass('click-location');
                event.preventDefault();
                courseSlider = $('#course-slider').flickity({
                    setGallerySize: true,
                    wrapAround: true,
                    imagesLoaded: true,
                    pageDots: false,
                    prevNextButtons: false,
                });
                courseSlider.on('cellSelect', courseUpdateNav);
                var index = $(this).index();
                courseSlider.flickity('select', index);
            });

            function courseUpdateNav() {
                var flkty = courseSlider.data('flickity');
                $('#choose_location a').removeClass('active');
                $('#choose_location a:nth-child(' + (flkty.selectedIndex + 1) + ')').addClass('active');
            }
        })();
    });
});

/* Infinite Scroll + Masonry + ImagesLoaded
---------------------------------------------*/
jQuery(function($) {

    // Main content container
    var $container = $('#content');

    // Masonry + ImagesLoaded
    $container.imagesLoaded(function() {
        $container.masonry({
            // selector for entry content
            columnWidth: '.grid-sizer',
            itemSelector: '.article-post',
            percentPosition: true
        });
    });

    // Infinite Scroll
    $container.infinitescroll({

            // selector for the paged navigation (it will be hidden)
            navSelector: ".wp-pagenavi",
            // selector for the NEXT link (to page 2)
            nextSelector: ".nextpostslink",
            // selector for all items you'll retrieve
            itemSelector: ".article-post",

            // finished message
            loading: {
                finishedMsg: 'No more pages to load.'
            }
        },

        // Trigger Masonry as a callback
        function(newElements) {
            // hide new items while they are loading
            var $newElems = $(newElements).css({
                opacity: 0
            });
            // ensure that images load before adding to masonry layout
            $newElems.imagesLoaded(function() {
                // show elems now they're ready
                $newElems.animate({
                    opacity: 1
                });
                $container.masonry('appended', $newElems, true);
            });
        });

    /**
     * OPTIONAL!
     * Load new pages by clicking a link
     */

    /*	// Pause Infinite Scroll
	$(window).unbind('.infscr');

	// Resume Infinite Scroll
	$('.nextpostslink').click(function(){
		$container.infinitescroll('retrieve');
		return false;
	});*/

});
