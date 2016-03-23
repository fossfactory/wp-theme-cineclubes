<?php
/*
Template Name: Cineclubes
*/

get_header(); ?>

    <?php
       //Count Cineclubes
       $cineclubes = wp_count_posts( 'cineclube' );
       $cineclubes = $cineclubes->publish;


      //Count Filmes/
      $args = array(
          'post_type' => 'sessao',
          'posts_per_page' => -1,
      );
      $sessao = new WP_Query( $args );
      while ( $sessao->have_posts() ) : $sessao->the_post();
        $pdi = $post->ID;
        for($i = 1; $i <= 16; $i++){
          $filme = rwmb_meta( 'ss_nome_filme'.$i, 'type=text', $pdi  );
          if(!empty($filme)){
            $contFilme = $contFilme + 1;
          }
        }
      endwhile;

      //Count Expectadores/
      $args = array(
          'post_type' => 'relatorio_sessao',
          'posts_per_page' => -1,
      );
      $relatorio = new WP_Query( $args );
      while ( $relatorio->have_posts() ) : $relatorio->the_post();
          $pdi = $post->ID;
          $expectador = rwmb_meta( 'rs_pessoas_presentes', 'type=text', $pdi  ); 

          $expectadores = $expectadores +  $expectador;//Soma Quantidade de Expectadores
      endwhile;
    ?>
 
    
    <div class="section">
      <div class="container">
        <div class="row">
          <h1>
		Cineclubes
          </h1>
          <hr>
        </div>
        <div class="row">
          <div class="col-md-9">
		

		<?php the_post(); ?>

<?php the_content();?>
          </div>
          <div class="col-md-3">
            <div class="thumbnail">
            <?php the_post_thumbnail();?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <h2>
              Números da Rede
            </h2>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <ul class="media-list">
              <li class="media">
                <a class="pull-left" href="#"><img class="media-object" src="<?php echo get_template_directory_uri(); ?>/images/foto07.png" height="64" width="64"></a>
                <div class="media-body">
                  <h3 class="media-heading">
                    <a href="/sessoes">
                    <?php echo $cineclubes; ?> Cineclubes
                  </a>
                  </h3>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="media-list">
              <li class="media">
                <a class="pull-left" href="#"><img class="media-object" src="<?php echo get_template_directory_uri(); ?>/images/foto05.png" height="64" width="64"></a>
                <div class="media-body">
                  <h3 class="media-heading">
                    <a href="/sessoes">
                    <?php echo $contFilme; ?> Filmes Exibidos
                    </a>
                  </h3>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="media-list">
              <li class="media">
                <a class="pull-left" href="#"><img class="media-object" src="<?php echo get_template_directory_uri(); ?>/images/foto04_numeros_01.jpg.png" height="64" width="64"></a>
                <div class="media-body">
                  <h3 class="media-heading">
                    <a href="/sessoes">
                    <?php echo $expectadores; ?> Espectadores
                    </a>
                  </h3>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-12">
		<div style="height:400px">
			<?php get_template_part( 'mapa/cineclubes-home'); ?>
		</div>

          </div>
        </div>
      </div>
    </div>
    <hr>
   

    <hr>


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


  
  <hr>
  <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Lista de Cineclubes PostTypes -->
            <div id="lista-cineclubes" class="rows">
              <?php
                
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'cineclube',
                    'posts_per_page' => 10,
                    'paged' => $paged 
                );

                $loop_cineclubes = new WP_Query( $args );
                while ( $loop_cineclubes->have_posts() ) : $loop_cineclubes->the_post();
                $pdi = $post->ID;

                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pdi), 'full' );
                $thumb_url = $thumb['0'];    

                /**
                ** Get MetasBoxs
                **/
                $biografia = rwmb_meta( 'cb_biografia', 'type=text', $pdi  );
                $estado = rwmb_meta( 'cb_estado', 'type=text', $pdi  );
                $cidade = rwmb_meta( 'cb_cidade', 'type=text', $pdi  );

                 if(empty($thumb_url)){
                    $thumb_url = "/wp-content/uploads/cineclube/cineclube.jpg";
                  }
                
              ?>
              <div class="row">
                <a class="caixa" href="<?php echo the_permalink(); ?>">
                  <div class="col-md-2 image">
                      <img src="<?php echo  $thumb_url ?>" />
                      <p><?php echo $cidade . " - " . $estado ?></p>
                    </div>
                  <div class="col-md-8 text">
                      <h2><?php echo  substr(get_the_title(), 0, 100); ?></h2>
                      <p><?php 
                        echo substr($biografia, 0, 300); 
                        if ( strlen($biografia) > 300 )  echo ' ...';
                      ?></p>
                  </div>
                </a>
              </div>

              <?php 
                  endwhile; //End While Post
              ?>

              <div class="row">
                <div class="col-md-12">
                  <?php
                      //PAGINATION
                      custom_pagination($loop_cineclubes->max_num_pages,"",$paged);
                  ?>
                </div>
              </div>

            </div>  
          </div>
        </div>
      </div>
    </div>


<div style="height:100px"></div>

<?php get_footer(); ?>

