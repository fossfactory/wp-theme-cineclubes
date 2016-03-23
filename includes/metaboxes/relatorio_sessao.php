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
        
    /*
     * Campos Sessao
     */ 

    // Data em que será realizada a sessão
    $meta_boxes[] = array(
        'id'       => 'data_realizacao',
        'title'    => 'Data em que será realizada a sessão',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'data',
                'id'   => $prefix . 'data',
                'type'       => 'date',
                // jQuery date picker options. See here http://api.jqueryui.com/datepicker
                'js_options' => array(
                    'appendText'      => 'dd-mm-yyyy',
                    'dateFormat'      => 'dd-mm-yyyy',
                    'changeMonth'     => true,
                    'changeYear'      => true,
                    'showButtonPanel' => true,
                ),
            ),
        )
    );

    // Horario de Inicio
    $meta_boxes[] = array(
        'id'       => 'horario_inciio',
        'title'    => 'Horário de início da sessão',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Horario',
                'id'   => $prefix . 'horario',
                'type' => 'time',
                // jQuery datetime picker options.
                // For date options, see here http://api.jqueryui.com/datepicker
                // For time options, see here http://trentrichardson.com/examples/timepicker/
                'js_options' => array(
                    'stepMinute' => 5,
                    'showSecond' => true,
                    'stepSecond' => 10,
                ),
            ),
        ),
    );

    // Sessão realizada no mesmo endereço do cineclube?
    $meta_boxes[] = array(
        'id'       => 'sessao_local',
        'title'    => 'Sessão realizada no mesmo endereço do cineclube?',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '',
                'id'   => $prefix . 'sessao_local',
                'type' => 'radio',
                'options' => array(
                    'sim' => 'Sim',
                    'nao' => 'Não',
                )
            ),
        )
    );

    // Endereço da SESSAO
    $meta_boxes[] = array(
        'id'       => 'endereco_ceu',
        'title'    => 'Endereço do CEU',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Logradouro',
                'id'   => $prefix . 'logradouro',
                'type' => 'text',
            ),

            array(
                'name' => 'Número',
                'id'   => $prefix . 'numero',
                'type' => 'text',
            ),

            array(
                'name' => 'Complemento',
                'id'   => $prefix . 'complemento',
                'type' => 'text',
            ),

            array(
                'name' => 'Bairro',
                'id'   => $prefix . 'bairro',
                'type' => 'text',
            ),

            array(
                'name' => 'Cidade',
                'id'   => $prefix . 'cidade',
                'type' => 'text',
            ),

            array(
                'name' => 'Estado',
                'id'   => $prefix . 'estado',
                'type' => 'text',
            ),

            array(
                'name' => 'CEP',
                'id'   => $prefix . 'cep',
                'type' => 'text',
            ),
        )
    );


    // Requisito de entrada na sessão
    $meta_boxes[] = array(
        'id'       => 'requisito',
        'title'    => 'Sessão gratuita?',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Digite aqui os requisitos para participar da sessão',
                'id'   => $prefix . 'requisito',
                'type' => 'text',
            ),
        )
    );
    
    for($i = 1; $i <= 16; $i++){
        // Filme
        $meta_boxes[] = array(
            'id'       => 'filme'. $i,
            'title'    => 'Filme a ser exibido ' . $i,
            'pages'    => array( 'relatorio_sessao'),
            'context'  => 'normal',
            'priority' => 'high',
            'type'  => 'group',
            'clone' => true,
            'fields' => array(
                array(
                    'name'  => 'Nome do filme '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'nome_filme'. $i,
                    'type'  => 'text',   
                ),

                array(
                    'name'  => 'Nome original ' . $i,
                    'desc'  => '',
                    'id'    => $prefix . 'nome_original'. $i,
                    'type'  => 'text',   
                ),

                array(
                    'name'  => 'Direção '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'direcao'. $i,
                    'type'  => 'text',   
                ),
                array(
                    'name'  => 'Duração  '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'duracao'. $i,
                    'type'  => 'text'                    
                ),
                array(
                    'name'  => 'Ano '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'ano'. $i,
                    'type'  => 'text',   
                ),

                array(
                    'name'  => 'País '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'pais'. $i,
                    'type'  => 'text',   
                ),

                array(
                    'name'  => 'Idioma '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'idioma'. $i,
                    'type'  => 'text',   
                ),

                array(
                    'name'  => 'Legendado ou dublado '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'leg_dub'. $i,
                    'type' => 'checkbox_list',
                    'multiple' => true,  
                    'options' => array(
                            'legendado' => 'Legendado',
                            'dublado' => 'Dublado',
                            'portugues' => 'Audio Original em Português.' ,
                    ),
                ),

                array(
                    'name'  => 'Sinopse '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'sinopse'. $i,
                    'type'  => 'textarea',   
                ),

                array(
                    'name'  => 'Classificação indicativa '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'classificacao'. $i,
                    'type'  => 'radio',
                    'options' => array(
                            'livre' => 'Livre para todas as idades',
                            'Não recomendado para menores de 10 anos' => 'Não recomendado para menores de 10 anos ',
                            'Não recomendado para menores de 12 anos' => 'Não recomendado para menores de 12 anos ' ,
                            'Não recomendado para menores de 14 anos' => 'Não recomendado para menores de 14 anos ',
                            'Não recomendado para menores de 16 anos' => 'Não recomendado para menores de 16 anos ',
                            'Não recomendado para menores de 18 anos' => 'Não recomendado para menores de 18 anos ' ,
                    ),   
                ),
            )
        );

    }//End FOR FILMES
    


    // Haverá debate?
    $meta_boxes[] = array(
        'id'       => 'havera_debate',
        'title'    => 'Haverá debate?',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => '',
                'id'   => $prefix . 'havera_debate',
                'type' => 'radio',
                'options' => array(
                    'sim' => 'Sim',
                    'nao' => 'Não',
                )
            ),
        )
    );

    //FOR DEBATEDOR
    for($i = 1; $i <= 5; $i++){
        // Debatedores
        $meta_boxes[] = array(
            'id'       => 'debatedor'. $i,
            'title'    => 'Debatedor '. $i,
            'pages'    => array( 'relatorio_sessao'),
            'context'  => 'normal',
            'priority' => 'high',
            'type'  => 'group',
            'clone' => true,
            'fields' => array(
                array(
                    'name'  => 'Nome do Debatedor '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'nome_debatedor'. $i,
                    'type'  => 'text',   
                ),

                array(
                    'name'  => 'Foto Debatedor '. $i,
                    'desc'  => '',
                    'id'    => $prefix . 'foto_debatedor'. $i,
                    'type'  => 'image',   
                ),

                array(
                    'name'  => 'Mini bio do debatedor '. $i,
                    'desc'  => 'Bibliografia do Debatedor',
                    'id'    => $prefix . 'bibliografia_debatedor'. $i,
                    'type' => 'textarea',  
                ),
            )
        );
    }//END FOR DEBATEDOR
    
    // Dados de Cineclube Vinculado
    $meta_boxes[] = array(
        'id'       => 'cineclube_vinc',
        'title'    => 'Cineclube Vinculado',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Nome Cineclube',
                'id'   => $prefix . 'cineclube_nome',
                'type' => 'text',
            ),

            array(
                'name' => 'Id Cineclube',
                'id'   => $prefix . 'cineclube_id',
                'type' => 'text',
            ),
        )
    );
    


    /*
     * Campos Cineclube
     */

    // Nome do Ceu
    $meta_boxes[] = array(
        'id'       => 'nome_ceu',
        'title'    => 'Nome do CEU',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Digite o nome do CEU',
                'id'   => $prefix . 'nome_ceu',
                'type' => 'text',
            ),
        )
    );

    // Endereço do CEU
    $meta_boxes[] = array(
        'id'       => 'endereco_ceu',
        'title'    => 'Endereço do CEU',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Logradouro',
                'id'   => $prefix . 'logradouro',
                'type' => 'text',
            ),

            array(
                'name' => 'Número',
                'id'   => $prefix . 'numero',
                'type' => 'text',
            ),

            array(
                'name' => 'Complemento',
                'id'   => $prefix . 'complemento',
                'type' => 'text',
            ),

            array(
                'name' => 'Bairro',
                'id'   => $prefix . 'bairro',
                'type' => 'text',
            ),

            array(
                'name' => 'Cidade',
                'id'   => $prefix . 'cidade',
                'type' => 'text',
            ),

            array(
                'name' => 'Estado',
                'id'   => $prefix . 'estado',
                'type' => 'text',
            ),

            array(
                'name' => 'CEP',
                'id'   => $prefix . 'cep',
                'type' => 'text',
            ),
        )
    );

    // Capacidade máxima de público
    $meta_boxes[] = array(
        'id'       => 'capacidade',
        'title'    => 'Capacidade máxima de público',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Digite a capacidade máxima de público em numero',
                'id'   => $prefix . 'capacidade',
                'type' => 'number',
            ),
        )
    );

    // Biografia do cineclube
    $meta_boxes[] = array(
        'id'       => 'biografia',
        'title'    => 'Biografia do cineclube',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Digite aqui uma breve biografia de seu cineclube',
                'id'   => $prefix . 'biografia',
                'type' => 'textarea',
            ),
        )
    );

    // Email principal do cineclube
    $meta_boxes[] = array(
        'id'       => 'email_principal',
        'title'    => 'Email principal do cineclube',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Email',
                'id'   => $prefix . 'email_prin',
                'type' => 'text',
            ),
        )
    );

    // Email secundário do cineclube
    $meta_boxes[] = array(
        'id'       => 'email_secundario',
        'title'    => 'Email secundário do cineclube',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Email',
                'id'   => $prefix . 'email_secun',
                'type' => 'text',
            ),
        )
    );

    // Telefone principal do cineclube
    $meta_boxes[] = array(
        'id'       => 'telefone_principal',
        'title'    => 'Telefone principal do cineclube',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Telefone',
                'id'   => $prefix . 'telefone_prin',
                'type' => 'text',
            ),
        )
    );

    // Telefone principal do cineclube
    $meta_boxes[] = array(
        'id'       => 'telefone_secundario',
        'title'    => 'Telefone secundário do cineclube',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Telefone',
                'id'   => $prefix . 'telefone_secun',
                'type' => 'text',
            ),
        )
    );

    // Redes sociais do Cineclube
    $meta_boxes[] = array(
        'id'       => 'rede_sociais',
        'title'    => 'Redes sociais do Cineclube',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Facebook',
                'id'   => $prefix . 'facebook',
                'type' => 'text',
            ),

            array(
                'name' => 'Twitter',
                'id'   => $prefix . 'twitter',
                'type' => 'text',
            ),

            array(
                'name' => 'Instagram',
                'id'   => $prefix . 'instagram',
                'type' => 'text',
            ),
        )
    );

    // Consegue receber arquivos de filmes pela internet?
    $meta_boxes[] = array(
        'id'       => 'enviar_arquivos',
        'title'    => 'Consegue receber arquivos de filmes pela internet?',
        'pages'    => array('relatorio_sessao'),
        'fields' => array(
            array(
                'name' => 'Consegue receber arquivos de filmes pela internet?',
                'id'   => $prefix . 'arquivos',
                'type' => 'radio',
                'options' => array(
                    'sim' => 'Sim',
                    'nao' => 'Não',
                )
            ),
        )
    );

    return $meta_boxes;
}