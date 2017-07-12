<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Build Lite
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="headertop">
  <div class="container">
    <div class="left">
		<?php if( get_theme_mod('contact_mail') !== ""){ ?>
          <a href="mailto:<?php echo sanitize_email(get_theme_mod('contact_mail','contact@company.com')); ?>"><?php echo get_theme_mod('contact_mail','contact@company.com'); ?></a>			
		<?php } ?>  
        
        <?php if ( get_theme_mod('contact_no') !== "") { ?>
          <span><?php echo esc_attr_e( get_theme_mod( 'contact_no', __('+123 456 7890','build-lite'))); ?></span>        
		<?php } ?> 
        
    </div>
    <div class="right">
		  <?php if(get_theme_mod('enquire_link', '#')) { ?>
          <a href="<?php echo esc_url(get_theme_mod('enquire_link',true)); ?>">
          <?php esc_attr_e('Enquire Now!','build-lite'); ?>
          </a>
          <?php } ?>
    </div>
    <div class="clear"></div>
  </div> <!-- .container -->
</div><!-- .headertop -->
<div class="header">
  <div class="container">
    <div class="logo">
      <?php build_lite_the_custom_logo(); ?>
      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php bloginfo('name'); ?>
        </a></h1>
      <p>
        <?php bloginfo('description'); ?>
      </p>
    </div><!-- logo -->
    <div class="toggle"> <a class="toggleMenu" href="#">
      <?php esc_attr_e('Menu','build-lite'); ?>
      </a> </div> <!-- toggle -->
    <div class="sitenav">
      <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
    </div>
    <!-- site-nav -->
    <div class="clear"></div>
  </div>
  <!-- container -->
</div><!--.header -->
<?php if ( is_front_page() && ! is_home() ) { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
     <?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
		<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
        $img_arr[] = $image;
        $id_arr[] = $post->ID;
        endwhile;
  	  }
    }
?>
<?php if(!empty($id_arr)){ ?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
      <?php 
	$i=1;
	foreach($img_arr as $url){ ?>
      <img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" />
      <?php $i++; }  ?>
    </div>
		<?php 
        $i=1;
        foreach($id_arr as $id){ 
        $title = get_the_title( $id ); 
        $post = get_post($id); 
        $content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 100)); 
        ?>
    <div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo $title; ?></h2>
        <p><?php echo $content; ?></p>
        <div class="clear"></div>
        <div class="slide_more"><a href="<?php the_permalink(); ?>">
          <?php esc_attr_e('Read More', 'build-lite');?>
          </a></div>
      </div>
    </div>
    <?php $i++; } ?>
  </div>
  <div class="clear"></div>
</section>
<?php } else { ?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" /> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" /> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" /> </div>
    <div id="slidecaption1" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('We will Build you an Outstanding House!', 'build-lite');?>
        </h2>
      </div>
    </div>
    <div id="slidecaption2" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('Quality Construction Company', 'build-lite'); ?>
        </h2>
      </div>
    </div>
    <div id="slidecaption3" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('Top Level Building Construction', 'build-lite');?>
        </h2>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</section>
<!-- Slider Section -->
<?php } } ?>