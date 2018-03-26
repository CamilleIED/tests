<?php

	// Section - Others Section
	$wp_customize->add_section( 'magazine_o_sidebar_section',
		array(
			'title'      => esc_html__( 'Sidebar Option', 'magazine-o' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	$wp_customize->add_setting('magazine_o_sidebar_position', 
		array(
			'sanitize_callback'	=> 'magazine_o_sanitize_select',
			'default'			=> 'right'
		)
	);

	$wp_customize->add_control('magazine_o_sidebar_position', 
		array(
			'label'      		=> esc_html__('Theme Sidebar Position', 'magazine-o'),
			'description'		=> esc_html__( 'Select Sidebar Postion. Select none to hide sidebar.', 'magazine-o' ),
			'section'    		=> 'magazine_o_sidebar_section',
			'type'       		=> 'radio',
			'choices'    		=> array(
				'left'   		=> esc_html__('Left','magazine-o'),
				'right'  		=> esc_html__('Right','magazine-o'),
				'none'	 		=> esc_html__('None','magazine-o'),
			),
		) 
	);