<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); 
	$post = get_post(344);
	setup_postdata($post);
	$image = get_field('banner');?>
	<section class="banner" <?php if($image):
			echo 'style="background-image: url('.$image['url'].');"';
		endif;?>>
			<h1>
				<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?>
			</h1>
	</section>
	<section class="page-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<section class="error-404 not-found">
					<div class="copy">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'acstarter' ); ?></p>
						<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main><!-- #main -->
		</div><!-- #primary -->
	</section><!--.page-content-->
<?php
get_footer();
