<?php   
/**
 * Build Lite functions and definitions
 *
 * @package Build Lite
 */

global $content_width; 
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */ 

// Set the word limit of post content 
function build_lite_content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}	
$content = preg_replace('/\[.+\]/','', $content);
$content = apply_filters('build_lite_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}
 

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'build_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function build_lite_setup() {
	load_theme_textdomain( 'build-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 210,
		'flex-height' => true,
	) );
	add_theme_support( 'custom-header', array( 'header-text' => false ) );	
	add_image_size('homepage-thumb',570,380,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'build-lite' ),
		'footer' => __( 'Footer Menu', 'build-lite' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // build_lite_setup
add_action( 'after_setup_theme', 'build_lite_setup' );


function build_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'build-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'build-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
}
add_action( 'widgets_init', 'build_lite_widgets_init' );


function build_lite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$roboto_condensed = _x('on','roboto_condensed:on or off','build-lite');		
		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','build-lite');	
		
		if('off' !== $roboto_condensed ){
			$font_family = array();
			
			if('off' !== $roboto_condensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
					
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function build_lite_scripts() {
	wp_enqueue_style('build-lite-font', build_lite_font_url(), array());
	wp_enqueue_style( 'build-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'build-lite-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'build-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'build-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'build-lite-custom-js', get_template_directory_uri() . '/js/custom.js' );
	wp_enqueue_style( 'animate', get_template_directory_uri()."/css/animation.css" );
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'build_lite_scripts' );

function build_lite_ie_stylesheet(){
	global $wp_styles;
	
	/** Load our IE-only stylesheet for all versions of IE.
	*   <!--[if lt IE 9]> ... <![endif]-->
	*
	*  Note: It is also possible to just check and see if the $is_IE global in WordPress is set to true before
	*  calling the wp_enqueue_style() function. If you are trying to load a stylesheet for all browsers
	*  EXCEPT for IE, then you would HAVE to check the $is_IE global since WordPress doesn't have a way to
	*  properly handle non-IE conditional comments.
	*/
	wp_enqueue_style('build_lite_ie', get_template_directory_uri().'/css/ie.css', array('build_lite_style'));
	$wp_styles->add_data('build_lite_ie','conditional','IE');
	}
add_action('wp_enqueue_scripts','build_lite_ie_stylesheet');


define('SKT_URL','http://www.sktthemes.net','build-lite');
define('SKT_PRO_THEME_URL','http://www.sktthemes.net/shop/build-construction-wordpress-theme/','build-lite');
define('SKT_THEME_DOC','http://sktthemesdemo.net/documentation/build_documentation/','build-lite');
define('SKT_LIVE_DEMO','http://sktthemesdemo.net/construction/','build-lite');
define('SKT_THEMES','http://www.sktthemes.net/themes/','build-lite');
define('SKT_FREE_URL','http://www.sktthemes.net/product-category/free-wordpress-themes/','build-lite');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if ( ! function_exists( 'build_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function build_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function build_lite_themebytext(){
		return "<a href=".esc_url(SKT_FREE_URL)." target='_blank' rel='nofollow'>SKT Build Theme</a>";
}



// get slug by id
function build_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}