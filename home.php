<?php get_header(); ?>

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
            <input
                    type="text"
                    placeholder="Поиск по сайту: новости, история, расписание Богослужений"
            />
            <button class="site-search-btn">Поиск</button>
        </div>
    </div>
</section>

<section id="news" class="content">
    <div class="container row">
        <div class="news-container col-9 col-td-6">
            <div class="news-container__content row">
                <?php
                global $query_string; // параметры базового запроса
                query_posts( $query_string .'&cat=1&order=ASC&posts_per_page=20' );
                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); ?>

                        <div class="news-container__one-post col-6 col-md-3">
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
        <div class="sidebar-widget col-3 col-td-6">
            <div class="sidebar-widget-location">
                <span class="sidebar-widget__title">
                    Для тех, кто хочет к нам приехать
                </span>
                <span class="sidebar-widget__subtitle">
                    <strong>Работа библиотеки Храма</strong>
                </span>
                <div class="sidebar-widget-work-time-days-wrapper">
                    <div class="sidebar-widget-work-time-days">
                        <span class="sidebar-widget__text">Понедельник и четверг</span>
                        <strong>15</strong> - <strong>19</strong> ч
                    </div>
                    <div class="sidebar-widget-work-time-days">
                        <span class="sidebar-widget__text">Суббота и воскресенье</span>
                        <strong>10</strong> - <strong>19</strong> ч
                    </div>
                </div>
                <a href="http://tihchurch.ru/kontakty/" class="sidebar-widget-link marg-top-20"><strong>Схема проезда</strong></a>
            </div>
            <div class="sidebar-widget">
                <span class="sidebar-widget__title">
                    Симоновские встречи
                </span>
                <span class="sidebar-widget__subtitle">
                    <strong>Симоновские встречи для детей, молодежи и взрослых</strong>
                </span>
                <span class="sidebar-widget__text">
                    Воскресные беседы по основам православной культуры проводятся каждое воскресенье в 15 ч в библиотеке храма.
                </span>
                <span class="sidebar-widget__title marg-top-40 marg-bottom-20 text-warning">
                    <strong>Внимание!</strong>
                </span>
                <a href="#" class="sidebar-widget-link marg-bottm-40"><strong>Не православные общины</strong></a>
            </div>
            <div class="sidebar-widget">
                <span class="sidebar-widget__title">
                    Икона дня
                </span>
                <div class="sidebar-widget__image-wrapper">
                    <img width="170" src="https://days.pravoslavie.ru/jpg/is4133.jpg" class="sidebar-widget__image" alt="Икона">
                </div>
                <span class="sidebar-widget__subtitle text-center">
                    <strong>Святитель Кирилл Иерусалимский.</strong>
                </span> 
                <span class="sidebar-widget__text text-center">
                    31 марта 2019 г. ( 18 марта ст.ст.), воскресенье.
                </span>           
            </div>
        </div>
    </div>
</section>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
