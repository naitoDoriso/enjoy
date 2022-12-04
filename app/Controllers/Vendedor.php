<?php

namespace App\Controllers;

use \App\Controllers\BaseController;

class Vendedor extends BaseController{
    public function index(){

        $vendedorModel = new \App\Models\VendedorModel();
        $vendedores = $vendedorModel->findAll();

        return view('list/lista_vendedores', ['vendedores' => $vendedores, 'title' => lang("form/form_vendedor.title")]);
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

            if ($dados["DATA_NASC"]<(date('Y')-130).'-01-01' || $dados["DATA_NASC"]>(date('Y')-16).date('-m-d') || $dados["DATA_NASC"]=='0000-00-00') {
                $mensagem = [lang("form/form_vendedor.errodate")];
            } else {
                if($vendedorModel -> save($dados)){
                    $mensagem = lang("form/form_vendedor.inserted");
                }else{
                    $mensagem = $vendedorModel->errors();
                }
            }
        }

        return view('form/form_vendedor', ['botao' => lang("form/form_cliente.add"), 'msg' => $mensagem, 'vendedor' => "", 'title' => lang("form/form_vendedor.titleadd")]);
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
                "EMAIL" => $this->request->getVar('EMAIL'),
                "ENDERECO" => $this->request->getVar('ENDERECO'),
                "CEP" => $this->request->getVar('CEP'),
                "TELEFONE" => $this->request->getVar('TELEFONE')
            ];

            if ($this->request->getVar('CPF')!=$vendedorModel->find($id)->CPF) $dados["CPF"] = $this->request->getVar('CPF');

            if ($dados["DATA_NASC"]<(date('Y')-130).'-01-01' || $dados["DATA_NASC"]>(date('Y')-16).date('-m-d') || $dados["DATA_NASC"]=='0000-00-00') {
                $mensagem = [lang("form/form_vendedor.errodate")];
            } else {
                if($vendedorModel -> update($id, $dados)){
                    $mensagem = lang("form/form_vendedor.edited");
                }else{
                    $mensagem = $vendedorModel->errors();
                }
            }
        }
        
        $vendedor = $vendedorModel->find($id);

        if ($vendedor !== NULL) {
            return view('form/form_vendedor', ['botao' => lang("form/form_cliente.edit"), 'msg' => $mensagem, 'vendedor' => $vendedor, 'title' => lang("form/form_vendedor.titleedit")]);   
        } else {
            return redirect()->to('/Vendedor');
        }
    }
}