<?php
/**
 * Template Name: Limited Page
 */
if (empty($_REQUEST['ajax'])) {

    get_header();
};
the_post();
?>
<div class="site__layout" data-scroll="false">
    <!-- site__content -->
    <div class="site__content">

        <!-- site__center -->
        <div class="site__center">

            <!-- art -->
            <div class="art">

                <!-- categories -->
                <div class="categories" data-action="php/categories.php">
                    <?php
                    $categories = Limitedart::getCategories('get', 'img_categories');
                    echo Limitedart::visualCategor($categories);
                    ?>
                </div>
                <!-- /categories -->

                <!-- multi-photos-slider-wrap -->
                <div class="art__sliders" data-action="">

                    <?php
                    $_GET['data-id'] = 'img_categories';
                    get_template_part('pages/partlimited');
                    ?>


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

                <div class="gallery-full swiper-container">
                    <div class="swiper-wrapper">

                    </div>
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>

            </div>
            <!-- /popup__content -->

        </div>
        <!-- /popup__wrap -->

    </div>
    <!-- /popup -->

</div>
<link rel="stylesheet" href="<?php echo TEMPLATEURI ?>/css/limited-art.css">


<?php
if (empty($_REQUEST['ajax'])) {

    get_footer();
};
?>
