<?php

/**
 * Plugin Name: Custom Post Homepage
 */

function add_pages_to_dropdown( $pages, $r ){
    if ( ! isset( $r[ 'name' ] ) )
        return $pages;

    if ( 'page_on_front' == $r[ 'name' ] ) {
        $args = array(
            'post_type' => 'aops_landing_page'
        );

        $portfolios = get_posts( $args );
        $pages = array_merge( $pages, $portfolios );
    }

    return $pages;
}

add_filter( 'get_pages', 'add_pages_to_dropdown', 10, 2 );
