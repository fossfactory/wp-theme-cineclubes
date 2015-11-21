<?php

add_filter( 'rwmb_meta_boxes', 'relatorio_sessao_register_meta_boxes' );

function relatorio_sessao_register_meta_boxes( $meta_boxes )
{
    $prefix = 'rs_';

    //  A sessão foi Realizada ou Cancelada?
    $meta_boxes[] = array(
        'id'       => 'sessao_cancelada',
        'title'    => 'A sessão foi Realizada ou Cancelada?',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '',
                'id'   => $prefix . 'sessao_cancelada',
                'type' => 'radio',
                'options' => array(
                    'realizada' => 'realizada',
                    'cancelada' => 'cancelada',
                )
            ),
        )
    );

     //  A sessão foi Realizada ou Cancelada?
    $meta_boxes[] = array(
        'id'       => 'sessao_cancelada',
        'title'    => 'A sessão foi Realizada ou Cancelada?',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '',
                'id'   => $prefix . 'sessao_cancelada',
                'type' => 'radio',
                'options' => array(
                    'realizada' => 'realizada',
                    'cancelada' => 'cancelada',
                )
            ),
        )
    );
    
    // Justificativa da não-realização
    $meta_boxes[] = array(
        'id'       => 'data_sessao',
        'title'    => 'Justificativa da não-realização',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Justificativa',
                'id'   => $prefix . 'justificativa_nao',
                'type' => 'textarea',
            ),

            array(
                    'name'  => ' Arquivo',
                    'id'    => $prefix . 'arquivo_just',
                    'type'  => 'file',   
            ),
        )
    );

    // Número total de pessoas presentes
    $meta_boxes[] = array(
        'id'       => 'pessoas_presentes',
        'title'    => 'Número total de pessoas presentes',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '',
                'id'   => $prefix . 'pessoas_presentes',
                'type' => 'number',
            ),
        )
    );

    // A divulgação da sessão foi feita como?
    $meta_boxes[] = array(
        'id'       => 'divulgacao',
        'title'    => 'A divulgação da sessão foi feita como?',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '(item de múltipla escolha, onde é permitida a livre marcação)',
                'id'   => $prefix . 'divulgacao',
                'type' => 'checkbox_list',
                'multiple' => true,
                'options' => array(
                    'cartaz' => 'Cartaz',
                    'planfeto' => 'Planfeto',
                    'jornal_impresso' => 'Jornal impresso',
                    'tv' => 'TV',
                    'radio' => 'Rádio',
                    'site' => 'Site',
                    'email' => 'Lista de e-mails',
                    'redes_social' => 'Redes sociais',
                ),
               
            ),

            array(
                'name' => 'Foi Realizado outro tipo de divulgação não listado acima?Qual?',
                'id'   => $prefix . 'divulgacao_opcional',
                'type' => 'text',
            ),
        )
    );

    //  Relato de sessão
    $meta_boxes[] = array(
        'id'       => 'relato',
        'title'    => 'Relato de sessão',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Conte um pouco de como foi',
                'id'   => $prefix . 'relato',
                'type' => 'textarea',
            ),
        )
    );
    

    // Selecione primeira faixa etária em maioria durante a sessão
    $meta_boxes[] = array(
        'id'       => 'fetaria_prim',
        'title'    => 'Selecione primeira faixa etária em maioria durante a sessão',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '',
                'id'   => $prefix . 'fetaria_prim',
                'type' => 'radio',
                'options' => array(
                    'crianca' => 'Criança (0 a 14)',
                    'jovem' => 'Jovem (15 a 29 anos)',
                    'adulto' => 'Adulto (30 e 59 anos)',
                    'idoso' => 'Idoso (60 ou mais)',
                )
            ),
        )
    );

    // 3.6 Selecione segunda faixa etária em maioria 
    $meta_boxes[] = array(
        'id'       => 'fetaria_segun',
        'title'    => 'Selecione segunda faixa etária em maioria durante a sessão',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '',
                'id'   => $prefix . 'fetaria_segun',
                'type' => 'radio',
                'options' => array(
                    'crianca' => 'Criança (0 a 14)',
                    'jovem' => 'Jovem (15 a 29 anos)',
                    'adulto' => 'Adulto (30 e 59 anos)',
                    'idoso' => 'Idoso (60 ou mais)',
                )
            ),
        )
    );

    // Nome do responsável por preencher o relatório
    $meta_boxes[] = array(
        'id'       => 'nome_resp_relatorio',
        'title'    => 'Nome do responsável por preencher o relatório',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '',
                'id'   => $prefix . 'nome_resp_relatorio',
                'type' => 'text',
            ),
        )
    );

    // Email do responsável
    $meta_boxes[] = array(
        'id'       => 'email_respo',
        'title'    => 'Email do responsável',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Email',
                'id'   => $prefix . 'email_respo',
                'type' => 'text',
            ),
        )
    );

    // Telefone do responsável
    $meta_boxes[] = array(
        'id'       => 'telefone_resp',
        'title'    => 'Telefone do responsável',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Telefone',
                'id'   => $prefix . 'telefone_resp',
                'type' => 'text',
            ),
        )
    );

    // Função do responsável exercida na sessão
    $meta_boxes[] = array(
        'id'       => 'funcao_respo',
        'title'    => 'Função do responsável exercida na sessão',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Função',
                'id'   => $prefix . 'funcao_respo',
                'type' => 'text',
            ),
        )
    );

    //Coloque aqui fotos da sessão
    $meta_boxes[] = array(
        'id'       => 'fotos_sessao',
        'title'    => 'Coloque aqui fotos da sessão',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name'  => 'Fotos da Sessão 1',
                'id'    => $prefix . 'foto_sessao1',
                'type'  => 'image',   
            ),
            array(
                'name'  => 'Fotos da Sessão 2',
                'id'    => $prefix . 'foto_sessao2',
                'type'  => 'image',   
            ),
            array(
                'name'  => 'Fotos da Sessão 3',
                'id'    => $prefix . 'foto_sessao3',
                'type'  => 'image',   
            ),
            array(
                'name'  => 'Fotos da Sessão 4',
                'id'    => $prefix . 'foto_sessao4',
                'type'  => 'image',   
            ),
            array(
                'name'  => 'Fotos da Sessão 5',
                'id'    => $prefix . 'foto_sessao5',
                'type'  => 'image',   
            ),
            array(
                'name'  => 'Fotos da Sessão 6',
                'id'    => $prefix . 'foto_sessao6',
                'type'  => 'image',   
            ),
        )
    );


    // Houve alguma outra atividade programada junto a sessão? 
    $meta_boxes[] = array(
        'id'       => 'atividade_programada',
        'title'    => 'Houve alguma outra atividade programada junto a sessão? ',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Atividade Programada?',
                'id'   => $prefix . 'atividade_programada',
                'type' => 'radio',
                'options' => array(
                    'sim' => 'Sim',
                    'nao' => 'Não',
                )
            ),

            array(
                'name' => 'Se sim conte um pouco',
                'id'   => $prefix . 'atividade_programada_desc',
                'type' => 'textarea',
            ),
        )
    );


    // Links relacionados a sessão
    $meta_boxes[] = array(
        'id'     => 'links_relacionados',
        'title'  => 'Links relacionados a sessão',
        'pages'  => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Função',
                'id'   => $prefix . 'links_relacionados',
                'type' => 'textarea',
            ),
        )
    );

    // Dados de Sessão Vinculado
    $meta_boxes[] = array(
        'id'       => 'sessao_vinc',
        'title'    => 'Sessão Vinculada',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Id Sessão',
                'id'   => $prefix . 'sessao_id',
                'type' => 'text',
            ),
        )
    );

    return $meta_boxes;
}