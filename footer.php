<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coup
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
		if ( is_active_sidebar( 'sidebar-2' ) or is_active_sidebar( 'sidebar-3' ) ) { ?>

			<div class="footer-widget-holder container">
				<?php coup_footer_widgets(); ?>
			</div>

		<?php

		} ?>


		<div class="site-info">
			copyright © 1904-<?php 
			
			echo date("Y");
			
			 ?> Greyscale Press
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php if ( coup_is_woocommerce_activated() ) : ?>

	<?php if ( !is_cart() && !is_checkout() ) { ?>

		<!-- Mini Cart -->

		<div class="mini-cart woo-side-area">
			<?php coup_woo_header_cart(); ?>
		</div>

	<?php }
endif; ?>
<span class="overlay"></span>
<button class="back-to-top hide"><i class="icon-top"></i></button>
<?php wp_footer(); ?>

</body>
</html>
