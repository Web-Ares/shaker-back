<?php
/**
 * Template Name: Wish list Page
 */

$cur_user = wp_get_current_user();
if($cur_user->ID==0){ wp_redirect(home_url()); exit;}
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
	<div class="site__content site__content_center full-height">

		<!-- site__center -->
		<div class="site__center">

			<!-- personal-wish-list -->
			<div class="personal-wish-list">

				<!-- site__title -->
				<h1 class="site__title site__title_2 site_canvas">
					MY PERSONAL CURATIONS FROM THE ENTIRE GALLERY
				</h1>
				<!-- /site__title -->

				<!-- personal-wish-list__text -->
				<div class="personal-wish-list__text">
					<p>Make a selection with the art you are looking for
						and view your personal curation in your secure space. </p>
				</div>
				<!-- /personal-wish-list__text -->

				<form action="#">

					<div class="personal-wish-list__layout">

						<div>

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check1" id="check1">
								<label for="check1">Architecture</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check2" id="check2">
								<label for="check2">Industrial</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check3" id="check3">
								<label for="check3">Landscape</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check4" id="check4">
								<label for="check4">Fashion</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check5" id="check5">
								<label for="check5">Artistic</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check6" id="check6">
								<label for="check6">Still Life</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check7" id="check7">
								<label for="check7">Animals</label>
							</div>
							<!-- /nice-checkbox -->

						</div>

						<div>

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check8" id="check8">
								<label for="check8">Cars</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check9" id="check9">
								<label for="check9">Provocative</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check10" id="check10">
								<label for="check10">Venice</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check11" id="check11">
								<label for="check11">Paris</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check12" id="check12">
								<label for="check12">New York</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check13" id="check13">
								<label for="check13">Tel Aviv</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check14" id="check14">
								<label for="check14">Sexy</label>
							</div>
							<!-- /nice-checkbox -->

						</div>

						<div>

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check15" id="check15">
								<label for="check15">Woman</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check16" id="check16">
								<label for="check16">Men</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check17" id="check17">
								<label for="check17">Celebrity</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check18" id="check18">
								<label for="check18">Cinematic</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check19" id="check19">
								<label for="check19">Abstract</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check20" id="check20">
								<label for="check20">Back & White</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check21" id="check21">
								<label for="check21">Small Size</label>
							</div>
							<!-- /nice-checkbox -->

						</div>

						<div>

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check22" id="check22">
								<label for="check22">Woman</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check23" id="check23">
								<label for="check23">Men</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check24" id="check24">
								<label for="check24">Celebrity</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- nice-checkbox -->
							<div class="nice-checkbox">
								<input type="checkbox" name="check25" id="check25">
								<label for="check25">Cinematic</label>
							</div>
							<!-- /nice-checkbox -->

							<!-- personal-wish-list__area -->
							<div class="personal-wish-list__area">
								<textarea class="site__area" name="own-wish" id="own-wish" cols="30" rows="10" placeholder="Make Your Own Wish"></textarea>
							</div>
							<!-- /personal-wish-list__area -->

						</div>

					</div>

					<!-- personal-wish-list__send -->
					<div class="personal-wish-list__send">
						<button type="submit" class="btn btn_2">Submit selection</button>
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
