<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-via-track"); ?>>
	<?php $header_background_image = get_field("header_background_image");
	$row_1_copy = get_field("row_1_copy");
	$row_1_image = get_field("row_1_image");
	$row_2_copy = get_field("row_2_copy");
	$row_4_heading = get_field("row_4_heading");
	$row_6_images = get_field("row_6_images");
	$request_demo_text = get_field("request_demo_text");
	$request_demo_link = get_field("request_demo_link","option");?>
	<div class="header-background-image" <?php
		if($header_background_image):
			echo 'style="background-image: url('.$header_background_image['url'].');"';
		endif;
	?>></div><!--.header-background-image-->
	<div class="row-1">
		<header>
			<div class="wrapper">
				<h1><?php the_title();?></h1>
			</div><!--.wrapper-->
		</header>
		<div class="wrapper clear-bottom">
			<div class="col-1 copy">
				<?php if($row_1_copy) echo $row_1_copy;?>
			</div><!--.col-1-->
			<div class="col-2">
				<?php if($row_1_image):?> 
					<img src="<?php echo $row_1_image['sizes']['large'];?>" alt="<?php echo $row_1_image['alt'];?>">
				<?php endif;?>
			</div><!--.col-2-->
		</div><!--.wrapper-->
		<?php if($request_demo_link && $request_demo_text):?>
			<div class="button">
				<a href="<?php echo $request_demo_link;?>">
					<?php echo $request_demo_text;?>
				</a>
			</div><!--.button-->
		<?php endif;?>
	</div><!--.row-1-->
	<section class="row-2 copy">
		<?php echo $row_2_copy;?>
	</section><!--.row-2-->
	<?php if($row_4_heading):?>
		<div class="row-4">
			<header>
				<h2><?php echo $row_4_heading;?></h2>
			</header>
			<img src="<?php echo get_template_directory_uri()."/images/divot.png";?>" alt="divot">
		</div><!--.row-4-->
	<?php endif;?>
	<section class="row-5">
		<div class="block-wrapper clear-bottom">
			<?php for($i = 1; $i<4; $i++):
				$heading = get_field("row_5_col_{$i}_heading");
				$icon = get_field("row_5_col_{$i}_icon");
				$copy = get_field("row_5_col_{$i}_copy");
				if($heading || $icon || $copy):?>
					<div class="block js-blocks">
						<div class="wrapper">
							<?php if($icon) echo $icon;?>
							<?php if($heading):?>
								<header>
									<h3><?php echo $heading;?></h3>
								</header>
							<?php endif;?>
						</div><!--.wrapper-->
						<?php if($copy):?>
							<div class="copy">
								<?php echo $copy;?>
							</div><!--.copy-->
						<?php endif;?>
					</div><!--.box-->
				<?php endif;
			endfor;?>
		</div><!--.box-wrapper-->
	</section><!--.row-5-->
	<section class="row-6">
		<a name="sample"></a>
		<?php if($row_6_images):?>
			<div class="image-wrapper flexslider">
				<ul class="slides">
					<?php foreach($row_6_images as $row):
						if($row['image']):?>
							<li class="slide">
								<a href="#<?php echo preg_replace("/[^0-9A-Za-z]/","",$row['image']['url']);?>" class="popup">
									<img src="<?php echo $row['image']['sizes']['large'];?>" alt="<?php echo $row['image']['alt'];?>">
								</a>
								<div class="hidden">
									<div class="img-popup" id="<?php echo preg_replace("/[^0-9A-Za-z]/","",$row['image']['url']);?>">
										<img src="<?php echo $row['image']['url'];?>" alt="<?php echo $row['image']['alt'];?>">
									</div><!--.popup-->
								</div><!--.hidden-->
							</li><!--image-->
						<?php endif;
					endforeach;?>
				 </ul><!--.slides-->
			</div><!--image-wrapper-->
		<?php endif;?>
		<?php if($request_demo_link && $request_demo_text):?>
			<div class="button">
				<a href="<?php echo $request_demo_link;?>">
					<?php echo $request_demo_text;?>
				</a>
			</div><!--.button-->
		<?php endif;?>
	</section><!--.row-6-->
</article><!-- #post-## -->
