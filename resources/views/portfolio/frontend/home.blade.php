<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vertical Slide Gradient Portfolio || Brook Multipurpose Bootstrap4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/brook/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/brook/img/icon.png">

    <!-- Plugins -->
    <link rel="stylesheet" href="/brook/css/bootstrap.min.css">
    <link rel="stylesheet" href="/brook/css/revoulation.css">
    <link rel="stylesheet" href="/brook/css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="/brook/style.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="/brook/css/custom.css">
</head>

<body class="template-color-1 template-font-1 vertical-geadient-home" data-hijacking="off" data-animation="rotate">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Start PReloader -->
<div id="page-preloader" class="page-loading clearfix">
    <div class="page-load-inner">
        <div class="preloader-wrap">
            <div class="wrap-2">
                <div><img src="/brook/img/icons/brook-preloader.gif" alt="Brook Preloader"></div>
            </div>
        </div>
    </div>
</div>
<!-- End PReloader -->

<!-- Wrapper -->
<div id="wrapper" class="wrapper">

    <!-- Header -->
    <header class="br_header header-default header-transparent header-bar position-from--top black-logo--version haeder-fixed-width haeder-fixed-150 headroom--sticky header-mega-menu lg-not-transparent clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="header__wrapper">
                        <!-- Header Left -->
                        <div class="header-left">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="/brook/img/logo/brook-black.png" alt="Brook Images">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--// Header -->

    <!-- Page Conttent -->
    <main class="page-content">
        <!-- Start Vertical Slide -->
        <div class="vertical-slide-gradient-portfolio">

            @php
                $iterator = 0;
            @endphp
            @foreach($categories as $category)
                @php
                    $iterator++;
                @endphp
                <section class="cd-section visible" id="section{{ $iterator }}">
                    <div>
                        <div class="gradient-wrapper">
                            <div class="post-info">
                                <div class="inner">
                                    <div class="main-info">
                                        <div class="main-info-inner">
                                            <h6>{{ $iterator }}/</h6>
                                            <h2><a href="/{{ strtolower($category->value) }}">{{ $category->value }}</a></h2>
                                            <a class="post-read-more" href="/{{ strtolower($category->value) }}">
                                                <span class="btntext">Naar categorie</span>
                                                <span class="btn-icon"></span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="post-feature post-feature--{{ $iterator % 3 + 1 }}">
                                        <div class="post-gradient">
                                            <div class="post-thumbnail">
                                                <!-- TODO: IMAGE -->
                                                <img src="/brook/img/slider/vertical-slide/gradient-1.jpg"
                                                     alt="Multipurpose">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
            <!-- .cd-vertical-nav -->
        </div>
        <!-- End Vertical Slide -->
    </main>
    <!--// Page Conttent -->


</div>


<!--// Wrapper -->

<!-- Js Files -->
<script src="/brook/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/brook/js/vendor/jquery.min.js"></script>
<script src="/brook/js/popper.min.js"></script>
<script src="/brook/js/bootstrap.min.js"></script>
<script src="/brook/js/plugins.js"></script>
<script src="/brook/js/main.js"></script>

<!-- REVOLUTION JS FILES -->
<script src="/brook/js/jquery.themepunch.tools.min.js"></script>
<script src="/brook/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="/brook/js/revolution.extension.actions.min.js"></script>
<script src="/brook/js/revolution.extension.carousel.min.js"></script>
<script src="/brook/js/revolution.extension.kenburn.min.js"></script>
<script src="/brook/js/revolution.extension.layeranimation.min.js"></script>
<script src="/brook/js/revolution.extension.migration.min.js"></script>
<script src="/brook/js/revolution.extension.navigation.min.js"></script>
<script src="/brook/js/revolution.extension.parallax.min.js"></script>
<script src="/brook/js/revolution.extension.slideanims.min.js"></script>
<script src="/brook/js/revolution.extension.video.min.js"></script>
<script src="/brook/js/revoulation.js"></script>

<script>
    jQuery(document).ready(function ($) {
        //variables
        var hijacking = $('body').data('hijacking'),
            animationType = $('body').data('animation'),
            delta = 0,
            scrollThreshold = 5,
            actual = 1,
            animating = false;

        //DOM elements
        var sectionsAvailable = $('.cd-section'),
            verticalNav = $('.cd-vertical-nav'),
            prevArrow = verticalNav.find('a.cd-prev'),
            nextArrow = verticalNav.find('a.cd-next');


        //check the media query and bind corresponding events
        var MQ = deviceType(),
            bindToggle = false;

        bindEvents(MQ, true);

        $(window).on('resize', function () {
            MQ = deviceType();
            bindEvents(MQ, bindToggle);
            if (MQ == 'mobile') bindToggle = true;
            if (MQ == 'desktop') bindToggle = false;
        });

        function bindEvents(MQ, bool) {

            if (MQ == 'desktop' && bool) {
                //bind the animation to the window scroll event, arrows click and keyboard
                if (hijacking == 'on') {
                    initHijacking();
                    $(window).on('DOMMouseScroll mousewheel', scrollHijacking);
                } else {
                    scrollAnimation();
                    $(window).on('scroll', scrollAnimation);
                }
                prevArrow.on('click', prevSection);
                nextArrow.on('click', nextSection);

                $(document).on('keydown', function (event) {
                    if (event.which == '40' && !nextArrow.hasClass('inactive')) {
                        event.preventDefault();
                        nextSection();
                    } else if (event.which == '38' && (!prevArrow.hasClass('inactive') || (
                        prevArrow.hasClass('inactive') && $(window).scrollTop() !=
                        sectionsAvailable.eq(0).offset().top))) {
                        event.preventDefault();
                        prevSection();
                    }
                });
                //set navigation arrows visibility
                checkNavigation();
            } else if (MQ == 'mobile') {
                //reset and unbind
                resetSectionStyle();
                $(window).off('DOMMouseScroll mousewheel', scrollHijacking);
                $(window).off('scroll', scrollAnimation);
                prevArrow.off('click', prevSection);
                nextArrow.off('click', nextSection);
                $(document).off('keydown');
            }
        }

        function scrollAnimation() {
            //normal scroll - use requestAnimationFrame (if defined) to optimize performance
            (!window.requestAnimationFrame) ? animateSection() : window.requestAnimationFrame(animateSection);
        }

        function animateSection() {
            var scrollTop = $(window).scrollTop(),
                windowHeight = $(window).height(),
                windowWidth = $(window).width();

            sectionsAvailable.each(function () {
                var actualBlock = $(this),
                    offset = scrollTop - actualBlock.offset().top;

                //according to animation type and window scroll, define animation parameters
                var animationValues = setSectionAnimation(offset, windowHeight, animationType);

                transformSection(actualBlock.children('div'), animationValues[0], animationValues[1],
                    animationValues[2], animationValues[3], animationValues[4]);
                (offset >= 0 && offset < windowHeight) ? actualBlock.addClass('visible') :
                    actualBlock.removeClass('visible');
            });

            checkNavigation();
        }

        function transformSection(element, translateY, scaleValue, rotateXValue, opacityValue, boxShadow) {
            //transform sections - normal scroll
            element.velocity({
                translateY: translateY + 'vh',
                scale: scaleValue,
                rotateX: rotateXValue,
                opacity: opacityValue,
                boxShadowBlur: boxShadow + 'px',
                translateZ: 0,
            }, 0);
        }

        function initHijacking() {
            // initialize section style - scrollhijacking
            var visibleSection = sectionsAvailable.filter('.visible'),
                topSection = visibleSection.prevAll('.cd-section'),
                bottomSection = visibleSection.nextAll('.cd-section'),
                animationParams = selectAnimation(animationType, false),
                animationVisible = animationParams[0],
                animationTop = animationParams[1],
                animationBottom = animationParams[2];

            visibleSection.children('div').velocity(animationVisible, 1, function () {
                visibleSection.css('opacity', 1);
                topSection.css('opacity', 1);
                bottomSection.css('opacity', 1);
            });
            topSection.children('div').velocity(animationTop, 0);
            bottomSection.children('div').velocity(animationBottom, 0);
        }

        function scrollHijacking(event) {
            // on mouse scroll - check if animate section
            if (event.originalEvent.detail < 0 || event.originalEvent.wheelDelta > 0) {
                delta--;
                (Math.abs(delta) >= scrollThreshold) && prevSection();
            } else {
                delta++;
                (delta >= scrollThreshold) && nextSection();
            }
            return false;
        }

        function prevSection(event) {
            //go to previous section
            typeof event !== 'undefined' && event.preventDefault();

            var visibleSection = sectionsAvailable.filter('.visible'),
                middleScroll = (hijacking == 'off' && $(window).scrollTop() != visibleSection.offset().top) ?
                    true : false;
            visibleSection = middleScroll ? visibleSection.next('.cd-section') : visibleSection;

            var animationParams = selectAnimation(animationType, middleScroll, 'prev');
            unbindScroll(visibleSection.prev('.cd-section'), animationParams[3]);

            if (!animating && !visibleSection.is(":first-child")) {
                animating = true;
                visibleSection.removeClass('visible').children('div').velocity(animationParams[2],
                    animationParams[3], animationParams[4])
                    .end().prev('.cd-section').addClass('visible').children('div').velocity(animationParams[
                    0], animationParams[3], animationParams[4], function () {
                    animating = false;
                    if (hijacking == 'off') $(window).on('scroll', scrollAnimation);
                });

                actual = actual - 1;
            }

            resetScroll();
        }

        function nextSection(event) {
            //go to next section
            typeof event !== 'undefined' && event.preventDefault();

            var visibleSection = sectionsAvailable.filter('.visible'),
                middleScroll = (hijacking == 'off' && $(window).scrollTop() != visibleSection.offset().top) ?
                    true : false;

            var animationParams = selectAnimation(animationType, middleScroll, 'next');
            unbindScroll(visibleSection.next('.cd-section'), animationParams[3]);

            if (!animating && !visibleSection.is(":last-of-type")) {
                animating = true;
                visibleSection.removeClass('visible').children('div').velocity(animationParams[1],
                    animationParams[3], animationParams[4])
                    .end().next('.cd-section').addClass('visible').children('div').velocity(animationParams[
                    0], animationParams[3], animationParams[4], function () {
                    animating = false;
                    if (hijacking == 'off') $(window).on('scroll', scrollAnimation);
                });

                actual = actual + 1;
            }
            resetScroll();
        }

        function unbindScroll(section, time) {
            //if clicking on navigation - unbind scroll and animate using custom velocity animation
            if (hijacking == 'off') {
                $(window).off('scroll', scrollAnimation);
                (animationType == 'catch') ? $('body, html').scrollTop(section.offset().top) : section.velocity(
                    "scroll", {
                        duration: time
                    });
            }
        }

        function resetScroll() {
            delta = 0;
            checkNavigation();
        }

        function checkNavigation() {
            //update navigation arrows visibility
            (sectionsAvailable.filter('.visible').is(':first-of-type')) ? prevArrow.addClass('inactive') :
                prevArrow.removeClass('inactive');
            (sectionsAvailable.filter('.visible').is(':last-of-type')) ? nextArrow.addClass('inactive') :
                nextArrow.removeClass('inactive');
        }

        function resetSectionStyle() {
            //on mobile - remove style applied with jQuery
            sectionsAvailable.children('div').each(function () {
                $(this).attr('style', '');
            });
        }

        function deviceType() {
            //detect if desktop/mobile
            return window.getComputedStyle(document.querySelector('body'), '::before').getPropertyValue(
                'content').replace(/"/g, "").replace(/'/g, "");
        }

        function selectAnimation(animationName, middleScroll, direction) {
            // select section animation - scrollhijacking
            var animationVisible = 'translateNone',
                animationTop = 'translateUp',
                animationBottom = 'translateDown',
                easing = 'ease',
                animDuration = 800;

            switch (animationName) {
                case 'scaleDown':
                    animationTop = 'scaleDown';
                    easing = 'easeInCubic';
                    break;
                case 'rotate':
                    if (hijacking == 'off') {
                        animationTop = 'rotation.scroll';
                        animationBottom = 'translateNone';
                    } else {
                        animationTop = 'rotation';
                        easing = 'easeInCubic';
                    }
                    break;
                case 'gallery':
                    animDuration = 1500;
                    if (middleScroll) {
                        animationTop = 'scaleDown.moveUp.scroll';
                        animationVisible = 'scaleUp.moveUp.scroll';
                        animationBottom = 'scaleDown.moveDown.scroll';
                    } else {
                        animationVisible = (direction == 'next') ? 'scaleUp.moveUp' : 'scaleUp.moveDown';
                        animationTop = 'scaleDown.moveUp';
                        animationBottom = 'scaleDown.moveDown';
                    }
                    break;
                case 'catch':
                    animationVisible = 'translateUp.delay';
                    break;
                case 'opacity':
                    animDuration = 700;
                    animationTop = 'hide.scaleUp';
                    animationBottom = 'hide.scaleDown';
                    break;
                case 'fixed':
                    animationTop = 'translateNone';
                    easing = 'easeInCubic';
                    break;
                case 'parallax':
                    animationTop = 'translateUp.half';
                    easing = 'easeInCubic';
                    break;
            }

            return [animationVisible, animationTop, animationBottom, animDuration, easing];
        }

        function setSectionAnimation(sectionOffset, windowHeight, animationName) {
            // select section animation - normal scroll
            var scale = 1,
                translateY = 100,
                rotateX = '0deg',
                opacity = 1,
                boxShadowBlur = 0;

            if (sectionOffset >= -windowHeight && sectionOffset <= 0) {
                // section entering the viewport
                translateY = (-sectionOffset) * 100 / windowHeight;

                switch (animationName) {
                    case 'scaleDown':
                        scale = 1;
                        opacity = 1;
                        break;
                    case 'rotate':
                        translateY = 0;
                        break;
                    case 'gallery':
                        if (sectionOffset >= -windowHeight && sectionOffset < -0.9 * windowHeight) {
                            scale = -sectionOffset / windowHeight;
                            translateY = (-sectionOffset) * 100 / windowHeight;
                            boxShadowBlur = 400 * (1 + sectionOffset / windowHeight);
                        } else if (sectionOffset >= -0.9 * windowHeight && sectionOffset < -0.1 *
                            windowHeight) {
                            scale = 0.9;
                            translateY = -(9 / 8) * (sectionOffset + 0.1 * windowHeight) * 100 /
                                windowHeight;
                            boxShadowBlur = 40;
                        } else {
                            scale = 1 + sectionOffset / windowHeight;
                            translateY = 0;
                            boxShadowBlur = -400 * sectionOffset / windowHeight;
                        }
                        break;
                    case 'catch':
                        if (sectionOffset >= -windowHeight && sectionOffset < -0.75 * windowHeight) {
                            translateY = 100;
                            boxShadowBlur = (1 + sectionOffset / windowHeight) * 160;
                        } else {
                            translateY = -(10 / 7.5) * sectionOffset * 100 / windowHeight;
                            boxShadowBlur = -160 * sectionOffset / (3 * windowHeight);
                        }
                        break;
                    case 'opacity':
                        translateY = 0;
                        scale = (sectionOffset + 5 * windowHeight) * 0.2 / windowHeight;
                        opacity = (sectionOffset + windowHeight) / windowHeight;
                        break;
                }

            } else if (sectionOffset > 0 && sectionOffset <= windowHeight) {
                //section leaving the viewport - still has the '.visible' class
                translateY = (-sectionOffset) * 100 / windowHeight;

                switch (animationName) {
                    case 'scaleDown':
                        scale = (1 - (sectionOffset * 0.3 / windowHeight)).toFixed(5);
                        opacity = (1 - (sectionOffset / windowHeight)).toFixed(5);
                        translateY = 0;
                        boxShadowBlur = 40 * (sectionOffset / windowHeight);

                        break;
                    case 'rotate':
                        opacity = (1 - (sectionOffset / windowHeight)).toFixed(5);
                        rotateX = sectionOffset * 90 / windowHeight + 'deg';
                        translateY = 0;
                        break;
                    case 'gallery':
                        if (sectionOffset >= 0 && sectionOffset < 0.1 * windowHeight) {
                            scale = (windowHeight - sectionOffset) / windowHeight;
                            translateY = -(sectionOffset / windowHeight) * 100;
                            boxShadowBlur = 400 * sectionOffset / windowHeight;
                        } else if (sectionOffset >= 0.1 * windowHeight && sectionOffset < 0.9 *
                            windowHeight) {
                            scale = 0.9;
                            translateY = -(9 / 8) * (sectionOffset - 0.1 * windowHeight / 9) * 100 /
                                windowHeight;
                            boxShadowBlur = 40;
                        } else {
                            scale = sectionOffset / windowHeight;
                            translateY = -100;
                            boxShadowBlur = 400 * (1 - sectionOffset / windowHeight);
                        }
                        break;
                    case 'catch':
                        if (sectionOffset >= 0 && sectionOffset < windowHeight / 2) {
                            boxShadowBlur = sectionOffset * 80 / windowHeight;
                        } else {
                            boxShadowBlur = 80 * (1 - sectionOffset / windowHeight);
                        }
                        break;
                    case 'opacity':
                        translateY = 0;
                        scale = (sectionOffset + 5 * windowHeight) * 0.2 / windowHeight;
                        opacity = (windowHeight - sectionOffset) / windowHeight;
                        break;
                    case 'fixed':
                        translateY = 0;
                        break;
                    case 'parallax':
                        translateY = (-sectionOffset) * 50 / windowHeight;
                        break;

                }

            } else if (sectionOffset < -windowHeight) {
                //section not yet visible
                translateY = 100;

                switch (animationName) {
                    case 'scaleDown':
                        scale = 1;
                        opacity = 1;
                        break;
                    case 'gallery':
                        scale = 1;
                        break;
                    case 'opacity':
                        translateY = 0;
                        scale = 0.8;
                        opacity = 0;
                        break;
                }

            } else {
                //section not visible anymore
                translateY = -100;

                switch (animationName) {
                    case 'scaleDown':
                        scale = 0;
                        opacity = 0.7;
                        translateY = 0;
                        break;
                    case 'rotate':
                        translateY = 0;
                        rotateX = '90deg';
                        break;
                    case 'gallery':
                        scale = 1;
                        break;
                    case 'opacity':
                        translateY = 0;
                        scale = 1.2;
                        opacity = 0;
                        break;
                    case 'fixed':
                        translateY = 0;
                        break;
                    case 'parallax':
                        translateY = -50;
                        break;
                }
            }

            return [translateY, scale, rotateX, opacity, boxShadowBlur];
        }
    });

    /* Custom effects registration - feature available in the Velocity UI pack */
    //none


</script>

</body>

</html>