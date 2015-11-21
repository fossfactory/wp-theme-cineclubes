<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
 ?>
<?php get_header(); ?>



<div class="content-galeria">
    <div class="container">
        <div class="row">

    <?php 
        
        //Pegar todos os Post Publicados dos POSTYPES;
        $args = array(
            'post_parent' => 0,
            'post_type'   => array('cineclube', 'sessao', 'relatorio_sessao'), 
            'numberposts' => -1,
            'post_status' => 'publish' 
        ); 
                    
        $full_posts = get_children( $args );

        foreach ( $full_posts as $post) { 
              /*  echo "<pre>";
                    print_r($post);
                echo "</pre>";
            */
            $pdi =  $post->ID;
            $post_title = $post->post_title;
            $post_type = $post->post_type;
            $url_thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
  

            //POST THUMBNAIL
            if(!empty($url_thumb)){
                echo '<div class="col-md-3" >';
                echo '<a href="'.$url_thumb.'" data-toggle="lightbox" data-gallery="multiimages" data-title="'.$post_title.'">';
                echo '<img src="'.$url_thumb.'" alt="'.$post_title.'" />';
                echo '</a>';
                echo '</div>';
            }
            
            //FOTOS RELATORIO SESSAO
            if($post_type == "relatorio_sessao"){
                for($i = 1; $i <= 6; $i++){
                   $foto = rwmb_meta( 'rs_foto_sessao'.$i, 'type=image', $pdi  );
                    foreach ( $foto as $f ){ 
                        if(!empty($f['url'])){
                            echo '<div class="col-md-3" >';
                            echo '<a href="'.$f['url'].'" data-toggle="lightbox" data-gallery="multiimages" data-title="'.$post_title.' ">';
                            echo '<img src="'.$f['url'].'" alt="'.$post_title.'" />';
                            echo '</a>';
                            echo '</div>';
                        }
                    }
                };
            }
            
            //FOTOS DEBATEDORES
            if($post_type == "sessao"){
                for($d = 1; $d <= 5; $d++){
                    $foto_debatedor = rwmb_meta( 'ss_foto_debatedor'.$d, 'type=image', $pdi  );
                    foreach ( $foto_debatedor as $f ){ 
                        if(!empty($f['url'])){
                            echo '<div class="col-md-3" >';
                            echo '<a href="'.$f['url'].'" data-toggle="lightbox" data-gallery="multiimages" data-title="'.$post_title.'">';
                            echo '<img src="'.$f['url'].'" alt="'.$post_title.'" />';
                            echo '</a>';
                            echo '</div>';
                        }
                    }
                }
            }
        }//FOR POSTS

     ?>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>
