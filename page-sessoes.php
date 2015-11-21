<?php
/*
Template Name: Sessões
*/

get_header(); ?>



<div id="primary" class="content-area">

  <div class="section">  
   <div class="container"> 
    <div class="row">
      <h1>
        <a href="sessoes.html">Sessões da Rede: a telona dos cines!</a>
      </h1>
      <hr>
      <div class="col-md-6">
       <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Calendar -->
              <div id='wrap'>
                <div id='calendar'></div>
                <div style='clear:both'></div>
              </div>
              <!-- Calendar -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<hr>


<div class="section">
 <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>
        Próximas sessões
      </h1>
    </div>
  </div>
  <hr>
  <div class="row">
   <!-- Lista de SESSOES PostTypes -->
   <div id="lista-cineclubes" class="rows">
    <?php

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(
      'post_type' => 'sessao',
      'order' => 'DESC',
      'orderby' => 'meta_value',
      'meta_key' => 'ss_data',
      'posts_per_page' => 4,
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
      $relato = rwmb_meta( 'ss_relato', 'type=text', $pdi  ); 

      $nome_ceu = rwmb_meta( 'ss_cineclube_nome', 'type=text', $pdi  );
      $cineclube_id = rwmb_meta( 'ss_cineclube_id', 'type=text', $pdi  );
      $data = rwmb_meta( 'ss_data', 'type=text', $pdi  );
      $horario = rwmb_meta( 'ss_horario', 'type=text', $pdi  );

      ?>

      <div class="row">
        <a class="caixa" href="<?php echo the_permalink(); ?>">
          <div class="col-md-2 image">
            <img src="<?php echo  $thumb_url ?>" />
          </div>
          <div class="col-md-8 text">
            <h2><?php echo get_the_title(); ?></h2>
            <p><a href="<?php echo get_permalink( $cineclube_id ); ?>"> <?php echo  $nome_ceu; ?></a> <span><?php echo  $data ?> <?php echo  $horario ?></span></p>
          </div>
        </a>
      </div>

    <?php endwhile; wp_reset_query(); ?>

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
</div>
<hr>







<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>
          Histórico de sessões e debates realizados
        </h1>
      </div>
    </div>
    <hr>
    <div class="row">
     <!-- Lista de SESSOES PostTypes -->
     <div id="lista-cineclubes" class="rows">
      <?php

      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

      $args = array(
        'post_type' => 'relatorio_sessao',
        'order' => 'ASC',
        'orderby' => 'meta_value',
        'meta_key' => 'rs_data_sessao',
        'posts_per_page' => 4,
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
      $data = rwmb_meta( 'rs_data_sessao', 'type=text', $pdi  );


      //Relatorio Vinculado com Sessao por ID SESSAO
      $sessao_id = rwmb_meta( 'rs_sessao_id', 'type=text', $pdi );
      
      //Cineclube Vinculado com Sessao por ID CINECLUBE
      $nome_cineclube = rwmb_meta( 'ss_cineclube_nome', 'type=text', $sessao_id );
      $cineclube_id = rwmb_meta( 'ss_cineclube_id', 'type=text', $sessao_id );
      $horario = rwmb_meta( 'ss_horario', 'type=text', $sessao_id  );

      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $sessao_id ), 'full' );
      $thumb_url = $thumb['0']; 

      ?>

      <div class="row">
        <a class="caixa" href="<?php echo the_permalink(); ?>">
          <div class="col-md-2 image">
            <img src="<?php echo  $thumb_url ?>" />
          </div>
          <div class="col-md-8 text">
            <h2><?php echo get_the_title(); ?></h2>
            <p><a href="<?php echo get_permalink( $cineclube_id ); ?>"> <?php echo  $nome_cineclube; ?></a> <span><?php echo  $data ?> <?php echo  $horario ?></span></p>
          </div>
        </a>
      </div>

    <?php endwhile; wp_reset_query(); ?>

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
</div>

</div>  


<?php get_footer(); ?>
