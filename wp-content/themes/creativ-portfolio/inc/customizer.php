<?php
/**
 * CRThemes Portfolio Theme Customizer
 *
 * @package CRThemes Portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function crtheme_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Register custom section types.
//	$wp_customize->register_section_type( 'crtheme_portfolio_Customize_Section_Upsell' );

	// Register sections.
//	$wp_customize->add_section(
//		new crtheme_portfolio_Customize_Section_Upsell(
//			$wp_customize,
//			'theme_upsell',
//			array(
//				'title'    => esc_html__( 'CRThemes Portfolio Pro', 'crtheme-portfolio' ),
//				'pro_text' => esc_html__( 'Buy Pro', 'crtheme-portfolio' ),
//				'pro_url'  => 'http://www.creativthemes.com/downloads/creativ-portfolio-pro/',
//				'priority'  => 10,
//			)
//		)
//	);

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize sanitize.
	include get_template_directory() . '/inc/customizer/active-callback.php';

	// Load header sections option.
	include get_template_directory() . '/inc/customizer/theme-section.php';

	// Load home page sections option.
	include get_template_directory() . '/inc/customizer/home-section.php';
	
}
add_action( 'customize_register', 'crtheme_portfolio_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function crtheme_portfolio_customize_preview_js() {
	wp_enqueue_script( 'crtheme_portfolio_customizer', get_template_directory_uri() . '/inc/customizer/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'crtheme_portfolio_customize_preview_js' );
/**
 *
 */
function crtheme_portfolio_customize_backend_scripts() {

	wp_enqueue_style( 'crtheme-portfolio-fontawesome-all', get_template_directory_uri() . '/assets/css/all.css' );
	wp_enqueue_style( 'crtheme-portfolio-admin-customizer-style', get_template_directory_uri() . '/inc/customizer/css/customizer-style.css' );
	wp_enqueue_script( 'crtheme-portfolio-admin-customizer', get_template_directory_uri() . '/inc/customizer/js/customizer-script.js', array( 'jquery', 'customize-controls' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'crtheme_portfolio_customize_backend_scripts', 10 );
