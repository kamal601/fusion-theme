<?php 

add_shortcode('fusion_testimonial','fusion_testimonial_shortcode');
function fusion_testimonial_shortcode($testimonial){
	$result = shortcode_atts(array(
		'section_title'		 =>'',
		'testimonial_group'	 =>'',
	),$testimonial);
	extract($result);
	ob_start();
	?>
 <!-- Testimonial Section Start -->
    <section id="testimonial" class="testimonial section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="testimonials" class="owl-carousel wow fadeInUp" data-wow-delay="1.2s">
              <?php 
					$testimonial_section=vc_param_group_parse_atts($testimonial_group);

					foreach ($testimonial_section as $spk_class): 
				?>

              <div class="item">
                <div class="testimonial-item">
                  <div class="img-thumb">
                  	<?php $src = wp_get_attachment_url($spk_class['image']) ?>
                    <img src="<?php echo esc_url($src); ?>" alt="">
                  </div>
                  <div class="info">
                    <h2><a href="#"><?php echo esc_html($spk_class['name']); ?></a></h2>
                    <h3><a href="#"><?php echo esc_html($spk_class['desig']); ?></a></h3>
                  </div>
                  <div class="content">
                    <p class="description"><?php echo esc_html($spk_class['cont_text']); ?></p>
                    <div class="star-icon mt-3">
                    <?php 
						$testimonial_link=vc_param_group_parse_atts($spk_class['testimonial_icon_group']);

						foreach ($testimonial_link as $testimonial_icon): 
					?>	
                      <span><i class="<?php echo esc_attr($testimonial_icon['star_rate']); ?>"></i></span>
                     <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>

				<?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonial Section End -->
 

   
<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'fusion_testimonial_el' );
function fusion_testimonial_el() {
 vc_map( array(
  "name" => __( "testimonial Section", "fusion" ), 
  "base" => "fusion_testimonial",
  "category" => __( "fusion", "fusion"),
  "params" => array(
  		
		   	array(
			 'type'			=>'param_group',
			 'heading'		=>'testimonial Section Group',
			 'param_name'	=>'testimonial_group',
			 'group' 		=> 'testimonial Content',
			 'params'		=>array(
		  		array(
					  "type" 		=> "attach_image",
					  "heading" 	=> __( "Upload Testimonial Image", "fusion" ),
					  "param_name" 	=> "image",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Name of Tesitmonial", "fusion" ),
					  "param_name" 	=> "name",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Designation", "fusion" ),
					  "param_name" 	=> "desig",
					 ), 
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Testimonial Content", "fusion" ),
					  "param_name" 	=> "cont_text",
					 ),
		  		
		  		  array(
					 'type'=>'param_group',
					 'heading'=>'Tab text field Group',
					 'param_name'=>'testimonial_icon_group',
					 'group' 		=> 'testimonial Content',
					 'params'=>array(
				  		
				  		 array(
							  "type" => "textfield",
							  "heading" => __( "Choose Rate Of Stars", "fusion" ),
							  "param_name" => "star_rate",
							 ),

						 )	
					 )
				 )	
			 ), 
  		)	
	 )

 );
}






