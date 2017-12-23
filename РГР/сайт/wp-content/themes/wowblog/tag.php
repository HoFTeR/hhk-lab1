<?php get_header(); ?>

<div class="container-fluid">
	<div class="body">
	<?php
		// global $post;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$related_tax = 'post_tag';
		$cats_tags_or_taxes = wp_get_object_terms( $post->ID, $related_tax, array( 'fields' => 'ids' ) );
		$args = array(
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => $related_tax,
					'field' => 'id',
					'include_children' => false, // нужно ли включать посты дочерних рубрик
					'terms' => $cats_tags_or_taxes,
					'operator' => 'IN' // если пост принадлежит хотя бы одной рубрике текущего поста, он будет отображаться в похожих записях, укажите значение AND и тогда похожие посты будут только те, которые принадлежат каждой рубрике текущего поста
				)
			)
		);

		$my_query = new WP_Query($args);
		if($my_query->have_posts() ) { ?>
			<div class="main-caption">
				<h1>Записки із поміткою &#171;<?php single_tag_title(); ?>&#187;</h1>
				<img src="<?php bloginfo('template_url');?>/img/separator.png">
			</div>
		<?php
			while($my_query->have_posts() ) : $my_query->the_post(); ?>
				<div class="col-xs-12 col-sm-4 <?php promote_posts_add_class(); ?>">
					<a href="<?php the_permalink() ?>">
					    <div class="similiar-single">
					        <!--<img class="similiar-single-image" src="<?php the_post_thumbnail('full'); ?>">-->
							<div class="similiar-single-image"><?php the_post_thumbnail('full'); ?></div>
							<h1><?php the_title(); ?></h1>
					    </div>
					</a>
				</div>
			<?php endwhile;
		} else { ?>
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
		<?php 
		}
		wp_reset_query();
	?>
		<div class="col-xs-12 col-sm-6 col-sm-offset-3">
			<?php wp_pagenavi(array( 'query' => $my_query)); ?>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>
</div>

<?php get_footer(); ?>