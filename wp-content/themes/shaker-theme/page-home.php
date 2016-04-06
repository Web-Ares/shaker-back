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
                <img class="logo__index" src="<?php echo TEMPLATEURI;?>/img/logo-index.png" width="406" height="230" alt="Shaker Wiener">
                <img class="logo__index-black" src="<?php echo TEMPLATEURI;?>/img/logo-index-black.png" width="406" height="230" alt="Shaker Wiener">
            </h1>
            <!-- /logo -->

            <?php echo switch_languages();?>

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
            <?php echo home_slider();?>
        <!-- /home-slider -->

        <!-- site__down-link -->
        <a href="#" data-href="php/whatwedo.php" class="site__down-link link-to-page_left">
            <span><?php the_field('footer_text'); ?></span>
        </a>
        <!-- /site__down-link -->

    </div>
    <!-- /site__content -->

</div>
<?php
get_footer();
?>
