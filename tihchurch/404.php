<?php get_header(); ?>

<section id="404">
    <div class="container">

			<!-- article -->
			<article id="post-404">

				<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
				<h2>
					<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'html5blank' ); ?></a>
				</h2>

			</article>
			<!-- /article -->

    </div>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
