<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">

  <div id="content" class="site-content space" role="main">
    <?php 
        while ( have_posts() ) : the_post();
        $pdi = $post->ID;

        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pdi), 'full' );
        $thumb_url = $thumb['0']; 

         if(empty($thumb_url)){
            $thumb_url = "/wp-content/uploads/cineclube/cineclube.jpg";
          }

          /**
          ** Get MetasBoxs CINECLUBE
          **/
          $nome_ceu = rwmb_meta( 'cb_nome_ceu', 'type=text', $pdi  );
          $logradouro = rwmb_meta( 'cb_logradouro', 'type=text', $pdi  );
          $numero = rwmb_meta( 'cb_numero', 'type=text', $pdi  );
          $complemento = rwmb_meta( 'cb_complemento', 'type=text', $pdi  );
          $bairro = rwmb_meta( 'cb_bairro', 'type=text', $pdi  ); 
          $cidade = rwmb_meta( 'cb_cidade', 'type=text', $pdi  );
          $estado = rwmb_meta( 'cb_estado', 'type=text', $pdi  );
          $cep = rwmb_meta( 'cb_cep', 'type=text', $pdi  ); 
          $capacidade = rwmb_meta( 'cb_capacidade', 'type=text', $pdi  );
          $biografia = rwmb_meta( 'cb_biografia', 'type=text', $pdi  );
          $email_prin = rwmb_meta( 'cb_email_prin', 'type=text', $pdi  ); 
          $email_secun = rwmb_meta( 'cb_email_secun', 'type=text', $pdi  );
          $telefone_prin = rwmb_meta( 'cb_telefone_prin', 'type=text', $pdi  );
          $telefone_secun = rwmb_meta( 'cb_telefone_secun', 'type=text', $pdi  ); 
          $facebook = rwmb_meta( 'cb_facebook', 'type=text', $pdi  );
          $twitter = rwmb_meta( 'cb_twitter', 'type=text', $pdi  );
          $instagram = rwmb_meta( 'cb_instagram', 'type=text', $pdi  ); 
          $arquivos = rwmb_meta( 'cb_arquivos', 'type=text', $pdi  );
    ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
           <div class="section">
            <div class="container">
              <div class="row">
                <h1>
                  <?php the_title(); ?>
                </h1>
                <hr>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <p class="text-justify">
                   <?php echo $biografia ?>
                 </p>
               </div>
               <div class="col-md-4">
                <div class="thumbnail">
                  <img src="<?php echo  $thumb_url ?>" class="img-responsive"/>
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
                <div class="cineLocalizacao">
                  <h2>
                    Estrutura
                  </h2>
                  <h3>
                    <b>
                      Capacidade: <?php echo $capacidade ?> pessoas
                    </b>
                    <br>
                    Recebe filmes pela internet?
                    <b>
                      <?php echo $arquivos ?>
                    </b>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <br>
                  </h3>
                  <hr>
                </div>
              </div>
              <div class="col-md-12">
                <div class="cineLocalizacao">
                  <h2>
                    Onde?
                  </h2>
                  <h3>
                    <b>
                      <?php echo $nome_ceu  ?>
                    </b>
                    <br>
                    <?php echo $logradouro ?>, <?php echo $numero ?>
                    <br>
                    <?php echo $bairro ?> - <?php echo $cidade ?> - <?php echo $estado ?> - CEP: <?php echo $cep ?>
                  </h3>
                  <hr>
                </div>
              </div>
              <div class="col-md-5">
                <div class="cineLocalizacao">
                  <h2>
                    Contato
                  </h2>
                  <h3>
                    <b>
                      Email:&nbsp;
                    </b>
                    <?php echo $email_prin ?>
                    <br>
                    <b>
                      Telefone:
                    </b>
                    <?php echo $telefone_prin ?>
                  </h3>
                </div>
              </div>
              <div class="col-md-7">
                <div class="cineLocalizacao">
                  <h2>Redes Sociais</h2><br>
                  <div class="row text-center">
                     <?php 
                        if(!empty($instagram)){
                      ?>
                    <div class="col-xs-1 text-center">
                      <a href="http://<?php echo $instagram ?>" target="_blank"><i class="fa fa-3x fa-fw fa-instagram"></i></a>
                    </div>
                    <?php 
                      }
                      if(!empty($twitter)){
                    ?>
                    <div class="col-xs-1">
                      <a href="http://<?php echo $twitter ?>" target="_blank"><i class="fa fa-3x fa-fw fa-twitter"></i></a>
                    </div>
                    <?php 
                      }
                      if(!empty($facebook)){
                    ?>
                    <div class="col-xs-1">
                      <a href="http://<?php echo $facebook ?>" target="_blank"><i class="fa fa-3x fa-facebook fa-fw"></i></a>
                    </div>
                    <?php
                      }
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
            <h1>
              Próximas sessões do cineclube
            </h1>
            <hr>
            <div class="col-md-12">
              <!-- Calendar -->
              <div id='wrap'>
                <div id='calendar' class="single-calendar <?php echo $pdi ?>"></div>
                <div style='clear:both'></div>
              </div>
              <!-- Calendar -->
            </div>
          </div>
        </div>
        </div>
      </article><!-- #post -->
    <?php endwhile; ?>    
  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
