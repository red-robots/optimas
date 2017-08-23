<?php
/**
 * Template Name: Two Column
 */

get_header();

if(have_posts()): the_post();
	$image = get_field('banner');
	$content = get_the_content();
	?>
	<section class="banner" <?php if($image):
			echo 'style="background-image: url('.$image['url'].');"';
		endif;?>>
			<h1>
				<?php the_title(); ?>
			</h1>
	</section>
	<section class="page-content">
		<div id="primary">
			<main id="main" class="site-main two-col" role="main">				
				<?php if($content):?>
					<?php get_template_part( 'template-parts/content', 'page' );?>
				<?php endif;?>
			</main><!-- #main -->
			<aside class="two-col">
				<?php $aside = get_field("aside");
				if($aside):
					echo $aside;
				endif;?>
			</aside>
			<div class="clear"></div>
		</div><!-- #primary -->
	</section>
<?php endif;
get_footer();
