<?php
/**
 * Demo configuration
 *
 * @package Magazine O
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'top-menu' 	=> 'top',
		'primary-menu'	=>'main',
		'footer-nav'	=>'footer-menu',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import Magazine Demo', 'magazine-o' ),
			'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo/widgets.wie',
      		'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'                => __( 'It will overwrite your settings', 'magazine-o' ),
      		'preview_url'                  => 'https://ocean-themes.com/magazine-o/',
		),
		
	),
);

Magazine_O_Demo::init( apply_filters( 'magazine_o_demo_filter', $config ) );