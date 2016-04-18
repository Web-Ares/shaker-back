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
<div class="site site_ajax">
    <!-- site__header -->
    <header class="site__header site__header_index">

        <!-- site__center -->
        <div class="site__center">

            <!--logo-->
            <a href="<?php echo home_url(); ?>" class="logo <?php if (is_front_page()) { ?> logo_index <?php }; ?>">
                <img class="logo__index" src="<?php echo TEMPLATEURI; ?>/img/logo-index.png" width="406" height="230"
                     alt="Shaker Wiener">
                <img class="logo__index-black" src="<?php echo TEMPLATEURI; ?>/img/logo-index-black.png" width="406"
                     height="230"
                     alt="Shaker Wiener">
                <img class="logo__inner" src="<?php echo TEMPLATEURI; ?>/img/logo.png" width="208" height="90"
                     alt="Shaker Wiener">
            </a>
            <!-- /logo -->


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

        </div>
        <!-- /site__center -->

    </header>
    <!-- /site__header -->