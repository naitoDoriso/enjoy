<?php

$this->extend('modelo');

$this->section('form');

$NOME_FORNECEDOR = $CNPJ = $ENDERECO = $CEP = $TELEFONE = "";

if ($fornecedor != "") {
    $NOME_FORNECEDOR = $fornecedor->NOME_FORNECEDOR;
    $CNPJ = $fornecedor->CNPJ;
    $ENDERECO = $fornecedor->ENDERECO;
    $CEP = $fornecedor->CEP;
    $TELEFONE = $fornecedor->TELEFONE;
}

if ($msg !== "") {
    if (is_array($msg)) {
        echo "<ul class='list-group'>";
        foreach ($msg as $erro) {
            echo "<li class='list-group-item list-group-item-danger'>$erro</li>";
        }
        echo "</ul>";
    } else {
        echo "<p class='alert alert-success'>$msg</p>";
    }
}

?>

<form method='post'>
    <div>
        <h2><?= $title; ?></h2>
        <div class="row-mb-3">
            <label for="NOME_FORNECEDOR" class="col-sm-5 col-form-label"><?= lang("form/form_fornecedor.name") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='NOME_FORNECEDOR' id='NOME_FORNECEDOR' value="<?= $NOME_FORNECEDOR ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="CNPJ" class="col-sm-5 col-form-label"><?= lang("form/form_fornecedor.cnpj") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='CNPJ' id='CNPJ' value="<?= $CNPJ ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="ENDERECO" class="col-sm-5 col-form-label"><?= lang("form/form_fornecedor.end") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='ENDERECO' id='ENDERECO' value="<?= $ENDERECO ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="CEP" class="col-sm-5 col-form-label"><?= lang("form/form_fornecedor.cep") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='CEP' id='CEP' value="<?= $CEP ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="TELEFONE" class="col-sm-5 col-form-label"><?= lang("form/form_fornecedor.tel") ?></label>
            <div class="col-sm-10">
                <input type='tel' class="form-control" name='TELEFONE' id='TELEFONE' value="<?= $TELEFONE ?>">
            </div>
        </div>
        <br>
        <div>
            <input type='submit' value='<?= $botao ?>' class="btn btn-outline-success">
        </div>
        <br>
        <div>
            <input type="reset" value="<?= lang("form/form_cliente.reset") ?>" class="btn btn-outline-success">
            <a href="<?= base_url('Fornecedor/') ?>" tabindex="-1"><button type="button" class="btn btn-outline-success"><?= lang("form/form_cliente.back") ?></button></a>
        </div>
</form>


<?php
$this->endSection();
?>