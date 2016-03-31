<?php
add_shortcode('contact_us_link', 'our_contact_us_link');
function our_contact_us_link()
{
    $link_cn = get_field('o_contact_us_link', 'options');
    if ($link_cn)
        return '<div class="contact-us"><a href="'.$link_cn.'">Contact Us</a></div>';
}


?>
