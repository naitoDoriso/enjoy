<?php

namespace APP\Models;

use CodeIgniter\Model;

class FornecedorModel extends Model
{
    protected $table = 'FORNECEDOR';
    protected $primaryKey = 'ID_FORNECEDOR';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['NOME_FORNECEDOR', 'CNPJ', 'ENDERECO', 'CEP', 'TELEFONE'];
    protected $returnType = 'object';

    protected $validationRules = [
        "NOME_FORNECEDOR" => "required|regex_match[/^([ \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]",
        "CNPJ" => "required|regex_match[/^[\d.\/-]*$/]",
        "ENDERECO" => "required|regex_match[/^([\d,. \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]|max_length[50]",
        "CEP" => "required|regex_match[/^[\d-]*$/]|max_length[10]",
        "TELEFONE" => "required|regex_match[/^[\(\d\)-]*$/]"
    ];

    protected $validationMessages = [
        "NOME_FORNECEDOR" => [
            "required" => "Campo NOME não pode estar vazio",
            "regex_match" => "Campo NOME possui caracteres inválidos"
        ],

        "CNPJ" => [
            "required" => "Campo CNPJ não pode estar vazio",
            "regex_match" => "Campo CNPJ deve ser no padrão 00.000.000/0000-00"
        ],

        "ENDERECO" => [
            "required" => "Campo ENDEREÇO não pode estar vazio",
            "regex_match" => "Campo ENDEREÇO tem caracteres inválidos",
            "max_length" => "Campo ENDEREÇO excedeu o máximo de caracteres"
        ],

        "CEP" => [
            "required" => "Campo CEP não pode estar vazio",
            "regex_match" => "Campo CEP possui caracteres inválidos",
            "max_length" => "Campo CEP excedeu o máximo de caracteres"
        ],

        "TELEFONE" => [
            "required" => "Campo TELEFONE não pode estar vazio",
            "regex_match" => "Campo TELEFONE deve ser no padrão (12)12345-6789"
        ]
    ];

    public function __construct(...$params) {
        parent::__construct(...$params);
        $this->validationMessages = [
            "NOME_FORNECEDOR" => [
                "required" => lang("Validation.fornecedor.nome_fornecedor.required"),
                "regex_match" => lang("Validation.fornecedor.nome_fornecedor.regex_match")
            ],
    
            "CNPJ" => [
                "required" => lang("Validation.fornecedor.cnpj.required"),
                "regex_match" => lang("Validation.fornecedor.cnpj.regex_match")
            ],
    
            "ENDERECO" => [
                "required" => lang("Validation.fornecedor.endereco.required"),
                "regex_match" => lang("Validation.fornecedor.endereco.regex_match"),
                "max_length" => lang("Validation.fornecedor.endereco.max_length")
            ],
    
            "CEP" => [
                "required" => lang("Validation.fornecedor.cep.required"),
                "regex_match" => lang("Validation.fornecedor.cep.regex_match"),
                "max_length" => lang("Validation.fornecedor.cep.max_length")
            ],
    
            "TELEFONE" => [
                "required" => lang("Validation.fornecedor.telefone.required"),
                "regex_match" => lang("Validation.fornecedor.telefone.regex_match")
            ]
        ];
    }
}