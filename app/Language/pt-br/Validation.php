<?php

return [
    'cliente' => [
        'cpf'=> [
            'is_unique' => 'CPF já cadastrado',
            'required' => 'Campo CPF não pode estar vazio',
            'regex_match' => 'Campo CPF deve ser no padrão 123.456.789-12'],

        'nome'=> [
            'required' => 'Campo NOME não pode estar vazio',
            'regex_match' => 'Campo NOME tem caracteres inválidos',
            'max_length' => 'Campo NOME excedeu o máximo de caracteres'],

        'endereco' => [
            'regex_match' => 'Campo ENDEREÇO tem caracteres inválidos',
            'max_length' => 'Campo ENDEREÇO excedeu o máximo de caracteres'],

        'telefone' => [
            'regex_match' => 'Campo TELEFONE possui caracteres inválidos']
    ],
    'estoque' => [
        'data_entrada'=> [
            'required'=> 'Campo DATA não pode estar vazio',
            'valid_date'=> 'Campo DATA aceita somente datas'],

        'quantidade_entrada'=> [
            'required'=> 'Campo QUANTIDADE ENTRADA não pode estar vazio',
            'is_natural_no_zero'=> 'Campo QUANTIDADE ENTRADA aceita somente números positivos'],
                        
        'id_produto'=> [
            'required'=> 'Campo PRODUTO não pode estar vazio',
            'integer'=> 'Campo PRODUTO aceita somente números inteiros']
    ],
    'fornecedor' => [
        'nome_fornecedor' => [
            'required' => 'Campo NOME não pode estar vazio',
            'regex_match' => 'Campo NOME possui caracteres inválidos'
        ],
                
        'cnpj' => [
            'is_unique' => 'Fornecedor já cadastrado neste CNPJ',
            'required' => 'Campo CNPJ não pode estar vazio',
            'regex_match' => 'Campo CNPJ deve ser no padrão 00.000.000/0000-00'
        ],
                
        'endereco' => [
            'required' => 'Campo ENDEREÇO não pode estar vazio',
            'regex_match' => 'Campo ENDEREÇO tem caracteres inválidos',
            'max_length' => 'Campo ENDEREÇO excedeu o máximo de caracteres'
                        ],
                
        'cep' => [
            'required' => 'Campo CEP não pode estar vazio',
            'regex_match' => 'Campo CEP possui caracteres inválidos',
            'max_length' => 'Campo CEP excedeu o máximo de caracteres'
                        ],
                
        'telefone' => [
            'required' => 'Campo TELEFONE não pode estar vazio',
            'regex_match' => 'Campo TELEFONE possui caracteres inválidos'
        ]
    ],
    'produto' => [
        'nome_produto'=> [
            'required'=> 'Campo NOME não pode estar vazio',
            'regex_match'=> 'Campo NOME tem caracteres inválidos',
            'max_lenght'=> 'Campo NOME excedeu o máximo de caracteres'],

        'marca'=> [
            'required'=> 'Campo MARCA não pode estar vazio',
            'regex_match'=> 'Campo MARCA tem caracteres inválidos',
            'max_lenght'=> 'Campo MARCA excedeu o máximo de caracteres'],

        'quantidade'=> [
            'required'=> 'Campo QUANTIDADE não pode estar vazio',
            'integer'=> 'Campo QUANTIDADE aceita somente números inteiros'],

        'valor'=> [
            'required'=> 'Campo VALOR não pode estar vazio',
            'numeric'=> 'Campo VALOR aceita somente números'],

        'id_fornecedor'=> [
            'required'=> 'Campo FORNECEDOR não pode estar vazio',
            'integer'=> 'Campo FORNECEDOR aceita somente números']
    ],
    'venda' => [
        'data_venda'=> [
            'required'=> 'Campo DATA não pode estar vazio',
            'valid_date'=> 'Campo DATA aceita somente datas'],
            
        'quantidade_venda'=> [
            'required'=> 'Campo QUANTIDADE não pode estar vazio',
            'integer'=> 'Campo QUANTIDADE aceita somente números inteiros']
    ],
    'vendedor' => [
        'nome_vendedor' => [
            'required' => 'Campo NOME não pode estar vazio',
            'regex_match' => 'Campo NOME tem caracteres inválidos'
        ],

        'data_nasc' => [
            'required' => 'Campo DATA não pode estar vazio',
            'valid_date' => 'Campo DATA aceita somente datas válidas'
        ],

        'cpf' => [
            'is_unique' => 'CPF já cadastrado',
            'required' => 'Campo CPF não pode estar vazio',
            'regex_match' => 'Campo CPF deve ser no padrão 123.456.789-12'
        ],

        'email' => [
            'required' => 'Campo EMAIL não pode estar vazio',
            'valid_email' => 'Campo EMAIL aceita somente emails válidos'
        ],

        'endereco' => [
            'required' => 'Campo ENDEREÇO não pode estar vazio',
            'regex_match' => 'Campo ENDEREÇO tem caracteres inválidos',
            'max_length' => 'Campo ENDEREÇO excedeu o máximo de caracteres'
        ],

        'cep' => [
            'required' => 'Campo CEP não pode estar vazio',
            'regex_match' => 'Campo CEP deve ser no padrão 12345-678'
        ],

        'telefone' => [
            'required' => 'Campo TELEFONE não pode estar vazio',
            'regex_match' => 'Campo TELEFONE possui caracteres inválidos'
        ]
    ]
];