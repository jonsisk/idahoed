<?php global $npdv_options, $currentcat, $themeinfo; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">	<meta name="google-site-verification" content="uv84YMmRpa5lpmCSMy68nCa-Q3DNiP6civienUQ5FaQ" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title>
		<?php if(is_home() ) { bloginfo('name'); ?> | <?php bloginfo('description'); } ?>
		<?php if(is_single() || is_page() || is_archive() || is_tag() || is_category() ) { wp_title('',true); ?> | <?php bloginfo('name'); } ?>
		<?php if(is_404()) { ?> <?php _e('404 Error! Page Not Found','WpAdvNewspaper'); ?> | <?php bloginfo('name'); } ?>
		<?php if(is_search()) { ?><?php _e('Search results for:','WpAdvNewspaper'); ?> <?php echo wp_specialchars($s, 1); ?> | <?php bloginfo('name'); } ?>
	</title>
	<?php /* add favicon */ if ( $npdv_options["gab_favico"] <> "" ) { ?>
			<link rel="shortcut icon" href="<?php echo $npdv_options["gab_favico"]; ?>" />
	<?php } ?>
	<style type="text/css" media="screen">@import url( <?php bloginfo('stylesheet_url'); ?> );</style>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/<?php echo $npdv_options["style"]; ?>.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/custom.css" type="text/css" media="screen" />

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

	<div id="masthead">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu_Masthead') ) : ?>
		<?php /* NAV MENU 1 */
			if($npdv_options['ennav1'] == 1) { 
				wp_nav_menu( array('theme_location' => 'masthead', 'container' => false));
			} else { ?>
				<ul>
					<li><a href="#"><?php _e('Stay Connected','WpAdvNewspaper'); ?></a>
						<ul>
							<li><a class="gab_rss" href="<?php if ( $npdv_options["feedlink"] <> "" ) { echo $npdv_options["feedlink"]; } else { echo bloginfo('rss2_url'); } ?>" rel="nofollow" title="<?php _e('Subscribe to latest posts in RSS','WpAdvNewspaper'); ?>"><?php _e('Latest Posts in RSS','WpAdvNewspaper'); ?></a>
								<ul>
									<?php
										$categories = get_categories('hide_empty=1');
										foreach ($categories as $cat) 
										{
											echo '<li><a class="gab_rss" rel="nofollow" href="'.get_category_feed_link($cat->cat_ID, '').'">'. $cat->cat_name.'</a></li>';
										}
									?>				
								</ul>
							</li>
							<li><a class="gab_rss" href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow" title="<?php _e('Subscribe to latest comments in RSS','WpAdvNewspaper'); ?>"><?php _e('Latest Comments in RSS','WpAdvNewspaper'); ?></a></li>
							<?php if($npdv_options['enableMailSubscribe'] == 1) { ?><li><a class="gab_email" href="<?php echo $npdv_options["emailSubscribeLink"]; ?>" rel="nofollow" title="<?php _e('Subscribe to latest posts via email','WpAdvNewspaper'); ?>"><?php _e('Subscribe by e-mail','WpAdvNewspaper'); ?></a></li><?php } ?>
							<?php if($npdv_options['enabletwitterUp'] == 1) { ?><li><a class="gab_twitter" href="http://www.twitter.com/<?php echo $npdv_options["twitterusername"]; ?>" rel="nofollow" title="<?php _e('follow on twitter','WpAdvNewspaper'); ?>"><?php _e('Follow us on Twitter','WpAdvNewspaper'); ?></a></li><?php } ?>
							<?php if($npdv_options['enablefacebook'] == 1) { ?><li><a class="gab_facebook" href="<?php echo $npdv_options["linktofacebook"]; ?>" rel="nofollow" title="<?php _e('Connect on facebook','WpAdvNewspaper'); ?>"><?php _e('Connect on Facebook','WpAdvNewspaper'); ?></a></li><?php } ?>
						</ul>
					</li>
					<li> / <script type="text/javascript">
							<!--
							var mydate=new Date()
							var year=mydate.getYear()
							if (year < 1000)
							year+=1900
							var day=mydate.getDay()
							var month=mydate.getMonth()
							var daym=mydate.getDate()
							if (daym<10)
							daym="0"+daym
							var dayarray=new Array("<?php _e('Sunday','WpAdvNewspaper'); ?>","<?php _e('Monday','WpAdvNewspaper'); ?>","<?php _e('Tuesday','WpAdvNewspaper'); ?>","<?php _e('Wednesday','WpAdvNewspaper'); ?>","<?php _e('Thursday','WpAdvNewspaper'); ?>","<?php _e('Friday','WpAdvNewspaper'); ?>","<?php _e('Saturday','WpAdvNewspaper'); ?>")
							var montharray=new Array("<?php _e('January','WpAdvNewspaper'); ?>","<?php _e('February','WpAdvNewspaper'); ?>","<?php _e('March','WpAdvNewspaper'); ?>","<?php _e('April','WpAdvNewspaper'); ?>","<?php _e('May','WpAdvNewspaper'); ?>","<?php _e('June','WpAdvNewspaper'); ?>","<?php _e('July','WpAdvNewspaper'); ?>","<?php _e('August','WpAdvNewspaper'); ?>","<?php _e('September','WpAdvNewspaper'); ?>","<?php _e('October','WpAdvNewspaper'); ?>","<?php _e('November','WpAdvNewspaper'); ?>","<?php _e('December','WpAdvNewspaper'); ?>")
							document.write(""+dayarray[day]+", "+montharray[month]+" "+daym+", "+year+"")
							//-->
						</script>
					</li>
				</ul>
			<?php } ?>
		<?php endif; ?>
		<div id="search"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
		<div class="clear"></div>
	</div><!-- enf od Masthead -->
	<!-- #Header -->
	<?php if ($npdv_options['switchheader'] == 2) { /* If display a single image for header is selected */ ?>
			<a href="<?php bloginfo('url'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $npdv_options["headerimage"]; ?>" style="max-width:970px" alt="<?php bloginfo('name'); ?>" /></a>
	<?php } elseif($npdv_options['switchheader'] == 1) { /* If header with quotes option is selected */
			include (TEMPLATEPATH . '/headerWithQ.php');
		} else { /* If header with Advertisement option is selected */
			include (TEMPLATEPATH . '/headerWithAd.php'); 
	} ?>
	<!-- // header -->
	
	<div class="clear"></div>		
	
	<div id="navcats">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu_Categories') ) : ?>
			<?php /* NAV MENU 2 */
				if($npdv_options['ennav2'] == 1) { 
					wp_nav_menu( array('theme_location' => 'Header_Category_Nav', 'container' => false));
				} else { ?>
					<ul>
						<li<?php if(is_home() ) { ?> class="current-cat"<?php } ?>><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php _e('Home','WpAdvNewspaper'); ?></a></li>
						<?php wp_list_categories('orderby='.$npdv_options["orderBy"].'&order='.$npdv_options["order"].'&title_li=&exclude='.$npdv_options["excludeCategories"]); ?>
					</ul>
			 <?php } ?>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
	
	<div id="navpages">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu_Pages') ) : ?>
			<?php /* NAV MENU 3 */
				if($npdv_options['ennav3'] == 1) { 
					wp_nav_menu( array('theme_location' => 'Header_Page_Nav', 'container' => false));
				} else { ?>
					<ul>
						<?php wp_list_pages('sort_column=menu_order&title_li=&exclude='.$npdv_options["excludePageNav"]); ?>
					</ul>
			 <?php } ?>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
	
<div class="clear"></div>	
