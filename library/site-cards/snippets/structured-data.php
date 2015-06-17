<?php
$has_social_account['facebook'] = unserialize($site_data['_site_social_facebook'][0]);
$has_social_account['gplus'] = unserialize($site_data['_site_social_gplus'][0]);
$has_social_account['twitter'] = unserialize($site_data['_site_social_twitter'][0]);
$has_social_account['linkedin'] = unserialize($site_data['_site_social_linkedin'][0]);
 ?>
<div class="accordion snippet">
	<header>
		<h3>Structured Data</h3>
	</header>
	<main>
		<button class="clipboard">d</button>
		<?php
		$structured_data_code = "
			<script type=\"application/ld+json\">
				{
					\"@context\" : \"http://schema.org\",
					\"@type\" : \"ProfessionalService\",
					\"@id\" : \"".$url."\",
					\"name\" : \"".$organization_name."\",
					\"url\" : \"".$url."\",
					\"sameAs\" : [";
		if($has_social_account['facebook']){
			$structured_data_code.="\"".$has_social_account['facebook'][0]['url']."\"";
			if($has_social_account['gplus'] || $has_social_account['twitter'] || $has_social_account['linkedin']) {
				$structured_data_code.=",";
			}
		}
		if($has_social_account['gplus']){
			$structured_data_code.="\"".$has_social_account['gplus'][0]['url']."\"";
			if($has_social_account['twitter'] || $has_social_account['linkedin']) {
				$structured_data_code.=",";
			}
		}
		if($has_social_account['twitter']){
			$structured_data_code.="\"".$has_social_account['twitter'][0]['url']."\"";
			if($has_social_account['linkedin']) {
				$structured_data_code.=",";
			}
		}
		if($has_social_account['linkedin']){
			$structured_data_code.="\"".$has_social_account['linkedin'][0]['url']."\"";
		}
		$structured_data_code.="
					],";
		if($business_addresses) $structured_data_code.="\"address\" : \"".end($business_addresses)['address']."\",";
		if($email_addresses) $structured_data_code.="\"email\" : \"".end($email_addresses)['address']."\",";
		if($phone_numbers) $structured_data_code.="\"telephone\" : \"".end($phone_numbers)['number']."\"";
		$structured_data_code.="		}
			</script>";
		 ?>
		<pre><code>
	<?php echo nl2br(htmlspecialchars($structured_data_code)); ?>


		</code></pre>
	</main>
</div>
