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
                "required"=> "Campo NOME PRODUTO requerido",
                "regex_match"=> "Campo NOME tem caracteres inválidos",
                "max_lenght"=> "Campo NOME PRODUTO excedeu caracteres(50)"],
    
            "MARCA"=> [
                "required"=> "Campo MARCA requerido",
                "regex_match"=> "Campo MARCA tem caracteres inválidos",
                "max_lenght"=> "Campo NOME PRODUTO excedeu caracteres(50)"],
            "QUANTIDADE"=> [
                "required"=> "Campo QUANTIDADE requerido",
                "integer"=> "Campo QUANTIDADE aceita somente números inteiros"],
            "VALOR"=> [
                "required"=> "Campo VALOR requerido",
                "numeric"=> "Campo VALOR aceita somente números"],
            "ID_FORNECEDOR"=> [
                "required"=> "Campo ID_FORNECEDOR requerido",
                "integer"=> "Campo ID_FORNECEDOR aceita somente números"]
    
        ];
    }
?>