<!DOCTYPE html>
<html lang="hr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <title></title>
  <!--[if mso]>
  <style>
    table {border-collapse: collapse; border-spacing: 0; border: none; margin: 0;}
    div, td {padding: 0;}
    div {margin: 0 !important;}
  </style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
      <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style>
  table, td, div, h1, p {
    font-family: Arial, sans-serif;
  }
  @media screen and (max-width: 704px) {
    .logo-lft {
      max-width: 100% !important;
    }
    .logo-rgt {
      max-width: 100% !important;
    }
    .col-news {
      margin: 0 !important;
      padding-bottom: 20px;
      max-width: 100% !important;
    }
  }
  @media screen and (min-width: 705px) {
    .logo-lft, .logo-rgt {
      max-width: 50% !important;
    }
    .logo-lft img {
      margin-right: 100px;
    }
    .logo-rgt img {
      margin-left: 100px;
    }
    .col-news {
      max-width: 45% !important;
    }
  }
</style>
</head>
<body style="margin: 0; padding: 0; word-spacing: normal; background-color: #e20074;">

	<!-- Preheader -->
	<span style="color: transparent; display: none !important; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">TMS Newsletter {{$data["date"]}}</span>

  <div role="article" aria-roledescription="email" lang="hr" style="text-size-adjust: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; background-color: #e20074;">
    <!-- Creating an Outer Scaffold - Email Wrapper -->
    <table role="presentation" style="width: 100%; border: none; border-spacing: 0;">
    <tr>
      <td align="center" style="padding: 0;">
        <!-- Creating a Ghost Table for Outlook on Windows -->
        <!--[if mso]>
        <table role="presentation" align="center" style="width: 660px;">
		  	<tr>
		  	<td style="padding: 20px 0;">
        <![endif]-->
        <!-- Main Content Container -->
        <table role="presentation" style="width: 96%; max-width: 660px; border: none; border-spacing: 0; margin: 20px auto; text-align: left; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 22px; background-color: #e5e5e5;">
          <tr>
            <td style="padding: 30px 30px 30px 30px; text-align: center; background-color: #e20074;">
              <p style="color: #ffffff; font-size: 14px;">E-mail se ne prikazuje ispravno? <a href="#" style="color: #ffffff; text-decoration: underline;">Pogledajte ga u web pregledniku</a>.</p>
            </td>
          </tr>
          <!-- Header with Logo -->
          <tr>
            <td style="padding: 20px 30px 0 30px; font-size: 0; text-align: center; background-color: #fcfcfc; color: #000000;">
              <!--[if mso]>
              <table role="presentation" width="100%">
              <tr>
              <td style="width: 300px;" align="left" valign="top">
              <![endif]-->
              <div class="logo-lft" style="display: inline-block; width: 100%; max-width: 300px; vertical-align: top; color: #000000;">
                <img src="{{{ url('/').'/uploads/custom_pics/TMS_logo_full.png' }}}" alt="TMS logo" width="200" style="width: 80%; max-width: 200px; margin-bottom: 10px; font-size: 24px;"/>
              </div>
              <!--[if mso]>
              </td>
              <td style="width: 300px; padding-bottom: 20px;" align="right" valign="top">
              <![endif]-->
              <div class="logo-rgt" style="display: inline-block; width: 100%; max-width: 300px; vertical-align: top; color: #000000; padding-bottom: 10px;">
                <img src="{{{ url('/').'/uploads/custom_pics/SMC_logo.png' }}}" alt="SMC logo" width="200" style="width: 80%; max-width: 200px; margin-bottom: 10px; font-size: 24px;"/>
              </div>
              <!--[if mso]>
              </td>
              </tr>
              </table>
              <![endif]-->
            </td>
          </tr>
          <!-- Heading -->
          <tr>
            <td style="padding: 10px; background-color: #fcfcfc; color: #e20074; text-align: center; text-transform: uppercase;">
              <h1 style="font-size: 48px; line-height: 50px; font-weight: bold; margin-bottom: 6px;">Novosti</h1>
              <h3 style="font-size: 24px; font-weight: 500; margin-top: 0; margin-bottom: 20px;">{{$data["date"]}}</h3>
            </td>
          </tr>
          <!-- Featured Story -->
          <tr>
            <td style="padding: 35px 30px 20px 30px; background-color: #e5e5e5">
              <h2 style="font-size: 24px; margin: 0 0 20px 0;">{{$data["title_primary"]}}</h2>
              @IF($mainPictureName != "")
              <p style="color: #000000;"><img src="http://wsat7782:82/tms/public/newsletter/{{$mainPictureName}}" width="600" alt="" style="width: 100%; height: auto; border: none; color: #000000; font-size: 16px;"/></p>
              @ENDIF
              <p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; text-align: justify;">{{$data["text_primary"]}}</p>
              @IF($data["link_primary"] != "")
              <p style="margin: 0; text-align: right;"><a href="{{$data["link_primary"]}}" style="font-size: 16px; background: #e20074; text-decoration: none; padding: 10px 25px; color: #ffffff; display: inline-block; mso-padding-alt: 0; text-underline-color: #ff3884"><!--[if mso]><i style="letter-spacing: 25px; mso-font-width: -100%; mso-text-raise: 20pt">&nbsp;</i><![endif]--><span style="mso-text-raise: 10pt; font-weight: bold;">Saznajte više</span><!--[if mso]><i style="letter-spacing: 25px; mso-font-width: -100%">&nbsp;</i><![endif]--></a></p>
              @ENDIF
            </td>
          </tr>
          <!-- Other Stories - Two Column Section -->
          <tr>
            <td style="padding: 35px 30px 35px 30px; font-size: 0; text-align: left; background-color: #e5e5e5;">
              <!--[if mso]>
              <table role="presentation" width="100%">
              <tr>
              <![endif]-->

              @FOR($i=1; $i<$counter+1; $i+=1)

                <!--[if mso]>
                <td style="width: 270px; margin: 15px;" align="left" valign="top">
                <![endif]-->
                <div class="col-news" style="display: inline-block; width: 100%; max-width: 270px; vertical-align: top; margin: 15px;">
                  <h3 style="margin: 0 0 25px 0; font-size: 16px; line-height: 24px;">{{$data["title_secondary-$i"]}}</h3>
                  @IF($pictureNames[$i] != "")
                  <p style="color: #000000;"><img src="http://wsat7782:82/tms/public/newsletter/{{$pictureNames[$i]}}" width="270" alt="" style="width: 100%; height: auto; border: none; color: #000000; font-size: 16px;"/></p>
                  @ENDIF
                  <p style="margin: 0 0 12px 0; font-size: 16px; line-height: 24px; text-align: justify;">{{$data["text_secondary-$i"]}}</p>
                  @IF($data["link_secondary-$i"] != "")
                  <p style="margin: 0; text-align: right;"><a href="{{$data["link_secondary-$i"]}}" style="font-size: 16px; background: #e20074; text-decoration: none; padding: 10px 25px; color: #ffffff; display: inline-block; mso-padding-alt: 0; text-underline-color: #ff3884"><!--[if mso]><i style="letter-spacing: 25px; mso-font-width: -100%; mso-text-raise: 20pt">&nbsp;</i><![endif]--><span style="mso-text-raise: 10pt; font-weight: bold;">Saznajte više</span><!--[if mso]><i style="letter-spacing: 25px; mso-font-width: -100%">&nbsp;</i><![endif]--></a></p>
                  @ENDIF
                </div>
                <!--[if mso]>
                </td>
                <![endif]-->

                @IF($i % 2 == 0 && $i != $counter)
                <!--[if mso]>
                </tr>
                <br/>
                <tr>
                <![endif]--> 
                @ENDIF

              @ENDFOR

              <!--[if mso]>
              </tr>
              </table>
              <![endif]-->                    
              </td>
            </tr>
            <!-- Creating the Footer -->
            <tr>
              <td style="padding: 35px; font-size: 0; text-align: center; background-color: #999999; color: #000000;">
                <img src="{{{ url('/').'/uploads/custom_pics/Tlogo_mali_powered_by_SMC.png' }}}" width="150" alt="TMS powered by SMC" style="width: 80%; max-width: 150px; font-size: 14px;"/>
                <p style="margin-top: 20px; margin-bottom: 10px; font-size: 14px; line-height: 16px;">Posjetite TMS portal <a href="http://sdslam3p.ad.local/tms/admin" style="color: #000000; text-decoration: underline;">ovdje</a>.<br/>Kontaktirajte nas na <a style="color: #000000; text-decoration: none; font-weight: bold;" href="mailto:tms@t.ht.hr">tms@t.ht.hr</a></p>
                <p style="margin: 0; font-size: 14px; line-height: 16px;">2021. HT d.d. Sva prava pridržana</p>
              </td>
            </tr>
          </table>
        	<!--[if mso]>
        	</td>
        	</tr>
        	</table>
          <![endif]-->
        </td>
      </tr>
    </table>
  </div>
</body>
</html>