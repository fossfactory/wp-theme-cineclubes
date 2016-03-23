<?php

add_filter( 'rwmb_meta_boxes', 'cineclubes_register_meta_boxes' );

function cineclubes_register_meta_boxes( $meta_boxes )
{
    $prefix = 'cb_';

    // Nome do Ceu
    $meta_boxes[] = array(
        'id'       => 'nome_ceu',
        'title'    => 'Nome do CEU',
        'pages'    => array('cineclube'),
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
        'pages'    => array('cineclube'),
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
        'pages'    => array('cineclube'),
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
        'pages'    => array('cineclube'),
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
        'pages'    => array('cineclube'),
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
        'pages'    => array('cineclube'),
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
        'pages'    => array('cineclube'),
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
        'pages'    => array('cineclube'),
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
        'pages'    => array('cineclube'),
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

    return $meta_boxes;
}