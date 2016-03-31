<?php
/**
 * Template Name: Clients page
 */
get_header('second');
?>
    <!--site__content-->
    <div class="site__content">

        <!--site__wrap-->
        <div class="site__wrap">

            <!--clients-list-->
            <div class="clients-list">
                <?php get_clients();?>
            </div>
            <!--/clients-list-->

        </div>
        <!--/site__wrap-->
        <?php
        echo do_shortcode('[contact_us_link]');
        ?>


    </div>
    <!-- /site__content -->
<?php
get_footer();
?>