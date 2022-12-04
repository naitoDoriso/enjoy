<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Refresh extends BaseController
{
    public function produto()
    {
        $produtoModel = new \App\Models\ProdutoModel();
        $vendaModel = new \App\Models\VendaModel();
        $estoqueModel = new \App\Models\EstoqueModel();

        $produtosRows = $this->request->getVar('produtos') == "" ? 0 : $this->request->getVar('produtos');
        $vendaRows = $this->request->getVar('venda') == "" ? 0 : $this->request->getVar('venda');
        $estoqueRows = $this->request->getVar('estoque') == "" ? 0 : $this->request->getVar('estoque');
        $time = $this->request->getVar('time') == "" ? 0 : $this->request->getVar('time');
        $lastUpdateVenda = $vendaModel->lastUpdate();
        $lastUpdateEstoque = $estoqueModel->lastUpdate();

        if (count($produtoModel->findAll())!=$produtosRows || count($vendaModel->findAll())!=$vendaRows || count($estoqueModel->findAll())!=$estoqueRows || $time<$lastUpdateVenda || $time<$lastUpdateEstoque) {
            echo "true";
        } else {
            echo "false";
        }
        return;
    }
}