<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="innerContent">
	<div id="innerLeft">	
		<div class="post">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 class="singlePageTitle"><?php the_title(); ?></h1>
						
			<?php 		
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
					
				// Display edit post link to site admin
				edit_post_link(__('Edit This Post','WpAdvNewspaper'),'<p>','</p>'); 
			?>
			
			<?php endwhile; else : endif; ?>
		</div>
		
		<div class="post">
			<?php
				$cats = get_categories();
				foreach ($cats as $cat) {
				query_posts('cat='.$cat->cat_ID);
			?>
            
			<h2><?php echo $cat->cat_name; ?></h2>
			<ul>	
				<?php while (have_posts()) : the_post(); ?>
				<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> - (<?php echo $post->comment_count ?>)</li>
				<?php endwhile;  ?>
			</ul>
			<?php } ?>	
			<?php edit_post_link(__('Edit This Entry','WpAdvNewspaper'),'<p>','</p>'); ?>
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
