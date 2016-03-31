<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<div class="site__content">

    <!-- site__content__caption -->
    <div class="site__content__caption site__content__caption_blog">
        <div>
            <div>
                <h1>
                    <?php echo get_field('title_for_blog', 'options');?>
                    <span class="site__sub-title"><?php echo get_field('subtitle_for_blog', 'options');?></span>
                </h1>
            </div>
        </div>
    </div>
    <!-- /site__content__caption -->
    <!-- content -->
    <div class="content">

        <!-- blog-home -->
        <div class="blog-home">

            <!-- container-fluid -->
            <div class="container-fluid">
                <div class="row">

                    <!-- blog-home__list -->
                    <ul class="blog-home__list">

                        <?php if (have_posts()) : ?>

                            <?php /* The loop */ ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <?php get_template_part('content', 'list'); ?>
                            <?php endwhile; ?>

                            <?php echo adoric_paging_nav(); ?>

                        <?php else : ?>
                            <?php get_template_part('content', 'none'); ?>
                        <?php endif; ?>

                    </ul>
                    <!-- /blog-home__list -->

                </div>
            </div>
            <!-- /container-fluid -->

        </div>
        <!-- /blog-home -->

    </div>
    <!-- /content -->

</div><!-- /site__content -->

<?php get_footer(); ?>
