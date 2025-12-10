<?php
/**
 * Mood Theme functions and definitions
 *
 * @package mood-theme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Load core files first (constants and utilities)
 */
require_once get_template_directory() . '/inc/core/vite.php';

/**
 * Auto-load all files from inc directories
 */
function mood_load_inc_files() {
	$inc_dirs = array(
		'inc/setup',
		'inc/custom-post-type',
		'inc/option-page',
	);

	foreach ($inc_dirs as $dir) {
		$dir_path = get_template_directory() . '/' . $dir;
		if (is_dir($dir_path)) {
			$files = glob($dir_path . '/*.php');
			if ($files) {
				foreach ($files as $file) {
					require_once $file;
				}
			}
		}
	}
}
mood_load_inc_files();

/**
 * Vite enqueue - auto-detects dev/prod mode
 *
 * No need to manually switch between dev and prod files.
 * It checks if Vite dev server is running and loads appropriate file.
 */
require_once get_template_directory() . '/inc/enqueue/enqueue.php';

