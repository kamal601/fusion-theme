<?php 

add_shortcode('main_banner','main_banner_shortcode');
function main_banner_shortcode($banner){
	$result = shortcode_atts(array(
		'banner_image'	 =>'',
		'banner_title' 	 =>'',
		'banner_text' 	 =>'',
		'dbtn' 			 =>'',
		'btn'			 =>'',
		'btn_link' 		 =>'',
		'lbtn_link' 		 =>'',
	),$banner);
	extract($result);
	ob_start();
	?>


	      <!-- Hero Area Start -->

      <div id="hero-area" class="hero-area-bg">
        <div class="container">      
          <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
              <div class="contents">
                <h2 class="head-title"><?php echo esc_html($banner_title);?></h2>
                <p><?php echo esc_html($banner_text);?></p>
                <div class="header-button">
                  <a href="<?php echo esc_html($btn);?>" class="btn btn-common"><?php echo esc_html($btn);?></i></a>
                  <a href="<?php echo esc_html($btn);?>" class="btn btn-border video-popup"><?php echo esc_html($btn);?></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
              <div class="intro-img">
              	<?php $src_banner_img = wp_get_attachment_url($banner_image); ?>
                <img class="img-fluid" src="<?php echo esc_url($src_banner_img);?>" alt="">
              </div>            
            </div>
          </div> 
        </div> 
      </div>
      <!-- Hero Area End -->
        </header>	
	
	<?php 
	return ob_get_clean(); 
} 

add_action( 'vc_before_init', 'main_banner_el' );
function main_banner_el() {
	vc_map( array(
		"name" => __( "Main banner", "fusion" ), 
		"base" => "main_banner",
		"category" => __( "fusion", "fusion"),
		"params" => array(

			array(
				"type" => "attach_image",
				"heading" => __( "Upload banner image", "fusion" ),
				"param_name" => "banner_image",
			), 
			array(
				"type" => "textfield",
				"heading" => __( "Give Title", "fusion" ),
				"param_name" => "banner_title",
			), 
			array(
				"type" => "textfield",
				"heading" => __( "Sub Title", "fusion" ),
				"param_name" => "banner_text",
			), 
			array(
				"type" => "textfield",
				"heading" => __( "Download Button Name", "fusion" ),
				"param_name" => "dbtn",
			),  
			array(
				"type" => "textfield",
				"heading" => __( "Learn More Button", "fusion" ),
				"param_name" => "btn",
			),  
			array(
				"type" => "textfield",
				"heading" => __( "Download Button link", "fusion" ),
				"param_name" => "btn_link",
			), 
			array(
				"type" => "textfield",
				"heading" => __( "Learn MoreButton link", "fusion" ),
				"param_name" => "lbtn_link",
			), 

		),

	) );
}
