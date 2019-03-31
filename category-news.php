<?php get_header(); ?>

<section id="news">
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
                                    <img src="<?php the_field('img1'); ?>">
                                </div>
                                <div class="news-container__other-images">
                                    <div class="news-container__other-image">
                                        <img src="<?php the_field('img2'); ?>">
                                    </div>
                                    <div class="news-container__other-image">
                                        <img src="<?php the_field('img3'); ?>">
                                    </div>
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
