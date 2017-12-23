<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    	<meta charset="utf-8">
		<meta name="theme-color" content="rgb(120,0,1)">
    	<?php wp_head()?>
		<link rel="icon" type="image/png" href="/wp-content/themes/wowblog/img/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="/wp-content/themes/wowblog/img/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/wp-content/themes/wowblog/img/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="/wp-content/themes/wowblog/img/favicon-192x192.png" sizes="192x192">
		<link href="/wp-content/themes/wowblog/img/favicon-16x16.png" rel="shortcut icon">
		<link rel="alternate" href="https://nearthefire.zzz.com.ua" hreflang="uk-UA">
		<!--<script>
			var polyfilter_scriptpath = '/js/css-filters-polyfill/';
		</script>-->
	</head>
	<body>
		<?php include_once("analyticstracking.php") ?>
	    <nav class="navbar navbar-default" role="navigation">
	        <div class="col-sm-1 col-md-2 new-padding">
	            <div class="navbar-header">
					<a class="button-image hidden-sm hidden-md hidden-lg" id="search-link" href="#">
						<i class="fa fa-search" aria-hidden="true"></i>
					</a>
	            	<button type="button" class="navbar-toggle toogle1 collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<i class="socicon-hearthstone"></i>
					</button>
	            	<div class="logo">
	            		<?php the_custom_logo(); ?>
	            		<a href="<?php bloginfo('url')?>">
	            			<img class="second-logo hidden-xs hidden-sm" src="<?php bloginfo('template_url');?>/img/logo.png" alt="Fire logo">
	            		</a>
	            	</div>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-11 col-md-10 delete-padding">
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	            	<div class="container-fluid">
	                	<?php
						wp_nav_menu( array(
			                'menu'              => 'primary',
			                'theme_location'    => 'primary',
			                'depth'             => 0,
			                'container'         => '',
			                'menu_class'        => 'nav navbar-nav menu',
			                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                'walker'            => new wp_bootstrap_navwalker())
			            );
			            ?>
			            <ul class="nav navbar-nav">
	                    	<li class="user delete-padding col-sm-4 col-md-4">
	                    		<div class="avatar-container delete-padding">
	                    			<?php if (get_currentuserinfo()->user_login == null){?>
									    <div class="registration">
									    	<div class="registration-button">
										    	<a class="col-xs-8" href="<?php echo get_settings('siteurl'); ?>/wp-register.php">Реєстрація</a>
										    </div>
									    </div>
									    <div class="login">
									    	<div class="login-button">
										        <a class="col-xs-4" href="<?php echo get_settings('siteurl'); ?>/wp-login.php">Вхід</a>
										    </div>
									    </div>
									<?php 
										}
									    else{?>
									    	<a href="http://nearthefire.zzz.com.ua/wp-admin/profile.php">
									    		<div class="user-photo col-sm-3">
			                    					<?php echo get_avatar( get_current_user_id(), 64 );?>
			                    					<img src="<?php bloginfo('template_url'); ?>/img/photo_background.png">
			                    				</div>
			                    			</a>
									       	<p class="user-name">Вітаю, 
									       		<a href="http://nearthefire.zzz.com.ua/wp-admin/profile.php"><?php echo get_currentuserinfo()->user_login;?>
									       		</a>
									       	</p>
									       	<a class="exit-button" href="<?php echo wp_logout_url( home_url() ); ?>">
									       		<i class="fa fa-sign-out" aria-hidden="true"></i>
									       	</a>
									       	<?php
									    }
									?>
	                    			<!-- тут стояв той код -->
	                    		</div>
	                    	</li>
	                    	<li class="separator hidden-sm hidden-md hidden-lg">
	                    		<h3 class="menu-caption">Соцмережі</h3>      		
	                    		<div class="col-xs-3 soc-item">
									<a href="https://www.facebook.com/nearthefire" target="_blank">
										<!--<div class="sn-facebook"></div>-->
										<i class="fa fa-facebook" aria-hidden="true"></i>
										<i class="fa fa-square-o facebook-button" aria-hidden="true"></i>
									</a>
	                    		</div>
								<div class="col-xs-3 soc-item">
									<a href="https://t.me/nearthefire" target="_blank">
										<i class="fa fa-telegram" aria-hidden="true"></i>
										<i class="fa fa-square-o telegram-button" aria-hidden="true"></i>
									</a>
	                    		</div>
	                    		<div class="col-xs-3 soc-item">
	                    			<a href="https://www.instagram.com/nearthefire" target="_blank">
	                    				<!--<div class="sn-insta"></div>-->
										<i class="fa fa-instagram" aria-hidden="true"></i>
										<i class="fa fa-square-o instagram-button" aria-hidden="true"></i>
	                    			</a>
	                    		</div>
	                    		<div class="col-xs-3 soc-item">
	                    			<a href="https://twitter.com/near_the_fire" target="_blank">
	                    				<!--<div class="sn-twitter"></div>-->
										<i class="fa fa-twitter" aria-hidden="true"></i>
										<i class="fa fa-square-o twitter-button" aria-hidden="true"></i>
	                    			</a>
	                    		</div>
	                    	</li>
	                	</ul>
	            	</div>
	          	</div>
	        </div>
	    </nav>

	    <div class="search-box">
	    	<div class="container-fluid">
				<form class="form-search" action="<?php bloginfo( 'url' ); ?>" method="get">
					<div class="input-append">
						<p>
							<input type="search" name="s" class="span2 search-query" placeholder="Напиши і знайдеш" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>">
						</p>
			    		<p><button type="submit" class="btn">Знайти</button></p>
			  		</div>
			  	</form>
			</div>
		</div>

		<div class="md-modal md-effect-10 md-trigger" id="modal-10" data-modal="modal-10">
			<div class="md-content">
				<div class="md-border">
				<h3>Новини «Коло вогнища» тепер ще ближче!</h3>
				<p>Указавши свою адресу та прізвисько, щоб я знав, як до тебе звертатися, ти отримуватимеш всі оновлення «Коло вогнища» прямісінько до найближчої таверни!</p>
				<button class="md-trigger" data-modal="modal-4">Підписатися!</button>
				<button id="setCookie" class="md-close">Закрити</button>
				<div class="button-block hidden-xs">
					<a href="https://www.facebook.com/nearthefire/" target="_blank">
						<div class="soc-item new-item">
							<i class="fa fa-facebook" aria-hidden="true"></i>
							<i class="fa fa-square-o facebook-button" aria-hidden="true"></i>
						</div>
					</a>
					<a href="https://t.me/nearthefire" target="_blank">
						<div class="soc-item new-item">
							<i class="fa fa-telegram" aria-hidden="true"></i>
							<i class="fa fa-square-o telegram-button" aria-hidden="true"></i>
						</div>
					</a>
					<a href="https://www.instagram.com/nearthefire/" target="_blank">
						<div class="soc-item new-item">
							<i class="fa fa-instagram" aria-hidden="true"></i>
							<i class="fa fa-square-o instagram-button" aria-hidden="true"></i>
						</div>
					</a>
					<a href="https://twitter.com/near_the_fire" target="_blank">
						<div class="soc-item new-item">
							<i class="fa fa-twitter" aria-hidden="true"></i>
							<i class="fa fa-square-o twitter-button" aria-hidden="true"></i>
						</div>
					</a>
				</div>
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
		<div class="md-overlay"></div>