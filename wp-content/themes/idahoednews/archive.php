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
<?php 
	$count = 1; 
	if (have_posts()) : while (have_posts()) : the_post(); 
	$gab_video = get_post_meta($post->ID, 'video', TRUE); /* Custom field video check */
	$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE); /* Custom field thumbnail check */
	$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */
?>

	<div class="post">
		<h2 class="archiveTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php 
			if($npdv_options['arcPostType'] == 0) { 
				the_excerpt();
			} 
			elseif($npdv_options['arcPostType'] == 1) { 
				if(($gab_video != '') or ($gab_flv != '')) { 
					gab_media(array(
						'name' => 'npdv-excerpt_thumb', 
						'enable_video' => '1',
						'enable_thumb' => '0',
						'media_width' => '494',
						'media_height' => '278',
						'thumb_align' => 'alignleft',
						'enable_default' => 0,
						'default_name' => ''
					)); 
				} else {
					gab_media(array(
						'name' => 'npdv-excerpt_thumb', 
						'enable_video' => '0',
						'enable_thumb' => '1',
						'media_width' => '90',
						'media_height' => '65',
						'thumb_align' => 'alignleft',
						'enable_default' => $npdv_options["enthumb_13"],
						'default_name' => 'excerpt_thumb.jpg'
					)); 
				}
				the_excerpt();
			} else {
				if(($gab_video != '') or ($gab_flv != '')) { 
					gab_media(array(
						'name' => 'npdv-excerpt_thumb', 
						'enable_video' => '1',
						'enable_thumb' => '0',
						'media_width' => '494',
						'media_height' => '278',
						'thumb_align' => 'alignleft',
						'enable_default' => 0,
						'default_name' => ''
					)); 
				}
				the_content(); 
			}
		?>
<div class=clear></div>
<div class="socialbuttons">
<div style=padding-top:6px;float:left;width:90px;overflow:hidden;>
<g:plusone size="medium" href="<?php the_permalink() ?>"></g:plusone>
</div>

<div style=padding-top:6px;float:left;>
<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div>

<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light" scrolling="no" frameborder="0" allowtransparency="true" style="padding-top:4px; border:none; overflow:hidden; width:330px; height: 25px;"></iframe>
</div>
		<div class="postinfo">
			<?php the_time($npdv_options["dateFormat"]); ?> | <?php _e('Posted in','WpAdvNewspaper'); ?> <?php the_category(',') ?> | <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a>
		</div>
	</div>
<?php $count++; endwhile; else : ?>
	<?php if(is_search()) { ?>
		<h2 class="archiveTitle"><?php _e('Sorry! No post matched your criterias','WpAdvNewspaper'); ?></a></h2>
	<?php } ?>
<?php endif; ?>
			
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
