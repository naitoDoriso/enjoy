<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Venda extends BaseController
{
    public function index()
    {
        $VendaModel = new \App\Models\VendaModel();
        $Vendas = $VendaModel->JoinVenda();
        $clienteModel = new \App\Models\ClienteModel();
        $vendedorModel = new \App\Models\VendedorModel();
        $produtoModel = new \App\Models\ProdutoModel();

        return view('list/lista_vendas', ['Vendas' => $Vendas, 'produtos' => $produtoModel->findAll(), 'vendedores' => $vendedorModel->findAll(), 'clientes' => $clienteModel->findAll(), 'title' => lang("form/form_venda.title")]);
    }

    public function adicionar()
    {
        $mensagem = "";
        $VendaModel = new \App\Models\VendaModel();
        $clienteModel = new \App\Models\ClienteModel();
        $vendedorModel = new \App\Models\VendedorModel();
        $produtoModel = new \App\Models\ProdutoModel();

        if (empty($produtoModel->findAll())||empty($vendedorModel->findAll())||empty($clienteModel->findAll())) {
            return redirect()->to('/Venda');
        }

        if (!empty($this->request->getMethod() == 'post')) {
            $dadosVenda = [
                'DATA_VENDA' => $this->request->getVar('DATA_VENDA'),
                'QUANTIDADE_VENDA' => $this->request->getVar('QUANTIDADE'),
                'ID_PRODUTO' => $this->request->getVar('ID_PRODUTO'),
                'ID_VENDEDOR' => $this->request->getVar('ID_VENDEDOR'),
                'CPF_CLIENTE' => $this->request->getVar('CPF_CLIENTE')
            ];

            $produto = $produtoModel->find($dadosVenda["ID_PRODUTO"]);

            if ($dadosVenda["QUANTIDADE_VENDA"] <= $produto->QUANTIDADE) {
                if ($VendaModel->save($dadosVenda)) {
                    $mensagem = lang("form/form_venda.inserted");
                    $produtoModel->where("ID_PRODUTO", $produto->ID_PRODUTO)->update($produto->ID_PRODUTO, ["QUANTIDADE" => ($produto->QUANTIDADE - $dadosVenda["QUANTIDADE_VENDA"])]);
                } else {
                    $mensagem = $VendaModel->errors();
                }
            } else {
                $mensagem = [lang("form/form_venda.erroqnt")];
            }
        }

        return view('form/form_venda', ['botao' => lang("form/form_cliente.add"), 'msg' => $mensagem, 'produtos' => $produtoModel->findAll(), 'vendedores' => $vendedorModel->findAll(), 'clientes' => $clienteModel->findAll(), 'title' => lang("form/form_venda.titleadd")]);
    }

    public function remove($id)
    {
        $VendaModel = new \App\Models\VendaModel();
        $produtoModel = new \App\Models\ProdutoModel();

        $venda = $VendaModel->find($id);
        $dadosVenda = [
            'DATA_VENDA' => $venda->DATA_VENDA,
            'QUANTIDADE_VENDA' => $venda->QUANTIDADE_VENDA,
            'ID_PRODUTO' => $venda->ID_PRODUTO,
            'ID_VENDEDOR' => $venda->ID_VENDEDOR,
            'CPF_CLIENTE' => $venda->CPF_CLIENTE
        ];

        $produto = $produtoModel->find($dadosVenda["ID_PRODUTO"]);

        if ($VendaModel->delete($id)) {
            $produtoModel->where("ID_PRODUTO", $produto->ID_PRODUTO)->update($produto->ID_PRODUTO, ["QUANTIDADE" => ($produto->QUANTIDADE + $dadosVenda["QUANTIDADE_VENDA"])]);
        }

        return redirect()->to('/Venda');
    }

    public function gerarRelatorio($Tipo)
    {
        if ($Tipo == "mes") {
            $vendaModel = new \App\Models\VendaModel();
            return view('list/lista_relatorio', ['Relatorio' => $Tipo, 'Resultados' => $vendaModel->selectData(), 'Tipo' => 'mes', 'title' => lang("list/lista_relatorio.titlemes")]);
        } else if ($Tipo == "produto") {
            $vendaModel = new \App\Models\VendaModel();
            return view('list/lista_relatorio', ['Relatorio' => $Tipo, 'Resultados' => $vendaModel->selectProduto(), 'Tipo' => 'produto', 'title' => lang("list/lista_relatorio.titleprod")]);
        } else if ($Tipo == "vendedor") {
            $vendaModel = new \App\Models\VendaModel();
            return view('list/lista_relatorio', ['Relatorio' => $Tipo, 'Resultados' => $vendaModel->selectVendedor(), 'Tipo' => 'vendedor', 'title' => lang("list/lista_relatorio.titlevend")]);
        }
    }
}
