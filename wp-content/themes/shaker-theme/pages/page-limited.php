<?php
/**
 * Template Name: Limited Page
 */
if(!$_REQUEST['ajax']){
    get_header();
};
the_post();
?>
<div class="site__layout"  data-scroll="false">

    <!-- site__header -->
    <header class="site__header">

        <!-- site__center -->
        <div class="site__center">

            <!--logo-->
            <a href="<?php echo home_url(); ?>" class="logo">
                <img class="logo__inner" src="<?php echo TEMPLATEURI; ?>/img/logo.png" width="208" height="90"
                     alt="Shaker Wiener">
            </a>
            <!-- /logo -->

            <?php echo switch_languages(); ?>

            <!-- site__menu-btn -->
            <div class="site__menu">

                <!-- site__menu-btn -->
                <button class="site__menu-btn">
                    <span></span>
                </button>
                <!-- /site__menu-btn -->

                <!-- site__nav -->
                <?php echo get_menu_items('main_menu'); ?>
                <!-- /site__nav -->

            </div>
            <!-- site__menu-btn -->

        </div>
        <!-- /site__center -->

    </header>
    <!-- /site__header -->

    <!-- site__content -->
    <div class="site__content">

        <!-- site__center -->
        <div class="site__center">

            <!-- art -->
            <div class="art">

                <!-- categories -->
                <div class="categories" data-action="php/categories.php">

                    <!-- categories__set -->
                    <div class="categories__set">
                        <a href='#' class="categories__set-item active" data-slider="0">D. Midenge</a>
                        <a href='#' class="categories__set-item" data-slider="1">G. Lucas</a>
                        <a href='#' class="categories__set-item" data-slider="2">R. Noaami</a>
                        <a href='#' class="categories__set-item" data-slider="3">D. piterson</a>
                        <a href='#' class="categories__set-item" data-slider="4">G. Hofner</a>
                        <a href='#' class="categories__set-item" data-slider="5">D. Midenge</a>
                        <a href='#' class="categories__set-item" data-slider="6">G. Lucas</a>
                        <a href='#' class="categories__set-item" data-slider="7">R. Noaami</a>
                        <a href='#' class="categories__set-item" data-slider="8">D. piterson</a>
                        <a href='#' class="categories__set-item" data-slider="9">G. Hofner</a>
                        <a href='#' class="categories__set-item" data-slider="10">D. Midenge</a>
                        <a href='#' class="categories__set-item" data-slider="11">G. Lucas</a>
                    </div>
                    <!-- /categories__set -->

                    <!-- categories__name -->
                    <div class="categories__name">

                        <!-- categories__btn -->
                        <a href='#' class="categories__btn" data-id='1'>Categories</a>
                        <!-- /categories__btn -->

                    </div>
                    <!-- /categories__name -->

                </div>
                <!-- /categories -->

                <!-- multi-photos-slider-wrap -->
                <div class="art__sliders" data-action="php/limitedart-sliders.php">

                    <!-- multi-photos-slider -->
                    <div class='multi-photos-slider swiper-container'>
                        <div class='swiper-wrapper'>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide swiper-slide_vertical'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide2.jpg)'>

                                                <a href='#' class='single-photos-slider__like liked' data-action='php/like.php' data-id='1'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide2.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='2'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item'  style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like liked' data-action='php/like.php' data-id='3'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='4'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='5'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='6'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='7'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='8'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='9'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='10'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='11'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='12'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='13'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='14'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='15'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='16'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='17'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='18'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='19'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='20'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='21'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='22'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='23'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='24'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='25'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='26'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='27'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='28'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='29'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='30'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='31'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='32'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='33'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='34'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                            <div class='swiper-slide'>

                                <div class='single-photos-slider swiper-container'>
                                    <div class='swiper-wrapper'>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='35'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='36'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                        <div class='swiper-slide'>

                                            <!-- single-photos-slider__item -->
                                            <div class='single-photos-slider__item' style='background-image: url(pic/lim-art-slide1.jpg)'>

                                                <a href='#' class='single-photos-slider__like' data-action='php/like.php' data-id='37'>like</a>

                                                <a href='#' class='single-photos-slider__zoom popup__open' data-popup='lightbox'>zoom</a>

                                                <!-- single-photos-slider__info -->
                                                <div class='single-photos-slider__info'>
                                                    <div>
                                                        <span class='single-photos-slider__author'>Daniella Midenge</span>
                                                        <span class='single-photos-slider__name'>Photo Name</span>
                                                    </div>
                                                    <div>
                                                        <span class='single-photos-slider__price'>5,600 €</span>

                                                        <!-- single-photos-slider__sizes -->
                                                        <div class='single-photos-slider__sizes'>

                                                            <!-- single-photos-slider__sizes-selected -->
                                                            <span class='single-photos-slider__sizes-selected'>10x90 cm</span>
                                                            <!-- /single-photos-slider__sizes-selected -->

                                                            <!-- single-photos-slider__drop -->
                                                            <div class='single-photos-slider__drop'>
                                                                <a class='active' href='#'>10x90 cm</a>
                                                                <a href='#'>110x156 cm</a>
                                                                <a href='#'>250x620 cm</a>
                                                            </div>
                                                            <!-- /single-photos-slider__drop -->

                                                            <!-- single-photos-slider__count -->
                                                                <span class='single-photos-slider__count'>
                                                                    [<span>2</span>/<span>3</span>]
                                                                </span>
                                                            <!-- /single-photos-slider__count -->

                                                        </div>
                                                        <!-- /single-photos-slider__sizes -->

                                                    </div>
                                                </div>
                                                <!-- single-photos-slider__info -->

                                            </div>
                                            <!-- /single-photos-slider__item -->

                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class='swiper-button-next swiper-button-white'></div>
                                    <div class='swiper-button-prev swiper-button-white'></div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /multi-photos-slider -->

                </div>
                <!-- /multi-photos-slider-wrap -->

            </div>
            <!-- /art -->

        </div>
        <!-- /site__center -->

    </div>
    <!-- /site__content -->

    <!-- popup -->
    <div class="popup">

        <!-- popup__wrap -->
        <div class="popup__wrap">

            <!-- popup__content -->
            <div class="popup__content popup__lightbox">

                <!-- popup__close -->
                <div class="popup__close"></div>
                <!-- /popup__close -->

            </div>
            <!-- /popup__content -->

        </div>
        <!-- /popup__wrap -->

    </div>
    <!-- /popup -->

</div>
<link rel="stylesheet" href="<?php echo TEMPLATEURI ?>/css/limited-art.css">


<?php
if(!$_REQUEST['ajax']){
    get_footer();
};
?>
