<?php
/**
 * Template Name: Curations Page
 */
new Curations();
$cur_user = wp_get_current_user();
if ($cur_user->ID == 0 or !Curations::$isHaveImages) {
    wp_redirect(home_url());
    exit;
}
if (!$_REQUEST['ajax']) {
    get_header();
};
the_post();
?>

<!-- site__header -->
<header class="site__header site__header_non-pointer">
    <link rel="stylesheet" href="<?php echo TEMPLATEURI ?>/css/limited-art.css">
    <!-- language -->
    <?php echo switch_languages(); ?>
    <!-- /language -->

    <!-- site__menu-btn -->
    <div class="site__menu site__menu_black">

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

</header>
<!-- /site__header -->

<!-- site__content -->
<div class="site__content">

    <!-- art -->
    <div class="art art_curations">

        <!-- art__items -->
        <div class="art__items">

            <!-- art -->
            <h1 class="site__title site__title_3">
                <?php the_title();

                ?>
            </h1>
            <!-- art -->

            <?php if (count(Curations::$limited_categories) > 0) { ?>
                <!-- categories -->
                <div class="categories">


                    <!-- categories__set -->
                    <div class="categories__set categories__set_minimize">
                        <?php echo Curations::showCategories(); ?>
                    </div>
                    <!-- /categories__set -->

                </div>
                <!-- /categories -->
            <?php } ?>
        </div>
        <!-- /art__items -->

        <!-- multi-photos-slider-wrap -->
        <div class="art__sliders">

            <!-- multi-photos-slider -->
            <div class='multi-photos-slider swiper-container'>
                <div class='swiper-wrapper'>
                    <?php
                    $list = '';
                    $current_user = wp_get_current_user();
                    if($current_user->ID!==0){
                        $likes = get_user_likes($current_user->ID);
                    }else{
                        $likes = [];
                    }
                    $sliders = Curations::getCatAndPost('img_categories');

                    foreach ($sliders as $slider) {

                        $list .= "<div class='swiper-slide'>
                        <div class='single-photos-slider swiper-container'>
                            <div class='swiper-wrapper'>";

                        $vertical_array = array();
                        foreach ($slider['posts'] as $img_post) {
                            $img_fields = get_fields($img_post);
                            $img_fields['post_id'] = $img_post;
                            $img_fields['likes'] = $likes;

                            if ($img_fields['img_image_position'] == 2) {
                                $list .= Curations::setLimitedSlider(array($img_fields), false);

                            } else {
                                if (count($vertical_array) >= 1) {
                                    $vertical_array[] = $img_fields;
                                    $list .= Curations::setLimitedSlider($vertical_array, false);
                                    $vertical_array = array();
                                } else {
                                    $vertical_array[] = $img_fields;
                                    continue;
                                }
                            }
                        }
                        if (count($vertical_array) > 0) {
                            $list .= Curations::setLimitedSlider(array($vertical_array[0]), true);
                            $vertical_array = [];
                        }
                        $list .= "</div>
                        <!-- Add Arrows -->
                        <div class='swiper-button-next swiper-button-white'></div>
                        <div class='swiper-button-prev swiper-button-white'></div>
                    </div></div>";
                    }


                    echo $list;
                    ?>
                </div>

            </div>
            <!-- /multi-photos-slider -->

        </div>
        <!-- /multi-photos-slider-wrap -->

    </div>
    <!-- /art -->

</div>
<!-- /site__content -->

<!-- popup -->
<div class="popup">

    <!-- popup__wrap -->
    <div class="popup__wrap">

        <!-- popup__content -->
        <div class="popup__content popup__lightbox">

            <!-- popup__close -->
            <div class="popup__close"></div>
            <!-- /popup__close -->

        </div>
        <!-- /popup__content -->

    </div>
    <!-- /popup__wrap -->

</div>
<!-- /popup -->
<?php
if (!$_REQUEST['ajax']) {
    get_footer();
};
?>
