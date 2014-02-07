<div id="narrowSidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('innernarrowSidebar1') ) : ?>
	<?php endif; ?>
	
	<?php if($npdv_options['enablePhotoGallery'] == 1) { ?> 
		<h3 class="narrowSidebarTitle"><?php _e('Photo Gallery','WpAdvNewspaper'); ?></h3>
		<ul id="narrowSidebarGallery">
			<?php 
				$gabquery = new WP_Query();$gabquery->query('showposts=6&cat='.$npdv_options["photoGalCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post(); 
				$key1 = 'video'; $gab_video = get_post_meta($post->ID, $key1, TRUE); /* Custom field video check */
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
			?>		
		
			<li>
				<?php 
					gab_media(array(
						'name' => 'npdv-inner_pgallery', 
						'enable_video' => '0', 
						'enable_thumb' => '1', 
						'media_width' => '496', 
						'media_height' => '278', 
						'thumb_align' => 'alignnone', 
						'enable_default' => 1,
						'default_name' => 'inner_pgallery.jpg'
					)); 
				?>	
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
			</li>
			<?php endwhile; wp_reset_query(); ?>	
		</ul>
	<?php } ?>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('innernarrowSidebar2') ) : ?>
	<?php endif; ?>

	<?php
		if(file_exists(TEMPLATEPATH . '/ads/innerpage_120x600/'.$currentcat.'.php') && (is_single() || is_category())) {
			include_once(TEMPLATEPATH . '/ads/innerpage_120x600/'.$currentcat.'.php');
		}
		else {
			include_once(TEMPLATEPATH . '/ads/innerpage_120x600.php');
		}
	?>	

</div>
