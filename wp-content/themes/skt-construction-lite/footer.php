<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Construction
 */
?>
<div id="footer-wrapper">
    	<div class="container">
        
            <div class="cols-3 widget-column-1">  
            
             <div class="footertitle"><?php echo get_theme_mod('about_title',__('About Construction','skt-construction')); ?></div>            	
				<p><?php echo get_theme_mod('about_description',__('Consectetur, adipisci velit, sed quiaony on numquam eius modi tempora incidunt, ut laboret dolore agnam aliquam quaeratine voluptatem. ut enim ad minima veniamting suscipit lab velit, sed quiaony on numquam eius.','skt-construction')); ?></p>           	
             
            </div><!--end .col-3-->
			         
             
             <div class="cols-3 widget-column-2">  
                <div class="footertitle"><?php echo get_theme_mod('recentpost_title',__('Recent Posts','skt-construction')); ?></div>            	
				<?php $args = array( 'posts_per_page' => 2, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
                    query_posts( $args ); ?>
                    
                  <?php while ( have_posts() ) :  the_post(); ?>
                        <div class="recent-post">
                         <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                         <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>                         
                         <?php echo skt_construction_content(8); ?>                         
                        </div>
                 <?php endwhile; ?>
                          	
              </div><!--end .col-3-->
                      
               <div class="cols-3 widget-column-3">
               
                <div class="footertitle"><?php echo get_theme_mod('contact_title',__('Contact Info','skt-construction')); ?></div> 
                <p><?php echo get_theme_mod('contact_add',__('100 King St, Melbourne PIC 4000,<br /> Australia','skt-construction')); ?></p>
              <div class="phone-no"><?php echo get_theme_mod('contact_no',__('<strong>Phone:</strong> +123 456 7890','skt-construction')); ?> <br  />
             
           <strong> Email:</strong> <a href="mailto:<?php echo get_theme_mod('contact_mail','contact@company.com'); ?>"><?php echo get_theme_mod('contact_mail','contact@company.com'); ?></a></div>
                    
                </div><!--end .col-3-->
                
            <div class="clear"></div>
         </div><!--end .container-->
              
            
       <div class="copyright-wrapper">
        	<div class="container" style="text-align:center;">            	
                <p><?php echo skt_construction_themebytext(); ?></p>
                 <div class="clear"></div>
            </div>
        </div>
      
    </div><!--end .footer-->
<?php wp_footer(); ?>

</body>
</html>