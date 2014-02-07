<?php get_header(); ?>

<div id="innerContent">
	<div id="theEDge-header" style=padding-bottom:10px;>
		<img alt="The EDge, Kevin Richert's Idaho Education blog" src="<?php bloginfo('stylesheet_directory');?>/images/theEDge-header.jpg" />
	</div>
	<div id="innerLeft">
<?php 
	$count = 1; 
	if (have_posts()) : while (have_posts()) : the_post(); 
?>
	<div class="post">
		<h2 class="theEdgeTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<div id="entryMeta">		
		<p class="singlePostMeta">
			<?php the_time('M jS, Y') ?>
		</p>
	</div>	
		<?php the_content(); ?>
				
		<div class="postinfo">
		<div style=padding-top:6px;padding-left:10px;float:left;width:90px;overflow-x:hidden;>
			<g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone>
		</div>
		<div style=padding-top:6px;float:left;>
			<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="idahoednews">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
		</div>
		<div style=padding-top:4px;float:left;>
			<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light" scrolling="no" frameborder="0" allowtransparency="true" style="border:none; overflow:hidden; width:330px; height: 25px;"></iframe>
		</div>
		<div class="clear"></div>
		<a style=float:left;padding-left:10px;padding-top:10px;padding-bottom:10px; href="<?php the_permalink() ?>" rel="bookmark">This post has <strong><?php comments_number('no comments yet', 'one comment', '%comments'); ?></strong>, click here to join the conversation.</a>
		<div class="clear"></div>
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
	
	<?php include (TEMPLATEPATH . '/innerWideSidebar.php'); ?>
	<div class="clear"></div>
</div><!-- Enf of innerContent -->

<?php include (TEMPLATEPATH . '/innerNarrowSidebar.php'); ?>

<div class="clear"></div>

<?php get_footer(); ?>
</div><!-- enf od wrapper -->
</body>
</html>
