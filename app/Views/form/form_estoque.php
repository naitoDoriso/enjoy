<?= $this->extend('modelo'); ?>
<?= $this->section('form'); ?>

<?php
$DATA_ENTRADA = $QUANTIDADE_ENTRADA = $ID_PRODUTO = "";

if (!empty($estoque)) {
    $DATA_ENTRADA = $estoque->DATA_ENTRADA;
    $QUANTIDADE_ENTRADA = $estoque->QUANTIDADE_ENTRADA;
    $ID_PRODUTO = $estoque->ID_PRODUTO;
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
            <label for="DATA_ENTRADA" class="col-sm-5 col-form-label"><?= lang("form/form_estoque.date") ?></label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="DATA_ENTRADA" id="DATA_ENTRADA" value="<?= $DATA_ENTRADA ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="QUANTIDADE_ENTRADA" class="col-sm-5 col-form-label"><?= lang("form/form_estoque.qnt") ?></label>
            <div class="col-sm-10">
                <input type="int" class="form-control" name="QUANTIDADE_ENTRADA" id="QUANTIDADE_ENTRADA" value="<?= $QUANTIDADE_ENTRADA ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="PRODUTO" class="col-sm-5 col-form-label"><?= lang("form/form_estoque.prod") ?></label>
            <div class="col-sm-10">
                <select name="ID_PRODUTO" id="PRODUTO" value="" class="form-select">
                    <?php
                    if (is_array($produtos)) {
                        foreach ($produtos as $i => $produto) {
                    ?>
                            <option value="<?= $produto->ID_PRODUTO; ?>" <?php if ($ID_PRODUTO == $produto->ID_PRODUTO) echo 'selected="true"' ?>><?= $produto->NOME_PRODUTO ?></option>
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
            <a href="<?= base_url('Estoque/') ?>" tabindex="-1"><button type="button" class="btn btn-outline-success"><?= lang("form/form_cliente.back") ?></button></a>
        </div>
    </div>
</form>
<?php
$this->endSection();
?>
</form>
<br>