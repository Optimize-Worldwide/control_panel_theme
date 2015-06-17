<?php
$args = array(
	'post_type' => 'checklist',
	'meta_key' => '_checklist_site',
	'meta_value' => $post->ID,
	'orderby' => 'post_date',
	'order' => 'ASC',
	'posts_per_page' => -1
);
$has_checklists = get_posts($args);//Gets posts of type checklist whose '_checklist_site' value is equal to current post_id
$is_development = false;
$is_security    = false;
$is_seo         = false;

$services = get_the_terms($post->ID,'service');
foreach ($services as $service):
	if ($service->slug == 'development-sites') $is_development = true;
	if ($service->slug == 'seo') $is_seo = true;
	if ($service->slug == 'security-backup') $is_security = true;
endforeach;

if ($has_checklists or $is_development or $is_seo or $is_security): ?>
	<section id="checklists" class="card m-all t-1of2 d-1of3">
		<h2>Checklists</h2>
		<?php
		$has_predevelopment = false;
		$has_development    = false;
		$has_prerelease     = false;
		$has_release        = false;
		$is_released        = false;



		foreach ($has_checklists as $checklist):
			$checklist_type = wp_get_post_terms($checklist->ID, 'checklist-type');
			if($checklist_type[0]->slug == 'predevelopment') $has_predevelopment = true;
			if($checklist_type[0]->slug == 'development') $has_development = true;
			if($checklist_type[0]->slug == 'prerelease') $has_prerelease = true;
			if($checklist_type[0]->slug == 'release') $has_release = true;

			include(TEMPLATEPATH . "/library/checklists/".$checklist_type[0]->slug.".php");//Gets checklist items based on which type of checklist it's pulling in

			$prefix       = "_checklist_".$checklist_name."_";
			$checklist_id = $checklist->ID;
			$checklist    = "";
			$site         = $post->ID;

			$completed  = 0;
			$incomplete = 0;

			foreach ($checklistItems as $item_name => $item_attr):
				$is_complete = get_post_meta($checklist_id,$prefix.$item_name.'_completed_on',true);

				$item_title = $item_attr['title'];

				if ($is_complete):
					$status = 'complete';
					$complete++;
				else:
					$status = 'incomplete';
					$incomplete++;
				endif;

				if(isset($item_attr['references'])):
					$references = $item_attr['references'];
				else:
					$references = null;
				endif;

				if(isset($item_attr['fields'])):
					$fields = $item_attr['fields'];
				else:
					$fields = null;
				endif;

				$item = new ChecklistItem($item_name,$item_title,$checklist_name,$item_attr['description'],$site,$fields,$references,$status);
				$checklist .= $item->output();
			endforeach;

			$total = $complete + $incomplete;
			if($total == $complete && $checklist_type[0]->slug == 'release') $is_released = true; ?>

			<div class="checklist accordion" id="checklist-<?php echo $checklist_id; ?>">
				<header>
					<h3><?php echo $checklist_type[0]->name; ?> <small><?php echo get_the_date('Y-m-d ',$checklist->ID); ?></small></h3>
					<progress max="<?php echo $total; ?>" value="<?php echo $complete; ?>"></progress>
				</header>
				<main>
					<a href="<?php echo get_the_permalink($checklist_id); ?>" target="_blank">Go to Checklist</a>
					<?php echo $checklist; ?>
					<a href="<?php echo get_delete_post_link($checklist_id); ?>" class="delete-checklist"><small>Delete Checklist</small></a>
				</main>
			</div>
		<?php endforeach;

		if (!$has_predevelopment and $is_development):?>
			<a href="#" class="new-checklist" data-type="predevelopment">Create New preDevelopment Checklist</a><br>
		<?php endif;

		if ($has_predevelopment and !$has_development):?>
			<a href="#" class="new-checklist" data-type="development">Create New Development Checklist</a><br>
		<?php endif;

		if ($has_development and !$has_prerelease):?>
			<a href="#" class="new-checklist" data-type="prerelease">Create New preRelease Checklist</a><br>
		<?php endif;

		if ($has_prerelease and !$has_release):?>
			<a href="#" class="new-checklist" data-type="release">Create New Release Checklist</a><br>
		<?php endif;

		if ($is_released or $is_security or $is_seo):?>
			<?php if($is_seo){?><a href="#" class="new-checklist" data-type="sweep">Create New SEO Sweep Checklist</a><br><?php } ?>
			<?php if($is_security){?><a href="#" class="new-checklist" data-type="security">Create New Security &amp; Backup Checklist</a><br><?php } ?>
		<?php endif; ?>
</section>
<?php endif;
// Generation pseudocode
// make sure publication date on sites reflects start of contract
/*

if ($is_development) $cycle_date = closest cycle date to last item checked
else $cycle_date = closest cycle date to post creation date/contact initiation
wp_schedule_event($cycle_date,'biweekly','post_creation',$args)

post_creation (
wp_insert_post($args)
)

*/


 ?>