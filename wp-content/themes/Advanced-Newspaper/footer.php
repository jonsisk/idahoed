<?php global $npdv_options, $currentcat; ?>
<div id="footerCatBar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('FooterCategories') ) : ?>	
		<?php /* NAV MENU 4 */
			if($npdv_options['ennav4'] == 1) { 
				wp_nav_menu( array('depth' => '1', 'theme_location' => 'Footer_Cat_Nav', 'container' => false));
			} else { ?>
				<ul>
					<?php wp_list_categories('orderby='.$npdv_options["orderBy"].'&order='.$npdv_options["order"].'&title_li=&depth=1&exclude='.$npdv_options["excludeCategories"]); ?>
				</ul>
		 <?php } ?>
	<?php endif; ?>
</div>

<div id="footerPages">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('FooterPages') ) : ?>
	<?php /* NAV MENU 5 */
		if($npdv_options['ennav5'] == 1) { 
			wp_nav_menu( array('depth' => '1', 'theme_location' => 'Footer_Page_Nav', 'container' => false));
		} else { ?>
			<ul>
				<?php wp_list_pages('depth=1&sort_column=menu_order&title_li=&exclude='.$npdv_options["excludePageFot"]); ?>
				<li><a href="<?php if ( $npdv_options["feedlink"] <> "" ) { echo $npdv_options["feedlink"]; } else { echo bloginfo('rss2_url'); } ?>"><?php _e('RSS','WpAdvNewspaper'); ?></a></li>
			</ul>
	<?php } ?>
	<?php endif; ?>
	<span id="themeInfo">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('FooterThemeInfo') ) : ?>	
		<?php wp_loginout(); ?>
		<?php if ( is_user_logged_in() ) { ?> | 
		<a href="<?php bloginfo('url'); ?>/wp-admin/edit.php"><?php _e('Posts','WpAdvNewspaper'); ?></a> | <a href="<?php bloginfo('url'); ?>/wp-admin/themes.php?page=WpAdvNewspaper"><?php _e('Theme Control Panel','WpAdvNewspaper'); ?></a> | <a href="<?php bloginfo('url'); ?>/wp-admin/post-new.php"><?php _e('Write New Post','WpAdvNewspaper'); ?></a><?php } ?> | <?php _e('Designed by','WpAdvNewspaper'); ?> <a href="http://www.gabfirethemes.com/" title="Premium WordPress Themes">Gabfire themes</a>
		<?php endif; ?>
		<?php wp_footer(); ?>
	</span>
</div>
<?php echo $npdv_options["stattracker"]; ?>
<script type="text/javascript"> Cufon.now(); </script>

