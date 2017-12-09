<?php

	function theme_customize_register( $wp_customize )
	{																									'settings' => 'setting_link_hover_color' ) ) );
		$wp_customize->add_section( 'section_fonts' , array( 'title' => __( 'Fonts', 'read' ), 'priority' => 30 ) );
		
		/* ========================= */
		
		include_once 'fonts.php';
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_text_logo_font', array( 'default' => 'UnifrakturMaguntia', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_text_logo_font', array(    'label' => 'Text Logo Font',
																		'section' => 'section_fonts',
																		'settings' => 'setting_text_logo_font',
																		'type' => 'select',
																		'choices' => $all_fonts ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_heading_font', array( 'default' => 'Coustard', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_heading_font', array(	'label' => 'Heading Font',
																	'section' => 'section_fonts',
																	'settings' => 'setting_heading_font',
																	'type' => 'select',
																	'choices' => $all_fonts ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_menu_font', array(	'default' => 'Coustard', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_menu_font', array(	'label' => 'Menu Font',
																'section' => 'section_fonts',
																'settings' => 'setting_menu_font',
																'type' => 'select',
																'choices' => $all_fonts ) );
		
		/* ========================= */
		
		$wp_customize->add_setting( 'setting_content_font', array( 'default' => 'Lora', 'transport' => 'refresh' ) );
		
		$wp_customize->add_control( 'control_content_font', array(	'label' => 'Content Font',
																	'section' => 'section_fonts',
																	'settings' => 'setting_content_font',
																	'type' => 'select',
																	'choices' => $all_fonts ) );
		
		/* ========================= */
		
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		
		$wp_customize->get_setting( 'setting_link_color' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_link_hover_color' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_menu_active_color' )->transport = 'postMessage';
		
		$wp_customize->get_setting( 'setting_text_logo_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_heading_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_menu_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'setting_content_font' )->transport = 'postMessage';
	}
	// end theme_customize_register
	
	add_action( 'customize_register', 'theme_customize_register' );


	function theme_customize_css()
	{
		global $subset;
		
		$extra_font_styles = get_option( 'extra_font_styles', 'No' );
		
		if ( $extra_font_styles == 'Yes' )
		{
			$font_styles = ':300,400,600,700,800,900,300italic,400italic,600italic,700italic,800italic,900italic';
		}
		else
		{
			$font_styles = "";
		}
		// end if
		
		?>

<?php
	$setting_text_logo_font = get_theme_mod( 'setting_text_logo_font', "" );
	
	if ( $setting_text_logo_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $setting_text_logo_font . $font_styles . $subset . '">';
	}
?>

<?php
	$setting_heading_font = get_theme_mod( 'setting_heading_font', "" );
	
	if ( $setting_heading_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $setting_heading_font . $font_styles . $subset . '">';
	}
?>

<?php
	$setting_menu_font = get_theme_mod( 'setting_menu_font', "" );
	
	if ( $setting_menu_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $setting_menu_font . $font_styles . $subset . '">';
	}
?>

<?php
	$setting_content_font = get_theme_mod( 'setting_content_font', "" );
	
	if ( $setting_content_font != "" )
	{
		echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' . $setting_content_font . $font_styles . $subset . '">';
	}
?>

<style type="text/css">

<?php
	$setting_heading_font = get_theme_mod( 'setting_heading_font', "" );
	
	if ( $setting_heading_font != "" )
	{
		echo 'h1, h2, h3, h4, h5, h6 { font-family: "' . $setting_heading_font . '", Georgia, serif; }' . "\n";
	}
?>


</style>
