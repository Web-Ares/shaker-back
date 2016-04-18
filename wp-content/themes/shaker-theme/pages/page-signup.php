<?php
/**
 * Template Name: Sign up Page
 */
if(empty($_REQUEST['ajax'])){

    get_header();
};
the_post();
?>

<div class="site__layout" data-href="<?php echo getPostname(get_field('next_page', $post->ID)); ?>">
     <!-- site__content -->
    <div class="site__content site__content_pad-bot site__content_center full-height">

        <!-- site__center -->
        <div class="site__center">

            <!-- site__content__inner -->
            <div class="site__content__inner">

                <!-- site__content__row -->
                <div class="site__content__row">

                    <!-- site__title -->
                    <h1 class="site__title site_canvas">
                        <?php the_title(); ?>
                    </h1>
                    <!-- /site__title -->

                    <!-- site__content-text -->
                    <div class="site__content-text">
                        <?php the_content(); ?>

                        <?php
                        $cur_slug = pll_current_language('slug');
                        if ($cur_slug == 'de') {
                            echo do_shortcode('[contact-form-7 id="148" title="Registration form" html_class="enter-form"]');
                        } else {
                            echo do_shortcode('[contact-form-7 id="5" title="Registration form" html_class="enter-form"]');
                        }

                        ?>
                        <script>
                            <?php if($_REQUEST['ajax']){?>
                                $('div.wpcf7 > form').wpcf7InitForm();
                            <?php } ?>
                        </script>
                    </div>
                    <!-- /site__content-text -->

                </div>
                <!-- /site__content__row -->

            </div>
            <!-- /site__content__inner -->

        </div>
        <!-- /site__center -->

        <!-- site__down-link -->
        <a href="#" data-href="<?php echo getPostname(get_field('next_page', $post->ID)); ?>"
           class="site__down-link link-to-page_left"></a>
        <!-- /site__down-link -->

    </div>
    <!-- /site__content -->

</div>

<?php
if(empty($_REQUEST['ajax'])){

    get_footer();
};
?>
