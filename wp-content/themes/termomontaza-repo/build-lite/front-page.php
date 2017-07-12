<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Build Lite
 */
get_header(); ?>
<?php if ( is_front_page() && ! is_home() ) { ?>
<section id="wrapsecond">
  <div class="container">
    <div class="services-wrap">
      <?php for($p=1; $p<4; $p++) { ?>
      <?php if( get_theme_mod('page-column'.$p,false)) { ?>
      <?php $queryxxx = new WP_query('page_id='.get_theme_mod('page-column'.$p,true)); ?>
      <?php while( $queryxxx->have_posts() ) : $queryxxx->the_post(); ?>
      <div class="one_third <?php if($p % 3 == 0) { echo "last_column"; } ?>"> <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( array(85,85, true) );?>
        <h4>
          <?php the_title(); ?>
        </h4>
        </a> 
		<?php echo build_lite_content(20); ?> <a class="MoreLink" href="<?php the_permalink(); ?>">
        <?php esc_attr_e('Read More','build-lite'); ?>
        </a> </div>
      <?php endwhile;
                                    wp_reset_query(); ?>
      <?php } else { ?>
      <div class="one_third <?php if($p % 3 == 0) { echo "last_column"; } ?>"> <a href="#"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/services-icon<?php echo $p; ?>.png" alt="" />
        <h4>
          <?php esc_attr_e('Construction Consulation','build-lite'); ?>
          <?php echo $p; ?></h4>
        </a>
        <p>
          <?php esc_attr_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque augue eros, sit amet, consectetur adipiscing posuere elit.','build-lite'); ?>
        </p>
        <a class="MoreLink" href="#">
        <?php esc_attr_e('Read More','build-lite'); ?>
        </a> </div>
      <?php }} ?>
      <div class="clear"></div>
    </div>
    <!-- services-wrap-->
    <div class="clear"></div>
  </div>
  <!-- container -->
</section>
<div class="clear"></div>
<section id="wrapfirst">
  <div class="container">
    <div class="welcomewrap">
      <?php if( get_theme_mod('page-setting1')) { ?>
      <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
      <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?>
      <?php the_post_thumbnail('homepage-thumb');?>
      <h1>
        <?php the_title(); ?>
      </h1>
      <?php the_content(); ?>
      <div class="clear"></div>
      <?php endwhile; } else { ?>
      <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/welcomeimage.jpg" alt=""/>
      <h2>
        <?php esc_attr_e('Welcome to Build','build-lite'); ?>
      </h2>
      <p>
        <?php esc_attr_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sodales suscipit tellus, ut tristique neque suscipit a. Mauris tristique lacus quis leo imperdiet sed pulvinar dui fermentum. Aenean sit amet diam non tortor sagittis varius. Aenean at lorem nulla, sit amet interdum nibh. Mauris sit amet dictum turpis. Sed ut sapien magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br /> <br />

Aliquam gravida odio nec dui ornare tempus elementum lectus rhoncus. Suspendisse lobortis pellentesque orci, in sodales nisi pretium sit amet. Aenean vulputate, odio non euismod eleifend, magna nisl elementum lorem, ac venenatis nunc erat et metus. Nulla volutpat, urna eu congue venenatis, tellus odio hendrerit nibh, in commodo velit leo a ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae aenean sit amet diam non tortor sagittis varius. Aenean at lorem nulla, sit amet interdum nibh. Mauris sit amet dictum turpis. ','build-lite'); ?>
      </p>
      <?php } ?>
    </div> <!-- welcomewrap-->
    <div class="clear"></div>
  </div>
  <!-- container -->
</section>
<div class="clear"></div>
<?php }?>
<div class="container">
     <div class="page_content">
        <section class="site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
                        the_posts_pagination();
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </section>
      
        <?php get_sidebar();?>     
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>