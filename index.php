<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); 

// Homepage
$post = get_post(5); 
setup_postdata( $post );

$content = get_the_content();
$image = get_field('banner');
if( !empty($image) ): ?>
	<section class="banner">
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		<h2 class="tagline-home">
			<?php bloginfo('description'); ?>
		</h2>
	</section>
<?php endif;
wp_reset_postdata(); ?>

<section class="page-content">
	<div id="primary" class="content-area-full">
		<main id="main" class="site-main" role="main">

			<?php echo $content; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</section>
<?php
get_footer();
