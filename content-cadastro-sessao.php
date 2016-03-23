
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		global $current_user;
		                      
		
		$user_meta_postid = get_user_meta( $current_user->ID, 'cineclube_id', true );

		/**
        ** Get MetasBoxs CINECLUBE
        **/
		$logradouro = rwmb_meta( 'cb_logradouro', 'type=text', $user_meta_postid  );
        $numero 	= rwmb_meta( 'cb_numero', 'type=text', $user_meta_postid  );
        $complemento = rwmb_meta( 'cb_complemento', 'type=text', $user_meta_postid  );
        $bairro = rwmb_meta( 'cb_bairro', 'type=text', $user_meta_postid ); 
        $cidade = rwmb_meta( 'cb_cidade', 'type=text',$user_meta_postid  );
        $estado = rwmb_meta( 'cb_estado', 'type=text', $user_meta_postid  );
        $cep = rwmb_meta( 'cb_cep', 'type=text', $user_meta_postid );

	?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php 
		global $current_user;
		get_currentuserinfo();  
		$args = array(
		    'author'        =>  $current_user->ID, 
		    'post_type'     =>  'cineclube',
		 );
		$current_user_cineclube = get_posts( $args );
		if( count($current_user_cineclube) > 0){
	?>
		<form id="form_sessao" name="form_sessao"  class="form_obrigatorio" method="post" action="" enctype="multipart/form-data">
           <div class="row">
           		<div class="col-md-12">
					<label for="nome_da_sessao">Nome da sessão
						<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o título da sessão. Ex. ‘Sessão terror de verão 2015 - primeira edição.">?</button>
					</label>
					<input tyupe="text" name="title">
				</div>
			</div>
           <div class="row">
           		<div class="col-md-12">
					<label for="data" class="linha">
						Data em que será realizada a sessão	
						<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escolha a data em que a sessão será realizada.">?</button>
						<input type="date" name="data"  min="2011-01-01" value="">
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
					<label for="sessao_local">Sessão realizada no mesmo endereço do cineclube?	<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escolha sim para o mesmo endereço do cadastro de cineclubes ou não para digitar um novo endereço.">?</button>
					</label>
					<label class="linha"><input type="radio" name="sessao_local" value="sim" class="sessao_local"> Sim </label>
					<label class="linha"><input type="radio" name="sessao_local" value="nao" class="sessao_local"> Não </label>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<label for="logradouro">Logradouro	<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite a rua, avenida, etc do CEU onde será realizada a sessão.">?</button>
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
					<input type="text" name="complemento" value="<?php  echo $complemento ?>" class="complemento" disabled="disabled">
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
						Filmes a serem exibidos	
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
								<input text="text" <?php if ($i > 1) echo 'class="not-require" '; ?> name="nome_filme<?php echo $i ?>" >
							</div>
							<div class="col-md-12">
								<label for="filmes">
									Nome Original 
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Nome original do filme. Ex.: ‘The Godfather’.">?</button>
								</label>
								<input text="text" <?php if ($i > 1) echo 'class="not-require" '; ?>name="nome_original<?php echo $i ?>" >
							</div>
							<div class="col-md-12">
								<label for="filmes">
									Direção
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o(s) do(s) diretor(es) do filme(s). Ex.: ‘Francis Ford Coppola’..">?</button>
								</label>
								<input text="text" <?php if ($i > 1) echo 'class="not-require" '; ?>name="direcao<?php echo $i ?>" >
							</div>
							<div class="col-md-12">
								<label for="filmes">
									Duração
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite a duração do filme em minutos. Ex.: 90">?</button>
								</label>
								<input text="text" <?php if ($i > 1) echo 'class="not-require" '; ?>type="number" maxlength="3" name="duracao<?php echo $i ?>" >
							</div>
							<div class="col-md-12">
								<label for="filmes">
									Ano
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Ano de lançamento do filme. Ex.: 1972.">?</button>
								</label>
								<input text="text" <?php if ($i > 1) echo 'class="not-require" '; ?>type="number" maxlength="4" name="ano<?php echo $i ?>" >
							</div>
							<div class="col-md-12">
								<label for="filmes">
									País
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Pais(es) de produção/gravação do filme. Ex.: ‘Estados Unidos’.">?</button>
								</label>
								<input text="text" <?php if ($i > 1) echo 'class="not-require" '; ?>name="pais<?php echo $i ?>" >
							</div>
							<div class="col-md-12">
								<label for="filmes">
									Idioma falado
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Idioma original do filme. Ex.: ‘Inglês Americano’.">?</button>
								</label>
								<input text="text" <?php if ($i > 1) echo 'class="not-require" '; ?>name="idioma<?php echo $i ?>" >
							</div>
							<div class="col-md-12">
								<label for="filmes">
									Legendado ou Dublado
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe sobre o audio e linguagem de reprodução do filme durante a exibição.">?</button>
								</label>
								<label class="linha"><input type="checkbox" name="leg_dub<?php echo $i ?>[]" value="legendado"> Legendado</label>
								<label class="linha"><input type="checkbox" name="leg_dub<?php echo $i ?>[]" value="dublado"> Dublado</label>
								<label class="linha"><input type="checkbox" name="leg_dub<?php echo $i ?>[]" value="portugues"> Audio Original em Português.</label>
							</div>
							<div class="col-md-12">
								<label for="filmes">
									Sinopse
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Escreva uma breve sinopse do filme.">?</button>
								</label>
								<textarea <?php if ($i > 1) echo 'class="not-require" '; ?>name="sinopse<?php echo $i ?>"></textarea>
							</div>
							<div class="col-md-12">
								<label for="filmes">
									Classificação indicativa
									<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Informe a classificação indicativa do filme conforme legislação brasileira.">?</button>
								</label>
								<label class="linha"><input <?php if ($i > 1) echo 'class="not-require" '; ?>type="radio" name="classificacao<?php echo $i ?>" value="livre"> Livre para todas as idades</label>
								<label class="linha"><input <?php if ($i > 1) echo 'class="not-require" '; ?>type="radio" name="classificacao<?php echo $i ?>" value="Não recomendado para menores de 10 anos"> Não recomendado para menores de 10 anos </label>
								<label class="linha"><input <?php if ($i > 1) echo 'class="not-require" '; ?>type="radio" name="classificacao<?php echo $i ?>" value="Não recomendado para menores de 12 anos"> Não recomendado para menores de 12 anos </label>
								<label class="linha"><input <?php if ($i > 1) echo 'class="not-require" '; ?>type="radio" name="classificacao<?php echo $i ?>" value="Não recomendado para menores de 14 anos"> Não recomendado para menores de 14 anos </label>
								<label class="linha"><input <?php if ($i > 1) echo 'class="not-require" '; ?>type="radio" name="classificacao<?php echo $i ?>" value="Não recomendado para menores de 16 anos"> Não recomendado para menores de 16 anos </label>
								<label class="linha"><input <?php if ($i > 1) echo 'class="not-require" '; ?>type="radio" name="classificacao<?php echo $i ?>" value="Não recomendado para menores de 18 anos"> Não recomendado para menores de 18 anos </label>								
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
						Haverá debate?
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
			<div class="debate-content">
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
						<input text="text" class="not-require" name="nome_debatedor<?php echo $d ?>" >
					</div>
					<div class="col-md-12">
						<label for="filmes">
							Foto Debatedor
							<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Insira uma foto do debatedor(nome da imagem sem caracteres especiais).">?</button>
						</label>
	

						<!-- Content Upload Necessity -->
						<input type="hidden" name="foto_debatedor<?php echo $d ?>" class="foto_debatedor<?php echo $d ?>" value="">

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
						<label for="filmes">
							Mini bio do debatedor
							<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Insira uma breve biografia do debatedor (1 ou 2 parágrafos)..">?</button>
						</label>
						<textarea class="not-require" name="bibliografia_debatedor<?php echo $d ?>"></textarea>
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
           			<label>Cartaz ou imagens da sessão	<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Insira uma foto ou cartaz da sessão (nome da imagem sem caracteres especiais)">?</button>
					</label>
					
					<!-- Content Upload Necessity -->
					<input type="hidden" name="thumb-sessao" class="thumb-sessao " value="">

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
         	<div class="loading"></div>
         	<div class="hide message-success">
				<h3>Salvo com Sucesso!</h3>
			</div>


	        <div class="row">
	       		<div class="col-md-12">
					<input type="submit" value="Cadastrar sessão">
				</div>
			</div>
			<input type="hidden" name="action" value="form_sessao" />
			<?php wp_nonce_field( 'form_sessao' ); ?>

			<?php 				
				$cineclube_title = $current_user_cineclube[0]->post_title;
				$cineclube_pdi   = $current_user_cineclube[0]->ID;				
			?>
			<!--Vincula Cineclube -->
			<input type="hidden" name="cineclube_nome" value="<?php echo $cineclube_title ?>" />
			<input type="hidden" name="cineclube_id" value="<?php echo $cineclube_pdi ?>" />

		</form>
	<?php
		}
		else {
	?>
		<div class="alert alert-danger">
			<p>Antes de inserir sessões, você deve cadastrar um Cineclube!</p>
			<p>Você pode cadastrar um Cineclube clicando <a href="cadastro-de-cineclubes">aqui</a>.</p>
		</div>
	<?php
		}
	?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
