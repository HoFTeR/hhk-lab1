<?php
	function wowblog_setup(){
	
	load_theme_textdomain('wowblog');
	
	add_theme_support('title-tag');
	
	add_theme_support('custom-logo', 
		array(
			'height'=> 278,
			'width'=> 277, 
			'flex-height'=>true
		));
		
	add_theme_support( 'custom-background');
	
	add_theme_support('post-thumbnails');

	update_option('thumbnail_size_h', 683);
	
	
	// set_post_thumbnail_size(100%,100%);
	
	add_theme_support('html5', 
		array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
		)
	);
	
	add_theme_support('post-formats', 
		array(
		'aside',
		'image',
		'video',
		'gallery'
		)
	);
	

	register_nav_menu('primary', 'Primary');
	}

	add_action('after_setup_theme', 'wowblog_setup');
    if ( ! function_exists( 'wowblog_setup' ) ):
        function wowblog_setup() {  
            register_nav_menu( 'primary', __( 'Primary', 'wowblog' ) );
        } endif;

    require_once('wp-bootstrap-navwalker.php');
 
    function load_styles_scripts() {
 
    	// Bootstrap stylesheet.
 
    	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), ' ' );

		//Modal window

		wp_enqueue_style( 'default-modal', get_template_directory_uri() . '/css/default.css', array(), ' ' );

		wp_enqueue_style( 'component-modal', get_template_directory_uri() . '/css/component.css', array(), ' ' );
 
	    //Mytheme stylesheet.
 
	    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array(), ' ' );

   		//Font Awesome

    	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), ' ' );

		//Hearthstone
		
		wp_enqueue_style( 'hearthstone-font', get_template_directory_uri() . '/socicon/style.css', array(), ' ' );
 
    	//Bootstrap js
 
    	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), ' ' );

    	wp_enqueue_script('totop-button', get_template_directory_uri() . '/js/ToTopButton.js', array('jquery'));

    	wp_enqueue_script('404-error', get_template_directory_uri() . '/js/404-fadein-text.js', array('jquery'));

    	wp_enqueue_script('speech-bubble', get_template_directory_uri() . '/js/search-bubble.js', array('jquery'));

		wp_enqueue_script('search-box', get_template_directory_uri() . '/js/search-box.js', array('jquery'));

    	//for subscribe

    	wp_enqueue_script( 'validationEngine-uk', get_template_directory_uri() . '/subscribe/jquery.validationEngine-uk.js', array('jquery'), ' ' );

    	wp_enqueue_script( 'validationEngine', get_template_directory_uri() . '/subscribe/jquery.validationEngine.js', array('jquery'), ' ' );

    	wp_enqueue_script( 'front-subscribers', get_template_directory_uri() . '/subscribe/front-subscribers.js', array('jquery'), ' ' );
    	
		// wp_register_script('dropcaps', get_template_directory_uri() . '/js/dropcaps.js', array('jquery'), ' ' );

    	wp_register_script('dropcaps', get_template_directory_uri() . '/js/dropcaps.js', array('jquery'));

    	//dropcaps for single.php
    	if (is_single()){
			wp_enqueue_script('dropcaps');
 		}

		//Modal window sripts
		wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'));

		wp_enqueue_script('cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'));

		wp_enqueue_script('classie', get_template_directory_uri() . '/js/classie.js', array('jquery'));

		wp_enqueue_script('modal-effects', get_template_directory_uri() . '/js/modalEffects.js', array('jquery'));

		wp_enqueue_script('css-parser', get_template_directory_uri() . '/js/cssParser.js', array('jquery'));

		//wp_enqueue_script('css-filters-poly', get_template_directory_uri() . '/js/css-filters-polyfill/css-filters-polyfill.js', array('jquery'));

		wp_enqueue_script('time-delay', get_template_directory_uri() . '/js/timeDelay.js', array('jquery'));

	}
	add_action('wp_enqueue_scripts', 'load_styles_scripts');

	add_filter('nav_menu_css_class', 'add_menu_item_class');

	function add_menu_item_class ( $classes ){
	  $classes[] = 'col-sm-2 col-md-2 delete-padding';
	  return $classes;
	}

	//single views
	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0";
	    }
	    return $count;
	}

	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}

	//single views in admin panel

	add_filter('manage_posts_columns', 'posts_column_views');
	add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
	function posts_column_views($defaults){
	    $defaults['post_views'] = __('переглядів');
	    return $defaults;
	}
	function posts_custom_column_views($column_name, $id){
	    if($column_name === 'post_views'){
	        echo getPostViews(get_the_ID());
	    }
	}

	//turn off admin panel 
	if (!current_user_can('administrator')):
	  show_admin_bar(false);
	endif;

	//change login form
	function custom_login_css() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login/login-styles.css" />';
	}
	add_action('login_head', 'custom_login_css');

	//function to add to even or odd posts another classes
	// function posts_add_class() {
	//   global $post_num;
	//   if ( ++$post_num % 2 )
	//     $class = 'delete-padding';
	//   else
	//     $class = 'delete-padding-right delete-padding-left';
	//   echo $class;
	// }

	function posts_add_class() {
	  global $post_num;
	  if ( ++$post_num % 2 )
	    $class = 'delete-padding-right delete-padding-left';
	  else
	    $class = 'delete-padding';
	  echo $class;
	}

	function memoirs_reviews_add_class() {
	  global $post_num;
	  if ( ++$post_num % 2 )
	    $class = 'delete-padding';
	  else
	    $class = 'delete-padding-right delete-padding-left';
	  echo $class;
	}

	function promote_posts_add_class() {
		global $post_num;
		if ( $post_num++ % 3 )
	    $class = 'delete-padding-right delete-padding-left';
	  	else
	    $class = 'delete-padding';
		echo $class;
	}

	//modify the length of the exerpt():
	function wpdocs_custom_excerpt_length( $length ) {
	    return 25;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
        
        //random error message
        function error_text_message() {
		$file = array(
                             'На редакторській фабриці кипить робота, щоб наповнити цей блок цікавою інформацією', 
		             'Сувої цієї рубрики були викрадені невідомим розбійником',
			     '"Хто шукає - той знаходить". Нічого особливого, звичайнісінький крилатий вислів!',
	                     'Злий некромант щось зробив, тому найважливіші тексти зникли...',
			     'Я бачив, як маленький мурлок з&#39їв декілька сувоїв і став великим мурлоком!',
			     'Вибач, але сьогодні ця рубрика зачинена. Тут ведеться ремонт, тому не заважай і приходь завтра!',
	       		     'Сувої з цього розділу неначе ожили і вилетіли у вікно. Доведеться їх знайти, щоб вони повернулися сюди');
		shuffle($file);
		for($i = 0; $i < count($file); $i++){
		 	$newFile[] = $file[$i];
		}
		//echo $newFile[0];
		echo $newFile[rand(0, count($file)-1)];
	}

	//modify [...] of exerpt():
	function wpdocs_excerpt_more( $more ) {
		$file = array('... <span>Цікаво? Натисни і прочитай повністю!</span>', 
				      '... <span>Мені здається, тобі хочеться дізнатися деталі.</span>',
					  '... <span>Нуймо, вгамуємо твою цікавість!</span>',
					  '... <span>Ну ж бо! Натискай, щоб прочитати!</span>',
					  '... <span>Королівський писар старався, прочитай!</span>',
					  '... <span>Ця праця достойна премії Антонідоса.</span>',
					  '... <span>- Інструкція створення величезного вітрольоту.</span>');
		shuffle($file);
		for($i = 0; $i < count($file); $i++){
		 	$newFile[] = $file[$i];
		}
		return $newFile[4];
	}
	add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

	//undo unsubscribe link
	function mpoet_get_undo_unsubscribe(){
		if(class_exists('WYSIJA') && !empty($_REQUEST['wysija-key'])){
			$undo_paramsurl = array(
			 'wysija-page'=>1,
			 'controller'=>'confirm',
			 'action'=>'undounsubscribe',
			 'wysija-key'=>$_REQUEST['wysija-key']
		 	);

			$model_config = WYSIJA::get('config','model');
	        	$link_undo_unsubscribe = WYSIJA::get_permalink($model_config->getValue('confirmation_page'),$undo_paramsurl);
			$undo_unsubscribe = str_replace(array('[link]','[/link]'), array('<a href="'.$link_undo_unsubscribe.'">','</a>'),'<strong>'.__('Ненароком нажав на кнопку? [link]Підпишися знову![/link].',WYSIJA)).'</strong>';
			return $undo_unsubscribe;
		 }
		return '';
	}

	add_shortcode('mailpoet_undo_unsubscribe', 'mpoet_get_undo_unsubscribe');

    function my_new_pre_get_posts( $query ) {
	    if ( is_tag() || $query->is_main_query() ) {
	        $query->set( 'posts_per_page', '9' );
	        return;
	    }
	}
	add_action( 'pre_get_posts', 'my_new_pre_get_posts' );

	function right_register_wp_sidebars() {
 
	/* В боковой колонке - первый сайдбар */
		register_sidebar(
			array(
				'id' => 'right_side', // уникальный id
				'name' => 'Права колонка', // название сайдбара
				'description' => 'Перетягни сюди віджети, щоб додати їх до сайдбару.', // описание
				'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
				'after_title' => '</h3>'
			)
		);
	}
 
	add_action( 'widgets_init', 'right_register_wp_sidebars' );

	function php_execute($html){
		if(strpos($html,"<"."?php")!==false){
			ob_start();
			eval("?".">".$html);
			$html=ob_get_contents();
			ob_end_clean();
		}
		return $html;
	}
	add_filter('widget_text','php_execute',100);
?>