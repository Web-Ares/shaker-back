<?php
/**
 * Template Name: Wish list Page
 */

$cur_user = wp_get_current_user();
if($cur_user->ID==0){ wp_redirect(home_url()); exit;}
get_header();

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
	<div class="site__content site__content_center full-height">

		<!-- site__center -->
		<div class="site__center">

			<!-- personal-wish-list -->
			<div class="personal-wish-list">

				<!-- site__title -->
				<h1 class="site__title site__title_2 site_canvas">
					<?php the_title(); ?>
				</h1>
				<!-- /site__title -->

				<!-- personal-wish-list__text -->
				<div class="personal-wish-list__text">
					<?php the_content();
						new UserCategories();
					?>
				</div>
				<!-- /personal-wish-list__text -->

				<form action="" method="post">

					<div class="personal-wish-list__layout">

						<?php
						if(isset($_POST['set_cat'])){
							UserCategories::setUserCategories($_POST['categor']);

							UserCategories::setUserWish($_POST['own-wish']);
						}

						UserCategories::categories_form();
						?>


					</div>

					<!-- personal-wish-list__send -->
					<div class="personal-wish-list__send">
						<button type="submit" name="set_cat" class="btn btn_2">Submit selection</button>
					</div>
					<!-- personal-wish-list__send -->

<!--				</form>-->

			</div>
			<!-- /personal-wish-list -->

		</div>
		<!-- /site__center -->

	</div>
	<!-- /site__content -->

</div>

<?php

    get_footer();

?>
