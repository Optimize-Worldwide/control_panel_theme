<h2>Associated Client</h2>
<h3><a href="<?php echo get_the_permalink($client); ?>"><?php echo get_the_title($client); ?></a></h3>

<?php
global $site_data;
$primary_contact = str_replace("'","",$site_data['_site_primary_contact']);
$project_manager = str_replace("'","",$site_data['_site_project_manager']);
$billing_contact = str_replace("'","",$site_data['_site_billing_contact']);
$client_email_addresses = get_post_meta($client,'_client_email_addresses',true);
$client_phone_numbers = get_post_meta($client,'_client_phone_numbers',true);
$client_people = get_post_meta($client,'_client_people',true);
if ($primary_contact or $project_manager or $billing_contact):
	foreach ($client_people as $id => $person):
		if($id == $primary_contact):?>
			<section class="person">
				<h3>Primary Contact</h3>
				<span class="person"><?php echo $person['name']; ?></span><br>

				<?php if($person['notes']):?>
					<p class="notes"><?php echo $person['notes']; ?></p>
				<?php endif;

				if($person['email_address']): ?>
					<span class="email"><a href="mailto:<?php echo $person['email_address']; ?>"><?php echo $person['email_address']; ?></a></span><br>
				<?php elseif(isset($client_email_addresses)):?>
					<span class="email"><a href="mailto:<?php echo $client_email_addresses[0]['address']; ?>"><?php echo $client_email_addresses[0]['address']; ?></a></span><br>
				<?php endif;

				if($person['phone_number']):?>
					<span class="phone"><a href="tel:<?php echo tel_format($person['phone_number']); ?>"><?php echo $person['phone_number']; ?></a></span><br>
				<?php elseif(isset($client_phone_numbers)):?>
					<span class="phone"><a href="tel:<?php echo tel_format($client_phone_numbers[0]['number']); ?>"><?php echo $client_phone_numbers[0]['number']; ?></a></span><br>
				<?php endif; ?>
			</section>
		<?php endif;
		if($id == $billing_contact):?>
			<section class="person">
				<h3>Billing Contact</h3>
				<span class="person"><?php echo $person['name']; ?></span><br>

				<?php if($person['notes']):?>
					<p class="notes"><?php echo $person['notes']; ?></p>
				<?php endif;

				if($person['email_address']): ?>
					<span class="email"><a href="mailto:<?php echo $person['email_address']; ?>"><?php echo $person['email_address']; ?></a></span><br>
				<?php elseif(isset($client_email_addresses)):?>
					<span class="email"><a href="mailto:<?php echo $client_email_addresses[0]['address']; ?>"><?php echo $client_email_addresses[0]['address']; ?></a></span><br>
				<?php endif;

				if($person['phone_number']):?>
					<span class="phone"><a href="tel:<?php echo tel_format($person['phone_number']); ?>"><?php echo $person['phone_number']; ?></a></span><br>
				<?php elseif(isset($client_phone_numbers)):?>
					<span class="phone"><a href="tel:<?php echo tel_format($client_phone_numbers[0]['number']); ?>"><?php echo $client_phone_numbers[0]['number']; ?></a></span><br>
				<?php endif; ?>
			</section>
		<?php endif;
		if($id == $project_manager):?>
			<section class="person">
				<h3>Project Manager</h3>
				<span class="person"><?php echo $person['name']; ?></span><br>

				<?php if($person['notes']):?>
					<p class="notes"><?php echo $person['notes']; ?></p>
				<?php endif;

				if($person['email_address']): ?>
					<span class="email"><a href="mailto:<?php echo $person['email_address']; ?>"><?php echo $person['email_address']; ?></a></span><br>
				<?php elseif(isset($client_email_addresses)):?>
					<span class="email"><a href="mailto:<?php echo $client_email_addresses[0]['address']; ?>"><?php echo $client_email_addresses[0]['address']; ?></a></span><br>
				<?php endif;

				if($person['phone_number']):?>
					<span class="phone"><a href="tel:<?php echo tel_format($person['phone_number']); ?>"><?php echo $person['phone_number']; ?></a></span><br>
				<?php elseif(isset($client_phone_numbers)):?>
					<span class="phone"><a href="tel:<?php echo tel_format($client_phone_numbers[0]['number']); ?>"><?php echo $client_phone_numbers[0]['number']; ?></a></span><br>
				<?php endif; ?>
			</section>
		<?php endif;
	endforeach;

elseif($client_people):
	foreach($client_people as $person):?>
		<section class="person">
			<h3><?php echo $person['name']; ?></h3>
			<?php if(isset($person['notes']) and $person['notes']):?>
				<p class="notes"><?php echo $person['notes']; ?></p>
			<?php endif;

			if(isset($person['email_address']) and $person['email_address']): ?>
				<span class="email"><a href="mailto:<?php echo $person['email_address']; ?>"><?php echo $person['email_address']; ?></a></span><br>
			<?php elseif(isset($client_email_addresses)):?>
				<span class="email"><a href="mailto:<?php echo $client_email_addresses[0]['address']; ?>"><?php echo $client_email_addresses[0]['address']; ?></a></span><br>
			<?php endif;

			if(isset($person['phone_number']) and $person['phone_number']):?>
				<span class="phone"><a href="tel:<?php echo tel_format($person['phone_number']); ?>"><?php echo $person['phone_number']; ?></a></span><br>
			<?php elseif(isset($client_phone_numbers)):?>
				<span class="phone"><a href="tel:<?php echo tel_format($client_phone_numbers[0]['number']); ?>"><?php echo $client_phone_numbers[0]['number']; ?></a></span><br>
			<?php endif; ?>
		</section>
	<?php endforeach;

else:
	if(isset($client_phone_numbers) and $client_phone_numbers):
		foreach ($client_phone_numbers as $client_phone_number):?>
			<section class="phone">
				<span class="number"><a href="tel:<?php echo tel_format($client_phone_number['number']); ?>"><?php echo $client_phone_number['number']; ?></a></span>
				<?php if($client_phone_number['notes'] != ''): ?>
					<p class="notes"><?php echo $client_phone_number['notes']; ?></p>
				<?php endif; ?>
			</section>
		<?php endforeach;
	endif;


	if(isset($client_email_addresses)):
		foreach ($client_email_addresses as $client_email_address): ?>
			<section class="email">
				<span class="address"><a href="mailto:<?php echo $client_email_address['address']; ?>"><?php echo $client_email_address['address']; ?></a></span>
				<?php if($client_email_address['notes'] != ''): ?>
					<p class="notes"><?php echo $client_email_address['notes']; ?></p>
				<?php endif; ?>
			</section>
		<?php endforeach;
	endif;
endif; ?>