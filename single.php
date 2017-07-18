<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */
get_header(); 
if ( have_posts() ) : the_post();?>
	<?php $image = get_field('banner');
	$content = get_the_content();?>
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
					<?php get_template_part( 'template-parts/content', 'page' );?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</section>
	<?php endif;
	$boxes = get_field("boxes");
	if($boxes):?>
		<section class="boxes <?php if(!$content) echo 'none-above';?>">
			<?php foreach($boxes as $box):?>
				<div class="box">
					<?php if($box['image']):?>
						<img src="<?php echo $box['image']['sizes']['large'];?>" alt="<?php echo $box['image']['alt'];?>">
					<?php endif;
					if($box['title']):?>
						<header><h2><?php echo $box['title'];?></h2></header>
					<?php endif;
					if($box['copy']):?>
						<div class="copy">
							<?php echo $box['copy'];?>
						</div><!--.copy-->
					<?php endif;
					if($box['link']&&$box['link_text']):?>
						<a class="link" href="<?php echo $box['link'];?>">
							<?php echo $box['link_text'];?>
						</a>
					<?php endif;?>
				</div><!--.box-->
			<?php endforeach;?>
		</section><!--.boxes-->
	<?php endif;?>
<?php endif;?>
<?php get_footer();
