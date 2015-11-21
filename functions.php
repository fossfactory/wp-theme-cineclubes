<?php
/**
 * @package WordPress
 * @subpackage Observarte
 * @since observarte 0.1
 */


add_theme_support('post-thumbnails' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

// redimensiona a imagem de acordo com a situação
add_image_size( 'capa', 900, 400, true );
add_image_size( 'capamaior', 450, 200, true );
add_image_size( 'capamenor', 225, 100, true );
add_image_size( 'slider', 1170, 420, true );
add_image_size( 'noticia', 64, 64, true );

add_filter( 'login_redirect', create_function( '$url,$query,$user', 'return home_url();' ), 10, 3 );


function paginate() {
global $wp_query, $wp_rewrite;
$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

$pagination = array(
    'base' => @add_query_arg('page','%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'show_all' => true,
    'class' => 'pagination',
    'type' => 'list',
    'next_text' => 'Próximo',
    'prev_text' => 'Anterior'
    );

if( $wp_rewrite->using_permalinks() )
    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 'page', get_pagenum_link( 1 ) ) ) . '?page=%#%/', 'paged' );

if( !empty($wp_query->query_vars['s']) )
    $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

echo paginate_links( $pagination );
}


/*
* Includes Congelado: PostTypes, MetaBoxes, Actions,
*/
include dirname(__FILE__).'/includes/congelado-functions.php';

//Arquivos chamados Por Ajax
//include dirname(__FILE__).'/includes/actions/calendar.php'; 
//include dirname(__FILE__).'/includes/actions/forms_frontend.php';
//include dirname(__FILE__).'/includes/actions/file_upload.php';



//Add Ajax Submit Form
add_action( 'wp_ajax_form_cineclube', 'form_cineclube' );
add_action( 'wp_ajax_nopriv_form_cineclube', 'form_cineclube' );
add_action( 'init', 'upload_image' );


$upload_dir = wp_upload_dir();

wp_register_script( 'theme_path_js', 'theme_path_js_url' );
wp_enqueue_script( 'theme_path_js' );
$translation_array = array( 'url' => get_stylesheet_directory_uri(), 'upload' => $upload_dir['baseurl'] );
//after wp_enqueue_script
wp_localize_script( 'theme_path_js', 'theme', $translation_array );


/*
* Remove Content Text Editor, PostTypes
*/
function content_editor_remove_post_type_support() {
    remove_post_type_support( 'cineclube', 'editor' );
    remove_post_type_support( 'sessao', 'editor' );
    remove_post_type_support( 'relatorio_sessao', 'editor' );
}
add_action( 'init', 'content_editor_remove_post_type_support' );



function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('Anterior'),
    'next_text'       => __('Próxima'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<span class='page-numbers page-num'>Página " . $paged . " de " . $numpages . "</span> ";
    echo "<ul class='pagination'>";  
        echo "<li>";
            echo $paginate_links;
        echo "</li>";
    echo "<ul>";
  }

}
