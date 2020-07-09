<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reviewer
 */


if ( function_exists( 'rwmb_meta' ) && isset(rwmb_meta( 'product-rating' )[0] )) { ?>
	<li class="custom-meta-item">
		<span class="custom-meta-label"><?php echo get_theme_mod( 'reviewer_meta_rating_label', __('Product Rating','reviewer') ); ?></span><span class="custom-meta-value"><?php echo esc_html( rwmb_meta ( 'product-rating' )[0] ); ?></span>
	</li><!-- .custom-meta-item -->
	<?php 
}

if ( function_exists( 'cptui_get_taxonomy_slugs' ) ) {
	$custom_taxonomy_slugs = cptui_get_taxonomy_slugs();
	
	if ( isset( $custom_taxonomy_slugs ) && count ( $custom_taxonomy_slugs ) > 0 ) {
	
		foreach ( $custom_taxonomy_slugs as $key => $value ) {
			
			$current_taxonomy = get_taxonomy( esc_html($value) );
			$current_terms = get_the_term_list( $post->ID, esc_html($value), '', ', ', '' );
			
			if ( $current_terms ) {

				?>
				<li class="custom-meta-item">
					<span class="custom-meta-label"><?php print esc_html($current_taxonomy->labels->singular_name); ?></span><span class="custom-meta-value"><?php echo $current_terms; ?></span>
				</li><!-- .custom-meta-item -->
				<?php
			
			}
		}
	}
}

if ( function_exists( 'rwmb_meta' ) && isset(rwmb_meta( 'product-price' )[0]) ) { ?>
	<li class="custom-meta-item">
		<span class="custom-meta-label"><?php echo get_theme_mod( 'reviewer_meta_price_label', __('Product Price','reviewer') ); ?></span><span class="custom-meta-value"><?php echo esc_html( rwmb_meta( 'product-price' )[0] ); ?></span>
	</li><!-- .custom-meta-item -->
	<?php 
}