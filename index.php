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
$tagline = get_field("tagline");
$headline = get_field("headline");
$header_link = get_field("header_link");
$header_link_text = get_field("header_link_text");
if( !empty($image) ): ?>
	<section class="banner home" <?php if($image):
		echo 'style="background-image: url('.$image['url'].');"';
	endif;?>>
		<?php if($headline):?>
			<h2>
				<?php echo $headline; ?>
			</h2>
		<?php endif;
		if($tagline):?>
			<h3>
				<?php echo $tagline; ?>
			</h3>
		<?php endif;?>
		<?php if($header_link && $header_link_text):?>
			<div class="button">
				<a href="<?php echo $header_link;?>">
					<?php echo $header_link_text;?>
				</a>
			</div>
		<?php endif;?>
	</section>
<?php endif;?>
<?php if($content):?>
	<section class="page-content">
		<div id="primary" class="content-area-full">
			<main id="main" class="site-main" role="main">

				<?php the_content(); ?>

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
<?php endif;
get_footer();
