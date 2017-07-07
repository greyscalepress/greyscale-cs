<?php 

// Change-Detector-XXXX - for Espresso.app


function custom_register_styles() {
	
	
	wp_enqueue_style( 
		'parent-style', // $handle
		get_template_directory_uri() . '/style.css' // $src 
	);
	
	/**
	 * Custom CSS
	 */
	 
	$dev_mode = false;
	$host = $_SERVER['HTTP_HOST'];
	
	if ( current_user_can('edit_others_pages') ) {
		 $dev_mode = true;
	} else if ( $host != 'greyscalepress.com' ) {
		 $dev_mode = true;
	}
	
	if ( $dev_mode == true ) {
	
			// DEV: the MAIN stylesheet - uncompressed
			wp_enqueue_style( 
					'main-style', 
					get_stylesheet_directory_uri() . '/css/dev/00-main.css', // main.css
					false, // dependencies
					time() // version
			); 
	
	} else {
	
			// PROD: the MAIN stylesheet - combined and minified
			wp_enqueue_style( 
					'main-style', 
					get_stylesheet_directory_uri() . '/css/prod/styles.20170127233400.css', // main.css
					false, // dependencies
					null // version
			); 
	}
	

		
//		wp_dequeue_style( 'ippo-style' );
//		wp_deregister_style( 'ippo-style' );
//		
		wp_dequeue_style( 'coup-font-enqueue' );
		wp_deregister_style( 'coup-font-enqueue' );

	$hkgrotesk = get_template_directory_uri() . '/assets/fonts/hk-grotesk/stylesheet.css';
	
	wp_enqueue_style( 
			'hkgrotesk', 
			$hkgrotesk, // main.css
			false, // dependencies
			null // version
	);
		
	wp_enqueue_script( 
	// the MAIN JavaScript file -- development version
			'main-script',
			get_stylesheet_directory_uri() . '/js/scripts.js', // scripts.js
			array('jquery'), // dependencies
			null, // version
			true // in footer
	);
	
	

}
add_action( 'wp_enqueue_scripts', 'custom_register_styles', 25 );




// Header Cleanup

remove_action('wp_head', 'wp_generator');



/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function coup_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

//	$byline = sprintf(
//		esc_html_x( 'By : %s', 'post author', 'coup-shop' ),
//		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
//	);

	echo '<span class="posted-on"> ' . $posted_on . '</span>'; // WPCS: XSS OK.

}



// Admin Styles
// 

/*
 * Admin CSS
 *
 * For all users accessing the admin interface
*/

function greyscale_admin_css() {
  echo '<style>
        
    #setting-error-ippo {
    	/* display: none; */
    }
   
  </style>';
}
add_action('admin_head', 'greyscale_admin_css');



//require_once('functions/galleries.php');
//
//require_once('functions/agenda.php');
//
//require_once('functions/content.php');
//
//require_once('functions/members.php');
//
//require_once('functions/prev-next.php');

