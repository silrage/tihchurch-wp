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

/**
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tihchurch_customize_register( $wp_customize ) {
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

}
// Init theme customizer
add_action( 'customize_register', 'tihchurch_customize_register' );
// @TODO - add more & script
// add_action( 'customize_controls_print_footer_scripts', 'print_templates' );
