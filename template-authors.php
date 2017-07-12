<?php
/**
 * Template Name: Authors
 *
 * @package coup
 */
 
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container container-medium" role="main">

		<?php
		while ( have_posts() ) : the_post();
			
			echo '<header class="entry-header container container-side">';
			the_title( '<h1 class="entry-title big-text">', '</h1>' );
			echo '</header><!-- .entry-header -->';
			
			// get_template_part( 'template-parts/content', 'single' );
			
		endwhile; // End of the loop.
		
		// Show list of "product_tag" terms
		
		$terms= get_terms( array(
		    'taxonomy' => 'product_tag',
		    'hide_empty' => false,
		) );
		
//		echo '<pre>';
//		var_dump($terms);
//		echo '</pre>';

		echo '<div id="post-load" class="row">';
		
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		
		    $count = count( $terms );
		    $i = 0;
		    $term_list = '<p class="my_term-archive">';
		    
		    foreach ( $terms as $term ) {
		    
		    	// we need:
					// Title
					// Hyperlink - get_term_link()
					// Image
					// Description
					
					$term_output = gs_author_content( $term );
					
					echo $term_output;
		    
//		        $i++;
//		        $term_list .= '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
//		        if ( $count != $i ) {
//		            $term_list .= ' &middot; ';
//		        }
//		        else {
//		            $term_list .= '</p>';
//		        }
		        
		        
		    }
		    echo $term_list;
		}
		
		echo '</div>';
		
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<aside class="side-nav">
		<!-- Search form -->
		<div class="search-wrap">
			<?php coup_custom_search_form(); ?>
		</div>

		<!-- woo filter sidebar -->
		<?php if ( coup_is_woocommerce_activated() ) : ?>

			<?php if ( !is_cart() && !is_checkout() ) { ?>

				<!-- Cart icon -->
				<div class="cart-touch">
					<?php coup_cart_link(); ?>
				</div>

			<?php }
		endif; ?>

		<!-- insert sharedaddy if enabled here -->
		<?php coup_insert_sharedaddy() ?>

		<!-- Post navigation -->
		<?php coup_post_navigation(); ?>

	</aside>

<?php
get_footer();
