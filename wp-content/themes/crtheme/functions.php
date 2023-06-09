<?php
if ( ! defined( 'CRThemes_version' ) ) {
    define( 'CRThemes_version', '1.0.0.0' );
}

// ADMIN
require_once get_parent_theme_file_path( '/inc/admin/admin.php' );

// since 2.8
require_once get_parent_theme_file_path( '/inc/header.php' );

require_once get_parent_theme_file_path( '/inc/fonts.php' );
require_once get_parent_theme_file_path( '/inc/google-fonts.php' );

//require get_parent_theme_file_path( '/inc/customizer/customizer.php' );
//require get_parent_theme_file_path ( '/inc/customizer/register.php' );

/**
 * Register and Enqueue Styles.
 *
 * @since crthemes 1.0
 */
function register_styles() {
    wp_register_style('main', get_template_directory_uri() . '/assets/build/css/main.min.css', array(), '1.1', 'all');
    wp_enqueue_style('main'); // Enqueue it!
}

add_action( 'wp_enqueue_scripts', 'register_styles' );

/**
 * Register and Enqueue Scripts.
 *
 * @since crthemes 1.0
 */
function register_scripts() {
    wp_register_script('crthemes', get_template_directory_uri() . '/assets/build/js/main.bundle.js', array('jquery'), '1.0.1', true); // Custom scripts
    wp_enqueue_script('crthemes'); // Enqueue it!
}

add_action( 'wp_enqueue_scripts', 'register_scripts' );


/* One click import demo
 * @since 3.0
  */
if ( ! defined( 'PT_OCDI_PATH' ) ) {
    define( 'PT_OCDI_PATH', get_template_directory() . '/inc/demo-import/' );
    define( 'PT_OCDI_URL', get_template_directory_uri() . '/inc/demo-import/' );
}
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

require_once get_parent_theme_file_path( '/inc/demo-import/one-click-demo-import.php' );
//require_once get_parent_theme_file_path( '/inc/block/register-block.php' );
//require_once get_parent_theme_file_path( '/inc/register-block.php' );



/* -------------------------------------------------------------------- */
/* SETUP
/* -------------------------------------------------------------------- */
if ( ! function_exists( 'crthemes_setup' ) ) :
    function crthemes_setup() {

        // translation
        load_theme_textdomain( 'wi', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        // title tag
        add_theme_support( 'title-tag' );

        // post thumbnail
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'thumbnail-big', 1020, 510, true );  // big thumbnail (ratio 2:1)
        add_image_size( 'thumbnail-medium', 480, 384, true );  // medium thumbnail
        add_image_size( 'thumbnail-medium-nocrop', 480, 9999, false );  // medium thumbnail no crop
        add_image_size( 'thumbnail-vertical', 9999, 500, false );  // vertical image used for gallery

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'cr' ),
            'footer' => __( 'Footer Menu', 'cr' ),
        ) );

        // html5
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        // post formats
        add_theme_support( 'post-formats', array(
            'video', 'gallery', 'audio', 'link',
        ) );

        // since 2.4
        add_theme_support( 'woocommerce' );

    }
endif; //
add_action( 'after_setup_theme', 'crthemes_setup' );



/* -------------------------------------------------------------------- */
/* LAYOUT ARRAY
/* -------------------------------------------------------------------- */
if ( ! function_exists( 'wi_layout_array' ) ) {
    function wi_layout_array() {
        $layout_arr = array(
            'standard'              =>  'Standard',
            'grid-2'                =>  'Grid 2 columns',
            'grid-3'                =>  'Grid 3 columns',
            'grid-4'                =>  'Grid 4 columns',
            'masonry-2'             =>  'Pinterest-like 2 columns',
            'masonry-3'             =>  'Pinterest-like 3 columns',
            'masonry-4'             =>  'Pinterest-like 4 columns',
            'newspaper'             =>  'Newspaper',
            'list'                  =>  'List',
        );

        return $layout_arr;
    }
}

/* -------------------------------------------------------------------- */
/* BLOCK ARRAY
/* -------------------------------------------------------------------- */
if ( ! function_exists( 'wi_block_array' ) ) {
    function wi_block_array() {
        $block_arr = array(
            'slider'                    =>  'Slider',
            'big-post'                  =>  'Big post',
            'grid-2'                    =>  'Grid 2 columns',
            'grid-3'                    =>  'Grid 3 columns',
            'grid-4'                    =>  'Grid 4 columns',

            'list'                      =>  'List style',
            'vertical'                  =>  'Post Vertical',
            'group-1'                   =>  'Post Group 1',
            'group-2'                   =>  'Post Group 2',
        );

        return $block_arr;
    }
}

/* -------------------------------------------------------------------- */
/* SIDEBAR ARRAY
/* -------------------------------------------------------------------- */
if ( ! function_exists( 'wi_sidebar_array' ) ) {
    function wi_sidebar_array() {
        return array(
            'sidebar-right'     =>  'Sidebar Right',
            'sidebar-left'      =>  'Sidebar Left',
            'no-sidebar'        =>  'No Sidebar',
        );
    }
}
