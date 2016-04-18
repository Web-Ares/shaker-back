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
						<button type="submit" name="set_cat" class="btn btn_2"><?php echo pll__("Submit selection");?></button>
					</div>
					<!-- personal-wish-list__send -->

				</form>

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
