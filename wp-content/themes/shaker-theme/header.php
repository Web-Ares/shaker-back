<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">

    <title><?php document_title(); ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href='<?php echo TEMPLATEURI; ?>/img/favicons/favicon-32x32.png'>
    <?php wp_head(); ?>
</head>
<body data-action="<?php echo admin_url('admin-ajax.php'); ?>">

<div class="site__loading"></div>

<!-- site -->
<div class="site <?php getAjax(); ?>">
    <!-- site__header -->
    <header class="site__header <?php get_header_clases(); ?>">

        <?php if (!is_page_template('pages/page-curations.php')) { ?>
        <!-- site__center -->
        <div class="site__center">
            <?php } ?>
            <?php if (!is_page_template('pages/page-curations.php')) { ?>
                <!--logo-->
                <a href="<?php echo home_url(); ?>" class="logo <?php if (is_front_page()) { ?> logo_index <?php }; ?>">
                    <img class="logo__index" src="<?php echo TEMPLATEURI; ?>/img/logo-index.png" width="406"
                         height="230"
                         alt="Shaker Wiener">
                    <img class="logo__index-black" src="<?php echo TEMPLATEURI; ?>/img/logo-index-black.png" width="406"
                         height="230"
                         alt="Shaker Wiener">
                    <img class="logo__inner" src="<?php echo TEMPLATEURI; ?>/img/logo.png" width="208" height="90"
                         alt="Shaker Wiener">
                </a>
                <!-- /logo -->
            <?php } ?>
            <?php if (wp_get_current_user()->exists() && is_page_template('pages/page-limited.php')) {

                $current_user = wp_get_current_user(); ?>
                <!-- site__header-items -->
                <div class="site__header-items">

                    <!--site__header-user-->
                    <div class="site__header-user">
                        <span><?php echo pll__('Welcome back'); ?></span>
                        <span class="site__header-user-name"><?php echo $current_user->display_name; ?></span>
                    </div>
                    <!--/site__header-user-->

                    <?php new Curations();
                    if (Curations::$isHaveImages) { ?>
                        <!--site__header-curations-->
                        <a href="<?php echo get_curation_url(); ?>" class="site__header-curations">
                            <?php echo pll__('My Personal Curations'); ?>
                        </a>
                        <!--/site__header-curations-->
                    <?php }; ?>
                </div>
                <!-- /site__header-items -->
            <?php } ?>

            <!-- language -->
            <?php echo switch_languages(); ?>
            <!-- /language -->

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
            <?php if (!is_page_template('pages/page-curations.php')) { ?>
        </div>
        <!-- /site__center -->
    <?php } ?>


    </header>
    <!-- /site__header -->