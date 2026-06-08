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

add_action(
	'init',
	static function (): void {
		$registry = WP_Block_Patterns_Registry::get_instance();

		if ( $registry->is_registered( 'search-toggle' ) ) {
			return;
		}

		register_block_pattern(
			'search-toggle',
			[
				'title'      => 'Search Toggle (Legacy Alias)',
				'categories' => [ 'utility' ],
				'inserter'   => false,
				'content'    => '<!-- wp:group {"layout":{"type":"constrained"}} --><div class="wp-block-group"></div><!-- /wp:group -->',
			]
		);
	},
	1
);

add_action(
	'enqueue_block_editor_assets',
	static function (): void {
		wp_dequeue_script( 'blockify-editor' );
		wp_deregister_script( 'blockify-editor' );
	},
	100
);
