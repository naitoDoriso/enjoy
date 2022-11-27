<?php

namespace App\Controllers;

use \App\Controllers\BaseController;

class Fornecedor extends BaseController{
    public function index(){
        $fornecedorModel = new \App\Models\FornecedorModel();
        $fornecedores = $fornecedorModel->findAll();

        return view('list/lista_fornecedores', ['fornecedores' => $fornecedores, 'title' => "Controle de Fornecedores"]);
    }

    public function adicionar(){
        $mensagem = "";

        if(!empty($this->request->getMethod()=='post')){
            
            $fornecedorModel = new \App\Models\FornecedorModel();

            $dados = [
                "NOME_FORNECEDOR" => $this->request->getVar('NOME_FORNECEDOR'),
                "CNPJ" => $this->request->getVar('CNPJ'),
                "ENDERECO" => $this->request->getVar('ENDERECO'),
                "CEP" => $this->request->getVar('CEP'),
                "TELEFONE" => $this->request->getVar('TELEFONE')
            ];

            if($fornecedorModel -> save($dados)){
                $mensagem = "Fornecedor inserido com sucesso";
            }else{
                $mensagem = "Erro ao inserir!";
            }
        }

        return view('form/form_fornecedor', ['botao' => "Salvar", 'msg' => $mensagem, 'fornecedor' => "", 'title' => "Adicionar Fornecedor"]);
    }

    public function remove($id){
        $fornecedorModel = new \App\Models\FornecedorModel();
        $fornecedorModel -> delete($id);

        return redirect() ->to('/Fornecedor');
    }

    public function editar($id){
        $mensagem = "";
        $fornecedorModel = new \App\Models\FornecedorModel();

        if($this->request->getMethod()=='post'){

            $dados = [
                "NOME_FORNECEDOR" => $this->request->getVar('NOME_FORNECEDOR'),
                "CNPJ" => $this->request->getVar('CNPJ'),
                "ENDERECO" => $this->request->getVar('ENDERECO'),
                "CEP" => $this->request->getVar('CEP'),
                "TELEFONE" => $this->request->getVar('TELEFONE')
            ];

            // echo preg_match('/^[\D]*$/i', $dados['NOME_FORNECEDOR'])==1 ? "True" : "False";
            // die();

            if($fornecedorModel -> update($id, $dados)){
                $mensagem = "Editado com sucesso";
            }else{
                $mensagem = "Erro! <ul> <li>".implode('<li>', $fornecedorModel->errors())."</ul>";
            }
        }
        
        $fornecedor = $fornecedorModel->find($id);
        
        if ($fornecedor !== NULL) {
            return view('form/form_fornecedor', ['botao' => "Editar", 'msg' => $mensagem, 'fornecedor' => $fornecedor, 'title' => "Editar Fornecedor"]);
        } else {
            return redirect()->to('/Cliente');
        }
    }
}
