<?php
/*

*/

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

?>

<?php get_header(); ?>
      <div id="content">
        <div id="inner-content" class="wrap cf">
            <div id="main" class="cf" role="main">
            <h1 class="archive-title sticky card m-all t-all d-all">
              <input type="text" class="filter" placeholder="<?php echo $term->name; ?> Checklists" >
            </h1>
            <ul class="filter-list m-all t-all d-all">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <?php             ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of3 d-1of5 card cf' ); ?> role="article">
                <header class="article-header">
                  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                  <a href="<?php echo get_edit_post_link( ); ?>" class="edit-link"></a>
                </header>
              </article>
              <?php endwhile; ?>
              </ul>

                  <?php bones_page_navi(); ?>

              <?php else : ?>

                  <article id="post-not-found" class="hentry cf">
                    <header class="article-header">
                      <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                    </header>
                    <section class="entry-content">
                      <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
                    </footer>
                  </article>

              <?php endif; ?>

            </div>

          <?php //get_sidebar(); ?>

        </div>

      </div>

<?php get_footer(); ?>
