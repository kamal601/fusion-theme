<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fusion
 */
global $fusion;
?>

    <!-- Footer Section Start -->
    <footer id="footer" class="footer-area section-padding">
      <div class="container">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="footer-logo"><img src=" <?php echo $fusion['logo']['url']; ?> " alt=""></h3>
                <div class="textwidget">
                  <?php if(is_active_sidebar("footer-1")){
                    dynamic_sidebar('footer-1');
                  } ?>
                </div>
                <div class="social-icon">
                  <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
                  <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
                  <a class="instagram" href="#"><i class="lni-instagram-filled"></i></a>
                  <a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
               <?php if(is_active_sidebar("footer-2")){
                    dynamic_sidebar('footer-2');
                  } ?>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
              <?php if(is_active_sidebar("footer-3")){
                    dynamic_sidebar('footer-3');
                  } ?>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
             <?php if(is_active_sidebar("footer-4")){
                    dynamic_sidebar('footer-4');
                  } ?>
            </div>
          </div>
        </div>  
      </div> 
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="copyright-content">
                <p><?php echo $fusion['year']; ?> <a rel="nofollow" href="<?php echo $fusion['comlinkurl']; ?>"><?php echo $fusion['comlink']; ?></a> <?php echo $fusion['cprreserved']; ?></p>
               
              </div>
            </div>
          </div>
        </div>
      </div>   
    </footer> 
    <!-- Footer Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
    	<i class="lni-arrow-up"></i>
    </a>
    
    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->
  
  <?php wp_footer(); ?>    
  </body>
</html>
