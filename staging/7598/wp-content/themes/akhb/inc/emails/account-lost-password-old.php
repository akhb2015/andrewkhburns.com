<?php
/**
 * Template part for the lost password email content
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021, ON1
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>
		<title>ON1</title>
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		<style type="text/css">
			body, table, td, a {
				-ms-text-size-adjust: 100%;
				-webkit-text-size-adjust: 100%;
			}

			table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
			img { -ms-interpolation-mode: bicubic; }
			table.content, table.footer { margin: 0 auto !important; }

			table.content p, table.content a, table.content li {
				font-size: 16px !important;
				line-height: 24px !important;
			}

			table.footer p, table.footer a {
				font-size: 12px !important;
				line-height: 16px !important;
			}

			table.content h2 {
				font-size: 22px !important;
				font-weight: 700 !important;
				line-height: 28px !important;
			}

			table.content h3 {
				font-size: 18px !important;
				font-weight: 700 !important;
				line-height: 26px !important;
			}

			img {
				height: auto !important;
				max-width: 100% !important;
			}

			@media only screen and (max-width: 480px) {
				table.content,  table.footer {
					margin: 0 auto !important;
					width: 100% !important;
				}
			}
		</style>
	</head>

	<body yahoo style="background-color: #f6f6f7; color: #303030; font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; font-size: 16px; font-weight: 400; line-height: 1.8; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; margin: 0; padding: 0;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color: #f6f6f7; color: #303030;">
			<tr>
				<td valign="top" align="center">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color: #f6f6f7; color: #303030;">
						<tr>
							<td valign="top" style="background-color: #f6f6f7; padding: 20px;">
								<!-- <div style="display: none; font-size: 1px; color: #303030; line-height: 1px; font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">Welcome to ON1! Thank you for signing up for an account.</div> -->
								<table class="content" width="640" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color: #f6f6f7; color: #303030; width: 640px;">
									<tr>
										<td align="left" style="margin: 0; padding: 0 0 20px 0;"><img src="https://ononesoft.cachefly.net/wp-content/themes/on1/images/emails/on1-logo-header@2x.png" alt="ON1" height="18" width="26"></td>
										<td align="right" style="color: #7c7c7d; margin: 0; padding: 0 0 20px 0;">Take Photography Further.</td>
									</tr>
								</table>

								<table class="content" width="640" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color: #f6f6f7; color: #303030; text-align: center; width: 640px;">
									<tr>
										<td valign="top" style="margin: 0; padding: 0;">
											<img src="https://ononesoft.cachefly.net/wp-content/themes/on1/images/emails/hero@2x.jpg" height="181" width="640" alt="" style="border-top-left-radius: 10px; border-top-right-radius: 10px;">
										</td>
									</tr>
								</table>

								<table class="content" width="640" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color: #fff; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; color: #303030; width: 640px;">
									<tr>
										<td valign="top" style="padding: 30px 20px;">
											<h2 style="margin: 0 0 20px 0; padding: 0;">Reset Your Password</h2>

											<p style="margin: 0 0 20px 0;">Someone has requested a password reset for the following account:</p>

											<p style="margin: 0 0 20px 0;">Email address: <?php echo $user_login; ?></p>

											<p style="margin: 0 0 20px 0;">If this was a mistake, just ignore this email and nothing will happen.</p>

											<!--
											<p style="margin: 0 0 20px 0;">To reset your password, visit the following address:</p>

											<p style="margin: 0 0 20px 0;"><a href="<?php echo wp_login_url(); ?>?action=rp&key=<?php echo $key; ?>&login=<?php echo rawurlencode( $user_login ); ?>" style="color: #0a7efa; font-weight: 600; text-decoration: none;"><?php echo wp_login_url(); ?>?action=rp&key=<?php echo $key; ?>&login=<?php echo rawurlencode( $user_login ); ?></a></p>
											-->

											<p style="margin: 0 0 20px 0;">To reset your password, please <a href="<?php echo wp_login_url(); ?>?action=rp&key=<?php echo $key; ?>&login=<?php echo rawurlencode( $user_login ); ?>" style="color: #0a7efa; font-weight: 600; text-decoration: none;">click here</a>.</p>

											<p style="margin: 0;"><em>Please note that the above link contains a unique key and can only be used <strong>ONE</strong> time. Visiting the link more than once will result in an invalid key message.</em></p>
										</td>
									</tr>
								</table>

								<table class="content" width="640" border="0" cellspacing="0" cellpadding="0" align="center" style="border-bottom: 1px solid #eaeaea; width: 640px;">
									<tr>
										<td valign="top" align="center" style="padding-top: 64px;">
											<h3 style="color: #7c7c7d; margin: 0 0 20px 0;">Follow Us</h3>

											<ul style="list-style: none; margin: 0 0 40px 0; padding: 0;">
												<li style="display: inline-block; padding: 0 20px;"><a href="https://www.facebook.com/on1photo"><img src="https://ononesoft.cachefly.net/wp-content/themes/on1/images/emails/facebook-icon@2x.png" height="20" width="20" alt="Facebook"></a></li>
												<li style="display: inline-block; padding: 0 20px;"><a href="https://instagram.com/on1photo/"><img src="https://ononesoft.cachefly.net/wp-content/themes/on1/images/emails/instagram-icon@2x.png"  height="20" width="20" alt="Instagram"></a></li>
												<li style="display: inline-block; padding: 0 20px;"><a href="https://www.youtube.com/subscription_center?add_user=ononesoftwareu"><img src="https://ononesoft.cachefly.net/wp-content/themes/on1/images/emails/youtube-icon@2x.png"  height="20" width="20" alt="YouTube"></a></li>
												<li style="display: inline-block; padding: 0 20px;"><a href="https://twitter.com/on1photo"><img src="https://ononesoft.cachefly.net/wp-content/themes/on1/images/emails/twitter-icon@2x.png"  height="20" width="20" alt="Twitter"></a></li>
											</ul>
										</td>
									</tr>
								</table>

								<table class="footer" width="640" border="0" cellspacing="0" cellpadding="0" align="center" style="width: 640px;">
									<tr>
										<td valign="top" align="center" style="padding-top: 48px;">
											<p style="margin: 0 0 20px 0;"><img src="https://ononesoft.cachefly.net/wp-content/themes/on1/images/emails/on1-logo-footer@2x.png" alt="ON1" height="16" width="23"></p>

											<p style="color: #7c7c7d; margin: 0 0 2px 0;">Sent to: <?php echo $user_login; ?></p>
											<p style="color: #7c7c7d; margin: 0 0 2px 0;">Sent by: ON1 - 15333 SW Sequoia Pkwy, Ste. 150 - Portland, OR 97224 USA</p>
											<p style="color: #7c7c7d; margin: 0;"><a href="<?php echo esc_url( home_url( 'company/privacy' ) ); ?>" style="color: #0a7efa; font-weight: 600; text-decoration: none;">View Privacy Policy</a> - <a href="<?php echo esc_url( home_url( 'unsubscribe' ) ); ?>" style="color: #0a7efa; font-weight: 600; text-decoration: none;">Unsubscribe</a> - <a href="<?php echo esc_url( home_url( 'account/edit-profile' ) ); ?>" style="color: #0a7efa; font-weight: 600; text-decoration: none;">Update Profile</a></p>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
