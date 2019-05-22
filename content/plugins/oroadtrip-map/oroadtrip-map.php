<?php
/*
Plugin Name: oRoadtrip Map
Author: Lucie, Gaëtan, Angie, Gabriel
Author URI: https://github.com/O-clock-Orion/O-RoadTrip
Version: 1.0.0
Description: Le plugin du site oRoadtrip qui crée le CPT (Custom Post Type)
*/

if ( ! defined( 'WPINC' ) ) {
    http_response_code( 404 );
    exit;
}

add_action( 'init', 'oroadtrip_register_post_type_map' );

function oroadtrip_register_post_type_map() {

    register_post_type(
        'map',
        [
            'labels' => [
                'name'               => 'Map',
                'singular_name'      => 'Map',
                'add_new_item'       => 'Ajouter une nouvelle map',
                'edit_item'          => 'Editer la map',
                'new_item'           => 'Nouvelle map',
                'view_item'          => 'Voir la map',
                'view_items'         => 'Voir les maps',
                'search_items'       => 'Rechercher des maps',
                'not_found'          => 'Aucune map trouvée',
                'not_found_in_trash' => 'Aucune map trouvée dans la corbeille',
                'all_items'          => 'Toutes les maps',
                'archives'           => 'Archives des maps'
            ],
            'public'        => true, // Rend ce CPT accessible dans les résultats de la recherche, dans le menu du BO, crée une URL publique côté front-office
            'hierarchical'  => true, // Si à true, se comportera comme le type page, si à false comme le type post
            'menu_position' => 4,
            // https://developer.wordpress.org/resource/dashicons/
            'menu_icon'     => 'dashicons-location-alt',
            'supports'      => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'content',
                'custom-fields',
                'page-attributes'
            ],
            'has_archive'  => true, // Permet d'avoir une page listant tous nos contenus de ce CPT
            'can_export'   => true,
            'show_in_rest' => true // Permet de générer les endpoints dans l'API REST (utilise pour Gutenberg)
        ]
    );
}


register_activation_hook(
    __FILE__,
    'oroadtrip_settings_activation'
);

function oroadtrip_settings_activation() {
    oroadtrip_register_post_type_map(); // On exécute la fonction qui crée les post types de manière à informer WordPress qu'il faut également créer les routes de ce CPT au moment de regénérer les rewrite rules (voir juste en-dessous)
    // https://codex.wordpress.org/Function_Reference/flush_rewrite_rules
    flush_rewrite_rules( false ); // L'argument envoyé au paramètre $hard est à false si on ne veut pas toucher au fichier .htaccess
}

register_deactivation_hook(
    __FILE__,
    'oroadtrip_settings_deactivation'
);

function oroadtrip_settings_deactivation() {
    // On désactive nos CPT avant de regénérer les règles de réécriture
    unregister_post_type( 'map' );
    flush_rewrite_rules( false );
}