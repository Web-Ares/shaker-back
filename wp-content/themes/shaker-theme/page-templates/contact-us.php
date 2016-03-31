<?php
/**
 * Template Name: Contact us Page
 */
get_header('second');
?>

    <!--site__content-->
    <div class="site__content">

        <!--contact-form-->
        <div class="contact-form">

            <!--site__wrap-->
            <div class="site__wrap">

                <h2 class="site__title"><?php echo get_field('c_sub_title'); ?> </h2>

                <!--contact-form__form-->
                <div class="contact-form__form" method="post">

                    <?php
                        echo do_shortcode('[contact-form-7 id="26" title="Contact form"]');
                    ?>

                </div>
                <!--/contact-form__form-->

            </div>
            <!--/site__wrap-->

        </div>
        <!--/contact-form-->

        <?php echo do_shortcode('[show_clients]'); ?>
    </div>
    <!-- /site__content -->


<?php
//echo do_shortcode('[contact_us_link]');
get_footer();
?>
