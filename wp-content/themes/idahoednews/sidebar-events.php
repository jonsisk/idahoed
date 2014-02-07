<div id="wideSidebar">
	<?php
		if(file_exists(TEMPLATEPATH . '/ads/innerpage_350x250/'.$currentcat.'.php') && (is_single() || is_category())) {
			include_once(TEMPLATEPATH . '/ads/innerpage_350x250/'.$currentcat.'.php');
		}
		else {
			include_once(TEMPLATEPATH . '/ads/innerpage_350x250.php');
		}
	?>
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('eventsTopWidget') ) : ?>
	
	<?php endif; ?>	
</div>
