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

<div class="site__layout" data-href="<?php echo getPostname(get_field($page));?>">

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
                <?php echo get_menu_items('main_menu'); ?>
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
