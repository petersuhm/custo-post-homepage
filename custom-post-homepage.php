<?php

/**
 * Plugin Name: Custom Post Homepage
 */

add_filter( 'get_pages', function( $pages ){
    $args = array(
        'post_type' => 'aops_landing_page'
    );
    $items = get_posts($args);
    $pages = array_merge($pages, $items);

    return $pages;
} );

add_action( 'pre_get_posts', function( $query ){
    if('' == $query->query_vars['post_type'] && 0 != $query->query_vars['page_id'])
        $query->query_vars['post_type'] = array( 'page', 'aops_landing_page' );
} );
