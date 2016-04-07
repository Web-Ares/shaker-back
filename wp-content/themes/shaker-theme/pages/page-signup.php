<?php
/**
 * Template Name: Sign up Page
 */
if(!$_REQUEST['ajax']){
    get_header();
};
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
					<h1 class="site__title">
						Sign up
					</h1>
					<!-- /site__title -->

					<!-- site__content-text -->
					<div class="site__content-text">
						<p>Exclusively access our images & create a wishlist
							for a personal curated selection of photography.</p>

						<!-- enter-form -->
						<form class="enter-form" action="#">
							<input class="site__input" type="text" name="name" placeholder="Name">
							<input class="site__input" type="email" name="email" placeholder="Email">
							<input class="site__input" type="text" name="user-name" placeholder="User Name">

							<!-- enter-form__send -->
							<div class="enter-form__send">
								<button class="btn" type="submit">Create Account</button>
								<span class="enter-form__notice">Your password will be emailed</span>
							</div>
							<!-- /enter-form__send -->

						</form>
						<!-- enter-form -->

					</div>
					<!-- /site__content-text -->

				</div>
				<!-- /site__content__row -->

			</div>
			<!-- /site__content__inner -->

		</div>
		<!-- /site__center -->

		<!-- site__down-link -->
		<a href="#" data-href="<?php echo getPostname(get_field('next_page', $post->ID)); ?>" class="site__down-link link-to-page_left"></a>
		<!-- /site__down-link -->

	</div>
	<!-- /site__content -->

</div>

<?php
if(!$_REQUEST['ajax']){
    get_footer();
};
?>
