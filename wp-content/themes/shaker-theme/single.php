<?php wp_redirect(esc_url( home_url( '/' ) )); ?>

<?php if (wp_get_current_user()->exists()) {

    $current_user = wp_get_current_user(); ?>
    <!-- site__header-items -->
    <div class="site__header-items">

        <!--site__header-user-->
        <div class="site__header-user">
            <span><?php echo pll__('Welcome back'); ?></span>
            <span class="site__header-user-name"><?php echo $current_user->display_name; ?></span>
        </div>
        <!--/site__header-user-->

        <?php new Curations();
        if (Curations::$isHaveImages) { ?>
            <!--site__header-curations-->
            <a href="<?php echo get_curation_url(); ?>" class="site__header-curations">
                <?php echo pll__('My Personal Curations'); ?>
            </a>
            <!--/site__header-curations-->
        <?php }; ?>
    </div>
    <!-- /site__header-items -->
<?php } ?>
