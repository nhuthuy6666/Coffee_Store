<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container">
		<?php 
			$site_name = get_field('site_name', 'option');
			$header_cta_text = get_field('header_cta_text', 'option');
			$header_cta_link = get_field('header_cta_link', 'option');
		?>
		
		<!-- Logo mobile/tablet -->
		<div class="site-logo md:hidden order-1">
			<button class="button-logo"><h3><?php echo $site_name ?: get_bloginfo('name'); ?></h3></button>
		</div>

		<!-- Menu toggle button -->
		<button id="menu-toggle" class="menu-toggle" aria-label="Toggle menu">
			<svg class="w-6 h-6" fill="none" stroke="#704015" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
			</svg>
		</button>

		<nav class="desktop-nav">
			<ul>
				<?php
				wp_nav_menu([
					'theme_location' => 'header_menu',
					'menu_id' => 'header-menu',
					'container' => false,
					'fallback_cb' => false,
					'menu_class' => 'flex items-center gap-8',
				]) 
				?>
			</ul>
		</nav>
		
		<!-- Logo desktop -->
		<div class="site-logo hidden md:flex">
			<button class="button-logo"><h3><?php echo $site_name ?: get_bloginfo('name'); ?></h3></button>
		</div>
		
		<button class="header-button desktop-cta">
			<a href="<?php echo $header_cta_link ? esc_url($header_cta_link['url']) : '#'; ?>" <?php echo !empty($header_cta_link['target']) ? 'target="' . esc_attr($header_cta_link['target']) . '"' : ''; ?>>
				<?php echo esc_html($header_cta_text ?: 'Online Reservation'); ?>
			</a>
		</button>
	</div>
</header>

<div id="offcanvas-menu" class="offcanvas-menu">
	<div id="offcanvas-panel" class="offcanvas-panel">
		<button id="menu-close" class="menu-close" aria-label="Close menu">
			<svg class="w-6 h-6" fill="none" stroke="#704015" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
			</svg>
		</button>
		<div class="offcanvas-content">
			<div class="offcanvas-logo">
				<h3><?php echo $site_name ?: get_bloginfo('name'); ?></h3>
			</div>

			<nav class="mobile-nav">
				<?php
				wp_nav_menu([
					'theme_location' => 'header_menu',
					'menu_id' => 'mobile-menu',
					'container' => false,
					'fallback_cb' => false,
					'menu_class' => 'flex flex-col gap-4',
				]) 
				?>
			</nav>
			<button class="mobile-cta-button">
				<a href="<?php echo $header_cta_link ? esc_url($header_cta_link['url']) : '#'; ?>" <?php echo !empty($header_cta_link['target']) ? 'target="' . esc_attr($header_cta_link['target']) . '"' : ''; ?>>
					<?php echo esc_html($header_cta_text ?: 'Online Reservation'); ?>
				</a>
			</button>
		</div>
	</div>
	<div id="offcanvas-overlay" class="offcanvas-overlay"></div>
</div>