<footer class="site-footer">
	<?php 
		$instagram_link = get_field('instagram_link', 'option');
	?>
	<div class="container">
		<div class="footer-brand">
			<h2><?php bloginfo('name'); ?></h2>
			<div class="description-wrapper">
				<p>We prioritize ethically sourced beans & eco-friendly practices.</p>
			</div>
			<nav>
				<ul>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer_menu',
						'menu_id' => 'footer-menu',
						'container' => false,
						'fallback_cb' => false,
						'menu_class' => 'flex items-center gap-8',
					));
					?>
				</ul>
			</nav>
		</div>
		<div class="brand-club">
			<p class="club-title">Join Our Coffee Club</p>
			<div class="club-description-wrapper">
				<p>Get exclusive offers, early access to new brews, and behind-the-scenes stories!</p>
			</div>
			<input type="text" class="club-input" placeholder="Email address">
			<button class="club-button">Subscribe</button>
		</div>
	</div>
	<div class="marquee-wrapper">
		<div class="marquee-overlay">
			<div class="overlay-content">
				<a href="<?php echo esc_url($instagram_link); ?>"><h1>Instagram</h1></a>
				<img src="https://framerusercontent.com/images/UJyQ1YXRiXWuUdnyl6KlOaULc.svg" 
					alt="" class="arrow-icon" />
			</div>
		</div>
		<div class="marquee">
			<div class="marquee-track">
				<?php if( have_rows('mood_images', 'option') ): ?>
					<?php while( have_rows('mood_images', 'option') ): the_row(); 
						$image = get_sub_field('mood_image');
					?>
						<?php if($image): ?>
							<img src="<?php echo esc_url($image['url']); ?>" 
								alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php if( have_rows('mood_images', 'option') ): ?>
					<?php while( have_rows('mood_images', 'option') ): the_row();
						$image = get_sub_field('mood_image');
						if($image): ?>
							<img src="<?php echo esc_url($image['url']); ?>"
								alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>