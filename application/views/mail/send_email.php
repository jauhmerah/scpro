<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0110)http://c0185784a2b233b0db9b-d0e5e4adc266f8aacd2ff78abb166d77.r51.cf2.rackcdn.com/v1_templates/template_01.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  
  <title>Nasty Juice Purchasing System v2.0</title>


  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</head>

<body yahoo="" style="background-color:#DFDEDE">


<table width="100%"  border="0" cellpadding="10" cellspacing="0">
<tbody><tr>
  <td>
       <table bgcolor="#ffffff" class="content" style="background-color:#ffffff" align="center" cellpadding="0" cellspacing="0" border="0">
			<tbody><tr>
				<td valign="top" mc:edit="headerBrand" id="templateContainerHeader">

					<p style="text-align:center;margin:0;padding:0;">
						<img src="<?= base_url(); ?>assets/nasty/nastylogo.png" style="max-width:600px;display:inline-block;">
					</p>
          <br>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top">
						<!-- BEGIN BODY // -->
							<table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateContainer">
									<tbody>
                  <tr>
											<td valign="top" class="bodyContent" mc:edit="body_content">
                        <p>
                          Hello Account and Sales Dept,<br><br>
                          The following is the new order information from Nasty Ordys System.
                        </p>  

												<h2>Order Details</h2>
												<p>
                        
                          <?php $id=120000+$arr['id']; ?>
                          <?php $or_id=$arr['id']; ?>
                          <table class="table table-borderless">
                          <tbody>
                          <tr>
                          <th>Order No. </th>
                          <th>:</th>
                          <td><a href="<?= site_url('nasty_v2/invoice/Invoice?id='.$this->my_func->scpro_encrypt($or_id).'&ver=2'); ?>">#<?= $id ?></a></td>
                          </tr>
                          <tr>
                          <th>Order Status</th>
                          <th>:</th>
                          <td>New Order</td>
                          </tr> 
                          <tr>
                          <th>Order By</th>
                          <th>:</th> 
                          <td><?= $arr['username']; ?></td>
                          </tr>
                         
                          <tr>
                          <th colspan=3><center>
                          
                          <a href="<?= site_url('login'); ?>" title="Login Ordys">
                          <button type="button" class="btn btn-success btn-lg" title="Login">Login Ordys</button></a>
                          </center></th>
                          </tr>
                          </tbody>
                          </table>
                          </p>
                          <p>

                          *Click the above button to proceed.
                       
                          
                        </p>
											</td>
									</tr>
									<tr align="top">
											<td valign="top" class="bodyContent" mc:edit="body_content">
											
											</td>
									</tr>
							</tbody></table>
							<!-- // END BODY -->
					</td>
			</tr>
			<tr>
				<td align="center" valign="top" id="bodyCellFooter" class="unSubContent">
					<table width="100%" border="0" cellpadding="0" cellspacing="0" id="templateContainerFooter">
						<tbody><tr>
							<td valign="top" width="100%" mc:edit="footer_unsubscribe">
								<p style="text-align:center;">
									<img src="<?= base_url(); ?>assets/cover/favicon.png" style="max-width:600px;margin:0 auto 0 auto;display:inline-block;">
								</p>
								<h6 style="text-align:center;margin-top: 9px;">NSTY WORLDWIDE SDN. BHD</h6>
								<h6 style="text-align:center;">Nasty Got The Juice</h6>
								<h6 style="text-align:center;">www.nastyjuice.com</h6>
							
							</td>
						</tr>
					</tbody></table>
				</td>
			</tr>

    </tbody></table>
 
    </td>
  </tr>
</tbody></table>
<style type="text/css">
  /* /\/\/\/\/\/\/\/\/ CLIENT-SPECIFIC STYLES /\/\/\/\/\/\/\/\/ */
  #outlook a{padding:0;} /* Force Outlook to provide a "view in browser" message */
  .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} /* Force Hotmail to display emails at full width */
  .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing */
  body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;} /* Prevent WebKit and Windows mobile changing default text sizes */
  table, td{mso-table-lspace:0pt; mso-table-rspace:0pt;} /* Remove spacing between tables in Outlook 2007 and up */
  img{-ms-interpolation-mode:bicubic;max-width:100%;} 
  td ul li {
    font-size: 16px;
  }
  /* /\/\/\/\/\/\/\/\/ RESET STYLES /\/\/\/\/\/\/\/\/ */
  body{margin:0; padding:0;}
  img{
    max-width:100%;
    border:0;
    line-height:100%;
    outline:none;
    text-decoration:none;
  }
  table{border-collapse:collapse !important;}
  .content {width: 100%; max-width: 600px;}
  .content img { height: auto; min-height: 1px; }
  .content {width: 100%; max-width: 600px;}

  #bodyTable{margin:0; padding:0; width:100% !important;}
  #bodyCell{margin:0; padding:0;}
  #bodyCellFooter{margin:0; padding:0; width:100% !important;padding-top:39px;padding-bottom:15px;}
  body {margin: 0; padding: 0; min-width: 100%!important;}

  #templateContainerHeader{
    font-size: 14px;
    padding-top:2.429em;
    padding-bottom:0.929em;
  }
  #templateContainerFootBrd {
    border-bottom:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 0 0 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
    height: 10px;
    width:100% !important;
  }
  #templateContainer{
    border-top:1px solid #e2e2e2;
    border-bottom:1px solid #e2e2e2;
    border-left:1px solid #e2e2e2;
    border-right:1px solid #e2e2e2;
    border-radius: 4px 4px 4px 4px;
    background-clip: padding-box;
    border-spacing: 0;
  }

  /**
  * @tab Page
  * @section heading 1
  * @tip Set the styling for all first-level headings in your emails. These should be the largest of your headings.
  * @style heading 1
  */
  h1{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:26px;
     line-height:1.385em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 2
  * @tip Set the styling for all second-level headings in your emails.
  * @style heading 2
  */
  h2{
     color:#2e2e2e;
    display:block;
     font-family:Helvetica;
     font-size:22px;
     line-height:1.455em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 3
  * @tip Set the styling for all third-level headings in your emails.
  * @style heading 3
  */
  h3{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:18px;
     line-height:1.444em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  /**
  * @tab Page
  * @section heading 4
  * @tip Set the styling for all fourth-level headings in your emails. These should be the smallest of your headings.
  * @style heading 4
  */
  h4{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:14px;
     line-height:1.571em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h5{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:13px;
     line-height:1.538em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }


  h6{
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:12px;
     line-height:2.000em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  p {
     color:#545454;
    display:block;
     font-family:Helvetica;
     font-size:16px;
     line-height:1.500em;
     font-style:normal;
     font-weight:normal;
     letter-spacing:normal;
    margin-top:0;
    margin-right:0;
    margin-bottom:15px;
    margin-left:0;
     text-align:left;
  }

  .unSubContent a:visited { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:focus   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:hover   { color: #a1a1a1; text-decoration:underline; font-weight:normal;}
  .unSubContent a:link   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}
  .unSubContent a .yshortcuts   { color: #a1a1a1 ; text-decoration:underline; font-weight:normal;}

  .unSubContent h6 {
    color: #a1a1a1;
    font-size: 12px;
    line-height: 1.5em;
    margin-bottom: 0;
  }

  .bodyContent{
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:3.143em;
    padding-right:3.5em;
    padding-left:3.5em;
    padding-bottom:0.714em;
     text-align:left;
  }
  .bodyContentImage {
    color:#505050;
    font-family:Helvetica;
    font-size:14px;
    line-height:150%;
    padding-top:0;
    padding-right:3.571em;
    padding-left:3.571em;
    padding-bottom:2em;
    text-align:left;
  }

  .bodyContentImage h4 {
    color: #4E4E4E;
    font-size: 13px;
    line-height: 1.154em;
    font-weight:normal;
    margin-bottom: 0;
  }
  .bodyContentImage h5 {
    color: #828282;
    font-size: 12px;
    line-height: 1.667em;
    margin-bottom: 0;
  }

  /**
  * @tab Body
  * @section body link
  * @tip Set the styling for your email's main content links. Choose a color that helps them stand out from your text.
  */
  a:visited { color: #3386e4; text-decoration:none;}
  a:focus   { color: #3386e4; text-decoration:none;}
  a:hover   { color: #3386e4; text-decoration:none;}
  a:link   { color: #3386e4 ; text-decoration:none;}
  a .yshortcuts   { color: #3386e4 ; text-decoration:none;}

  .bodyContent img{
    height:auto;
    max-width:498px;
  }

  .footerContent{
    color:#808080;
    font-family:Helvetica;
    font-size:10px;
    line-height:150%;
    padding-top:2.000em;
    padding-right:2.000em;
    padding-bottom:2.000em;
    padding-left:2.000em;
    text-align:left;
  }

  /**
  * @tab Footer
  * @section footer link
  * @tip Set the styling for your email's footer links. Choose a color that helps them stand out from your text.
  */
  .footerContent a:link, .footerContent a:visited, /* Yahoo! Mail Override */ .footerContent a .yshortcuts, .footerContent a span /* Yahoo! Mail Override */{
     color:#606060;
     font-weight:normal;
     text-decoration:underline;
  }


  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
    body[yahoo] .hide {display: none!important;}
    body[yahoo] .buttonwrapper {background-color: transparent!important;}
    body[yahoo] .button {padding: 0px!important;}
    body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
    body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
  }
  /*@media only screen and (min-device-width: 601px) {
    .content {width: 600px !important;}
  }*/
  @media only screen and (max-width: 480px){
    h1 {
      font-size:34px !important;
    }
    h2{
      font-size:30px !important;
    }
    h3{
      font-size:24px !important;
    }
    h4{
      font-size:18px !important;
    }
    h5{
      font-size:16px !important;
    }
    h6{
      font-size:14px !important;
    }
    p {
      font-size: 18px !important;
    }

    .bodyContent {
      padding: 6% 5% 1% 6% !important;
    }
    .bodyContent img {
      max-width: 100% !important;
    }
    .bodyContentImage {
      padding: 3% 6% 3% 6% !important;
    }
    .bodyContentImage img {
      max-width: 100% !important;
    }
    .bodyContentImage h4 {
      font-size: 16px !important;
    }
    .bodyContentImage h5 {
      font-size: 15px !important;
      margin-top:0;
    }
  }
</style>


</body></html>