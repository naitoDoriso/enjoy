<?php

$this->extend('modelo');

$this->section('form');

$NOME_VENDEDOR = $DATA_NASC = $CPF = $EMAIL = $ENDERECO = $CEP = $TELEFONE = "";

if ($vendedor != "") {
    $NOME_VENDEDOR = $vendedor->NOME_VENDEDOR;
    $DATA_NASC = $vendedor->DATA_NASC;
    $CPF = $vendedor->CPF;
    $EMAIL = $vendedor->EMAIL;
    $ENDERECO = $vendedor->ENDERECO;
    $CEP = $vendedor->CEP;
    $TELEFONE = $vendedor->TELEFONE;
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
            <label for="NOME_VENDEDOR" class="col-sm-5 col-form-label"><?= lang("form/form_vendedor.name") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='NOME_VENDEDOR' id='NOME_VENDEDOR' value="<?= $NOME_VENDEDOR ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="DATA_NASC" class="col-sm-5 col-form-label"><?= lang("form/form_vendedor.date") ?></label>
            <div class="col-sm-10">
                <input type='date' class="form-control" name='DATA_NASC' id='DATA_NASC' value="<?= $DATA_NASC ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="CPF" class="col-sm-5 col-form-label"><?= lang("form/form_vendedor.cpf") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='CPF' id='CPF' value="<?= $CPF ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="EMAIL" class="col-sm-5 col-form-label"><?= lang("form/form_vendedor.email") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='EMAIL' id='EMAIL' value="<?= $EMAIL ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="TELEFONE" class="col-sm-5 col-form-label"><?= lang("form/form_vendedor.tel") ?></label>
            <div class="col-sm-10">
                <input type='tel' class="form-control" name='TELEFONE' id='TELEFONE' value="<?= $TELEFONE ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="ENDERECO" class="col-sm-5 col-form-label"><?= lang("form/form_vendedor.end") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='ENDERECO' id='ENDERECO' value="<?= $ENDERECO ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="CEP" class="col-sm-5 col-form-label"><?= lang("form/form_vendedor.cep") ?></label>
            <div class="col-sm-10">
                <input type='text' class="form-control" name='CEP' id='CEP' value="<?= $CEP ?>">
            </div>
        </div>
        <br>
        <div>
            <input type='submit' value='<?= $botao ?>' class="btn btn-outline-success">
        </div>
        <br>
        <div>
            <input type="reset" value="<?= lang("form/form_cliente.reset") ?>" class="btn btn-outline-success">
            <a href="<?= base_url('Vendedor/') ?>" tabindex="-1"><button type="button" class="btn btn-outline-success"><?= lang("form/form_cliente.back") ?></button></a>
        </div>
    </div>

</form>

<?php
$this->endSection();
?>