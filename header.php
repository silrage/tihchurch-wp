<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
            echo ' :';
        } ?><?php bloginfo('name'); ?></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
    <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
    <script>
      conditionizr.config({
        assets: '<?php echo get_template_directory_uri(); ?>',
        tests: {}
      });
    </script>

</head>
<body <?php body_class(); ?>>

<!-- site-main -->
<main id="site-main">
    <!-- site-page-content -->
    <div class="site-page-content">
        <!-- header -->
        <header class="header clear">
            <div class="container space-top wrap">
                <a href="/" class="site-title" title="Перейти на главную страницу">
                    <h2 style="font-family: Times New Roman;"><?php bloginfo('name'); ?></h2>
                </a>
                <div class="site-desc">
                    <p><?php bloginfo('description'); ?></p>
                </div>
                <a href="#" class="bvi-link bvi-open">
                    <i class="bvi-icon bvi-eye bvi-2x"></i>
                </a>
                <div class="site-primary-menu">
                    <div class="site-tabs">
                        <?php html5blank_nav(); ?>
                    </div>
                </div>
            </div>

            <?php html5blank_nav_lang(); ?>
        </header>
        <!-- /header -->

