<?php
add_shortcode('contact_us_link', 'our_contact_us_link');
function our_contact_us_link()
{
    $link_cn = get_field('o_contact_us_link', 'options');
    if ($link_cn)
        return '<div class="contact-us"><a href="'.$link_cn.'">Contact Us</a></div>';
}

add_shortcode('show_news', 'our_show_news');
function our_show_news()
{
    if (have_rows('h_news_list')) {
        $news_list = '<div class="infinite-line infinite-line_black" data-speed="50">
                <div class="infinite-line__wrap">
                    <ul class="infinite-line__list">';

        $listCounter = 0;
        while (have_rows('h_news_list')) {
            the_row();
            $news_date = get_sub_field('h_news_date');
            $news = get_sub_field('h_news');
            if( $listCounter == 0 ){
                $news_list.='<li class="infinite-line__item"><div class="news-card"><div>news</div><span>'.$news_date.'</span>'.$news.'</div></li>
            ';
            } else {
                $news_list.='<li class="infinite-line__item"><div class="news-card"><span>'.$news_date.'</span>'.$news.'</div></li>
            ';
            }

            $listCounter++;

        }

        return $news_list.'</div></div>';


//        $news_list = '<div class="news-line">
//                <div class="str3 str_wrap">
//                    <span>
//                        <span>news</span>
//                    </span>
//        ';
//        while (have_rows('h_news_list')) {
//            the_row();
//            $news_date = get_sub_field('h_news_date');
//            $news = get_sub_field('h_news');
//            $news_list.='<div><span>'.$news_date.'</span>'.$news.'</div>
//            ';
//
//        }
//        return $news_list.'</div></div>';
    }
}

add_shortcode('show_about_us', 'our_show_about_us');
function our_show_about_us()
{
    $page_id=get_temp_ID('page-templates/about.php');
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'page',
        'post_status' => 'publish',
        'page_id'=>$page_id
    );
    $q = new WP_Query($args);

    while ( $q->have_posts() ) :
        $q->the_post();
        $excerpt=get_the_excerpt();
        $link = get_the_permalink();

        $post_thumbnail_id = get_post_thumbnail_id(get_the_ID());
        $thumbnail = wp_get_attachment_url( $post_thumbnail_id );

    endwhile;

    wp_reset_query();

    return '
    <div class="made-finance">

                <!--made-finance__text-->
                <div class="made-finance__text">

                    <h3>
                        <span class="gochi">made finance</span>
                        measurable value
                    </h3>

                    <!--site__text-->
                    <p>'.$excerpt.'</p>
                    <!--/site__text-->

                    <!--read-more-->
                    <a class="read-more" href="'.$link.'">Read more</a>
                    <!--/read-more-->

                </div>
                <!--/made-finance__text-->

                <!--made-finance__pic-->
                <div class="made-finance__pic" style="background: url('.$thumbnail.') no-repeat; background-size: cover;"></div>
                <!--/made-finance__pic-->

            </div>
    ';
}

add_shortcode('show_services', 'our_show_services');
function our_show_services()
{

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'services',
        'post_status' => 'publish',
    );
    $q = new WP_Query($args);

    $block_title = get_field('sw_title','options');
    $block_desc = get_field('sw_description','options');
    $text_of_footer = get_field('sw_text_of_footer','options');

    $serv_list='<ul class="made-service__info-list">';
    while ( $q->have_posts() ) :
        $q->the_post();
        $serv_title=get_the_title();
        $link = get_the_permalink();
        $serv_list.='<li>
                                <a href="'.$link.'">'.$serv_title.'</a>
                            </li>';

    endwhile;
    $serv_list.='</ul>';

    wp_reset_query();

    return '
       <div class="made-service">

                <!--site__wrap-->
                <div class="site__wrap">

                    <!--made-service__left-->
                    <div class="made-service__info">

                        <h3>'.$block_title.'</h3>

                        <!--site__text-->
                      '.$block_desc.'
                        <!--/site__text-->

                        <!--made-service__info-list-->
                        '.$serv_list.'
                        <!--/made-service__info-list-->

                    </div>
                    <!--/made-service__left-->

                    <!--made-service__list-->
                    <div class="made-service__list">
                       '.getService().'
                        <span class="gochi">'.$text_of_footer.'</span>

                    </div>
                    <!--/made-service__list-->

                </div>
                <!--/site__wrap-->

            </div>
    ';
}

add_shortcode('show_clients', 'our_show_clients');
function our_show_clients()
{

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'clients',
        'post_status' => 'publish',
    );
    $q = new WP_Query($args);

    $client_list=' <!--logos-line-->
            <div class="infinite-line infinite-line_light" data-speed="50">
                <div class="infinite-line__wrap">
                    <ul class="infinite-line__list">';
    while ( $q->have_posts() ) :
        $q->the_post();
        $client_id=get_the_ID();
        $temp_id=get_temp_ID('page-templates/clients.php');
        $permalink = get_permalink($temp_id);
        $link = $permalink.'#'.$q->post->post_name;
        $t_logo =  wp_get_attachment_image(get_field('t_logo', $client_id), 'tx170');
        $client_list.='<li class="infinite-line__item">
                            <div class="partners-card">
                                <a href="'.$link.'">
                                    '.$t_logo.'
                                </a>
                            </div>
                        </li>';
    endwhile;
    $client_list.='</ul>
                </div></div>
            <!--/logos-line-->';

    wp_reset_query();

    return $client_list;
}

add_shortcode('show_company_case', 'our_company_case');
function our_company_case()
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'case_studies',
        'post_status' => 'publish',
    );
    $q = new WP_Query($args);


    $company_case='<div class="about-company about-company_case"><div class="swiper-container"><div class="swiper-wrapper">';
    while ( $q->have_posts() ) :
        $q->the_post();
        $cs_image =  wp_get_attachment_image_src(get_field('cs_image'), 'full');
        $page_id = get_the_ID();
        $cs_client_id = get_field('cs_client', $page_id);
        $cs_locations = get_field('cs_locations', $page_id);
        $logo = wp_get_attachment_image(get_field('t_logo', $cs_client_id), 'tx170');

        $company_case.='
        <!--swiper-slide-->
                        <div class="swiper-slide">

                            <!--about-company__inner-->
                            <div class="about-company__inner">

                                <!--about-company__pic-moby-->
                                <div class="about-company__pic-moby" style="background: url('.$cs_image[0].'); background-size: cover;"></div>
                                <!--/about-company__pic-moby-->

                                <!--about-company__info-->
                                <div class="about-company__info">

                                    <!--about-company__logo-->
                                    <div class="about-company__logo">
                                        '.$logo.'
                                    </div>
                                    <!--/about-company__logo-->

                                    <span>'.get_the_title().'</span>

                                    <address>'.$cs_locations.'</address>


                                    '.apply_filters('the_content', get_the_excerpt()).'


                                </div>
                                <!--/about-company__info-->

                                <!--about-company__pic-->
                                <div class="about-company__pic">

                                    <!--about-company__check-->
                                    <div class="about-company__check">
                                        <span>
                                            <span>Check out</span>
                                            <span class="gochi">our case study</span>
                                            <a href="'.get_the_permalink().'"><span></span>check</a>
                                        </span>
                                    </div>
                                    <!--/about-company__check-->

                                    <!--about-company__pic-pic-->
                                    <div class="about-company__pic-pic" style="background: url('.$cs_image[0].'); background-size: cover;"></div>
                                    <!--/about-company__pic-pic-->

                                </div>
                                <!--/about-company__pic-->

                            </div>
                            <!--/about-company__inner-->

                        </div>
                        <!--/swiper-slide-->
                        ';

    endwhile;
    $company_case.='</div><div class="swiper-pagination"></div></div></div>';
    wp_reset_query();
    return $company_case;
}

add_shortcode('made_review', 'our_made_review');
function our_made_review()
{
    $q = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'clients'
        )
    );

    $testim = '<div class="made-review">

                <!--swiper-container-->
                <div class="swiper-container swiper-container_autoplay">

                    <!--swiper-wrapper-->
                    <div class="swiper-wrapper">';

    while ($q->have_posts()) :
        $q->the_post();
        $post_id = get_the_ID();
        $visible = get_field('t_display_testimonial_on_widget', $post_id);

        if(!empty($visible)){
            $desc = cut_text(get_field('t_testimonial_content', $post_id));
            $author = get_field('t_author', $post_id);
            $position = get_field('t_position', $post_id);
            $link_id=get_temp_ID('page-templates/testimonials.php');
            $link= get_the_permalink($link_id);
            $testim .= '<!--swiper-slide-->
                        <div class="swiper-slide">

                            <!--made-review__inner-->
                            <div class="made-review__inner">


                                <span>'.$author.'</span>

                                <span>'.$position.'</span>

                                '.$desc.'

                                <!--read-more-->
                                <a href="'.$link.'" class="read-more">Read more</a>
                                <!--/read-more-->

                            </div>
                            <!--/made-review__inner-->

                        </div>
                        <!--/swiper-slide-->';
        }


    endwhile;
    $testim .='</div></div></div>';
    wp_reset_query();
    return $testim;
};
add_shortcode('show_services_footer', 'our_show_services_footer');
function our_show_services_footer()
{

    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'services',
        'post_status' => 'publish',
    );
    $q = new WP_Query($args);

    $serv_list='<ul>';
    while ( $q->have_posts() ) :
        $q->the_post();
        $serv_title=get_the_title();
        $link = get_the_permalink();
        $serv_list.='<li><a href="'.$link.'">'.$serv_title.'</a></li>';

    endwhile;
    $serv_list.='</ul>';

    wp_reset_query();

    return $serv_list;
}


?>
