<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <div class="news-container__one-post">
        <div class="news-container__img-wrapper">
            <div class="news-container__first-image">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
        <div class="news-container__text">
            <div class="news-container__date-wrapper">
                <span class="news-container__date"><?php echo get_the_date(); ?></span>
            </div>
            <a href="<?php echo get_permalink(); ?>">
                <span class="news-container__title"><?php the_title(); ?></span>
                <span class="news-container__description"><?php the_excerpt(); ?></span>
            </a>
        </div>
        <?php edit_post_link(); ?>
    </div>

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article>
        <h2><?php _e('По Вашему запросу ничего не найдено.', 'html5blank'); ?></h2>
    </article>
    <!-- /article -->

<?php endif; ?>
