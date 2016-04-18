<?php
/**
 * Template Name: What we do Page
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
                        <span><?php the_title(); ?></span>
                    </h1>
                    <!-- /site__title -->

                    <!-- site__content-text -->
                    <div class="site__content-text">
                        <?php the_content(); ?>
                    </div>
                    <!-- /site__content-text -->

                </div>
                <!-- /site__content__row -->

                <p><?php the_field('bottom_text');?></p>

            </div>
            <!-- /site__content__inner -->

        </div>
        <!-- /site__center -->

        <!-- site__down-link -->
        <a href="#" data-href="<?php echo getPostname(get_field('next_page')); ?>"
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
