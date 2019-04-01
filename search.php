<?php get_header(); ?>

<section class="content">
    <div class="container row">
        <div class="news-container col-9 col-td-6">
            <div class="news-container__content">

			<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

            </div>
        </div>
        <div class="sidebar-widget col-3 col-td-6">
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
