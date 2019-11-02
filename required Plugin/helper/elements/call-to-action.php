<?php 

add_shortcode('fusion_call_to_action','fusion_call_to_action_shortcode');
function fusion_call_to_action_shortcode($call_to_action){
	$result = shortcode_atts(array(
		'title'		 =>'',
		'text'		 =>'',
		'btn'	 	 =>'',
		'btn_link'	 =>'',
	),$call_to_action);
	extract($result);
	ob_start();
	?>
<!-- Call To Action Section Start -->
    <section id="cta" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-xs-12 wow fadeInLeft" data-wow-delay="0.3s">           
            <div class="cta-text">
              <h4><?php echo esc_html($title); ?></h4>
              <p><?php echo esc_html($text); ?> </p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-xs-12 text-right wow fadeInRight" data-wow-delay="0.3s">
            </br><a href="<?php echo esc_html($btn_link); ?>" class="btn btn-common"><?php echo esc_html($btn); ?></a>
          </div>
        </div>
      </div>
    </section>
    <!-- Call To Action Section Start -->
 

   
<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'fusion_call_to_action_el' );
function fusion_call_to_action_el() {
 vc_map( array(
  "name" => __( "call_to_action Section", "fusion" ), 
  "base" => "fusion_call_to_action",
  "category" => __( "fusion", "fusion"),
  "params" => array(
  		
		  		array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Titel of Section", "fusion" ),
					  "param_name" 	=> "title",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Text of the Section", "fusion" ),
					  "param_name" 	=> "text",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Register Now Button", "fusion" ),
					  "param_name" 	=> "btn",
					 ), 
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Button Link", "fusion" ),
					  "param_name" 	=> "btn_link",
					 ),

				 
			 ), 
  			
	 )

 );
}






