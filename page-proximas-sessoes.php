<?php
/*
Template Name: Proximas Sessões
*/

get_header(); ?>


<div class="section">
    <div class="container">
        <div class="row">
            <h1>
                Próximas Sessões
            </h1>
            <hr>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="media-list">
                    <?php

                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                    $args = array(
                      'post_type' => 'sessao',
                      'order' => 'DESC',
                      'orderby' => 'meta_value',
                      'meta_key' => 'ss_data',
                      'posts_per_page' => 10,
                      'paged' => $paged 
                      );

                    $loop_sessoes = new WP_Query( $args );

                    while ( $loop_sessoes->have_posts() ) : $loop_sessoes->the_post();
                    $pdi = $post->ID;

                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pdi), 'full' );
                    $thumb_url = $thumb['0'];  

                    if(empty($thumb_url)){
                      $thumb_url = "/wp-content/uploads/cineclube/sessao.png";
                    }  

                      /**
                      ** Get MetasBoxs
                      **/
                      $relato = rwmb_meta( 'ss_relato', 'type=text', $pdi  ); 

                      $nome_ceu = rwmb_meta( 'ss_cineclube_nome', 'type=text', $pdi  );
                      $cineclube_id = rwmb_meta( 'ss_cineclube_id', 'type=text', $pdi  );
                      $data = rwmb_meta( 'ss_data', 'type=text', $pdi  );
                      $horario = rwmb_meta( 'ss_horario', 'type=text', $pdi  );

                      ?>

                    <li class="media">
                        <a class="pull-left" href="<?php echo the_permalink(); ?>"><img class="media-object" src="<?php echo  $thumb_url ?>" height="64" width="64"></a>
                        <div class="media-body">
                            <h1 class="media-heading">
                                <a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h1>
                            <p class="bloco_cineclubes">
                                <a href="<?php echo get_permalink( $cineclube_id ); ?>"><b><?php echo  $nome_ceu; ?></b></a>
                            </p>
                            <p class="bloco_cineclubes"><?php echo  $data ?> - <?php echo  $horario ?></p>
                        </div>
                    </li>
                    <hr>

                    <?php endwhile; wp_reset_query(); ?>

  
                    <hr>
                </ul>
            </div>

            <div class="row">
              <div class="col-md-12">
                <?php
                      //PAGINATION
                custom_pagination($loop_sessoes->max_num_pages,"",$paged);
                ?>
              </div>
            </div>


        </div>
    </div>
</div>

<?php get_footer(); ?>
