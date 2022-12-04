<?php
    namespace App\Models;
    use CodeIgniter\Model;
    class VendaModel extends Model{
        protected $primaryKey = "ID_VENDA";
        protected $useAutoIncrement = true;
        protected $table = "VENDA";
        protected $allowedFields = ['DATA_VENDA', 'QUANTIDADE_VENDA', 'ID_PRODUTO', 'ID_VENDEDOR','CPF_CLIENTE'];
        protected $returnType = "object";

        protected $validationRules = [
            "DATA_VENDA"=> "required|valid_date[Y-m-d]",
            "QUANTIDADE_VENDA"=> "required|integer"
        ];
    
        protected $validationMessages = [ 
            "DATA_VENDA"=> [
                "required"=> "Campo DATA não pode estar vazio",
                "valid_date"=> "Campo DATA aceita somente datas"],
                
            "QUANTIDADE_VENDA"=> [
                "required"=> "Campo QUANTIDADE não pode estar vazio",
                "integer"=> "Campo QUANTIDADE aceita somente números inteiros"]
        ];

        public function JoinVenda() {
            $db = db_connect();
            $resultado_com_join = $db->table('VENDA')
                                     ->join('PRODUTO', 'PRODUTO.ID_PRODUTO = VENDA.ID_PRODUTO', 'left')
                                     ->join('VENDEDOR', 'VENDEDOR.ID_VENDEDOR = VENDA.ID_VENDEDOR', 'left')
                                     ->join('CLIENTE', 'CLIENTE.CPF = VENDA.CPF_CLIENTE', 'left')
                                     ->get()
                                     ->getResult();
            $db->close();
            return $resultado_com_join;
        }
        public function selectData(){
            $db = db_connect();
            $result = $db->query('SELECT DATE_FORMAT(DATA_VENDA, "%m/%Y") AS MES_E_ANO, COUNT(*) AS QTD FROM VENDA GROUP BY MONTH(DATA_VENDA)')
                         ->getResult();
            $db->close();
            return $result;
        }

        public function selectProduto(){
            $db = db_connect();
            $result = $db->query('SELECT PRODUTO.NOME_PRODUTO, COUNT(*) AS QTD,SUM(VENDA.QUANTIDADE_VENDA) AS TOTAL_VENDA FROM VENDA INNER JOIN PRODUTO ON VENDA.ID_PRODUTO = PRODUTO.ID_PRODUTO GROUP BY VENDA.ID_PRODUTO')
                ->getResult();
            $db->close();
            return $result;
        }

        public function selectVendedor(){
            $db = db_connect();
            $result = $db->query('SELECT VENDEDOR.NOME_VENDEDOR, COUNT(*) AS QTD FROM VENDA INNER JOIN VENDEDOR ON VENDA.ID_VENDEDOR = VENDEDOR.ID_VENDEDOR GROUP BY VENDA.ID_VENDEDOR')
                ->getResult();
            $db->close();
            return $result;
        }

        public function __construct(...$params) {
            parent::__construct(...$params);
            $this->validationMessages = [
                "DATA_VENDA"=> [
                    "required"=> lang("Validation.venda.data_venda.required"),
                    "valid_date"=> lang("Validation.venda.data_venda.valid_date")],
                    
                "QUANTIDADE_VENDA"=> [
                    "required"=> lang("Validation.venda.quantidade_venda.required"),
                    "integer"=> lang("Validation.venda.quantidade_venda.integer")]
            ];
        }

        public function lastUpdate() {
            $db = db_connect();
            $result = $db->query("SELECT UPDATE_TIME
            FROM   information_schema.tables
            WHERE  TABLE_SCHEMA = 'enjoy'
               AND TABLE_NAME = 'VENDA'")->getResult();
            $db->close();
            return $result[0]->UPDATE_TIME;
        }
    }
?>