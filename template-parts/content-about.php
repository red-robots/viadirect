<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-about"); ?>>
	<section class="row-1">
		<header><h1><?php the_title();?></h1></header>
		<div class="copy">
			<?php the_content();?>
		</div><!--.copy-->
	</section><!--.section-1-->
	<div class="row-2">
		<?php $header = get_field("row_2_header");
		if($header):?>
			<header class="row-1"><h2><?php echo $header;?></h2></header>
		<?php endif;?>
		<?php $args = array(
			'posts_per_page'=>-1,
			'post_type'=>'team'
		);
		$query = new WP_Query($args);
		if($query->have_posts()):?>
			<div class="row-2 team clear-bottom">
				<?php $i = 0; 
				while($query->have_posts()):$query->the_post();
					$i++;?>
					<section class="member col-<?php echo $i;?> js-blocks">
						<?php $image = get_field("image");
						$title = get_field("title");
						$linkedin = get_field("linkedin");
						$email = get_field("email");?>
						<div class="row-1 clear-bottom">
							<div class="col-1">
								<?php if($image):?>
									<img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
								<?php endif;?>
							</div><!--.col-1-->
							<div class="col-2">
								<header><h3><?php the_title();?></h3></header>
								<?php if($title):?>
									<div class="title">
										<?php echo $title;?>
									</div><!--.title-->
								<?php endif;?>
								<?php if($email || $linkedin):?>
									<div class="social">
										<?php if($email):?>
											<a href="<?php echo $email;?>">
												<i class="fa-envelope fa"></i>
											</a>
										<?php endif;?>
										<?php if($linkedin):?>
											<a href="<?php echo $linkedin;?>">
												<i class="fa fa-linkedin"></i>
											</a>
										<?php endif;?>
									</div>
								<?php endif;?>
							</div><!--.col-2-->
						</div><!--.row-1-->
						<div class="row-2 copy">
							<?php the_content();?>
						</div><!--.row-2-->
					</section><!--.col-#-->
				<?php endwhile;?>
			</div><!--.row-2-->
			<?php wp_reset_postdata();
		endif;?>
	</div><!---.row-2-->
</article><!-- #post-## -->
