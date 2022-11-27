<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Venda extends BaseController{
    
    public function index(){
        $VendaModel = new \App\Models\VendaModel();
        $Vendas = $VendaModel->JoinVenda();

        return view('list/lista_vendas', ['Vendas' => $Vendas, 'title' => "Controle de Vendas"]);
    }

    public function adicionar(){
        $mensagem = "";
        $VendaModel = new \App\Models\VendaModel();
        $clienteModel = new \App\Models\ClienteModel();
        $vendedorModel = new \App\Models\VendedorModel();
        $produtoModel = new \App\Models\ProdutoModel();
        
        if(!empty($this->request->getMethod()=='post')){
            $dadosVenda = [
                'DATA_VENDA' => $this->request->getVar('DATA_VENDA'),
                'QUANTIDADE_VENDA' => $this->request->getVar('QUANTIDADE'),
                'ID_PRODUTO' => $this->request->getVar('ID_PRODUTO'),
                'ID_VENDEDOR' => $this->request->getVar('ID_VENDEDOR'),
                'CPF_CLIENTE' => $this->request->getVar('CPF_CLIENTE')
            ];

            $produto = $produtoModel->find($dadosVenda["ID_PRODUTO"]);

            if($dadosVenda["QUANTIDADE_VENDA"]<=$produto->QUANTIDADE){

            
                if($VendaModel->save($dadosVenda)){
                    $mensagem = "Venda inserida com sucesso!";

                    
                    $produtoModel->where("ID_PRODUTO", $produto->ID_PRODUTO)->update($produto->ID_PRODUTO, ["QUANTIDADE"=>($produto->QUANTIDADE-$dadosVenda["QUANTIDADE_VENDA"])]);

                }
                else {
                    $mensagem = $VendaModel->errors();          
                    
                }
            }else {
                $mensagem = "Quantidade superior ao estoque, não é possível realizar venda!";          
                
            }
        }

        return view('form/form_venda', ['botao' => "Salvar", 'msg' => $mensagem, 'produtos'=>$produtoModel->findAll(), 'vendedores'=>$vendedorModel->findAll(),'clientes'=>$clienteModel->findAll(), 'title' => "Adicionar Venda"]);
    }

    public function remove($id){
        $VendaModel = new \App\Models\VendaModel();
        $produtoModel = new \App\Models\ProdutoModel();

        $venda = $VendaModel->find($id);
        $dadosVenda = [
            'DATA_VENDA' => $venda->DATA_VENDA,
            'QUANTIDADE_VENDA' => $venda->QUANTIDADE_VENDA,
            'ID_PRODUTO' => $venda->ID_PRODUTO,
            'ID_VENDEDOR' => $venda->ID_VENDEDOR,
            'CPF_CLIENTE' =>$venda->CPF_CLIENTE
        ];

        $produto = $produtoModel->find($dadosVenda["ID_PRODUTO"]);
        
        if ($VendaModel -> delete($id)){
            $produtoModel->where("ID_PRODUTO", $produto->ID_PRODUTO)->update($produto->ID_PRODUTO, ["QUANTIDADE"=>($produto->QUANTIDADE+$dadosVenda["QUANTIDADE_VENDA"])]);
            
        }
        

        return redirect() ->to('/Venda');
    }

    public function gerarRelatorio($Tipo){
        if($Tipo == "mes"){
            $vendaModel = new \App\Models\VendaModel();
            return view('list/lista_relatorio', ['Relatorio' => $Tipo, 'Resultados' => $vendaModel->selectData(), 'Link'=>'true', 'Tipo' => 'mes', 'title' => "Relatório de Vendas por Mês"]);
        }else if($Tipo == "produto"){
            $vendaModel = new \App\Models\VendaModel();
            return view('list/lista_relatorio', ['Relatorio' => $Tipo, 'Resultados' => $vendaModel->selectProduto(), 'Link'=>'true', 'Tipo' => 'produto', 'title' => "Relatório de Vendas por Produto"]);
        }else if($Tipo == "vendedor"){
            $vendaModel = new \App\Models\VendaModel();
            return view('list/lista_relatorio', ['Relatorio' => $Tipo, 'Resultados' => $vendaModel->selectVendedor(), 'Link'=>'true', 'Tipo' => 'vendedor', 'title' => "Relatório de Vendas por Vendedor"]);
        }
    }
}   