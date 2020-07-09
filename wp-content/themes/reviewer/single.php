<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Reviewer
 */

get_header(); ?>

	<div id="site-main">

		<div class="wrapper wrapper-main clearfix">
		
			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<header class="ilovewp-page-intro ilovewp-page-inner">

					<?php
					$categories = get_the_category();
					$separator = ', ';
					$output = array();
					if ( ! empty( $categories ) ) {
						echo '<span class="post-meta-category">';
						foreach( $categories as $category ) {
							$output[] = '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'reviewer' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>';
						}
						print implode($separator, $output);
						echo '</span>';
					}
					?>

					<h1 class="title-page"><?php the_title(); ?></h1>
					
					<span class="post-meta-gravatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), '80' ); ?></span>
					<p class="post-meta"><?php _e('Posted by','reviewer'); ?> <?php echo esc_url( the_author_posts_link() ); ?> 
					<span class="posted-on"><?php _e('on','reviewer'); ?> <time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time></span></p>
				</header><!-- .ilovewp-page-intro .ilovewp-page-inner -->

				<main id="site-content" class="site-main clearfix" role="main">
				
					<div class="site-content-wrapper clearfix">

						<div class="post-single clearfix">
					
							<?php
								the_content( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'reviewer' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );
							?>
					
						</div><!-- .post-single -->

						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'reviewer' ),
								'after'  => '</div>',
							) );
						?>
				
						<?php
						$tags_list = get_the_tag_list( '', esc_html__( ', ', 'reviewer' ) );
						if ( $tags_list ) {
							printf( '<p class="tags-links">' . esc_html__( 'Tags: %1$s', 'reviewer' ) . '</p>', $tags_list ); // WPCS: XSS OK.
						}
						?>

						<?php 
						$args['prev_text'] = '<span class="nav-link-label"><span class="genericon genericon-previous"></span></span>' . '%title';
						$args['next_text'] = '%title' . '<span class="nav-link-label"><span class="genericon genericon-next"></span></span>';
						echo get_the_post_navigation($args); ?>
						
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					</div><!-- .site-content-wrapper .clearfix -->
					
				</main><!-- #site-content -->
			
			</article><!-- #post-<?php the_ID(); ?> -->
			
			<?php endwhile; // End of the loop. ?>
			
			<?php get_sidebar(); ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>