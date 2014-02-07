<?php
class ControlPanel {
	# Load Theme Control Panel Head
	var $options;
	function ControlPanel() {
		add_action('admin_menu', array(&$this, 'add_menu'));
		add_action('admin_head', array(&$this, 'admin_head'));
		if (!is_array(get_option('WpAdvNewspaper')))
		add_option('WpAdvNewspaper', $this->default_settings);
		$this->options = get_option('WpAdvNewspaper');
	}
 	function add_menu() {
		add_theme_page(__('Theme Settings','WpAdvNewspaper'), __('Theme Settings','WpAdvNewspaper'), 'edit_theme_options', "WpAdvNewspaper", array(&$this, 'optionsmenu'));
 	}
 	function admin_head() {
		echo ' 
			<style type="text/css" media="screen">@import url( ' .get_template_directory_uri(). '/includes/cp/controlpanel.css );</style>
			<script type="text/javascript" src="' .get_template_directory_uri(). '/includes/cp/collapsible.js"></script>
			<script type="text/javascript" src="' .get_template_directory_uri(). '/includes/cp/call-collapsible-divs.js"></script>
		';
	}
	
	# Create a unique array that contains all theme settings
	var $default_settings = Array(
		'style' => 'default',
		'enableLogo' => '0',
		'enbcrum' => '1',
		'enthumb_1' => '1',
		'enthumb_2' => '1',
		'enthumb_3' => '1',
		'enthumb_4' => '1',
		'enthumb_5' => '1',
		'enthumb_6' => '1',
		'enthumb_7' => '1',
		'enthumb_8' => '1',
		'enthumb_9' => '1',
		'enthumb_10' => '1',
		'enthumb_11' => '1',
		'enthumb_12' => '1',
		'enthumb_13' => '1',
		'enshorturl' => '1',
		'headerimage' => 'http://',
		'feaPostCount' => '6',
		'featuredCatID' => '1',
		'switchheader' => '1',
		'fea2PostCount' => '2',
		'revealtype' => 'click',
		'feaautorotate' => 'true',
		'fearotatepause' => '5',
		'midautorotate' => '0',
		'midspeed' => '2',
		'midscroll' => '4',
		'midpausetime' => '5',
		'eninnerpageslider' => '0',
		'innerautorotate' => '1',
		'innerpausetime' => '5',
		'innerrevealtype' => '300',
		'dateFormat' => 'M j Y',
		'titleFirstName' => 'Vladimir Putin',
		'titleFirstQuote' => 'We discussed this important issue yesterday over a beer...',
		'titleSecondName' => 'Barack OBAMA',
		'titleSecondQuote' => 'You know, my faith is one that admits some doubt...',
		'titleSiteNameFirstRow' => 'WORDPRESS',
		'titleSiteNameSecondRow' => 'NEWSPAPER',
		'quoteFirstImageURL' => 'wp-content/themes/WpAdvNewspaper13/images/putin.gif',
		'quoteSecondImageURL' => 'wp-content/themes/WpAdvNewspaper13/images/obama.gif',
		'titleBreakingNews' => 'BREAKING NEWS',
		'excludeCategories' => '',
		'enableLeftQuote' => '1',
		'switchheader' => '1',
		'enableRightQuote' => '1',
		'breakingNewsPostCount' => '8',
		'enablePhotoGallery' => '0',
		'enableVideo' => '0',
		'videoCatID' => '999998',
		'videoPostCount' => '1',
		'enableRightQuote' => '1',
		'enableMailSubscribe' => '0',
		'enableLinkLeftQ' => '0',
		'enableLinkRightQ' => '0',
		'enableLQuoteImg' => '1',
		'enableRQuoteImg' => '1',
		'enableLinkLeftQ' => '0',
		'enShareSingle' => '1',
		'enpostmeta' => '1',
		'enSharePage' => '0',
		'twitterusername' => '',
		'linktofacebook' => 'http://',
		'enabletwitterUp' => '0',
		'enablefacebook' => '0',
		'leftQuoteLink' => 'http://',
		'rightQuoteLink' => 'http://',
		'emailSubscribeLink' => 'http://',
		'photoGalCatID' => '999999',
		'breakingNewsCatID' => '',
		'fea2CatID' => '1',
		'fea3CatID' => '1',
		'sub1stCatID' => '1',
		'sub2ndCatID' => '1',
		'sub3rdCatID' => '1',
		'sub4thCatID' => '1',
		'sub5thCatID' => '1',
		'sub6thCatID' => '1',
		'sub7thCatID' => '1',
		'sub8thCatID' => '1',
		'secondaryMidCatID' => '1',
		'secondaryRightCatID' => '1',
		'secondaryMidPostCount' => '3',
		'secondaryRightPostCount' => '1',
		'fea3PostCount' => '4',
		'postCountPhotoBar' => '14',
		'postCountBot1' => '1',
		'postCountBot2' => '1',
		'postCountBot3' => '1',
		'postCountBot4' => '1',
		'postCountBot5' => '1',
		'postCountBot6' => '1',
		'postCountBot7' => '1',
		'postCountBot8' => '1',
		'wordCount' => '10',
		'enable120x600_main' => '1',
		'enable120x600_inner' => '1',
		'enable728' => '0',
		'enwidrecent' => '1',
		'enwidlinks' => '1',
		'enwidsearch' => '1',
		'enablePExcerpt' => '1',
		'order' => 'ASC',
		'orderBy' => 'ID',
		'logoMargin' => '0',
		'arcPostType' => '1',
		'ad120x600_main' => '120x600 ad code [Main page]',
		'ad120x600_inner' => '120x600 ad code [Inner pages]',
		'ad300x250_bottom' => '300x250 ad code [Main page below the photo gallery]',
		'ad300x250_up' => '300x250 ad code [Main page above the photo gallery]',
		'ad728x90' => '728x90 ad code [Sitewide - Site Header]',
		'ad300x250_inner' => '300x250 ad code [Inner pages]',
		'adh468x60' => '468x60 ad code [Site Wide - Header]',
		/* ---- Start IdahoEd added options ---- */
		'ien_enterprise_headline' => 'Enterprise Headline',
		'ien_enterprise_category' => 'Short description',
		'ien_enterprise_tag' => 'enterprise',
		/* ---- End IdahoEd added options ---- */
	);
	
	# What to Post
	function optionsmenu() {
	if ($_POST['ss_action'] == 'save') {
	check_admin_referer( 'update_theme_options-WpAdvNewspaper' );
		$this->options["titleFirstName"] = stripslashes($_POST['cp_titleFirstName']);
		$this->options["titleFirstQuote"] = stripslashes($_POST['cp_titleFirstQuote']);
		$this->options["quoteFirstImageURL"] = $_POST['cp_quoteFirstImageURL'];
		$this->options["titleSecondName"] = stripslashes($_POST['cp_titleSecondName']);
		$this->options["titleSecondQuote"] = stripslashes($_POST['cp_titleSecondQuote']);
		$this->options["quoteSecondImageURL"] = $_POST['cp_quoteSecondImageURL'];	
		$this->options["titleSiteNameFirstRow"] = stripslashes($_POST['cp_titleSiteNameFirstRow']);
		$this->options["titleSiteNameSecondRow"] = stripslashes($_POST['cp_titleSiteNameSecondRow']);
		$this->options["titleBreakingNews"] = $_POST['cp_titleBreakingNews'];
		$this->options["breakingNewsPostCount"] = $_POST['cp_breakingNewsPostCount'];
		$this->options["excludeCategories"] = $_POST['cp_excludeCategories'];
		$this->options["excludePageNav"] = $_POST['cp_excludePageNav'];
		$this->options["excludePageFot"] = $_POST['cp_excludePageFot'];
		$this->options["photoGalCatID"] = $_POST['cp_photoGalCatID'];
		$this->options["featuredCatID"] = $_POST['cp_featuredCatID'];
		$this->options["revealtype"] = $_POST['cp_revealtype'];
		$this->options["feaautorotate"] = $_POST['cp_feaautorotate'];
		$this->options["fearotatepause"] = $_POST['cp_fearotatepause'];	
		$this->options["midautorotate"] = $_POST['cp_midautorotate'];	
		$this->options["midscroll"] = $_POST['cp_midscroll'];	
		$this->options["midpausetime"] = $_POST['cp_midpausetime'];	
		$this->options["midspeed"] = $_POST['cp_midspeed'];	
		$this->options["eninnerpageslider"] = $_POST['cp_eninnerpageslider'];
		$this->options["innerautorotate"] = $_POST['cp_innerautorotate'];
		$this->options["innerpausetime"] = $_POST['cp_innerpausetime'];
		$this->options["innerrevealtype"] = $_POST['cp_innerrevealtype'];
		$this->options["dateFormat"] = $_POST['cp_dateFormat'];
		$this->options["breakingNewsCatID"] = $_POST['cp_breakingNewsCatID'];
		$this->options["fea2CatID"] = $_POST['cp_fea2CatID'];
		$this->options["fea3CatID"] = $_POST['cp_fea3CatID'];
		$this->options["sub1stCatID"] = $_POST['cp_sub1stCatID'];
		$this->options["sub2ndCatID"] = $_POST['cp_sub2ndCatID'];
		$this->options["sub3rdCatID"] = $_POST['cp_sub3rdCatID'];
		$this->options["sub4thCatID"] = $_POST['cp_sub4thCatID'];
		$this->options["sub5thCatID"] = $_POST['cp_sub5thCatID'];
		$this->options["sub6thCatID"] = $_POST['cp_sub6thCatID'];
		$this->options["sub7thCatID"] = $_POST['cp_sub7thCatID'];
		$this->options["sub8thCatID"] = $_POST['cp_sub8thCatID'];
		$this->options["secondaryMidCatID"] = $_POST['cp_secondaryMidCatID'];
		$this->options["secondaryRightCatID"] = $_POST['cp_secondaryRightCatID'];
		$this->options["postCountBot1"] = $_POST['cp_postCountBot1'];
		$this->options["postCountBot2"] = $_POST['cp_postCountBot2'];
		$this->options["postCountBot3"] = $_POST['cp_postCountBot3'];
		$this->options["postCountBot4"] = $_POST['cp_postCountBot4'];
		$this->options["postCountBot5"] = $_POST['cp_postCountBot5'];
		$this->options["postCountBot6"] = $_POST['cp_postCountBot6'];
		$this->options["postCountBot7"] = $_POST['cp_postCountBot7'];
		$this->options["postCountBot8"] = $_POST['cp_postCountBot8'];
		$this->options["secondaryMidPostCount"] = $_POST['cp_secondaryMidPostCount'];
		$this->options["secondaryRightPostCount"] = $_POST['cp_secondaryRightPostCount'];
		$this->options["feaPostCount"] = $_POST['cp_feaPostCount'];
		$this->options["fea2PostCount"] = $_POST['cp_fea2PostCount'];
		$this->options["fea3PostCount"] = $_POST['cp_fea3PostCount'];
		$this->options["postCountPhotoBar"] = $_POST['cp_postCountPhotoBar'];
		$this->options["emailSubscribeLink"] = $_POST['cp_emailSubscribeLink'];
		$this->options["feedlink"] = $_POST['cp_feedlink'];
		$this->options["orderBy"] = $_POST['cp_orderBy'];
		$this->options["logoUrl"] = $_POST['cp_logoUrl'];
		$this->options["wordCount"] = $_POST['cp_wordCount'];
		$this->options["order"] = $_POST['cp_order'];
		$this->options["leftQuoteLink"] = $_POST['cp_leftQuoteLink'];
		$this->options["rightQuoteLink"] = $_POST['cp_rightQuoteLink'];		
		$this->options["ad120x600_inner"] = stripslashes($_POST['cp_ad120x600_inner']);
		$this->options["ad728x90"] = stripslashes($_POST['cp_ad728x90']);
		$this->options["ad300x250_inner"] = stripslashes($_POST['cp_ad300x250_inner']);
		$this->options["ad120x600_main"] = stripslashes($_POST['cp_ad120x600_main']);
		$this->options["ad300x250_bottom"] = stripslashes($_POST['cp_ad300x250_bottom']);
		$this->options["ad300x250_up"] = stripslashes($_POST['cp_ad300x250_up']);
		$this->options["adh468x60"] = stripslashes($_POST['cp_adh468x60']);	
		$this->options["videoPostCount"] = $_POST['cp_videoPostCount'];
		$this->options["videoCatID"] = $_POST['cp_videoCatID'];
		$this->options["style"] = $_POST['cp_style'];
		$this->options["enableLogo"] = $_POST['cp_enableLogo'];
		$this->options["logoMargin"] = $_POST['cp_logoMargin'];
		$this->options["switchheader"] = $_POST['cp_switchheader'];
		$this->options["headerimage"] = $_POST['cp_headerimage'];
		$this->options["enableLQuoteImg"] = $_POST['cp_enableLQuoteImg'];
		$this->options["enableRQuoteImg"] = $_POST['cp_enableRQuoteImg'];
		$this->options["enableLinkLeftQ"] = $_POST['cp_enableLinkLeftQ'];
		$this->options["enableLinkRightQ"] = $_POST['cp_enableLinkRightQ'];
		$this->options["enableRightQuote"] = $_POST['cp_enableRightQuote'];
		$this->options["enableLeftQuote"] = $_POST['cp_enableLeftQuote'];	
		$this->options["enable728"] = isset($_POST['cp_enable728']) ? 1 : 0;
		$this->options["enablePhotoGallery"] = $_POST['cp_enablePhotoGallery'];
		$this->options["enableVideo"] = $_POST['cp_enableVideo'];
		$this->options["twitterusername"] = $_POST['cp_twitterusername'];
		$this->options["linktofacebook"] = $_POST['cp_linktofacebook'];
		$this->options["catmediaID"] = $_POST['cp_catmediaID'];
		$this->options["ennav1"] = isset($_POST['cp_ennav1']) ? 1 : 0;
		$this->options["ennav2"] = isset($_POST['cp_ennav2']) ? 1 : 0;
		$this->options["ennav3"] = isset($_POST['cp_ennav3']) ? 1 : 0;
		$this->options["ennav4"] = isset($_POST['cp_ennav4']) ? 1 : 0;
		$this->options["ennav5"] = isset($_POST['cp_ennav5']) ? 1 : 0;
		$this->options["stattracker"] = stripslashes($_POST['cp_stattracker']);
		$this->options["enbcrum"] = isset($_POST['cp_enbcrum']) ? 1 : 0;
		$this->options["arcPostType"] = $_POST['cp_arcPostType'];
		$this->options["gab_favico"] = $_POST['cp_gab_favico'];
		$this->options["enCufon"] = isset($_POST['cp_enCufon']) ? 1 : 0;
		$this->options["enwidrecent"] = isset($_POST['cp_enwidrecent']) ? 1 : 0;
		$this->options["enwidlinks"] = isset($_POST['cp_enwidlinks']) ? 1 : 0;
		$this->options["enwidsearch"] = isset($_POST['cp_enwidsearch']) ? 1 : 0;
		$this->options["enthumb_1"] = isset($_POST['cp_enthumb_1']) ? 1 : 0;
		$this->options["enthumb_2"] = isset($_POST['cp_enthumb_2']) ? 1 : 0;
		$this->options["enthumb_3"] = isset($_POST['cp_enthumb_3']) ? 1 : 0;
		$this->options["enthumb_4"] = isset($_POST['cp_enthumb_4']) ? 1 : 0;
		$this->options["enthumb_5"] = isset($_POST['cp_enthumb_5']) ? 1 : 0;
		$this->options["enthumb_6"] = isset($_POST['cp_enthumb_6']) ? 1 : 0;
		$this->options["enthumb_7"] = isset($_POST['cp_enthumb_7']) ? 1 : 0;
		$this->options["enthumb_8"] = isset($_POST['cp_enthumb_8']) ? 1 : 0;
		$this->options["enthumb_9"] = isset($_POST['cp_enthumb_9']) ? 1 : 0;
		$this->options["enthumb_10"] = isset($_POST['cp_enthumb_10']) ? 1 : 0;
		$this->options["enthumb_11"] = isset($_POST['cp_enthumb_11']) ? 1 : 0;
		$this->options["enthumb_12"] = isset($_POST['cp_enthumb_12']) ? 1 : 0;
		$this->options["enthumb_13"] = isset($_POST['cp_enthumb_13']) ? 1 : 0;
		$this->options["enshorturl"] = isset($_POST['cp_enshorturl']) ? 1 : 0;
		$this->options["enabletwitterUp"] = isset($_POST['cp_enabletwitterUp']) ? 1 : 0;
		$this->options["enablefacebook"] = isset($_POST['cp_enablefacebook']) ? 1 : 0;
		$this->options["enSharePage"] = isset($_POST['cp_enSharePage']) ? 1 : 0;
		$this->options["enSharePage"] = isset($_POST['cp_enSharePage']) ? 1 : 0;
		$this->options["enShareSingle"] = isset($_POST['cp_enShareSingle']) ? 1 : 0;
		$this->options["enpostmeta"] = isset($_POST['cp_enpostmeta']) ? 1 : 0;	
		$this->options["enablePExcerpt"] = isset($_POST['cp_enablePExcerpt']) ? 1 : 0;
		$this->options["enableMailSubscribe"] = isset($_POST['cp_enableMailSubscribe']) ? 1 : 0;
		/* ---- Start IdahoEd added options ---- */
		$this->options["ien_enterprise_headline"] = $_POST['cp_ien_enterprise_headline'];
		$this->options["ien_enterprise_category"] = $_POST['cp_ien_enterprise_category'];
		$this->options["ien_enterprise_tag"] = $_POST['cp_ien_enterprise_tag'];
		/* ---- End IdahoEd added options ---- */
		update_option('WpAdvNewspaper', $this->options);
		echo '<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204); width: 500px; margin-left: 50px"><p>WpAdvNewspaper settings <strong>saved</strong>.</p></div>';
		} 
	?>

	<!-- Load Visual Theme Control Panel -->
	<div id="optionsForm">
	<form action="" method="post" id="themeform">
	<fieldset>
		<input type="hidden" id="ss_action" name="ss_action" value="save">	

		<div id="gab_top">
			<input type="hidden" id="ss_action" name="ss_action" value="save">	
		
			<?php wp_nonce_field( 'update_theme_options-WpAdvNewspaper' ); ?>
			<h3>Select CSS Style (color scheme) for site</h3>
			<select name="cp_style" class="selectm">
			<?php
			$dirPath = TEMPLATEPATH. '/styles/';
			if ($handle = opendir($dirPath)) {
			while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
			if (is_dir("$dirPath/$file")) {
			?>
			<option value="<?php echo esc_attr( $file ); ?>"<?php selected($file, $this->options["style"]); ?>><?php echo esc_html( ucfirst($file) ); ?></option>
			<?php } } } closedir($handle); } ?>
			</select>
		</div>
		
		<div id="ex_hide">
			<a href="javascript:animatedcollapse.show(['header','navigation','cats','sliders','misc','misc2'])">Expand All</a> | <a href="javascript:animatedcollapse.hide(['header','navigation','cats','sliders','misc','misc2'])">Collapse All</a>
		</div>
		
		
		<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>	
		
		<div id="panelLeft">
		
		<?php /* ---- Start IdahoEd options ---- */?>
		
		<h2>Idaho EdNews Options</h2>
		<div class="innerBox" id="idahoed">
			<div class="innerBoxH">
				<h3>Enterprise package</h3>
				<input class="inputN" name="cp_ien_enterprise_headline" id="cp_ien_enterprise_headline" type="text" value="<?php echo htmlspecialchars( stripslashes($this->options["ien_enterprise_headline"]) ); ?>" /><label for="cp_ien_enterprise_headline">Headline for Enterprise Package</label><br />
				
				<input class="inputN" name="cp_ien_enterprise_category" id="cp_ien_enterprise_category" type="text" value="<?php echo htmlspecialchars( stripslashes($this->options["ien_enterprise_category"]) ); ?>" /><label for="cp_ien_enterprise_category">View All Enterprise Stories Text</label><br />

				<select name="cp_ien_enterprise_tag" class="selectminline">
					<?php $tags = get_tags();
						foreach ( $tags as $tag ) { ?>
						<option value="<?php echo $tag->slug; ?>" <?php selected($tag->slug, $this->options["ien_enterprise_tag"]); ?>><?php echo $tag->name;?></option>
					<?php } ?>
				</select><label for="cp_ien_enterprise_tag">Tag for Enterprise Package</label><br />
			</div>
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
		</div>
		<?php /* ---- End IdahoEd options ---- */?>

			<h2>Setup Header <span><a href="#" rel="toggle[header]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="header">
				<select name="cp_enableLogo" class="selectm">
				<option value="1"<?php selected(1, $this->options["enableLogo"]); ?>>Image based logo</option>
				<option value="0"<?php selected(0, $this->options["enableLogo"]); ?>>Text-based logo</option>
				</select>			
				
				<h3>If text-based logo is activated</h3>
				<input class="inputN" name="cp_titleSiteNameFirstRow" id="cp_titleSiteNameFirstRow" type="text" value="<?php echo htmlspecialchars( stripslashes($this->options["titleSiteNameFirstRow"]) ); ?>" /><label for="cp_titleSiteNameFirstRow">Sitename Row #1</label><br />
				<input class="inputN" name="cp_titleSiteNameSecondRow" id="cp_titleSiteNameSecondRow" type="text" value="<?php echo htmlspecialchars( stripslashes($this->options["titleSiteNameSecondRow"]) ); ?>" /><label for="cp_titleSiteNameSecondRow">Sitename Row #2</label><br />
				<small>For SEO purposes, make sure that site name and tagline are inserted into corresponding fields on <a href="<?php bloginfo('url') ?>/wp-admin/options-general.php" target="_blank">settings</a> page</small><br /><br />
				<h3>If image-based logo is activated (full url)</h3>
				<input class="inputN" name="cp_logoUrl" id="cp_logoUrl" type="text" value="<?php echo esc_attr( $this->options["logoUrl"] ); ?>" /><label for="cp_logoUrl">Logo URL [Max Width: 390px - Max Height:100px]</label><br />
				<input class="inputID" name="cp_logoMargin" id="cp_logoMargin" type="text" value="<?php echo esc_attr( $this->options["logoMargin"] ); ?>" /><label for="cp_logoMargin">px [space between logo and masthead]</label><br /><br />
			
			
				<h3>Select Header Layout</h3>			
				<select name="cp_switchheader" class="selectm">
				<option value="2"<?php selected(2, $this->options["switchheader"]); ?>>Replace whole header block with an image</option>
				<option value="1"<?php selected(1, $this->options["switchheader"]); ?>>Use Header with Quotes</option>
				<option value="0"<?php selected(0, $this->options["switchheader"]); ?>>Use Header with Advertisement</option>
				</select>
				
				<h3>If replace header with an image is activated</h3>
				<div class="innerBoxH">
				<input class="inputN" name="cp_headerimage" id="cp_headerimage" type="text" value="<?php echo esc_attr( $this->options["headerimage"] ); ?>" /><label for="cp_headerimage">Suggested image width: 970px - Heigt is liquid</label>
				</div>
				
				<h3>If Header with Quotes activated</h3>
				<div class="innerBoxH">
					<select name="cp_enableLeftQuote" class="selectminline">
					<option value="1"<?php selected(1, $this->options["enableLeftQuote"]); ?>>Enable Left Quote</option>
					<option value="0"<?php selected(0, $this->options["enableLeftQuote"]); ?>>Disable Left Quote</option>
					</select>
					<select name="cp_enableLQuoteImg" class="selectminline">
					<option value="1"<?php selected(1, $this->options["enableLQuoteImg"]); ?>>Enable Img for Left Quote</option>
					<option value="0"<?php selected(0, $this->options["enableLQuoteImg"]); ?>>Disable Img for Left Quote</option>
					</select>
					<select name="cp_enableLinkLeftQ" class="selectminline">
					<option value="1"<?php selected(1, $this->options["enableLinkLeftQ"]); ?>>Enable Link for Left Quote</option>
					<option value="0"<?php selected(0, $this->options["enableLinkLeftQ"]); ?>>Disable Link for Left Quote</option>
					</select>
					<p><input class="inputN" name="cp_leftQuoteLink" id="cp_leftQuoteLink" type="text" value="<?php echo esc_attr( $this->options["leftQuoteLink"] ); ?>" /><label for="cp_leftQuoteLink">(If enabled) Link for left quote</label></p>
					<p><input class="inputN" name="cp_quoteFirstImageURL" id="cp_quoteFirstImageURL" type="text" value="<?php echo esc_attr( $this->options["quoteFirstImageURL"] ); ?>" /><label for="cp_quoteFirstImageURL">(If enabled) Image URL for left quote. (Max width 85px - Max height 100px)</label></p>
					<p><label for="cp_titleFirstName">Left Quote Caption</label><br /><textarea class="textareas" name="cp_titleFirstName" id="cp_titleFirstName"><?php echo htmlspecialchars( stripslashes($this->options["titleFirstName"]) ); ?></textarea></p>
					<p><label for="cp_titleFirstQuote">Left Quote Text</label><br /><textarea class="textareas" name="cp_titleFirstQuote" id="cp_titleFirstQuote"><?php echo htmlspecialchars( stripslashes($this->options["titleFirstQuote"]) ); ?></textarea></p>
				</div>
				
				<div class="innerBoxH">
					<select name="cp_enableRightQuote" class="selectminline">
					<option value="1"<?php selected(1, $this->options["enableRightQuote"]); ?>>Enable Right Quote</option>
					<option value="0"<?php selected(0, $this->options["enableRightQuote"]); ?>>Disable Right Quote</option>
					</select>
					<select name="cp_enableRQuoteImg" class="selectminline">
					<option value="1"<?php selected(1, $this->options["enableRQuoteImg"]); ?>>Enable Img for Right Quote</option>
					<option value="0"<?php selected(0, $this->options["enableRQuoteImg"]); ?>>Disable Img for Right Quote</option>
					</select>
					<select name="cp_enableLinkRightQ" class="selectminline">
					<option value="1"<?php selected(1, $this->options["enableLinkRightQ"]); ?>>Enable Link for Right Quote</option>
					<option value="0"<?php selected(0, $this->options["enableLinkRightQ"]); ?>>Disable Link for Right Quote</option>
					</select>	
					<p><input class="inputN" name="cp_rightQuoteLink" id="cp_rightQuoteLink" type="text" value="<?php echo esc_attr( $this->options["rightQuoteLink"] ); ?>" /><label for="cp_rightQuoteLink">(If enabled) Link for right quote</label></p>
					<p><input class="inputN" name="cp_quoteSecondImageURL" id="cp_quoteSecondImageURL" type="text" value="<?php echo esc_attr( $this->options["quoteSecondImageURL"] ); ?>" /><label for="cp_quoteSecondImageURL">(If enabled) Image URL for right quote. (Max width 85px - Max height 100px)</label></p>
					<p><label for="cp_titleSecondName">Right Quote Caption</label><br /><textarea class="textareas" name="cp_titleSecondName" id="cp_titleSecondName"><?php echo htmlspecialchars( stripslashes($this->options["titleSecondName"]) ); ?></textarea></p>
					<p><label for="cp_titleSecondQuote">Right Quote Text</label><br /><textarea class="textareas" name="cp_titleSecondQuote" id="cp_titleSecondQuote"><?php echo htmlspecialchars( stripslashes($this->options["titleSecondQuote"]) ); ?></textarea></p>
					
				</div>
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>
			

			<h2>Setup Navigation <span><a href="#" rel="toggle[navigation]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="navigation">
				<h3>Use Custom Navigation (Available in WordPress 3.0+ only)</h3>
					<p><input class="mInput" type="checkbox" name="cp_ennav1" id="cp_ennav1" <?php echo $this->options["ennav1"] == 1 ? ' checked' : '' ?> /> <label for="cp_ennav1">Replace links on masthead with a custom menu [If selected, add a menu on <a href="nav-menus.php" target="_blank">Custom Menus</a> page]</label></p>
					<p><input class="mInput" type="checkbox" name="cp_ennav2" id="cp_ennav2" <?php echo $this->options["ennav2"] == 1 ? ' checked' : '' ?> /> <label for="cp_ennav2">Replace categories on header with a custom menu [If selected, add a menu on <a href="nav-menus.php" target="_blank">Custom Menus</a> page]</label></p>
					<p><input class="mInput" type="checkbox" name="cp_ennav3" id="cp_ennav3" <?php echo $this->options["ennav3"] == 1 ? ' checked' : '' ?> /> <label for="cp_ennav3">Replace pages on header with a custom menu [If selected, add a menu on <a href="nav-menus.php" target="_blank">Custom Menus</a> page]</label></p>
					<p><input class="mInput" type="checkbox" name="cp_ennav4" id="cp_ennav4" <?php echo $this->options["ennav4"] == 1 ? ' checked' : '' ?> /> <label for="cp_ennav4">Replace categories on footer with a custom menu [If selected, add a menu on <a href="nav-menus.php" target="_blank">Custom Menus</a> page]</label></p>
					<input class="mInput" type="checkbox" name="cp_ennav5" id="cp_ennav5" <?php echo $this->options["ennav5"] == 1 ? ' checked' : '' ?> /> <label for="cp_ennav5">Replace pages on footer with a custom menu [If selected, add a menu on <a href="nav-menus.php" target="_blank">Custom Menus</a> page]</label><br /><br />

				<p>Exclude specific category/page from navigation by using their ID numbers <a href="http://www.gabfirethemes.com/how-to-check-category-ids/" target="_blank">Tutorial: How to check category/page IDs?</a></p>
				<div class="innerBoxH">
					<h3>Setup Categories</h3>
					<p><input class="inputN" name="cp_excludeCategories" id="cp_excludeCategories" type="text" value="<?php echo esc_attr( $this->options["excludeCategories"] ); ?>" /><label for="cp_excludeCategories">Categories to exclude (eg 1,2,3,4)</label></p>
					<p><input class="inputID" name="cp_orderBy" id="cp_orderBy" type="text" value="<?php echo esc_attr( $this->options["orderBy"] ); ?>" /><label for="cp_orderBy">Sort categories alphabetically, by unique Cat ID, or by the count of posts in that cat. Options are <strong>ID</strong>, <strong>name</strong>, <strong>count</strong></label></p>
					<p><input class="inputID" name="cp_order" id="cp_order" type="text" value="<?php echo esc_attr( $this->options["order"] ); ?>" /><label for="cp_order">Sort categories either ascending or descending Options are: <strong>ASC</strong>, <strong>DESC</strong></label></p>
					
					<h3>Setup Pages</h3>
					<p><input class="inputN" name="cp_excludePageNav" id="cp_excludePageNav" type="text" value="<?php echo esc_attr( $this->options["excludePageNav"] ); ?>" /><label for="cp_excludePageNav">ID number of pages to be excluded from navigation</label></p>
					<p><input class="inputN" name="cp_excludePageFot" id="cp_excludePageFot" type="text" value="<?php echo esc_attr( $this->options["excludePageFot"] ); ?>" /><label for="cp_excludePageFot">ID number of pages to be excluded from footer page list</label></p>
				</div>
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>	

			<h2>Setup Categories <span><a href="#" rel="toggle[cats]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="cats">
				<h3>Display 0 entry to disable a section on front page</h3>
			
				Display the posts of 
				<select name="cp_featuredCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["featuredCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_feaPostCount" id="cp_feaPostCount" type="text" value="<?php echo esc_attr( $this->options["feaPostCount"] ); ?>" />entries on featured slider<br />

				Display the posts of 
				<select name="cp_fea2CatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["fea2CatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_fea2PostCount" id="cp_fea2PostCount" type="text" value="<?php echo esc_attr( $this->options["fea2PostCount"] ); ?>" />entries below featured slider<br />

				Display the posts of 
				<select name="cp_fea3CatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["fea3CatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_fea3PostCount" id="cp_fea3PostCount" type="text" value="<?php echo esc_attr( $this->options["fea3PostCount"] ); ?>" />entries on right side of featured slider<br />

				Display the posts of 
				<select name="cp_breakingNewsCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["breakingNewsCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_breakingNewsPostCount" id="cp_breakingNewsPostCount" type="text" value="<?php echo esc_attr( $this->options["breakingNewsPostCount"] ); ?>" />entries on secondary block left column<br />

				Display the posts of 
				<select name="cp_secondaryMidCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["secondaryMidCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_secondaryMidPostCount" id="cp_secondaryMidPostCount" type="text" value="<?php echo esc_attr( $this->options["secondaryMidPostCount"] ); ?>" />entries on secondary block mid column<br />

				Display the posts of 
				<select name="cp_secondaryRightCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["secondaryRightCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_secondaryRightPostCount" id="cp_secondaryRightPostCount" type="text" value="<?php echo esc_attr( $this->options["secondaryRightPostCount"] ); ?>" />entries on secondary block right column<br />			

				Display the posts of 
				<select name="cp_sub1stCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["sub1stCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCountBot1" id="cp_postCountBot1" type="text" value="<?php echo esc_attr( $this->options["postCountBot1"] ); ?>" />entries on 1st vert. column (subnews 1x8)<br />
				
				Display the posts of 
				<select name="cp_sub2ndCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["sub2ndCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCountBot2" id="cp_postCountBot2" type="text" value="<?php echo esc_attr( $this->options["postCountBot2"] ); ?>" />entries on 2nd vert. column (subnews 2x8)<br />
				
				Display the posts of 
				<select name="cp_sub3rdCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["sub3rdCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCountBot3" id="cp_postCountBot3" type="text" value="<?php echo esc_attr( $this->options["postCountBot3"] ); ?>" />entries on 3rd vert. column (subnews 3x8)<br />
				
				Display the posts of 
				<select name="cp_sub4thCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["sub4thCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCountBot4" id="cp_postCountBot4" type="text" value="<?php echo esc_attr( $this->options["postCountBot4"] ); ?>" />entries on 4th vert. column (subnews 4x8)<br />
				
				Display the posts of 
				<select name="cp_sub5thCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["sub5thCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCountBot5" id="cp_postCountBot5" type="text" value="<?php echo esc_attr( $this->options["postCountBot5"] ); ?>" />entries on 5th vert. column (subnews 5x8)<br />
				
				Display the posts of 
				<select name="cp_sub6thCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["sub6thCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCountBot6" id="cp_postCountBot6" type="text" value="<?php echo esc_attr( $this->options["postCountBot6"] ); ?>" />entries on 6th vert. column (subnews 6x8)<br />
				
				Display the posts of 
				<select name="cp_sub7thCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["sub7thCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCountBot7" id="cp_postCountBot7" type="text" value="<?php echo esc_attr( $this->options["postCountBot7"] ); ?>" />entries on 7th vert. column (subnews 7x8)<br />
				
				Display the posts of 
				<select name="cp_sub8thCatID" class="selectCat">
				<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
				<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["sub8thCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
				<?php } ?>
				</select>
				category and list <input class="inputID" name="cp_postCountBot8" id="cp_postCountBot8" type="text" value="<?php echo esc_attr( $this->options["postCountBot8"] ); ?>" />entries on 8th vert. column (subnews 8x8)<br />
			
				<div class="innerBoxH">
					<h3>MEDIA GALLERY MODULE</h3>
					
					<p>The recommended use of media module is to create Media category as top level, and to build photo + video categories as sub categories</p>
					
					<select name="cp_enablePhotoGallery" class="selectCat">
					<option value="1"<?php selected(1, $this->options["enablePhotoGallery"]); ?>>Enable photo gallery</option>
					<option value="0"<?php selected(0, $this->options["enablePhotoGallery"]); ?>>Disable photo gallery</option>
					</select><br/>
					
					<select name="cp_enableVideo" class="selectCat">
						<option value="1"<?php selected(1, $this->options["enableVideo"]); ?>>Enable Videos</option>
						<option value="0"<?php selected(0, $this->options["enableVideo"]); ?>>Disable Videos</option>
					</select><br />
					
					<select name="cp_photoGalCatID" class="selectCat">
					<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
					<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["photoGalCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
					<?php } ?>
					</select>
					<label for="cp_photoGalCatID">Category for Photo Gallery</label><br />
					
					<select name="cp_videoCatID" class="selectCat">
					<?php $cats = get_categories('hide_empty=0'); foreach($cats as $cat) { ?>
					<option value="<?php echo intval( $cat->cat_ID ); ?>"<?php selected($cat->cat_ID, $this->options["videoCatID"]); ?>><?php echo esc_html( $cat->cat_name ); ?></option>
					<?php } ?>
					</select>
					<label for="cp_videoCatID">Category ID for Videos</label><br />					
		
					<p><input class="inputN" name="cp_catmediaID" id="cp_catmediaID" type="text" value="<?php echo esc_attr( $this->options["catmediaID"] ); ?>" /><label for="cp_catmediaID">Category ID's to use media template for (separate with comma if more than one id is entered) (<a href="http://www.gabfirethemes.com/how-to-check-category-ids/" target="_blank">How to check category id)</a></label></p>
					<p><input class="inputID" name="cp_videoPostCount" id="cp_videoPostCount" type="text" value="<?php echo esc_attr( $this->options["videoPostCount"] ); ?>" /><label for="cp_videoPostCount">How many videos to be displayed on <strong>main page</strong> (default: 1)</label></p>				
					<p><input class="inputID" name="cp_postCountPhotoBar" id="cp_postCountPhotoBar" type="text" value="<?php echo esc_attr( $this->options["postCountPhotoBar"] ); ?>" /><label for="cp_postCountPhotoBar">How many photos to display on <strong>mainpage</strong> main page slider (Default 14)</label></p>
				</div>
							
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>

			<h2>Setup Sliders <span><a href="#" rel="toggle[sliders]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="sliders">	
				<div class="innerBoxH">
				<h3>Setup Featured Slider</h3>
					<select name="cp_revealtype" class="selectminline">
					<option value="1"<?php selected(1, $this->options["revealtype"]); ?>>Change post when thumbnail clicked</option>
					<option value="0"<?php selected(0, $this->options["revealtype"]); ?>>Change post of thumbnail on mouse-over (hover)</option>
					</select>

					<select name="cp_feaautorotate" class="selectminline">
					<option value="1"<?php selected(1, $this->options["feaautorotate"]); ?>>Enable auto rotation</option>
					<option value="0"<?php selected(0, $this->options["feaautorotate"]); ?>>Disable auto rotation</option>
					</select>

					<p><input class="inputID" name="cp_fearotatepause" id="cp_fearotatepause" type="text" value="<?php echo esc_attr( $this->options["fearotatepause"] ); ?>" /><label for="cp_fearotatepause">(If auto rotate is enabled) define pause time between rotation (Default 5 seconds)</label></p>
				</div>
				
				<div class="innerBoxH">
				<h3>Setup Mainpage Mid Slider [Photo Gallery]</h3>
					<select name="cp_midautorotate" class="selectm">
					<option value="1"<?php selected(1, $this->options["midautorotate"]); ?>>Enable auto rotation</option>
					<option value="0"<?php selected(0, $this->options["midautorotate"]); ?>>Disable auto rotation</option>
					</select>				
					<p><input class="inputID" name="cp_midpausetime" id="cp_midpausetime" type="text" value="<?php echo esc_attr( $this->options["midpausetime"] ); ?>" /><label for="cp_midpausetime">(If auto rotate is enabled) Pause time: between 2 consecutive slides [Default 5 seconds]</label></p>
					<p><input class="inputID" name="cp_midspeed" id="cp_midspeed" type="text" value="<?php echo esc_attr( $this->options["midspeed"] ); ?>" /><label for="cp_midspeed">Rotation Speed: The speed of rotation when slider scrolls [Default 2 seconds]</label></p>
					<p><input class="inputID" name="cp_midscroll" id="cp_midscroll" type="text" value="<?php echo esc_attr( $this->options["midscroll"] ); ?>" /><label for="cp_midscroll">Specify the number of items to scroll when slider scrolls. Value 2 will scroll 2 items at a time</label></p>
				</div>

				<div class="innerBoxH">
				<h3>Setup Innerpage Slider</h3>
					<p>Advanced Newspaper contains a function which automatically grabs all uploaded photos & displays them in the head of article page in a fancy slider [<a href="http://www.gabfirethemes.com/demos/advanced/thinking-big-for-little-people/">See a demo</a> of slider in action]. This feature activates itself only if post have more than 1 photo attached.</p>
					<select name="cp_eninnerpageslider" class="selectminline">
					<option value="2"<?php selected(2, $this->options["eninnerpageslider"]); ?>>Enable sitewide</option>
					<option value="1"<?php selected(1, $this->options["eninnerpageslider"]); ?>>Enable just for photo gallery category</option>
					<option value="0"<?php selected(0, $this->options["eninnerpageslider"]); ?>>Disable innerpage slider</option>
					</select>
					
					<select name="cp_innerautorotate" class="selectminline">
					<option value="1"<?php selected(1, $this->options["innerautorotate"]); ?>>Enable auto rotation</option>
					<option value="0"<?php selected(0, $this->options["innerautorotate"]); ?>>Disable auto rotation</option>
					</select>	
					
					<select name="cp_innerrevealtype" class="selectminline">
					<option value="1"<?php selected(1, $this->options["innerrevealtype"]); ?>>Change image when thumbnail clicked</option>
					<option value="0"<?php selected(0, $this->options["innerrevealtype"]); ?>>Change image on mouse-over (hover)</option>
					</select>
					
					<p><input class="inputID" name="cp_innerpausetime" id="cp_innerpausetime" type="text" value="<?php echo esc_attr( $this->options["innerpausetime"] ); ?>" /><label for="cp_midpausetime">(If auto rotate is enabled) define pause time between rotation (Default 5 seconds)</label></p>			
				</div>
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>
				
			<h2>Miscellaneous <span><a href="#" rel="toggle[misc]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="misc">	
				<div class="innerBoxH">
					<h3>Enable/Disable Default post Thumbnails</h3>
					<p>There are multiple checks before a thumbnail is displayed on front page. If theme can't find a custom field defined or a wordpress post thumbnail set, it will display a default category image. Default images can be disabled below.</p>
					<input class="mInput" type="checkbox" name="cp_enthumb_1" id="cp_enthumb_1" <?php echo $this->options["enthumb_1"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_1">Enable default "No Image Found" photo below featured slider</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_2" id="cp_enthumb_2" <?php echo $this->options["enthumb_2"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_2">Enable default "No Image Found" photo on right hand of featured slider</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_3" id="cp_enthumb_3" <?php echo $this->options["enthumb_3"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_3">Enable default "No Image Found" photo on secondary content mid column</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_4" id="cp_enthumb_4" <?php echo $this->options["enthumb_4"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_4">Enable default "No Image Found" photo on secondary content right column</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_5" id="cp_enthumb_5" <?php echo $this->options["enthumb_5"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_5">Enable default "No Image Found" photo on 1st vert. column (subnews 1x8)</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_6" id="cp_enthumb_6" <?php echo $this->options["enthumb_6"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_6">Enable default "No Image Found" photo on 2nd vert. column (subnews 2x8)</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_7" id="cp_enthumb_7" <?php echo $this->options["enthumb_7"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_7">Enable default "No Image Found" photo on 3rd vert. column (subnews 3x8)</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_8" id="cp_enthumb_8" <?php echo $this->options["enthumb_8"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_8">Enable default "No Image Found" photo on 4th vert. column (subnews 4x8)</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_9" id="cp_enthumb_9" <?php echo $this->options["enthumb_9"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_9">Enable default "No Image Found" photo on 5th vert. column (subnews 5x8)</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_10" id="cp_enthumb_10" <?php echo $this->options["enthumb_10"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_10">Enable default "No Image Found" photo on 6th vert. column (subnews 6x8)</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_11" id="cp_enthumb_11" <?php echo $this->options["enthumb_11"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_11">Enable default "No Image Found" photo on 7th vert. column (subnews 7x8)</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_12" id="cp_enthumb_12" <?php echo $this->options["enthumb_12"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_12">Enable default "No Image Found" photo on 8th vert. column (subnews 8x8)</label><br />
					<input class="mInput" type="checkbox" name="cp_enthumb_13" id="cp_enthumb_13" <?php echo $this->options["enthumb_13"] == 1 ? ' checked' : '' ?> /> <label for="cp_enthumb_13">Enable default "No Image Found" photo on archive posts</label><br />
				</div>	
	
				<div class="innerBoxH">
					<h3>Mainpage Featured Slider Post Excerpt</h3>
					<input class="mInput" type="checkbox" name="cp_enablePExcerpt" id="cp_enablePExcerpt" <?php echo $this->options["enablePExcerpt"] == 1 ? ' checked' : '' ?> /> <label for="cp_enablePExcerpt">Enable post excerpt to be displayed on featured slider</label><br />
					<input class="inputID" name="cp_wordCount" id="cp_wordCount" type="text" value="<?php echo esc_attr( $this->options["wordCount"] ); ?>" /><label for="cp_wordCount"> words to be displayed as excerpt on featured slider [Default: 10 / Maximum 55]</label><br/></br>
				</div>		

				<div class="innerBoxH">
					<h3>Google Analytics / Stat Tracker Snippet</h3>
					<textarea class="textarea" name="cp_stattracker" id="cp_stattracker"><?php echo htmlspecialchars( stripslashes($this->options["stattracker"]) ); ?></textarea>			
				</div>
				
				<div class="innerBoxH">
				<h3>Setup RSS Feeds</h3>
					<input class="inputN" name="cp_feedlink" id="cp_feedlink" type="text" value="<?php echo esc_attr( $this->options["feedlink"] ); ?>" /><label for="cp_feedlink">(If a third party feed handler (eg. feedburner) is used Enter feed URL</label><br />
					<input class="mInput" type="checkbox" name="cp_enableMailSubscribe" id="cp_enableMailSubscribe" <?php echo $this->options["enableMailSubscribe"] == 1 ? ' checked' : '' ?> /> <label for="cp_enableMailSubscribe">Enable subscribe by email option. Link will be displayed on masthead, under "stay updated"</label><br />
					<input class="inputN" name="cp_emailSubscribeLink" id="cp_emailSubscribeLink" type="text" value="<?php echo esc_attr( $this->options["emailSubscribeLink"] ); ?>" /><label for="cp_emailSubscribeLink">Email subscribition link provided by <a href="http://www.feedburner.com">Feedburner</a></label><br />
				</div>
				
				<div class="innerBoxH">
					<h3>Setup Social site links</h3>
					<input class="mInput" type="checkbox" name="cp_enabletwitterUp" id="cp_enabletwitterUp" <?php echo $this->options["enabletwitterUp"] == 1 ? ' checked' : '' ?> /> <label for="cp_enabletwitterUp">Display a link to Twitter account below Stay Updated link on masthead</label><br />
					<input class="inputN" name="cp_twitterusername" id="cp_twitterusername" type="text" value="<?php echo esc_attr( $this->options["twitterusername"] ); ?>" /><label for="cp_twitterusername">Twitter Username</label><br /><br />
					
					<input class="mInput" type="checkbox" name="cp_enablefacebook" id="cp_enablefacebook" <?php echo $this->options["enablefacebook"] == 1 ? ' checked' : '' ?> /> <label for="cp_enablefacebook">Display a link to Facebook under Stay Updated link on masthead</label><br />
					<input class="inputN" name="cp_linktofacebook" id="cp_linktofacebook" type="text" value="<?php echo esc_attr( $this->options["linktofacebook"] ); ?>" /><label for="cp_linktofacebook">Link to facebook account</label><br />										
					
					<input class="mInput" type="checkbox" name="cp_enShareSingle" id="cp_enShareSingle" <?php echo $this->options["enShareSingle"] == 1 ? ' checked' : '' ?> /> <label for="cp_enShareSingle">Display socialize links below the posts</label><br />
					<input class="mInput" type="checkbox" name="cp_enSharePage" id="cp_enSharePage" <?php echo $this->options["enSharePage"] == 1 ? ' checked' : '' ?> /> <label for="cp_enSharePage">Display socialize links below the page entries</label><br />	
				</div>

				<div class="innerBoxH">
					<h3>Other Settings</h3>
					<select name="cp_arcPostType" class="selectCat">
					<option value="0"<?php selected(0, $this->options["arcPostType"]); ?>>Display only post excerpt</option>
					<option value="1"<?php selected(1, $this->options["arcPostType"]); ?>>Display post excerpt with thumbnail</option>
					<option value="2"<?php selected(2, $this->options["arcPostType"]); ?>>Display whole content</option>
					</select>on archive pages (date based, category, author and tag archives)<br/>
					<input class="inputN" name="cp_gab_favico" id="cp_gab_favico" type="text" value="<?php echo esc_attr( $this->options["gab_favico"] ); ?>" /><label for="cp_gab_favico">Favicon URL (leave empty to disable)</label><br />
					<input class="mInput" type="checkbox" name="cp_enCufon" id="cp_enCufon" <?php echo $this->options["enCufon"] == 1 ? ' checked' : '' ?> /> <label for="cp_enCufon">Enable cufon font replacement (uncheck if blog contains non-english characters)</label><br />
					<input class="mInput" type="checkbox" name="cp_enwidrecent" id="cp_enwidrecent" <?php echo $this->options["enwidrecent"] == 1 ? ' checked' : '' ?> /> <label for="cp_enwidrecent">Display recent entries widget on innerpage wide sidebar</label><br />
					<input class="mInput" type="checkbox" name="cp_enwidlinks" id="cp_enwidlinks" <?php echo $this->options["enwidlinks"] == 1 ? ' checked' : '' ?> /> <label for="cp_enwidlinks">Display featured links widget on innerpage wide sidebar</label><br />
					<input class="mInput" type="checkbox" name="cp_enwidsearch" id="cp_enwidsearch" <?php echo $this->options["enwidsearch"] == 1 ? ' checked' : '' ?> /> <label for="cp_enwidsearch">Display search archive widget on innerpage wide sidebar</label><br />
					<input class="inputID" name="cp_dateFormat" id="cp_dateFormat" type="text" value="<?php echo esc_attr( $this->options["dateFormat"] ); ?>" /><label for="cp_dateFormat">Date Format (Default M j Y) <a href="http://php.net/manual/en/function.date.php" target="_blank">See all operators</a></label><br />
					<input class="mInput" type="checkbox" name="cp_enshorturl" id="cp_enshorturl" <?php echo $this->options["enshorturl"] == 1 ? ' checked' : '' ?> /> <label for="cp_enshorturl">Display Short URL below entries</label><br />
					<input class="mInput" type="checkbox" name="cp_enbcrum" id="cp_enbcrum" <?php echo $this->options["enbcrum"] == 1 ? ' checked' : '' ?> /> <label for="cp_enbcrum">Display Category, Tag, Author captions above entries on archive pages</label><br />
					<input class="mInput" type="checkbox" name="cp_enpostmeta" id="cp_enpostmeta" <?php echo $this->options["enpostmeta"] == 1 ? ' checked' : '' ?> /> <label for="cp_enpostmeta">Display author info and post meta below post in article page</label><br /><br />
					<input class="inputN" name="cp_titleBreakingNews" id="cp_titleBreakingNews" type="text" value="<?php echo esc_attr( $this->options["titleBreakingNews"] ); ?>" /><label for="cp_titleBreakingNews">Title for Breaking News column on main page</label>
				</div>
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>		

			<h2>Manage Ads <span><a href="#" rel="toggle[misc2]" data-openimage="<?php bloginfo(template_url); ?>/includes/cp/collapse.png" data-closedimage="<?php bloginfo(template_url); ?>/includes/cp/expand.png"><img src="collapse.png"/></a></span></h2>
			<div class="innerBox" id="misc2">

				<div class="left">
				<input class="mInput" type="checkbox" name="cp_enable728" id="cp_enable728" <?php echo $this->options["enable728"] == 1 ? ' checked' : '' ?> /><label for="cp_enable728">Enable 728x90 ad on header</label>
				<textarea class="textarea" name="cp_ad728x90" id="cp_ad728x90"><?php echo htmlspecialchars( stripslashes($this->options["ad728x90"]) ); ?></textarea>
				</div>
				<div class="right">
				<label for="ad120x600_main">120x600 ad / Mainpage</label>
				<textarea class="textarea" name="cp_ad120x600_main" id="cp_ad120x600_main"><?php echo htmlspecialchars( stripslashes($this->options["ad120x600_main"]) ); ?></textarea>
				</div>
				<div class="left">
				<label for="ad120x600_inner">120x600 ad / Innerpage</label>
				<textarea class="textarea" name="cp_ad120x600_inner" id="cp_ad120x600_inner"><?php echo htmlspecialchars( stripslashes($this->options["ad120x600_inner"]) ); ?></textarea>
				</div>
				<div class="right">
				<label for="ad300x250_up">300x250 ad code / Mainpage top half</label>			
				<textarea class="textarea" name="cp_ad300x250_up" id="cp_ad300x250_up"><?php echo htmlspecialchars( stripslashes($this->options["ad300x250_up"]) ); ?></textarea>
				</div>
				<div class="left">
				<label for="ad300x250_bottom">300x250 ad code / Mainpage bottom half</label>
				<textarea class="textarea" name="cp_ad300x250_bottom" id="cp_ad300x250_bottom"><?php echo htmlspecialchars( stripslashes($this->options["ad300x250_bottom"]) ); ?></textarea>
				</div>
				<div class="right">
				<label for="adh468x60">(If Header with Ad layout is activated) 468x60 ad code</label>
				<textarea class="textarea" name="cp_adh468x60" id="cp_adh468x60"><?php echo htmlspecialchars( stripslashes($this->options["adh468x60"]) ); ?></textarea>						
				</div>
				<div class="left">
				<label for="test">300x250 ad code / Innerpage</label>
				<textarea class="textarea" name="cp_ad300x250_inner" id="cp_ad300x250_inner"><?php echo htmlspecialchars( stripslashes($this->options["ad300x250_inner"]) ); ?></textarea>
				</div>
				<div class="clear"></div>
				<p><input type="submit" value="Save Changes &raquo;" name="cp_save" class="button-primary" /></p>
			</div>

			<h2>Gabfire Themes</h2>
			<div class="innerBox">
				<div class="innerBoxH" id="gab_rssbox">
					<p>Subscribe to Gabfire Themes</p>
					<p>
						<a target="_blank" href="http://feeds.feedburner.com/gabfirethemes" class="gab_rss">Subscribe to RSS</a>
						<a target="_blank" href="http://feedburner.google.com/fb/a/mailverify?uri=gabfirethemes" class="gab_rss">Subscribe via Email</a>
						<a target="_blank" href="http://www.twitter.com/gabfirethemes" class="gab_twit">Follow on Twitter</a>
						<a target="_blank" href="http://www.facebook.com/pages/Gabfire-Premium-Themes/330773148827" class="gab_fb">Connect on Facebook</a>
					</p>
					<p>
						<a target="_blank" href="http://www.gabfirethemes.com/category/themes">See All Themes</a> | 
						<a target="_blank" href="http://www.gabfirethemes.com/services/">Our Services</a> | 
						<a target="_blank" href="http://www.gabfirethemes.com/faq/">Frequently Asked Qeustions</a> | 
						<a target="_blank" href="http://www.gabfirethemes.com/affiliate-program/">Become an Affiliate</a> | 
						<a target="_blank" href="http://www.gabfirethemes.com/contact/">Contact</a>
					</p>
				</div>
			</div>	
		</div>

	</fieldset>
 </form></div>
	<?php }
}
$cpanel = new ControlPanel();
$npdv_options = get_option('WpAdvNewspaper');
?>
