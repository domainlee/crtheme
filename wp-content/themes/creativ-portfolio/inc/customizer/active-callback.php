<?php
/**
 * Active callback functions.
 *
 * @package CRThemes Portfolio
 */

function crtheme_portfolio_introduction_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_introduction_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function crtheme_portfolio_skills_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_skills_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function crtheme_portfolio_call_to_action_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_call_to_action_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}