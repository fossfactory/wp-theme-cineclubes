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

            /**
            ** Get MetasBoxs RELATORIO fSESSÃO
            **/
            $data = rwmb_meta( 'ss_data', 'type=text', $pdi  );
            $horario = rwmb_meta( 'ss_horario', 'type=text', $pdi  );
            $requisito = rwmb_meta( 'ss_requisito', 'type=text', $pdi  );
            
            $havera_debate = rwmb_meta( 'ss_havera_debate', 'type=text', $pdi  ); 
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pdi), 'full' );
            $thumb_url = $thumb['0']; 

             if(empty($thumb_url)){
              $thumb_url = "/wp-content/uploads/cineclube/sessao.png";
            }

        
            $logradouro = rwmb_meta( 'ss_logradouro', 'type=text', $pdi  );
            $numero = rwmb_meta( 'ss_numero', 'type=text', $pdi  );
            $complemento = rwmb_meta( 'ss_complemento', 'type=text', $pdi  );
            $bairro = rwmb_meta( 'ss_bairro', 'type=text', $pdi  ); 
            $cidade = rwmb_meta( 'ss_cidade', 'type=text', $pdi  );
            $estado = rwmb_meta( 'ss_estado', 'type=text', $pdi  );
            $cep = rwmb_meta( 'ss_cep', 'type=text', $pdi  ); 
            
            $cineclube_nome = rwmb_meta( 'ss_cineclube_nome', 'type=text', $pdi  ); 
            $cineclube_id = rwmb_meta( 'ss_cineclube_id', 'type=text', $pdi  ); 
            $cineclube_link = get_permalink( $cineclube_id );
            //$cineclube_telefone = rwmb_meta( 'cb_telefone_prin', 'type=text',  $cineclube_id  );

            

        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="section">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="section">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-8 cineLocalizacao">
                            <h1><?php the_title(); ?></h1>
                            <hr>
                            <h4>
                              <b>Onde?</b>
                              <br>
                              <a href="<?php echo $cineclube_link ?>" target="_blank"><?php echo $cineclube_nome ?></a>
                              <br><?php echo $logradouro ?>, <?php echo $numero ?> - <?php echo $complemento ?>
                              <br><?php echo $cep ?>
                              <br><?php echo $bairro ?> - <?php echo $cidade ?> - <?php echo $estado ?></h4>
                              <h4>
                                  <b>Quando?</b>
                                  <br><?php echo $data ?>, <?php echo $horario ?></h4>
                                  <!-- <h4>
                                       <b>Fone de Contato</b> 
                                      <br><?php //echo $cineclube_telefone ?></h4> -->
                                      <h4>
                                          <b>Sessão gratuita?</b>
                                          <br><?php echo $requisito ?></h4>
                                          <hr>
                                          <h3>
                                              <b>Filmes a serem exibidos</b>
                                          </h3>
                                           <ul>
                                          <?php 

                                            //ForNome Do Filme
                                            for($i = 1; $i <= 16; $i++){
                                                
                                                $nome_filme = rwmb_meta( 'ss_nome_filme'.$i, 'type=text', $pdi  );
                                                $nome_original = rwmb_meta( 'ss_nome_original'.$i, 'type=text', $pdi  ); 
                                                $direcao = rwmb_meta( 'ss_direcao'.$i, 'type=text', $pdi  );
                                                $ano = rwmb_meta( 'ss_ano'.$i, 'type=text', $pdi  );
                                                $pais = rwmb_meta( 'ss_pais'.$i, 'type=text', $pdi  );
                                                $idioma = rwmb_meta( 'ss_idioma'.$i, 'type=text', $pdi  );
                                                $leg_dub = rwmb_meta( 'ss_leg_dub'.$i, 'type=text', $pdi  );
                                                $sinopse = rwmb_meta( 'ss_sinopse'.$i, 'type=text', $pdi  );
                                                $minibio = rwmb_meta( 'ss_minibio'.$i, 'type=text', $pdi  );
                                                $classificacao = rwmb_meta( 'ss_classificacao'.$i, 'type=text', $pdi  );
                                                
                                                 if(strlen($nome_filme) > 1){
                                          ?>
                                                <li>
                                                      <b><?php echo $nome_filme ?></b><br />
                                                      <strong>Direção:</strong> <?php echo $direcao ?><br />
                                                      <strong>Ano:</strong> <?php echo $ano ?><br />
                                                      <strong>País:</strong> <?php echo $pais ?><br />
                                                      <strong>Idioma falado:</strong> <?php echo $idioma ?><br />
                                                      <strong>Legendado e/ou Dublabo:</strong> <?php echo $leg_dub ?><br />
                                                      <b>Sinopse:</b> <i><?php echo $sinopse ?></i><br />
                                                      <b>Classificação:</b> <?php echo $classificacao ?>
                                                </li>
                                            <?php 
                                                 };//end if
                                                }//end for
                                            ?>
                                              </ul>
                                              <hr>
                                              <h3><b>Informações sobre o Debate</b></h3>
                                                <?php 
                                                    if($havera_debate == "nao"){
                                                        echo "<p>Não haverá debate</p>";
                                                    }else{
                                                       echo " <p><b>Debatedore(s):</b></p>";
                                                        echo "<ul>";
                                                        for($d = 1; $d <= 5; $d++){
                                                          $nome_debatedor = rwmb_meta( 'ss_nome_debatedor'.$d, 'type=text', $pdi  );
                                                          $foto_debatedor = rwmb_meta( 'ss_foto_debatedor'.$d, 'type=image', $pdi  );
                                                          $bibliografia = rwmb_meta( 'ss_bibliografia_debatedor'.$d, 'type=text', $pdi  );

                                                          if(strlen($nome_debatedor) > 1){
                                                ?>
                                                            <li class="debatedores">
                                                                <b><?php echo $nome_debatedor ?></b>
                                                                <br>
                                                                <div class="col-md-3">
                                                                    <?php 
                                                                        foreach ( $foto_debatedor as $f ){ 
                                                                            echo "<img src='".$f['url']."' class='img-responsive'>";
                                                                        }
                                                                    ?>
                                                                <i>Mini-bio: <?php echo $bibliografia ?></i>
                                                                    
                                                                </div><br />
                                                            </li>

                                                <?php 
                                                            }//End If strlen;
                                                        };//End For
                                                        echo "</ul>";
                                                    };//End If Havera Debate
                                                ?>
                                                  
                                              </div>
                                              <div class="col-md-4">
                                                <img src="<?php echo $thumb_url ?>" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </article><!-- #post -->
    <?php endwhile; ?>
    </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
