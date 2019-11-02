<?php 
	function ion_style_enqueue_Style(){

	wp_enqueue_style( 'fusion-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'fusion-line-icons', get_template_directory_uri() . '/assets/fonts/line-icons.css' );
	wp_enqueue_style( 'fusion-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
	wp_enqueue_style( 'fusion-owl.theme', get_template_directory_uri() . '/assets/css/owl.theme.css' );
	wp_enqueue_style( 'fusion-animate', get_template_directory_uri() . '/assets/css/animate.css' );
	wp_enqueue_style( 'fusion-main', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'fusion-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );


	wp_enqueue_script( 'fusion-popper', get_template_directory_uri() . '/assets/js/jquery-min.js', array(), '', true );
	wp_enqueue_script( 'fusion-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '', true );
	wp_enqueue_script( 'fusion-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '', true );
	wp_enqueue_script( 'fusion-owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '', true );
	wp_enqueue_script( 'fusion-wow', get_template_directory_uri() . '/assets/js/wow.js', array(), '', true );
	wp_enqueue_script( 'fusion-jquery.nav', get_template_directory_uri() . '/assets/js/jquery.nav.js', array(), '', true );
	wp_enqueue_script( 'fusion-scrolling', get_template_directory_uri() . '/assets/js/scrolling-nav.js', array(), '', true );
	wp_enqueue_script( 'fusion-easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array(), '', true );
	wp_enqueue_script( 'fusion-main', get_template_directory_uri() . '/assets/js/main.js', array(), '', true );
	wp_enqueue_script( 'fusion-validator', get_template_directory_uri() . '/assets/js/form-validator.min.js', array(), '', true );
	wp_enqueue_script( 'fusion-contact-form-script', get_template_directory_uri() . '/assets/js/contact-form-script.min.js', array(), '', true );
	}
	add_action('wp_enqueue_scripts','ion_style_enqueue_Style');
