<?php
/**
 * Template Name: Full Width Page
 *
 * @package Reviewer
 */

get_header(); ?>

	<div id="site-main">

		<div class="wrapper wrapper-main wrapper-full clearfix">
		
			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<header class="ilovewp-page-intro ilovewp-page-inner">
					<h1 class="title-page"><?php the_title(); ?></h1>
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
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					</div><!-- .site-content-wrapper .clearfix -->
					
				</main><!-- #site-content -->
			
			</article><!-- #post-<?php the_ID(); ?> -->
			
			<?php endwhile; // End of the loop. ?>
		
		</div><!-- .wrapper .wrapper-main -->

	</div><!-- #site-main -->

<?php get_footer(); ?>