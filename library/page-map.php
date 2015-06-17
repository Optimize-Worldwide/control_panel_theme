<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<?php get_header(); ?>
      <div id="content" class="reference">
        <div id="inner-content" class="wrap cf">
            <div id="main" class="m-all t-all d-all cf" role="main">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" role="article">
                <header class="article-header">
                  <h1 class="single-title reference-title"><?php the_title(); ?></h1>
                  <a class="edit-link" href="<?php echo get_edit_post_link( ); ?>">e</a>
                </header>
                <section class="entry-content cf">
                  <?php
                    the_content();?>


                </section>
                <footer class="article-footer"></footer>
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
                      <p><?php _e( 'This is the error message in the single-reference.php template.', 'bonestheme' ); ?></p>
                    </footer>
                  </article>
              <?php endif; ?>
            </div>
            <?php //get_sidebar(); ?>
        </div>
      </div>
<?php get_footer(); ?>

