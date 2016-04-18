<?php
/**
 * Template Name: Forgot Page
 */

if(empty($_REQUEST['ajax'])){
    get_header();
};
the_post();
?>

<div class="site__layout" data-scroll="false">
	<!-- site__content -->
	<div class="site__content site__content_center full-height">

		<!-- site__center -->
		<div class="site__center">

			<!-- site__content__inner -->
			<div class="site__content__inner">

				<!-- site__title -->
				<h1 class="site__title site_canvas"><?php the_title();?></h1>
				<!-- /site__title -->

				<!-- site__content-text -->
				<div class="site__content-text">

					<?php echo do_shortcode('[lostpassword_form]'); ?>

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
