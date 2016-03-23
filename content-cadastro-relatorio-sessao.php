
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
      global $current_user;
		  
      $args = array(        
        'post_type'       => 'sessao',
        'posts_per_page'  => -1,
        'author'          => $current_user->ID        
      );

      $loop_sessoes = new WP_Query( $args );
      
      $cont = 0;
      while ( $loop_sessoes->have_posts() ) {
        $loop_sessoes->the_post(); 
        $relatorio_id = rwmb_meta( 'ss_id_relatorio', 'type=text', $loop_sessoes->ID );
        if( empty( $relatorio_id ) ){
          $pdi[$cont] = $post->ID;
          $title[$cont] = get_the_title();
          $data_sessao[$cont] = rwmb_meta( 'ss_data', 'type=text', $pdi[$cont]  );
          $cont++;
        }
       
      };

	?>

	<header class="entry-header">
		<h2>Cadastro Relatório da Sessão</h2>
	</header><!-- .entry-header -->
  
	<div class="entry-content">
  <?php if ($cont > 0) { ?>
		<form id="form_form_relatorio" class="form_obrigatorio" name="form_form_relatorio" method="post" action="" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
    					<label for="nome_da_sessao">Nome da sessão
              <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escolha a sessão a qual deseja preencher um relatório.">?</button></label>
              <select name="title" class="js-title-sessao form-control"  >
                <option value="" >Selecione a Sessão</option>
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
                    <div class="container col-xs-10">
                        <div class="row" style="padding-top:10px;">
                            <div class="col-xs-2">
                                <button id="arquivo_just" class="btn btn-large btn-primary btn-upload arquivo_just">Upload Arquivo</button>
                            </div>
                            <div class="col-xs-4">
                              <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                                <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px;">
                            <div class="col-xs-4">
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
                <label for="relato">Foi Realizado outro tipo de divulgação não listado acima? Qual?
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
                    <label class="linha"><input class="fetaria_exc" type="radio" name="fetaria_prim" value="crianca"> Criança (0 a 14)</label>
                    <label class="linha"><input class="fetaria_exc" type="radio" name="fetaria_prim" value="jovem"> Jovem (15 a 29 anos)</label>
                    <label class="linha"><input class="fetaria_exc" type="radio" name="fetaria_prim" value="adulto"> Adulto (30 e 59 anos)</label>
                    <label class="linha"><input class="fetaria_exc" type="radio" name="fetaria_prim" value="idoso"> Idoso (60 ou mais)</label>
      				</div>
      			</div>
            <div class="row">
                <div class="col-md-12">
                    <label for="fetaria_prim">
                        Selecione segunda faixa etária em maioria durante a sessão
                         <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
                    </label>
                    <label class="linha"><input class="fetaria_exc" type="radio" name="fetaria_segun" value="crianca"> Criança (0 a 14)</label>
                    <label class="linha"><input class="fetaria_exc" type="radio" name="fetaria_segun" value="jovem"> Jovem (15 a 29 anos)</label>
                    <label class="linha"><input class="fetaria_exc" type="radio" name="fetaria_segun" value="adulto"> Adulto (30 e 59 anos)</label>
                    <label class="linha"><input class="fetaria_exc" type="radio" name="fetaria_segun" value="idoso"> Idoso (60 ou mais)</label>
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
                <div class="container col-xs-10">
                    <div class="row" style="padding-top:10px;">
                        <div class="col-xs-2">
                            <button id="foto_sessao<?php echo $i ?>" class="btn btn-large btn-primary btn-upload foto_sessao<?php echo $i ?>">Nova Foto</button>
                        </div>
                        <div class="col-xs-4">
                          <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                            <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="row" style="padding-top:10px;">
                        <div class="col-xs-4">
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
                   <br ><textarea name="atividade_programada_desc" class="not-require" rows="8" cols="40"></textarea></label>
      				</div>
      			</div>
            <div class="row">
                <div class="col-md-12">
                    <label for="links_relacionados">Links relacionados a sessão <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button></label>
                    <textarea name="links_relacionados"></textarea>
                </div>
           </div>
           </div>
          <hr>

           <!-- SESSAO -->
          <h3>Sessão</h3>
          <div class="row">
            <div class="col-md-12">
          <label for="data" class="linha">
            Data em que a Sessão foi realizada
            <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escolha a data em que a sessão será realizada.">?</button>
            <input type="date" name="data" class="data_sessao" min="2011-01-01" value="">
          </label>
              </div>
           </div>
           <div class="row">
              <div class="col-md-12">
          <label for="horario" class="linha">
            Horário de início da sessão 
            <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escolha o horário de inicio da sessão.">?</button>
            <input type="time" name="horario" placeholder="mins:hrs" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="inputs time">
          </label>
              </div>
           </div>
           <div class="row">
              <div class="col-md-12">
          <label for="sessao_local">Sessão realizada no mesmo endereço do cineclube?  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escolha sim para o mesmo endereço do cadastro de cineclubes ou não para digitar um novo endereço.">?</button>
          </label>
          <label class="linha"><input type="radio" name="sessao_local" value="sim" class="sessao_local"> Sim </label>
          <label class="linha"><input type="radio" name="sessao_local" value="nao" class="sessao_local"> Não </label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="logradouro">Logradouro  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite a rua, avenida, etc do CEU onde será realizada a sessão.">?</button>
          </label>
          <input type="text" name="logradouro" value="<?php  echo $logradouro ?>" class="logradouro" disabled="disabled">
          <input type="hidden"  value="<?php  echo $logradouro ?>" class="js-logradouro">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="numero">Número<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o número do endereço.">?</button>
          </label>
          <input type="text" name="numero" value="<?php  echo $numero ?>" class="numero" disabled="disabled">
          <input type="hidden" value="<?php  echo $numero ?>" class="js-numero">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="complemento">Complemento<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Se houver complementos ao endereço como número do bloco, quadra, ou outros tipos de complemento, digite aqui..">?</button>
          </label>
          <input type="text" name="complemento" value="<?php  echo $complemento ?>" class="not-require complemento" disabled="disabled">
          <input type="hidden" value="<?php  echo $complemento ?>" class="js-complemento">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="bairro">Bairro<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do bairro deste endereço">?</button>
          </label>
          <input type="text" name="bairro" value="<?php  echo $bairro ?>" class="bairro" disabled="disabled">
          <input type="hidden" value="<?php  echo $bairro ?>" class="js-bairro">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="cidade">Cidade<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite a cidade deste endereço.">?</button>
          </label>
          <input type="text" name="cidade" value="<?php  echo $cidade ?>" class="cidade" disabled="disabled">
          <input type="hidden" value="<?php  echo $cidade ?>" class="js-cidade">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="Estado" class="linha">Estado<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o Estado deste endereço.">?</button>
          </label>
          <input type="hidden" value="<?php  echo $estado ?>" class="js-estado">
          <select name="estado" class="estado" disabled="disabled">
            <option value="">Selecione</option>
            <option value="AC" <?php echo $estado == "AC" ? "selected" : "" ?> >Acre</option>
            <option value="AL" <?php echo $estado == "AL" ? "selected" : "" ?> >Alagoas</option>
            <option value="AP" <?php echo $estado == "AP" ? "selected" : "" ?> >Amapá</option>
            <option value="AM" <?php echo $estado == "AM" ? "selected" : "" ?> >Amazonas</option>
            <option value="BA" <?php echo $estado == "BA" ? "selected" : "" ?> >Bahia</option>
            <option value="CE" <?php echo $estado == "CE" ? "selected" : "" ?> >Ceará</option>
            <option value="DF" <?php echo $estado == "DF" ? "selected" : "" ?> >Distrito Federal</option>
            <option value="ES" <?php echo $estado == "ES" ? "selected" : "" ?> >Espirito Santo</option>
            <option value="GO" <?php echo $estado == "GO" ? "selected" : "" ?> >Goiás</option>
            <option value="MA" <?php echo $estado == "MA" ? "selected" : "" ?> >Maranhão</option>
            <option value="MS" <?php echo $estado == "MS" ? "selected" : "" ?> >Mato Grosso do Sul</option>
            <option value="MT" <?php echo $estado == "MT" ? "selected" : "" ?> >Mato Grosso</option>
            <option value="MG" <?php echo $estado == "MG" ? "selected" : "" ?> >Minas Gerais</option>
            <option value="PA" <?php echo $estado == "PA" ? "selected" : "" ?> >Pará</option>
            <option value="PB" <?php echo $estado == "PB" ? "selected" : "" ?> >Paraíba</option>
            <option value="PR" <?php echo $estado == "PR" ? "selected" : "" ?> >Paraná</option>
            <option value="PE" <?php echo $estado == "PE" ? "selected" : "" ?> >Pernambuco</option>
            <option value="PI" <?php echo $estado == "PI" ? "selected" : "" ?> >Piauí</option>
            <option value="RJ" <?php echo $estado == "RJ" ? "selected" : "" ?> >Rio de Janeiro</option>
            <option value="RN" <?php echo $estado == "RN" ? "selected" : "" ?> >Rio Grande do Norte</option>
            <option value="RS" <?php echo $estado == "RS" ? "selected" : "" ?> >Rio Grande do Sul</option>
            <option value="RO" <?php echo $estado == "RO" ? "selected" : "" ?> >Rondônia</option>
            <option value="RR" <?php echo $estado == "RR" ? "selected" : "" ?> >Roraima</option>
            <option value="SC" <?php echo $estado == "SC" ? "selected" : "" ?> >Santa Catarina</option>
            <option value="SP" <?php echo $estado == "SP" ? "selected" : "" ?> >São Paulo</option>
            <option value="SE" <?php echo $estado == "SE" ? "selected" : "" ?> >Sergipe</option>
            <option value="TO" <?php echo $estado == "TO" ? "selected" : "" ?> >Tocantins</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="cep" class="linha">CEP <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o cep deste endereço.">?</button>
            <input type="text" name="cep" value="<?php  echo $cep ?>" class="cep" disabled="disabled">
            <input type="hidden" value="<?php  echo $cep ?>" class="js-cep">
          </label>
        </div>
        </div>
          <div class="row">
              <div class="col-md-12">
          <label for="requisito">Sessão gratuita?
            <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe se a participação na sessão tem algum requisito de entrada. Ex.: um quilo de alimento.">?</button>
          </label>
          <div class="col-md-2">
            <label class="linha"><input type="radio" name="requisito_opt" value="Sim" class="requisito_opt"> Sim </label>
            <label class="linha"><input type="radio" name="requisito_opt" value="Não" class="requisito_opt"> Não </label>
            <label class="linha"><input type="radio" name="requisito_opt" value="Text" class="requisito_opt"> Outros: </label>
          </div>
          <input type="text" name="requisito" value="" class="not-require requisito hidden" />
              </div>

           </div>
           <hr >
           <div class="row">
        <div class="col-md-12">
          <label for="filmes">
            Filmes exibidos 
            <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe se a participação na sessão tem algum requisito de entrada. Ex.: um quilo de alimento.">?</button>
          </label>
        </div>
           </div>
           <?php 
        //FOR FILMES
          for($i = 1; $i <= 16; $i++){
            $classe = "js-filme".$i;
            $btn_mais = "js-filme".($i + 1);
            $btn_menos = "js-filme".$i;

            if($i > 1){
              $classe .= " hide submit-hide";
            }

             ?>
               <div class="panel panel-primary <?php echo $classe ?>">
                  <div class="panel-heading">
                    Filme <?php echo $i ?> 
                    
                    <?php 
                if($i > 1){
                  echo ' <a href="#" class="js-mostra-menos btn btn-warning pull-right ' . $btn_menos . '">- Filmes</a> ';
                }

                if($i < 16){
                  echo '<a href="#" class="js-mostra-mais btn btn-success pull-right ' . $btn_mais . '">+ Filmes</a> ';
                }
                    ?>
                    
                  </div>
                  <div class="panel-body">
              <div class="col-md-12">
                <label for="filmes">
                  Nome do Filme
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Nome do filme em português. Ex.: ‘O poderoso chefão’.">?</button>
                </label>
                <!--here <?php if ($i > 1) echo 'class="not-require" '; ?>  -->
                <input text="text" name="nome_filme<?php echo $i ?>" class="nome_filme<?php echo $i; if ($i > 1) echo ' not-require'; ?>">
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  Nome Original 
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Nome original do filme. Ex.: ‘The Godfather’.">?</button>
                </label>
                <input text="text" name="nome_original<?php echo $i ?>"  class="nome_original<?php echo $i; if ($i > 1) echo ' not-require'; ?>">
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  Direção
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o(s) do(s) diretor(es) do filme(s). Ex.: ‘Francis Ford Coppola’..">?</button>
                </label>
                <input text="text" name="direcao<?php echo $i ?>" class="direcao<?php echo $i; if ($i > 1) echo ' not-require'; ?>">
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  Duração
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite a duração do filme em minutos. Ex.: 90">?</button>
                </label>
                <input text="text" type="number" <?php if ($i > 1) echo 'class="not-require"'; ?>name="duracao<?php echo $i ?>" >
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  Ano
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Ano de lançamento do filme. Ex.: 1972.">?</button>
                </label>
                <input type="number" name="ano<?php echo $i ?>" class="ano<?php echo $i; if ($i > 1) echo ' not-require'; ?>" >
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  País
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Pais(es) de produção/gravação do filme. Ex.: ‘Estados Unidos’.">?</button>
                </label>
                <input text="text" name="pais<?php echo $i ?>" class="pais<?php echo $i; if ($i > 1) echo ' not-require'; ?>">
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  Idioma falado
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Idioma original do filme. Ex.: ‘Inglês Americano’.">?</button>
                </label>
                <input text="text" name="idioma<?php echo $i ?>" class="idioma<?php echo $i; if ($i > 1) echo ' not-require'; ?>">
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  Legendado ou Dublado
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe sobre o audio e linguagem de reprodução do filme durante a exibição.">?</button>
                </label>
                <label class="linha"><input type="checkbox" name="leg_dub<?php echo $i ?>[]" value="legendado" class="leg_dub<?php echo $i ?>"> Legendado</label>
                <label class="linha"><input type="checkbox" name="leg_dub<?php echo $i ?>[]" value="dublado" class="leg_dub<?php echo $i ?>"> Dublado</label>
                <label class="linha"><input type="checkbox" name="leg_dub<?php echo $i ?>[]" value="portugues" class="leg_dub<?php echo $i ?>"> Audio Original em Português.</label>
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  Sinopse
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escreva uma breve sinopse do filme.">?</button>
                </label>
                <textarea name="sinopse<?php echo $i ?>" class="sinopse<?php echo $i; if ($i > 1) echo ' not-require';?>"></textarea>
              </div>
              <div class="col-md-12">
                <label for="filmes">
                  Classificação indicativa
                  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe a classificação indicativa do filme conforme legislação brasileira.">?</button>
                </label>
                <label class="linha"><input type="radio" name="classificacao<?php echo $i ?>" class="classificacao<?php echo $i; if ($i > 1) echo ' not-require'; ?>" value="livre"> Livre para todas as idades</label>
                <label class="linha"><input type="radio" name="classificacao<?php echo $i ?>" class="classificacao<?php echo $i; if ($i > 1) echo ' not-require'; ?>" value="Não recomendado para menores de 10 anos"> Não recomendado para menores de 10 anos </label>
                <label class="linha"><input type="radio" name="classificacao<?php echo $i ?>" class="classificacao<?php echo $i; if ($i > 1) echo ' not-require'; ?>" value="Não recomendado para menores de 12 anos"> Não recomendado para menores de 12 anos </label>
                <label class="linha"><input type="radio" name="classificacao<?php echo $i ?>" class="classificacao<?php echo $i; if ($i > 1) echo ' not-require'; ?>" value="Não recomendado para menores de 14 anos"> Não recomendado para menores de 14 anos </label>
                <label class="linha"><input type="radio" name="classificacao<?php echo $i ?>" class="classificacao<?php echo $i; if ($i > 1) echo ' not-require'; ?>" value="Não recomendado para menores de 16 anos"> Não recomendado para menores de 16 anos </label>
                <label class="linha"><input type="radio" name="classificacao<?php echo $i ?>" class="classificacao<?php echo $i; if ($i > 1) echo ' not-require'; ?>" value="Não recomendado para menores de 18 anos"> Não recomendado para menores de 18 anos </label>
              </div>
            </div>
          </div>
      <?php
        //END FOR FILMES
          }
      ?>
      <hr >
      <div class="row">
        <div class="col-md-12">
          <h2>Debate</h2>
          <label for="debate">
            Houve debate?
            <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe se haverá debate antes ou após exibição dos filme. Caso haja, preencha com dados do(s) debatedor(es).">?</button>
          </label>
          <label class="linha">
            <input type="radio" name="havera_debate" value="sim" class="havera_debate"> Sim
          </label>
          <label class="linha">
            <input type="radio" name="havera_debate" value="nao" class="havera_debate"> Não
          </label>
        </div>
      </div>
      <div class="debate-content"
       <?php 
        //FOR DEBATE
          for($d = 1; $d <= 5; $d++){
          $classed = "submit-hide js-debatedor".$d;
            $btn_mais = "js-debatedor".($d + 1);
            $btn_menos = "js-debatedor".$d;

            if($d > 1){
              $classed .= " hide";
            }
           ?>
      <div class="panel panel-warning <?php echo $classed ?> ">
        <div class="panel-heading">Debatedor <?php echo $d ?>
          <?php 
            if($d > 1){
              echo ' <a href="#" class="js-mostra-menos btn btn-warning pull-right '. $btn_menos .'">- Debatedor</a> ';
            }
                    
                  if($d < 5){
                    echo '<a href="#" class="js-mostra-mais btn btn-success pull-right '. $btn_mais.' ?>">+ Debatedor</a> ';
                  }
                ?>
        </div>
        <div class="panel-body">
          <div class="col-md-12">
            <label for="filmes">
              Nome do Debatedor
              <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe o nome do(a) debatedor(a).">?</button>
            </label>
            <input text="text" name="nome_debatedor<?php echo $d ?>" class="not-require nome_debatedor<?php echo $d ?>">
          </div>
          <div class="col-md-12">
            <label for="filmes">
              Foto Debatedor
              <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Insira uma foto do debatedor(nome da imagem sem caracteres especiais).">?</button>            <!-- Content Upload Necessity -->
              
              <input type="hidden" name="foto_debatedor<?php echo $d ?>" class="not-require foto_debatedor<?php echo $d ?>" value="">
              <div class="hide preview-image foto_debatedor<?php echo $d ?>">
                <img src="" >
              </div>
          
            <!-- BTN UPLOAD -->
            <div class="container col-xs-10">
                <div class="row" style="padding-top:10px;">
                    <div class="col-xs-2">
                        <button id="foto_debatedor<?php echo $d ?>" class="btn btn-large btn-primary btn-upload foto_debatedor<?php echo $d ?>">Nova Foto</button>
                    </div>
                    <div class="col-xs-4">
                      <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                        <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        </div>
                      </div>
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-xs-4">
                      <div id="msgBox">
                      </div>
                    </div>
                </div>
              </div>
            <!-- BTN UPLOAD -->
            <!-- Content Upload Necessity  -->

          </div>
          <div class="col-md-12">
            <label for="minibio">
              Mini bio do debatedor
              <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Insira uma breve biografia do debatedor (1 ou 2 parágrafos)..">?</button>
            </label>
            <textarea name="bibliografia_debatedor<?php echo $d ?>" class="not-require bibliografia_debatedor<?php echo $d ?>"></textarea>
          </div>
        </div>
      </div>
      <?php
        //END FOR DEBATE
          }
      ?>
      </div><!-- debate-content -->
      
      <div class="row">
              <div class="col-md-12">
                <label>Cartaz ou imagens da sessão  <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Insira uma foto ou cartaz da sessão (nome da imagem sem caracteres especiais)">?</button>
          </label>
          
          <!-- Content Upload Necessity -->
          <input type="hidden" name="thumb-sessao" class="thumb-sessao" value="">

          <div class="hide preview-image thumb-sessao">
            <img src="" >
          </div>
        
          <!-- BTN UPLOAD -->
          <div class="container col-xs-10">
              <div class="row" style="padding-top:10px;">
                  <div class="col-xs-2">
                      <button id="upload-thumb" class="btn btn-large btn-primary btn-upload thumb-sessao">Nova Foto</button>
                  </div>
                  <div class="col-xs-4">
                    <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                      <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row" style="padding-top:10px;">
                  <div class="col-xs-4">
                    <div id="msgBox">
                    </div>
                  </div>
              </div>
            </div>
          <!-- BTN UPLOAD -->
          <!-- Content Upload Necessity  -->

              </div>
           </div> 

            
            <!--  CINECLUBE -->
            <hr >
            <h3>Cineclube</h3>         
            <?php
                global $current_user;
                get_currentuserinfo();        

                $args = array(
                    'author'        =>  $current_user->ID, 
                    'post_type'     =>  'cineclube',
                 );

                $current_user_post = get_posts( $args );

                if(count($current_user_post) > 0){
                  $pdi =  $current_user_post[0]->ID;
                  
                  //Pegar Infos Thumnail
                  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pdi), 'full' );
                        $thumb_url = $thumb['0']; 
                        $thumb_id = get_post_thumbnail_id( $pdi ); 
                  
                  //Pegar Tags
                        $tags =  wp_get_post_tags( $pdi, array( 'fields' => 'names' ) );
                        $tags  = implode(", ", $tags);

                  /**
                        ** Get MetasBoxs CINECLUBE
                        **/
                        $nome_cineclube = $current_user_post[0]->post_title;
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
                }


              ?>

            <div class="row">
        <div class="col-md-12">
          <label for="title">Nome do Cineclube 
            <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
          </label>
          <input type="text" name="nome_cineclube" value="<?php  echo $nome_cineclube ?>">
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <label for="nome_ceu">Nome do CEU <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do CEU.">?</button>
          </label>
          <input type="text" name="nome_ceu" value="<?php  echo $nome_ceu ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label>
            <h3>Endereço</h3>
            <p>Preencha os dados de endereço do CEU.</p>
          </label>
          <label for="logradouro">Logradouro<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite a rua, avenida, etc do CEU onde está localizado o cineclube..">?</button>
          </label>
          <input type="text" name="logradouro" value="<?php  echo $logradouro ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="numero">Número<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o número do endereço.">?</button>
          </label>
          <input type="text" name="numero" value="<?php  echo $numero ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="complemento">Complemento<button type="button" class="not-require infos" data-toggle="tooltip" data-placement="top" title="Se houver complementos ao endereço como número do bloco, quadra, ou outros tipos de complemento, digite aqui..">?</button>
          </label>
          <input type="text" name="complemento" value="<?php  echo $complemento ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="bairro">Bairro<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do bairro deste endereço">?</button>
          </label>
          <input type="text" name="bairro" value="<?php  echo $bairro ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="cidade">Cidade<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite a cidade deste endereço.">?</button>
          </label>
          <input type="text" name="cidade" value="<?php  echo $cidade ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="Estado" class="linha">Estado<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o Estado deste endereço.">?</button>
          </label>
          <select name="estado">
            <option value="">Selecione</option>
            <option value="AC" <?php echo $estado == "AC" ? "selected" : "" ?> >Acre</option>
            <option value="AL" <?php echo $estado == "AL" ? "selected" : "" ?> >Alagoas</option>
            <option value="AP" <?php echo $estado == "AP" ? "selected" : "" ?> >Amapá</option>
            <option value="AM" <?php echo $estado == "AM" ? "selected" : "" ?> >Amazonas</option>
            <option value="BA" <?php echo $estado == "BA" ? "selected" : "" ?> >Bahia</option>
            <option value="CE" <?php echo $estado == "CE" ? "selected" : "" ?> >Ceará</option>
            <option value="DF" <?php echo $estado == "DF" ? "selected" : "" ?> >Distrito Federal</option>
            <option value="ES" <?php echo $estado == "ES" ? "selected" : "" ?> >Espirito Santo</option>
            <option value="GO" <?php echo $estado == "GO" ? "selected" : "" ?> >Goiás</option>
            <option value="MA" <?php echo $estado == "MA" ? "selected" : "" ?> >Maranhão</option>
            <option value="MS" <?php echo $estado == "MS" ? "selected" : "" ?> >Mato Grosso do Sul</option>
            <option value="MT" <?php echo $estado == "MT" ? "selected" : "" ?> >Mato Grosso</option>
            <option value="MG" <?php echo $estado == "MG" ? "selected" : "" ?> >Minas Gerais</option>
            <option value="PA" <?php echo $estado == "PA" ? "selected" : "" ?> >Pará</option>
            <option value="PB" <?php echo $estado == "PB" ? "selected" : "" ?> >Paraíba</option>
            <option value="PR" <?php echo $estado == "PR" ? "selected" : "" ?> >Paraná</option>
            <option value="PE" <?php echo $estado == "PE" ? "selected" : "" ?> >Pernambuco</option>
            <option value="PI" <?php echo $estado == "PI" ? "selected" : "" ?> >Piauí</option>
            <option value="RJ" <?php echo $estado == "RJ" ? "selected" : "" ?> >Rio de Janeiro</option>
            <option value="RN" <?php echo $estado == "RN" ? "selected" : "" ?> >Rio Grande do Norte</option>
            <option value="RS" <?php echo $estado == "RS" ? "selected" : "" ?> >Rio Grande do Sul</option>
            <option value="RO" <?php echo $estado == "RO" ? "selected" : "" ?> >Rondônia</option>
            <option value="RR" <?php echo $estado == "RR" ? "selected" : "" ?> >Roraima</option>
            <option value="SC" <?php echo $estado == "SC" ? "selected" : "" ?> >Santa Catarina</option>
            <option value="SP" <?php echo $estado == "SP" ? "selected" : "" ?> >São Paulo</option>
            <option value="SE" <?php echo $estado == "SE" ? "selected" : "" ?> >Sergipe</option>
            <option value="TO" <?php echo $estado == "TO" ? "selected" : "" ?> >Tocantins</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="cep" class="linha">CEP <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o cep deste endereço.">?</button>
            <input type="text" name="cep" value="<?php  echo $cep ?>">
          </label>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <label for="capacidade" class="linha">
            Capacidade máxima de público 
            <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o número de pessoas comportadas pelo seu cineclube.">?</button>
            <input type="number" name="capacidade" value="<?php  echo $capacidade ?>">
          </label>
          
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="biografia">Biografia do cineclube<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite aqui uma breve biografia de seu cineclube.">?</button>
          </label>
          <textarea name="biografia" rows="8" cols="40"><?php echo $biografia ?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <label for="email_prin">E-mail Principal<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite aqui o principal email de contato de seu cineclube.">?</button>
          </label>
          <input type="email" name="email_prin" value="<?php  echo $email_prin ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="email_secun">E-mail Secundario<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite aqui um segundo email de contato de seu cineclube.">?</button>
          </label>
          <input type="email"class="not-require" name="email_secun" value="<?php  echo $email_secun ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="telefone_prin">Telefone Principal<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite aqui o principal telefone de contato de seu cineclube.">?</button>
          </label>
          <input type="text" name="telefone_prin" value="<?php  echo $telefone_prin ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="telefone_secun">Telefone Secundario<button type="button" class="not-require infos" data-toggle="tooltip" data-placement="top" title="Digite aqui o principal telefone de contato de seu cineclube.">?</button>
          </label>
          <input type="text" name="telefone_secun" class="not-require" value="<?php  echo $telefone_secun ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <label for="redes_sociais_do_cineclube">Redes sociais do cineclube
          </label>
        </div>
        <div class="col-md-4">
          <label for="facebook">Facebook<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Cole aqui a url para a página ou perfil do facebook de seu cineclube.">?</button>
          </label>
          <input type="text" value="<?php  echo $facebook ?>" name="facebook" class="not-require">
        </div>
        <div class="col-md-4">
          <label for="twitter">Twitter<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Cole aqui url para perfil do twitter do seu cineclube.">?</button>
          </label>
          <input type="text" class="not-require" value="<?php  echo $twitter ?>" name="twitter" >
        </div>
        <div class="col-md-4">
          <label for="instagram">Instagram<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Cole aqui a url para perfil do instagram do seu cineclube.">?</button>
          </label>
          <input type="text" class="not-require" value="<?php  echo $instagram ?>" name="instagram" >
        </div>
      </div>      

      <div class="row">
        <div class="col-md-12">
          <label>Foto do Cineclube <button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Selecione uma foto ou uma arte do cinececlube(nome da imagem sem caracteres especiais).">?</button></label>
          
    
          <input type="hidden" name="thumb_infos" class="thumb-cineclube" value="">
          
          <!-- BTN UPLOAD -->
          <div class="container col-xs-10">
              <div class="row" style="padding-top:10px;">
                  <div class="col-xs-2">
                      <button id="upload-thumb-cineclube" class="btn btn-large btn-primary btn-upload thumb-cineclube">Nova Foto</button>
                  </div>
                  <div class="col-xs-4">
                    <div id="progressOuter" class="progress progress-striped active" style="display:none;">
                      <div id="progressBar" class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row" style="padding-top:10px;">
                  <div class="col-xs-4">
                    <div id="msgBox">
                    </div>
                  </div>
              </div>
            </div>
          <!-- END BTN UPLOAD -->
          <div class="thumb_view">

          <?php 
            if(isset($thumb_url)){
          ?>
            <div class="img-existe">
              <img src="<?php echo $thumb_url ?>" />
            </div>
          <?php 
            }//Verifica Thumnail
          ?>
          </div>
        </div>
      </div>     
      <!--  CINECLUBE -->
          <div class="loading"></div>

          <div class="hide message-success">
            <h3>Salvo com Sucesso!</h3>
          </div>

          <div class="row">
           	<div class="col-md-12">
					    <input type="submit" value="Cadastrar Relatório Sessão">
    				</div>
    			</div>
          
          <input type="hidden" name="action" value="form_form_relatorio" />
          <?php wp_nonce_field( 'form_form_relatorio' ); ?>
          
		<?php } else { ?>
      <div class="alert alert-warning">
        <p>Não existem Sessões cadastradas que não tenham Relatório.</p>
        <p>Você pode criar Sessões clicando <a href="cadastro-de-sessao">aqui</a>.</p>
      </div>
    <?php } ?>
  </label>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
