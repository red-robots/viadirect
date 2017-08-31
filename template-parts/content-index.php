<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
    <?php $row_1_image = get_field("row_1_image");?>
    <div class="row-1" <?php if($row_1_image):
        echo 'style="background-image: url('.$row_1_image['url'].');"';
    ?>>
        <div class="row-1">
            <header>
                <?php $row_1_text = get_field("row_1_text");
                $row_1_title = get_field("row_1_title");
                if($row_1_title):?>
                    <h2><?php echo $row_1_title;?></h2>
                <?php endif;
                if($row_1_text):?>
                    <h3><?php echo $row_1_text;?></h3>
                <?php endif;?>
            </header>
        </div><!--.row-1-->
        <section class="row-2">
            <div class="row-1 clear-bottom">
                <?php for($i=1;$i<4;$i++):?>
                    <div class="block js-blocks block-<?php echo $i;?>">
                        <div class="wrapper">
                            <?php $title = get_field("row_2_box_{$i}_title");
                            $copy = get_field("row_2_box_{$i}_copy");
                            $link_text = get_field("row_2_box_{$i}_link_text");
                            $link = get_field("row_2_box_{$i}_link");?>
                            <?php if($title):?>
                                <header>
                                    <h3>
                                        <?php echo $title;?>
                                    </h3>
                                </header>
                            <?php endif;?>
                            <?php if($copy):?>
                                <div class="copy">
                                    <?php echo $copy;?>
                                </div><!--.copy-->
                            <?php endif;?>
                            <?php if($link&&$link_text):?>
                                <a class="link" href="<?php echo $link;?>">
                                    <?php echo $link_text;?>
                                </a>
                            <?php endif;?>
                        </div><!--.wrapper-->
                    </div><!--block-i-->
                <?php endfor;?>
            </div><!--.row-1-->
            <?php $row_2_text = get_field("row_2_text");?>
            <?php if($row_2_text):?>
                <div class="row-2">
                    <?php echo $row_2_text;?>
                </div><!--.row-2-->
            <?php endif;?>
        </section><!--.row-2-->
    </div><!--.row-1-->
    <section class="row-2">
        <?php $request_demo_text = get_field("request_demo_text","option");
		$request_demo_link = get_field("request_demo_link","option");
        $row_3_title = get_field("row_3_title");
        $row_3_copy = get_field("row_3_copy");
        $row_3_image = get_field("row_3_image");
        if($request_demo_link&&$request_demo_text):?>
            <div class="button-top">
                <a href="<?php echo $request_demo_link;?>">
                    <?php echo $request_demo_text;?>
                </a>
            </div><!--.button-->
        <?php endif;
        if($row_3_title);?>
            <header><h2><?php echo $row_3_title;?></h2></header>
        <?php endif;
        if($row_3_copy):?>
            <div class="spacer"></div>
            <div class="copy">
                <?php echo $row_3_copy;?>
            </div><!--.copy-->
        <?php endif;
        if($row_3_image):?>
            <img class="banner" src="<?php echo $row_3_image['url'];?>" alt="<?php echo $row_3_image['alt'];?>">
        <?php endif;
        if($request_demo_link&&$request_demo_text):?>
            <div class="button-bottom">
                <a href="<?php echo $request_demo_link;?>">
                    <?php echo $request_demo_text;?>
                </a>
            </div><!--.button-->
        <?php endif;?>
    </section><!--.row-2-->
    <?php $args = array(
        'post_type'=>'testimonial',
        'posts_per_page'=>10,
        'orderby'=>'date',
        'order'=>'desc'
    );
    $query = new WP_Query($args);
    if($query->have_posts()):?>
        <section class="row-3">
            <?php $row_4_title = get_field("row_4_title");
            if($row_4_title):?>
                <header><h2><?php echo $row_4_title;?></h2></header>
                <div class="spacer"></div>
            <?php endif;?>
            <div id="flexslider" class="testimonials flexslider">
                <ul class="slides">
                    <?php while($query->have_posts()): $query->the_post();?>
                        <li>
                            <div class="wrapper">
                                <div class="wrapper">
                                    <div class="wrapper">
                                        <div class="copy">
                                            <?php the_content();?>
                                        </div><!--.copy-->
                                        <?php $title = get_field("title");
                                        $name = get_field("name");
                                        if($name || $title):?>
                                            <div class="spacer"></div><!--.spacer-->
                                            <header>
                                                <?php if($name):?>
                                                    <h2><?php echo $name;?></h2>
                                                <?php endif;
                                                if($title):?>
                                                    <h3><?php echo $title;?></h3>
                                                <?php endif;?>
                                            </header>  
                                        <?php endif;?>
                                    </div><!--.wrapper-->
                                </div><!--.wrapper-->
                            </div><!--.wrapper-->
                        </li>
                    <?php endwhile;?>
                </ul>
            </div><!--testimonials-->
        </section>
        <?php $post = get_post(40);
        setup_postdata($post);
    endif;?>
</article><!-- #post-## -->
