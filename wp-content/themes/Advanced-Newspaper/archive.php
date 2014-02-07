<?php get_header(); ?>

<div id="innerContent">
	<?php if($npdv_options['enbcrum'] == 1) { ?>
	<div id="bcrum">		
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>
			<span class="labelBC"><?php _e('Category archives for:','WpAdvNewspaper'); ?></span>
			<span class="locationBC"><?php single_cat_title(); ?></span>
		
			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
			<span class="labelBC"><?php _e('Posts tagged as:','WpAdvNewspaper'); ?></span>
			<span class="locationBC"><?php single_tag_title(); ?></span>
			
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<span class="labelBC"><?php _e('Archive for:','WpAdvNewspaper'); ?></span>
			<span class="locationBC"><?php the_time('F jS, Y'); ?></span>
		
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<span class="labelBC"><?php _e('Archive for:','WpAdvNewspaper'); ?></span>
			<span class="locationBC"><?php the_time('F, Y'); ?></span>
			
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<span class="labelBC"><?php _e('Archive for:','WpAdvNewspaper'); ?></span>
			<span class="locationBC"><?php the_time('Y'); ?></span>
		<?php } ?>		
	</div>
	<?php } ?>

	<div id="innerLeft">
		<?php if ($npdv_options["catmediaID"] <> "" && is_category(explode(',',$npdv_options['catmediaID']))) {
			include (TEMPLATEPATH . '/archive-media.php'); 
			} else {
			include (TEMPLATEPATH . '/archive-default.php'); } 
		?>
			
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
