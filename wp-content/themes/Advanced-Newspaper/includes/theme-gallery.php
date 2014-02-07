<?php
$number_photos = -1; 		// -1 to display all
$photo_size = 'large';		// The standard WordPress size to use for the large image
$thumb_size = 'thumbnail';	// The standard WordPress size to use for the thumbnail
$thumb_width = 65;			// Size of thumbnails to embed into img tag
$thumb_height = 50;			// Size of thumbnails to embed into img tag
$photo_height = 270;		// Size of photo to embed into img tag

$attachments = get_children( array(
'post_parent' => $post->ID,
'numberposts' => $number_photos,
'post_type' => 'attachment',
'post_mime_type' => 'image',
'order' => 'ASC', 
'orderby' => 'menu_order date')
);

if ( !empty($attachments) ) :
	$counter = 0;
	$photo_output = '';
	$thumb_output = '';	
	foreach ( $attachments as $att_id => $attachment ) {
		$counter++;
		
		# Caption
		$caption = "";
		if ($attachment->post_excerpt) 
			$caption = '<p class="sliderCaption">'.$attachment->post_excerpt.'</p>';	
			
		# Large photo
		$src = wp_get_attachment_image_src($att_id, $photo_size, true);
			$photo_output .= '<div class="contentdiv" style="height:'.$photo_height.'px;display:block;overflow:hidden"><a href="'. $src[0] .'"><img src="'. $src[0] .'" alt="" /></a>'.$caption.'</div>'; 
		
		# Thumbnail
		$src = wp_get_attachment_image_src($att_id, $thumb_size, true);
		$thumb_output .= '<li><a href="#" class="toc"><img src="'. $src[0] .'"  width="'.$thumb_width.'" height="'.$thumb_height.'" alt="" />' . "</a></li>\n"; 
	}  
endif; ?>

<?php if ($counter > 1) : ?>
	<div id="innerpage-slider" class="sliderwrapper">
		<?php echo $photo_output; ?>
	</div>

	<div id="paginate-innerpage-slider">
		<ul>
			<?php echo $thumb_output; ?>
		</ul>
		<div class="clear"></div>
	</div>

	<script type="text/javascript">
		featuredcontentslider.init({
			id: "innerpage-slider",  //id of main slider DIV
			contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
			toc: "markup",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
			nextprev: ["", ""],  //labels for "prev" and "next" links. Set to "" to hide.
			revealtype: "<?php if($npdv_options['innerrevealtype'] == 1) { echo 'click'; } else { echo 'mouseover'; } ?>", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
			enablefade: [true, 0.4],  //[true/false, fadedegree]
			autorotate: [<?php if($npdv_options['innerautorotate'] == 1) { echo 'true'; } else { echo 'false'; } ?>, <?php if ( $npdv_options["innerpausetime"] <> "" ) { echo $npdv_options["innerpausetime"].'000'; } else { echo '5000'; } ?>], //[true/false, pausetime]
			onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
				//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
				//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
			}
		})
	</script>
	<!-- End of featured entries -->
<?php endif; ?>