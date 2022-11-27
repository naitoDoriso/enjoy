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
                "required"=> "Campo DATA VENDA requerido",
                "valid_date"=> "Campo DATA VENDA aceita somente datas"],
            "QUANTIDADE VENDA"=> [
                "required"=> "Campo QUANTIDADE VENDA requerido",
                "integer"=> "Campo QUANTIDADE VENDA aceita somente números inteiros"]
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

        public function JoinVendaPager() {
            $this->select("*")
                 ->join('PRODUTO', 'PRODUTO.ID_PRODUTO = VENDA.ID_PRODUTO', 'left')
                 ->join('VENDEDOR', 'VENDEDOR.ID_VENDEDOR = VENDA.ID_VENDEDOR', 'left')
                 ->join('CLIENTE', 'CLIENTE.CPF = VENDA.CPF_CLIENTE', 'left');
            return [
                "paginate" => $this->paginate(15),
                "pager"    => $this->pager
            ];
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
            /*
            padrão de inner join:
            SELECT TOMATE.ID_TOMATE, CLEITON.NOMES FROM TOMATE INNER JOIN CLEITON ON TOMATE.ID_CLEITON=CLEITON.ID_CLEITON GROUP BY CLEITON.NOMES;
            */
        }

        public function selectVendedor(){
            $db = db_connect();
            $result = $db->query('SELECT VENDEDOR.NOME_VENDEDOR, COUNT(*) AS QTD FROM VENDA INNER JOIN VENDEDOR ON VENDA.ID_VENDEDOR = VENDEDOR.ID_VENDEDOR GROUP BY VENDA.ID_VENDEDOR')
                ->getResult();
            $db->close();
            return $result;
        }
    }
?>