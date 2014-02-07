<form id="searchform" action="<?php bloginfo('url'); ?>">
	<fieldset>
		<input type="text" id="s" name="s" value="<?php _e('Search in site...','WpAdvNewspaper'); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
		<input type="image" id="searchsubmit" src="<?php bloginfo('template_url'); ?>/images/button_go.gif" alt="<?php _e('Search in site...','WpAdvNewspaper'); ?>" value="" /> 
	</fieldset>
</form>