<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-via"); ?>>
	<?php $row_1_sub_heading = get_field("row_1_sub_heading");
	$row_2_heading = get_field("row_2_heading");
	$row_2_copy = get_field("row_2_copy");
	$row_3_heading = get_field("row_3_heading");
	$row_4_heading = get_field("row_4_heading");
	$request_demo_text = get_field("request_demo_text");
	$request_demo_link = get_field("request_demo_link","option");?>
	<div class="row-1">
		<header>
			<h1><?php the_title();?></h1>
			<?php if($row_1_sub_heading):?>
				<div class="sub-heading">
					<?php echo $row_1_sub_heading;?>
				</div><!--.sub-heading-->
			<?php endif;?>
		</header>
	</div><!--.row-1-->
	<section class="row-2 clear-bottom">
		<?php if($row_2_heading):?>
			<header>
				<h2><?php echo $row_2_heading;?></h2>
			</header>
		<?php endif;?>
		<div class="col-1 svg">
			<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 132.14 134.39">
				<defs>
					<style>
					.cls-1 {
						fill: #fff;
					}
					</style>
				</defs>
				<title>Untitled-14</title>
				<path class="cls-1" d="M171,106V77.67q0-27.13-19.47-46.6T104.95,11.6q-27.14,0-46.6,19.47T38.88,77.67V146H67.19V77.67A36.38,36.38,0,0,1,78.25,51a36.37,36.37,0,0,1,26.69-11.06A36.38,36.38,0,0,1,131.64,51,36.38,36.38,0,0,1,142.7,77.67V106Z" transform="translate(-38.88 -11.6)"/>
			</svg>
			<svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 169.9 113.25">
				<defs>
					<style>
					.cls-1 {
						fill: #fff;
					}
					</style>
				</defs>
				<title>lockbottom</title>
				<path class="cls-1" d="M23.13,147.11a13.65,13.65,0,0,0-4.13,10v84.95a14.1,14.1,0,0,0,14.16,14.16H174.74a14.1,14.1,0,0,0,14.16-14.16V157.14A14.08,14.08,0,0,0,175.11,143H32.79A13.62,13.62,0,0,0,23.13,147.11Z" transform="translate(-19 -143)"/>
			</svg>
		</div><!--.col-1-->
		<div class="col-2 copy">
			<?php if($row_2_copy) echo $row_2_copy;?>
		</div><!--.col-2-->
	</section><!--.row-2-->
	<?php if($row_3_heading || ($request_demo_link && $request_demo_text)):?>
		<div class="row-3">
			<?php if($row_3_heading):?>
				<div class="heading">
					<?php echo $row_3_heading;?>
				</div>
			<?php endif;?>
			<?php if($request_demo_link && $request_demo_text):?>
				<div class="button">
					<a href="<?php echo $request_demo_link;?>">
						<?php echo $request_demo_text;?>
					</a>
				</div><!--.button-->
			<?php endif;?>
		</div><!--.row-3-->
	<?php endif;?>
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
						<?php if($icon) echo $icon;?>
						<?php if($heading):?>
							<header>
								<h3><?php echo $heading;?></h3>
							</header>
						<?php endif;?>
						<?php if($copy):?>
							<div class="copy">
								<?php echo $copy;?>
							</div><!--.copy-->
						<?php endif;?>
					</div><!--.box-->
				<?php endif;
			endfor;?>
		</div><!--.box-wrapper-->
		<?php if($request_demo_link && $request_demo_text):?>
			<div class="button">
				<a href="<?php echo $request_demo_link;?>">
					<?php echo $request_demo_text;?>
				</a>
			</div><!--.button-->
		<?php endif;?>
	</section><!--.row-5-->
</article><!-- #post-## -->
