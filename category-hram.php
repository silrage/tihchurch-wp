<?php get_header(); ?>

<section id="hram">
    <div class="container">
        <div class="news-container space-hor15">
            <div class="news-container__content">
                <?php
                global $query_string; // параметры базового запроса
                query_posts( $query_string .'&order=ASC&posts_per_page=20' );
                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); ?>

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
                        </div>

                    <?php }?>

                    <div class="navigation">
                        <div class="next-posts"><?php next_posts_link(); ?></div>
                        <div class="prev-posts"><?php previous_posts_link(); ?></div>
                    </div>

                    <?php
                } // конец if
                else echo "<h2>Записей нет.</h2>";
                wp_reset_query();
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
