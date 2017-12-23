<?php get_header()?>

		<!--<div class="md-modal md-effect-10 md-trigger" id="modal-10" data-modal="modal-10">
			<div class="md-content">
				<div class="md-border">
				<h3>Новини «Коло вогнища» тепер ще ближче!</h3>
				<p>Указавши свою адресу та прізвисько, щоб я знав, як до тебе звертатися, ти отримуватимеш всі оновлення «Коло вогнища» прямісінько до найближчої таверни!</p>
				<button class="md-trigger" data-modal="modal-4">Підписатися!</button>
				<button id="setCookie" class="md-close">Закрити</button>
				</div>
			</div>
		</div>
		<div class="md-modal md-new-modal md-effect-4" id="modal-4">
			<div class="md-content new-content-background">
				<div class="md-border new-content-border">
					<div class="widget_wysija_cont html_wysija">
						<div id="msg-form-wysija-html59945a231ca17-2" class="wysija-msg ajax"></div>
						<form id="form-wysija-html59945a231ca17-2" method="post" action="#wysija" class="widget_wysija html_wysija">
							<h3 class="caption-card">Заповни цей документ, щоб кожного тижня отримувати найсвіжішу інформацію зі всесвіту «Військового Ремесла»</h3>
							<p class="wysija-paragraph">
								<div class="form-validation-field-0formError parentFormform-wysija-html59945a231ca17-2 formError" style="opacity: 0.87; position: absolute; top: 85px; left: 642px; margin-top: 0px;"><div class="formErrorContent"><i class="fa fa-info-circle" aria-hidden="true"></i> Необхідно заповнити<br></div></div><input type="text" name="wysija[user][firstname]" class="wysija-input validate[required]" title="Прізвисько" placeholder="Прізвисько" value="" id="form-validation-field-0">
							</p>
							<p class="wysija-paragraph">
								<input type="text" name="wysija[user][email]" class="wysija-input validate[required,custom[email]]" title="Пошта" placeholder="Пошта" value="">
							</p>
							<button class="wysija-submit wysija-submit-field" type="submit">Підписатися!</button>
							<input type="hidden" name="form_id" value="2">
							<input type="hidden" name="action" value="save">
							<input type="hidden" name="controller" value="subscribers">
							<input type="hidden" value="1" name="wysija-page">
							<input type="hidden" name="wysija[user_list][list_ids]" value="3">
						</form>
					</div>
					<button class="md-close close-second">Назад</button>
				</div>
			</div>
		</div>
		<div class="md-overlay"></div>-->

		<div class="container-fluid">
	    	<div class="body">
	    		<div class="main-caption">
		        	<h1>Рекомендовано</h1>
		        	<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
		        </div>
		        <div class="col-xs-12 col-sm-6 delete-padding">
		        	<?php
						$popularpost = new WP_Query(
													array( 
														  'posts_per_page' => 1, 
														  'cat' => '5',
														  'meta_key' => 'post_views_count', 
														  'orderby' => 'post_views_count',
														  'order' => 'DESC' 
														) 
													);
						if( $popularpost->have_posts() ) {
							while ( $popularpost->have_posts() ) : $popularpost->the_post();?>
					        	<a href="<?php the_permalink(); ?>">
					        		<!--<img class="first-card-image" src="<?php the_post_thumbnail('full'); ?>">-->
									<div class="first-card-image"><?php the_post_thumbnail('full'); ?></div>
				      				<div class="first-main-card">
										<h1><?php the_title(); ?></h1>
					       			</div>
					        	</a>
				        	<?php endwhile;
				        } else {?>
							<div style="margin-bottom:15px" class="nothing-was-found-container">
								<div class="col-xs-12">
									<div class="text-message">
										<h3><?php error_text_message(); ?></h3>
									</div>
								</div>
							</div>
						<?php }
					?>
			    </div>
					
					<div class="col-xs-12 col-sm-6 delete-padding">
					<?php
						$popularpost = new WP_Query(
													array( 
														  'posts_per_page' => 4,
														  'cat' => '3,4',
														  'meta_key' => 'post_views_count', 
														  'orderby' => 'post_views_count',
														  'order' => 'ASC' 
														  ) 
													);
						if( $popularpost->have_posts() ) {
							while ( $popularpost->have_posts() ) : $popularpost->the_post();?>
								<div class="col-xs-12 col-sm-6 delete-padding-right delete-padding-left">
									<a href="<?php the_permalink(); ?>">
						  				<div class="second-main-card">
							   				<!--<img class="second-card-image" src="<?php the_post_thumbnail('full'); ?>">-->
											<div class="second-card-image"><?php the_post_thumbnail('full'); ?></div>
											<h1><?php the_title(); ?></h1>
							       		</div>
					        		</a>
								</div>
							<?php endwhile;
						} else {?>
							<div class="nothing-was-found-container">
								<div class="col-xs-12">
									<div class="text-message">
										<h3><?php error_text_message(); ?></h3>
									</div>
								</div>
							</div>
						<?php }
					?>
				</div>

				<div class="col-xs-12">
					<div class="main-caption">
		        		<h1>Деякі новини</h1>
		        		<img src="<?php bloginfo('template_url');?>/img/separator.png" alt="">
		        	</div>
				</div>
				<div class="col-xs-12 delete-padding">
					<?php
					$lastnews = new WP_Query(
												array( 
													  'posts_per_page' => 4, 
													  'category_name' => 'news' 
													  ) 
												);
					if( $lastnews->have_posts() ) {
						while ( $lastnews->have_posts() ) : $lastnews->the_post();?>
							<a href="<?php the_permalink(); ?>">
					    		<div class="news-container">
					    			<div class="col-xs-12 col-sm-3 delete-padding">
					    				<div class="news-container-image">
					    					<?php the_post_thumbnail(); ?>
					    				</div>
					   				</div>
					   				<div class="col-xs-12 col-sm-9">
					    				<h1><?php the_title(); ?></h1>
					    				<div class="hidden-xs">
											<?php
											the_excerpt();
											?>
					    					<!-- <?php //the_excerpt(); ?> -->
						   				</div>
					    			</div>
					    		</div>
							</a>
						<?php endwhile;
					} else {?>
						<div class="nothing-was-found-container">
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
					<?php }?>
				</div>

		        <div class="col-xs-12">
		        	<div class="main-caption">
		        		<h1>Деякі статті</h1>
		        		<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
		        	</div>
		        </div>
				
				<div class="col-xs-12 delete-padding">
			        <?php
						$lastreviews = new WP_Query(
													array( 
														  'posts_per_page' => 6, 
														  'category_name' => 'papers' 
														  ) 
													);
						if( $lastreviews->have_posts() ) {
							while ( $lastreviews->have_posts() ) : $lastreviews->the_post();?>
						        <div class="col-xs-12 col-sm-4 <?php promote_posts_add_class(); ?>">
						        	<a href="<?php the_permalink(); ?>">
						        		<div class="some-review-card">
								   			<!--<img class="some-review-image" src="<?php the_post_thumbnail(); ?>">-->
											<div class="some-review-image"><?php the_post_thumbnail(); ?></div>
											<h1><?php the_title(); ?></h1>
						   				</div>
						   			</a>
						        </div>
					    	<?php endwhile;
					    } else {?>
							<div class="nothing-was-found-container">
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
						<?php }
					?>
				</div>

		        <div class="col-xs-12">
		        	<div class="main-caption">
		        		<h1>Деякі мемуари</h1>
		        		<img src="<?php bloginfo('template_url'); ?>/img/separator.png" alt="">
		        	</div>
		        </div>
				
				<div class="col-xs-12 delete-padding">
			        <?php
						$lastmemoirs = new WP_Query(
													array( 
														  'posts_per_page' => 4, 
														  'category_name' => 'memoirs' 
														  ) 
													);
						if( $lastmemoirs->have_posts() ) {
							while ( $lastmemoirs->have_posts() ) : $lastmemoirs->the_post();?>
					        <div class="col-xs-12 col-sm-6 <?php memoirs_reviews_add_class() ?>">
					        	<a href="<?php the_permalink(); ?>">
					        		<div class="some-text-card">
							   			<!--<img class="some-text-image" src="<?php the_post_thumbnail(); ?>">-->
										<div class="some-text-image"><?php the_post_thumbnail(); ?></div>
										<h1><?php the_title(); ?></h1>
					   				</div>
					   			</a>
					        </div>
					        <?php endwhile;
					     } else {?>
							<div class="nothing-was-found-container">
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
						<?php }
					?>
				</div>
	    	</div>
	    </div>

<?php get_footer()?>
