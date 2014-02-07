<?php get_header(); ?>

<div id="innerContent">

	<?php if($npdv_options['enbcrum'] == 1) { ?>
	<div id="bcrum">		
		<span class="labelBC"><?php _e('Search results for:','WpAdvNewspaper'); ?></span>
		<span class="locationBC"><?php echo wp_specialchars($s, 1); ?></span>
	</div>
	<?php } ?>

	<div id="innerLeft">
		<?php include (TEMPLATEPATH . '/archive-default.php'); ?>
			
		<div class="navigation">
			<?php posts_nav_link(); ?>
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