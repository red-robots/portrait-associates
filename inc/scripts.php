<?php
/**
 * Enqueue scripts and styles.
 */
function acstarter_scripts() {
	wp_enqueue_style( 'acstarter-style', get_stylesheet_uri(), array(), '0123' );

	wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, '2.1.3', true);
		wp_enqueue_script('jquery');


		wp_register_script('CSSPlugin', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/plugins/CSSPlugin.min.js', false, '1.10.2', true);
		wp_enqueue_script('CSSPlugin');

		wp_register_script('EasePack', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/easing/EasePack.min.js', false, '1.10.2', true);
		wp_enqueue_script('EasePack');

		wp_register_script('TweenLite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenLite.min.js', false, '1.10.2', true);
		wp_enqueue_script('TweenLite');


		wp_register_script('TimelineLite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TimelineLite.min.js', false, '1.10.2', true);
		wp_enqueue_script('TimelineLite');


	

	wp_enqueue_script( 
			'acstarter-blocks', 
			get_template_directory_uri() . '/assets/js/vendors.js', 
			array(), '20120206', 
			true 
		);

	wp_enqueue_script( 
			'acstarter-custom', 
			get_template_directory_uri() . '/assets/js/custom.js', 
			array(), '20120206', 
			true 
		);
	wp_enqueue_script( 
			'font-awesome', 
			'https://use.fontawesome.com/8f931eabc1.js', 
			array(), '20180309'
		);



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'acstarter_scripts' );