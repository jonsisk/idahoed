<?php global $npdv_options, $currentcat; ?>
<div id="mainPageSidebar">
	<?php include (TEMPLATEPATH . '/ads/mainpage_300x250bottom.php'); ?>	
		
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('MainP_Sidebar1') ) : ?>	
	<?php endif; ?>
					
	<div class="tabber">
		<?php if($npdv_options['enableVideo'] == 1) { ?>
		<div class="tabbertab">
			<h2><?php _e('Video','WpAdvNewspaper'); ?></h2>					
				<?php
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["videoPostCount"].'&cat='.$npdv_options["videoCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post(); 
				?>			
				<span class="videoTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></span>

				<?php 
				gab_media(array(
					'name' => 'npdv-subnews', 
					'enable_video' => '1', 
					'enable_thumb' => '0', 
					'media_width' => '290', 
					'media_height' => '235', 
					'thumb_align' => 'alignnone', 
					'enable_default' => 0,
					'default_name' => ''
					)); 
				?>		
			<?php endwhile; wp_reset_query(); ?>
		</div><!-- End of tabbertab -->
		<?php } ?>

		<div class="tabbertab">
			<h2><?php _e('Featured Links','WpAdvNewspaper'); ?></h2>
			<ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
		</div><!-- End of tabbertab -->
	</div>
	
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('MainP_Sidebar2') ) : ?>	
	<?php endif; ?>		
	
	<h3 class="archiveTitle"><?php _e('Search Archive','WpAdvNewspaper'); ?></h3>
	<div class="archiveBox">
		<span><?php _e('Search by Date','WpAdvNewspaper'); ?></span>
		<form id="archiveform" action="<?php bloginfo('url'); ?>"  method="get" > 
			<select name="archive_chrono" onchange="window.location = (document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
			<option value=''><?php _e('Select Month','WpAdvNewspaper'); ?></option>
			<?php wp_get_archives('type=monthly&format=option'); ?>
			</select>
		</form>
	
		<span><?php _e('Search by Category','WpAdvNewspaper'); ?></span>
		<form id="searchCat" action="<?php bloginfo('url'); ?>"  method="get" > 
			<?php wp_dropdown_categories('orderby=Name&hierarchical=1&show_count=1'); ?>
		</form>
		
		<script type="text/javascript"><!--
			var dropdown = document.getElementById("cat");
			function onCatChange() {
				if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
					location.href = "<?php echo get_option('home'); ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
				}
			}
			dropdown.onchange = onCatChange;
		--></script>
				
		<span><?php _e('Search with Google','WpAdvNewspaper'); ?></span>
		<form method="get" action="http://www.google.com/search">
			<input name="q" maxlength="255" value="<?php _e('Write keyword and hit return','WpAdvNewspaper'); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" id="googlequery" /> 
			<input type="hidden" name="sitesearch" value="<?php bloginfo('url'); ?>" />
		</form>		
	</div><!-- End of tabbertab -->	
			
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('MainP_Sidebar3') ) : ?>	
	<?php endif; ?>
</div>
<!-- enf od mainpagesidebar -->
