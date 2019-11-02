<?php 

add_shortcode('fusion_title','fusion_title_shortcode');
function fusion_title_shortcode($title){
	$result = shortcode_atts(array(
		'section_title'		 =>'',
		'shotcode'		 =>'',
		'height'		 =>'',
		'width'		 =>'',
		'location'	 =>'',
	),$title);
	extract($result);
	ob_start();
	?>
 <!-- title Section Start -->
  
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s"><?php echo esc_html($section_title); ?></h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>

      </div> 

    <!-- title Section End -->

   
<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'fusion_title_el' );
function fusion_title_el() {
 vc_map( array(
  "name" => __( "title Section", "fusion" ), 
  "base" => "fusion_title",
  "category" => __( "fusion", "fusion"),
  "params" => array(
  		
		  		array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Title of The title page", "fusion" ),
					  "param_name" 	=> "section_title",
					 ),
		  		
		  		

				 ),
			 )
  		

 );
}






