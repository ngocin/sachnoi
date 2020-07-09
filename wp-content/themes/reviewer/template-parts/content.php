<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reviewer
 */

?>

<?php $classes = array('ilovewp-post','ilovewp-post-archive', 'clearfix'); ?>

<li <?php post_class($classes); ?>>

	<article id="post-<?php the_ID(); ?>">
	
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="post-cover-wrapper">
			<div class="post-cover">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail(); ?>
				</a>
			</div><!-- .post-cover -->
		</div><!-- .post-cover-wrapper -->
		<?php endif; ?>
	
		<div class="post-content<?php if ( !has_post_thumbnail() ) { echo ' post-content-nophoto'; } ?>">
			<div class="post-preview">
				<div class="post-preview-wrapper">
					<?php the_title( sprintf( '<h2 class="title-post"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<p class="post-meta">
						<span class="posted-on"><span class="genericon genericon-time"></span> <time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo get_the_date(); ?></a></time></span>
						<?php if ( function_exists('the_views') ) { echo '<span class="post-views"><span class="genericon genericon-show"></span> '; the_views(); echo '</span>'; } ?>
					</p><!-- .post-meta -->

					<p class="post-excerpt"><?php echo wp_kses_post(force_balance_tags(get_the_excerpt())); ?></p>
					
				</div><!-- .post-preview-wrapper -->
			</div><!-- .post-preview -->

			<div class="post-custom-meta">
				<div class="post-custom-meta-wrapper">
					<ul class="custom-meta-list">
						
						<?php get_template_part( 'template-parts/content', 'meta' ); ?>

					</ul><!-- .custom-meta-list -->
				</div><!-- .post-custom-meta-wrapper -->
			</div><!-- .post-custom-meta -->

		</div><!-- .post-content -->
	
	</article><!-- #post-<?php the_ID(); ?> -->

</li><!-- .ilovewp-post .ilovewp-post-archive .clearfix -->