<?php

namespace APP\Models;

use CodeIgniter\Model;

class VendedorModel extends Model
{
    protected $table = 'VENDEDOR';
    protected $primaryKey = 'ID_VENDEDOR';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['NOME_VENDEDOR', 'DATA_NASC', 'CPF', 'EMAIL', 'ENDERECO', 'CEP', 'TELEFONE'];
    protected $returnType = 'object';

    protected $validationRules = [
        "NOME_VENDEDOR" => "required|regex_match[/^([ \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]",
        "DATA_NASC" => "required|valid_date",
        "CPF" => "required|regex_match[/^[\d.-]*$/]",
        "EMAIL" => "required|valid_email",
        "ENDERECO" => "required|regex_match[/^([\d,. \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]|max_length[50]",
        "CEP" => "required|regex_match[/^[\d-]*$/]",
        "TELEFONE" => "required|regex_match[/^[\(\d\)-]*$/]"
    ];

    protected $validationMessages = [
        "NOME_VENDEDOR" => [
            "required" => "Campo NOME não pode estar vazio",
            "regex_match" => "Campo NOME tem caracteres inválidos"
        ],

        "DATA_NASC" => [
            "required" => "Campo DATA_NASC não pode estar vazio",
            "valid_date" => "Campo DATA_NASC aceita somente datas válidas"
        ],

        "CPF" => [
            "required" => "Campo CPF não pode estar vazio",
            "regex_match" => "Campo CPF deve ser no padrão 123.456.789-12"
        ],

        "EMAIL" => [
            "required" => "Campo EMAIL não pode estar vazio",
            "valid_email" => "Campo EMAIL aceita somente emails válidos"
        ],

        "ENDERECO" => [
            "required" => "Campo ENDEREÇO não pode estar vazio",
            "regex_match" => "Campo ENDEREÇO tem caracteres inválidos",
            "max_length" => "Campo ENDEREÇO excedeu o máximo de caracteres"
        ],

        "CEP" => [
            "required" => "Campo CEP não pode estar vazio",
            "regex_match" => "Campo CEP deve ser no padrão 12345-678"
        ],

        "TELEFONE" => [
            "required" => "Campo TELEFONE não pode estar vazio",
            "regex_match" => "Campo TELEFONE deve ser no padrão (12)12345-6789"
        ]
    ];

    public function __construct(...$param)
    {
        parent::__construct(...$param);
        $this->validationMessages = [
            "NOME_VENDEDOR" => [
                "required" => lang("Validation.vendedor.nome_vendedor.required"),
                "regex_match" => lang("Validation.vendedor.nome_vendedor.regex_match")
            ],

            "DATA_NASC" => [
                "required" => lang("Validation.vendedor.data_nasc.required"),
                "valid_date" => lang("Validation.vendedor.data_nasc.valid_date")
            ],

            "CPF" => [
                "required" => lang("Validation.vendedor.cpf.required"),
                "regex_match" => lang("Validation.vendedor.cpf.regex_match")
            ],

            "EMAIL" => [
                "required" => lang("Validation.vendedor.email.required"),
                "valid_email" => lang("Validation.vendedor.email.valid_email")
            ],

            "ENDERECO" => [
                "required" => lang("Validation.vendedor.endereco.required"),
                "regex_match" => lang("Validation.vendedor.endereco.regex_match"),
                "max_length" => lang("Validation.vendedor.endereco.max_length")
            ],

            "CEP" => [
                "required" => lang("Validation.vendedor.cep.required"),
                "regex_match" => lang("Validation.vendedor.cep.regex_match")
            ],

            "TELEFONE" => [
                "required" => lang("Validation.vendedor.telefone.required"),
                "regex_match" => lang("Validation.vendedor.telefone.regex_match")
            ]
        ];
    }
}
