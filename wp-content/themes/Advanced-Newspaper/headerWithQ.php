<div id="header">
	<!-- LEFT QUOTE -->
	<div id="leftQuote">
		<?php if($npdv_options['enableLeftQuote'] == 1) { ?>
			<p class="leftQuoteWording">
				<?php if($npdv_options['enableLinkLeftQ'] == 1) { ?><a href="<?php echo $npdv_options["leftQuoteLink"]; ?>"><?php } ?>
				<span class="quoteCaption"><?php echo $npdv_options["titleFirstName"]; ?></span>
				<?php echo $npdv_options["titleFirstQuote"]; ?>
				<?php if($npdv_options['enableLinkLeftQ'] == 1) { ?></a><?php } ?>
			</p>
			<?php if($npdv_options['enableLQuoteImg'] == 1) { ?>
				<?php if($npdv_options['enableLinkLeftQ'] == 1) { ?><a href="<?php echo $npdv_options["leftQuoteLink"]; ?>"><?php } ?>
					<img src="<?php echo $npdv_options["quoteFirstImageURL"]; ?>" alt="" />
				<?php if($npdv_options['enableLinkLeftQ'] == 1) { ?></a><?php } ?>
			<?php } ?>
		<?php } ?>
	</div>

	<!-- LOGO -->
	<!-- If display Image Logo is activated -->
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

	<!-- RIGHT QUOTE -->
	<div id="rightQuote">
		<?php if($npdv_options['enableRightQuote'] == 1) { ?>
			<?php if($npdv_options['enableRQuoteImg'] == 1) { ?>
				<?php if($npdv_options['enableLinkRightQ'] == 1) { ?><a href="<?php echo $npdv_options["rightQuoteLink"]; ?>"><?php } ?>
					<img src="<?php echo $npdv_options["quoteSecondImageURL"]; ?>" alt="" />
				<?php if($npdv_options['enableLinkRightQ'] == 1) { ?></a><?php } ?>
			<?php } ?>
			<p class="rightQuoteWording">
				<?php if($npdv_options['enableLinkRightQ'] == 1) { ?><a href="<?php echo $npdv_options["rightQuoteLink"]; ?>"><?php } ?>
				<span class="quoteCaption"><?php echo $npdv_options["titleSecondName"]; ?></span>
				<?php echo $npdv_options["titleSecondQuote"]; ?>
				<?php if($npdv_options['enableLinkRightQ'] == 1) { ?></a><?php } ?>
			</p>
		<?php } ?>
	</div>
	<div class="clear"></div>
</div>