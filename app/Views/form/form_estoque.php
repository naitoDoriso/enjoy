<?= $this->extend('modelo'); ?>
<?= $this->section('form'); ?>

<?= $msg ?>

<form method="post">
    <label>Data de entrada:</label>
    <input type="date" name="DATA_ENTRADA" id="DATA_ENTRADA" value="<?= $estoque->DATA_ENTRADA ?>"><br />
    <label>Quantidade entrada:</label>
    <input type="int" name="QUANTIDADE_ENTRADA" id="QUANTIDADE_ENTRADA" value="<?= $estoque->QUANTIDADE_ENTRADA ?>"><br />
    <label>Produto:</label>

    <select name="ID_PRODUTO" value="">
        <?php
        if (is_array($produtos)) {
            foreach ($produtos as $i => $produto) {
        ?>
                <option value="<?= $produto->ID_PRODUTO; ?>" <?php if ($select_prod == $produto->ID_PRODUTO) echo 'selected="' . $select_prod . '"' ?>><?= $produto->NOME_PRODUTO ?></option>
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
<a href="<?= base_url('Estoque/') ?>">Voltar</a>
<?php
$this->endSection();
?>