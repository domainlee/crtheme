<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Creativ Portfolio
 */

/**
 *
 * @hooked creativ_portfolio_footer_start
 */
do_action( 'creativ_portfolio_action_before_footer' );

/**
 * Hooked - creativ_portfolio_footer_top_section -10
 * Hooked - creativ_portfolio_footer_section -20
 */
do_action( 'creativ_portfolio_action_footer' );

/**
 * Hooked - creativ_portfolio_footer_end. 
 */
do_action( 'creativ_portfolio_action_after_footer' );

wp_footer(); ?>

</body>  
</html>