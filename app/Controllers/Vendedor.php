<?php

namespace App\Controllers;

use \App\Controllers\BaseController;

class Vendedor extends BaseController{
    public function index(){

        $vendedorModel = new \App\Models\VendedorModel();
        $vendedores = $vendedorModel->findAll();

        return view('list/lista_vendedores', ['vendedores' => $vendedores, 'title' => "Controle de Vendedores"]);
    }

    public function adicionar(){
        $mensagem = "";

        if($this->request->getMethod()=='post'){

            $vendedorModel = new \App\Models\VendedorModel();

            $dados = [
                "NOME_VENDEDOR" => $this->request->getVar('NOME_VENDEDOR'),
                "DATA_NASC" => $this->request->getVar('DATA_NASC'),
                "CPF" => $this->request->getVar('CPF'),
                "EMAIL" => $this->request->getVar('EMAIL'),
                "ENDERECO" => $this->request->getVar('ENDERECO'),
                "CEP" => $this->request->getVar('CEP'),
                "TELEFONE" => $this->request->getVar('TELEFONE')
            ];

            if($vendedorModel -> save($dados)){
                $mensagem = "Vendedor inserido com sucesso";
            }else{
                $mensagem = "Erro ao inserir";
            }
        }

        return view('form/form_vendedor', ['botao' => "Salvar", 'msg' => $mensagem, 'vendedor' => "", 'title' => "Adicionar Vendedor"]);
    }

    public function remove($id){
        $vendedorModel = new \App\Models\VendedorModel();
        $vendedorModel -> delete($id);

        return redirect() ->to('/Vendedor');
    }

    public function editar($id){
        $mensagem = "";
        $vendedorModel = new \App\Models\VendedorModel();

        if($this->request->getMethod()=='post'){

            $dados = [
                "NOME_VENDEDOR" => $this->request->getVar('NOME_VENDEDOR'),
                "DATA_NASC" => $this->request->getVar('DATA_NASC'),
                "CPF" => $this->request->getVar('CPF'),
                "EMAIL" => $this->request->getVar('EMAIL'),
                "ENDERECO" => $this->request->getVar('ENDERECO'),
                "CEP" => $this->request->getVar('CEP'),
                "TELEFONE" => $this->request->getVar('TELEFONE')
            ];

            if($vendedorModel -> update($id, $dados)){
                $mensagem = "Editado com sucesso";
            }else{
                $mensagem = "Erro";
            }
        }
        
        $vendedor = $vendedorModel->find($id);

        return view('form/form_vendedor', ['botao' => "Editar", 'msg' => $mensagem, 'vendedor' => $vendedor, 'title' => "Editar Vendedor"]);
    }
}