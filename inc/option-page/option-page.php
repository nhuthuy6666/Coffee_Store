<?php

/**
 * ACF Options Page Configuration
 */

// Register ACF Options Page
if (function_exists('acf_add_options_page')) {
	
	// Main options page
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'icon_url'		=> 'dashicons-admin-settings',
		'redirect'		=> true
	));
	
	// Sub-page: Header Settings
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'menu_slug' 	=> 'theme-header-settings',
		'parent_slug'	=> 'theme-settings',
	));
	
	// Sub-page: Footer Settings
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'menu_slug' 	=> 'theme-footer-settings',
		'parent_slug'	=> 'theme-settings',
	));
}

/**
 * Register ACF Field Groups
 */

// Field Group: Header Settings
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group(array(
		'key' => 'group_theme_header',
		'title' => 'Header Settings',
		'fields' => array(
			array(
				'key' => 'field_site_name',
				'label' => 'Site Name',
				'name' => 'site_name',
				'type' => 'text',
				'instructions' => 'Enter your site name (default: Pawfect)',
				'default_value' => 'Mood',
			),
			array(
				'key' => 'field_header_cta_text',
				'label' => 'CTA Button Text',
				'name' => 'header_cta_text',
				'type' => 'text',
				'instructions' => 'Text for the call-to-action button in header',
				'default_value' => 'Online Reservation',
			),
			array(
				'key' => 'field_header_cta_link',
				'label' => 'CTA Button Link',
				'name' => 'header_cta_link',
				'type' => 'url',
				'instructions' => 'Enter the URL to link to (e.g., /register or full URL)',
				'placeholder' => '/register',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'theme-header-settings',
				),
			),
		),
	));
}

if( function_exists('acf_add_local_field_group') ) {
    acf_add_local_field_group(array(
        'key' => 'group_theme_footer',
        'title' => 'Footer Settings',
        'fields' => array(
            array(
                'key' => 'footer_mood_images',
                'label' => 'Mood Images',
                'name' => 'mood_images',
                'type' => 'repeater',
                'instructions' => 'Upload multiple mood images',
                'sub_fields' => array(
                    array(
                        'key' => 'mood_image_sub',
                        'label' => 'Mood Image',
                        'name' => 'mood_image',
                        'type' => 'image',
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                ),
                'min' => 1,
                'layout' => 'row',
                'button_label' => 'Add Image',
            ),
			array(
				'key' => 'instagram_link',
				'label' => 'Instagram Link',
				'name' => 'instagram_link',
				'type' => 'url',
				'instructions' => 'Enter the URL to link to (e.g., https://www.instagram.com/ or full URL)',
				'placeholder' => 'https://www.instagram.com/',
			),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-footer-settings',
                ),
            ),
        ),
    ));
}

