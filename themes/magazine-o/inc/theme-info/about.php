<?php
/**
 * About configuration
 *
 * @package Magazine O
 */

$config = array(
	'menu_name' => esc_html__( 'Magazine O Setup', 'magazine-o' ),
	'page_name' => esc_html__( 'Magazine O Setup', 'magazine-o' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'magazine-o' ), 'Magazine O' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'magazine-o' ), 'Magazine O' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','magazine-o' ),
			'url'  => 'https://ocean-themes.com/downloads/magazine-o/',
			),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','magazine-o' ),
			'url'  => 'https://ocean-themes.com/magazine-o/',
			),
		'documentation_url' => array(
			'text'   => esc_html__( 'Upgrade to Pro','magazine-o' ),
			'url'    => 'https://wpcodefactory.com/item/magazine-o-wordpress-theme/',
			'button' => 'primary',
			),
		),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'magazine-o' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'magazine-o' ),
		'support'             => esc_html__( 'Support', 'magazine-o' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'magazine-o' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'magazine-o' ),
			'button_label'        => esc_html__( 'View documentation', 'magazine-o' ),
			'button_link'         => 'https://ocean-themes.com/downloads/magazine-o',
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'magazine-o' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'magazine-o' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'magazine-o' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=magazine-o-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'magazine-o' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'magazine-o' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'magazine-o' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(

			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'magazine-o' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'magazine-o' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),
			
		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'magazine-o' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated Support forum.', 'magazine-o' ),
			'button_label' => esc_html__( 'Contact Support', 'magazine-o' ),
			'button_link'  => esc_url( 'http://ocean-themes.com/support/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'magazine-o' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'magazine-o' ),
			'button_label' => esc_html__( 'View Documentation', 'magazine-o' ),
			'button_link'  => 'http://ocean-themes.com/downloads/magazine-o/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'magazine-o' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version.Either Upgrade to Pro or  Contact for Support', 'magazine-o' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'magazine-o' ),
			'button_link'  => 'https://ocean-themes.com/support/',
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
Magazine_O_About::init( apply_filters( 'magazine_o_about_filter', $config ) );