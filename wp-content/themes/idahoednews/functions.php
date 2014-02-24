<?php
	register_sidebar(array('name' => 'homeSecondary1','id' => 'homeSecondary1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="postTitle">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'homeSecondary2','id' => 'homeSecondary2','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="postTitle">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'homeSecondary3','id' => 'homeSecondary3','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h2 class="postTitle">','after_title' => '</h2>',));
	register_sidebar(array('name' => 'newsTopWidget','id' => 'newsTopWidget','before_widget' => '<div id="%1$s" class="widget wideSidebarWidget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgetbgTitle">','after_title' => '</h3>',));
	register_sidebar(array('name' => 'eventsTopWidget','id' => 'eventsTopWidget','before_widget' => '<div id="%1$s" class="widget wideSidebarWidget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgetbgTitle">','after_title' => '</h3>',));;
	register_sidebar(array('name' => 'voicesTopWidget','id' => 'voicesTopWidget','before_widget' => '<div id="%1$s" class="widget wideSidebarWidget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgetbgTitle">','after_title' => '</h3>',));
	
	require_once (get_stylesheet_directory() . '/includes/theme-control-panel.php');
	
	function remove_parent_widgets(){

	// Unregister the Parent sidebars
	unregister_sidebar( 'PrimaryLeft1' );
	unregister_sidebar( 'PrimaryLeft2' );
	unregister_sidebar( 'PrimaryMid1' );
	unregister_sidebar( 'PrimaryMid2' );
	unregister_sidebar( 'PrimaryRight1' );
	unregister_sidebar( 'PrimaryRight2' );
	unregister_sidebar( 'SecondaryLeft1' );
	unregister_sidebar( 'SecondaryLeft2' );
	unregister_sidebar( 'SecondaryMid1' );
	unregister_sidebar( 'SecondaryMid2' );
	unregister_sidebar( 'SecondaryRight1' );
	unregister_sidebar( 'SecondaryRight2' );
	unregister_sidebar( 'Subnews_1x8' );
	unregister_sidebar( 'Subnews_2x8' );
	unregister_sidebar( 'Subnews_3x8' );
	unregister_sidebar( 'Subnews_4x8' );
	unregister_sidebar( 'Subnews_5x8' );
	unregister_sidebar( 'Subnews_6x8' );
	unregister_sidebar( 'Subnews_7x8' );
	unregister_sidebar( 'Subnews_8x8' );
	unregister_sidebar( 'MainP_Sidebar1' );
	unregister_sidebar( 'MainP_Sidebar2' );
	unregister_sidebar( 'MainP_Sidebar3' );
	unregister_sidebar( 'innernarrowSidebar1' );
	unregister_sidebar( 'innernarrowSidebar2' );
	unregister_sidebar( 'FooterCategories' );
	unregister_sidebar( 'FooterPages' );
	unregister_sidebar( 'FooterThemeInfo' );
	unregister_sidebar( 'Menu_Masthead' );
	unregister_sidebar( 'Menu_Categories' );
	unregister_sidebar( 'Menu_Pages' );
	unregister_sidebar( 'CustomPageWidget' );
	unregister_sidebar( 'SinglePostWidget' );
}
add_action( 'widgets_init', 'remove_parent_widgets', 11 );
	
?>
