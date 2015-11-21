
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
      global $current_user;
		  
      $args = array(
        'post_type' => 'sessao',
        'posts_per_page' => -1,
        'author' => $current_user->ID,
      );

      $loop_sessoes = new WP_Query( $args );
      
      $cont = 0;
      while ( $loop_sessoes->have_posts() ) : $loop_sessoes->the_post();
        $relatorio_id = rwmb_meta( 'ss_id_relatorio', 'type=text', $pdi[$cont]  );
        if( empty( $relatorio_id ) ){
          $pdi[$cont] = $post->ID;
          $title[$cont] = get_the_title();
          $data_sessao[$cont] = rwmb_meta( 'ss_data', 'type=text', $pdi[$cont]  );
          $cont++;
        }
      endwhile;
	?>

	<header class="entry-header">
		<h2>Cadastro Relatório da Sessão</h2>
	</header><!-- .entry-header -->
  
	<div class="entry-content">
		<form id="form_form_relatorio" name="form_form_relatorio" method="post" action="" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
    					<label for="nome_da_sessao">Nome da sessão
              <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escolha a sessão a qual deseja preencher um relatório.">?</button></label>
              <select name="title" class="js-title-sessao form-control"  >
                <?php 
                    for( $i = 0; $i < $cont; $i++ ){
                      echo '<option value=" ' . $title[$i] . '" rel="' . $pdi[$i] . '" date="'. $data_sessao[$i].'" >' . $title[$i] . '</option>';
                    }
                ?>
              </select>
              <input type="hidden" name="sessao_id" class="js-sessao-id" value="">

    				</div>
    			</div>
          <div class="row">
                <div class="col-md-12">
                    <label> A Sessão foi Realizada ou Cancelada? <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe se a sessão foi realizada ou foi cancelada.">?</button></label>
                    <label class="linha"><input type="radio" name="sessao_cancelada" value="realizada" class="js-sessaorealizada"> Realizada</label>
                    <label class="linha"><input type="radio" name="sessao_cancelada" value="cancelada" class="js-sessaorealizada"> Cancelada</label>
                </div>
           </div>
           <div class="row js-sessao-cancelada hide">
                <div class="col-md-12">
                    <label for="sessao_cancelada_arquivo"> Justificativa da não-realização
                    <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Descreva qual motivo da não realização da sessão.">?</button></label>
                    <textarea name="justificativa_nao"></textarea>
                </div>
                <div class="col-md-12">
                  <label>Arquivo<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Se houve algum problema com sua sala de projeção, furto, etc, você pode subir documentos que comprovem a não realização da sessão(nome da imagem sem caracteres especiais).">?</button></label>

                  <!-- Content Upload Necessity -->
                  <input type="hidden" name="arquivo_just" class="arquivo_just" value="">

                  <div class="hide preview-image arquivo_just">
                    <img src="" >
                  </div>
                  <!-- BTN UPLOAD -->
                    <div class="container">
                        <div class="row" style="padding-top:10px;">
                            <div class="col-xs-2">
                                <button id="arquivo_just" class="btn btn-large btn-primary btn-upload arquivo_just">Upload Arquivo</button>
                            </div>
                            <div class="col-xs-10">
                              <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                                <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px;">
                            <div class="col-xs-10">
                              <div id="msgBox">
                              </div>
                            </div>
                        </div>
                      </div>
                    <!-- BTN UPLOAD -->
                    <!-- Content Upload Necessity  -->
                </div>
           </div>
           <div class="js-sessao-realizada hide">
           <div class="row">
                <div class="col-md-12">
                    <label for="sessao_cancelada">Data da Sessão
                    <button type="button" class="infos " data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button></label>
                    <input type="date" name="data_sessao"  min="2011-01-01" value="" class="js-sessao-data">
                </div>
           </div>
           <div class="row">
           		<div class="col-md-12">
      					<label for="pessoas_presentes">Número total de pessoas presentes</label>
      					<input type="number" name="pessoas_presentes" value="">
          		</div>
           </div>
           <div class="row">
           		<div class="col-md-12">
      					<label for="divulgacao_feita_como">A divulgação da sessão foi feita como? 
                <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe todos os meios pelos quais a sessão foi divulgada.">?</button></label>
      					<label class="linha"><input type="checkbox" name="divulgacao[]" value="cartaz" > Cartaz</label>
                <label class="linha"><input type="checkbox" name="divulgacao[]" value="planfeto" > Planfeto</label>
                <label class="linha"><input type="checkbox" name="divulgacao[]" value="jornal_impresso" > Jornal impresso</label>
                <label class="linha"><input type="checkbox" name="divulgacao[]" value="tv" > TV</label>
                <label class="linha"><input type="checkbox" name="divulgacao[]" value="radio" > Rádio</label>
                <label class="linha"><input type="checkbox" name="divulgacao[]" value="site" > Site</label>
                <label class="linha"><input type="checkbox" name="divulgacao[]" value="email" > Lista de e-mails</label>
                <label class="linha"><input type="checkbox" name="divulgacao[]" value="redes_social" > Redes sociais</label> 
      				</div>
      			</div>
            <div class="row">
              <div class="col-md-12">
                <label for="relato">Foi Realizado outro tipo de divulgação não listado acima?Qual?
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                </label>
                <input type="text" name="divulgacao_opcional">
              </div>
           </div>
		
           <div class="row">
           		<div class="col-md-12">
      					<label for="relato">Relato de sessão 
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                </label>
      					<textarea name="relato" rows="8" cols="40"></textarea>
          		</div>
           </div>
           <div class="row">
           		<div class="col-md-12">
          					<label for="fetaria_prim">
          						Selecione primeira faixa etária em maioria durante a sessão
                       <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
          					</label>
                    <label class="linha"><input type="radio" name="fetaria_prim" value="crianca"> Criança (0 a 14)</label>
                    <label class="linha"><input type="radio" name="fetaria_prim" value="jovem"> Jovem (15 a 29 anos)</label>
                    <label class="linha"><input type="radio" name="fetaria_prim" value="adulto"> Adulto (30 e 59 anos)</label>
                    <label class="linha"><input type="radio" name="fetaria_prim" value="idoso"> Idoso (60 ou mais)</label>
      				</div>
      			</div>
            <div class="row">
                <div class="col-md-12">
                    <label for="fetaria_prim">
                        Selecione segunda faixa etária em maioria durante a sessão
                         <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                    </label>
                    <label class="linha"><input type="radio" name="fetaria_segun" value="crianca"> Criança (0 a 14)</label>
                    <label class="linha"><input type="radio" name="fetaria_segun" value="jovem"> Jovem (15 a 29 anos)</label>
                    <label class="linha"><input type="radio" name="fetaria_segun" value="adulto"> Adulto (30 e 59 anos)</label>
                    <label class="linha"><input type="radio" name="fetaria_segun" value="idoso"> Idoso (60 ou mais)</label>
                </div>
            </div>

           <div class="row">
           		<div class="col-md-12">
      					<label for="nome_resp_relatorio">Nome do responsável por preencher o relatório
                <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                </label>
      					<input type="text" name="nome_resp_relatorio" value="">
          		</div>
           </div>
           <div class="row">
           		<div class="col-md-12">
        					<label for="email_respo">E-mail do responsável
                      <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                  </label>
        					<input type="email" name="email_respo" value="">
          		</div>
           </div>
           <div class="row">
           		<div class="col-md-12">
      					<label for="telefone_resp">Telefone do responsável
                    <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                </label>
      					<input type="text" name="telefone_resp" value="">
          		</div>
           </div>
           <div class="row">
           		<div class="col-md-12">
      					<label for="funcao_respo">Função do responsável exercida na sessão
                    <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                </label>
      					<input type="text" name="funcao_respo" value="">
          		</div>
           </div>
           <div class="row">
           		<div class="col-md-12">
                <label> Fotos da Sessão <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Fotos da sessão(nome da imagem sem caracteres especiais).">?</button></label>
      					
                <?php 
                    //BTN UPLOAD IMAGE
                    for($i = 1; $i <= 6; $i++){
                ?>
                <div class="content-upload">
                <!-- Content Upload Necessity -->
                <input type="hidden" name="foto_sessao<?php echo $i ?>" class="foto_sessao<?php echo $i ?>" value="">

                <div class="hide preview-image foto_sessao<?php echo $i ?>">
                  <img src="" >
                </div>
                <!-- BTN UPLOAD -->
                <div class="container">
                    <div class="row" style="padding-top:10px;">
                        <div class="col-xs-2">
                            <button id="foto_sessao<?php echo $i ?>" class="btn btn-large btn-primary btn-upload foto_sessao<?php echo $i ?>">Nova Foto</button>
                        </div>
                        <div class="col-xs-10">
                          <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                            <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top:10px;">
                        <div class="col-xs-10">
                          <div id="msgBox">
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <?php 
                  }//End For BTN Upload Fotos Relatorio 
                ?>
              
      				</div>
      			</div>
           <div class="row">
           		<div class="col-md-12">
        					<label for="links_da_sessao">Houve alguma outra atividade programada junto a sessão?
                   <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                  </label>
			          	<label class="linha"><input type="radio" name="atividade_programada" value="sim" > Sim</label> 
                  <label class="linha"><input type="radio" name="atividade_programada" value="nao" > Não</label> 
                  <label>Se sim conte um pouco <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                   <br ><textarea name="atividade_programada_desc" rows="8" cols="40"></textarea></label>
      				</div>
      			</div>
            <div class="row">
                <div class="col-md-12">
                    <label for="links_relacionados">Links relacionados a sessão <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button></label>
                    <textarea name="links_relacionados"></textarea>
                </div>
           </div>
           </div>
          <div class="loading"></div>

           <div class="hide message-success">
            <h3>Salvo com Sucesso!</h3>
          </div>

           <div class="row">
           		<div class="col-md-12">
					<input type="submit" value="Cadastrar sessão">
    				</div>
    			</div>
          
          <input type="hidden" name="action" value="form_form_relatorio" />
          <?php wp_nonce_field( 'form_form_relatorio' ); ?>
          
		</form>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
