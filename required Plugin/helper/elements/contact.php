<?php 

add_shortcode('fusion_contact','fusion_contact_shortcode');
function fusion_contact_shortcode($contact){
	$result = shortcode_atts(array(
		'section_title'		 =>'',
		'shotcode'		 =>'',
		'height'		 =>'',
		'width'		 =>'',
		'location'	 =>'',
	),$contact);
	extract($result);
	ob_start();
	?>
 <!-- Contact Section Start -->
    <div id="contact" class="">    
      <div class="container">
        <div class="row contact-form-area wow fadeInUp" data-wow-delay="0.3s">   
          
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="map">
               <iframe width="<?php echo $width; ?>" height="<?php echo $height; ?>" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $location; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
          </div>
        </div>
      </div> 
    </div>
    <!-- Contact Section End -->

   
<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'fusion_contact_el' );
function fusion_contact_el() {
 vc_map( array(
  "name" => __( "contact Section", "fusion" ), 
  "base" => "fusion_contact",
  "category" => __( "fusion", "fusion"),
  "params" => array(
  		
		  		
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Height of Map", "fusion" ),
					  "param_name" 	=> "height",
					  "group" 		=> "map",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "width Of Map", "fusion" ),
					  "param_name" 	=> "width",
					   "group" 		=> "map",
					 ), 
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Location Name of Map", "fusion" ),
					  "param_name" 	=> "location",
					   "group" 		=> "map",
					 ),
		  		

				 ),
			 )
  		

 );
}






