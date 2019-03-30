<?php get_header(); ?>

<section id="category">
    <div class="container">

			<h1><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

            </div>
        </section>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
