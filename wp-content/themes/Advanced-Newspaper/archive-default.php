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
				
		<div class="postinfo">
			<?php the_time($npdv_options["dateFormat"]); ?> | <?php _e('Posted in','WpAdvNewspaper'); ?> <?php the_category(',') ?> | <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a>
		</div>
	</div>
<?php $count++; endwhile; else : ?>
	<?php if(is_search()) { ?>
		<h2 class="archiveTitle"><?php _e('Sorry! No post matched your criterias','WpAdvNewspaper'); ?></a></h2>
	<?php } ?>
<?php endif; ?>