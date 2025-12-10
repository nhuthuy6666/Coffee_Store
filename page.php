<?php
/**
 * The template for displaying all pages
 *
 * @package mood-theme
 * @since 1.0.0
 */

get_header();
?>

<main class="site-main">
	<?php
	while (have_posts()) {
		the_post();
		the_content();
	}
	?>
</main>

<?php
get_footer();

