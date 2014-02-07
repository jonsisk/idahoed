<?php
	# Template Location
	define('THEME', get_bloginfo('template_url'), true);
	# JS files location
	define('THEME_JS', THEME . '/includes/js', true);
	wp_enqueue_script('jquery');
	wp_enqueue_script('contentslider', THEME_JS .'/contentslider.js');
	wp_enqueue_script('jqueryslidemenu', THEME_JS .'/jqueryslidemenu.js');
	wp_enqueue_script('jCarouselLite', THEME_JS .'/jCarouselLite.js');
	wp_enqueue_script('tabber', THEME_JS .'/tabber.js');
	wp_enqueue_script('flowplayer', THEME_JS .'/flowplayer-3.2.4.min.js');
	wp_enqueue_script('cufon', THEME_JS .'/cufon-yui.js');
	wp_enqueue_script('aller', THEME_JS .'/aller.js');
?>