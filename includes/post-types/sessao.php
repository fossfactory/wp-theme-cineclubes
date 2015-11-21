<?php
// Register Custom Post Type
function sessao_post_type() {

    $labels = array(
        'name'                => _x( 'Sessão', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Sessão', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Sessão', 'text_domain' ),
        'name_admin_bar'      => __( 'Sessões', 'text_domain' ),
        'parent_item_colon'   => __( 'Sessão pai', 'text_domain' ),
        'all_items'           => __( 'Todos as Sessões', 'text_domain' ),
        'add_new_item'        => __( 'Adicionar Nova Sessão', 'text_domain' ),
        'add_new'             => __( 'Adicionar Nova', 'text_domain' ),
        'new_item'            => __( 'Nova Sessão', 'text_domain' ),
        'edit_item'           => __( 'Editar Sessão', 'text_domain' ),
        'update_item'         => __( 'Atualizar Sessão', 'text_domain' ),
        'view_item'           => __( 'Ver Sessão', 'text_domain' ),
        'search_items'        => __( 'Procurar Sessão', 'text_domain' ),
        'not_found'           => __( 'Não Encontrado', 'text_domain' ),
        'not_found_in_trash'  => __( 'Não Encontrado na Lixeira', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'Sessão', 'text_domain' ),
        'description'         => __( 'Sessões Realizadas', 'text_domain' ),
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
    register_post_type( 'sessao', $args );

}

// Hook into the 'init' action
add_action( 'init', 'sessao_post_type', 0 );