<?php

namespace APP\Models;

use CodeIgniter\Model;

class VendedorModel extends Model{
    protected $table = 'VENDEDOR';
    protected $primaryKey = 'ID_VENDEDOR';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['NOME_VENDEDOR', 'DATA_NASC', 'CPF', 'EMAIL', 'ENDERECO', 'CEP', 'TELEFONE'];
    protected $returnType = 'object';

    protected $validationRules = [
        "NOME_VENDEDOR"=> "required|regex_match[/^([ \u{61}-\u{7A}\u{E0}-\u{F6}\u{F9}-\u{FC}\u{169}\u{27}\u{2D}])*$/ui]",
        "DATA_NASC"=> "required|valid_date",
        "CPF"=> "required|regex_match[/^[\d.-]*$/]",
        "EMAIL"=> "required|valid_email",
        "ENDERECO"=> "required|alpha_numeric_space|max_length[50]",
        "CEP"=> "required|regex_match[/^[\d-]*$/]",
        "TELEFONE"=> "required|regex_match[/^[\(\d\)-]*$/]"
    ];

    protected $validationMenssages = [
        "NOME_VENDEDOR"=> [
            "required"=> "Campo NOME requerido",
            "regex_match"=> "Campo NOME tem caracteres inválidos"],

        "DATA_NASC"=> [
            "required"=> "Campo DATA_NASC requerido",
            "valid_date"=> "Campo DATA_NASC aceita somente datas válidas"],

        "CPF"=> [
            "required"=> "Campo CPF requerido",
            "regex_match"=> "Campo CPF deve ser no padrão 123.456.789-12"],

        "EMAIL"=> [
            "required"=> "Campo EMAIL requerido",
            "integer"=> "Campo EMAIL aceita somente emails válidos"],

        "ENDERECO"=> [
            "required"=> "Campo ENDEREÇO requerido",
            "alpha_numeric_space"=> "Campo ENDEREÇO tem caracteres inválidos"],

        "CEP"=> [
            "required"=> "Campo CEP requerido",
            "regex_match"=> "Campo CEP deve ser no padrão 12345-678"],

        "TELEFONE"=> [
            "required"=> "Campo TELEFONE requerido",
            "regex_match"=> "Campo TELEFONE deve ser no padrão (12)12345-6789"]

    ];

}