<?php 

add_shortcode('about_section','about_shortcode');
function about_shortcode($section){
	$result = shortcode_atts(array(
		'section_title'			 =>'',
		'about_first_group'	 	 =>'',
		'm_title'				 =>'',
		'cont' 				 	 =>'',
		'btn' 	 				 =>'',
		'btn_link' 				 =>'',
		'image' 				 =>'',
	),$section);
	extract($result);
	ob_start();
	?>
	    <!-- About Section start -->
    <div class="about-area section-padding bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-xs-12 info">
            <div class="about-wrapper wow fadeInLeft" data-wow-delay="0.3s">
              <div>
                <div class="site-heading">
                  <p class="mb-3"><?php echo esc_html($section_title); ?></p>
                  <h2 class="section-title"><?php echo esc_html($m_title); ?></h2>
                </div>
                <div class="content">
                  <p>
                   <?php echo esc_html($cont); ?>
                  </p>
                  <a href="<?php echo esc_html($btn_link); ?>" class="btn btn-common mt-3"><?php echo esc_html($btn); ?></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 wow fadeInRight" data-wow-delay="0.3s">
          	<?php $src = wp_get_attachment_url($image); ?>
            <img class="img-fluid" src="<?php echo esc_url($src); ?>" alt="" >
          </div>
        </div>
      </div>
    </div>
    <!-- About Section End -->
	


	<?php  
	return ob_get_clean();
} 

add_action( 'vc_before_init', 'about_el' );
function about_el() {
	vc_map( array(
		"name" => __( "about Section", "fusion" ), 
		"base" => "about_section",
		"category" => __( "fusion", "fusion"),
		"params" => array(
			array(
				"type" => "textfield",
				"heading" => __( "Section Title", "fusion" ),
				"param_name" => "section_title", 
			),

			array(
				"type" => "textfield",
				"heading" => __( "Main Title", "fusion" ),
				"param_name" => "m_title",
				), 
			
			array(
				"type" => "textfield",
				"heading" => __( "about Content", "fusion" ),
				"param_name" => "cont",
				),  
			array(
				"type" => "textfield",
				"heading" => __( "Button", "fusion" ),
				"param_name" => "btn",
				),
			array(
				"type" => "textfield",
				"heading" => __( "Button Link", "fusion" ),
				"param_name" => "btn_link",
				),
				array(
				"type" => "attach_image",
				"heading" => __( "Upload about image", "fusion" ),
				"param_name" => "image",
				),  

			)
		) 
	);

}