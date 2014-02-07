<?php get_header(); ?>

<div id="innerContent">
	<div id="bcrum">		
		<h2 class="singlePageTitle"><?php _e('404 Error! Page Not Found','WpAdvNewspaper'); ?></h2>
	</div>	

	<div id="innerLeft">	
		<div class="post">
			<p><?php _e('404 Error! Page Not Found','WpAdvNewspaper'); ?></p>
		</div>		
	</div>
	<?php include (TEMPLATEPATH . '/innerWideSidebar.php'); ?>
	<div class="clear"></div>
</div><!-- Enf of innerContent -->

<?php include (TEMPLATEPATH . '/innerNarrowSidebar.php'); ?>

<div class="clear"></div>

<?php get_footer(); ?>
</div><!-- enf od wrapper -->
</body>
</html>