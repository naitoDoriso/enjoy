<?php

namespace App\Controllers;

use \App\Controllers\BaseController;

class Fornecedor extends BaseController{
    public function index(){
        $fornecedorModel = new \App\Models\FornecedorModel();
        $fornecedores = $fornecedorModel->findAll();

        return view('list/lista_fornecedores', ['fornecedores' => $fornecedores, 'title' => lang("form/form_fornecedor.title")]);
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
                $mensagem = lang("form/form_fornecedor.inserted");
            }else{
                $mensagem = $fornecedorModel->errors();
            }
        }

        return view('form/form_fornecedor', ['botao' => lang("form/form_cliente.add"), 'msg' => $mensagem, 'fornecedor' => "", 'title' => lang("form/form_fornecedor.titleadd")]);
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
                "ENDERECO" => $this->request->getVar('ENDERECO'),
                "CEP" => $this->request->getVar('CEP'),
                "TELEFONE" => $this->request->getVar('TELEFONE')
            ];

            if ($this->request->getVar('CNPJ')!=$fornecedorModel->find($id)->CNPJ) $dados["CNPJ"] = $this->request->getVar('CNPJ');

            if($fornecedorModel -> update($id, $dados)){
                $mensagem = lang("form/form_fornecedor.edited");
            }else{
                $mensagem = $fornecedorModel->errors();
            }
        }
        
        $fornecedor = $fornecedorModel->find($id);
        
        if ($fornecedor !== NULL) {
            return view('form/form_fornecedor', ['botao' => lang("form/form_cliente.edit"), 'msg' => $mensagem, 'fornecedor' => $fornecedor, 'title' => lang("form/form_fornecedor.titleedit")]);
        } else {
            return redirect()->to('/Fornecedor');
        }
    }
}
