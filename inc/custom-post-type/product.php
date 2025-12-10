<?php
add_action('init', function () {
	$labels = array(
		'name' => __('Products', 'mood-theme'),
		'singular_name' => __('Product', 'mood-theme'),
		'add_new' => __('Add new', 'mood-theme'),
		'add_new_item' => __('Add new product', 'mood-theme'),
		'edit_item' => __('Adjust product', 'mood-theme'),
		'new_item' => __('New product', 'mood-theme'),
		'view_item' => __('View product', 'mood-theme'),
		'search_items' => __('Search product', 'mood-theme'),
		'not_found' => __('Not found product', 'mood-theme'),
		'not_found_in_trash' => __('Not found in trash product', 'mood-theme'),
		'all_items' => __('All product', 'mood-theme'),
		'archives' => __('Archives product', 'mood-theme'),
		'attributes' => __('Attributes product', 'mood-theme'),
		'insert_into_item' => __('Insert into product', 'mood-theme'),
		'uploaded_to_this_item' => __('Uploaded to this product', 'mood-theme'),
	);

	$args = array(
		'label' => __('Product', 'mood-theme'),
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_icon' => 'dashicons-products',
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'thumbnail'),
		'show_in_rest' => true,
		'rest_base' => 'products',
		'has_archive' => 'products',
		'rewrite' => array('slug' => 'products', 'with_front' => false),
		'exclude_from_search' => false,
		'capability_type' => array('product', 'products'),
	);

	register_post_type('product', $args);

	// Register Product Category Taxonomy
	$tax_labels = array(
		'name' => __('Product Categories', 'mood-theme'),
		'singular_name' => __('Product Category', 'mood-theme'),
		'search_items' => __('Search Categories', 'mood-theme'),
		'all_items' => __('All Categories', 'mood-theme'),
		'parent_item' => __('Parent Category', 'mood-theme'),
		'parent_item_colon' => __('Parent Category:', 'mood-theme'),
		'edit_item' => __('Edit Category', 'mood-theme'),
		'update_item' => __('Update Category', 'mood-theme'),
		'add_new_item' => __('Add New Category', 'mood-theme'),
		'new_item_name' => __('New Category Name', 'mood-theme'),
		'menu_name' => __('Categories', 'mood-theme'),
	);

	$tax_args = array(
		'hierarchical' => true, // true = Category, false = Tag
		'labels' => $tax_labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => true,
		'rest_base' => 'product-categories',
		'rewrite' => array('slug' => 'product-category', 'with_front' => false),
	);

	register_taxonomy('product_category', 'product', $tax_args);
});

add_action('init', function () {
	$caps = array(
		'edit_product',
		'read_product',
		'delete_product',
		'edit_products',
		'edit_others_products',
		'publish_products',
		'read_private_products',
		'delete_products',
		'delete_private_products',
		'delete_published_products',
		'delete_others_products',
		'edit_private_products',
		'edit_published_products',
	);
	foreach (array('administrator', 'editor') as $role_slug) {
		$role = get_role($role_slug);
		if (!$role) continue;
		foreach ($caps as $cap) {
			if (!$role->has_cap($cap)) {
				$role->add_cap($cap);
			}
		}
	}
});

add_action('acf/init', function () {
	if (!function_exists('acf_add_local_field_group')) return;
	acf_add_local_field_group(array(
		'key' => 'group_product_fields',
		'title' => __('Product', 'mood-theme'),
		'fields' => array(
			array(
				'key' => 'field_product_image',
				'label' => __('Image', 'mood-theme'),
				'name' => 'product_image',
				'type' => 'image',
				'default_value' => '',
			),
			array(
				'key' => 'field_product_name',
				'label' => __('Name', 'mood-theme'),
				'name' => 'product_name',
				'type' => 'text',
				'default_value' => '',
			),
			array(
				'key' => 'field_product_price',
				'label' => __('Price', 'mood-theme'),
				'name' => 'product_price',
				'type' => 'number',
				'default_value' => '',
			),
			array(
				'key' => 'field_product_description',
				'label' => __('Description', 'mood-theme'),
				'name' => 'product_description',
				'type' => 'textarea',
				'default_value' => '',
			),
			array(
				'key' => 'field_product_taxonomy',
				'label' => __('Category', 'mood-theme'),
				'name' => 'product_taxonomy',
				'type' => 'taxonomy',
				'taxonomy' => 'product_category',
				'field_type' => 'checkbox',
				'save_terms' => 1,
				'load_terms' => 1,
				'required' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
				),
			),
		),
		'position' => 'normal',
	));
});