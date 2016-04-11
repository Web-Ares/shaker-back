<?php
/**
 * Created by PhpStorm.
 * User: iutin
 * Date: 08.04.16
 * Time: 13:13
 */
?>

<?php

$button = esc_sql($_GET['data-id']);

$sliders = Limitedart::getCatAndPost($button);
?>
<!-- multi-photos-slider -->
<div class='multi-photos-slider swiper-container'>
    <div class='swiper-wrapper'>
        <?php
        $list = '';
        $current_user = wp_get_current_user();
        $current_user = wp_get_current_user();
        if($current_user->ID!==0){
            $likes = get_user_likes($current_user->ID);
        }else{
            $likes = [];
        }
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
                    $list .= Limitedart::setLimitedSlider(array($img_fields), false);

                } else {
                    if (count($vertical_array) >= 1) {
                        $vertical_array[] = $img_fields;
                        $list .= Limitedart::setLimitedSlider($vertical_array, false);
                        $vertical_array = array();
                    } else {
                        $vertical_array[] = $img_fields;
                        continue;
                    }
                }
            }
            if (count($vertical_array) > 0) {
                $list .= Limitedart::setLimitedSlider(array($vertical_array[0]), true);
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
