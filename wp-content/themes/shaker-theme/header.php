<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">

    <title><?php document_title(); ?></title>
    <link rel="icon" type="image/png" sizes="32x32" href='<?php echo TEMPLATEURI; ?>/img/favicons/favicon-32x32.png' >
    <?php wp_head(); ?>
</head>
<body data-action="<?php echo admin_url( 'admin-ajax.php' );?>">

<div class="site__loading"></div>

<!-- site -->
<div class="site site_ajax">