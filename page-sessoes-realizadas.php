<?php
/*
Template Name: Sessões Realizadas
*/

get_header(); ?>


<div class="section">
    <div class="container">
        <div class="row">
            <h1>
               Sessões Realizadas
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
                            'post_type' => 'relatorio_sessao',
                            'order' => 'DESC',
                            'orderby' => 'meta_value',
                            'meta_key' => 'rs_data_sessao',
                            'posts_per_page' => 10,
                            'paged' => $paged 
                          );

                          $loop_sessoes = new WP_Query( $args );

                          while ( $loop_sessoes->have_posts() ) : $loop_sessoes->the_post();
                          $pdi = $post->ID;

                          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pdi), 'full' );
                          $thumb_url = $thumb['0'];    

                          /**
                          ** Get MetasBoxs
                          **/
                          $relato = rwmb_meta( 'rs_relato', 'type=text', $pdi  ); 
                          $nome_ceu = rwmb_meta( 'rs_cineclube_nome', 'type=text', $pdi  );
                          try{
                            $data       = new DateTime( rwmb_meta( 'rs_data_sessao', 'type=text', $pdi  ) );
                            $data       = $data->format('d/m/Y');
                          }
                          catch (Exception $e){
                            $data       = rwmb_meta( 'rs_data_sessao', 'type=text', $pdi  );
                          }
                          $horario = rwmb_meta( 'rs_horario', 'type=text', $pdi  );

                          //Relatorio Vinculado com Sessao por ID SESSAO
                          $sessao_id = rwmb_meta( 'rs_sessao_id', 'type=text', $pdi );
                          
                          //Cineclube Vinculado com Sessao por ID CINECLUBE
                          $nome_cineclube = rwmb_meta( 'ss_cineclube_nome', 'type=text', $sessao_id );
                          $cineclube_id = rwmb_meta( 'ss_cineclube_id', 'type=text', $sessao_id );
                          $horario = rwmb_meta( 'ss_horario', 'type=text', $sessao_id  );

                          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $sessao_id ), 'full' );
                          $thumb_url = $thumb['0']; 

                           if(empty($thumb_url)){
                                $thumb_url = "/wp-content/uploads/cineclube/sessao.png";
                              }

                      ?>

                    <li class="media">
                        <a class="pull-left" href="<?php echo the_permalink(); ?>"><img class="media-object" src="<?php echo  $thumb_url ?>" height="64" width="64"></a>
                        <div class="media-body">
                            <h1 class="media-heading">
                                <a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            </h1>
                            <p class="bloco_cineclubes">
                                <a href="<?php echo get_permalink( $cineclube_id ); ?>"><b><?php echo $nome_ceu; ?></b></a>
                            </p>
                            <p class="bloco_cineclubes"><?php echo  $data ?> - <?php echo $horario ?></p>
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
