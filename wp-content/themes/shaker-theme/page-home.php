<?php
/**
 * Template Name: Home Page
 */
get_header();
?>
<div class="site__layout" data-href="php/whatwedo.php">

    <!-- site__header -->
    <header class="site__header site__header_index">

        <!-- site__center -->
        <div class="site__center">

            <!--logo-->
            <h1 class="logo logo_index">
                <img class="logo__index" src="img/logo-index.png" width="406" height="230" alt="Shaker Wiener">
                <img class="logo__index-black" src="img/logo-index-black.png" width="406" height="230" alt="Shaker Wiener">
            </h1>
            <!-- /logo -->

            <!-- language -->
            <div class="language">
                <span>En</span>
                <a href="#">De</a>
            </div>
            <!-- /language -->

            <!-- site__menu-btn -->
            <div class="site__menu">

                <!-- site__menu-btn -->
                <button class="site__menu-btn">
                    <span></span>
                </button>
                <!-- /site__menu-btn -->

                <!-- site__nav -->
                <nav class="site__menu-nav site__menu-nav_ajax">
                    <a href="#" class="site__menu-link" data-href="php/whatwedo.php">What We Do</a>
                    <a href="#" class="site__menu-link" data-href="php/whyus.php">Why Us</a>
                    <a href="#" class="site__menu-link" data-href="php/limitedart.php">Limited Exclusive Art</a>
                    <a href="#" class="site__menu-link" data-href="php/contact.php">Contact</a>
                    <a href="#" class="site__menu-link" data-href="php/login.php">Log In/Sign up</a>
                </nav>
                <!-- /site__nav -->

            </div>
            <!-- site__menu-btn -->

        </div>
        <!-- /site__center -->

    </header>
    <!-- /site__header -->

    <!-- site__content -->
    <div class="site__content full-height">

        <!-- home-slider -->
        <div class="home-slider">

            <!-- Slider main container -->
            <div class="swiper-container">

                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">

                    <!-- Slides -->
                    <div class="home-slider__item swiper-slide" style="background-image: url(pic/index-slide1.jpg)"></div>
                    <div class="home-slider__item swiper-slide" style="background-image: url(pic/index-slide2.jpg)"></div>
                    <div class="home-slider__item swiper-slide" style="background-image: url(pic/index-slide3.jpg)"></div>
                    <div class="home-slider__item swiper-slide" style="background-image: url(pic/index-slide4.jpg)"></div>
                    <div class="home-slider__item home-slider__item_black swiper-slide" style="background-image: url(pic/index-slide5.jpg)"></div>
                    <div class="home-slider__item swiper-slide" style="background-image: url(pic/index-slide6.jpg)"></div>
                    <div class="home-slider__item swiper-slide" style="background-image: url(pic/index-slide7.jpg)"></div>

                </div>

            </div>

        </div>
        <!-- /home-slider -->

        <!-- site__down-link -->
        <a href="#" data-href="php/whatwedo.php" class="site__down-link link-to-page_left">
            <span>Limited Exclusive Art</span>
        </a>
        <!-- /site__down-link -->

    </div>
    <!-- /site__content -->

</div>
<?php
get_footer();
?>
