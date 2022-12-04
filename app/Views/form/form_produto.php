<?= $this->extend('modelo'); ?>
<?= $this->section('form'); ?>

<?php
    $NOME_PRODUTO = $MARCA = $QUANTIDADE = $VALOR = $ID_FORNECEDOR = "";
    if (!empty($produto)) {
        $NOME_PRODUTO = $produto->NOME_PRODUTO;
        $MARCA = $produto->MARCA;
        $QUANTIDADE = $produto->QUANTIDADE;
        $VALOR = $produto->VALOR;
        $ID_FORNECEDOR = $produto->ID_FORNECEDOR;
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
            <label for="NOME_PRODUTO" class="col-sm-5 col-form-label"><?= lang("form/form_produto.name") ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="NOME_PRODUTO" id="NOME_PRODUTO" value="<?= $NOME_PRODUTO ?>">
            </div>
            <div class="row-mb-3">
                <label for="MARCA" class="col-sm-5 col-form-label"><?= lang("form/form_produto.marca") ?></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="MARCA" id="MARCA" value="<?= $MARCA ?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label for="QUANTIDADE" class="col-sm-5 col-form-label"><?= lang("form/form_produto.qnt") ?></label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="QUANTIDADE" id="QUANTIDADE" value="<?= $QUANTIDADE ?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label for="VALOR" class="col-sm-5 col-form-label"><?= lang("form/form_produto.valor") ?></label>
                <div class="col-sm-10">
                    <input type="number" step=".01" class="form-control" name="VALOR" id="VALOR" value="<?= $VALOR ?>">
                </div>
            </div>
            <div class="row-mb-3">
                <label for="ID_FORNECEDOR" class="col-sm-5 col-form-label"><?= lang("form/form_produto.fornc") ?></label>
                <div class="col-sm-10">
                    <select name="ID_FORNECEDOR" id="ID_FORNECEDOR" value="" class="form-select">
                        <?php
                        if (is_array($fornecedores)) {
                            foreach ($fornecedores as $i => $fornecedor) {
                        ?>
                                <option value="<?= $fornecedor->ID_FORNECEDOR; ?>" <?php if ($ID_FORNECEDOR == $fornecedor->ID_FORNECEDOR) echo 'selected="true"' ?>><?= $fornecedor->NOME_FORNECEDOR ?></option>
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
                <a href="<?= base_url('Produto/') ?>" tabindex="-1"><button type="button" class="btn btn-outline-success"><?= lang("form/form_cliente.back") ?></button></a>
            </div>
        </div>
</form>
<?php
$this->endSection();
?>