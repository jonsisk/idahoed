<?php
	register_sidebar(array('name' => 'homeSecondary1','id' => 'homeSecondary1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="postTitle">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'homeSecondary2','id' => 'homeSecondary2','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="postTitle">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'homeSecondary3','id' => 'homeSecondary3','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="postTitle">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'newsTopWidget','id' => 'newsTopWidget','before_widget' => '<div id="%1$s" class="widget wideSidebarWidget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgetbgTitle">','after_title' => '</h3>',));
	register_sidebar(array('name' => 'eventsTopWidget','id' => 'eventsTopWidget','before_widget' => '<div id="%1$s" class="widget wideSidebarWidget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgetbgTitle">','after_title' => '</h3>',));;
	register_sidebar(array('name' => 'voicesTopWidget','id' => 'voicesTopWidget','before_widget' => '<div id="%1$s" class="widget wideSidebarWidget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgetbgTitle">','after_title' => '</h3>',));
	
	require_once (get_stylesheet_directory() . '/includes/theme-control-panel.php');
	
?>