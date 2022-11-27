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
    <p>
        <label>Data da venda:</label>
        <input type="date" name="DATA_VENDA" id="DATA_VENDA" value="<?= $DATA_VENDA ?>"><br />
    </p>
    <p>
        <label>quantidade:</label>
        <input type="number" name="QUANTIDADE" id="QUANTIDADE" value="<?= $QUANTIDADE_VENDA ?>"><br />
    </p>
    <p>
        <label>produto:</label>
        <select name="ID_PRODUTO" value="">
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
    </p>
    <p>
        <label>vendedor:</label>
        <select name="ID_VENDEDOR" value="">
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
    </p>
    <p>
        <label>Cliente:</label>
        <select name="CPF_CLIENTE" value="">
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
    </p>
    <p>
        <input type='submit' value='<?= $botao ?>'>
    </p>
    <p>
</form>
<a href="<?= Base_url('Venda/'); ?>">Voltar</a>

<?= $this->endSection(); ?>