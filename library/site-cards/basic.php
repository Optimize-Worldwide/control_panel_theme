<?php
if($business_addresses or $phone_numbers or $email_addresses):
		$create_snippet['hcard'] = true; ?>
	<section id="business_info" class="card m-all t-1of2 d-1of3">
		<a href="<?php echo get_edit_post_link(); ?>#meta_site_basic" class="edit-link">e</a>
		<h2>About <?php echo $organization_name; ?></h2>
		<?php if ($business_addresses): ?>
			<h3 class="section-head">Physical Address<?php if(count($business_addresses) > 1) {?>es<?php } ?></h3>

			<?php $i = 1;
			foreach ($business_addresses as $business_address):
				$address_full = str_replace(" ", "+", $business_address['address']);
				$address_full = str_replace("#", "", $address_full);
				$address_full = preg_replace( "/\r|\n/", "+", $address_full );?>

				<section class="physical-address" style="background-image:url(http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $address_full; ?>&zoom=13&size=500x500&maptype=roadmap&markers=color:0x01acf0%7C<?php echo $address_full; ?>)">
					<span class="location"><a href="https://maps.google.com?q=<?php echo $address_full; ?>" target="_blank"><?php echo nl2br($business_address['address'],true); ?></a></span><br>
					<?php if (isset($business_address['notes']) and $business_address['notes']): ?>
						<p class="notes"><?php echo nl2br($business_address['notes'],true); ?></p>
					<?php endif ?>
				</section>
				<?php $i++;
			endforeach;
		endif;

		if ($phone_numbers): ?>
			<h3 class="section-head">Phone Number<?php if(count($phone_numbers) > 1) {?>s<?php } ?></h3><?php

			foreach ($phone_numbers as $phone_number): ?>
				<section class="phone">
					<span class="number"><a href="tel:<?php echo tel_format($phone_number['number']); ?>"><?php echo $phone_number['number']; ?></a></span>
					<?php if (isset($phone_number['notes']) and $phone_number['notes']): ?>
						<p class="notes"><?php echo nl2br($phone_number['notes'],true); ?></p>
					<?php endif; ?>
				</section>
			<?php endforeach;
		endif;

		if ($email_addresses): ?>
			<h3 class="section-head">Email Address<?php if(count($email_addresses) > 1) {?>es<?php } ?></h3><?php

			foreach ($email_addresses as $email_address): ?>
				<section class="email">
					<span class="address"><a href="mailto:<?php echo $email_address['address'] ?>"><?php echo $email_address['address'] ?></a></span>
					<?php if (isset($email_address['notes']) and $email_address['notes']): ?>
						<p class="notes"><?php echo nl2br($email_address['notes'],true); ?></p>
					<?php endif; ?>
				</section>
			<?php endforeach;
		endif;?>
	</section>
<?php else: ?>
	<section id="business_info" class="card m-all t-1of2 d-1of3">
			<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_basic">Add Basic Information</a></h2>
	</section>
<?php endif; ?>