<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">

    <title><?php document_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo TEMPLATEURI; ?>/favicon.ico" type="image/x-icon"/>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php if (is_page() || is_single() || is_singular() || is_404()) {
    the_post();
} ?>
<!--site-->
<div class="site">




