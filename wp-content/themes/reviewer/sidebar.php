<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reviewer
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>

<aside id="site-aside" role="complementary">

	<div class="site-aside-wrapper clearfix">
	
		<?php if ( is_single() ) { ?>
		
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="post-cover post-cover-intro">
				<?php the_post_thumbnail('reviewer-large-thumbnail'); ?>
			</div><!-- .post-cover .post-cover-intro -->
			<?php endif; ?>

			<div class="post-custom-meta<?php if ( has_post_thumbnail() ) { echo ' custom-meta-withphoto'; } ?>">
				<div class="post-custom-meta-wrapper">
					<ul class="custom-meta-list">
						
						<?php get_template_part( 'template-parts/content', 'meta' ); ?>
						
					</ul><!-- .custom-meta-list -->
				</div><!-- .post-custom-meta-wrapper -->
			</div><!-- .post-custom-meta -->

		<?php } ?>
		
		<?php 
		if ( function_exists('rwmb_meta') && isset(rwmb_meta( 'product-profile' )[0]) ) { ?>
			<div class="widget widget-product-profile">
				<p class="widget-title widget-title-red"><?php _e('Product Profile','reviewer'); ?></p>
				<div class="textwidget">
					<?php echo esc_html ( rwmb_meta( 'product-profile' )[0] ); ?>
				</div>
			</div><!-- .widget .widget-product-profile -->
			<?php 
		}
		?>
		
		<?php dynamic_sidebar( 'sidebar-main' ); ?>
		
	</div><!-- .site-aside-wrapper .clearfix -->

</aside><!-- #site-aside -->