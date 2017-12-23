<?php get_header()?>

<div class="container-fluid">
	<div class="body">
	<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array( 'paged' => $paged ,'cat' => '5', 'posts_per_page' => '4' );
	$loop = new WP_Query( $args );
	if ($loop->have_posts() ) {
		while ($loop->have_posts()) : $loop->the_post();  // запускаем цикл обхода материалов блога
	?>
	<div class="col-xs-12 col-sm-6 <?php memoirs_reviews_add_class();?>">
		<a href="<?php the_permalink(); ?>">
			<div class="single-link-review">
				<div class="col-xs-12 col-sm-12">
		    		<div class="single-link-review-image">
		    			<?php the_post_thumbnail('full'); ?>
		    		</div>
		    	</div>
		    	<div class="col-xs-12 col-sm-12">
		    		<h1><?php the_title(); ?></h1>
	    			<div class="hidden-xs"><?php the_excerpt()?></div>
		    	</div>
		    </div>
		</a>
	</div>
	<?php endwhile;
	} else {?>
	<div style="margin-top:70px" class="nothing-was-found-container">
		<div class="col-sm-5 hidden-xs">
			<div class="gears">
				<img class="first-gear" src="<?php bloginfo('template_url'); ?>/img/1.png">
				<img class="second-gear" src="<?php bloginfo('template_url'); ?>/img/2.png">
			</div>
		</div>
		<div class="col-xs-12 col-sm-7">
			<div class="text-message">
				<h3><?php error_text_message(); ?></h3>
			</div>
		</div>
	</div>					
	<?php };?>
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<?php wp_pagenavi( array( 'query' => $loop ) );?>
		</div>
	</div>
</div>

<?php get_footer() ?>