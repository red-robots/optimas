<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

$supportEmail = get_field('support_email', 'option');
$address = get_field("address","option");
$antiSpam = antispambot($supportEmail);

// echo '<pre>';
// print_r($antiSpam);
// echo '</pre>';
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="one">
			<div class="col-1">
				<a href="mailto:<?php echo $antiSpam; ?>"><?php echo $antiSpam; ?></a>
			</div><!--.col-1-->
			<div class="col-2">
				© <?php echo date('Y'); ?> by Optimas 
			</div><!--.col-2-->
			<div class="col-3">
				<?php if($address):?>
					<?php echo $address;?>
				<?php endif;?>
			</div><!--.col-3-->
			<div class="clear"></div>
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
