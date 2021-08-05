<?php
defined( 'ABSPATH' ) || exit;

/**
 * Recursively get taxonomy and its children
 *
 * @param string $taxonomy
 * @param int $parent - parent term id
 * @return array
 */
function get_taxonomy_hierarchy( $taxonomy, $parent = 0 ) {
	// only 1 taxonomy
	$taxonomy = is_array( $taxonomy ) ? array_shift( $taxonomy ) : $taxonomy;

	// get all direct decendants of the $parent
	$terms = get_terms( $taxonomy, array( 'parent' => $parent, 'hide_empty' => false ) );

	// prepare a new array.  these are the children of $parent
	// we'll ultimately copy all the $terms into this new array, but only after they
	// find their own children
	$children = array();

	// go through all the direct decendants of $parent, and gather their children
	foreach ( $terms as $term ){
		// recurse to get the direct decendants of "this" term
		$term->children = get_taxonomy_hierarchy( $taxonomy, $term->term_id );

		// add the term to our new array
		$children[ $term->term_id ] = $term;
	}

	// send the results back to the caller
	return $children;
}

/**
 * Recursively get all taxonomies as complete hierarchies
 *
 * @param $taxonomies array of taxonomy slugs
 * @param $parent int - Starting parent term id
 *
 * @return array
 */
function get_taxonomy_hierarchy_multiple( $taxonomies, $parent = 0 ) {
	if ( ! is_array( $taxonomies )  ) {
		$taxonomies = array( $taxonomies );
	}

	$results = array();

	foreach( $taxonomies as $taxonomy ){
		$terms = get_taxonomy_hierarchy( $taxonomy, $parent );

		if ( $terms ) {
			$results[ $taxonomy ] = $terms;
		}
	}

	return $results;
}