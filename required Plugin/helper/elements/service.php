<?php 

add_shortcode('fusion_section_one','fusion_section_one_shortcode');
function fusion_section_one_shortcode($service){
	$result = shortcode_atts(array(
		'section_title'		 =>'',
		'service_first_group'	 =>'',
	),$service);
	extract($result);
	ob_start();
	?>

    <!-- Services Section Start -->
    <section id="services" class="section-padding">
      <div class="container">
        <div class="section-header text-center">
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Our Services</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          <!-- Services item -->
          <?php 
			$service=vc_param_group_parse_atts($service_first_group);

			foreach ($service as $spk_class): 
		?>
          <div class="col-md-6 col-lg-4 col-xs-12">
            <div class="services-item wow fadeInRight" data-wow-delay="0.3s">
              <div class="icon">
                <i class="<?php echo esc_html($spk_class['icon']); ?>"></i>
              </div>
              <div class="services-content">
                <h3><a href="#"><?php echo esc_html($spk_class['title']); ?></a></h3>
                <p><?php echo esc_html($spk_class['cont_text']); ?> </p>
              </div>
            </div>
          </div>

		<?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'fusion_section_one_el' );
function fusion_section_one_el() {
 vc_map( array(
  "name" => __( "Service Section", "fusion" ), 
  "base" => "fusion_section_one",
  "category" => __( "fusion", "fusion"),
  "params" => array(
  		 array(
			"type" => "textfield",
			"heading" => __( "Section Title", "fusion" ),
			"param_name" => "section_title",
		 ),

  		 array(
			 'type'			=>'param_group',
			 'heading'		=>'Service Section  Group',
			 'param_name'	=>'service_first_group',
			 'params'=>array(
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "write your Icon class", "fusion" ),
					  "param_name" 	=> "icon",
					 ), 
		  		  array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write down Title", "fusion" ),
					  "param_name" 	=> "title",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Write Down Content", "fusion" ),
					  "param_name" 	=> "cont_text",
					 ),
				 )	
			 ),

  		)
		
  	
 	)

  );
}






