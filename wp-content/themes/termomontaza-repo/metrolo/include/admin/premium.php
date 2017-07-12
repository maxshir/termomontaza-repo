<?php
/**
 * Premium Theme Options displayed in admin
 *
 * @package    Metrolo
 * @return array Return Hoot Options array to be merged to the original Options array
 */

$hoot_options_premium = array();
$imagepath =  HYBRIDEXTEND_INCURI . 'admin/images/';
$hoot_cta_top = '<a class="button button-primary button-buy-premium" href="http://wphoot.com/themes/metrolo/" target="_blank">' . __( 'Click here to know more', 'metrolo' ) . '</a>';
$hoot_cta_top = $hoot_cta = '<a class="button button-primary button-buy-premium" href="http://wphoot.com/themes/metrolo/" target="_blank">' . __( 'Buy Metrolo Premium', 'metrolo' ) . '</a>';
$hoot_cta_demo = '<a class="button button-secondary button-view-demo" href="http://demo.wphoot.com/metrolo/" target="_blank">' . __( 'View Demo Site', 'metrolo' ) . '</a>';

$hoot_intro = array(
	'name' => __('Upgrade to Metrolo Premium', 'metrolo'),
	'desc' => __("If you've enjoyed using Metrolo, you're going to love Metrolo Premium.<br>It's a robust upgrade to Metrolo that gives you many useful features.", 'metrolo'),
	);

$hoot_options_premium[] = array(
	'name' => __('Complete Style Customization', 'metrolo'),
	'desc' => __('Metrolo Premium lets you select unlimited colors for different sections of your site.<hr>Select pre-existing backgrounds for site sections like header, footer etc or upload your own background images/patterns.', 'metrolo'),
	'img' => $imagepath . 'premium-style.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Fonts and Typography Control', 'metrolo'),
	'desc' => __('Assign different typography (fonts, text size, font color) to menu, topbar, logo, content headings, sidebar, footer etc.', 'metrolo'),
	'img' => $imagepath . 'premium-typography.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Unlimites Sliders, Unlimites Slides', 'metrolo'),
	'desc' => __('Metrolo Premium allows you to create unlimited sliders with as many slides as you need.<hr>You can use these sliders on your Frontpage, or add them anywhere using shortcodes - like in your Posts, Sidebars or Footer.', 'metrolo'),
	'img' => $imagepath . 'premium-sliders.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('600+ Google Fonts', 'metrolo'),
	'desc' => __("With the integrated Google Fonts library, you can find the fonts that match your site's personality, and there's over 600 options to choose from.", 'metrolo'),
	'img' => $imagepath . 'premium-googlefonts.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Shortcodes with Easy Generator', 'metrolo'),
	'desc' => __('Enjoy the flexibility of using shortcodes throughout your site with Metrolo premium. These shortcodes were specially designed for this theme and are very well integrated into the code to reduce loading times, thereby maximizing performance!<hr>Use shortcodes to insert buttons, sliders, tabs, toggles, columns, breaks, icons, lists, and a lot more design and layout modules.<hr>The intuitive Shortcode Generator has been built right into the Edit screen, so you dont have to hunt for shortcode syntax.', 'metrolo'),
	'img' => $imagepath . 'premium-shortcodes.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Image Carousels', 'metrolo'),
	'desc' => __('Add carousels to your post, in your sidebar, on your frontpage or in your footer. A simple drag and drop interface allows you to easily create and manage carousels.', 'metrolo'),
	'img' => $imagepath . 'premium-carousels.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __("Floating 'Sticky' Header &amp; 'Goto Top' button (optional)", 'metrolo'),
	'desc' => __("The floating header follows the user down your page as they scroll, which means they never have to scroll back up to access your navigation menu, improving user experience.<hr>Or, use the 'Goto Top' button appears on the screen when users scroll down your page, giving them a quick way to go back to the top of the page.", 'metrolo'),
	'img' => $imagepath . 'premium-header-top.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('One Page Scrolling Website / Landing Page', 'metrolo'),
	'desc' => __("Make One Page websites with menu items linking to different sections on the page. Watch the scroll animation kick in when a user clicks a menu item to jump to a page section.<hr>Create different landing pages on your site. Change the menu for each page so that the menu items point to sections of the page being displayed.", 'metrolo'),
	'img' => $imagepath . 'premium-scroller.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('3 Blog Layouts (including pinterest type mosaic)', 'metrolo'),
	'desc' => __('Metrolo Premium gives you the option to display your post archives in 3 different layouts including a mosaic type layout similar to pinterest.', 'metrolo'),
	'img' => $imagepath . 'premium-blogstyles.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Custom Widgets', 'metrolo'),
	'desc' => __('Custom widgets crafted and designed specifically for Metrolo Premium Theme to give you the flexibility of adding stylized content.', 'metrolo'),
	'img' => $imagepath . 'premium-widgets.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Menu Icons', 'metrolo'),
	'desc' => __('Select from over 500 icons for your main navigation menu links.', 'metrolo'),
	'img' => $imagepath . 'premium-menuicons.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Premium Background Patterns (CC0)', 'metrolo'),
	'desc' => __('Metrolo Premium comes with many additional premium background patterns. You can always upload your own background image/pattern to match your site design.', 'metrolo'),
	'img' => $imagepath . 'premium-backgrounds.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Automatic Image Lightbox and WordPress Gallery', 'metrolo'),
	'desc' => __('Automatically open image links on your site with the integrates lightbox in Metrolo Premium.<hr>Automatically convert standard WordPress galleries to beautiful lightbox gallery slider.', 'metrolo'),
	'img' => $imagepath . 'premium-lightbox.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Developers love {LESS}', 'metrolo'),
	'desc' => __('CSS is passe. Developers love the modularity and ease of using LESS, which is why Metrolo Premium comes with properly organized LESS files for the main stylesheet. You can even turn on less.js during development to increase productivity.', 'metrolo'),
	'img' => $imagepath . 'premium-lesscss.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Easy Import/Export', 'metrolo'),
	'desc' => __('Moving to a new host? Or applying a new child theme? Easily import/export your customizer settings with just a few clicks - right from the backend.', 'metrolo'),
	'img' => $imagepath . 'premium-import-export.jpg',
	);

$hoot_options_premium[] = array(
	'name' => __('Custom Javascript &amp; Google Analytics', 'metrolo'),
	'std' => __("Easily insert any javascript snippet to your header without modifying the code files. This helps in adding scripts for Google Analytics, Adsense or any other custom code.", 'metrolo'),
	);

$hoot_options_premium[] = array(
	'name' => __('Custom CSS', 'metrolo'),
	'std' => __("Add custom CSS to your theme right from the backend. If you are not a developer yourself, you can count on our support staff to help you with CSS snippets to get the look you're after. Best of all, your changes will persist across theme updates.", 'metrolo'),
	);

$hoot_options_premium[] = array(
	'name' => __('Continued Updates', 'metrolo'),
	'std' => __("You'll help support the continued development of Metrolo - ensuring it works with future versions of WordPress for years to come.", 'metrolo'),
	);

$hoot_options_premium[] = array(
	'name' => __('Premium Priority Support', 'metrolo'),
	'desc' => __('Need help setting up Metrolo? Upgrading to Metrolo Premium gives you prioritized support. We have a growing support team ready to help you with your questions.', 'metrolo'),
	'img' => $imagepath . 'premium-support.jpg',
	);