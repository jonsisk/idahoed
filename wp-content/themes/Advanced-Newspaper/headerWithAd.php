<div id="header">
	<!-- If image is activated to be displayed as logo -->
	<?php if($npdv_options['enableLogo'] == 1) { ?>
	<div id="sitename" style="margin-top:<?php echo $npdv_options["logoMargin"]; ?>px">
		<a href="<?php bloginfo('url'); ?>">
			<img src="<?php echo $npdv_options["logoUrl"]; ?>" alt="" />
		</a>
	</div>
	<?php } ?>

	<!-- If text is activated to be displayed as logo -->
	<?php if($npdv_options['enableLogo'] == 0) { ?>
	<div id="sitename">
		<a href="<?php bloginfo('url'); ?>" class="name">
			<span id="name1stRow"><?php echo $npdv_options["titleSiteNameFirstRow"]; ?></span>
			<span id="name2ndRow"><?php echo $npdv_options["titleSiteNameSecondRow"]; ?></span>
		</a>
	</div>
	<?php } ?>

	<div id="ad468x60">
		<?php
			if(file_exists(TEMPLATEPATH . '/ads/sitewide_468x60/'.$currentcat.'.php') && (is_single() || is_category())) {
				include_once(TEMPLATEPATH . '/ads/sitewide_468x60/'.$currentcat.'.php');
			}
			else {
				include_once(TEMPLATEPATH . '/ads/sitewide_468x60.php');
			}
		?>
	</div>
	<div class="clear"></div>
</div>