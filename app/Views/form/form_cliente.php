<?= $this->extend('modelo'); ?>
<?= $this->section('form'); ?>

<?php
$CPF = $NOME = $ENDERECO = $TELEFONE = "";

if (!empty($cliente)) {
    $CPF = $cliente->CPF;
    $NOME = $cliente->NOME;
    $ENDERECO = $cliente->ENDERECO;
    $TELEFONE = $cliente->TELEFONE;
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
            <label for="CPF" class="col-sm-5 col-form-label"><?= lang("form/form_cliente.id") ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="CPF" id="CPF" value="<?= $CPF ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="NOME" class="col-sm-5 col-form-label"><?= lang("form/form_cliente.name") ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="NOME" id="NOME" value="<?= $NOME ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="ENDERECO" class="col-sm-5 col-form-label"><?= lang("form/form_cliente.end") ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ENDERECO" id="ENDERECO" value="<?= $ENDERECO ?>">
            </div>
        </div>
        <div class="row-mb-3">
            <label for="TELEFONE" class="col-sm-5 col-form-label"><?= lang("form/form_cliente.tel") ?></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="TELEFONE" id="TELEFONE" value="<?= $TELEFONE ?>">
            </div>
        </div>
        <br>
        <div>
            <input type='submit' value='<?= $botao ?>' class="btn btn-outline-success">
        </div>
        <br>
        <div>
            <input type="reset" value="<?= lang("form/form_cliente.reset") ?>" class="btn btn-outline-success">
            <a href="<?= base_url('Cliente/') ?>" tabindex="-1"><button type="button" class="btn btn-outline-success"><?= lang("form/form_cliente.back") ?></button></a>
        </div>
    </div>
</form>

<?php
$this->endSection();
?>