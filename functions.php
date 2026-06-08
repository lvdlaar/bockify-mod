<?php

require_once __DIR__ . '/vendor/autoload.php';

add_action(
	'after_setup_theme',
	static function (): void {
		load_theme_textdomain( 'blockify', __DIR__ . '/languages' );
		Blockify::register( __FILE__ );
	},
	0
);
