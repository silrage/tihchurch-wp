<!-- footer -->
<footer>
    <div class="container">
        <div class="space-hor15">
            <div class="row space-vert2">
                <div class="col-5 col-td-6">
                    <div class="site-title">
                        <h4><?php bloginfo('name'); ?></h4>
                    </div>
                    <div class="site-desc space-bottom">
                        <p class="site-text-p3"><?php bloginfo('description'); ?></p>
                    </div>
                    <div class="site-contacts">
                        <p class="site-text-p3"><?php
                            $other_page = 39;
                            the_field('addres', $other_page); ?></p>
                        <p class="site-text-p3"><?php the_field('phone', $other_page); ?></p>

                        <p class="site-text-p3"><a href="mailto:<?php the_field('email', $other_page); ?>">
                                <?php the_field('email', $other_page); ?>
                            </a></p>
                    </div>
                </div>
                <div class="col-7 col-td-6">
                    <ul class="site-social space-top2">
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">VK</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Insta</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">YouTube</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">RuTube</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Facebook</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">OK</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /footer -->
<!-- site-main -->
</div>
<!-- site-page-content -->
</main>
<!-- /wrapper -->

<?php wp_footer(); ?>

<!-- analytics -->
<script></script>

</body>
</html>
