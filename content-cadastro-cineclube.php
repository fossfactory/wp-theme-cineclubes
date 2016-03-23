<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">		
		<form id="form_cineclube" name="form_cineclube" method="post" action=""  class="form_obrigatorio"  enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					<label for="title">Nome do Cineclube 
						<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
					</label>
					<input type="text" name="title"  value="<?php  echo $nome_cineclube ?>">
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
					<input type="number" name="numero" value="<?php  echo $numero ?>">
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<label for="complemento">Complemento<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Se houver complementos ao endereço como número do bloco, quadra, ou outros tipos de complemento, digite aqui..">?</button>
					</label>
					<input type="text" name="complemento" class="not-require" value="<?php  echo $complemento ?>">
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
						<input type="number" name="cep" value="<?php  echo $cep ?>">
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
					<input type="email" name="email_secun"  class="not-require" value="<?php  echo $email_secun ?>">
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
					<label for="telefone_secun">Telefone Secundario<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite aqui o principal telefone de contato de seu cineclube.">?</button>
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
					<input class="not-require" type="text" value="<?php  echo $facebook ?>" name="facebook" >
				</div>
				<div class="col-md-4">
					<label for="twitter">Twitter<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Cole aqui url para perfil do twitter do seu cineclube.">?</button>
					</label>
					<input  class="not-require" type="text" value="<?php  echo $twitter ?>" name="twitter" >
				</div>
				<div class="col-md-4">
					<label for="instagram">Instagram<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Cole aqui a url para perfil do instagram do seu cineclube.">?</button>
					</label>
					<input class="not-require" type="text" value="<?php  echo $instagram ?>" name="instagram" >
				</div>
			</div>
			
			<!--=div class="row">
				<div class="col-md-12">
					<label for="arquivos">O Cineclube consegue receber arquivos de filmes pela internet
						<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Caso responda sim, dê orientações sobre isso no campo de biografia do cineclube.">?</button>
					</label>
					<label class="linha"><input type="radio" name="arquivos" value="sim" <?php echo $arquivos == "sim" ? "checked" : "" ?> > Sim
					</label>
					<label class="linha"><input type="radio" name="arquivos" value="nao" <?php echo $arquivos == "nao" ? "checked" : "" ?> > Não
					</label>
				</div>
			</div-->

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

			<!-- div class="row">
				<div class="col-md-12">
					<label for="aceito_o_regulamento">Aceito o regulamento<button type="button" class="infos" data-toggle="tooltip" data-placement="top" title="Digite o nome do cineclube.">?</button>
					</label>
					<input type="checkbox" name="aceito_o_regulamento" value="1">
				</div>
			</div -->


			<input type="hidden" name="action" value="form_cineclube" />
			<?php wp_nonce_field( 'form_cineclube' ); ?>
			<div class="loading"></div>

			<div class="hide message-success">
				<h3>Salvo com Sucesso!</h3>
			</div>
			
			<input type="submit" name="submit-new-cineclube" value="Cadastrar cineclube">
		</form>

	</div><!-- .entry-content -->
</article><!-- #post-## -->
