<?php
// TODO: Check service accounts for possible social URLS, and include those as well
$has_social_account['facebook'] = unserialize($site_data['_site_social_facebook'][0]);
$has_social_account['gplus'] = unserialize($site_data['_site_social_gplus'][0]);
$has_social_account['twitter'] = unserialize($site_data['_site_social_twitter'][0]);
$has_social_account['linkedin'] = unserialize($site_data['_site_social_linkedin'][0]);
 ?>

<div class="accordion snippet">
	<header>
		<h3>Email Forms</h3>
	</header>
	<main>
		<section>
			<h4>Contact Form</h4>
			<button class="clipboard">d</button>
			<?php
			$contact_form_html = "<p>Your Name (required)<br />
				[text* your-name] </p>

			<p>Your Email (required)<br />
				[email* your-email] </p>

			<p>How did you hear about us?<br />
				[text referral]</p>

			<p>Subject<br />
				[text your-subject] </p>

			<p>Your Message<br />
				[textarea your-message] </p>

			<p>[submit 'Send']</p>"; ?>
			<pre>
				<code>
				<?php echo nl2br(htmlspecialchars($contact_form_html)); ?>
				</code>
			</pre>
		</section>
		<section>
			<h4>To <?php if($email_addresses[0]['address']){echo $email_addresses[0]['address'];} else {echo "Client";} ?></h4>
			<button class="clipboard">d</button>
			<?php
			$owner_email_html = "<table cellpadding='0' cellspacing='0' width='100%' border='0'>
				<tr>
					<td valign='top' align='center' style='padding: 25px 0px;'>
						<table cellpadding='0' cellspacing='0' width='600' border='0'>
							<tr>
								<td valign='top' align='left' style='padding-bottom: 5px;'>
									<a href='".$url."' title='".$organization_name."'><img src='".$url."/images/email-header.jpg' width='600' height='108' border='0' /></a>
								</td>
							</tr>
							<tr>
								<td valign='top' style='background: white; padding: 25px; border: solid 1px #F1F1F1;'>
									<p style='font: 18px/26px Arial, Verdana, Helvetica, sans-serif;'><strong>Website Message</strong></p>
									<table cellpadding='0' cellspacing='0' width='100%' border='0' style='font: 12px/18px Arial, Verdana, Helvetica, sans-serif;'>
										<tr>
											<td valign='top' align='left' colspan='2' bgcolor='#F1F1F1' style='font: 14px/24px Arial, Verdana, Helvetica, sans-serif; padding-left: 5px;'><strong>General Information</strong></td>
										</tr>
										<tr>
											<td colspan='2'>&nbsp;</td>
										</tr>
										<tr>
											<td valign='top' align='left' width='125'><strong>Name :</strong> </td>
											<td valign='top' align='left'>[your-name]</td>
										</tr>
										<tr>
											<td valign='top' align='left'><strong>Email address :</strong> </td>
											<td valign='top' align='left'><a href='mailto:[your-email]'>[your-email]</a></td>
										</tr>
										<tr>
											<td valign='top' align='left'><strong>Referral:</strong> </td>
											<td valign='top' align='left'>[referral]</td>
										</tr>
										<tr>
											<td valign='top' align='left'><strong>Message :</strong> </td>
											<td valign='top' align='left'>[your-message]</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td align='left' style='font: 12px/18px Arial, Verdana, Helvetica, sans-serif;'>&copy; ".$organization_name.". All rights reserved.</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>"; ?>
			<pre>
				<code>
				<?php echo nl2br(htmlspecialchars($owner_email_html)); ?>
				</code>
			</pre>
		</section>
		<section>
			<h4>To Visitor</h4>
			<button class="clipboard">d</button>
			<?php $visitor_email_html = "<table cellpadding='0' cellspacing='0' width='100%' border='0'>
				<tr>
					<td valign='top' align='center' style='padding: 25px 0px;'>
						<table cellpadding='0' cellspacing='0' width='600' border='0'>
							<tr>
								<td valign='top' align='left' style='padding-bottom: 5px;'>
									<a href='".$url."' title='".$organization_name."'><img src='".$url."/images/email-header.jpg' width='600' height='108' border='0' /></a>
								</td>
							</tr>
							<tr>
								<td valign='top' style='background: white; padding: 25px; border: solid 1px #F1F1F1;'>
									<p style='font: 18px/26px Arial, Verdana, Helvetica, sans-serif;'><strong>Hi [your-name]!</strong></p>
									<table cellpadding='0' cellspacing='0' width='100%' border='0' style='font: 12px/18px Arial, Verdana, Helvetica, sans-serif;'>
										<tr>
											<td valign='top' align='left' colspan='2' bgcolor='#F1F1F1' style='font: 14px/24px Arial, Verdana, Helvetica, sans-serif; padding-left: 5px;'><strong>Thank you for Contacting ".$organization_name.".</strong></td>
										</tr>
										<tr>
											<td colspan='2'>&nbsp;</td>
										</tr>
										<tr>We will be in touch shortly! Until then, here is the information that is being reviewed:</tr>
										<br>&nbsp;<br>
										<tr>
											<td valign='top' align='left'><strong>Your Message:</strong> </td>
											<td valign='top' align='left'>[your-message]</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td align='left' style='font: 12px/18px Arial, Verdana, Helvetica, sans-serif;'>&copy; ".$organization_name.". All rights reserved.</td>
							</tr>
							<tr>
								<td align='right'>";
								if($has_social_account['facebook']):
	$visitor_email_html.="<a href='".$has_social_account['facebook'][0]['url']."' style='float:right;margin-right:8px;'><img src='http://optimizehere.co/images/icons/facebook.png'></a>";
								endif;
								if($has_social_account['gplus']):
	$visitor_email_html.="<a href='".$has_social_account['gplus'][0]['url']."' style='float:right;margin-right:8px;'><img src='http://optimizehere.co/images/icons/google-plus.png'></a>";
								endif;
								if($has_social_account['twitter']):
	$visitor_email_html.="<a href='".$has_social_account['twitter'][0]['url']."' style='float:right;margin-right:8px;'><img src='http://optimizehere.co/images/icons/twitter.png'></a>";
								endif;
								if($has_social_account['linkedin']):
	$visitor_email_html.="<a href='".$has_social_account['linkedin'][0]['url']."' style='float:right;margin-right:8px;'><img src='http://optimizehere.co/images/icons/linkedin.png'></a>";
								endif;
	$visitor_email_html.="</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			";


			 ?>
			<pre>
				<code>
				<?php echo nl2br(htmlspecialchars($visitor_email_html)); ?>
				</code>
			</pre>
		</section>
	</main>
</div>