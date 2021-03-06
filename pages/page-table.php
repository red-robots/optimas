<?php
/**
 * Template Name: Table
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
	<?php if($content):?>
		<section class="page-content">
			<div id="primary">
				<main id="main" class="site-main" role="main">
					<?php get_template_part( 'template-parts/content', 'page' );?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</section>
	<?php endif;?>
	<?php $table = get_field("table");
	if($table):?>
		<section class="table <?php if(!$content) echo 'none-above';?>">
			<?php $col_1 = [];
			$col_2 = [];
			$col_3 = [];?>
			<div class="desktop">
				<?php foreach($table as $row):
					$image_1 = null;
					$fa_1 = null;
					$text_1 = null;
					$link_1 = null;
					$image_2 = null;
					$fa_2 = null;
					$text_2 = null;
					$link_2 = null;
					$image_3 = null;
					$fa_3 = null;
					$text_3 = null;
					$link_3 = null;
					if($row['image_1']):
						$image_1 = $row['image_1'];
					endif;
					if($row['fa_1']):
						$fa_1 = $row['fa_1'];
					endif;
					if($row['text_1']):
						$text_1 = $row['text_1'];
					endif;
					if($row['link_1']):
						$link_1 = $row['link_1'];
					endif;
					if($row['image_2']):
						$image_2 = $row['image_2'];
					endif;
					if($row['fa_2']):
						$fa_2 = $row['fa_2'];
					endif;
					if($row['text_2']):
						$text_2 = $row['text_2'];
					endif;
					if($row['link_2']):
						$link_2 = $row['link_2'];
					endif;
					if($row['image_3']):
						$image_3 = $row['image_3'];
					endif;
					if($row['fa_3']):
						$fa_3 = $row['fa_3'];
					endif;
					if($row['text_3']):
						$text_3 = $row['text_3'];
					endif;
					if($row['link_3']):
						$link_3 = $row['link_3'];
					endif;
					$col_1[] = $image_1;
					$col_1[] = $fa_1;
					$col_1[] = $text_1;
					$col_1[] = $link_1;
					$col_2[] = $image_2;
					$col_2[] = $fa_2;
					$col_2[] = $text_2;
					$col_2[] = $link_2;
					$col_3[] = $image_3;
					$col_3[] = $fa_3;
					$col_3[] = $text_3;
					$col_3[] = $link_3;?>
					<div class="row">
						<div class="col-1 js-blocks">
							<?php if($image_1!==null || $fa_1!==null):?>
								<div class="col-1">
									<?php if($image_1!==null):?>
										<img src="<?php echo $image_1['sizes']['thumbnail'];?>" alt="<?php $image_1['alt'];?>">
									<?php else: 
										echo $fa_1;
									endif;?>
								</div><!--.col-1-->
							<?php endif;
							if($text_1!==null):?>
								<div class="col-2">
									<?php if($link_1!==null):?>
										<a href="<?php echo $link_1;?>">
											<?php echo $text_1;?>
										</a>
									<?php else:?>
										<?php echo $text_1;?>
									<?php endif;?>
								</div><!--.col-2-->
							<?php endif;?>
						</div><!--.col-1-->
						<div class="col-2 js-blocks">
							<?php if($image_2!==null||$fa_2!==null):?>
								<div class="col-1">
									<?php if($image_2!==null):?>
										<img src="<?php echo $image_2['sizes']['thumbnail'];?>" alt="<?php $image_2['alt'];?>">
									<?php else: 
										echo $fa_2;
									endif;?>
								</div><!--.col-1-->
							<?php endif;
							if($text_2!==null):?>
								<div class="col-2">
									<?php if($link_2!==null):?>
										<a href="<?php echo $link_2;?>">
											<?php echo $text_2;?>
										</a>
									<?php else:?>
										<?php echo $text_2;?>
									<?php endif;?>
								</div><!--.col-2-->
							<?php endif;?>
						</div><!--.col-2-->
						<div class="col-3 js-blocks">
							<?php if($image_3!==null||$fa_3!==null):?>
								<div class="col-1">
									<?php if($image_3!==null):?>
										<img src="<?php echo $image_3['sizes']['thumbnail'];?>" alt="<?php $image_3['alt'];?>">
									<?php else: 
										echo $fa_3;
									endif;?>
								</div><!--.col-1-->
							<?php endif;
							if($text_3!==null):?>
								<div class="col-2">
									<?php if($link_3!==null):?>
										<a href="<?php echo $link_3;?>">
											<?php echo $text_3;?>
										</a>
									<?php else:?>
										<?php echo $text_3;?>
									<?php endif;?>
								</div><!--.col-2-->
							<?php endif;?>
						</div><!--.col-3-->
						<div class="clear"></div>
					</div><!--.row-->
				<?php endforeach;?>
			</div><!--.desktop-->
			<div class="mobile">
				<div class="col-1">
					<?php for($i = 0; $i<count($table)*4; $i=$i+4):?>
						<div class="row js-blocks">
							<?php if($col_1[$i]!==null || $col_1[$i+1]!==null):?>
								<div class="col-1">
									<?php if($col_1[$i]!==null):?>
										<img src="<?php echo $col_1[$i]['sizes']['thumbnail'];?>" alt="<?php $col_1[$i]['alt'];?>">
									<?php else:
										echo $col_1[$i+1];
									endif;?>
								</div><!--.col-1-->
							<?php endif;?>
							<?php if($col_1[$i+2]!==null):?>
								<div class="col-2">
									<?php if($col_1[$i+3]!==null):?>
										<a href="<?php echo $col_1[$i+3];?>">
											<?php echo $col_1[$i+2];?>
										</a>
									<?php else:?>
										<?php echo $col_1[$i+2];?>
									<?php endif;?>
								</div><!--.col-2-->
							<?php endif;?>
						</div><!--.row-->
					<?php endfor; ?>
				</div><!--.col-1-->
				<div class="col-2">
					<?php for($i = 0; $i<count($table)*4; $i=$i+4):?>
						<div class="row js-blocks">
							<?php if($col_2[$i]!==null||$col_2[$i+1]!==null):?>
								<div class="col-1">
									<?php if($col_2[$i]!==null):?>
										<img src="<?php echo $col_2[$i]['sizes']['thumbnail'];?>" alt="<?php $col_2[$i]['alt'];?>">
									<?php else:
										echo $col_2[$i+1];
									endif;?>
								</div><!--.col-1-->
							<?php endif;?>
							<?php if($col_2[$i+2]!==null):?>
								<div class="col-2">
									<?php if($col_2[$i+3]!==null):?>
										<a href="<?php echo $col_2[$i+3];?>">
											<?php echo $col_2[$i+2];?>
										</a>
									<?php else:?>
										<?php echo $col_2[$i+2];?>
									<?php endif;?>
								</div><!--.col-2-->
							<?php endif;?>
						</div><!--.row-->
					<?php endfor; ?>
				</div><!--.col-2-->
				<div class="col-3">
					<?php for($i = 0; $i<count($table)*4; $i=$i+4):?>
						<div class="row js-blocks">
							<?php if($col_3[$i]!==null||$col_3[$i+1]!==null):?>
								<div class="col-1">
									<?php if($col_3[$i]!==null):?>
										<img src="<?php echo $col_3[$i]['sizes']['thumbnail'];?>" alt="<?php $col_3[$i]['alt'];?>">
									<?php else:
										echo $col_3[$i+1];
									endif;?>
								</div><!--.col-1-->
							<?php endif;?>
							<?php if($col_3[$i+2]!==null):?>
								<div class="col-2">
									<?php if($col_3[$i+3]!==null):?>
										<a href="<?php echo $col_3[$i+3];?>">
											<?php echo $col_3[$i+2];?>
										</a>
									<?php else:?>
										<?php echo $col_3[$i+2];?>
									<?php endif;?>
								</div><!--.col-2-->
							<?php endif;?>
						</div><!--.row-->
					<?php endfor; ?>
				</div><!--.col-3-->
			</div><!--.mobile-->
		</section><!--.table-->
	<?php endif;
endif;
get_footer();
