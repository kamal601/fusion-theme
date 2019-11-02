<?php 

add_shortcode('feature','feature_shortcode');
function feature_shortcode($feature){
	$result = shortcode_atts(array(
		'section_title'		 	 =>'',
		'image'					 =>'',
		'detime'				 =>'',
		'feature_first_group'	 =>'',
		'feature_second_group'	 =>'',
	),$feature);
	extract($result);
	ob_start();
?>

   <!-- Features Section Start -->
    <section id="features" class="section-padding">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Awesome Features</h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="content-left">
          <?php 
			$feature=vc_param_group_parse_atts($feature_first_group);

			foreach ($feature as $spk_class): 
			?>
              <div class="box-item wow fadeInLeft" data-wow-delay="0.<?php echo esc_attr($spk_class['detime']); ?>">
                <span class="icon">
                  <i class="<?php echo esc_attr($spk_class['icon']); ?>"></i>
                </span>
                <div class="text">
                  <h4><?php echo esc_html($spk_class['title']); ?></h4>
                  <p><?php echo esc_html($spk_class['cont_text']); ?></p>
                </div>
              </div>
			<?php endforeach; ?>

            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="show-box wow fadeInUp" data-wow-delay="0.3s">
            	<?php $src = wp_get_attachment_url($image) ?>
              <img src="<?php echo esc_url($src); ?>" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
            <div class="content-right">
		<?php 
			$feature_right=vc_param_group_parse_atts($feature_second_group);

			foreach ($feature_right as $spk_class): 
			?>
              <div class="box-item wow fadeInRight" data-wow-delay="0.<?php echo esc_html($spk_class['detime']); ?>">
                <span class="icon">
                  <i class="<?php echo esc_html($spk_class['icon']); ?>"></i>
                </span>
                <div class="text">
                  <h4><?php echo esc_html($spk_class['title']); ?></h4>
                  <p><?php echo esc_html($spk_class['cont_text']); ?></p>
                </div>
              </div>
				<?php endforeach; ?>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Features Section End -->  


<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'feature_el' );
function feature_el() {
 vc_map( array(
  "name" => __( "feature Section", "fusion" ), 
  "base" => "feature",
  "category" => __( "fusion", "fusion"),
  "params" => array(
  		 array(
			"type" => "textfield",
			"heading" => __( "Section Title", "fusion" ),
			"param_name" => "section_title",
		 ),
		 array(
			"type" => "attach_image",
			"heading" => __( "Select Your Image", "fusion" ),
			"param_name" => "image",
			),

  		 array(
			 'type'			=>'param_group',
			 'heading'		=>'feature Section  Group',
			 'param_name'	=>'feature_first_group',
			 'params'=>array(
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "write delay time here", "fusion" ),
					  "param_name" 	=> "detime",
					 ), 
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

  		 array(
			 'type'			=>'param_group',
			 'heading'		=>'feature Section  Group',
			 'param_name'	=>'feature_second_group',
			 'group'		=>'Feature Right Content',
			 'params'=>array(
			 	 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "write delay time here", "fusion" ),
					  "param_name" 	=> "detime",
					 ), 
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






