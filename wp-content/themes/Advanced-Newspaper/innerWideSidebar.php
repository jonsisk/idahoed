<div id="wideSidebar">
	<?php
		if(file_exists(TEMPLATEPATH . '/ads/innerpage_350x250/'.$currentcat.'.php') && (is_single() || is_category())) {
			include_once(TEMPLATEPATH . '/ads/innerpage_350x250/'.$currentcat.'.php');
		}
		else {
			include_once(TEMPLATEPATH . '/ads/innerpage_350x250.php');
		}
	?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('innerWideSidebar_All') ) : ?>				
					
		<?php if($npdv_options['enwidrecent'] == 1) { ?>		
		<div class="widget wideSidebarWidget">
			<h3 class="widgetbgTitle"><?php _e('Recent Entries','WpAdvNewspaper'); ?></h3>
			<ul>
				<?php get_archives('postbypost','10'); ?>
			</ul>
		</div>
		<?php } ?>
		
		<?php if($npdv_options['enwidlinks'] == 1) { ?>
		<div class="widget wideSidebarWidget">
			<h3 class="widgetbgTitle"><?php _e('Featured Links','WpAdvNewspaper'); ?></h3>
			<ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
		</div>
		<?php } ?>
		
		<?php if($npdv_options['enwidsearch'] == 1) { ?>
		<div class="widget wideSidebarWidget">
			<h3 class="widgetbgTitle"><?php _e('Search Archive','WpAdvNewspaper'); ?></h3>
			<span><?php _e('Search by Date','WpAdvNewspaper'); ?></span>
			<form id="archiveform" action="<?php bloginfo('url'); ?>"  method="get" > 
				<select name="archive_chrono" onchange="window.location = (document.forms.archiveform.archive_chrono[document.forms.archiveform.archive_chrono.selectedIndex].value);">
				<option value=''><?php _e('Select Month','WpAdvNewspaper'); ?></option>
				<?php wp_get_archives('type=monthly&format=option'); ?> </select>
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
		</div>
		<?php } ?>
		
	<?php endif; ?>	
</div>
