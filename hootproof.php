<?php

/**
* Plugin Name: HootProof SSL Broken Images Fix
* Plugin URI: http://hootproof.de
* Description: Fixes broken images in WordPress 4.4 on websites with SSL enabled (https)
* Version: 1.0.0
* Author: Michelle Retzlaff
* Author URI: http://hootproof.de
*/


//prevent direct execution
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


add_filter( 'wp_calculate_image_srcset', function( $sources )
{
    foreach( $sources as &$source )
    {
        if( isset( $source['url'] ) )
            $source['url'] = set_url_scheme( $source['url'], 'https' );
    }
    return $sources;

}, PHP_INT_MAX );