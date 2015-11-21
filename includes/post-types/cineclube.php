<?php
// Register Custom Post Type
function cineclube_post_type() {

    $labels = array(
        'name'                => _x( 'CineClube', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'CineClube', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'CineClube', 'text_domain' ),
        'name_admin_bar'      => __( 'CineClubes', 'text_domain' ),
        'parent_item_colon'   => __( 'CineClube pai', 'text_domain' ),
        'all_items'           => __( 'Todos CineClubes', 'text_domain' ),
        'add_new_item'        => __( 'Adicionar Novo CineClube', 'text_domain' ),
        'add_new'             => __( 'Adicionar Novo', 'text_domain' ),
        'new_item'            => __( 'Novo CineClube', 'text_domain' ),
        'edit_item'           => __( 'Editar CineClube', 'text_domain' ),
        'update_item'         => __( 'Atualizar CineClube', 'text_domain' ),
        'view_item'           => __( 'Ver CineClube', 'text_domain' ),
        'search_items'        => __( 'Procurar CineClube', 'text_domain' ),
        'not_found'           => __( 'Não Encontrado', 'text_domain' ),
        'not_found_in_trash'  => __( 'Não Encontrado na Lixeira', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'CineClube', 'text_domain' ),
        'description'         => __( 'CineClubes do site', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail','editor' ),
        'taxonomies'          => array( 'especialidade', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 7,
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => false,
        'capability_type'     => 'page',
    );
    register_post_type( 'cineclube', $args );

}

// Hook into the 'init' action
add_action( 'init', 'cineclube_post_type', 0 );