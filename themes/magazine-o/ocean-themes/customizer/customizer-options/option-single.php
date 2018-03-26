<?php
	
	// Section - Other Section
	$wp_customize->add_section( 'magazine_o_single_post_section',
		array(
			'title'      => esc_html__( 'Single Post Option', 'magazine-o' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Related Posts
	$wp_customize->add_setting( 'magazine_o_show_related_posts',
		array(
			'default'           => 1,
			'sanitize_callback' => 'magazine_o_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'magazine_o_show_related_posts',
		array(
			'label'    			=> esc_html__( 'Show Related Posts', 'magazine-o' ),
			'section'  			=> 'magazine_o_single_post_section',
			'type'     			=> 'checkbox',
		)
	);

	// Setting - Related Post Title
	$wp_customize->add_setting( 'magazine_o_related_post_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( 'magazine_o_related_post_title',
		array(
			'label'    			=> esc_html__( 'Related Posts Section Title', 'magazine-o' ),
			'section'  			=> 'magazine_o_single_post_section',
			'type'     			=> 'text',
		)
	);

	// Setting - Related Post No
	$wp_customize->add_setting( 'magazine_o_related_post_no',
		array(
			'default'           => 3,
			'sanitize_callback' => 'magazine_o_sanitize_positive_integer',
		)
	);

	$wp_customize->add_control( 'magazine_o_related_post_no',
		array(
			'label'       => esc_html__( 'No of related Posts', 'magazine-o' ),
			'section'     => 'magazine_o_single_post_section',
			'type'        => 'number',
		)
	);