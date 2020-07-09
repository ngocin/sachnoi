<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Reviewer
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function reviewer_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

    if ( is_page() && !comments_open() && '0' == get_comments_number() ) {
		$classes[] = 'comments-closed';
    }

	return $classes;
}
add_filter( 'body_class', 'reviewer_body_classes' );

/* 
Extra Functions if the [Custom Post Type UI] plugin is installed.
Plugin URL: http://wordpress.org/plugins/custom-post-type-ui/
1. function reviewer_add_post_type_to_loops - include our custom post types in the main loops (homepage & search)
2. 
*/

if ( function_exists( 'cptui_get_post_type_slugs' ) ) :

function reviewer_add_post_type_to_loops( $query ) {

	if ( is_front_page() && $query->is_main_query() ) {
		$cptui_post_types = cptui_get_post_type_slugs();
		$query->set(
			'post_type',
			array_merge(
				array( 'post' ), // May also want to add the "page" post type.
				$cptui_post_types
			)
		);
	}

	if ( $query->is_search ) {
		$cptui_post_types = cptui_get_post_type_slugs();
		$query->set(
			'post_type',
			array_merge(
				array( 'post' ), // May also want to add the "page" post type.
				$cptui_post_types
			)
		);
	}
}

add_filter( 'pre_get_posts', 'reviewer_add_post_type_to_loops' );

endif;