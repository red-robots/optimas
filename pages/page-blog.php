<?php
/**
 * Template Name: Blog
 */

get_header(); 
if ( have_posts() ) : the_post();

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
	<?php if($content):?>
		<section class="page-content">
			<div id="primary">
				<main id="main" class="site-main" role="main">

					<?php
						get_template_part( 'template-parts/content', 'page' );
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</section>
	<?php endif;?>
	<?php $args = array(
		'post_type'=>'post',
		'posts_per_page'=>10,
		'order'=>'DESC',
		'orderby'=>'date',
		'paged'=>$paged
	);
	$query = new WP_Query($args);
	if($query->have_posts()):?>
		<section class="blog <?php if(!$content) echo 'none-above';?>">
			<div class="posts">
				<?php while($query->have_posts()): $query->the_post();?>
					<div class="post">
						<header>
							<h2><?php the_title();?></h2>
							<h3><?php the_date("M j,Y");?></h3>
						</header>
						<div class="copy">
							<?php the_content('Read More...');?>
						</div><!--.copy-->
					</div><!--.post-->
				<?php endwhile;?>
			</div><!--.posts-->
			<div class="pagi-posts">
				<?php pagi_posts_query($query);?>
			</div><!--.pagi-posts-->
		</section><!--.blog-->
		<?php wp_reset_postdata();
	endif;
endif;
get_footer();
