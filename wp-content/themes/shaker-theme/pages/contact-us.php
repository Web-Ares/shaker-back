<?php
/**
 * Template Name: Contact us Page
 */

if (!$_REQUEST['ajax']) {
    get_header();
};
the_post();

?>

<div class="site__layout" data-href="<?php echo getPostname(get_field('next_page', $post->ID)); ?>">
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
    <div class="site__content site__content_pad-bot site__content_center full-height">

        <!-- site__center -->
        <div class="site__center">

            <!-- site__content-inner -->
            <div class="site__content__inner">

                <!-- contact-info -->
                <div class="contact-info">

                    <!-- site__title -->
                    <h1 class="site__title">
                        Contact
                    </h1>
                    <!-- /site__title -->

                    <!-- contact-info__item -->
                    <div class="contact-info__item contact-info__item_right">

                        <!-- contact-info__name -->
                        <h3 class="contact-info__name">
                            Susana Shaker
                        </h3>
                        <!-- /contact-info__name -->

                        <!-- contact-info__place -->
                        <div class="contact-info__place">
                            Frankfurt
                        </div>
                        <!-- /contact-info__place -->

                        <!-- contact-info__signature -->
                        <div class="contact-info__signature">
                            <img src="<?php echo TEMPLATEURI; ?>/pic/signature.png" width="127" height="44" alt="">
                        </div>
                        <!-- /contact-info__signature -->

                        <!-- contact-info__email -->
                        <div class="contact-info__email">
                            <a href="mailto:contact@shaker-artconsulting.com">contact@shaker-artconsulting.com</a>
                        </div>
                        <!-- /contact-info__email -->

                        <!-- contact-info__tel -->
                        <div class="contact-info__tel">
                            <a href="tel:+4915152596195">+49 151 52596195</a>
                        </div>
                        <!-- /contact-info__tel -->

                    </div>
                    <!-- /contact-info__item -->

                    <!-- contact-info__item -->
                    <div class="contact-info__item">

                        <!-- contact-info__name -->
                        <h3 class="contact-info__name">
                            Nicole Wiener
                        </h3>
                        <!-- /contact-info__name -->

                        <!-- contact-info__place -->
                        <div class="contact-info__place">
                            Tel Aviv
                        </div>
                        <!-- /contact-info__place -->

                        <!-- contact-info__signature -->
                        <div class="contact-info__signature">
                            <img src="<?php echo TEMPLATEURI; ?>/pic/signature2.png" width="114" height="55" alt="">
                        </div>
                        <!-- /contact-info__signature -->

                        <!-- contact-info__email -->
                        <div class="contact-info__email">
                            <a href="mailto:contact@wiener-artconsulting.com">contact@wiener-artconsulting.com</a>
                        </div>
                        <!-- /contact-info__email -->

                        <!-- contact-info__tel -->
                        <div class="contact-info__tel">
                            <a href="tel:+97254308317">+97 254 308317</a>
                        </div>
                        <!-- /contact-info__tel -->

                    </div>
                    <!-- /contact-info__item -->

                </div>
                <!-- /contact-info -->

            </div>
            <!-- /site__content__inner -->

        </div>
        <!-- /site__center -->

        <!-- site__down-link -->
        <a href="#" data-href="<?php echo getPostname(get_field('next_page', $post->ID)); ?>" class="site__down-link link-to-page_left"></a>
        <!-- /site__down-link -->

    </div>
    <!-- /site__content -->

</div>

<?php
if (!$_REQUEST['ajax']) {
    get_footer();
};
?>
