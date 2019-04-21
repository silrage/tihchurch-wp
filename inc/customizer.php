<?php    
/**
 * Tihchurch Theme Customizer
 *
 * @package Tihchurch
 */

function print_templates() {
	?>
	<script type="text/html" id="tmpl-banner-create-link">
		<button type="button" class="button customize-add-menu-button">
			<?php _e( 'Добавить ещё' );?>
		</button>
	</script>
	<?php
}

function tihchurch_custom_css () {
	?>
	<style type="text/css">
		#site-main {
			background: <?php echo esc_html(get_theme_mod('ui_bg_overlay'));?>;
			color: <?php echo esc_html(get_theme_mod('ui_color_content'));?>;
		}
		header, .site-tabs__item > ul { background: <?php echo esc_html(get_theme_mod('ui_bg_header'));?>; }
		.site-page-content { background: <?php echo esc_html(get_theme_mod('ui_bg_content'));?>; }
		.site-tabs__item { font-size: <?php echo esc_html(get_theme_mod('ui_tabs_size'));?>px; }
		.sidebar-widget__title { border-bottom: 2px solid <?php echo esc_html(get_theme_mod('ui_color_accent'));?>; }
		.sidebar-widget-link { color: <?php echo esc_html(get_theme_mod('ui_color_accent'));?>; }
		footer {
			background: <?php echo esc_html(get_theme_mod('ui_bg_footer'));?>;
			color: <?php echo esc_html(get_theme_mod('ui_color_footer'));?>;
		}
	</style>
	<?php
}

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tihchurch_customize_register( $wp_customize ) {
	// UI & Colors
	$wp_customize->add_section( 'ui_section', array(
		'title' => __('Настройки темы', ''),
		'description' => __( 'Задайте параметры стиля темы', '' ),
    'priority' => null
	));
	$wp_customize->add_setting( 'ui_bg_header', array(
		'default' => '#fff'
  ));
  $wp_customize->add_control( 'ui_bg_header', array(
		'label' => __('Фон шапки', ''),
		'section' => 'ui_section',
		'priority' => null,
		'type' => 'color'
	));
	$wp_customize->add_setting( 'ui_bg_content', array(
		'default' => '#fff'
  ));
  $wp_customize->add_control( 'ui_bg_content', array(
		'label' => __('Фон контента', ''),
		'section' => 'ui_section',
		'priority' => null,
		'type' => 'color'
	));
	$wp_customize->add_setting( 'ui_tabs_size', array(
		'default' => 12
  ));
  $wp_customize->add_control( 'ui_tabs_size', array(
		'label' => __('Высота шрифта меню в px', ''),
		'section' => 'ui_section',
		'priority' => null,
		'type' => 'number'
	));
	$wp_customize->add_setting( 'ui_color_content', array(
		'default' => '#000'
  ));
  $wp_customize->add_control( 'ui_color_content', array(
		'label' => __('Цвет контента', ''),
		'section' => 'ui_section',
		'priority' => null,
		'type' => 'color'
	));
	$wp_customize->add_setting( 'ui_color_accent', array(
		'default' => '#19a7e0'
  ));
  $wp_customize->add_control( 'ui_color_accent', array(
		'label' => __('Цвет акцентированного контента', ''),
		'section' => 'ui_section',
		'priority' => null,
		'type' => 'color'
	));
	$wp_customize->add_setting( 'ui_bg_footer', array(
		'default' => '#797572'
  ));
  $wp_customize->add_control( 'ui_bg_footer', array(
		'label' => __('Фон подвала', ''),
		'section' => 'ui_section',
		'priority' => null,
		'type' => 'color'
	));
	$wp_customize->add_setting( 'ui_color_footer', array(
		'default' => '#fff'
  ));
  $wp_customize->add_control( 'ui_color_footer', array(
		'label' => __('Цвет подвала', ''),
		'section' => 'ui_section',
		'priority' => null,
		'type' => 'color'
	));
	$wp_customize->add_setting( 'ui_bg_overlay', array(
		'default' => '#fcfcfc'
  ));
  $wp_customize->add_control( 'ui_bg_overlay', array(
		'label' => __('Фон вне зоны просмотра (overlay)', ''),
		'section' => 'ui_section',
		'priority' => null,
		'type' => 'color'
	));
	// ::UI & Colors

	// Banner
  $wp_customize->add_section( 'banner_section', array(
		'title' => __('Настройки баннера', ''),
		'description' => __( 'Задайте нужные параметры для отображения баннера на сайте', '' ),
    'priority' => null
  ));
	$wp_customize->add_setting( 'banner_height', array(
		'default' => null
  ));
  $wp_customize->add_control( 'banner_height', array(
		'label' => __('Высота в px', ''),
		'section' => 'banner_section',
		'priority' => null,
		'type' => 'text'
	));
	$wp_customize->add_setting( 'banner_mobile_height', array(
		'default' => null
  ));
  $wp_customize->add_control( 'banner_mobile_height', array(
		'label' => __('Высота для мобилы в px', ''),
		'section' => 'banner_section',
		'priority' => null,
		'type' => 'text'
	));
	$wp_customize->add_setting( 'banner_img' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_img', array(
		'label' => __( 'Изображение для слайда баннера' ),
		'section' => 'banner_section',
		'settings' => 'banner_img',
		'mime_type' => 'image',
		'button_labels' => array(
			'select' => __( 'Выберите файл' ),
			'change' => __( 'Выбрать файл' ),
			'default' => __( 'По-умолчанию' ),
			'remove' => __( 'Удалить' ),
			'placeholder' => __( 'Файл не выбран' ),
			'frame_title' => __( 'Выберите файл' ),
			'frame_button' => __( 'Выбран файл' ),
		)
	)));
  $wp_customize->add_setting( 'banner_title', array(
		'default' => null
  ));
  $wp_customize->add_control( 'banner_title', array(
		'label' => __('Заголовок', ''),
		'section' => 'banner_section',
		'priority' => null,
		'type' => 'text'
	));
	$wp_customize->add_setting( 'banner_title_eng', array(
		'default' => null	
  ));
  $wp_customize->add_control( 'banner_title_eng', array(
		'label' => __('Заголовок на Анлг.', ''),
		'section' => 'banner_section',
		'priority' => null,
		'type' => 'text'
	));
	$wp_customize->add_setting( 'banner_desc', array(
		'default' => null	
  ));
  $wp_customize->add_control( 'banner_desc', array(
		'label' => __('Описание', ''),
		'section' => 'banner_section',
		'priority' => null,
		'type' => 'textarea'
	));
	$wp_customize->add_setting( 'banner_desc_eng', array(
		'default' => null	
  ));
  $wp_customize->add_control( 'banner_desc_eng', array(
		'label' => __('Описание на Англ.', ''),
		'section' => 'banner_section',
		'priority' => null,
		'type' => 'textarea'
	));
	$wp_customize->add_setting( 'banner_slide_tonning', array(
		'default' => true
  ));
	$wp_customize->add_control( 'banner_slide_tonning', array(
		'label' => __( 'Тонировка на слайде' ),
		'description' => esc_html__( 'Делает читабельным белый текст на светлом фоне' ),
		'section'  => 'banner_section',
		'priority' => null,
		'type'=> 'checkbox'
	));
	// ::Banner
}

// Init theme customizer
add_action( 'customize_register', 'tihchurch_customize_register' );
add_action(	'wp_head',	'tihchurch_custom_css');	 
// @TODO - add more & script
// add_action( 'customize_controls_print_footer_scripts', 'print_templates' );
