<?php get_header(); ?>
<style>
ul.enterprise {
	list-style:bullet;
	}
ul.enterprise a {
	color:black;
	font-size:14px;
	line-height:22px;
	}
ul.enterprise a:hover {
	text-decoration:underline;
	}
.cat-chicklets {
	float:right;
	}
.postmetatext {
	float:left;
	}
.midColPostMeta,
.featuredPost2Meta {
	min-height:20px;
	}
.cat-chicklet{
	padding: 0 4px 0;
	margin: 0 0 0 4px;
	float:right;
	color:white;
	text-transform:capitalize;
	border-radius: 5px;
	}
.cat-chicklets .briefs {
	background: #006782;
	}
.cat-chicklets .governor {
	background: #810e00;
	}
.cat-chicklets .superintendents {
	background:#5C3317;
	}
.cat-chicklets .elections {
	background: #00760a;
	}
</style>
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
			
			<!-- Start of first set of entries below the featured slider -->
			<?php if (intval($npdv_options["fea2PostCount"]) > 0 ) { ?>
				<?php 
				$count=1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["fea2PostCount"].'&cat='.$npdv_options["fea2CatID"]); 
				while ($gabquery->have_posts()) : $gabquery->the_post(); 
				?>
					<div class="featuredPost2">
						<?php if ($count == 1) { ?><span class="titleCatName"><a style="text-transform:none;" href="<?php echo get_category_link($npdv_options["breakingNewsCatID"]);?>">The EDge - Kevin Richert's Idaho Education Blog</a></span><?php } ?>
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
						<p><?php the_excerpt(); ?></p>
						<div class="featuredPost2Meta"<?php if ($count == $npdv_options["fea2PostCount"]) { ?> style="border:none;"<?php } ?>><span class="postmetatext"><?php the_time($npdv_options["dateFormat"]); ?> / <?php comments_popup_link(__('No Comment','WpAdvNewspaper'), __('1 Comment','WpAdvNewspaper'), __('% Comments','WpAdvNewspaper'));?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span><?php include 'meta-cat-tags.php';?></div>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryLeft2') ) : ?>	
			<?php endif; ?>
			<!-- End of first set of entries below the featured slider -->
			<!-- Start of second set of entries below the featured slider -->
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryLeft1') ) : ?>
			<?php endif; ?>
			<?php if (intval($npdv_options["breakingNewsPostCount"]) > 0 ) { ?>		
			<?php 
				$count = 1; 
				$gabquery = new WP_Query();$gabquery->query('showposts='.$npdv_options["breakingNewsPostCount"].'&cat='.$npdv_options["breakingNewsCatID"]);
				while ($gabquery->have_posts()) : $gabquery->the_post();
				?>
					<div class="featuredPost2">
						<?php if ($count == 1) { ?><span class="titleCatName"><a href="<?php echo get_category_link($npdv_options["breakingNewsCatID"]);?>"><?php echo get_cat_name($npdv_options["breakingNewsCatID"]); ?></a></span><?php } ?>
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
						<p><?php the_excerpt(); ?></p>
						<div class="featuredPost2Meta" <?php if ($count == $npdv_options["breakingNewsPostCount"]) { ?>style="border:none;"<?php } ?>><span class="postmetatext"><?php the_time($npdv_options["dateFormat"]); ?> / <?php comments_popup_link(__('No Comment','WpAdvNewspaper'), __('1 Comment','WpAdvNewspaper'), __('% Comments','WpAdvNewspaper'));?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span><?php include 'meta-cat-tags.php';?></div>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
			<?php } ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('SecondaryLeft2') ) : ?>
			<?php endif; ?>
		<!-- End of second set of entries below featured slider -->
		</div><!-- Enf of featuredContent -->
		
		<div id="midColPosts">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryMid1') ) : ?>	
			<?php endif; ?>
			
			<?php if (intval($npdv_options["fea3PostCount"]) > 0 ) { ?>
				<!-- Entries to right of featured slider -->
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
						<p><?php the_excerpt(); ?></p>
						<div class="midColPostMeta" <?php if ($count == $npdv_options["fea3PostCount"]) { ?>style="border:none;"<?php } ?>><span class="postmetatext"><?php the_time($npdv_options["dateFormat"]); ?> / <?php comments_popup_link(__('No Comment','WpAdvNewspaper'), __('1 Comment','WpAdvNewspaper'), __('% Comments','WpAdvNewspaper'));?> / <a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Read More &raquo;','WpAdvNewspaper'); ?></a><?php edit_post_link(__('Edit','WpAdvNewspaper'),' / ',''); ?></span><?php include 'meta-cat-tags.php';?></div>
					</div>
				<?php $count++; endwhile; wp_reset_query(); ?>
				<!-- End of first set of entries to the right of featured slider -->
			<?php } ?>
			
			<!-- Start Bill Tracker -->
					
			<div class="midColPost">
				<span class="titleCatName">Special Legislative Coverage</span>
				<a href="/2014-voter-guide"><img src="http://www.idahoednews.org/wp-content/themes/idahoednews/images/bill-tracker-homepage.png" /></a>
			</div>
			
			<!-- Start Enterprise Package -->
			<?php /* Disabled for bill tracker
			
			<div class="midColPost">
				<span class="titleCatName"><?php echo $npdv_options["ien_enterprise_headline"];?></span>
				<ul class=enterprise>
				<?php
				$ien_ent_query = new WP_Query(array('tag'=>$npdv_options["ien_enterprise_tag"], 'posts_per_page' => '5'));
				while ($ien_ent_query->have_posts()) : $ien_ent_query->the_post();?>
					<li><a href="<?php the_permalink();?>"><?php the_title();?></a><span style="font-size:16px"> &raquo;</span></li>
				<?php endwhile;	?>
					<li><strong><a style="color:#734337" href="/tag/<?php echo $npdv_options["ien_enterprise_tag"]?>"><?php echo $npdv_options["ien_enterprise_category"]?> </a></strong></li>
				</ul>
			</div>
			
			*/?>
			<!-- End Enterprise Package -->
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('PrimaryMid2') ) : ?>	
			<?php endif; ?>
				
		</div><!-- End of midColPosts -->
		<div class="clear"></div>
	</div><!-- End of PrimaryWrapper (Featured block + Mid colum block + 120+600 ad) -->
		
	<div id="secondaryContentWrapper">
		<div class="one_third" style="margin-right:.5%;">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homeSecondary1') ) : endif;?>
		</div>
		<div class="one_third" style="margin-right:.5%;">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homeSecondary2') ) : endif;?>
		</div>
		<div class="one_third">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homeSecondary3') ) : endif;?>
		</div>
	<div class="clear"></div>
	</div><!-- End of SecondaryContentWrapper (BreakingNews + 2 columns on the right side of breaking news spot) -->
	
	<?php get_footer(); ?>
</div><!-- end of wrapper -->

</body>
</html>
