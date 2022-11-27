<?= $this->extend('modelo'); ?>
<?= $this->section('form'); ?>

<?php
$NOME_PRODUTO = $MARCA = $QUANTIDADE = $VALOR = "";

if (!empty($produto)) {
    $NOME_PRODUTO = $produto->NOME_PRODUTO;
    $MARCA = $produto->MARCA;
    $QUANTIDADE = $produto->QUANTIDADE;
    $VALOR = $produto->VALOR;
}

if (is_array($msg)) {
    echo "<ul>";
    foreach ($msg as $erro) {
        echo "<li>$erro</li>";
    }
    echo "</ul>";
} else {
    echo $msg;
}
?>

<form method="post">
    <label>Nome do produto:</label>
    <input type="text" name="NOME_PRODUTO" id="NOME_PRODUTO" value="<?= $produto->NOME_PRODUTO ?>"><br />
    <label>Marca:</label>
    <input type="text" name="MARCA" id="MARCA" value="<?= $produto->MARCA ?>"><br />
    <label>Quantidade:</label>
    <input type="number" name="QUANTIDADE" id="QUANTIDADE" value="<?= $produto->QUANTIDADE ?>"><br />
    <label>Valor:</label>
    <input type="number" name="VALOR" id="VALOR" value="<?= $produto->VALOR ?>"><br />
    <label>Fornecedor:</label>

    <select name="ID_FORNECEDOR" value="">
        <?php
        if (is_array($fornecedores)) {
            foreach ($fornecedores as $i => $fornecedor) {
        ?>
                <option value="<?= $fornecedor->ID_FORNECEDOR; ?>" <?php if ($select_forn == $fornecedor->ID_FORNECEDOR) echo 'selected="' . $select_forn . '"' ?>><?= $fornecedor->NOME_FORNECEDOR ?></option>
        <?php
            }
        } else {
        }
        ?>
    </select>
    <br>
    <input type='submit' value='<?= $botao ?>'>
</form>
<br>
<a href="<?= base_url('Produto/') ?>">Voltar</a>
<?php
$this->endSection();
?>