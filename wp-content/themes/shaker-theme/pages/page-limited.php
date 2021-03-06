<?php
/**
 * Template Name: Limited Page
 */
if(empty($_REQUEST['ajax'])){

    get_header();
};
the_post();
?>
<div class="site__layout" data-scroll="false">

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

            <?php if (wp_get_current_user()->exists()) {

                $current_user = wp_get_current_user(); ?>
                <!-- site__header-items -->
                <div class="site__header-items">

                    <!--site__header-user-->
                    <div class="site__header-user">
                        <span><?php echo pll__('Welcome back'); ?></span>
                        <span class="site__header-user-name"><?php echo $current_user->display_name; ?></span>
                    </div>
                    <!--/site__header-user-->

                    <?php new Curations(); if(Curations::$isHaveImages){?>
                    <!--site__header-curations-->
                    <a href="<?php echo get_curation_url(); ?>" class="site__header-curations">
                        <?php echo pll__('My Personal Curations'); ?>
                    </a>
                    <!--/site__header-curations-->
                    <?php }; ?>
                </div>
                <!-- /site__header-items -->
            <?php } ?>

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

            </div>
            <!-- /popup__content -->

        </div>
        <!-- /popup__wrap -->

    </div>
    <!-- /popup -->

</div>
<link rel="stylesheet" href="<?php echo TEMPLATEURI ?>/css/limited-art.css">


<?php
if(empty($_REQUEST['ajax'])){

    get_footer();
};
?>
