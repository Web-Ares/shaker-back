<?php
/**
 * Template Name: Home Page
 */
get_header();
?>
<!--site__content-->
<div class="site__content">

    <?php
    echo do_shortcode('[show_news]');
    echo do_shortcode('[show_about_us]');
    echo do_shortcode('[show_services]');
    echo do_shortcode('[show_company_case]');
    echo do_shortcode('[made_review]');
    echo do_shortcode('[show_clients]');
    echo do_shortcode('[contact_us_link]');
    ?>

</div>
<?php
get_footer();
?>
