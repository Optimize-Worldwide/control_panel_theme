<?php
/*
 * CHECKLIST TEMPLATE
*/

$site = get_post_meta($post->ID, '_checklist_site',true);
//This if/else statement determines which set of $checklist_name and $checklistItems will be used
if (has_term('predevelopment', 'checklist-type')):
	include 'library/checklists/predevelopment.php';
elseif (has_term('development', 'checklist-type')):
	include 'library/checklists/development.php';
elseif (has_term('prerelease', 'checklist-type')):
	include 'library/checklists/prerelease.php';
elseif (has_term('release', 'checklist-type')):
	include 'library/checklists/release.php';
elseif (has_term('security', 'checklist-type')):
	include 'library/checklists/security.php';
elseif (has_term('sweep', 'checklist-type')):
	include 'library/checklists/sweep.php';
endif;

?>

<?php get_header(); ?>
<div id="content" class="checklist">
	<div id="inner-content" class="wrap cf">
			<div id="main" class="m-all t-all d-all cf" role="main">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
					<header class="article-header">
						<h1 class="single-title checklist-title"><a href="<?php echo get_the_permalink($site); ?>"><?php echo get_the_title($site); ?></a> <?php echo ucfirst($checklist_name); ?> Checklist</h1>
						<a class="edit-link" href="<?php echo get_edit_post_link( ); ?>">e</a>
					</header>
					<?php
					// TODO: output links to resources needed for each checklist
					$prefix = "_checklist_".$checklist_name."_";

					$checklist_id = $post->ID;

					$checklist = "";

					// Store checklist items in variables before progress bar so $complete is updated
					$complete = 0;
					$incomplete = 0;
					foreach ($checklistItems as $item_name => $item_attr):
						$is_completed = get_post_meta($checklist_id,$prefix.$item_name.'_completed_on',true);

						$item_title = $item_attr['title'];

						if ($is_completed):
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

						$item = new ChecklistItem($item_name,$item_title,$checklist_id,$item_attr['description'],$site,$fields,$references,$status);
						$checklist .= $item->output();
					endforeach;
					$total = $complete + $incomplete; ?>

					<progress max="<?php echo $total; ?>" value="<?php echo $complete; ?>"></progress>

					<?php echo $checklist; ?>

					<?php comments_template(); ?>
				</article>
				<?php endwhile; ?>
				<?php else : ?>
						<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
							</section>
							<footer class="article-footer">
								<p><?php _e( 'This is the error message in the single-checklist.php template.', 'bonestheme' ); ?></p>
							</footer>
						</article>
				<?php endif; ?>
			</div>
	</div>
</div>
<?php get_footer(); ?>
