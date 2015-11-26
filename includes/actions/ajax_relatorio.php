<?php 
    require_once('../../../../../wp-blog-header.php'); 
    
    //header('Content-type: application/json');

    $pdi = $_POST['id'];

    
    header('Content-type:application/json;charset=utf-8');
    /**
    ** Get MetasBoxs RELATORIO fSESSÃO
    **/
    $campos["data_sessao"] = rwmb_meta( 'ss_data', 'type=text', $pdi  );
    $campos["horario"] = rwmb_meta( 'ss_horario', 'type=text', $pdi  );
    $campos["requisito"]  = rwmb_meta( 'ss_requisito', 'type=text', $pdi  );
    $campos["havera_debate"] = rwmb_meta( 'ss_havera_debate', 'type=text', $pdi  ); 
    $campos["sessao_local"] = rwmb_meta( 'ss_sessao_local', 'type=text', $pdi  ); 



    
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $pdi ), 'full' );
    $thumb_url = $thumb['0']; 
    if(empty($thumb_url)){
      $thumb_url = "/wp-content/uploads/cineclube/sessao.png";
    }
    $thumbnail_id = get_post_thumbnail_id( $pdi ); 

    $campos["thumb_url"] =  $thumb_url;
    $campos["thumb_id"] =  $thumbnail_id;

    $campos["logradouro"] =  rwmb_meta( 'ss_logradouro', 'type=text', $pdi  );
    $campos["numero"] =  rwmb_meta( 'ss_numero', 'type=text', $pdi  );
    $campos["complemento"] =  rwmb_meta( 'ss_complemento', 'type=text', $pdi  );
    $campos["bairro"] =  rwmb_meta( 'ss_bairro', 'type=text', $pdi  ); 
    $campos["cidade"] =  rwmb_meta( 'ss_cidade', 'type=text', $pdi  );
    $campos["estado"] =  rwmb_meta( 'ss_estado', 'type=text', $pdi  );
    $campos["cep"] =  rwmb_meta( 'ss_cep', 'type=text', $pdi  ); 
    
    //$cineclube_nome = rwmb_meta( 'ss_cineclube_nome', 'type=text', $pdi  ); 
    //$cineclube_id = rwmb_meta( 'ss_cineclube_id', 'type=text', $pdi  ); 




    //ForNome Do Filme
    for($i = 1; $i <= 16; $i++){
        
        $nome_filme = rwmb_meta( 'ss_nome_filme'.$i, 'type=text', $pdi  );
        $nome_original = rwmb_meta( 'ss_nome_original'.$i, 'type=text', $pdi  ); 
        $direcao = rwmb_meta( 'ss_direcao'.$i, 'type=text', $pdi  );
        $ano = rwmb_meta( 'ss_ano'.$i, 'type=text', $pdi  );
        $pais = rwmb_meta( 'ss_pais'.$i, 'type=text', $pdi  );
        $idioma = rwmb_meta( 'ss_idioma'.$i, 'type=text', $pdi  );
        $leg_dub = implode( ', ', rwmb_meta( 'ss_leg_dub'.$i, 'type=checkbox_list' , $pdi  ));
        $sinopse = rwmb_meta( 'ss_sinopse'.$i, 'type=text', $pdi  );
        $minibio = rwmb_meta( 'ss_minibio'.$i, 'type=text', $pdi  );
        $classificacao = rwmb_meta( 'ss_classificacao'.$i, 'type=text', $pdi  );
        
        if(strlen($nome_filme) > 1){
            $campos["nome_filme".$i] = $nome_filme;
            $campos["nome_original".$i] = $nome_original;
            $campos["direcao".$i] = $direcao;
            $campos["ano".$i] = $ano;
            $campos["pais".$i] = $pais;
            $campos["idioma".$i] = $idioma;
            $campos["leg_dub".$i] = $leg_dub;
            $campos["sinopse".$i] = $sinopse;
            $campos["minibio".$i] = $minibio;
            $campos["classificacao".$i] = $classificacao;
        }
    };


    for($d = 1; $d <= 5; $d++){
        $nome_debatedor = rwmb_meta( 'ss_nome_debatedor'.$d, 'type=text', $pdi  );
        $bibliografia = rwmb_meta( 'ss_bibliografia_debatedor'.$d, 'type=text', $pdi  );
        $foto_debatedor = rwmb_meta( 'ss_foto_debatedor'.$d, 'type=image', $pdi  );
        $fotoid = get_post_meta(  $pdi, 'ss_foto_debatedor'.$d );

        
        if(strlen($nome_debatedor) > 1){
            $campos["nome_debatedor".$d] =  $nome_debatedor;
            $campos["bibliografia_debatedor".$d] =  $bibliografia;
            $campos["fotoid".$d] = $fotoid[0];

            foreach ( $foto_debatedor as $f ){ 
               $campos["foto_debatedor".$d] =  $f['url'];
            }

        }
    };
    
    
    echo  json_encode( $campos ) ;


?>