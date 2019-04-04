<?php get_header(); ?>

<section class="content container">
    <div class="row">
        <div class="news-container col-9 col-td-6">
            <div class="news-container__content">

                <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <!-- post title -->
                        <h1><?php the_title(); ?></h1>
                        <!-- /post title -->

                        <?php the_content(); // Dynamic Content ?>

                        <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

                    </article>
                    <!-- /article -->

                <?php endwhile; ?>

                <?php else: ?>

                    <!-- article -->
                    <article>

                        <h1><?php _e('Sorry, nothing to display.', 'html5blank'); ?></h1>

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

<?php get_footer(); ?>
