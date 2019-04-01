<?php get_header(); ?>

<section class="site-banner">
    <div class="site-banner__wrapper">
        <div class="site-banner__item"
             style="
                background: url(http://tihchurch.ru/wp-content/uploads/2019/03/saldoni_bg-e1553954931724.jpg) no-repeat left center fixed;
                background-size: cover;
            "
        >
            <div class="container">
                <div class="site-banner__item-promo">
                    <div class="site-banner__item-title">
                        <h3>Красивые фотографии Храма, Монастыря</h3>
                    </div>
                    <div class="site-banner__item-desc">
                        <p>Подписи к фото</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section id="site-search">
    <div class="site-search site-search-main container">
        <div class="site-search__wrapper space-hor15">
            <i class="site-search__icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
    s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
    c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
    s-17-7.626-17-17S14.61,6,23.984,6z"/>
</svg>
            </i>

            <form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
                <input
                        class="search-input"
                        type="search"
                        name="s"
                        placeholder="Поиск по сайту: новости, история, расписание Богослужений"
                />
                <button class="site-search-btn" type="submit" role="button">Поиск</button>
            </form>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">

            <div class="news-container col-9 col-td-6">
                <div class="news-container__content row">
                    <?php
                    global $query_string; // параметры базового запроса
                    query_posts( $query_string .'&cat=1&order=ASC&posts_per_page=20' );
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post(); ?>
    
                            <div class="news-container__one-post col-6 col-md-3">
                                <?php if (get_field('img1')): ?>
                                    <?php $hasMoreImages = get_field('img2') && get_field('img3'); ?>
                                    <div class="news-container__img-wrapper<?=($hasMoreImages) ? ' has-more-images' : null;?>">
                                        <div class="news-container__first-image">
                                            <img src="<?php the_field('img1'); ?>">
                                        </div>
                                        <?php
                                            if ($hasMoreImages) {
                                        ?>
                                            <div class="news-container__other-images">
                                                <img src="<?php the_field('img2'); ?>">
                                                <img src="<?php the_field('img3'); ?>">
                                            </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                <?php endif; ?>
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
            <div class="sidebar-widget col-3 col-td-6">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
