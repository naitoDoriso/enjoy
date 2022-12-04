<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class ProdutoModel extends Model{
        protected $primaryKey = "ID_PRODUTO";
        protected $useAutoIncrement = true;
        protected $table = "PRODUTO";
        protected $allowedFields = ['NOME_PRODUTO', 'MARCA', 'QUANTIDADE', 'VALOR','ID_FORNECEDOR'];
        protected $returnType = "object";

        protected $validationRules = [
            "NOME_PRODUTO"=> "required|regex_match[/^([ \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]|max_length[50]",
            "MARCA"=> "required|regex_match[/^([ \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]|max_length[50]",
            "QUANTIDADE"=> "required|integer",
            "VALOR"=> "required|numeric",
            "ID_FORNECEDOR"=> "required|integer"
        ];
    
        protected $validationMessages = [ 
            "NOME_PRODUTO"=> [
                "required"=> "Campo NOME_PRODUTO não pode estar vazio",
                "regex_match"=> "Campo NOME_PRODUTO tem caracteres inválidos",
                "max_lenght"=> "Campo NOME_PRODUTO excedeu o máximo de caracteres"],
    
            "MARCA"=> [
                "required"=> "Campo MARCA não pode estar vazio",
                "regex_match"=> "Campo MARCA tem caracteres inválidos",
                "max_lenght"=> "Campo MARCA excedeu o máximo de caracteres"],

            "QUANTIDADE"=> [
                "required"=> "Campo QUANTIDADE não pode estar vazio",
                "integer"=> "Campo QUANTIDADE aceita somente números inteiros"],

            "VALOR"=> [
                "required"=> "Campo VALOR não pode estar vazio",
                "numeric"=> "Campo VALOR aceita somente números"],

            "ID_FORNECEDOR"=> [
                "required"=> "Campo ID_FORNECEDOR não pode estar vazio",
                "integer"=> "Campo ID_FORNECEDOR aceita somente números"]
        ];

        public function __construct(...$params) {
            parent::__construct(...$params);
            $this->validationMessages = [
                "NOME_PRODUTO"=> [
                    "required"=> lang("Validation.produto.nome_produto.required"),
                    "regex_match"=> lang("Validation.produto.nome_produto.regex_match"),
                    "max_lenght"=> lang("Validation.produto.nome_produto.max_lenght")],
        
                "MARCA"=> [
                    "required"=> lang("Validation.produto.marca.required"),
                    "regex_match"=> lang("Validation.produto.marca.regex_match"),
                    "max_lenght"=> lang("Validation.produto.marca.max_lenght")],
    
                "QUANTIDADE"=> [
                    "required"=> lang("Validation.produto.quantidade.required"),
                    "integer"=> lang("Validation.produto.quantidade.integer")],
    
                "VALOR"=> [
                    "required"=> lang("Validation.produto.valor.required"),
                    "numeric"=> lang("Validation.produto.valor.numeric")],
    
                "ID_FORNECEDOR"=> [
                    "required"=> lang("Validation.produto.id_fornecedor.required"),
                    "integer"=> lang("Validation.produto.id_fornecedor.integer")]
            ];
        }
    }
?>