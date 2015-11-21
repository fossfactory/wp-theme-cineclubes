<?php 

require_once('../../../../../wp-blog-header.php'); 

$type = $_POST['type'];
$idPost = $_POST['idPost'];


if($type == 'sessaoSingle'){

    $events = array();

    $args = array(
        'post_type' => 'sessao',
        'meta_query'=> array(
            array(
                'key' => 'ss_cineclube_id',
                'value' => $idPost,
            )
        ),
        'meta_key' => 'ss_cineclube_id',
        'post_count' => -1,
    );
      
    $loop_sessao_single = new WP_Query( $args );
    while ( $loop_sessao_single->have_posts() ) : $loop_sessao_single->the_post();

        $pdi  = $post->ID;
        $data =  rwmb_meta( 'ss_data', 'type=text', $pdi  );
        $title = get_the_title();
        $link = get_post_permalink();
        
        $e['id']    = $pdi;
        $e['title'] = $title;
        $e['url']   = $link;
        $e['start'] = $data;

        array_push($events, $e);

    endwhile; 
    wp_reset_query(); 

    echo json_encode($events);
}

if($type == 'sessao'){

    $events = array();

    $args = array(
        'post_type' => 'sessao',
        'post_count' => -1,
    );
      
    $loop_sessao = new WP_Query( $args );
    while ( $loop_sessao->have_posts() ) : $loop_sessao->the_post();

        $pdi  = $post->ID;
        $data =  rwmb_meta( 'ss_data', 'type=text', $pdi  );
        $title = get_the_title();
        $link = get_post_permalink();
        
        $e['id']    = $pdi;
        $e['title'] = $title;
        $e['url']   = $link;
        $e['start'] = $data;

        array_push($events, $e);

    endwhile; 
    wp_reset_query(); 

    echo json_encode($events);
}


?>
