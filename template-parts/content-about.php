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
	<section class="row-1 clear-bottom">
		<?php $today = date('Ymd');
		$args = array(
			'post_type'=>'event',
			'posts_per_page'=>-1,
			'order'=>'ASC',
			'orderby'=>'date',
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'expiration_date',
					'value' => $today,
					'compare' => '>'
				),
				array(
					'key' => 'expiration_date',
					'value' => '',
					'compare' => '='
				),
				array(
					'key' => 'expiration_date',
					'compare' => 'NOT EXISTS'
				),
			)
		);
		$query = new WP_Query($args);?>
		<div class="col-1 copy <?php if($query->have_posts()) echo "two-col";?>">
			<header><h1><?php the_title();?></h1></header>
			<?php the_content();?>
		</div><!--.col-1-->
		<?php if($query->have_posts()):?>
			<div class="col-2">
				<?php $events_title = get_field("events_title");
				if($events_title):?>
					<header><h2><?php echo $events_title;?></h2></header>
				<?php endif;?>
				<?php while($query->have_posts()):$query->the_post();?>
					<div class="event">
						<div class="row-1 clear-bottom">
							<header><h2><?php the_title();?></h2></header>
							<?php $date = get_field("date");
							if($date):?>
								<div class="date">
									<?php echo $date;?>
								</div><!--.date-->
							<?php endif;?>
						</div><!--.row-1-->
						<div class="row-2 clear-bottom">
							<div class="col-1 copy js-blocks">
								<?php the_content();?>
							</div><!--.col-1-->
							<div class="col-2 js-blocks">
								<?php $learn_more_link = get_field("learn_more_link");
								$learn_more_text = get_field("learn_more_text");
								if($learn_more_link&&$learn_more_text):?>
									<a href="<?php echo $learn_more_link;?>" target="_blank">
										<?php echo $learn_more_text;?>
									</a>
								<?php endif;?>
							</div><!--.col-2-->
						</div><!--.row-2-->				
					</div><!--.event-->
				<?php endwhile;?>
			</div><!--.col-2-->
		<?php endif;?>
	</section><!--.section-1-->
	<?php $header = get_field("row_2_header");?>
	<a name="company-leadership"></a>
	<div class="row-2">
		<?php if($header):?>
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
											<a href="mailto:<?php echo $email;?>">
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
