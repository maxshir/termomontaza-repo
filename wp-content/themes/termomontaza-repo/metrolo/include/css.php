<?php
/**
 * Add custom css to frontend.
 *
 * @package    Metrolo
 */

// Add action at 5 for adding css rules (premium hooks in at 6-9).
// Child themes can hook in at priority 10.
add_action( 'hybridextend_dynamic_cssrules', 'hoot_dynamic_cssrules', 5 );

/**
 * Custom CSS built from user theme options
 * For proper sanitization, always use functions from hoot/includes/sanitization.php
 * and hoot/customizer/sanitization.php
 *
 * @since 1.0
 * @access public
 */
function hoot_dynamic_cssrules() {

	/*** Settings Values ***/

	/* Lite Settings */

	$settings = array();
	$settings['grid_width']           = intval( hoot_get_mod( 'site_width', 1260 ) ) . 'px';
	$settings['accent_color']         = hoot_get_mod( 'accent_color' );
	$settings['accent_font']          = hoot_get_mod( 'accent_font' );
	$settings['contrast_color']       = hoot_get_mod( 'contrast_color' );
	$settings['contrast_color_light'] = hybridext_color_increase( $settings['contrast_color'], 6, 6 );
	$settings['contrast_color_lighter']= hybridext_color_increase( $settings['contrast_color'], 14, 14 );
	$settings['contrast_font']        = hoot_get_mod( 'contrast_font' );
	$settings['contrast_font_light']  = hybridext_color_increase( $settings['contrast_font'], 33.5, 40 ); // Ideally 40
	$settings['logo_fontface']        = hoot_get_mod( 'logo_fontface' );
	$settings['heading_transform']    = hoot_get_mod( 'heading_transform' );
	$settings['site_layout']          = hoot_get_mod( 'site_layout' );
	$settings['box_background_color'] = hoot_get_mod( 'box_background_color' );
	$settings['content_bg_color']     = ( $settings['site_layout'] == 'boxed' ) ?
	                                        $settings['box_background_color'] :
	                                        hoot_get_mod( 'background-color' );
	$settings['site_title_icon_size'] = hoot_get_mod( 'site_title_icon_size' );
	$settings['site_title_icon']      = hoot_get_mod( 'site_title_icon' );
	$settings['logo_image_width']     = hoot_get_mod( 'logo_image_width' );
	$settings['logo_image_width']     = ( intval( $settings['logo_image_width'] ) ) ?
	                                        intval( $settings['logo_image_width'] ) . 'px' :
	                                        '150px';
	$settings['logo']                 = hoot_get_mod( 'logo' );
	$settings['logo_custom']          = apply_filters( 'hoot_logo_custom_text', hybridextend_sortlist( hoot_get_mod( 'logo_custom' ) ) );

	// Troubleshooting
	// echo '<!-- '; print_r($settings); echo ' -->';

	extract( apply_filters( 'hoot_custom_css_settings', $settings, 'lite' ) );

	/*** Add Dynamic CSS ***/

	/* Hoot Grid */

	hybridextend_add_css_rule( array(
						'selector'  => '.grid',
						'property'  => 'max-width',
						'value'     => $grid_width,
						'idtag'     => 'grid_width',
					) );

	/* Base Typography and HTML */

	hybridextend_add_css_rule( array(
						'selector'  => 'h1, h2, h3, h4, h5, h6',
						'property'  => 'text-transform',
						'value'     => $heading_transform,
						'idtag'     => 'heading_transform',
					) ); // Overridden in premium

	hybridextend_add_css_rule( array(
						'selector'  => 'a',
						'property'  => 'color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) ); // Overridden in premium

	hybridextend_add_css_rule( array(
						'selector'  => '.accent-typo',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.invert-typo',
						'property'  => 'color',
						'value'     => $content_bg_color,
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.contrast-typo',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $contrast_color, 'contrast_color' ),
							'color'      => array( $contrast_font, 'contrast_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.enforce-typo',
						'property'  => 'background',
						'value'     => $content_bg_color,
					) );

	hybridextend_add_css_rule( array(
						'selector'  => 'input[type="submit"], #submit, .button',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background'   => array( $accent_color, 'accent_color' ),
							'border-color' => array( $accent_color, 'accent_color' ),
							'color'        => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => 'input[type="submit"]:hover, #submit:hover, .button:hover',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_font, 'accent_font' ),
							'color'      => array( $accent_color, 'accent_color' ),
							),
					) );

	/* Layout */

	hybridextend_add_css_rule( array(
						'selector'  => 'body',
						'property'  => 'background',
						'idtag'     => 'background',
					) );

	if ( $site_layout == 'boxed' ) {
		hybridextend_add_css_rule( array(
						'selector'  => '#page-wrapper',
						'property'  => 'background',
						'value'     => $box_background_color,
						'idtag'     => 'box_background_color',
					) );
	}

	/* Header (Topbar, Header, Main Nav Menu) */
	// Topbar

	hybridextend_add_css_rule( array(
						'selector'  => '.topbar-right-inner',
						'property'  => 'background',
						'value'     => $content_bg_color,
					) );

	/* Header (Topbar, Header, Main Nav Menu) */
	// Logo
	// Header Layout

	hybridextend_add_css_rule( array(
						'selector'  => '#header #site-logo' . ',' . '.header-supplementary-top' . ',' . '.header-supplementary-bottom', // overqualify to supersede #site-logo.with-background
						'property'  => 'border-color',
						'value'     => $content_bg_color,
					) );


	/* Header (Topbar, Header, Main Nav Menu) */
	// Text Logo

	// Override @logoFontFamily if selected in options (Removed in premium)
	if ( 'cursive' == $logo_fontface ) {
		hybridextend_add_css_rule( array(
						'selector'  => '#site-title',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'font-family' => array( '"Pacifico", sans-serif' ),
							),
					) );
	} elseif ( 'standard' == $logo_fontface ) {
		hybridextend_add_css_rule( array(
						'selector'  => '#site-title',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'font-family ' => array( 'inherit' ), // "Droid Sans", sans-serif
							),
					) );
	}

	hybridextend_add_css_rule( array(
						'selector'  => '#site-logo-text.displayfont #site-title, #site-logo-mixed.displayfont #site-title',
						'property'  => 'text-shadow',
						'value'     => '2px 2px ' . $contrast_color,
						'idtag'     => 'contrast_color',
					) );

	/* Header (Topbar, Header, Main Nav Menu) */
	// Logo (with icon)

	if ( intval( $site_title_icon_size ) ) {
		hybridextend_add_css_rule( array(
						'selector'  => '.site-logo-with-icon #site-title i',
						'property'  => 'font-size',
						'value'     => $site_title_icon_size,
						'idtag'     => 'site_title_icon_size',
					) );
	}

	if ( $site_title_icon && intval( $site_title_icon_size ) ) {
		hybridextend_add_css_rule( array(
						'selector'  => '.site-logo-with-icon #site-title',
						'property'  => 'margin-left',
						'value'     => $site_title_icon_size,
						'idtag'     => 'site_title_icon_size',
					) );
	}

	/* Header (Topbar, Header, Main Nav Menu) */
	// Mixed/Mixedcustom Logo (with image)

	if ( !empty( $logo_image_width ) ) :
	hybridextend_add_css_rule( array(
						'selector'  => '.site-logo-mixed-image img',
						'property'  => 'max-width',
						'value'     => $logo_image_width,
						'idtag'     => 'logo_image_width',
					) );
	endif;

	/* Header (Topbar, Header, Main Nav Menu) */
	// Custom Logo

	if ( 'custom' == $logo || 'mixedcustom' == $logo ) {
		if ( is_array( $logo_custom ) && !empty( $logo_custom ) ) {
			$lcount = 1;
			foreach ( $logo_custom as $logo_custom_line ) {
				if ( !$logo_custom_line['sortitem_hide'] && !empty( $logo_custom_line['size'] ) ) {
					hybridextend_add_css_rule( array(
						'selector'  => '#site-logo-custom .site-title-line' . $lcount . ',#site-logo-mixedcustom .site-title-line' . $lcount,
						'property'  => 'font-size',
						'value'     => $logo_custom_line['size'],
						// 'idtag'     => 'logo_custom',
					) );
				}
				$lcount++;
			}
		}
	}

	/* Header (Topbar, Header, Main Nav Menu) */
	// Nav Menus

	hybridextend_add_css_rule( array(
						'selector'  => '.menu-items li.current-menu-ancestor > a, .menu-items li.current-menu-item > a, .menu-items > li.menu-item:hover > a',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background'   => array( $accent_color, 'accent_color' ),
							'color'        => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.sf-menu ul',
						'property'  => 'background',
						'value'     => $contrast_color,
						'idtag'     => 'contrast_color',
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.sf-menu ul li:hover > a', // . ', ' . '.menu-toggle',
						'property'  => 'background',
						'value'     => $contrast_color_lighter,
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.mobilemenu-fixed .menu-toggle',
						'property'  => 'background',
						'value'     => $contrast_color,
						'idtag'     => 'contrast_color',
					) ); // Overridden in premium if header has bg applied

	hybridextend_add_css_rule( array(
						'selector'  => '.mobilemenu-fixed .menu-items',
						'property'  => 'background',
						'value'     => $contrast_color,
						'idtag'     => 'contrast_color',
						'media'     => 'only screen and (max-width: 799px)',
					) ); // Overridden in premium if header has bg applied

	/* Layout */

	hybridextend_add_css_rule( array(
						'selector'  => '#page-wrapper',
						'property'  => 'border-color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) );

	/* Main #Content */

	hybridextend_add_css_rule( array(
						'selector'  => '#loop-meta.pageheader-bg-default > .grid:after, #loop-meta.pageheader-bg-incontent > .grid:after, #loop-meta.pageheader-bg-none > .grid:after',
						'property'  => 'border-color',
						'value'     => $contrast_color,
						'idtag'     => 'contrast_color',
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.content .entry-byline',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.entry-footer .entry-byline',
						'property'  => 'color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) ); // Overridden in premium

	/* Main #Content for Index (Archive / Blog List) */

	hybridextend_add_css_rule( array(
						'selector'  => '.archive-big .more-link span, .archive-medium .more-link span, .archive-small .more-link span',
						'property'  => 'background',
						'value'     => $content_bg_color,
					) );

	/* Light Slider */

	hybridextend_add_css_rule( array(
						'selector'  => '.lightSlider .style-accent',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background'   => array( $accent_color, 'accent_color' ),
							'color'        => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.lightSlider .style-invert-accent',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_font, 'accent_font' ),
							'color'      => array( $accent_color, 'accent_color' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.lSSlideOuter .lSPager.lSpg > li:hover a, .lSSlideOuter .lSPager.lSpg > li.active a',
						'property'  => 'background-color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.hootslider-image-slide-button',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_font, 'accent_font' ),
							'color'      => array( $accent_color, 'accent_color' ),
							),
						'media'     => 'only screen and (max-width: 799px)',
					) );

	/* Frontpage */

	// Set as inline CSS
	// foreach ( $wtmodule_bg as $wtmname ) {
	// 	if ( $wtm_sectionbg[ $wtmname . '_type'] == 'image' && !empty( $wtm_sectionbg[ $wtmname . '_image'] ) && empty( $wtm_sectionbg[ $wtmname . '_parallax'] ) ) {
	// 		hybridextend_add_css_rule( array(
	// 					'selector'  => "#frontpage-{$wtmname}",
	// 					'property'  => 'background-image',
	// 					'value'     => $wtm_sectionbg[ $wtmname . '_image'],
	// 					'idtag'     => "frontpage_sectionbg_{$wtmname}-image",
	// 				) );
	// 	}
	// }

	/* Sidebars and Widgets */

	hybridextend_add_css_rule( array(
						'selector' => '.topborder-shadow:before, .bottomborder-shadow:after',
						'property' => 'border-color',
						'value'    => $contrast_color,
						'idtag'    => 'contrast_color',
					) );

	/* Plugins */

	hybridextend_add_css_rule( array(
						'selector'  => '#infinite-handle span',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	/* Footer */

	hybridextend_add_css_rule( array(
						'selector'  => '.sub-footer',
						'property'  => 'background',
						'value'     => $contrast_color_light,
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.post-footer',
						'property'  => 'color',
						'value'     => $contrast_font_light,
					) );

}