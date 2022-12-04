<?= $this->extend('modelo'); ?>
<?= $this->section('form'); ?>

<?php
$DATA_VENDA = $QUANTIDADE_VENDA = $ID_PRODUTO = $ID_VENDEDOR = $CPF_CLIENTE = "";

if (!empty($Venda)) {
    $DATA_VENDA = $Venda->DATA_VENDA;
    $QUANTIDADE_VENDA = $Venda->QUANTIDADE_VENDA;
    $ID_PRODUTO = $Venda->ID_PRODUTO;
    $ID_VENDEDOR = $Venda->ID_VENDEDOR;
    $CPF_CLIENTE = $Venda->CPF_CLIENTE;
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

<form method="post">
    <div>
        <h2><?= $title; ?></h2>
        <div class="row-mb-3">
            <label for="DATA_VENDA" class="col-sm-5 col-form-label"><?= lang("form/form_venda.date") ?></label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="DATA_VENDA" id="DATA_VENDA" value="<?= $DATA_VENDA ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="QUANTIDADE" class="col-sm-5 col-form-label"><?= lang("form/form_venda.qnt") ?></label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="QUANTIDADE" id="QUANTIDADE" value="<?= $QUANTIDADE_VENDA ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="ID_PRODUTO" class="col-sm-5 col-form-label"><?= lang("form/form_venda.prod") ?></label>
            <div class="col-sm-10">
                <select name="ID_PRODUTO" id="ID_PRODUTO" value="" class="form-select">
                    <?php
                    if (is_array($produtos)) {
                        foreach ($produtos as $i => $produto) {
                    ?>
                            <option value="<?= $produto->ID_PRODUTO ?>" <?= ($produto->ID_PRODUTO == $ID_PRODUTO) ? "selected='true'" : "" ?>><?= $produto->NOME_PRODUTO ?></option>
                    <?php
                        }
                    } else {
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row-mb-3">
            <label for="ID_VENDEDOR" class="col-sm-5 col-form-label"><?= lang("form/form_venda.vend") ?></label>
            <div class="col-sm-10">
                <select name="ID_VENDEDOR" id="ID_VENDEDOR" value="" class="form-select">
                    <?php
                    if (is_array($vendedores)) {
                        foreach ($vendedores as $vendedor) {
                    ?>
                            <option value="<?= $vendedor->ID_VENDEDOR ?>" <?= ($vendedor->ID_VENDEDOR == $ID_VENDEDOR) ? "selected='true'" : "" ?>><?= $vendedor->NOME_VENDEDOR ?></option>
                    <?php
                        }
                    } else {
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row-mb-3">
            <label for="CPF_CLIENTE" class="col-sm-5 col-form-label"><?= lang("form/form_venda.client") ?></label>
            <div class="col-sm-10">
                <select name="CPF_CLIENTE" id="CPF_CLIENTE" value="" class="form-select">
                    <?php
                    if (is_array($clientes)) {
                        foreach ($clientes as $cliente) {
                    ?>
                            <option value="<?= $cliente->CPF ?>" <?= ($cliente->CPF == $CPF_CLIENTE) ? "selected='true'" : "" ?>><?= $cliente->NOME ?></option>
                    <?php
                        }
                    } else {
                    }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div>
            <input type='submit' value='<?= $botao ?>' class="btn btn-outline-success">
        </div>
        <br>
        <div>
            <input type="reset" value="<?= lang("form/form_cliente.reset") ?>" class="btn btn-outline-success">
            <a href="<?= base_url('Venda/') ?>" tabindex="-1"><button type="button" class="btn btn-outline-success"><?= lang("form/form_cliente.back") ?></button></a>
        </div>
    </div>
</form>
<?= $this->endSection(); ?>