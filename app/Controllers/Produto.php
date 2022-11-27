<?php

namespace App\Controllers;

use \App\Controllers\BaseController;

class Produto extends BaseController{
    public function index(){

        $produtoModel = new \App\Models\ProdutoModel();
        $fornecedorModel = new \App\Models\FornecedorModel();
        
        $produtos = $produtoModel->findAll();

        return view('list/lista_produtos', ['produtos' => $produtos, "fornecedor"=>$fornecedorModel, 'title' => "Controle de Produtos"]);
    }

    public function adicionar(){
        $mensagem = "";

        $fornecedorModel = new \App\Models\FornecedorModel();

        if(!empty($this->request->getMethod()=='post')){
            
            $produtoModel = new \App\Models\ProdutoModel();

            

            $dados = [
                "NOME_PRODUTO" => $this->request->getVar('NOME_PRODUTO'),
                "MARCA" => $this->request->getVar('MARCA'),
                "QUANTIDADE" => $this->request->getVar('QUANTIDADE'),
                "VALOR" => $this->request->getVar('VALOR'),
                "ID_FORNECEDOR" => $this->request->getVar('ID_FORNECEDOR')
            ];

            if($produtoModel -> save($dados)){
                $mensagem = "Produto inserido com sucesso";
            }else{
                $mensagem = "Erro ao inserir!";
                //$mensagem = "Erro ao inserir";
            }
        }

        return view('form/form_produto', ['botao' => "Salvar", 'msg' => $mensagem, 'produto' => (object)["NOME_PRODUTO"=>"", "MARCA"=>"","QUANTIDADE"=>"","VALOR"=>"","ID_FORNECEDOR"=>""], 'fornecedores'=>$fornecedorModel->findAll(), 'select_forn' => '', 'title' => "Adicionar Produto"]);
    }

    public function remove($id){
        $produtoModel = new \App\Models\ProdutoModel();
        $produtoModel -> delete($id);

        return redirect() ->to('/Produto');
    }

    public function editar($id){
        $mensagem = "";
        $produtoModel = new \App\Models\ProdutoModel();
        $fornecedorModel = new \App\Models\FornecedorModel();

        if($this->request->getMethod()=='post'){

            $dados = [
                "NOME_PRODUTO" => $this->request->getVar('NOME_PRODUTO'),
                "MARCA" => $this->request->getVar('MARCA'),
                "QUANTIDADE" => $this->request->getVar('QUANTIDADE'),
                "VALOR" => $this->request->getVar('VALOR'),
                "ID_FORNECEDOR" => $this->request->getVar('ID_FORNECEDOR')
            ];

            if($produtoModel -> update($id, $dados)){
                $mensagem = "Produto editado com sucesso";
            }else{
                $mensagem = "Erro";
            }
        }
        
        $produto = $produtoModel->find($id);

        return view('form/form_produto', ['botao' => "Editar", 'msg' => $mensagem, 'produto' => $produto ,'fornecedores' => $fornecedorModel->findAll(), 'select_forn' => $produtoModel -> find($id) -> ID_FORNECEDOR, 'title' => "Editar Produto"]);
    }
}