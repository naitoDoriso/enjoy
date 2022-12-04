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
            "QUANTIDADE_ENTRADA"=> "required|is_natural_no_zero",
            "ID_PRODUTO"=> "required|integer"            
        ];
    
        protected $validationMessages = [ 
            "DATA_ENTRADA"=> [
                "required"=> "Campo DATA não pode estar vazio",
                "valid_date"=> "Campo DATA aceita somente datas"],
    
            "QUANTIDADE_ENTRADA"=> [
                "required"=> "Campo QUANTIDADE ENTRADA não pode estar vazio",
                "is_natural_no_zero"=> "Campo QUANTIDADE ENTRADA aceita somente números positivos"],
                
            "ID_PRODUTO"=> [
                "required"=> "Campo ID_PRODUTO não pode estar vazio",
                "integer"=> "Campo ID_PRODUTO aceita somente números inteiros"]
        ];

        public function __construct(...$params) {
            parent::__construct(...$params);
            $this->validationMessages = [ 
                "DATA_ENTRADA"=> [
                    "required"=> lang("Validation.estoque.data_entrada.required"),
                    "valid_date"=> lang("Validation.estoque.data_entrada.valid_date")],
        
                "QUANTIDADE_ENTRADA"=> [
                    "required"=> lang("Validation.estoque.quantidade_entrada.required"),
                    "is_natural_no_zero"=> lang("Validation.estoque.quantidade_entrada.is_natural_no_zero")],
                    
                "ID_PRODUTO"=> [
                    "required"=> lang("Validation.estoque.id_produto.required"),
                    "integer"=> lang("Validation.estoque.id_produto.integer")]
            ];
        }

        public function lastUpdate() {
            $db = db_connect();
            $result = $db->query("SELECT UPDATE_TIME
            FROM   information_schema.tables
            WHERE  TABLE_SCHEMA = 'enjoy'
               AND TABLE_NAME = 'ESTOQUE'")->getResult();
            $db->close();
            return $result[0]->UPDATE_TIME;
        }
    }
?>