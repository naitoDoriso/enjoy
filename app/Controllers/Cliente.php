<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cliente extends BaseController
{
    public function index()
    {
        $ClienteModel = new \App\Models\ClienteModel();
        $clientes = $ClienteModel->findAll();

        return view('list/lista_clientes' , ['clientes' => $clientes, 'title' => lang("form/form_cliente.title")]);
    }

    public function adicionar(){
        $mensagem = "";

        if(!empty($this->request->getMethod() == 'post')){
            $ClienteModel = new \App\Models\ClienteModel();
            $dadoscliente = [
                'CPF' => $this->request->getPost('CPF'),
                'NOME' => $this->request->getPost('NOME'),
                'ENDERECO' => $this->request->getPost('ENDERECO'),
                'TELEFONE' => $this->request->getPost('TELEFONE')
            ];
            
            if($ClienteModel->save($dadoscliente))
            {
                $mensagem = lang("form/form_cliente.inserted");
            }
            else
            {
                $mensagem = $ClienteModel->errors();
            }
        }
        
        return view('form/form_cliente', ['botao' => lang("form/form_cliente.add"), 'msg' => $mensagem, 'title' => lang("form/form_cliente.titleadd")]);
    }
    
    public function remove($id){
        $ClienteModel = new \App\Models\ClienteModel();
        $ClienteModel -> delete($id);

        return redirect() ->to('/Cliente');
    }

    public function editar($id){
        $mensagem = "";
        $ClienteModel = new \App\Models\ClienteModel();

        if($this->request->getMethod()=='post'){

            $dados = [
                "NOME" => $this->request->getVar('NOME'),
                "CPF" => $this->request->getVar('CPF'),
                "ENDERECO" => $this->request->getVar('ENDERECO'),
                "TELEFONE" => $this->request->getVar('TELEFONE')
            ];

            if($ClienteModel -> update($id, $dados)){
                $mensagem = lang("form/form_cliente.edited");
            }else{
                $mensagem = $ClienteModel->errors();
            }
        }
        
        $cliente = $ClienteModel->find($id);
        
        if ($cliente !== NULL) {
            return view('form/form_cliente', ['botao' => lang("form/form_cliente.edit"), 'msg' => $mensagem, 'cliente' => $cliente, 'title' => lang("form/form_cliente.titleedit")]);
        } else {
            return redirect()->to('/Cliente');
        }
    }
}
