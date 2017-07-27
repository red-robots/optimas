<?php
/**
 * Template Name: Our Team
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
					<?php get_template_part( 'template-parts/content', 'page' );?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</section>
	<?php endif;
	$team_section_title = get_field("team_section_title");
	$args = array(
		'post_type'=>'team',
		'posts_per_page'=>-1,
		'orderby'=>'menu_order',
		'order'=>'ASC'
	);
	$query = new WP_Query($args);
	if($query->have_posts()):?>
		<section class="team <?php if(!$content) echo 'none-above';?>">
			<?php if($team_section_title):?>
				<header><h2><?php echo $team_section_title;?></h2></header>
			<?php endif;?>
			<?php $args = array('taxonomy'=>"team_type",'order'=>'ASC','orderby'=>'term_order','hide_empty'=>0);
			$team_types = get_terms($args);
			if(!is_wp_error($team_types)&&is_array($team_types)&&!empty($team_types)):
				foreach($team_types as $term):?>
					<?php $args = array(
						'post_type'=>'team',
						'posts_per_page'=>-1,
						'order'=>'ASC',
						'orderby'=>'menu_order',
						'tax_query'=>array(array(
							'taxonomy'=>'team_type',
							'field'=>'term_id',
							'terms'=>array($term->term_id)
						))
					);
					$query = new WP_Query($args);
					if($query->have_posts()):?>
						<header><h3><?php echo $term->name;?></h3></header>
						<div class="team-type">
							<?php while($query->have_posts()): $query->the_post();
								$picture = get_field("picture");
								$title = get_field("title");
								$link_text = get_field("link_text");?>
								<div class="member clear-bottom">
									<div class="col-1">
										<?php if($picture):?>
											<img src="<?php echo $picture['sizes']['large'];?>" alt="<?php echo $picture['alt'];?>">
										<?php endif;?>
									</div><!--.col-1-->
									<div class="col-2">
										<header>
											<h4>	
												<?php echo the_title();
												if($title):
													echo " - ".$title;
												endif;?>
											</h4>
										</header>
										<div class="copy">
											<?php the_content();?>
										</div><!--.copy-->
									</div><!--.col-2-->
								</div><!--.member-->
							<?php endwhile;?>
						</div><!--.team-type-->
						<?php wp_reset_postdata();
					endif;
				endforeach;
			endif;?>
		</section><!--.team-->
	<?php endif;
endif;
get_footer();
