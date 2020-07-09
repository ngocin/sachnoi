<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reviewer
 */

?>

	<footer class="site-footer" role="contentinfo">
	
		<?php get_sidebar( 'footer' ); ?>
		
		<div class="wrapper wrapper-copy">
			<p class="copy"><?php _e('Copyright &copy;','reviewer');?> <?php echo date_i18n(__("Y","reviewer")); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'reviewer');?>. <span class="theme-credit"><?php printf( esc_html__( 'Theme by %1$s', 'reviewer' ), '<a href="https://www.ilovewp.com/" rel="nofollow external designer noopener">ilovewp</a>' ); ?></span></p>
		</div><!-- .wrapper .wrapper-copy -->
	
	</footer><!-- .site-footer -->

</div><!-- end #container -->

<?php wp_footer(); ?>

</body>
</html>