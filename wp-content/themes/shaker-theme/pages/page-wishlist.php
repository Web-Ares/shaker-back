<?php
/**
 * Template Name: Wish list Page
 */


get_header();

the_post();
?>

<div class="site__layout" data-href="<?php echo getPostname(get_field('next_page',$post->ID));?>">
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

				<!-- site__content__row -->
				<div class="site__content__row">

					<!-- site__title -->
					<h1 class="site__title site_canvas">
						<span>Why Us</span>
					</h1>
					<!-- /site__title -->

					<!-- site__content-text -->
					<div class="site__content-text">
						<ul>
							<li>Our portfolio includes renowned artists & young talents.</li>
							<li>We know all the artists personally.</li>
							<li>We offer exclusive access to the artist's studio.</li>
							<li>All works are hand picked by us and our artists.</li>
							<li>All works are signed limited editions.</li>
							<li>Our pictures range between 1,000 € -50,000 €.</li>
							<li>We offer individual image concepts.</li>
						</ul>
					</div>
					<!-- /site__content-text -->

				</div>
				<!-- site__content__row -->

			</div>
			<!-- /site__content__inner -->

		</div>
		<!-- /site__center -->

		<!-- site__down-link -->
		<a href="#" data-href="<?php echo getPostname(get_field('next_page',$post->ID));?>" class="site__down-link link-to-page_left"></a>
		<!-- /site__down-link -->

	</div>
	<!-- /site__content -->

</div>

<?php

    get_footer();

?>
