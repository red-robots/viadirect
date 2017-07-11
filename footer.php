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

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row-1">
			<div class="col-1">
				<?php wp_nav_menu( array( 'theme_location' => 'footer') ); ?>
				<?php $telephone = get_field("telephone","option");
				if($telephone):?>
					<div class="telephone">
						<a href="tel:<?php echo preg_replace("/[^0-9]/","",$telephone);?>">
							<?php echo $telephone;?>
						</a>
					</div><!--.telephone-->
				<?php endif;?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php $facebook_link = get_field("facebook_link","option");
				$linkedin_link = get_field("linkedin_link","option");
				if($facebook_link):?>
					<a href="<?php echo $facebook_link;?>">
						<i class="fa fa-facebook"></i>
					</a>
				<?php endif;
				if($linkedin_link):?>
					<a href="<?php echo $linkedin_link;?>">
						<i class="fa fa-linkedin"></i>
					</a>
				<?php endif;?>
			</div><!--.col-2-->
			<div class="col-3">
				<?php $signup_text = get_field("signup_text","option");
				if($signup_text):?>
					<header><h2><?php echo $signup_text;?></h2></header>
				<?php endif;
				//todo insert form?>
			</div><!--.col-3-->
		</div><!--.row-1-->
		<?php $copyright = get_field("copyright","option");
		if($copyright):?>
			<div class="row-2">
				<?php echo $copyright;?>
			</div><!--.row-2-->
		<?php endif;?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
