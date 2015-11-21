<?php



add_filter( 'rwmb_meta_boxes', 'cadastro_sessao_register_meta_boxes' );

function cadastro_sessao_register_meta_boxes( $meta_boxes )
{
    $prefix = 'ss_';

    // Data em que será realizada a sessão
    $meta_boxes[] = array(
        'id'       => 'data_realizacao',
        'title'    => 'Data em que será realizada a sessão',
        'pages'    => array('sessao'),
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
        'pages'    => array('sessao'),
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
        'pages'    => array('sessao'),
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
        'pages'    => array('sessao'),
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
        'pages'    => array('sessao'),
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
            'pages'    => array( 'sessao'),
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
        'pages'    => array('sessao'),
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
            'pages'    => array( 'sessao'),
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
        'pages'    => array('sessao'),
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
    

    // Relatorio de Sessão
    $meta_boxes[] = array(
        'id'       => 'relatorio_id',
        'title'    => 'relatorio_sessao',
        'pages'    => array('sessao'),
        'fields' => array(
            array(
                'name' => 'Relatorio da Sessão ID POST',
                'id'   => $prefix . 'id_relatorio',
                'type' => 'text',
            ),
        )
    );


    return $meta_boxes;
}
