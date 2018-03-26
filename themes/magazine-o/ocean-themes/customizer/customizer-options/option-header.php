<?php

	// Section - Other Section
	$wp_customize->add_section( 'magazine_o_header_section',
		array(
			'title'      => esc_html__( 'Header Option', 'magazine-o' ),
			'priority'   => 100,
			'capability' => 'edit_theme_options',
			'panel'      => 'theme_option_panel',
		)
	);

	// Setting - Enable Top Header
	$wp_customize->add_setting( 'magazine_o_show_top_header',
		array(
			'default'           => 1,
			'sanitize_callback' => 'magazine_o_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'magazine_o_show_top_header',
		array(
			'label'    			=> esc_html__( 'Show Top Header', 'magazine-o' ),
			'section'  			=> 'magazine_o_header_section',
			'type'     			=> 'checkbox',
		)
	);

	// Setting - Enable Current Date
	$wp_customize->add_setting( 'magazine_o_show_current_date',
		array(
			'default'           => 1,
			'sanitize_callback' => 'magazine_o_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'magazine_o_show_current_date',
		array(
			'label'    			=> esc_html__( 'Show Current Date', 'magazine-o' ),
			'section'  			=> 'magazine_o_header_section',
			'type'     			=> 'checkbox',
		)
	);

	// Setting - Enable Top Menu
	$wp_customize->add_setting( 'magazine_o_show_top_menu',
		array(
			'default'           => 1,
			'sanitize_callback' => 'magazine_o_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'magazine_o_show_top_menu',
		array(
			'label'    			=> esc_html__( 'Show Top Menu', 'magazine-o' ),
			'section'  			=> 'magazine_o_header_section',
			'type'     			=> 'checkbox',
		)
	);

	// Setting - Enable Social Icons
	$wp_customize->add_setting( 'magazine_o_show_social_icons',
		array(
			'default'           => 1,
			'sanitize_callback' => 'magazine_o_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'magazine_o_show_social_icons',
		array(
			'label'    			=> esc_html__( 'Show Social Icons', 'magazine-o' ),
			'section'  			=> 'magazine_o_header_section',
			'type'     			=> 'checkbox',
		)
	);

	//SOCIAL LINKS
	$wp_customize->add_setting('magazine_o_facebook_link',array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => '',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'magazine_o_facebook_link',array(
			'label' => __('Facebook Link','magazine-o'),
			'type' => 'url',
			'section' => 'magazine_o_header_section',
		)
	));

	$wp_customize->add_setting('magazine_o_twitter_link',array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => '',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'magazine_o_twitter_link',array(
			'label' => __('Twitter Link','magazine-o'),
			'type' => 'url',
			'section' => 'magazine_o_header_section',
		)
	));

	$wp_customize->add_setting('magazine_o_linkedin_link',array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => '',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'magazine_o_linkedin_link',array(
			'label' => __('Linkedin Link','magazine-o'),
			'type' => 'url',
			'section' => 'magazine_o_header_section',
		)
	));

	$wp_customize->add_setting('magazine_o_rss_link',array(
			'sanitize_callback' => 'esc_url_raw',
			'default' => '',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'magazine_o_rss_link',array(
			'label' => __('RSS Link','magazine-o'),
			'type' => 'url',
			'section' => 'magazine_o_header_section',
		)
	));

	$wp_customize->add_setting('magazine_o_youtube_link',array(
			'sanitize_callback' => 'esc_url_raw',
			'default' =>  '',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'magazine_o_youtube_link',array(
			'label' => __('Youtube Link','magazine-o'),
			'type' => 'url',
			'section' => 'magazine_o_header_section',
		)
	));

	$wp_customize->add_setting('magazine_o_googleplus_link',array(
			'sanitize_callback' => 'esc_url_raw',
			'default' =>  '',
		)
	);

	$wp_customize->add_control(new WP_Customize_Control($wp_customize,'magazine_o_googleplus_link',array(
			'label' => __('Google Plus Link','magazine-o'),
			'type' => 'url',
			'section' => 'magazine_o_header_section',
		)
	));