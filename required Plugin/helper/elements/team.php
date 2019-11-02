<?php 

add_shortcode('fusion_team','fusion_team_shortcode');
function fusion_team_shortcode($team){
	$result = shortcode_atts(array(
		'section_title'		 =>'',
		'team_group'	 =>'',
	),$team);
	extract($result);
	ob_start();
	?>

    <!-- Team Section Start -->
    <section id="team" class="section-padding bg-gray">
      <div class="container">
        <div class="section-header text-center">          
          <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s"><?php echo esc_html($section_title); ?></h2>
          <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
        </div>
        <div class="row">
         <?php 
			$team_section=vc_param_group_parse_atts($team_group);

			foreach ($team_section as $spk_class): 
		?>
          <div class="col-lg-6 col-md-12 col-xs-12">
            <!-- Team Item Starts -->
            <div class="team-item wow fadeInRight" data-wow-delay="0.<?php echo esc_attr($spk_class['detime']); ?>">
              <div class="team-img">
              	<?php $src = wp_get_attachment_url($spk_class['image']); ?>
                <img class="img-fluid" src="<?php echo $src; ?>" alt="">
              </div>
              <div class="contetn">
                <div class="info-text">
                  <h3><a href="#"><?php echo esc_html($spk_class['name']); ?></a></h3>
                  <p><?php echo esc_html($spk_class['desig']); ?></p>
                </div>
                <p><?php echo esc_html($spk_class['cont_text']); ?></p>
                <ul class="social-icons">
                <?php 
						$team_link=vc_param_group_parse_atts($spk_class['team_icon_group']);

						foreach ($team_link as $team_icon): 
					?>
                  <li><a href="<?php echo esc_attr($team_icon['icon_link']); ?>"><i class="<?php echo esc_attr($team_icon['link_class']); ?>" aria-hidden="true"></i></a></li>
                  <?php endforeach; ?>
                  
                </ul>
              </div>
            </div>
            <!-- Team Item Ends -->
          </div>
		<?php endforeach; ?>

        </div>
      </div>
    </section>
    <!-- Team Section End -->
   
<?php 
return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'fusion_team_el' );
function fusion_team_el() {
 vc_map( array(
  "name" => __( "team Section", "fusion" ), 
  "base" => "fusion_team",
  "category" => __( "fusion", "fusion"),
  "params" => array(
  		 array(
			"type" => "textfield",
			"heading" => __( "Section Title", "fusion" ),
			"param_name" => "section_title",
		 ),
		   		 array(
			 'type'			=>'param_group',
			 'heading'		=>'Team Section Group',
			 'param_name'	=>'team_group',
			 'group' 		=> 'team Content',
			 'params'		=>array(
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Delay Time", "meetup" ),
					  "param_name" 	=> "detime",
					 ),
		  		 array(
					  "type" 		=> "attach_image",
					  "heading" 	=> __( "Upload Team Member Image", "meetup" ),
					  "param_name" 	=> "image",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Name of Team Member", "meetup" ),
					  "param_name" 	=> "name",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Designation OF Team Member", "meetup" ),
					  "param_name" 	=> "desig",
					 ),
		  		 array(
					  "type" 		=> "textfield",
					  "heading" 	=> __( "Content of Team", "meetup" ),
					  "param_name" 	=> "cont_text",
					 ),
		  		  array(
					 'type'=>'param_group',
					 'heading'=>'Tab text field Group',
					 'param_name'=>'team_icon_group',
					 'group' 		=> 'team Content',
					 'params'=>array(
				  		
				  		 array(
							  "type" => "textfield",
							  "heading" => __( "Social Link", "meetup" ),
							  "param_name" => "icon_link",
							 ),
				  		 array(
							  "type" => "textfield",
							  "heading" => __( "Social Link Class", "meetup" ),
							  "param_name" => "link_class",
							 ),
						 )	
					 )
				 )	
			 ), 



  	)
		
  	
 )

 );
}






