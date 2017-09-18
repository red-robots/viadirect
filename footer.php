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
				<?php $telephone_number = get_field("telephone_number","option");
				if($telephone_number):?>
					<div class="telephone-number">
						<a href="tel:<?php echo preg_replace("/[^0-9]/","",$telephone_number);?>">
							<?php echo $telephone_number;?>
						</a>
					</div><!--.telephone-->
				<?php endif;?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php $twitter_link = get_field("twitter_link","option");
				$linkedin_link = get_field("linkedin_link","option");
				if($twitter_link):?>
					<a href="<?php echo $twitter_link;?>" target="_blank">
						<i class="fa fa-twitter"></i>
					</a>
				<?php endif;
				if($linkedin_link):?>
					<a href="<?php echo $linkedin_link;?>" target="_blank">
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
