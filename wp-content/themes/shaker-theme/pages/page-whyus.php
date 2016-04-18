<?php
/**
 * Template Name: Why us Page
 */
if(empty($_REQUEST['ajax'])){

    get_header();
};
the_post();
?>

<div class="site__layout" data-href="<?php echo getPostname(get_field('next_page',$post->ID));?>">
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
if(empty($_REQUEST['ajax'])){

    get_footer();
};
?>
