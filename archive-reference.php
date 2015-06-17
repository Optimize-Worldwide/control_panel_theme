<?php

get_header(); ?>
<div id="content">
	<div id="inner-content" class="wrap cf">
			<div id="main" class="cf" role="main">
			<h1 class="archive-title sticky card m-all t-all d-all">
				<input type="text" class="filter" placeholder="<?php post_type_archive_title(); ?>" autofocus="autofocus">
			</h1>
			<ul class="filter-list m-all t-all d-all">
				<?php if (current_user_can('edit_posts')):?>
					<article class="m-all t-1of3 d-1of5 card cf">
						<a class="add-post" href="<?php echo get_admin_url(); ?>post-new.php?post_type=reference"><h2>Add New Reference</h2></a>
					</article>
				<?php endif; ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of3 d-1of5 card cf' ); ?> role="article">
						<header class="article-header">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
						</header>

					</article>
					<?php endwhile; ?>
				<?php endif; ?>
				</ul>
			</div>
	</div>
</div>

<?php get_footer(); ?>
