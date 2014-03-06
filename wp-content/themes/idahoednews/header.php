<?php global $npdv_options, $currentcat, $themeinfo; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta name="original-source" content="<?php echo get_permalink(); ?>">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title>
		<?php if(is_home() ) { bloginfo('description'); ?> | <?php bloginfo('name'); } ?>
		<?php if(is_single() || is_page() || is_archive() || is_tag() || is_category() ) { wp_title('',true); ?> | <?php bloginfo('name'); } ?>
		<?php if(is_404()) { ?> <?php _e('404 Error! Page Not Found','WpAdvNewspaper'); ?> | <?php bloginfo('name'); } ?>
		<?php if(is_search()) { ?><?php _e('Search results for:','WpAdvNewspaper'); ?> <?php echo wp_specialchars($s, 1); ?> | <?php bloginfo('name'); } ?>
	</title>
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css?v=1.4">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( $npdv_options["feedlink"] <> "" ) { echo $npdv_options["feedlink"]; } else { echo bloginfo('rss2_url'); } ?>" />	
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php if ( $npdv_options["feedlink"] <> "" ) { echo $npdv_options["feedlink"]; } else { echo bloginfo('rss_url'); } ?>" />	
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />	
	<?php wp_get_archives('type=monthly&format=link'); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

	<?php if($npdv_options['enCufon'] == 1) { ?>
	<script type="text/javascript">
		Cufon.replace('#leaveComment');
		Cufon.replace('.widgetbgTitle');
		Cufon.replace('.narrowSidebarTitle');
	</script>
	<?php } ?>
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
</head>

<body>
<?php /* Define id number of current category for category based advertisement */
	if(is_category() || is_single()) {
		$category = get_the_category();
		$currentcat = $category[0]->cat_ID;
	}
?>

<?php if($npdv_options['enable728'] == 1) { ?>
	<div id="topad">
		<?php
			if(file_exists(TEMPLATEPATH . '/ads/sitewide_728x90/'.$currentcat.'.php') && (is_single() || is_category())) {
				include_once(TEMPLATEPATH . '/ads/sitewide_728x90/'.$currentcat.'.php');
			}
			else {
				include_once(TEMPLATEPATH . '/ads/sitewide_728x90.php');
			}
		?>
	</div>
<?php } ?>

<div id="wrapper">
	<div id="header">
		<div id="header_logo"><a href="/"><img src="<?php bloginfo('stylesheet_directory')?>/images/logo.png" /></a></div>
		<div id="header_date"><?php echo date('l, F jS Y');?>
		<div id="header_newsletter">
			<style type="text/css">
				#mc_embed_signup{background:#fff; clear:left; font:10px Helvetica,Arial,sans-serif; }
				/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
				We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
			</style>
			<form action="http://boisestate.us4.list-manage.com/subscribe/post?u=5be8de5937d5d7832b6259d69&amp;id=622c84586f" method="post" id=	"mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
				<input type="submit" value="Subscribe to Newsletter" name="subscribe" id="mc-embedded-subscribe" class="button">
			</form>
		</div>
		</div>
<?php /*		<div id="header_social">
			<a href="/?feed=rss2"><img src="<?php bloginfo('stylesheet_directory')?>/images/t-rss.png" /></a>
			<a href="http://www.twitter.com/idahoednews"><img src="<?php bloginfo('stylesheet_directory')?>/images/t-twitter.png" /></a>
			<a href="http://www.facebook.com/idahoednews"><img src="<?php bloginfo('stylesheet_directory')?>/images/t-facebook.png" /></a>
		</div>
*/ ?>
		<div id="idahoedtrends">
			<a href="http://www.idahoedtrends.org/" target=_blank><img src="<?php echo  get_stylesheet_directory_uri();?>/images/idaho-ed-trends.png" /></a>
		</div>
		<div class="clear"></div>
	</div>
	<div id="navcats">
		<?php wp_nav_menu( array('menu' => 'Main Menu', 'container' => false));?>
		<div id="search"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
		<div class="clear"></div>
	</div>
	<div id="navpages">
		<?php wp_nav_menu( array('menu' => 'Sub Menu', 'container' => false));?>
		<div class="clear"></div>
	</div>	
<div class="clear"></div>	
