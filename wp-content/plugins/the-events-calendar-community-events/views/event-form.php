<?php

// Don't load directly
if ( !defined( 'ABSPATH' ) ) {
	die('-1');
}


/**
 * The Submit and Edit event form
 * You can customize this view by putting a replacement file of the same name (event-form.php) in the events/community/ directory of your theme.
 *
 * @package TribeCommunityEvents
 * @since  1.0
 * @author Modern Tribe Inc.
 */
?>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#show_hidden_categories').click(function() {
		//jQuery('#event-categories').css('overflow-y', 'scroll');
		jQuery('.hidden_category').show('medium');
		jQuery('#show_hidden_categories').hide();
		return false;

	}); 
});

</script>

<form method="post" action="" enctype="multipart/form-data">
<?php do_action( 'tribe_ce_event_submission_form_top' ); ?>
	<?php $this->outputMessage(); ?>
	<?php wp_nonce_field( 'ecp_event_submission' ); ?>

	<?php do_action( 'tribe_ce_event_submission_form_before_post_title' ); ?>
	<div class="events-community-post-title">
		<label for='post_title' <?php if ( $_POST && empty( $event->post_title ) ) echo 'class="error"'; ?>><?php _e( 'Event Title:', 'tribe-events-community' ); ?></label> <small class="req">(required)</small>
		<?php $this->formTitle( $event ) ?>
	</div>
	<?php do_action( 'tribe_ce_event_submission_form_after_post_title' ); ?>

	<?php do_action( 'tribe_ce_event_submission_form_before_post_content' ); ?>
	<div class="events-community-post-content">
		<label for='post_content' <?php if ( $_POST && empty( $event->post_content)  ) echo 'class="error"'; ?>><?php _e( 'Event Description:', 'tribe-events-community' ); ?></label> <small class="req">(required)</small>
		<?php $this->formContentEditor( $event ); ?>
	</div>
	<?php do_action( 'tribe_ce_event_submission_form_after_post_content' ); ?>

	<?php do_action( 'tribe_ce_event_submission_form_before_post_categories' ); ?>	
	<div id='eventDetails' class="inside eventForm bubble">

	<table cellspacing="0" cellpadding="0" id="EventInfo">
		<tr>
			<td colspan="2" class="tribe_sectionheader"><h4 class="event-time"><?php _e( 'Categories:', 'tribe-events-community' ); ?></h4></td>
		</tr>
		<tr>
			<td>
				<?php
					$this->formCategoryDropdown( $event );
				?>
			</td>
		</tr>
	</table>
	</div>
	<?php do_action( 'tribe_ce_event_submission_form_after_post_categories' ); ?>	

	<p></p>

	<?php do_action( 'tribe_ce_event_submission_form_before_post_featured_image' ); ?>	
	<div id='eventDetails' class="inside eventForm bubble">

	<table cellspacing="0" cellpadding="0" id="EventInfo">
		<tr>
			<td colspan="2" class="tribe_sectionheader"><h4 class="event-time">Image</h4></td>
		</tr>
		<?php
		$thumb = has_post_thumbnail( $tribe_event_id );
		if( $thumb ) : ?>
		<tr>
			<td colspan="2" class="event-image"><p><?php echo get_the_post_thumbnail( $event->ID, 'medium' ); ?></p></td>
		</tr>
		<tr>
			<td colspan="2"><p><?php echo $this->getDeleteFeaturedImageButton( $event ); ?></p></td>
		</tr>
		<?php endif; ?>

		<tr>
			<td>Upload <?php if( !$thumb ) echo ' New'; ?></td>
			<td>
				<input type="file" name="event_image">
			</td>
		</tr>
			<td><p style="font-style: italic"><?php echo __('Images that are not png, jpg, or gif will not be uploaded.', 'tribe-community-events' ) ?></p></td>
			<td></td>
	</table>
	</div>
	<?php do_action( 'tribe_ce_event_submission_form_after_post_featured_image' ); ?>	
	<p></p>

	<?php
	$this->formEventDetails( $event );
	$this->formSpamControl();
	?>
	
	<?php do_action( 'tribe_ce_event_submission_form_before_post_submit_button' ); ?>	
	<div class="events-community-footer wp-admin events-cal">
	<input type='submit' id="post" class="button submit events-community-submit" value="<?php
	if ( isset( $tribe_event_id ) && $tribe_event_id ) {
		echo apply_filters( 'tribe_ce_event_update_button_text', __( 'Update Event', 'tribe-events-community' ) );
	} else {
		echo apply_filters( 'tribe_ce_event_submit_button_text', __( 'Submit Event', 'tribe-events-community' ) );
	}
	?>" name='community-event' />
	</div>
<?php do_action( 'tribe_ce_event_submission_form_after_post_submit_button' ); ?>	
<?php do_action( 'tribe_ce_event_submission_form_bottom' ); ?>

</form>