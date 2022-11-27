<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Cliente extends BaseController
{
    public function index()
    {
        $ClienteModel = new \App\Models\ClienteModel();
        $clientes = $ClienteModel->paginate(15, "Cliente");
        $pager = $ClienteModel->pager->links("Cliente");   

        return view('list/lista_clientes' , ['clientes' => $clientes, 'links' => $pager]);
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
                $mensagem = "cliente inserido com sucesso!";
            }
            else
            {
                $mensagem = $ClienteModel->errors();
            }
        }
        
        return view('form/form_cliente', ['botao' => "Salvar" , 'msg' => $mensagem]);
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
                $mensagem = "Editado com sucesso";
            }else{
                $mensagem = "Erro ".implode('; ', $ClienteModel->errors());
            }
        }
        
        $cliente = $ClienteModel->find($id);
        
        if ($cliente !== NULL) {
            return view('form/form_cliente', ['botao' => "Editar", 'msg' => $mensagem, 'cliente' => $cliente]);
        } else {
            return redirect()->to('/Cliente');
        }
    }
}
