<?php
/**
 * SKT Construction Theme Customizer
 *
 * @package SKT Construction
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_construction_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class skt_construction_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	class WP_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#efc62c',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-construction'),
 			'description' => __( 'More color options in PRO Version', 'skt-construction'),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
// Home First Section 	
	$wp_customize->add_section('section_first',array(
		'title'	=> __('Homepage First Section','skt-construction'),
		'description'	=> __('Select Page from the dropdown for first section','skt-construction'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_construction_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-setting1',array('type' => 'dropdown-pages',
			'label' => __('','skt-construction'),
			'section' => 'section_first',
	));
	
// Home Second Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Second Section','skt-construction'),
		'description'	=> __('Select Pages from the dropdown for second section','skt-construction'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_construction_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'label' => __('','skt-construction'),
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_construction_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'label' => __('','skt-construction'),
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'skt_construction_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'label' => __('','skt-construction'),
			'section' => 'section_second',
	));
	
	// Slider Section		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'skt-construction'),
			'description' => sprintf( __( 'Featured Image Dimensions : ( 1400x571 )<br/> More slider settings available in PRO Version. <br /> How to set featured image %s', 'skt-construction' ), sprintf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( '"'.SKT_THEME_FEATURED_SET_VIDEO_URL.'"' ), __( 'Click Here ?', 'skt-construction' )
						)
					),
		'priority'	=> null
	)); 		 
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_construction_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array('type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','skt-construction'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_construction_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array('type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','skt-construction'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'skt_construction_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array('type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','skt-construction'),
			'section'	=> 'slider_section'
	));	// Slider Section
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-construction'),
	 		'description' => __( 'More social icon available in PRO Version.', 'skt-construction' ),				
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-construction'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-construction'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-construction'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-construction'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	
	// Header Area
	$wp_customize->add_section('heder_sec',array(
			'title'	=> __('Header Area','skt-construction'),
	 		'description' => '',				
			'priority'		=> null
	));

	$wp_customize->add_setting('head_number',array(
			'default'	=> '0789 256 321',
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('head_number',array(
			'label'	=> __('Add header phone number here','skt-construction'),
			'section'	=> 'heder_sec',
			'setting'	=> 'head_number'
	));	
	
	$wp_customize->add_setting('head_email',array(
			'default'	=> 'info@buildpress.com',
			'sanitize_callback'	=> 'sanitize_email'	
	));
	$wp_customize->add_control('head_email',array(
			'label'	=> __('Add header email here','skt-construction'),
			'section'	=> 'heder_sec',
			'setting'	=> 'head_email'
	));	
	
	$wp_customize->add_setting('head_address',array(
			'default'	=> 'Street 238, Perth,',
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('head_address',array(
			'label'	=> __('Add header address here','skt-construction'),
			'section'	=> 'heder_sec',
			'setting'	=> 'head_address'
	));	
	
	$wp_customize->add_setting('head_citycountry',array(
			'default'	=> 'Western Australia',
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('head_citycountry',array(
			'label'	=> __('Add header city/country here','skt-construction'),
			'section'	=> 'heder_sec',
			'setting'	=> 'head_citycountry'
	));					
	
	// Header Area
	
	
	
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','skt-construction'),
			'priority'	=> null,
	 		'description' => '' 
	));
	$wp_customize->add_setting('skt_construction_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_construction_Info( $wp_customize, 'cred_section', array(
		'label'	=> __('','skt-construction'),
        'section' => 'footer_area',
        'settings' => 'skt_construction_options[credit-info]'
        ) )
    );
	
	
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('About Construction','skt-construction'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add title for about construction','skt-construction'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description',array(
			'default'	=> __('Consectetur, adipisci velit, sed quiaony on numquam eius modi tempora incidunt, ut laboret dolore agnam aliquam quaeratine voluptatem. ut enim ad minima veniamting suscipit suscipit lab velit, sed quiaony on numquam eius.','skt-construction'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize,'about_description', array(	
			'label'	=> __('Add description for our philosophy','skt-construction'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_description'
	)) );
	
	$wp_customize->add_setting('recentpost_title',array(
			'default'	=> __('Recent Posts','skt-construction'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('recentpost_title',array(
			'label'	=> __('Add title for recent posts','skt-construction'),
			'section'	=> 'footer_area',
			'setting'	=> 'recentpost_title'
	));
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> __('Contact Info','skt-construction'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add Footer Contact Info','skt-construction'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));		
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('100 King St, Melbourne PIC 4000, Australia','skt-construction'),
			'sanitize_callback'	=> 'wp_kses_post'
	));
	
	$wp_customize->add_control(	new WP_Customize_Textarea_Control( $wp_customize, 'contact_add', array(
			'label'	=> __('Add contact address here','skt-construction'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_add'
			)
		)
	);
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('Phone: +123 456 7890','skt-construction'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','skt-construction'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','skt-construction'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_mail'
	));	
	
}
add_action( 'customize_register', 'skt_construction_customize_register' );

//Integer
function skt_construction_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function skt_construction_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,
					.recent-post h6:hover,									
					.services-wrap .one_half h4 span,
					.copyright-txt span,					
					a.more-button span,
					.cols-4 span,
					.header .header-inner .logo h1,
					.services-wrap .listpages a:hover,
					.services-wrap .listpages h4:hover
					{ color:<?php echo esc_html(get_theme_mod('color_scheme','#efc62c')); ?>;}
					 
					.social-icons a:hover, 
					.pagination ul li .current, 
					.pagination ul li a:hover, 
					#commentform input#submit:hover,
					.ReadMore,
					.ReadMore:hover,
					.nivo-controlNav a.active,
					h3.widget-title,
					.header .header-inner .nav ul li a:hover, 
					.header .header-inner .nav ul li.current_page_item a,
					.MoreLink:hover,
					.wpcf7 input[type="submit"]
					{ background-color:<?php echo esc_html(get_theme_mod('color_scheme','#efc62c')); ?>;}
					
					.ReadMore, 
					.MoreLink,
					.header .header-inner .nav, #wrapfirst h1
					{ border-color:<?php echo esc_html(get_theme_mod('color_scheme','#efc62c')); ?>;}
					
			</style>  
<?php  
} 
add_action('wp_head','skt_construction_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_construction_customize_preview_js() {
	wp_enqueue_script( 'skt_construction_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_construction_customize_preview_js' );


function skt_construction_custom_customize_enqueue() {
	wp_enqueue_script( 'skt-construction-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'skt_construction_custom_customize_enqueue' );

function skt_construction_customizer_styles() {
    wp_enqueue_style( 'skt-construction-customizer-css', trailingslashit( get_template_directory_uri() ).'/css/customizer.css', null );
}
add_action( 'customize_controls_print_styles', 'skt_construction_customizer_styles', 99 );