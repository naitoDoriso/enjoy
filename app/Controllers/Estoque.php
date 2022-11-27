<?php

namespace App\Controllers;

use \App\Controllers\BaseController;

class Estoque extends BaseController{
    public function index(){

        $estoqueModel = new \App\Models\EstoqueModel();
        $produtoModel = new \App\Models\ProdutoModel();
        
        $estoques = $estoqueModel->paginate(15, "Estoque");
        $pager = $estoqueModel->pager->links("Estoque");   

        return view('list/lista_estoques', ['estoques' => $estoques, "produto"=>$produtoModel, 'links' => $pager]);
    }

    public function adicionar(){
        $mensagem = "";

        $produtoModel = new \App\Models\ProdutoModel();

        if(!empty($this->request->getMethod()=='post')){
            
            $estoqueModel = new \App\Models\EstoqueModel();

            $dados = [
                "DATA_ENTRADA" => $this->request->getVar('DATA_ENTRADA'),
                "QUANTIDADE_ENTRADA" => $this->request->getVar('QUANTIDADE_ENTRADA'),
                "ID_PRODUTO" => $this->request->getVar('ID_PRODUTO')
            ];

            if($estoqueModel -> save($dados)){
                $mensagem = "Entrada realizada com sucesso";
                $produto = $produtoModel->find($dados["ID_PRODUTO"]);
                $produtoModel->where("ID_PRODUTO", $produto->ID_PRODUTO)->update($produto->ID_PRODUTO, ["QUANTIDADE"=>($produto->QUANTIDADE+$dados["QUANTIDADE_ENTRADA"])]);
            }else{
                $mensagem = "Erro ao inserir!";
            }
        }

        return view('form/form_estoque', ['botao' => "Salvar", 'msg' => $mensagem, 'estoque' => (object)["DATA_ENTRADA"=>"", "QUANTIDADE_ENTRADA"=>"","ID_PRODUTO"=>""], 'produtos'=>$produtoModel->findAll(), 'select_prod' => '']);
    }

    public function remove($id){
        $estoqueModel = new \App\Models\EstoqueModel();
        $produtoModel = new \App\Models\ProdutoModel();

        $estoque = $estoqueModel->find($id);
        $dados = [
            "DATA_ENTRADA" => $estoque->DATA_ENTRADA,
            "QUANTIDADE_ENTRADA" => $estoque->QUANTIDADE_ENTRADA,
            "ID_PRODUTO" => $estoque->ID_PRODUTO
        ];

        $produto = $produtoModel->find($dados["ID_PRODUTO"]);
        
        if ($estoqueModel -> delete($id)){
            $produtoModel->where("ID_PRODUTO", $produto->ID_PRODUTO)->update($produto->ID_PRODUTO, ["QUANTIDADE"=>($produto->QUANTIDADE-$dados["QUANTIDADE_ENTRADA"])]);
            
        }
        return redirect() ->to('/Estoque');
    }

    public function editar($id){
        $mensagem = "";
        $estoqueModel = new \App\Models\EstoqueModel();
        $produtoModel = new \App\Models\ProdutoModel();

        if($this->request->getMethod()=='post'){

            $dados = [
                "DATA_ENTRADA" => $this->request->getVar('DATA_ENTRADA'),
                "QUANTIDADE_ENTRADA" => $this->request->getVar('QUANTIDADE_ENTRADA'),
                "ID_PRODUTO" => $this->request->getVar('ID_PRODUTO')
            ];

            $qtd = $estoqueModel->find($id)->QUANTIDADE_ENTRADA;

            if($estoqueModel -> update($id, $dados)){
                $mensagem = "Estoque alterado com sucesso";
                $produto = $produtoModel->find($dados["ID_PRODUTO"]);
                $produtoModel->where("ID_PRODUTO", $produto->ID_PRODUTO)->update($produto->ID_PRODUTO, ["QUANTIDADE"=>($produto->QUANTIDADE-$qtd+$dados["QUANTIDADE_ENTRADA"])]);
            }else{
                $mensagem = "Erro";
            }
        }
        
        $estoque = $estoqueModel->find($id);

        return view('form/form_estoque', ['botao' => "Editar", 'msg' => $mensagem, 'estoque' => $estoque ,'produtos' => $produtoModel->findAll(), 'select_prod' => $estoqueModel -> find($id) -> ID_PRODUTO]);
    }
}