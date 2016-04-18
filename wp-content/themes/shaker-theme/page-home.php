<?php
/**
 * Template Name: Home Page
 */
if(empty($_REQUEST['ajax'])){
    get_header();
};
the_post();
if(wp_get_current_user()->exists()){
    $page = 'auth_next_page';
}else{
    $page = 'next_page';
}
?>

<div class="site__layout site_index" data-href="<?php echo getPostname(get_field($page));?>">

    <!-- site__content -->
    <div class="site__content full-height">

        <!-- home-slider -->
            <?php echo home_slider();?>
        <!-- /home-slider -->

        <?php if( !wp_get_current_user()->exists() ){?>
        <!-- site__down-link -->
        <a href="#" data-href="<?php echo getPostname(get_field('next_page'));?>" class="site__down-link link-to-page_left">
            <span><?php the_field('footer_text'); ?></span>
        </a>
        <!-- /site__down-link -->
        <?php }else{?>
            <!-- site__down-link -->
            <a href="#" data-href="<?php echo getPostname(get_field('auth_next_page'));?>" class="site__down-link link-to-page_left">
                <span><?php the_field('auth_footer_text'); ?></span>
            </a>
            <!-- /site__down-link -->
        <?php }?>

    </div>
    <!-- /site__content -->

</div>
<?php
if(empty($_REQUEST['ajax'])){
    get_footer();
};
?>
