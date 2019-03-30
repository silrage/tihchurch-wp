<?php get_header(); ?>

<section id="arhive">
    <div class="container">

			<h1><?php _e( 'Archives', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

    </div>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
