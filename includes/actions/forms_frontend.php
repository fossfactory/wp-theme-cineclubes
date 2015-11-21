<?php
require_once('../../../../../wp-blog-header.php'); 

//Upload Image Thumbnail
function upload_image( $thumb_infos ){
     if ( ! function_exists( 'wp_handle_upload' ) ) {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }
    //require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    //require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    //require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    
    $upload_dir = wp_upload_dir();

    $infos = explode(",", $thumb_infos);

    $movefile['file'] = $upload_dir['basedir'] . "/cineclube/" . $infos[0];
    $movefile['url']  = $upload_dir['baseurl'] . "/cineclube/" . $infos[0];
    $movefile['type'] = $infos[1];

    if ( $movefile && !isset( $movefile['error'] ) ) {

        $wp_filetype = $movefile['type'];
        $filename = $movefile['file'];
        $wp_upload_dir = wp_upload_dir();
        $attachment = array(
            'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
            'post_mime_type' => $wp_filetype,
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment( $attachment, $filename);

    } else {
        echo $movefile['error'];
        die;
    }

    return $attach_id;
};





/*
* Form CINECLUBE
*/
if($_POST['action'] == "form_cineclube") {
        form_cineclube();
};

function form_cineclube(){

    //Campos Post
    $title =  $_POST['title'];
    $nome_ceu =  $_POST['nome_ceu'];
    $logradouro =  $_POST['logradouro'];
    $numero =  $_POST['numero'];
    $complemento =  $_POST['complemento'];
    $cep =  $_POST['cep'];
    $cidade =  $_POST['cidade'];
    $bairro =  $_POST['bairro'];
    $estado =  $_POST['estado'];
    $capacidade =  $_POST['capacidade'];
    $email_prin =  $_POST['email_prin'];
    $email_secun =  $_POST['email_secun'];
    $telefone_prin =  $_POST['telefone_prin'];
    $telefone_secun =  $_POST['telefone_secun'];
    $facebook =  $_POST['facebook'];
    $twitter =  $_POST['twitter'];
    $instagram =  $_POST['instagram'];
    $arquivos =  $_POST['arquivos'];
    $biografia =  trim(nl2br($_POST['biografia']));
    $tags = $_POST['tags'];
    $thumb_infos = $_POST['thumb_infos'];

    //Verificar se existe CINECLUBE
    global $current_user;                 
    $args = array(
        'author'        =>  $current_user->ID, 
        'post_type'     =>  'cineclube',
    );

    $current_user_post = get_posts( $args );

    if(count($current_user_post) > 0){
        
        //User Post Cineclube
        $pid = $current_user_post[0]->ID;

        $args = array(
          'ID'           => $pid,
          'post_title'   => $title,
        );

        wp_update_post( $args );
        
        if ( !empty( $thumb_infos ) ){

            $imageId = upload_image( $thumb_infos );
            set_post_thumbnail( $pid,  $imageId );
        };

    }else{

        //Create Post User Cineclube
        $cineclube = array(
            'post_title'    => $title,
            'post_status'   => 'publish',          
            'post_type' => 'cineclube'  
        );
        
        $pid = wp_insert_post($cineclube); 

        //Update Thumbanil
        if ( !empty( $thumb_infos ) ){
            $imageId = upload_image( $thumb_infos );
            set_post_thumbnail( $pid,  $imageId );
        }
    };

    //Delete tag
    wp_delete_term( $pid, 'post_tag' );

    //Insert Tag
    wp_set_post_tags( $pid, $tags, true );

    //Update MetaBoxes 
    $prefix ='cb_';
    update_post_meta( $pid, $prefix.'nome_ceu', $nome_ceu );
    update_post_meta( $pid, $prefix.'logradouro', $logradouro );
    update_post_meta( $pid, $prefix.'numero', $numero );
    update_post_meta( $pid, $prefix.'complemento', $complemento );
    update_post_meta( $pid, $prefix.'bairro', $bairro );
    update_post_meta( $pid, $prefix.'cidade', $cidade );
    update_post_meta( $pid, $prefix.'estado', $estado);
    update_post_meta( $pid, $prefix.'cep', $cep );
    update_post_meta( $pid, $prefix.'capacidade', $capacidade );
    update_post_meta( $pid, $prefix.'email_prin', $email_prin );
    update_post_meta( $pid, $prefix.'email_secun', $email_secun );
    update_post_meta( $pid, $prefix.'telefone_prin', $telefone_prin );
    update_post_meta( $pid, $prefix.'telefone_secun', $telefone_secun );
    update_post_meta( $pid, $prefix.'facebook', $facebook );
    update_post_meta( $pid, $prefix.'twitter', $twitter );
    update_post_meta( $pid, $prefix.'instagram', $instagram );
    update_post_meta( $pid, $prefix.'arquivos', $arquivos );
    update_post_meta( $pid, $prefix.'biografia', $biografia );

    //Vincular POST com User
    $user_ID = $current_user->ID;
    update_user_meta( $user_ID, 'cineclube_id', $pid);
   
};




/*
* Form SESSÃO
*/
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "form_sessao") {

    $title =  $_POST['title'];

    //METABOXs
    $data =  $_POST['data'];
    $horario =  $_POST['horario'];
    $sessao_local =  $_POST['sessao_local'];   
    $logradouro =  $_POST['logradouro'];
    $numero =  $_POST['numero'];
    $complemento =  $_POST['complemento'];
    $cep =  $_POST['cep'];
    $cidade =  $_POST['cidade'];
    $bairro =  $_POST['bairro'];
    $estado =  $_POST['estado'];
    $requisito =  $_POST['requisito'];
    $cineclube_nome =  $_POST['cineclube_nome'];
    $cineclube_id =  $_POST['cineclube_id'];

    //FOR FILMES
    for($i = 1; $i <= 16; $i++){
        $nome_filme[$i] =  $_POST['nome_filme'.$i];
        $nome_original[$i] =  $_POST['nome_original'.$i];
        $direcao[$i] =  $_POST['direcao'.$i];
        $ano[$i] =  $_POST['ano'.$i];
        $pais[$i] =  $_POST['pais'.$i];
        $idioma[$i] =  $_POST['idioma'.$i];
        $sinopse[$i] =  trim(nl2br($_POST['sinopse'.$i]));
        $leg_dub[$i] =  $_POST['leg_dub'.$i];
        $classificacao[$i] =  $_POST['classificacao'.$i];
    }
    
    $havera_debate =  $_POST['havera_debate'];

    //FOR DEBATEDORES
    for($i = 1; $i <= 5; $i++){
        $nome_debatedor[$i] =  $_POST['nome_debatedor'.$i];
        $foto_debatedor[$i] =  $_POST['foto_debatedor'.$i];
        $bibliografia_debatedor[$i] =  trim(nl2br($_POST['bibliografia_debatedor'.$i]));
    }

    // Add the content of the form to $post as an array
    $sessao = array(
        'post_title'    => $title,
        'post_status'   => 'publish', 
        'post_type' => 'sessao'  
    );

    //save the new post
    $pid = wp_insert_post($sessao); 
    
    //Update Thumbanil
    if ( !empty( $_POST['thumb-sessao'] ) ){
        $foto_eventoId = upload_image($_POST['thumb-sessao']);
        set_post_thumbnail( $pid,  $foto_eventoId );
    }

    //FOR DEBATEDORES FOTO
    for($i = 1; $i <= 5; $i++){
        if ( !empty( $_POST['foto_debatedor'.$i] ) ){
            $foto_debatedorId[$i] = upload_image($_POST['foto_debatedor'.$i]);
        }
    }

    //Update MetaBoxes 
    $prefix ='ss_';
    update_post_meta( $pid, $prefix.'data', $data );
    update_post_meta( $pid, $prefix.'horario', $horario );
    update_post_meta( $pid, $prefix.'sessao_local', $sessao_local );
    update_post_meta( $pid, $prefix.'logradouro', $logradouro );
    update_post_meta( $pid, $prefix.'numero', $numero );
    update_post_meta( $pid, $prefix.'complemento', $complemento );
    update_post_meta( $pid, $prefix.'bairro', $bairro );
    update_post_meta( $pid, $prefix.'cidade', $cidade );
    update_post_meta( $pid, $prefix.'estado', $estado);
    update_post_meta( $pid, $prefix.'cep', $cep );
    update_post_meta( $pid, $prefix.'requisito', $requisito );
    update_post_meta( $pid, $prefix.'cineclube_nome', $cineclube_nome );
    update_post_meta( $pid, $prefix.'cineclube_id', $cineclube_id );


  
    
    
    //FOR FILMES
    for($i = 1; $i <= 16; $i++){
        update_post_meta( $pid, $prefix.'nome_filme'.$i , $nome_filme[$i] );
        update_post_meta( $pid, $prefix.'nome_original'.$i , $nome_original[$i] );
        update_post_meta( $pid, $prefix.'direcao'.$i , $direcao[$i] );
        update_post_meta( $pid, $prefix.'ano'.$i , $ano[$i] );
        update_post_meta( $pid, $prefix.'pais'.$i , $pais[$i] );
        update_post_meta( $pid, $prefix.'idioma'.$i , $idioma[$i] );
        update_post_meta( $pid, $prefix.'sinopse'.$i , $sinopse[$i] );
        update_post_meta( $pid, $prefix.'classificacao'.$i , $classificacao[$i] );

        //Add Legendado  CheckBox
        $leg_dub =  $_POST['leg_dub'.$i];
        for($c = 0 ; $c < count($leg_dub); $c++){
           add_post_meta( $pid, $prefix.'leg_dub'.$i,  $leg_dub[$c]);
        }

    }
    
    update_post_meta( $pid, $prefix.'havera_debate', $havera_debate );

    //FOR DEBATEDORES
    for($i = 1; $i <= 5; $i++){
        update_post_meta( $pid, $prefix.'nome_debatedor'.$i , $nome_debatedor[$i] );
        update_post_meta( $pid, $prefix.'foto_debatedor'.$i , $foto_debatedorId[$i]);
        update_post_meta( $pid, $prefix.'bibliografia_debatedor'.$i , $bibliografia_debatedor[$i] );
    }

};



/*
* Form Relatorio Sessao
*/
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "form_form_relatorio") {

    //METABOXs
    //Dados da Sessão
    $title =  $_POST['title'];
    $sessao_id  = $_POST['sessao_id'];
    
    //Verificar Realizacao da sessao
    $sessao_cancelada =  $_POST['sessao_cancelada'];
    $justificativa_nao =  trim(nl2br($_POST['justificativa_nao']));

    //Sessao Realizada
    $pessoas_presentes =  $_POST['pessoas_presentes'];
    $relato =  trim(nl2br($_POST['relato']));
    $fetaria_prim =  $_POST['fetaria_prim'];
    $fetaria_segun =  $_POST['fetaria_segun'];
    $nome_resp_relatorio =  $_POST['nome_resp_relatorio'];
    $email_respo =  $_POST['email_respo'];
    $telefone_resp =  $_POST['telefone_resp'];
    $funcao_respo =  $_POST['funcao_respo'];
    $foto_sessão =  $_POST['foto_sessão'];
    $atividade_programada =  $_POST['atividade_programada'];
    $atividade_programada_desc =  trim(nl2br($_POST['atividade_programada_desc']));
    $links_relacionados =  trim(nl2br($_POST['links_relacionados']));
    $data_sessao = $_POST['data_sessao'];
    $divulgacao_opcional = $_POST['divulgacao_opcional'];

    // Add the content of the form to $post as an array
    $relatorio_sessao = array(
        'post_title'    => $title,
        'post_status'   => 'publish',           
        'post_type' => 'relatorio_sessao'  //'post',page' or use a custom post type if you want to
    );

    //save the new post
    $pid = wp_insert_post($relatorio_sessao); 
    
    //Update MetaBoxes 
    $prefix = 'rs_';
    
    //Form Sessao Relatorio ID
    update_post_meta( $sessao_id, 'ss_id_relatorio', $pid );

    //FORM RELATORIO
    update_post_meta( $pid, $prefix.'sessao_id', $sessao_id );

    update_post_meta( $pid, $prefix.'sessao_cancelada', $sessao_cancelada );
    update_post_meta( $pid, $prefix.'justificativa_nao', $justificativa_nao );
    
    update_post_meta( $pid, $prefix.'pessoas_presentes', $pessoas_presentes );
    update_post_meta( $pid, $prefix.'relato', $relato );
    update_post_meta( $pid, $prefix.'fetaria_prim', $fetaria_prim );
    update_post_meta( $pid, $prefix.'fetaria_segun', $fetaria_segun );
    update_post_meta( $pid, $prefix.'nome_resp_relatorio', $nome_resp_relatorio );
    update_post_meta( $pid, $prefix.'email_respo', $email_respo);
    update_post_meta( $pid, $prefix.'telefone_resp', $telefone_resp );
    update_post_meta( $pid, $prefix.'funcao_respo', $funcao_respo );
    update_post_meta( $pid, $prefix.'atividade_programada', $atividade_programada );
    update_post_meta( $pid, $prefix.'atividade_programada_desc', $atividade_programada_desc );
    update_post_meta( $pid, $prefix.'links_relacionados', $links_relacionados );
    update_post_meta( $pid, $prefix.'data_sessao', $data_sessao );
    update_post_meta( $pid, $prefix.'divulgacao_opcional', $divulgacao_opcional );  


    //Upload de arquivo
     if ( !empty( $_POST['arquivo_just'] ) ){
        $arquivo_justID =  upload_image($_POST['arquivo_just']);
        update_post_meta( $pid, $prefix.'arquivo_just', $arquivo_justID);
    }
    
    //Add Divulgacao CheckBox
    $divulgacao =  $_POST['divulgacao'];
    for($i = 0 ; $i < count($divulgacao); $i++){
       add_post_meta( $pid, $prefix.'divulgacao',  $divulgacao[$i]);
    }
    

    //FOR FOTO SESSAO UPDATE POST
    for($i = 1; $i <= 6; $i++){
        if ( !empty( $_POST['foto_sessao'.$i] ) ){
            $foto_sessaoId[$i] = upload_image($_POST['foto_sessao'.$i]);
            update_post_meta( $pid, $prefix.'foto_sessao'.$i , $foto_sessaoId[$i]);
         }
    }



}