<?php
/**
 * Template Name: Change password Page
 */

$cur_user = wp_get_current_user();
if ($cur_user->ID == 0) {
    wp_redirect(home_url());
    exit;
}

if (empty($_REQUEST['ajax'])) {

    get_header();
};
the_post();
?>

<div class="site__layout" data-href="<?php echo getPostname(get_field('next_page', $post->ID)); ?>" data-scroll="false">
    <!-- site__content -->
    <div class="site__content site__content_pad-bot site__content_center full-height">

        <!-- site__center -->
        <div class="site__center">

            <!-- site__content__inner -->
            <div class="site__content__inner">

                <!-- site__title -->
                <h1 class="site__title site_canvas"><?php the_title(); ?></h1>
                <!-- /site__title -->

                <!-- site__content-text -->
                <div class="site__content-text">

                    <?php echo do_shortcode('[password_form]'); ?>

                </div>
                <!-- /site__content-text -->

            </div>
            <!-- /site__content__inner -->

        </div>
        <!-- /site__center -->

    </div>
    <!-- /site__content -->

</div>

<?php
if (empty($_REQUEST['ajax'])) {

    get_footer();
};
?>
