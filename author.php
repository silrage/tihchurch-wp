<?php get_header(); ?>

<section class="content container">
    <div class="row">
        <div class="news-container col-9 col-td-6">
            <div class="news-container__content">

                <?php if (have_posts()): the_post(); ?>

                    <h1><?php _e('Author Archives for ', 'html5blank');
                        echo get_the_author(); ?></h1>

                    <?php if (get_the_author_meta('description')) : ?>

                        <?php echo get_avatar(get_the_author_meta('user_email')); ?>

                        <h2><?php _e('About ', 'html5blank');
                            echo get_the_author(); ?></h2>

                        <?php echo wpautop(get_the_author_meta('description')); ?>

                    <?php endif; ?>

                    <?php rewind_posts();
                    while (have_posts()) : the_post(); ?>

                        <!-- article -->
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <!-- post thumbnail -->
                            <?php if (has_post_thumbnail()) : // Check if Thumbnail exists ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php the_post_thumbnail(array(120, 120)); // Declare pixel size you need inside the array ?>
                                </a>
                            <?php endif; ?>
                            <!-- /post thumbnail -->

                            <!-- post title -->
                            <h2>
                                <a href="<?php the_permalink(); ?>"
                                   title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <!-- /Post title -->

                            <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

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

                <?php get_template_part('pagination'); ?>

            </div>
        </div>
        <div class="sidebar-widget col-3 col-td-6">
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
