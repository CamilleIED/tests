<?php

	$wp_customize->add_panel( 'theme_option_panel', 
		array(
			'title'			=> __( 'Theme Options', 'magazine-o' ),
			'description'	=> __( 'Customization options for Magazine O Theme', 'magazine-o' ),
			'priority'		=> 10	
		) 
	);

	// Load Options
	require_once trailingslashit( get_template_directory() ) . '/ocean-themes/customizer/customizer-options/option-header.php';

	require_once trailingslashit( get_template_directory() ) . '/ocean-themes/customizer/customizer-options/option-single.php';

	require_once trailingslashit( get_template_directory() ) . '/ocean-themes/customizer/customizer-options/option-sidebar.php';