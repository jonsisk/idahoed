<?php
/*
Template Name: No-Sidebar
*/
?>

<?php get_header(); ?>

<div id="innerContent" style="width:970px;margin:0;">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="singlePageTitle"><?php the_title(); ?></h1>

	<div id="innerLeft" style="width:970px;margin:0;">	
		<div class="post">

			<?php 		
				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','WpAdvNewspaper'),'<p>','</p>');				
				
				// If there is a video, display it
				gab_media(array( 
					'enable_video' => '1', 
					'enable_thumb' => '0', 
					'media_width' => '970', 
					'media_height' => '500', 
					'enable_default' => 0
				)); 
				
				// Display content
				the_content();
					
				// make sure any floated content gets cleared
				echo '<div class="clear"></div>';
					
				// Display pagination
				wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink= %');
					
				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','WpAdvNewspaper'),'<p>','</p>'); 
			?>		
		
			<?php if($npdv_options['enSharePage'] == 1)  { ?>
			<div class="share">
				<p>
					<a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo(template_url); ?>/images/digg.png" alt="" /></a>
					<a href="http://del.icio.us/post?url=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo(template_url); ?>/images/delicious.png" alt="" /></a>
					<a href="http://www.facebook.com/share.php?u=<?php the_permalink() ?>&amp;t=<?php the_title(); ?>"><img src="<?php bloginfo(template_url); ?>/images/facebook.png" alt="" /></a>
					<a href="http://www.google.com/bookmarks/mark?op=edit&amp;bkmk=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo(template_url); ?>/images/googlebookmark.png" alt="" /></a>
					<a href="http://sphinn.com/submit.php?url=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo(template_url); ?>/images/sphinn.gif" alt="" /></a>
					<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>"><img src="<?php bloginfo(template_url); ?>/images/stumbleupon.png" alt="" /></a>
					<a href="http://technorati.com/faves?add=<?php the_permalink() ?>"><img src="<?php bloginfo(template_url); ?>/images/technorati.png" alt="" /></a>
				</p> 
			</div>
			<?php } ?>
					
		</div>

	</div>
	<?php endwhile; else : endif; ?>

	<div class="clear"></div>
</div><!-- Enf of innerContent -->

<div class="clear"></div>

<?php get_footer(); ?>
</div><!-- enf od wrapper -->
</body>
</html>
