<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

global $sessao_id ;

get_header(); ?>

    <div id="primary" class="content-area padd-post2">
            

    
        <div id="content" class="site-content space" role="main">

            <?php 
                while ( have_posts() ) : the_post();
                
                /**
                ** Get MetasBoxs SESSÃO
                **/
                
                $sessao_cancelada = rwmb_meta( 'rs_sessao_cancelada', 'type=text', $pdi  );
                $justificativa = rwmb_meta( 'rs_justificativa_nao', 'type=text', $pdi  );
                $arquivo = rwmb_meta( 'rs_arquivo_just', 'type=file', $pdi  );
                $pessoas_presentes = rwmb_meta( 'rs_pessoas_presentes', 'type=text', $pdi  );
                $divulgacao = rwmb_meta( 'rs_divulgacao', 'type=text', $pdi  );
                $divulgacao_opcional = rwmb_meta( 'rs_divulgacao_opcional', 'type=text', $pdi  );
                $relato = rwmb_meta( 'rs_relato', 'type=text', $pdi  ); 
                $fetaria_prim = rwmb_meta( 'rs_fetaria_prim', 'type=text', $pdi  );
                $fetaria_segun = rwmb_meta( 'rs_fetaria_segun', 'type=text', $pdi  );
                $nome_resp_relatorio = rwmb_meta( 'rs_nome_resp_relatorio', 'type=text', $pdi  );
                $email_resp = rwmb_meta( 'rs_email_respo', 'type=text', $pdi  );
                $telefone_resp = rwmb_meta( 'rs_telefone_resp', 'type=text', $pdi  );
                $funcao_respo = rwmb_meta( 'rs_funcao_respo', 'type=text', $pdi  );
                $foto_sessão = rwmb_meta( 'rs_foto_sessão', 'type=text', $pdi  );
                $atividade_programada = rwmb_meta( 'rs_atividade_programada', 'type=text', $pdi  ); 
                $data_sessao = rwmb_meta( 'rs_data_sessao', 'type=text', $pdi  );

                $links_relacionados = rwmb_meta( 'rs_links_relacionados', 'type=text', $pdi  );
                
                
                //Relatorio Vinculado com Sessao por ID SESSAO
                $sessao_id = rwmb_meta( 'rs_sessao_id', 'type=text', $pdi );
                
                //Cineclube Vinculado com Sessao por ID CINECLUBE
                $cineclube_nome = rwmb_meta( 'ss_cineclube_nome', 'type=text', $sessao_id );
                $cineclube_id = rwmb_meta( 'ss_cineclube_id', 'type=text', $sessao_id  );
                $horario = rwmb_meta( 'ss_horario', 'type=text', $sessao_id  );
                $capacidade = rwmb_meta( 'cb_capacidade', 'type=text',  $cineclube_id  );
                $internet = rwmb_meta( 'cb_internet', 'type=text',  $cineclube_id  );
                $email_prin = rwmb_meta( 'cb_email_prin', 'type=text',  $cineclube_id  );
                $email_secun = rwmb_meta( 'cb_email_secun', 'type=text',  $cineclube_id  ); 
                $telefone_prin = rwmb_meta( 'cb_telefone_prin', 'type=text',  $cineclube_id  ); 
                $telefone_secun = rwmb_meta( 'cb_telefone_secun', 'type=text',  $cineclube_id  );
                $facebook = rwmb_meta( 'cb_facebook', 'type=text',  $cineclube_id  ); 
                $twitter = rwmb_meta( 'cb_twitter', 'type=text',  $cineclube_id  ); 
                $instagram = rwmb_meta( 'cb_instagram', 'type=text',  $cineclube_id  );  
    


                $logradouro = rwmb_meta( 'ss_logradouro', 'type=text', $sessao_id   );
                $numero = rwmb_meta( 'ss_numero', 'type=text', $sessao_id   );
                $complemento = rwmb_meta( 'ss_complemento', 'type=text',  $sessao_id   );
                $bairro = rwmb_meta( 'ss_bairro', 'type=text',  $sessao_id   ); 
                $cidade = rwmb_meta( 'ss_cidade', 'type=text',  $sessao_id  );
                $estado = rwmb_meta( 'ss_estado', 'type=text',  $sessao_id   );
                $requisito = rwmb_meta( 'ss_requisito', 'type=text', $sessao_id  );
                $cep = rwmb_meta( 'ss_cep', 'type=text',  $sessao_id   ); 
                $havera_debate = rwmb_meta( 'ss_havera_debate', 'type=text', $sessao_id  ); 
            
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $sessao_id ), 'full' );
                $thumb_url = $thumb['0']; 


                 if(empty($thumb_url)){
                      $thumb_url = "/wp-content/uploads/cineclube/sessao.png";
                    }
               


            ?>
            <?php 
                //verificar sessão realizada
                if( $sessao_cancelada == "realizada" ){
            ?> 
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 cineLocalizacao">
                                                <h1>
                                                    <?php the_title(); ?>
                                                </h1>
                                                <p class="text-justify">
                                                   <?php echo $relato ?>
                                                </p>
                                                <hr>
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
                    <div class="section">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="cineLocalizacao">
                              <h2>Informações</h2>
                                <b><a href="<?php echo get_permalink( $cineclube_id ); ?>" target="_blank"><?php echo $cineclube_nome ?></a></b><br>
                                Endereço<br>
                                <?php echo $logradouro ?>, <?php echo $numero ?><br>
                                <?php echo $bairro ?> - <?php echo $cidade ?> - <?php echo $estado ?> -&nbsp;CEP: <?php echo $cep ?><br>
                                <b>Capacidade:</b> <?php echo $capacidade ?><br>
                                <b>Recebe filmes pela internet? </b><?php  echo $internet ?> <br>


                                <b>Email Principal:&nbsp;</b><?php  echo $email_prin ?><br>
                                <b>Email Secundário:&nbsp;</b><?php  echo $email_secun ?><br>
                                <b>Telefone Principal:</b>&nbsp;<?php  echo $telefone_prin ?> <br>
                                <b>Telefone Secundário:</b>&nbsp;<?php  echo $telefone_secun ?><br>


                                <p>Redes sociais do cineclube</p>
                                Facebook:  <?php  echo $facebook ?><br>
                                Twitter:   <?php  echo $twitter ?><br>
                                Instagram: <?php  echo $instagram ?><br>

                                Insira Tags de Pesquisa<br>

                                <h3>Nome da sessão: <?php the_title(); ?></h3>
                                <b>Data e hora da apresentação</b>: <?php echo $data_sessao ?> - <?php echo $horario ?><br>
                                <b>Requisito de entrada na sessão:</b> <?php echo $requisito ?><br>

                                <h3>Filmes a serem exibidos</h3>
                                <ul>
                                <?php 

                                    //ForNome Do Filme
                                    for($i = 1; $i <= 16; $i++){
                                        
                                        $nome_filme = rwmb_meta( 'ss_nome_filme'.$i, 'type=text', $sessao_id  );
                                        $nome_original = rwmb_meta( 'ss_nome_original'.$i, 'type=text', $sessao_id  ); 
                                        $direcao = rwmb_meta( 'ss_direcao'.$i, 'type=text', $sessao_id  );
                                        $ano = rwmb_meta( 'ss_ano'.$i, 'type=text', $sessao_id  );
                                        $pais = rwmb_meta( 'ss_pais'.$i, 'type=text', $sessao_id  );
                                        $idioma = rwmb_meta( 'ss_idioma'.$i, 'type=text', $sessao_id  );
                                        $leg_dub = rwmb_meta( 'ss_leg_dub'.$i, 'type=text', $sessao_id  );
                                        $sinopse = rwmb_meta( 'ss_sinopse'.$i, 'type=text', $sessao_id  );
                                        $minibio = rwmb_meta( 'ss_minibio'.$i, 'type=text', $sessao_id  );
                                        $classificacao = rwmb_meta( 'ss_classificacao'.$i, 'type=text', $sessao_id  );
                                        
                                         if( strlen( $nome_filme ) > 1 ){
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
                                
                                <h3>Debate </h3>
                                <?php 
                                    if($havera_debate == "nao"){
                                        echo "<p>Não haverá debate</p>";
                                    }else{
                                        echo " <p><b>Debatedore(s):</b></p>";
                                        echo "<ul>";
                                        for($de = 1; $de <= 5; $de++){
                                          $nome_debatedor = rwmb_meta( 'ss_nome_debatedor'.$de, 'type=text', $sessao_id  );
                                          $foto_debatedor = rwmb_meta( 'ss_foto_debatedor'.$de, 'type=image', $sessao_id  );
                                          $bibliografia   = rwmb_meta( 'ss_bibliografia_debatedor'.$de, 'type=text', $sessao_id  );

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
                                        echo "</ul><br >";
                                    };//End If Havera Debate
                                ?>


                                <b>Número total de pessoas presentes:</b> <?php echo $pessoas_presentes ?><br>
                                <b>A divulgação da sessão foi feita como?</b> <?php echo $divulgacao ?><br>
                                <?php
                                    if(!empty($divulgacao_opcional)){
                                 ?> 
                                <b>Foi Realizado outro tipo de divulgação não listado acima? Qual?</b>
                                    <?php if( !empty($divulgacao_opcional) ) : ?>
                                        <?php echo $divulgacao_opcional ?> , 
                                    <?php   endif; 
                                        } 
                                    ?><br>
                                
                                <h3>Relato de sessão</h3>
                                <b>Selecione primeira faixa etária em maioria durante a sessão:</b> <?php echo $fetaria_prim ?> <br>
                                <b>Selecione segunda faixa etária em maioria durante a sessão:</b> <?php echo $fetaria_segun ?><br>
                                <b>Nome do responsável por preencher o relatório</b>: <?php echo $nome_resp_relatorio ?><br>
                                <b>E-mail do responsável:</b> <?php echo $email_resp ?> <br>
                                <b>Telefone do responsável:</b> <?php echo $telefone_resp ?><br>
                                <b>Função do responsável exercida na sessão:</b> <?php echo  $funcao_respo ?><br>



                                <b>Houve alguma outra atividade programada junto a sessão?</b> Sim<br>
                                <b>Se sim conte um pouco</b>: <?php  echo $atividade_programada ?><br>

                                <b>Links relacionados a sessão:</b> 
                                <ul>
                                    <?php  
                                        $links = explode("\n",  $links_relacionados); 
                                        $links =  preg_replace('<br >', '', $links);    
                                        foreach($links as  $link){
                                            echo '<li>';
                                                echo '<a href="'.$link.'" target="_blank">'.$link.'</a>';
                                            echo '</li>';
                                        }
                                    ?>
                                </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="section">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1>
                                        Fotos da sessão
                                    </h1>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                    //FOR FOTO RELATORIO SESSAO GET POST
                                    for($i = 1; $i <= 6; $i++){
                                       $foto = rwmb_meta( 'rs_foto_sessao'.$i, 'type=image', $pdi  );
                                        foreach ( $foto as $f ){ 
                                            if(!empty($f['url'])){
                                                echo '<div class="col-md-3">';
                                                echo '<a href="'.$f['url'].'" data-toggle="lightbox" data-gallery="multiimages" data-title="'.$title_post.'" >';
                                                echo '<img src="'.$f['url'].'"  class="img-responsive" alt="'.$title_post.'">';
                                                echo '</a>';
                                                echo '</div>';
                                            }
                                        }
                                    }
                                ?>
                            </div>
                    </div>

                </article>


                <?php 
                    //Verificar Sessão Cancelada
                    }else{
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="section">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 cineLocalizacao sessao-cancelada">
                                                <h1>
                                                    <?php the_title(); ?>
                                                </h1>
                                                <h3>
                                                  <b>Esta sessão foi cancelada.</b>
                                                </h3>
                                                <h4>Local da sessão:
                                                  <a href="<?php echo get_permalink( $cineclube_id ); ?>" target="_blank"><?php echo $cineclube_nome ?></a>
                                                </h4>
                                                <h4>Justificativa: <?php echo $justificativa ?></h4>
                                                <h4>

                                                    <?php
                                                        foreach ( $arquivo as $a ){
                                                     ?>
                                                        <a href="<?php echo $a['url'] ?>" target="_blank">Anexo.</a>

                                                    <?php 
                                                        }
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <?php
                    }//Sessão Realizada ELSE
                ?>
            <?php endwhile; ?>

        </div><!-- #content -->
    </div><!-- #primary -->
    
<?php get_footer(); ?>
