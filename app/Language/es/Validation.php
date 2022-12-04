<?php

return [
    'cliente' => [
        'cpf' => [
            'required' => 'El campo CPF no puede estar vacío',
            'regex_match' => 'El campo CPF debe estar en el patrón 123.456.789-12'],

        'nome' => [
            'required' => 'El campo NOMBRE no puede estar vacío',
            'regex_match' => 'El campo NOMBRE tiene caracteres no válidos',
            'max_length' => 'El campo NOMBRE ha excedido el máximo de caracteres'],

        'endereco' => [
            'regex_match' => 'El campo DIRECCIÓN tiene caracteres no válidos',
            'max_length' => 'El campo DIRECCIÓN ha excedido el número máximo de caracteres'],

        'telefone' => [
            'regex_match' => 'El campo TELÉFONO debe estar en el patrón (12)12345-6789']
    ],
    'estoque' => [
        'data_entrada' => [
            'required' => 'El campo de DATOS no puede estar vacío',
            'valid_date' => 'El campo DATA solo acepta fechas'],

        'quantidade_entrada' => [
            'required' => 'El campo CANTIDAD DE ENTRADA no puede estar vacío',
            'integer' => 'El campo INPUT QUANTITY acepta solo números enteros'],
                        
        'id_produto' => [
            'required' => 'El campo PRODUCTO no puede estar vacío',
            'integer' => 'El campo PRODUCTO solo acepta números enteros']
    ],
    'fornecedor' => [
        'nome_fornecedor' => [
            'required' => 'El campo NOMBRE no puede estar vacío',
            'regex_match' => 'El campo NOMBRE tiene caracteres no válidos'
        ],
                
        'cnpj' => [
            'required' => 'El campo CNPJ no puede estar vacío',
            'regex_match' => 'El campo CNPJ debe estar en el valor predeterminado 00.000.000/0000-00'
        ],
                
        'endereco' => [
            'required' => 'El campo DIRECCIÓN no puede estar vacío',
            'regex_match' => 'El campo DIRECCIÓN tiene caracteres no válidos',
            'max_length' => 'El campo DIRECCIÓN ha excedido el número máximo de caracteres'
        ],
                
        'cep' => [
            'required' => 'El campo CEP no puede estar vacío',
            'regex_match' => 'El campo CEP tiene caracteres no válidos',
            'max_length' => 'El campo CEP excedió los caracteres máximos'
        ],
                
        'telefone' => [
            'required' => 'El campo TELÉFONO no puede estar vacío',
            'regex_match' => 'El campo TELÉFONO debe estar en el patrón (12)12345-6789'
        ]
    ],
    'produto' => [
        'nome_produto' => [
            'required' => 'El campo NOMBRE no puede estar vacío',
            'regex_match' => 'El campo NOMBRE tiene caracteres no válidos',
            'max_lenght' => 'El campo NOMBRE ha excedido el máximo de caracteres'],

        'marca' => [
            'required' => 'El campo MARCA no puede estar vacío',
            'regex_match' => 'El campo MARCA tiene caracteres no válidos',
            'max_lenght' => 'El campo MARCA ha excedido el número máximo de caracteres'],

        'quantidade' => [
            'required' => 'El campo CANTIDAD no puede estar vacío',
            'integer' => 'El campo CANTIDAD acepta solo números enteros'],

        'valor' => [
            'required' => 'El campo VALOR no puede estar vacío',
            'numeric' => 'El campo VALOR solo acepta números'],

        'id_fornecedor' => [
            'required' => 'El campo PROVEEDOR no puede estar vacío',
            'integer' => 'El campo PROVEEDOR solo acepta números']
    ],
    'venda' => [
        'data_venda' => [
            'required' => 'El campo de DATOS no puede estar vacío',
            'valid_date' => 'El campo DATA solo acepta fechas'],
            
        'quantidade_venda' => [
            'required' => 'El campo CANTIDAD no puede estar vacío',
            'integer' => 'El campo CANTIDAD acepta solo números enteros']
    ],
    'vendedor' => [
        'nome_vendedor' => [
            'required' => 'El campo NOMBRE no puede estar vacío',
            'regex_match' => 'El campo NOMBRE tiene caracteres no válidos'
        ],

        'data_nasc' => [
            'required' => 'El campo de DATOS no puede estar vacío',
            'valid_date' => 'El campo FECHA acepta solo fechas válidas'
        ],

        'cpf' => [
            'required' => 'El campo CPF no puede estar vacío',
            'regex_match' => 'El campo CPF debe estar en el patrón 123.456.789-12'
        ],

        'email' => [
            'required' => 'El campo EMAIL no puede estar vacío',
            'valid_email' => 'El campo EMAIL solo acepta correos electrónicos válidos'
        ],

        'endereco' => [
            'required' => 'El campo DIRECCIÓN no puede estar vacío',
            'regex_match' => 'El campo DIRECCIÓN tiene caracteres no válidos',
            'max_length' => 'El campo DIRECCIÓN ha excedido el número máximo de caracteres'
        ],

        'cep' => [
            'required' => 'El campo CEP no puede estar vacío',
            'regex_match' => 'El campo CEP debe estar en el patrón 12345-678'
        ],

        'telefone' => [
            'required' => 'El campo TELÉFONO no puede estar vacío',
            'regex_match' => 'El campo TELÉFONO debe estar en el patrón (12)12345-6789'
        ]
    ]
];