<?php get_header(); ?>
	<div id="primaryTopWrapper">
		<div id="featuredContent">
		
			<?php if (intval($npdv_options["feaPostCount"]) > 0 ) { ?>
			<!-- featured entries -->
			<div id="featured-slider" class="sliderwrapper">
				<?php 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["feaPostCount"].'&cat='.$npdv_options["featuredCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post(); 
				?>
				<div class="contentdiv">
				
					<?php 
					gab_media(array(
						'name' => 'npdv-featured', 
						'enable_video' => '1', 
						'enable_thumb' => '1', 
						'media_width' => '496', 
						'media_height' => '278', 
						'thumb_align' => 'alignnone', 
						'enable_default' => 1,
						'default_name' => 'featured.jpg'
						)); 
					?>								
					
					<?php if(($gab_video == '') and ($gab_flv == ''))  { ?>
						<div class="sliderPostInfo">
							<h2 class="featuredTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></h2>
							<?php /* If post excerpt activated */ if($npdv_options['enablePExcerpt'] == 1) { ?>
							<p><?php echo string_limit_words(get_the_excerpt(), $npdv_options["wordCount"]); ?>&hellip;</p>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
				<?php endwhile; wp_reset_query(); ?>
			</div>

			<div id="paginate-featured-slider">
				<ul>
					<?php 
					$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["feaPostCount"].'&cat='.$npdv_options["featuredCatID"]); 
					while ($gabquery->have_posts()) : $gabquery->the_post(); 
				
					echo '<li><a href="#" class="toc" rel="nofollow">';
					gab_media_nolink(array(
						'name' => 'npdv-featured_thumb', 
						'enable_video' => '0', 
						'enable_thumb' => '1', 
						'media_width' => '75', 
						'media_height' => '50', 
						'thumb_align' => 'alignnone', 
						'enable_default' => 1,
						'default_name' => 'featured_thumb.jpg'
					)); 
					echo '</a></li>';
				
					endwhile; wp_reset_query(); 
					?>
				</ul>
				<div class="clear"></div>
			</div>

			<script type="text/javascript">
				featuredcontentslider.init({
					id: "featured-slider", //id of main slider DIV
					contentsource: ["inline", ""], //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
					toc: "markup", //Valid values: "#increment", "markup", ["label1", "label2", etc]
					nextprev: ["", ""], //labels for "prev" and "next" links. Set to "" to hide.
					revealtype: "<?php if($npdv_options['revealtype'] == 1) { echo 'click'; } else { echo 'mouseover'; } ?>", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
					enablefade: [true, 0.4], //[true/false, fadedegree]
					autorotate: [<?php if($npdv_options['feaautorotate'] == 1) { echo 'true'; } else { echo 'false'; } ?>, <?php if ( $npdv_options["fearotatepause"] <> "" ) { echo $npdv_options["fearotatepause"].'000'; } else { echo '5000'; } ?>], //[true/false, pausetime]
					onChange: function(previndex, curindex){ //event handler fired whenever script changes slide
						//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
						//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
					}
				})
			</script>
			<!-- End of featured slider -->
			<?php } ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryLeft1') ) : ?>	
			<?php endif; ?>
			
			<!-- Entries below the featured section -->
			<?php if (intval($npdv_options["fea2PostCount"]) > 0 ) { ?>
				<?php 
				$count=1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["fea2PostCount"].'&cat='.$npdv_options["fea2CatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post(); 
				?>
					<div class="featuredPost2">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["fea2CatID"]);?>"><?php echo get_cat_name($npdv_options["fea2CatID"]); ?></a></span><?php } ?>

						<?php 
						gab_media(array(
							'name' => 'npdv-below_featured', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '110', 
							'media_height' => '90', 
							'thumb_align' => 'alignleft', 
							'enable_default' => $npdv_options["enthumb_1"],
							'default_name' => 'below_featured.jpg'
							)); 
						?>
											
						<h2 class="postTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?><?php _e(' &raquo;','WpAdvNewspaper'); ?></a></h2>
						<p><?php echo string_limit_words(get_the_excerpt(), 30); ?>&hellip;</p>
						<span class="featuredPost2Meta"<?php if ($count == $npdv_options["fea2PostCount"]) { ?> style="border:none;"<?php } ?>><?php the_time($npdv_options["dateFormat"]); ?> / <?php comments_popup_link(__('No Comment','WpAdvNewspaper'), __('1 Comment','WpAdvNewspaper'), __('% Comments','WpAdvNewspaper'));?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryLeft2') ) : ?>	
			<?php endif; ?>
			<!-- End of entries below the featured section -->
		</div><!-- Enf of featuredContent -->
		
		<div id="midColPosts">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryMid1') ) : ?>	
			<?php endif; ?>
			
			<?php if (intval($npdv_options["fea3PostCount"]) > 0 ) { ?>
				<!-- Entries on middle column on the right side of Featured section -->
				<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["fea3PostCount"].'&cat='.$npdv_options["fea3CatID"]);
				while ($gabquery->have_posts()) : $gabquery->the_post();
				?>
					<div class="midColPost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["fea3CatID"]);?>"><?php echo get_cat_name($npdv_options["fea3CatID"]); ?></a></span><?php } ?>
						<h2 class="postTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?><?php _e(' &raquo;','WpAdvNewspaper'); ?></a></h2>
						
						<?php 
						gab_media(array(
							'name' => 'npdv-primary_midcol', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '80', 
							'media_height' => '60', 
							'thumb_align' => 'alignleft', 
							'enable_default' => $npdv_options["enthumb_2"],
							'default_name' => 'primary_midcol.jpg'
							)); 
						?>
						
						<p><?php echo string_limit_words(get_the_excerpt(), 20); ?>&hellip;</p>
						<span class="midColPostMeta" <?php if ($count == $npdv_options["fea3PostCount"]) { ?>style="border:none;"<?php } ?>><?php the_time($npdv_options["dateFormat"]); ?> / <?php comments_popup_link(__('No Comment','WpAdvNewspaper'), __('1 Comment','WpAdvNewspaper'), __('% Comments','WpAdvNewspaper'));?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
				<!-- End of entries on middle column on the right side of Featured section -->
			<?php } ?>

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryMid2') ) : ?>	
			<?php endif; ?>
		</div><!-- End of midColPosts -->
		
		<div id="rightColAd">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryRight1') ) : ?>	
			<?php endif; ?>
			<?php include (TEMPLATEPATH . '/ads/mainpage_120x600.php'); ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryRight2') ) : ?>	
			<?php endif; ?>
		</div><!-- End of rightColAd -->
		<div class="clear"></div>
	</div><!-- End of PrimaryWrapper (Featured block + Mid colum block + 120+600 ad) -->
		
	<div id="secondaryContentWrapper">
		<div id="breakingNews">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryLeft1') ) : ?>
			<?php endif; ?>
			<?php if (intval($npdv_options["breakingNewsPostCount"]) > 0 ) { ?>			
				<h3 class="widgetbgTitle"><?php echo $npdv_options["titleBreakingNews"]; ?></h3>
				<ul>
					<?php 
					$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["breakingNewsPostCount"].'&cat='.$npdv_options["breakingNewsCatID"]); 
					while ($gabquery->have_posts()) : $gabquery->the_post();
					?>
						<li><strong><?php _e('&raquo; ','WpAdvNewspaper'); ?><?php the_time('H:i') ?></strong> <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile; wp_reset_query(); ?>
				</ul>
			<?php } ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryLeft2') ) : ?>
			<?php endif; ?>
		</div><!-- End of breakingNews -->
		
		<div id="secondaryMidColumn">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryMid1') ) : ?>
			<?php endif; ?>
			<?php if (intval($npdv_options["secondaryMidPostCount"]) > 0 ) { ?>
				<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["secondaryMidPostCount"].'&cat='.$npdv_options["secondaryMidCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				?>
					<div class="secondaryMidColPost" <?php if ($count == $npdv_options["secondaryMidPostCount"]) { ?>style="padding-bottom:0;"<?php } ?>>
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["secondaryMidCatID"]);?>"><?php echo get_cat_name($npdv_options["secondaryMidCatID"]); ?></a></span><?php } ?>
						<h2 class="postTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?><?php _e(' &raquo;','WpAdvNewspaper'); ?></a></h2>
						
						<?php 
						gab_media(array(
							'name' => 'npdv-secondary_midcol', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '80', 
							'media_height' => '60', 
							'thumb_align' => 'alignleft', 
							'enable_default' => $npdv_options["enthumb_3"],
							'default_name' => 'secondary_midcol.jpg'
							)); 
						?>
					
						<p><?php echo string_limit_words(get_the_excerpt(), 45); ?>&hellip;</p>
						<span class="secondaryMidColPostMeta" <?php if ($count == $npdv_options["secondaryMidPostCount"]) { ?>style="border:none;"<?php } ?>><?php the_time($npdv_options["dateFormat"]); ?> / <?php comments_popup_link(__('No Comment','WpAdvNewspaper'), __('1 Comment','WpAdvNewspaper'), __('% Comments','WpAdvNewspaper'));?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryMid2') ) : ?>
			<?php endif; ?>
		</div><!-- End of secondaryMidColumn -->
		
		<div id="secondaryRightColumn">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryRight1') ) : ?>
			<?php endif; ?>
			<?php if (intval($npdv_options["secondaryRightPostCount"]) > 0 ) { ?>
				<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["secondaryRightPostCount"].'&cat='.$npdv_options["secondaryRightCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				?>
					<div class="secondaryRightColPost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["secondaryRightCatID"]);?>"><?php echo get_cat_name($npdv_options["secondaryRightCatID"]); ?></a></span><?php } ?>
						<h2 class="postTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?> &raquo;</a></h2>
						
						<?php 
						gab_media(array(
							'name' => 'npdv-secondary_rightcol', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '50', 
							'media_height' => '35', 
							'thumb_align' => 'alignleft', 
							'enable_default' => $npdv_options["enthumb_4"],
							'default_name' => 'secondary_rightcol.jpg'
							)); 
						?>
											
						<p><?php echo string_limit_words(get_the_excerpt(), 25); ?>&hellip;</p>
						<span class="secondaryRightColPostMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <?php comments_popup_link(__('No Comment','WpAdvNewspaper'), __('1 Comment','WpAdvNewspaper'), __('% Comments','WpAdvNewspaper'));?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
			
			<?php include (TEMPLATEPATH . '/ads/mainpage_300x250top.php'); ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryRight2') ) : ?>
			<?php endif; ?>
			
			
		</div><!-- End of secondaryRightColumn -->
		
		<div class="clear"></div>
	</div><!-- End of SecondaryContentWrapper (BreakingNews + 2 columns on the right side of breaking news spot) -->
	
	<!-- PHOTO GALLERY -->
	<?php if($npdv_options['enablePhotoGallery'] == 1) { ?>
		<div id="photoGalleryBar">
			<div id="previous_button"></div>
			<div class="container">
				<ul>
					<?php 
					$count = 1;
					$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountPhotoBar"].'&cat='.$npdv_options["photoGalCatID"]); 
					while ($gabquery->have_posts()) : $gabquery->the_post(); 
					?>
					<li class="car">
						<div class="thumb">
							<?php 
							gab_media(array(
								'name' => 'npdv-mainpage_photogal', 
								'enable_video' => '1', 
								'enable_thumb' => '1', 
								'media_width' => '161', 
								'media_height' => '120', 
								'thumb_align' => 'alignnone', 
								'enable_default' => 1,
								'default_name' => 'mainpage_photogal.jpg'
								)); 
							?>
						</div>
						<p><a class="photogallery_title" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></p>
					</li>
					<?php $count++; endwhile; wp_reset_query(); ?>
				</ul>
				<div class="clear"></div>
			</div>
			<div id="next_button"></div>
		</div>
		<script type="text/javascript">
			(function($) { 	$(document).ready(function(){
				$("#photoGalleryBar .container").jCarouselLite({
					<?php if($npdv_options['midautorotate'] == 1){ ?>
						auto:<?php if ( $npdv_options["midpausetime"] <> "" ) { echo $npdv_options["midpausetime"].'000'; } else { echo '5000'; } ?>,
					<?php } ?>
					scroll: <?php if ( $npdv_options["midscroll"] <> "" ) { echo $npdv_options["midscroll"]; } else { echo '4'; } ?>,
					speed: <?php if ( $npdv_options["midspeed"] <> "" ) { echo $npdv_options["midspeed"].'000'; } else { echo '2000'; } ?>,	
					visible: 5,
					start: 0,
					circular: false,
					btnPrev: "#previous_button",
					btnNext: "#next_button"
				});
			})})(jQuery)	
		</script>
	<?php } ?>
	
	<div id="subNews">
		<div class="subNewsContainer">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subnews_1x8') ) : ?>
			<?php endif; ?>
			
			<?php if (intval($npdv_options["postCountBot1"]) > 0 ) { ?>
				<?php
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountBot1"].'&cat='.$npdv_options["sub1stCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
				?>
					<div class="subnewspost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["sub1stCatID"]);?>"><?php echo get_cat_name($npdv_options["sub1stCatID"]); ?></a></span><?php } ?>
						
						<?php 
						gab_media(array(
							'name' => 'npdv-subnews', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '150', 
							'media_height' => '115', 
							'thumb_align' => 'alignnone', 
							'enable_default' => $npdv_options["enthumb_5"],
							'default_name' => 'subnews1x8.jpg'
							)); 
						?>
					
						<h2 class="subnewsEntryTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<p><?php echo string_limit_words(get_the_excerpt(), 36); ?>&hellip;</p>
						<span class="subNewsContainerMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div><!-- end of .subnewspost -->				
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
		</div><!-- End of 1st row / 1st column out of 4 -->
		
		<div class="subNewsContainer">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subnews_2x8') ) : ?>
			<?php endif; ?>		
		
			<?php if (intval($npdv_options["postCountBot2"]) > 0 ) { ?>
				<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountBot2"].'&cat='.$npdv_options["sub2ndCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
				?>
					<div class="subnewspost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["sub2ndCatID"]);?>"><?php echo get_cat_name($npdv_options["sub2ndCatID"]); ?></a></span><?php } ?>	
							
						<?php 
						gab_media(array(
							'name' => 'npdv-subnews', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '150', 
							'media_height' => '115', 
							'thumb_align' => 'alignnone', 
							'enable_default' => $npdv_options["enthumb_6"],
							'default_name' => 'subnews2x8.jpg'
							)); 
						?>

						<h2 class="subnewsEntryTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

						<p><?php echo string_limit_words(get_the_excerpt(), 36); ?>&hellip;</p>
						<span class="subNewsContainerMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div><!-- end of .subnewspost -->
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
		</div><!-- End of 1st row / 2nd column out of 4 -->
		
		<div class="subNewsContainer">	
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subnews_3x8') ) : ?>
			<?php endif; ?>
		
			<?php if (intval($npdv_options["postCountBot3"]) > 0 ) { ?>
				<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountBot3"].'&cat='.$npdv_options["sub3rdCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
				?>
					<div class="subnewspost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["sub3rdCatID"]);?>"><?php echo get_cat_name($npdv_options["sub3rdCatID"]); ?></a></span><?php } ?>
							
						<?php 
						gab_media(array(
							'name' => 'npdv-subnews', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '150', 
							'media_height' => '115', 
							'thumb_align' => 'alignnone', 
							'enable_default' => $npdv_options["enthumb_7"],
							'default_name' => 'subnews3x8.jpg'
							)); 
						?>

						<h2 class="subnewsEntryTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

						<p><?php echo string_limit_words(get_the_excerpt(), 36); ?>&hellip;</p>
						<span class="subNewsContainerMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div><!-- end of .subnewspost -->
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
		</div><!-- End of 1st row / 3rd column out of 4 -->
		
		<div class="subNewsContainer nomargin-right">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subnews_4x8') ) : ?>
			<?php endif; ?>		
		
			<?php if (intval($npdv_options["postCountBot4"]) > 0 ) { ?>
				<?php
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountBot4"].'&cat='.$npdv_options["sub4thCatID"]);
				while ($gabquery->have_posts()) : $gabquery->the_post();
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
				?>
					<div class="subnewspost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["sub4thCatID"]);?>"><?php echo get_cat_name($npdv_options["sub4thCatID"]); ?></a></span><?php } ?>
							
						<?php 
						gab_media(array(
							'name' => 'npdv-subnews', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '150', 
							'media_height' => '115', 
							'thumb_align' => 'alignnone', 
							'enable_default' => $npdv_options["enthumb_8"],
							'default_name' => 'subnews4x8.jpg'
							)); 
						?>

						<h2 class="subnewsEntryTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
						<p><?php echo string_limit_words(get_the_excerpt(), 36); ?>&hellip;</p>
						<span class="subNewsContainerMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div><!-- end of .subnewspost -->
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
		</div><!-- End of 1st row / 4th column out of 4 -->
		
		<div class="border"></div>

		<div class="subNewsContainer">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subnews_5x8') ) : ?>
			<?php endif; ?>		
		
			<?php if (intval($npdv_options["postCountBot5"]) > 0 ) { ?>
				<?php
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountBot5"].'&cat='.$npdv_options["sub5thCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
				?>
					<div class="subnewspost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["sub5thCatID"]);?>"><?php echo get_cat_name($npdv_options["sub5thCatID"]); ?></a></span><?php } ?>
							
						<?php 
						gab_media(array(
							'name' => 'npdv-subnews', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '150', 
							'media_height' => '115', 
							'thumb_align' => 'alignnone', 
							'enable_default' => $npdv_options["enthumb_9"],
							'default_name' => 'subnews5x8.jpg'
							)); 
						?>

						<h2 class="subnewsEntryTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
						<p><?php echo string_limit_words(get_the_excerpt(), 36); ?>&hellip;</p>
						<span class="subNewsContainerMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div><!-- end of .subnewspost -->
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
		</div><!-- End of 2nd row / 1st column out of 4 -->
		
		<div class="subNewsContainer">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subnews_6x8') ) : ?>
			<?php endif; ?>		
		
			<?php if (intval($npdv_options["postCountBot6"]) > 0 ) { ?>
				<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountBot6"].'&cat='.$npdv_options["sub6thCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
				?>
					<div class="subnewspost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["sub6thCatID"]);?>"><?php echo get_cat_name($npdv_options["sub6thCatID"]); ?></a></span><?php } ?>
							
						<?php 
						gab_media(array(
							'name' => 'npdv-subnews', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '150', 
							'media_height' => '115', 
							'thumb_align' => 'alignnone', 
							'enable_default' => $npdv_options["enthumb_10"],
							'default_name' => 'subnews6x8.jpg'
							)); 
						?>

						<h2 class="subnewsEntryTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
						<p><?php echo string_limit_words(get_the_excerpt(), 36); ?>&hellip;</p>
						<span class="subNewsContainerMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div><!-- end of .subnewspost -->
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
		</div><!-- End of 2nd row / 2ndcolumn out of 4 -->
		
		<div class="subNewsContainer">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subnews_7x8') ) : ?>
			<?php endif; ?>		
		
			<?php if (intval($npdv_options["postCountBot7"]) > 0 ) { ?>
				<?php
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountBot7"].'&cat='.$npdv_options["sub7thCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
				?>
					<div class="subnewspost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["sub7thCatID"]);?>"><?php echo get_cat_name($npdv_options["sub7thCatID"]); ?></a></span><?php } ?>
						
						<?php 
						gab_media(array(
							'name' => 'npdv-subnews', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '150', 
							'media_height' => '115', 
							'thumb_align' => 'alignnone', 
							'enable_default' => $npdv_options["enthumb_11"],
							'default_name' => 'subnews7x8.jpg'
							)); 
						?>

						<h2 class="subnewsEntryTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						
						<p><?php echo string_limit_words(get_the_excerpt(), 36); ?>&hellip;</p>
						<span class="subNewsContainerMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div><!-- end of .subnewspost -->
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
		</div><!-- End of 2nd row / 3rd column out of 4 -->
		
		<div class="subNewsContainer nomargin-right">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Subnews_8x8') ) : ?>
			<?php endif; ?>		
		
			<?php if (intval($npdv_options["postCountBot8"]) > 0 ) { ?>
				<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["postCountBot8"].'&cat='.$npdv_options["sub8thCatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post();
				$key2 = 'thumbnail'; $gab_thumb = get_post_meta($post->ID, $key2, TRUE); /* Custom field thumbnail check */
				?>
					<div class="subnewspost">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["sub8thCatID"]);?>"><?php echo get_cat_name($npdv_options["sub8thCatID"]); ?></a></span><?php } ?>
						
						<?php 
						gab_media(array(
							'name' => 'npdv-subnews', 
							'enable_video' => '0', 
							'enable_thumb' => '1', 
							'media_width' => '150', 
							'media_height' => '115', 
							'thumb_align' => 'alignnone', 
							'enable_default' => $npdv_options["enthumb_12"],
							'default_name' => 'subnews8x8.jpg'
							)); 
						?>

						<h2 class="subnewsEntryTitle"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
						<p><?php echo string_limit_words(get_the_excerpt(), 36); ?>&hellip;</p>
						<span class="subNewsContainerMeta"><?php the_time($npdv_options["dateFormat"]); ?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span>
					</div><!-- end of .subnewspost -->
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
		</div><!-- End of 2nd row / 4th column out of 4 -->
	</div><!-- enf od subnews -->

	<?php get_sidebar(); ?>
	
	<div class="clear"></div>
	
	<?php get_footer(); ?>
</div><!-- end of wrapper -->

</body>
</html>
