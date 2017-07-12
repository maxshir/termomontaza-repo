<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Build Lite
 */
?>
<div id="footer-wrapper">
    	<div class="container">
             <div class="cols-4 widget-column-1">                  
              <?php if ( get_theme_mod( 'contact_title' ) !== "" ){  ?>
                <h5><?php echo esc_attr_e( get_theme_mod( 'contact_title', __('Contact Info','build-lite'))); ?></h5>              
			   <?php } ?>
                
               <?php if ( get_theme_mod('contact_add') !== "") { ?>
                <p><?php echo esc_attr_e( get_theme_mod( 'contact_add', __('100 King St, Melbourne PIC 4000, Australia','build-lite'))); ?></p>             
			   <?php } ?>
                
                
              <div class="phone-no">	
              <?php if ( get_theme_mod('contact_no') !== "") { ?>
                <p><?php echo esc_attr_e( get_theme_mod( 'contact_no', __('Phone:+123 456 7890','build-lite'))); ?></p>              
			   <?php } ?>  
              
                         
               <?php if( get_theme_mod('contact_mail') !== ""){ ?>
              <?php esc_attr_e('Email: ', 'build-lite'); ?><a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail','contact@company.com')); ?>"><?php echo get_theme_mod('contact_mail','contact@company.com'); ?></a>			
			  <?php } ?>  
              
                     
           </div>
            </div><!--end .widget-column-1-->                  
			         
             
             <div class="cols-4 widget-column-2"> 
              <?php if ( get_theme_mod('menu_title') !== "") { ?>
                <h5><?php echo esc_attr_e( get_theme_mod( 'menu_title', __('Main Navigation','build-lite'))); ?></h5>            
			  <?php } ?>
               
               
                <div class="menu">
                  <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                </div>                        	
                       	
              </div><!--end .widget-column-2-->     
                      
               <div class="cols-4 widget-column-3">                   
               <?php if ( get_theme_mod('about_title') !== "") { ?>
                <h5><?php echo esc_attr_e( get_theme_mod( 'about_title', __('About Us','build-lite'))); ?></h5>             
			   <?php } ?>
               
                <?php if ( get_theme_mod('about_description') !== "") { ?>
                <p><?php echo esc_attr_e( get_theme_mod( 'about_description', __('Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue.','build-lite'))); ?></p>
			   <?php } ?>    	
				
                </div><!--end .widget-column-3-->
                
                <div class="cols-4 widget-column-4">                
                <?php if ( get_theme_mod('social_title') !== "") { ?>
                <h5><?php echo esc_attr_e( get_theme_mod( 'social_title', __('Follow Us','build-lite'))); ?></h5>              
			   <?php } ?> 
                             	
					<div class="clear"></div>                
                  <div class="social-icons">
					<?php if ( '' !== get_theme_mod( 'fb_link' ) ) { ?>
                    <a title="facebook" class="fb" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>"></a>
                    <?php } ?>
                    <?php if ( '' !== get_theme_mod( 'twitt_link' ) ) { ?>
                    <a title="twitter" class="tw" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>"></a>
                    <?php } ?>
                    <?php if ( '' !== get_theme_mod('gplus_link') ) { ?>
                    <a title="google-plus" class="gp" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>"></a>
                    <?php }?>
                    <?php if ( '' !== get_theme_mod('linked_link') ) { ?>
                    <a title="linkedin" class="in" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
                    <?php } ?>
 
                  </div>  
              
                   
                </div><!--end .widget-column-4-->
                
                
            <div class="clear"></div>
        </div><!--end .container-->        
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt"><?php echo '&copy; '.date('Y').'';?>&nbsp;<?php bloginfo('name');?>&nbsp;<?php esc_attr_e('All Rights Reserved.','build-lite');?></div>
                <div class="design-by"><?php echo build_lite_themebytext(); ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>