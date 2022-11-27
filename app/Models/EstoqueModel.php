<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class EstoqueModel extends Model{
        protected $primaryKey = "ID_ESTOQUE";
        protected $useAutoIncrement = true;
        protected $table = "ESTOQUE";
        protected $allowedFields = ['DATA_ENTRADA', 'QUANTIDADE_ENTRADA', 'ID_PRODUTO'];
        protected $returnType = "object";

        protected $validationRules = [
            "DATA_ENTRADA"=> "required|valid_date[Y-m-d]",
            "QUANTIDADE_ENTRADA"=> "required|integer",
            "ID_PRODUTO"=> "required|integer"            
        ];
    
        protected $validationMessages = [ 
            "DATA_ENTRADA"=> [
                "required"=> "Campo DATA VENDA requerido",
                "valid_date"=> "Campo DATA VENDA aceita somente datas"],
            
    
            "QUANTIDADE_ENTRADA"=> [
                "required"=> "Campo QUANTIDADE ENTRADA requerido",
                "integer"=> "Campo QUANTIDADE ENTRADA aceita somente números inteiros"],
                
            "ID_PRODUTO"=> [
                "required"=> "Campo ID_PRODUTO requerido",
                "integer"=> "Campo ID_PRODUTO aceita somente números inteiros"]
    
        ];
    }
?>