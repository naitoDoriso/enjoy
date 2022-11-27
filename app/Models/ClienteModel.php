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
            "CPF"=> "required|regex_match[/^[\d.-]*$/]",
            "NOME"=> "required|regex_match[/^([ \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]|max_length[60]",
            "ENDERECO"=> "alpha_numeric_space|max_length[100]",
            "TELEFONE"=> "regex_match[/^[\(\d\)-]*$/]"
        ];
    
        protected $validationMessages = [ 
            "CPF"=> [
                "required"=> "Campo CPF requerido",
                "regex_match"=> "Campo CPF deve ser no padrão 123.456.789-12"],
    
            "NOME"=> [
                "required"=> "Campo NOME requerido",
                "alpha_space"=> "Campo NOME tem caracteres inválidos"],

            "ENDERECO"=> [
                "alpha_numeric_space"=> "Campo ENDEREÇO tem caracteres inválidos",
                "max_length"=> "Campo ENDEREÇO excedeu o máximo de caracteres"],
    
            "TELEFONE"=> [
                "regex_match"=> "Campo TELEFONE deve ser no padrão (12)12345-6789"]
    
        ];
    }
?>