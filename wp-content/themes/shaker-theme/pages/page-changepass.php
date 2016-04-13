<?php
/**
 * Template Name: Change password Page
 */

$cur_user = wp_get_current_user();
if($cur_user->ID==0){ wp_redirect(home_url()); exit;}

if(empty($_REQUEST['ajax'])){

    get_header();
};
the_post();
?>

<div class="site__layout" data-href="<?php echo getPostname(get_field('next_page',$post->ID));?>"  data-scroll="false">
	<!-- site__header -->
	<header class="site__header">
		<!-- site__center -->
		<div class="site__center">

			<!--logo-->
			<a href="<?php echo home_url();?>" class="logo">
				<img class="logo__inner" src="<?php echo TEMPLATEURI;?>/img/logo.png" width="208" height="90" alt="Shaker Wiener">
			</a>
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
	<div class="site__content site__content_pad-bot site__content_center full-height">

		<!-- site__center -->
		<div class="site__center">

			<!-- site__content__inner -->
			<div class="site__content__inner">

				<!-- site__title -->
				<h1 class="site__title site_canvas"><?php the_title();?></h1>
				<!-- /site__title -->

				<!-- site__content-text -->
				<div class="site__content-text">

					<?php echo do_shortcode('[password_form]');?>

				</div>
				<!-- /site__content-text -->

			</div>
			<!-- /site__content__inner -->

		</div>
		<!-- /site__center -->

	</div>
	<!-- /site__content -->

</div>

<?php
if(empty($_REQUEST['ajax'])){

    get_footer();
};
?>
