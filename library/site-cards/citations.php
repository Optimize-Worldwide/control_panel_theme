<h2>Citations</h2>
<?php
$citation_sites = array(//TODO: Needs DRYing. See \meta-boxes\citations.php
	'Facebook',
	'Google Local',
	'Twitter',
	'SuperPages',
	'Hotfrog',
	'Best of Web',
	'Yellow Pages',
	'Foursquare',
	'Yahoo Local',
	'Bing Places',
	'Express Update',
	'Yelp',
	'Elocal',
	'Trello',
	'MerchantCircle',
	'CityGrid',
	'InsiderPages',
	'YellowBot',
	'YellowUSA MagicYellow',
	'Neustar Localeze',
	'Ziplocal',
	'CitySquares',
	'LocalPages',
	'MojoPages',
	'Tupalo',
	'Brownbook',
	'iBegin',
	'Other',
);
//Break each into its own card, with a 100% width bar separating them from the rest of the infos
foreach ($citation_sites as $citation_site):
	$sitename = str_replace(" ","_",strtolower($citation_site));

	$citation_class = $sitename;

	$url               = get_post_meta($post->ID,'_site_'.$sitename.'_url','input',true);
	if (empty($url)):
		//TODO: Add "Add new $citation_site citation" link if does not have one
		continue;
	endif;
	$username          = get_editable_post_meta($post->ID,'_site_'.$sitename.'_username','input',true);
	$username          = get_editable_post_meta($post->ID,'_site_'.$sitename.'_username','input',true);
	$password          = get_editable_post_meta($post->ID,'_site_'.$sitename.'_password','input',true);
	$yext_managed      = get_post_meta($post->ID,'_site_'.$sitename.'_yext_managed',true);
	$validation_method = get_editable_post_meta($post->ID,'_site_'.$sitename.'_validation_method','input',true);
	$attention_needed  = get_post_meta($post->ID,'_site_'.$sitename.'_attention_needed',true);
	$status            = get_editable_post_meta($post->ID,'_site_'.$sitename.'_status','input',true);
	$notes             = get_editable_post_meta($post->ID,'_site_'.$sitename.'_notes','textarea',true);

	if ($attention_needed != "") $citation_class .= " attention-needed";
	?>

	<div class="<?php echo $citation_class; ?> citation accordion">
		<header>
			<h3><?php echo $citation_site; ?></h3>
		</header>
		<main class="account">
			<?php if ($yext_managed == 1): ?>
				<h4 class="citation-yext">Managed by Yext</h4><br />
			<?php endif; ?>

			<?php if($username != ""): ?>
				<span class="username"><?php echo $username; ?></span><br />
			<?php endif; ?>

			<?php if ($password != ""): ?>
				<span class="password"><span class="concealed"><?php echo $password; ?></span></span><br />
			<?php endif; ?>

			<?php if ($validation_method != ""): ?>
				<span class="citation-method"><span class="label">Method of Verification</span><?php echo $validation_method; ?></span><br />
			<?php endif; ?>

			<?php if ($status != ""): ?>
				<span class="citation-status"><span class="label">Status</span><?php echo $status; ?></span><br />
			<?php endif; ?>


			<?php if ($notes != ""): ?>
				<p class="notes"><?php echo nl2br($notes,true); ?></p>
			<?php endif; ?>

			<a class="citation-link" href="<?php echo $url; ?>"></a><br>
		</main>
	</div>
<?php endforeach; ?>
