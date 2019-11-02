<?php 

add_shortcode('fusion_pricing','fusion_pricing_shortcode');
function fusion_pricing_shortcode($pricing){
	$result = shortcode_atts(array(
		'section_title'		 =>'',
		'pricing_group'	 =>'',
	),$pricing);
	extract($result);
	ob_start();
	?>
  <!-- Pricing section Start --> 
    <section id="pricing" class="section-padding">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s"><?php echo esc_html($section_title); ?></h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
		<?php 
			$pricing_section=vc_param_group_parse_atts($pricing_group);

			foreach ($pricing_section as $spk_class): 
		?>

          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="table wow fadeInLeft" id="<?php echo esc_attr($spk_class['active']); ?>" data-wow-delay="1.2s">
              <div class="icon-box">
                <i class="<?php echo esc_attr($spk_class['icon']); ?>"></i>
              </div>
              <div class="pricing-header">
                <p class="price-value">$<?php echo esc_html($spk_class['price']); ?><span> /<?php echo esc_html_e('mo','fusion') ?></span></p>
              </div>
              <div class="title">
                <h3><?php echo esc_html($spk_class['package']); ?></h3>
              </div>
              <ul class="description">
 				<?php 
					$pricing_link=vc_param_group_parse_atts($spk_class['pricing_icon_group']);

					foreach ($pricing_link as $pricing_icon): 
				?>
                <li><?php echo esc_attr($pricing_icon['text']); ?></li>
				<?php endforeach; ?>
                
              </ul>
              <button class="btn btn-common"><?php echo esc_html($spk_class['btn']); ?></button>
            </div> 
          </div>
		<?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- Pricing Table Section End -->

   
<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'fusion_pricing_el' );
function fusion_pricing_el() {
 vc_map( array(
  "name" => __( "pricing Section", "fusion" ), 
  "base" => "fusion_pricing",
  "category" => __( "fusion", "fusion"),
  "params" => array(
  		 array(
			"type" => "textfield",
			"heading" => __( "Section Title", "fusion" ),
			"param_name" => "section_title",
		 ),
		   		 array(
			 'type'			=>'param_group',
			 'heading'		=>'pricing Section Group',
			 'param_name'	=>'pricing_group',
			 'group' 		=> 'pricing Content',
			 'params'		=>array(
		  		array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Give Icon Class Name", "fusion" ),
					  "param_name" 	=> "icon",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Price of Package", "fusion" ),
					  "param_name" 	=> "price",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Name of Package", "fusion" ),
					  "param_name" 	=> "package",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Active tab", "fusion" ),
					  "param_name" 	=> "active",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Name of Button", "fusion" ),
					  "param_name" 	=> "btn",
					 ),
		  		  array(
					 'type'=>'param_group',
					 'heading'=>'Tab text field Group',
					 'param_name'=>'pricing_icon_group',
					 'group' 		=> 'pricing Content',
					 'params'=>array(
				  		
				  		 array(
							  "type" => "textfield",
							  "heading" => __( "Text related to Package", "fusion" ),
							  "param_name" => "text",
							 ),

						 )	
					 )
				 )	
			 ), 
  		)	
	 )

 );
}






