<?php get_header(); ?>

<?php
    $slidesCount = get_theme_mod('banner_slides_count');
    if ($slidesCount && $slidesCount > 0):
?>
<section id="mainBanner" class="site-banner">
    <style>
        .site-banner__wrapper { height: <?php echo get_theme_mod('banner_height');?>px; }
        @media (max-width: 767px) { .site-banner__wrapper { height: <?php echo get_theme_mod('banner_mobile_height');?>px; } }
    </style>
    <div class="site-banner__wrapper">
        <?php
            for ($i=0; $i<$slidesCount; $i++):
                if (get_theme_mod('banner_img_'.$i)):
        ?>
                <div class="site-banner__item">
                    <div class="container">
                        <div class="site-banner__item-promo">
                            <div class="site-banner__item-title">
                                <?php
                                if(getConfText( 'banner_title_'.$i )) {
                                    echo '<h3>' . getConfText( 'banner_title_'.$i ) . '</h3>';
                                }?>
                            </div>
                            <div class="site-banner__item-desc">
                                <?php
                                if(getConfText('banner_desc_'.$i)){
                                    echo '<p>' . getConfText('banner_desc_'.$i) . '</p>';
                                }?>
                            </div>
                        </div>
                    </div>
                    <div class="site-banner__item-bg<?php if (get_theme_mod('banner_slide_tonning_'.$i)) echo ' with-tint';?>">
                        <style>
                            .site-banner__item-bg-image__<?php echo $i;?> { background-image: url(<?php echo get_theme_mod('banner_img_'.$i);?>); }
                            @media (max-width: 767px) { .site-banner__item-bg-image__<?php echo $i;?> { background-image: url(<?php echo get_theme_mod('banner_mobile_img_'.$i);?>); } }
                        </style>
                        <div class="site-banner__item-bg-image site-banner__item-bg-image__<?php echo $i;?>"></div>
                    </div>
                </div>
        <?php
                endif;
            endfor;
        ?>
    </div>
    <script type="text/javascript">
        (function() {
            'use strict'

            class TichchurchBanner {
                constructor (active=0, delay=3000, SOH=true) {
                    this.elBanner = document.getElementById('mainBanner')
                    this.slides = this.elBanner.querySelectorAll('.site-banner__item')
                    this.activeSlide = active
                    this.activeClass = 'is-active'
                    this.countSlides = this.slides.length
                    this.timer =  null
                    this.delay = delay
                    this.inited = false
                    this.stopOnHover = SOH
                }
                changeSlide() {
                    var scope = this
                    this.slides.forEach(function(el,k){
                        if (k === scope.activeSlide) {
                            el.classList.add(scope.activeClass)
                        } else {
                            el.classList.remove(scope.activeClass)
                        }
                    })
                    this.activeSlide++
                    if (this.activeSlide > this.slides.length - 1)
                        this.activeSlide = 0
                }
                soh() {
                    if (this.stopOnHover) {
                        var scope = this
                        this.elBanner.addEventListener('mouseover', function(e){
                            if (e.type === 'mouseover' && (e.target === scope.elBanner || scope.elBanner.contains(e.target))) {
                                scope.stopSlide()
                            }
                        }, false)
                        this.elBanner.addEventListener('mouseout', function(e){
                            if (!scope.timer) {
                                scope.startSlide()
                            }
                        }, false)
                    }
                }
                startSlide() {
                    if (!this.inited) {
                        this.changeSlide()
                        this.soh()
                        this.inited = true
                    }

                    if (this.countSlides > 0) {
                        var scope = this
                        this.timer = setInterval(function(){
                            scope.changeSlide()
                        }, this.delay)
                    }
                }
                stopSlide() {
                    clearInterval(this.timer)
                    this.timer = null
                }
            }

            var banner = new TichchurchBanner(0, <?php echo get_theme_mod('banner_delay');?>, <?php echo get_theme_mod('banner_stop_on_hover');?>)
            banner.startSlide()
        })();
    </script>
</section>
<?php endif; ?>

<section id="site-search">
    <div class="site-search site-search-main container">
        <div class="site-search__wrapper">
            <?php
            $lang = pll_current_language();
            if($lang === 'ru'){
                $other_page = 39;
            } else {
                $other_page = 96;
            }
            ?>

            <form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
                <i class="site-search__icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        x="0px"
                        y="0px"
                        viewBox="0 0 56.966 56.966"
                        style="enable-background:new 0 0 56.966 56.966;"
                        xml:space="preserve"
                    >
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                        s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                        c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
                        s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </i>
                <input
                        id="search"
                        class="search-input"
                        type="search"
                        name="s"
                        placeholder="<?php  the_field('search', $other_page); ?>"
                />
                <button class="site-search-btn" type="submit" role="button"><?php  the_field('search_btn', $other_page); ?></button>
            </form>
            <div
                id="allsearch"
                class="site-search__result"
            ></div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">

            <div class="news-container col-9 col-td-6">
                <div class="news-container__content row">
                    <?php
                    global $query_string;
                    query_posts($query_string . '&cat=1&order=DESC&posts_per_page=20');
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post(); ?>

                            <div class="news-container__one-post col-6 col-md-3">
                                <?php if (get_field('img1')) { ?>
                                    <?php $hasMoreImages = get_field('img2') && get_field('img3'); ?>
                                    <div class="news-container__img-wrapper<?= ($hasMoreImages) ? ' has-more-images' : null; ?>">
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
                                <?php } else if (has_post_thumbnail()) { ?>
                                    <div class="news-container__img-wrapper">
                                        <div class="news-container__first-image">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                    </div>
                                <?php } ?>
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

                        <?php } ?>

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
