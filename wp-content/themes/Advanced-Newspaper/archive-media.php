<div class="post">

	<?php 
		if (have_posts()) : while (have_posts()) : the_post(); 
	?>	
		<div class="photoFrame">
			<h2 class="titlePhotoCat"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<div class="thumb">
				<?php 
				gab_media(array(
					'name' => 'npdv-arch_pgallery', 
					'enable_video' => '1', 
					'enable_thumb' => '1', 
					'media_width' => '234', 
					'media_height' => '200', 
					'thumb_align' => 'alignnone', 
					'enable_default' => 1,
					'default_name' => 'arch_pgallery.jpg'
					)); 
				?>
			</div>
			
			<span class="postinfoPhotoCat"><?php the_time($npdv_options["dateFormat"]); ?>  | <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Permalink','WpAdvNewspaper'); ?></a></span>
		</div>
	<?php endwhile; else : endif; ?>
	<div class="clear"></div>
</div>
