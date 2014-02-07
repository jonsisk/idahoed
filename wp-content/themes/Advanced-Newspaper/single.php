<?php get_header(); ?>

<div id="innerContent">
	<div id="innerLeft">	
		<div class="post">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 class="singlePageTitle"><?php the_title(); ?></h1>
	
			<?php 		
				if ($npdv_options['eninnerpageslider'] == 2 ) {
					include (TEMPLATEPATH . '/includes/theme-gallery.php');
				} elseif ($npdv_options['eninnerpageslider'] == 1 && in_category($npdv_options["photoGalCatID"]) ) {
					include (TEMPLATEPATH . '/includes/theme-gallery.php');
				} else { /*do nothing*/ }
				
				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','WpAdvNewspaper'),'<p>','</p>');				
				
				// If there is a video, display it
				gab_media(array( 
					'enable_video' => '1', 
					'enable_thumb' => '0', 
					'media_width' => '500', 
					'media_height' => '280', 
					'enable_default' => 0
				)); 
				
				// Display content
				the_content();
					
				// make sure any floated content gets cleared
				echo '<div class="clear"></div>';
					
				// Display pagination
				wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink= %');					
				
				//If there is a widget, display it
				if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PostWidget') ) :
				endif;
				
				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','WpAdvNewspaper'),'<p>','</p>'); 
			?>
			
			<?php if($npdv_options['enshorturl'] == 1) { ?>
			<p><small><strong><?php _e('Short URL','WpAdvNewspaper'); ?></strong>: <?php echo get_bloginfo('url')."/?p=".$post->ID; ?></small></p>
			<?php } ?>
			
			<div class="clear"></div>
			<?php edit_post_link(__('Edit This Entry','WpAdvNewspaper'),'<p>','</p>'); ?>
			<?php if($npdv_options['enShareSingle'] == 1)  { ?>
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
			
			<?php if($npdv_options['enpostmeta'] == 1)  { ?>
				<div id="entryMeta">
					<?php echo get_avatar( get_the_author_email(), '39' ); ?>
					<?php _e('Posted by','WpAdvNewspaper'); ?>  <?php the_author_posts_link(); ?> 
					<?php /* This is commented, because it requires a little adjusting sometimes.
						You'll need to download this plugin, and follow the instructions:
						http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
						/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
					<?php _e('on','WpAdvNewspaper'); ?> <?php the_time($npdv_options["dateFormat"]); ?>. <?php _e('Filed under','WpAdvNewspaper'); ?> <?php the_category(', ') ?>.
					<?php _e('You can follow any responses to this entry through the','WpAdvNewspaper'); ?> <?php comments_rss_link('RSS 2.0'); ?>.
					<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Both Comments and Pings are open ?>
					<?php _e('You can leave a response or trackback to this entry','WpAdvNewspaper'); ?>
					<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Only Pings are Open ?>
					<?php _e('Responses are currently closed, but you can trackback from your own site.','WpAdvNewspaper'); ?>
					<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Comments are open, Pings are not ?>
					<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','WpAdvNewspaper'); ?>
					<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Neither Comments, nor Pings are open ?>
					<?php _e('Both comments and pings are currently closed.','WpAdvNewspaper'); ?>
					<?php } ?>	
				</div>			
			<?php } ?>
			
		</div>
		
		<?php comments_template(); ?>
		
	</div>
	<?php endwhile; else : endif; ?>

	<?php include (TEMPLATEPATH . '/innerWideSidebar.php'); ?>
	<div class="clear"></div>
</div><!-- Enf of innerContent -->

<?php include (TEMPLATEPATH . '/innerNarrowSidebar.php'); ?>

<div class="clear"></div>

<?php get_footer(); ?>
</div><!-- enf od wrapper -->
</body>
</html>
