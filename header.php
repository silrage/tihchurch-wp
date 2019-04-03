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
            <div class="container">
                <div class="wrap space-top space-md-top2">
                    <a
                        href="/"
                        class="site-title"
                        title="<?=(get_locale()==='ru_RU'?'Перейти на главную страницу':'Home');?>"
                    >
                        <h2 style="font-family: Times New Roman;"><?php
                            $lang = pll_current_language();
                            if($lang === 'ru'){
                                $other_page = 39;
                            } else {
                                $other_page = 96;
                            }

                            the_field('name', $other_page);
                            ?></h2>
                    </a>
                    <div class="site-desc">
                        <p><?php the_field('description', $other_page); ?></p>
                    </div>
                    <div class="site-primary-menu">
                        <div class="site-tabs">
                            <?php html5blank_nav(); ?>
                        </div>
                    </div>
                    <div class="site-right-menu">
                        <?php html5blank_nav_lang(); ?>
                        <a
                            href="#"
                            class="bvi-link bvi-open"
                            title="<?=(get_locale()==='ru_RU'?'Режим для слабовидящих':'Visually impaired mode');?>"
                        >
                            <i class="bvi-icon bvi-eye bvi-2x"></i>
                        </a>
                    </div>
                </div>
            </div>

        </header>
        <!-- /header -->

