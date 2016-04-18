<?php
/**
 * Template Name: Contact us Page
 */

if(empty($_REQUEST['ajax'])){

    get_header();
};
the_post();

?>

<div class="site__layout" data-href="<?php echo getPostname(get_field('next_page', $post->ID));  ?>" <?php if (wp_get_current_user()->exists()) {?> data-scroll="false" <?php } ?>>
    <!-- site__content -->
    <div class="site__content site__content_pad-bot site__content_center full-height">

        <!-- site__center -->
        <div class="site__center">

            <!-- site__content-inner -->
            <div class="site__content__inner">

                <!-- contact-info -->
                <div class="contact-info">

                    <!-- site__title -->
                    <h1 class="site__title site_canvas">
                        <?php the_title(); ?>
                    </h1>
                    <!-- /site__title -->
                    <?php
                    $list = "";
                    if (have_rows('contact_info')) {
                        while (have_rows('contact_info')) {
                            the_row();
                            $image = wp_get_attachment_image_src(get_sub_field('image'), 'full');
                            $email = get_sub_field('email');
                            $phone = get_sub_field('phone');
                            $name = get_field('name');
                            $place = get_field('place');
                            if ($list == '') {
                                $class = 'contact-info__item_right';
                            } else {
                                $class = '';
                            }
                            $list .= '<!-- contact-info__item -->
                                        <div class="contact-info__item ' . $class . '">

                                            <!-- contact-info__name -->
                                            <h3 class="contact-info__name">
                                                ' . $name . '
                                            </h3>
                                            <!-- /contact-info__name -->

                                            <!-- contact-info__place -->
                                            <div class="contact-info__place">
                                                ' . $place . '
                                            </div>
                                            <!-- /contact-info__place -->

                                            <!-- contact-info__signature -->
                                            <div class="contact-info__signature">
                                                <img src="' . $image[0] . '" width="127" height="44" alt="">
                                            </div>
                                            <!-- /contact-info__signature -->

                                            <!-- contact-info__email -->
                                            <div class="contact-info__email">
                                                <a href="mailto:' . $email . '">' . $email . '</a>
                                            </div>
                                            <!-- /contact-info__email -->

                                            <!-- contact-info__tel -->
                                            <div class="contact-info__tel">
                                                <a href="tel:' . $phone . '">' . $phone . '</a>
                                            </div>
                                            <!-- /contact-info__tel -->

                                        </div>
                                        <!-- /contact-info__item -->';
                        }
                    }
                    echo $list;
                    ?>

                </div>
                <!-- /contact-info -->

            </div>
            <!-- /site__content__inner -->

        </div>
        <!-- /site__center -->

        <?php

        if (!wp_get_current_user()->exists()) {?>
            <!-- site__down-link -->
            <a href="#" data-href="<?php echo getPostname(get_field('next_page', $post->ID)); ?>"
               class="site__down-link link-to-page_left"></a>
            <!-- /site__down-link -->
        <?php }; ?>
    </div>
    <!-- /site__content -->

</div>

<?php
if(empty($_REQUEST['ajax'])){

    get_footer();
};
?>
