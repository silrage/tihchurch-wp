<?php get_header(); ?>

<section class="content">
    <div class="container row">
        <div class="news-container col-9 col-td-6">
            <div class="news-container__content">

                <h1><?php the_title(); ?></h1>

                <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <?php the_content(); ?>

                        <?php comments_template('', true); // Remove if you don't want comments ?>

                        <br class="clear">

                        <?php edit_post_link(); ?>

                    </article>
                    <!-- /article -->

                <?php endwhile; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>

                        <h2><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h2>

                    </article>
                    <!-- /article -->

                <?php endif; ?>

            </div>
        </div>
        <div class="sidebar-widget col-3 col-td-6">
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>


<?php get_sidebar(); ?>

<?php get_footer(); ?>