<?php

// Custom logo
function theme_prefix_setup() {
    add_theme_support( 'custom-logo', array(
        'height'      => 400,
        'flex-width' => true,
        'flex-height' => true,
     ) );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

// Customizer oRoadtrip
function oroadtrip_customize_register( $wp_customize )
{
    $wp_customize->add_panel(
        'oroadtrip_theme_configuration',
        [
            'title'    => 'oRoadtrip',
            'priority' => 1
        ]
    );

/////////////////////////////////// CUSTOMIZER HOME PAGE ////////////////////////////

// Homepage section
$wp_customize->add_section(
    'oroadtrip_homepage',
    [
        'panel' => 'oroadtrip_theme_configuration',
        'title' => 'Page d\'accueil',
        'priority' => '1',
    ]
);

// Image

$wp_customize->add_setting( 'oroadtrip_homepage_image' );

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'image-home',
        [
            'label'      => __( 'Image page d\'accueil', 'Oroadtrip' ),
            'section'    => 'oroadtrip_homepage',
            'settings'   => 'oroadtrip_homepage_image'
        ]
    )
);

// Button text on the image

$wp_customize->add_setting( 'oroadtrip_homepage_button_text' );

$wp_customize->add_control(
        'oroadtrip_homepage_button_text',
        [
            'label'      => __( 'Texte du bouton sur l\'image', 'Oroadtrip' ),
            'section'    => 'oroadtrip_homepage',
            'settings'   => 'oroadtrip_homepage_button_text',
            'type'    => 'text'
        ]
);

// Baseline on the image

$wp_customize->add_setting( 'oroadtrip_homepage_image_baseline' );

$wp_customize->add_control(
        'oroadtrip_homepage_image_baseline',
        [
            'label'      => __( 'Baseline sur l\'image', 'Oroadtrip' ),
            'section'    => 'oroadtrip_homepage',
            'settings'   => 'oroadtrip_homepage_image_baseline',
            'type'    => 'text'
        ]
);

// Name of the blog's section

$wp_customize->add_setting( 'oroadtrip_homepage_name_section_blog' );

$wp_customize->add_control(
        'oroadtrip_homepage_name_section_blog',
        [
            'label'      => __( 'Nom de la section blog', 'Oroadtrip' ),
            'section'    => 'oroadtrip_homepage',
            'settings'   => 'oroadtrip_homepage_name_section_blog',
            'type'    => 'text'
        ]
);

// Logo of the blog's section

$wp_customize->add_setting( 'oroadtrip_homepage_logo_section_blog' );

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'logo-blog',
        [
            'label'      => __( 'Logo de la section blog', 'Oroadtrip' ),
            'section'    => 'oroadtrip_homepage',
            'settings'   => 'oroadtrip_homepage_logo_section_blog'
        ]
    )
);

// Subame of the blog's section

$wp_customize->add_setting( 'oroadtrip_homepage_subname_section_blog' );

$wp_customize->add_control(
        'oroadtrip_homepage_subname_section_blog',
        [
            'label'      => __( 'Sous-titre de la section blog', 'Oroadtrip' ),
            'section'    => 'oroadtrip_homepage',
            'settings'   => 'oroadtrip_homepage_subname_section_blog',
            'type'    => 'text'
        ]
);


// Subname's slogan of the blog's section

$wp_customize->add_setting( 'oroadtrip_homepage_slogan_subname_section_blog' );

$wp_customize->add_control(
        'oroadtrip_homepage_slogan_subname_section_blog',
        [
            'label'      => __( 'Phrase du sous-titre de la section blog', 'Oroadtrip' ),
            'section'    => 'oroadtrip_homepage',
            'settings'   => 'oroadtrip_homepage_slogan_subname_section_blog',
            'type'    => 'text'
        ]
);

// Last posts count

$wp_customize->add_setting(
    'oroadtrip_homepage_last_posts_number',
    [
        'default' => 4
    ]
);

$wp_customize->add_control(
    'oroadtrip_homepage_last_posts_number',
    [
        'section' => 'oroadtrip_homepage',
        'label'   => 'Nombre d\'articles de blog',
        'type'    => 'number',
        'input_attrs' => [
            'min'  => 2,
            'max'  => 12
        ]
    ]
);

// Last posts active

$wp_customize->add_setting( 'oroadtrip_homepage_last_posts_active' );

$wp_customize->add_control(
    'oroadtrip_homepage_last_posts_active',
    [
        'section' => 'oroadtrip_homepage',
        'type'    => 'checkbox',
        'label'   => 'Afficher les articles'
    ]
);

/////////////////////////////////// CUSTOMIZER BLOG PAGE ////////////////////////////

// Blog section
$wp_customize->add_section(
    'oroadtrip_blogpage',
    [
        'panel' => 'oroadtrip_theme_configuration',
        'title' => 'Page Blog',
        'priority' => '2',
    ]
);

// Posts count

$wp_customize->add_setting(
    'oroadtrip_blog_posts_number',
    [
        'default' => -1
    ]
);

$wp_customize->add_control(
    'oroadtrip_blog_posts_number',
    [
        'section' => 'oroadtrip_blogpage',
        'label'   => 'Nombre d\'articles de blog',
        'type'    => 'number',
        'input_attrs' => [
            'min'  => 2,
            'max'  => 12
        ]
    ]
);

// Posts order

$wp_customize->add_setting(
    'oroadtrip_blog_posts_order',
    [
        'default' => 'DESC'
    ]
);

$wp_customize->add_control(
    'oroadtrip_blog_posts_order',
    [
        'section' => 'oroadtrip_blogpage',
        'label'   => 'Ordre d\'articles de blog',
        'type'    => 'radio',
        'choices'  => array(
			'desc'  => 'desc',
            'asc' => 'asc',
        ),
    ]
);

// Posts active

$wp_customize->add_setting( 'oroadtrip_blog_posts_active' );

$wp_customize->add_control(
    'oroadtrip_blog_posts_active',
    [
        'section' => 'oroadtrip_blogpage',
        'type'    => 'checkbox',
        'label'   => 'Afficher les articles'
    ]
);


}

add_action( 'customize_register', 'oroadtrip_customize_register' );