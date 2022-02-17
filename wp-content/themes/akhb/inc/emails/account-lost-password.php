<?php
/**
 * Template part for the lost password email content
 *
 * @author      Andy Burns <akhb1968@yahoo.com>
 * @copyright   2021, ON1
 */

$user = get_user_by( 'login', $user_login );
$user_email = $user->user_email;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
 xmlns:v="urn:schemas-microsoft-com:vml"
 xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>AKHB</title>

  <style>
    table.content, table.footer{
      margin:0 auto !important;
    }
    table.content p, table.content a{
      font-size:16px !important;
      line-height:24px !important;
    }
    table.content a{
      color:#0a7efa !important;
      text-decoration:none !important;
    }
    table.content p.large-text, table.content a.large-text{
      font-size:20px !important;
      line-height:26px !important;
    }
    table.content p.huge-text, table.content a.huge-text{
      font-size:26px !important;
      line-height:36px !important;
    }
    table.content p.small-text, table.content a.small-text{
      font-size:13px !important;
      line-height:18px !important;
    }
    table.footer p, table.footer a{
      font-size:12px !important;
      line-height:16px !important;
    }
    table.content h1{
      color:#f6f6f7 !important;
      font-size:28px !important;
      line-height:36px !important;
    }
    table.content h2{
      font-size:28px !important;
      line-height:32px !important;
    }
    div.hide-on-mobile {
      overflow: visible !important;
      display: block !important;
      max-height:100% !important;
    }
    div.hide{ 
      display:none !important;
      max-height:0 !important;
      overflow:hidden !important;
      mso-hide:all !important;
    }
    img{
      max-width:100% !important;
      height:auto !important;
    }
  @media only screen and (max-width: 480px) {
      div.hide {
        overflow: visible !important;
        display: block !important;
        max-height:100% !important;
      }
      div.hide-on-mobile, p.hide-on-mobile{ 
        display:none !important;
        max-height:0 !important;
        overflow:hidden !important;
        mso-hide:all !important;
      }
      table.content,  table.footer {
        width: 100% !important;
        margin:0 auto !important;
      }
      td.body-text{
        padding:30px 20px !important;
      }
      td#header-logo{
        padding:20px 0 20px 12px !important;
      }
      td#header-tagline{
        padding:30px 6px 20px 0 !important;
      }
    }
  </style>
</head>

<body yahoo style="margin:0; padding:0;">

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="background-color:#282828;">
  <tr>
    <td valign="top" align="center">

      <table border="0" cellspacing="0" cellpadding="0" align="center" style="background-color:#282828">
        <tr>
          <td valign="top" style="background-color:#282828;">

            <table class="content" width="630" border="0" cellspacing="0" cellpadding="0" style="background-color:#282828;width:630px" align="center">
              <tr>
                <td width="315" id="header-logo" valign="top" style="text-align:left;padding:20px 0 20px 24px">
                  <!--logo-->
                </td>
                <td width="315" id="header-tagline" valign="top" style="text-align:right;padding:30px 20px 20px 0">
                  &nbsp;
                </td>
              </tr>
            </table>

            <div class="hide-on-mobile">
              
            </div>

            <!--[if !mso 9]><!-->
            <div class="hide" style="max-height:0;overflow:hidden;display:none;mso-hide:all">
              
            </div>
            <!--<![endif]-->

            <table class="content" width="630" border="0" cellspacing="0" cellpadding="0" align="center" style="background-color:#303030;width:630px"> 
              <tr>
                <td valign="top" class="body-text" style="padding:0;margin:0;text-align:center;background-color:#303030;font-family: Helvetica, Arial, sans-serif;color:#eaeaea;padding:30px 50px 40px 50px">
                  <h2 style="margin: 0 0 20px 0; padding: 0;">Reset Your Password</h2>

                      <p>Someone has requested a password reset for the following account:</p>

                      <p>Email address: <?php echo $user_email; ?></p>

                      <p>If this was a mistake, just ignore this email and nothing will happen.</p>

                      <p>To reset your password, please <a href="<?php echo wp_login_url(); ?>?action=rp&key=<?php echo $key; ?>&login=<?php echo rawurlencode( $user_email ); ?>" style="color: #0a7efa; font-weight: 600; text-decoration: none;">click here</a>.</p>

                      <p style="margin: 0;"><em>Please note that the above link contains a unique key and can only be used <strong>ONE</strong> time. Visiting the link more than once will result in an invalid key message.</em></p>
                  </p>
                </td>
              </tr>
            </table>

            <table class="footer" width="630" border="0" cellspacing="0" cellpadding="0" style="background-color:#282828;width:630px" align="center">
              <tr>
                <td valign="top" align="center" style="padding:0; margin:0;text-align:center;padding:20px 0">
                  <table class="content" width="480" border="0" cellspacing="0" cellpadding="0" align="center" style="text-align:center;background-color:#282828;width:480px">    
                    <tr>
                      <td valign="middle" style="text-align:center;padding:0; margin:0;border-top:1px solid #7c7c7d">
                        &nbsp;
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td valign="top" align="center" style="padding:0; margin:0;text-align:center;">
                  <!--logo-->
                </td>
              </tr>
              <tr>
                <td style="color:#bdbdbe; font-size:12px; text-align:center;font-family:Arial, Helvetica, sans-serif;padding:0 20px 40px 20px">
                  <p style="padding: 0 5px 5px 0; margin: 0;">Sent to: <?php echo $user_email; ?></p>
                  <p style="padding: 0 5px 5px 0; margin: 0;">Sent by: AKHB</p>
                  <a href="https://www.andrewkhburns.com/unsubscribe/" style="color:#bdbdbe">Unsubscribe from AKHB emails</a>
                  <br><br>
                  <p style="padding:0;margin:0;">You are receiving this email because you previously consented to the delivery of emails from AKHB. For more information, view our <a href="https://www.andrewkhburns.com/company/privacy/" style="color:#bdbdbe">privacy policy</a>.</p>
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