<?php
// Swift Mailer v5.0.1
// http://swiftmailer.org/
// https://github.com/swiftmailer/swiftmailer

/**
 *
 */
class BackWPup_Destination_Email extends BackWPup_Destinations {

	/**
	 * @return array
	 */
	public function option_defaults() {

		$default=array();
		$default[ 'emailaddress' ]       = sanitize_email( get_bloginfo( 'admin_email' ) );
		$default[ 'emailefilesize' ]     = 20;
		$default[ 'emailsndemail' ]      = sanitize_email( get_bloginfo( 'admin_email' ) );
		$default[ 'emailsndemailname' ]  = 'BackWPup ' . get_bloginfo( 'name' );
		$default[ 'emailmethod' ]        = '';
		$default[ 'emailsendmail' ]      = ini_get( 'sendmail_path' );
		$default[ 'emailhost' ]          = isset($_SERVER[ 'SERVER_NAME' ]) ? $_SERVER[ 'SERVER_NAME' ] : '';
		$default[ 'emailhostport' ]      = 25;
		$default[ 'emailsecure' ]        = '';
		$default[ 'emailuser' ]          = '';
		$default[ 'emailpass' ]          = '';

		return $default;
	}


	/**
	 * @param $jobid
	 */
	public function edit_tab( $jobid ) {
		?>
		<h3 class="title"><?php _e( 'Email address', 'backwpup' ); ?></h3>
		<table class="form-table">
            <tr>
                <th scope="row"><label for="emailaddress"><?php _e( 'Email address', 'backwpup' ); ?></label></th>
                <td>
                    <input name="emailaddress" id="emailaddress" type="text" title="<?php esc_attr_e('Email address to which Backups are sent.','backwpup'); ?>"
                           value="<?php echo esc_attr( BackWPup_Option::get( $jobid, 'emailaddress' ) );?>" class="regular-text help-tip" />
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="sendemailtest"><?php _e( 'Send test email', 'backwpup' ); ?></label></th>
                <td>
                    <button id="sendemailtest" class="button secondary"><?php _e( 'Send test email', 'backwpup' ); ?></button>
                </td>
            </tr>
		</table>

		<h3 class="title"><?php _e( 'Send email settings', 'backwpup' ); ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row"><label for="idemailefilesize"><?php _e( 'Maximum file size', 'backwpup' ); ?></label></th>
				<td><input id="idemailefilesize" name="emailefilesize" type="text" value="<?php echo esc_attr( BackWPup_Option::get( $jobid, 'emailefilesize' ) ); ?>" class="small-text help-tip" title="<?php esc_attr_e('Maximum file size to be included in an email. 0 = unlimited','backwpup'); ?>" /><?php _e('MB','backwpup'); ?>
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="emailsndemail"><?php _e( 'Sender email address', 'backwpup' ); ?></label></th>
				<td><input name="emailsndemail" type="text" id="emailsndemail" title="<?php esc_attr_e( 'Sender email address', 'backwpup' ); ?>"
						   value="<?php echo esc_attr( BackWPup_Option::get( $jobid, 'emailsndemail' ) );?>"
						   class="regular-text help-tip" />
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="emailsndemailname"><?php _e( 'Sender name', 'backwpup' ); ?></label></th>
				<td><input name="emailsndemailname" type="text" id="emailsndemailname" title="<?php esc_attr_e( 'Name of email sender', 'backwpup' ); ?>"
						   value="<?php echo esc_attr( BackWPup_Option::get( $jobid, 'emailsndemailname' ) );?>"
						   class="regular-text help-tip" />
				</td>
			</tr>
			<tr>
				<th scope="row"><label for="emailmethod"><?php _e( 'Sending method', 'backwpup' ); ?></label></th>
				<td>
					<select id="emailmethod" name="emailmethod" class="help-tip" title="<?php esc_attr_e('- Use site settings: retrieve the email settings of your site.<br />-PHP mail(): needs more PHP memory','backwpup'); ?>">
						<?php
						echo '<option value=""' . selected( '', BackWPup_Option::get( $jobid, 'emailmethod' ), FALSE ) . '>' . __( 'Use site settings', 'backwpup' ) . '</option>';
						echo '<option value="mail"' . selected( 'mail', BackWPup_Option::get( $jobid, 'emailmethod' ), FALSE ) . '>' . __( 'PHP: mail()', 'backwpup' ) . '</option>';
						echo '<option value="sendmail"' . selected( 'sendmail', BackWPup_Option::get( $jobid, 'emailmethod' ), FALSE ) . '>' . __( 'Sendmail', 'backwpup' ) . '</option>';
						echo '<option value="smtp"' . selected( 'smtp', BackWPup_Option::get( $jobid, 'emailmethod' ), FALSE ) . '>' . __( 'SMTP', 'backwpup' ) . '</option>';
						?>
					</select>

				</td>
			</tr>
			<tr id="emailsendmail" <?php if ( BackWPup_Option::get( $jobid, 'emailmethod' ) != 'sendmail' ) echo 'style="display:none;"';?>>
				<th scope="row"><label for="emailsendmail"><?php _e( 'Sendmail path', 'backwpup' ); ?></label></th>
				<td>
					<input name="emailsendmail" id="emailsendmail" type="text"
						   value="<?php echo esc_attr( BackWPup_Option::get( $jobid, 'emailsendmail' ) );?>"
						   class="regular-text code" />
				</td>
			</tr>
			<tr class="emailsmtp" <?php if ( BackWPup_Option::get( $jobid, 'emailmethod' ) != 'smtp' ) echo 'style="display:none;"';?>>
				<th scope="row"><label for="emailhost"><?php _e( 'SMTP host name', 'backwpup' ); ?></label></th>
				<td>
					<input name="emailhost" id="emailhost" type="text"
						   value="<?php echo esc_attr( BackWPup_Option::get( $jobid, 'emailhost' ) );?>"
						   class="regular-text code"/>&nbsp;
					<label for="emailhostport"><?php _e( 'Port:', 'backwpup' ); ?><input name="emailhostport" id="emailhostport" type="text"
															  value="<?php echo esc_attr( BackWPup_Option::get( $jobid, 'emailhostport' ) );?>"
															  class="small-text code" /></label>
				</td>
			</tr>
			<tr class="emailsmtp" <?php if ( BackWPup_Option::get( $jobid, 'emailmethod' ) != 'smtp' ) echo 'style="display:none;"';?>>
				<th scope="row"><label for="emailsecure"><?php _e( 'SMTP secure connection', 'backwpup' ); ?></label>
				</th>
				<td>
					<select id="emailsecure" name="emailsecure">
						<option value=""<?php selected( '', BackWPup_Option::get( $jobid, 'emailsecure' ), TRUE ); ?>><?php _e( 'none', 'backwpup' ); ?></option>
						<option value="ssl"<?php selected( 'ssl', BackWPup_Option::get( $jobid, 'emailsecure' ), TRUE ); ?>><?php _e( 'SSL', 'backwpup' ); ?></option>
						<option value="tls"<?php selected( 'tls', BackWPup_Option::get( $jobid, 'emailsecure' ), TRUE ); ?>><?php _e( 'TLS', 'backwpup' ); ?></option>
					</select>
				</td>
			</tr>
			<tr class="emailsmtp" <?php if ( BackWPup_Option::get( $jobid, 'emailmethod' ) != 'smtp' ) echo 'style="display:none;"';?>>
				<th scope="row"><label for="emailuser"><?php _e( 'SMTP username', 'backwpup' ); ?></label></th>
				<td>
					<input name="emailuser" id="emailuser" type="text"
						   value="<?php echo esc_attr( BackWPup_Option::get( $jobid, 'emailuser' ) );?>" class="regular-text" autocomplete="off" />
				</td>
			</tr>
			<tr class="emailsmtp" <?php if ( BackWPup_Option::get( $jobid, 'emailmethod' ) != 'smtp' ) echo 'style="display:none;"';?>>
				<th scope="row"><label for="emailpass"><?php _e( 'SMTP password', 'backwpup' ); ?></label></th>
				<td>
					<input name="emailpass" id="emailpass" type="password"
						   value="<?php echo esc_attr( BackWPup_Encryption::decrypt( BackWPup_Option::get( $jobid, 'emailpass' ) ) );?>"
						   class="regular-text" autocomplete="off" />
				</td>
			</tr>
		</table>
		<?php
	}


	public function edit_inline_js() {
		//<script type="text/javascript">
		?>
		$('#emailmethod').change(function () {
			if ('smtp' == $('#emailmethod').val()) {
				$('.emailsmtp').show();
				$('#emailsendmail').hide();
			} else if ('sendmail' == $('#emailmethod').val()) {
				$('.emailsmtp').hide();
				$('#emailsendmail').show();
			} else {
				$('.emailsmtp').hide();
				$('#emailsendmail').hide();
			}
		});
        $('#sendemailtest').live('click', function() {
            $('#sendemailtest').after('&nbsp;<img id="emailsendtext" src="<?php echo get_admin_url().'images/loading.gif'; ?>" width="16" height="16" />');
            var data = {
                action: 'backwpup_dest_email',
                emailaddress: $('input[name="emailaddress"]').val(),
                emailsndemail: $('input[name="emailsndemail"]').val(),
                emailmethod: $('#emailmethod').val(),
                emailsendmail: $('input[name="emailsendmail"]').val(),
				emailsndemailname: $('input[name="emailsndemailname"]').val(),
                emailhost: $('input[name="emailhost"]').val(),
                emailhostport: $('input[name="emailhostport"]').val(),
                emailsecure: $('#emailsecure').val(),
                emailuser: $('input[name="emailuser"]').val(),
                emailpass: $('input[name="emailpass"]').val(),
                _ajax_nonce: $('#backwpupajaxnonce').val()
            };
            $.post(ajaxurl, data, function(response) {
                $('#emailsendtext').replaceWith( response );
            });
            return false;
        });
		<?php
	}

	/**
	 * @param $jobid
	 */
	public function edit_form_post_save( $jobid ) {

		BackWPup_Option::update( $jobid, 'emailaddress', isset( $_POST[ 'emailaddress' ] ) ? sanitize_email( $_POST[ 'emailaddress' ] ) : '' );
		BackWPup_Option::update( $jobid, 'emailefilesize', isset( $_POST[ 'emailefilesize' ] ) ? (int)$_POST[ 'emailefilesize' ] : 0 );
		BackWPup_Option::update( $jobid, 'emailsndemail', sanitize_email( $_POST[ 'emailsndemail' ] ) );
		BackWPup_Option::update( $jobid, 'emailmethod', ( $_POST[ 'emailmethod' ] == '' || $_POST[ 'emailmethod' ] == 'mail' || $_POST[ 'emailmethod' ] == 'sendmail' || $_POST[ 'emailmethod' ] == 'smtp' ) ? $_POST[ 'emailmethod' ] : '' );
		BackWPup_Option::update( $jobid, 'emailsendmail', $_POST[ 'emailsendmail' ] );
		BackWPup_Option::update( $jobid, 'emailsndemailname', $_POST[ 'emailsndemailname' ] );
		BackWPup_Option::update( $jobid, 'emailhost', $_POST[ 'emailhost' ] );
		BackWPup_Option::update( $jobid, 'emailhostport', (int)$_POST[ 'emailhostport' ] );
		BackWPup_Option::update( $jobid, 'emailsecure', ( $_POST[ 'emailsecure' ] == 'ssl' || $_POST[ 'emailsecure' ] == 'tls' ) ? $_POST[ 'emailsecure' ] : '' );
		BackWPup_Option::update( $jobid, 'emailuser', $_POST[ 'emailuser' ] );
		BackWPup_Option::update( $jobid, 'emailpass', BackWPup_Encryption::encrypt( $_POST[ 'emailpass' ] ) );
	}

	/**
	 * @param $job_object
	 * @return bool
	 */
	public function job_run_archive( &$job_object ) {

		$job_object->substeps_todo = 1;
		$job_object->log( sprintf( __( '%d. Try to send backup with email&#160;&hellip;', 'backwpup' ), $job_object->steps_data[ $job_object->step_working ][ 'STEP_TRY' ] ), E_USER_NOTICE );

		//check file Size
		if ( !empty( $job_object->job[ 'emailefilesize' ] ) ) {
			if ( $job_object->backup_filesize > $job_object->job[ 'emailefilesize' ] * 1024 * 1024 ) {
				$job_object->log( __( 'Backup archive too big to be sent by email!', 'backwpup' ), E_USER_ERROR );
				$job_object->substeps_done = 1;

				return TRUE;
			}
		}

		$job_object->log( sprintf( __( 'Sending email to %s&hellip;', 'backwpup' ), $job_object->job[ 'emailaddress' ] ), E_USER_NOTICE );

		//get mail settings
		$emailmethod='mail';
		$emailsendmail='';
		$emailhost='';
		$emailhostport='';
		$emailsecure='';
		$emailuser='';
		$emailpass='';

		if ( empty( $job_object->job[ 'emailmethod' ] ) ) {
			//do so if i'm the wp_mail to get the settings
			global $phpmailer;
			// (Re)create it, if it's gone missing
			if ( !is_object( $phpmailer ) || ! $phpmailer instanceof PHPMailer ) {
				require_once ABSPATH . WPINC . '/class-phpmailer.php';
				require_once ABSPATH . WPINC . '/class-smtp.php';
				$phpmailer = new PHPMailer( true );
			}
			//only if PHPMailer really used
			if ( is_object( $phpmailer )  ) {
				do_action_ref_array( 'phpmailer_init', array( &$phpmailer ) );
				//get settings from PHPMailer
				$emailmethod=$phpmailer->Mailer;
				$emailsendmail=$phpmailer->Sendmail;
				$emailhost=$phpmailer->Host;
				$emailhostport=$phpmailer->Port;
				$emailsecure=$phpmailer->SMTPSecure;
				$emailuser=$phpmailer->Username;
				$emailpass=$phpmailer->Password;
			}
		} else {
			$emailmethod = $job_object->job[ 'emailmethod' ];
			$emailsendmail = $job_object->job[ 'emailsendmail' ];
			$emailhost = $job_object->job[ 'emailhost' ];
			$emailhostport = $job_object->job[ 'emailhostport' ];
			$emailsecure = $job_object->job[ 'emailsecure' ];
			$emailuser = $job_object->job[ 'emailuser' ];
			$emailpass = BackWPup_Encryption::decrypt( $job_object->job[ 'emailpass' ] );
		}

		//Generate mail with Swift Mailer
		if ( function_exists( 'mb_internal_encoding' ) && ( (int)ini_get( 'mbstring.func_overload' ) ) & 2 ) {
			$mbEncoding = mb_internal_encoding();
			mb_internal_encoding( 'ASCII' );
		}

		try {
			//Set Temp dir for mailing
			Swift_Preferences::getInstance()->setTempDir( untrailingslashit( BackWPup::get_plugin_data( 'TEMP' ) ) )->setCacheType( 'disk' );
			// Create the Transport
			if ( $emailmethod == 'smtp' ) {
				$transport = Swift_SmtpTransport::newInstance( $emailhost, $emailhostport );
				$transport->setUsername( $emailuser );
				$transport->setPassword( $emailpass );
				if ( $emailsecure == 'ssl' )
					$transport->setEncryption( 'ssl' );
				if ( $emailsecure == 'tls' )
					$transport->setEncryption( 'tls' );
			}
			elseif ( $emailmethod == 'sendmail' ) {
				$transport = Swift_SendmailTransport::newInstance( $emailsendmail );
			}
			else {
				$job_object->need_free_memory( $job_object->backup_filesize * 8 );
				$transport = Swift_MailTransport::newInstance();
			}
			// Create the Mailer using your created Transport
			$emailer = Swift_Mailer::newInstance( $transport );

			// Create a message
			$message = Swift_Message::newInstance( sprintf( __( 'BackWPup archive from %1$s: %2$s', 'backwpup' ), date_i18n( 'd-M-Y H:i', $job_object->start_time, TRUE ), esc_attr($job_object->job[ 'name' ] ) ) );
			$message->setFrom( array( $job_object->job[ 'emailsndemail' ] => $job_object->job[ 'emailsndemailname' ] ) );
			$message->setTo( array( $job_object->job[ 'emailaddress' ] ) );
			$message->setBody( sprintf( __( 'Backup archive: %s', 'backwpup' ), $job_object->backup_file ), 'text/plain', strtolower( get_bloginfo( 'charset' ) ) );
			$message->attach( Swift_Attachment::fromPath( $job_object->backup_folder . $job_object->backup_file, $job_object->get_mime_type( $job_object->backup_folder . $job_object->backup_file ) ) );
			// Send the message
			$result = $emailer->send( $message );
		}
		catch ( Exception $e ) {
			$job_object->log( 'Swift Mailer: ' . $e->getMessage(), E_USER_ERROR );
		}

		if ( isset( $mbEncoding ) ) {
			mb_internal_encoding( $mbEncoding );
		}

		if ( isset( $result ) && ! $result ) {
			$job_object->log( __( 'Error while sending email!', 'backwpup' ), E_USER_ERROR );

			return FALSE;
		}
		else {
			$job_object->substeps_done = 1;
			$job_object->log( __( 'Email sent.', 'backwpup' ), E_USER_NOTICE );

			return TRUE;
		}
	}

	/**
	 * @param $job_object
	 * @return bool
	 */
	public function can_run( $job_object ) {

		if ( empty( $job_object->job[ 'emailaddress' ] ) )
			return FALSE;

		if ( $job_object->job[ 'backuptype' ] != 'archive' )
			return FALSE;

		return TRUE;
	}


	/**
	 * sends test mail
	 */
	public function edit_ajax() {

		check_ajax_referer( 'backwpup_ajax_nonce' );

		//get mail settings
		$emailmethod='mail';
		$emailsendmail='';
		$emailhost='';
		$emailhostport='';
		$emailsecure='';
		$emailuser='';
		$emailpass='';

		if ( empty( $_POST[ 'emailmethod' ] ) ) {
			//do so if i'm the wp_mail to get the settings
			global $phpmailer;
			// (Re)create it, if it's gone missing
			if ( ! is_object( $phpmailer ) || ! $phpmailer instanceof PHPMailer ) {
				require_once ABSPATH . WPINC . '/class-phpmailer.php';
				require_once ABSPATH . WPINC . '/class-smtp.php';
				$phpmailer = new PHPMailer( true );
			}
			//only if PHPMailer really used
			if ( is_object( $phpmailer )  ) {
				do_action_ref_array( 'phpmailer_init', array( &$phpmailer ) );
				//get settings from PHPMailer
				$emailmethod=$phpmailer->Mailer;
				$emailsendmail=$phpmailer->Sendmail;
				$emailhost=$phpmailer->Host;
				$emailhostport=$phpmailer->Port;
				$emailsecure=$phpmailer->SMTPSecure;
				$emailuser=$phpmailer->Username;
				$emailpass=$phpmailer->Password;
			}
		} else {
			$emailmethod = $_POST[ 'emailmethod' ];
			$emailsendmail = $_POST[ 'emailsendmail' ];
			$emailhost = $_POST[ 'emailhost' ];
			$emailhostport = $_POST[ 'emailhostport' ];
			$emailsecure = $_POST[ 'emailsecure' ];
			$emailuser = $_POST[ 'emailuser' ];
			$emailpass = BackWPup_Encryption::decrypt( $_POST[ 'emailpass' ] );
		}

		//Generate mail with Swift Mailer

		if ( function_exists( 'mb_internal_encoding' ) && ( (int)ini_get( 'mbstring.func_overload' ) ) & 2 ) {
			$mbEncoding = mb_internal_encoding();
			mb_internal_encoding( 'ASCII' );
		}

		try {
			// Create the Transport
			if ( $emailmethod == 'smtp' ) {
				$transport = Swift_SmtpTransport::newInstance( $emailhost, $emailhostport );
				$transport->setUsername( $emailuser );
				$transport->setPassword( $emailpass );
				if ( $emailsecure == 'ssl' )
					$transport->setEncryption( 'ssl' );
				if ( $emailsecure == 'tls' )
					$transport->setEncryption( 'tls' );
			}
			elseif ( $emailmethod == 'sendmail' ) {
				$transport = Swift_SendmailTransport::newInstance( $emailsendmail );
			}
			else {
				$transport = Swift_MailTransport::newInstance();
			}
			// Create the Mailer using your created Transport
			$emailer = Swift_Mailer::newInstance( $transport );

			// Create a message
			$message = Swift_Message::newInstance( __( 'BackWPup archive sending TEST Message', 'backwpup' ) );
			$message->setFrom( array( $_POST[ 'emailsndemail' ] => isset( $_POST[ 'emailsndemailname' ]) ? $_POST[ 'emailsndemailname' ] : '' ) );
			$message->setTo( array( $_POST[ 'emailaddress' ] ) );
			$message->setBody( __( 'If this message reaches your inbox, sending backup archives via email should work for you.', 'backwpup' ) );
			// Send the message
			$result = $emailer->send( $message );
		}
		catch ( Exception $e ) {
			echo  '<span id="emailsendtext" style="color:red;">Swift Mailer: ' . $e->getMessage() . '</span>';
		}

		if ( isset( $mbEncoding ) ) {
			mb_internal_encoding( $mbEncoding );
		}

		if ( ! isset( $result ) || ! $result )
			echo '<span id="emailsendtext" style="color:red;">' . __( 'Error while sending email!', 'backwpup' ) . '</span>';
		else
			echo '<span id="emailsendtext" style="color:green;">' . __( 'Email sent.', 'backwpup' ) . '</span>';
		die();
	}
}
