<?php
/**
 * Template Name: Login Page
 */
get_header('second_fix');
?>
<!--site__content-->
<div class="site__content">

	<!--client-login-->
	<div class="client-login">

		<!--site__wrap-->
		<div class="site__wrap">

			<!--client-login__form-->
			<div class="client-login__form">
				<?php  echo get_the_content();?>
			</div>
			<!--/client-login__form-->

		</div>
		<!--/site__wrap-->

	</div>
	<!--/client-login-->
	<?php
		echo do_shortcode('[show_clients]');
		echo do_shortcode('[contact_us_link]');
	?>

</div>
<!-- /site__content -->
<?php
	get_footer();
?>
