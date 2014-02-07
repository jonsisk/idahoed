<?php
//Call post excerpt
function string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}
// Create gab_media function
	function call_flv ($parameters){
		global $post, $gab_flv;
			$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */
			echo '
				<a href="'.esc_attr( get_post_meta($post->ID, 'videoflv', true) ).'" style="display:block;width:'.$parameters['media_width'].'px;height:'.$parameters['media_height'].'px" id="'.$parameters['name'].$post->ID.'"></a> 
				<script type="text/javascript">
					flowplayer("'.$parameters['name'].$post->ID.'", "';bloginfo('template_url');echo'/includes/js/flowplayer-3.2.5.swf",{ 
					clip: { 
					    autoPlay: false, 
						autoBuffering: true, 
					} 
					});
				</script> ';
	}
	function call_swf ($parameters){
		global $post, $gab_video;
		$gab_video = get_post_meta($post->ID, 'video', TRUE);
		echo '
			<object type="application/x-shockwave-flash" style="width:'.$parameters['media_width'].'px; height:'.$parameters['media_height'].'px;" data="'.esc_attr( get_post_meta($post->ID, 'video', true) ).'">
			<param name="wmode" value="opaque" /><param name="movie" value="'.esc_attr( get_post_meta($post->ID, 'video', true) ).'" /></object>'; 
	}
	function call_cfield ($parameters){
		global $post, $gab_thumb;
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE);
		echo '
			<a href="';the_permalink(); echo '">
				<img src="' . esc_url( get_bloginfo('template_url') . '/timthumb.php?src='.get_post_meta($post->ID, 'thumbnail', true).'&amp;h=&amp;q=90&amp;w='.$parameters['media_width'].'&amp;h='.$parameters['media_height'].'&amp;zc=1" class="'.$parameters['thumb_align'].'" width="'.$parameters['media_width'].'" height="'.$parameters['media_height'] ) .'" alt="';the_title(''); echo '" />
			</a>';
	}
	function call_post_thumb ($parameters){
		global $post, $gab_thumb;
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE);
		echo '
			<a href="';the_permalink(); echo '">';
				the_post_thumbnail($parameters['name'], array('class' => $parameters['thumb_align'])).'';
			echo'</a>';
	}
	function call_default_thumb ($parameters){
		global $post;
		echo '
			<a href="';the_permalink(); echo '">
				<img src="'; bloginfo('template_url'); echo '/images/thumbs/'.$parameters['default_name'].'" alt="" class="'.$parameters['thumb_align'].'" />
			</a>';
	}
		
	function gab_media($parameters) {
		global $post,$gab_video,$gab_thumb,$gab_flv;
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE);
		$gab_video = get_post_meta($post->ID, 'video', TRUE);
		$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */
		
		if($gab_flv != '' and $parameters['enable_video'] == 1) { 
			call_flv ($parameters);
		}
		
		elseif ($gab_video != '' and $parameters['enable_video'] == 1 ) { 
			call_swf ($parameters);
		}
		
		elseif($gab_thumb !== '' and $parameters['enable_thumb'] == 1) { 
			call_cfield ($parameters);
		}
		
		elseif ( has_post_thumbnail() and $parameters['enable_thumb'] == 1 ) { 
			call_post_thumb ($parameters);
		} 
		
		else {  
			if($parameters['enable_default'] == 1) {
				call_default_thumb ($parameters);
			} 
		}
	}

	/* the functions below are written for those who would like to remove the links of thumbnails on front page, to do so replace all gab_media() functions with gab_media_nolink() */
	function call_cfield_noLink ($parameters){
		global $post;
		echo '<img src=';bloginfo('template_url'); echo '/timthumb.php?src='.get_post_meta($post->ID, 'thumbnail', true).'&amp;h=&amp;q=90&amp;w='.$parameters['media_width'].'&amp;h='.$parameters['media_height'].'&amp;zc=1" class="'.$parameters['thumb_align'].'" alt="">';
	}
	function call_post_thumb_nolink ($parameters){
		global $post, $gab_thumb;
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE);
		the_post_thumbnail($parameters['name'], array('class' => $parameters['thumb_align'])).'';
	}
	function call_default_thumb_nolink ($parameters){
		global $post;
		echo '<img src="'; bloginfo('template_url'); echo '/images/thumbs/'.$parameters['default_name'].'" alt="" class="'.$parameters['thumb_align'].'" />';
	}

	function gab_media_nolink($parameters) {
		global $post,$gab_video,$gab_thumb,$gab_flv;
		$gab_thumb = get_post_meta($post->ID, 'thumbnail', TRUE);
		$gab_video = get_post_meta($post->ID, 'video', TRUE);
		$gab_flv = get_post_meta($post->ID, 'videoflv', TRUE); /* Custom field video check */
		
		if($gab_flv != '' and $parameters['enable_video'] == 1) { 
			call_flv ($parameters);
		}
		
		elseif ($gab_video != '' and $parameters['enable_video'] == 1 ) { 
			call_swf ($parameters);
		}
		
		elseif($gab_thumb !== '' and $parameters['enable_thumb'] == 1) { 
			call_cfield_nolink ($parameters);
		}
		
		elseif ( has_post_thumbnail() and $parameters['enable_thumb'] == 1 ) { 
			call_post_thumb_nolink ($parameters);
		} 
		
		else {  
			if($parameters['enable_default'] == 1) {
				call_default_thumb_nolink ($parameters);
			} 
		}
	}

?>
