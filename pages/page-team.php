<?php
/**
 * Template Name: Our Team
 */

get_header(); 

$image = get_field('banner');

?>
<section class="banner" <?php if($image):
		echo 'style="background-image: url('.$image['url'].');"';
	endif;?>>
		<h1>
			<?php the_title(); ?>
		</h1>
	</section>
<section class="page-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

</section>
<?php $team_section_title = get_field("team_section_title");
$args = array(
	'post_type'=>'team',
	'posts_per_page'=>9,
	'orderby'=>'menu_order',
	'order'=>'ASC'
);
$query = new WP_Query($args);
if($query->have_posts()):?>
	<section class="team">
		<?php if($team_section_title):?>
			<header><h2><?php echo $team_section_title;?></h2></header>
		<?php endif;?>
		<?php while($query->have_posts()): $query->the_post();
			$picture = get_field("picture");
			$title = get_field("title");
			$link_text = get_field("link_text");?>
			<div class="member js-blocks">
				<a class="team-popup-link" href="#<?php echo sanitize_title_with_dashes(preg_replace("/[^a-zA-Z0-9]/","",get_the_title()));?>">
					<?php if($picture):?>
						<img src="<?php echo $picture['sizes']['large'];?>" alt="<?php echo $picture['alt'];?>">
					<?php endif;?>
						<header><h3><?php echo the_title();?></h3></header>
					<?php if($title):?>
						<div class="title">
							<?php echo $title;?>
						</div><!--.copy-->
					<?php endif;
					if($link_text):?>
						<div class="link">
							<?php echo $link_text;?>
						</div><!--.link-->
					<?php endif;?>
				</a>
			</div><!--.member-->
			<div class="hidden">
				<div class="team-popup" id="<?php echo sanitize_title_with_dashes(preg_replace("/[^a-zA-Z0-9]/","",get_the_title()));?>">
					<div class="col-1">
						<?php if($picture):?>
							<img src="<?php echo $picture['sizes']['large'];?>" alt="<?php echo $picture['alt'];?>">
						<?php endif;?>
							<header><h3><?php echo the_title();?></h3></header>
						<?php if($title):?>
							<div class="title">
								<?php echo $title;?>
							</div><!--.copy-->
						<?php endif;?>
					</div><!--.col-1-->
					<div class="col-2">
						<?php the_content();?>
					</div><!--.col-2-->
					<div class="clear"></div>
				</div><!--.team-popup-->
			</div><!--.hidden-->
		<?php endwhile;?>
		<div class="clear"></div>
	</section><!--.team-->
	<?php wp_reset_postdata();
endif;
get_footer();
