<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class ClienteModel extends Model{
        protected $primaryKey = "CPF";
        protected $useAutoIncrement = false;
        protected $table = "CLIENTE";
        protected $allowedFields = ['CPF','NOME', 'ENDERECO', 'TELEFONE'];
        protected $returnType = "object";

        protected $validationRules = [
            "CPF"=> "required|is_unique[CLIENTE.CPF]|is_unique[VENDEDOR.CPF]|regex_match[/^[\d.-]*$/]",
            "NOME"=> "required|regex_match[/^([ \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]|max_length[60]",
            "ENDERECO"=> "regex_match[/^([\d,. \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]|max_length[100]",
            "TELEFONE"=> "regex_match[/^[ \+\(\d\)-]*$/]"
        ];
    
        protected $validationMessages = [ 
            "CPF"=> [
                "is_unique" => "CPF já cadastrado",
                "required"=> "Campo CPF não pode estar vazio",
                "regex_match"=> "Campo CPF deve ser no padrão 123.456.789-12"],
    
            "NOME"=> [
                "required"=> "Campo NOME não pode estar vazio",
                "regex_match"=> "Campo NOME tem caracteres inválidos",
                "max_length" => "Campo NOME excedeu o máximo de caracteres"],

            "ENDERECO"=> [
                "regex_match"=> "Campo ENDEREÇO tem caracteres inválidos",
                "max_length"=> "Campo ENDEREÇO excedeu o máximo de caracteres"],
    
            "TELEFONE"=> [
                "regex_match"=> "Campo TELEFONE possui caracteres inválidos"]
        ];

        public function __construct(...$params) {
            parent::__construct(...$params);
            $this->validationMessages = [
                "CPF"=> [
                    "is_unique" => lang('Validation.cliente.cpf.is_unique'),
                    "required" => lang('Validation.cliente.cpf.required'),
                    "regex_match" => lang('Validation.cliente.cpf.regex_match')
                ],
        
                "NOME"=> [
                    "required" => lang('Validation.cliente.nome.required'),
                    "regex_match" => lang('Validation.cliente.nome.regex_match'),
                    "max_length" => lang('Validation.cliente.nome.max_length')
                ],
    
                "ENDERECO"=> [
                    "regex_match" => lang('Validation.cliente.endereco.regex_match'),
                    "max_length" => lang('Validation.cliente.endereco.max_length')
                ],
        
                "TELEFONE"=> [
                    "regex_match" => lang('Validation.cliente.telefone.regex_match')
                ]
            ];
        }
    }
?>