<?php get_header(); ?>

<div id="innerContent">
<?php if (in_category('the-edge-blog')) {?>
	<div id="theEDge-header" style=padding-bottom:10px;>
		<img alt="The EDge, Kevin Richert's Idaho Education blog" src="<?php bloginfo('stylesheet_directory');?>/images/theEDge-header.jpg" />
	</div>
<?php	} ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1 class="singlePageTitle"><?php the_title(); ?></h1>
	<div id="entryMeta">		
		<?php if (in_category('the-edge-blog')) {?>
		<p class="singlePostMeta">
			<?php the_time('M jS, Y') ?>. | Copyright &copy; IdahoEdNews.org		
		</p>
		<?php }
		else {?>
		<p class="singlePostMeta">
			Written by <?php the_author_posts_link(); ?> on <?php the_time('M jS, Y') ?>. | Copyright &copy; IdahoEdNews.org		
		</p>
		<?php }?>
		<div style=padding-top:12px;float:left;width:90px;overflow-x:hidden;>
			<g:plusone size="medium" href="<?php print "$permalink" ?>"></g:plusone>
		</div>
		<div style=padding-top:12px;float:left;>
			<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="idahoednews">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
		</div>
<?php /*
		<iframe src="http://www.facebook.com/plugins/like.php?href=<?php print "$permalink" ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light" scrolling="no" frameborder="0" allowtransparency="true" style="padding-top:10px; border:none; overflow:hidden; width:450px; height: 25px;"></iframe>
*/ ?>
		<div style=padding-top:12px;float:left;>
			<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php print "$permalink" ?>" send="false" layout="button_count" width="76" show_faces="false" font="verdana"></fb:like>
		</div>
		<div class="clear"></div>
	</div>	
	<?php
	if (in_category('wide')) {
		echo '<div id="innerWide">';
		}
	else {
		echo '<div id="innerLeft">';
		}
	?>
		<div class="post">
			
			<?php 		
				if ($npdv_options['eninnerpageslider'] == 2 ) {
					include (TEMPLATEPATH . '/includes/theme-gallery.php');
				} elseif ($npdv_options['eninnerpageslider'] == 1 && in_category($npdv_options["photoGalCatID"]) ) {
					include (TEMPLATEPATH . '/includes/theme-gallery.php');
				} else { /*do nothing*/ }
				
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
			?>
			<div class="clear"></div>
			<?php if (in_category('voices')) { ?>
			<div class="postbio"><a name="author"></a></br>
				<?php userphoto_the_author_photo();?>
				<p><strong style="font-size:16px;margin-bottom:5px;">About <?php the_author_meta('display_name'); ?></strong><br><br> <?php the_author_meta('description'); ?></p>
			</div>
			<?php } ?>
		</div>
		<?php comments_template(); ?>
	</div>
	<?php endwhile; else : endif; ?>
	<?php if(!in_category(wide)) { get_sidebar('innerWide'); } ?>
	<div class="clear"></div>
</div><!-- Enf of innerContent -->
<div class="clear"></div>
<?php get_footer(); ?>
</div><!-- enf od wrapper -->
</body>
</html>
