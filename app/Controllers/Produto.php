<?php

namespace App\Controllers;

use \App\Controllers\BaseController;

class Produto extends BaseController{
    public function index(){

        $produtoModel = new \App\Models\ProdutoModel();
        $fornecedorModel = new \App\Models\FornecedorModel();

        $vendaModel = new \App\Models\VendaModel();
        $estoqueModel = new \App\Models\EstoqueModel();
        
        $produtos = $produtoModel->findAll();

        return view('list/lista_produtos', ['produtos' => $produtos, 'fornecedor' => $fornecedorModel, 'prodRows'=>count($produtoModel->findAll()), 'vendRows'=>count($vendaModel->findAll()), 'estoRows'=>count($estoqueModel->findAll()), 'title' => lang("form/form_produto.title")]);
    }

    public function adicionar(){
        $mensagem = "";

        $fornecedorModel = new \App\Models\FornecedorModel();

        if (empty($fornecedorModel->findAll())) {
            return redirect()->to('/Produto');
        }

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
                $mensagem = lang("form/form_produto.inserted");
            }else{
                $mensagem = $produtoModel->errors();
            }
        }

        return view('form/form_produto', ['botao' => lang("form/form_cliente.add"), 'msg' => $mensagem, 'fornecedores'=>$fornecedorModel->findAll(), 'title' => lang("form/form_produto.titleadd")]);
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
                $mensagem = lang("form/form_produto.edited");
            }else{
                $mensagem = $produtoModel->errors();
            }
        }
        
        $produto = $produtoModel->find($id);

        if ($produto !== NULL) {
            return view('form/form_produto', ['botao' => lang("form/form_cliente.edit"), 'msg' => $mensagem, 'produto' => $produto ,'fornecedores' => $fornecedorModel->findAll(), 'title' => lang("form/form_produto.titleedit")]);   
        } else {
            return redirect()->to('/Produto');
        }
    }
}