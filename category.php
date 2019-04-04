<?php get_header(); ?>

  <section class="content container">
    <div class="row">
      <div class="news-container col-9 col-td-6">
        <div class="news-container__content">
            <?php get_template_part('loop'); ?>

          <!--			--><?php //get_template_part('pagination'); ?>

        </div>
      </div>
      <div class="sidebar-widget col-3 col-td-6">
          <?php get_sidebar(); ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
