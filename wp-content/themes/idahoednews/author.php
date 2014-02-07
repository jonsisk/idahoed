<?php get_header(); ?>

<div id="innerContent">

	<?php if($npdv_options['enbcrum'] == 1) { ?>
	<div id="bcrum">		
		<span class="labelBC"><?php _e('Author Archive','WpAdvNewspaper'); ?></span>
	</div>	
	<?php } ?>
	
	<div id="innerLeft">
	
		<div class="gab_authorInfo">
			<?php global $wp_query; $curauth = $wp_query->get_queried_object(); ?>
			<div class="gab_authorPic">
				<?php echo get_avatar( $curauth->user_email, '50' ); ?>
			</div>
			<strong><?php _e('Stories written by','WpAdvNewspaper'); ?> <?php echo $curauth->nickname; ?></strong><br /><?php echo $curauth->description; ?>
			<div style="clear:both"></div>
		</div>	
		
		<?php include (TEMPLATEPATH . '/archive-default.php'); ?>
			
		<div class="navigation">
			<?php posts_nav_link(); ?>
		</div>
		
	</div>
	
	<?php get_sidebar('innerWide'); ?>
	<div class="clear"></div>
</div><!-- Enf of innerContent -->
<div class="clear"></div>

<?php get_footer(); ?>
</div><!-- enf od wrapper -->
</body>
</html>