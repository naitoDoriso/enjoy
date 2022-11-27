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

<form method='post'>
    <label for="NOME_FORNECEDOR">Nome Fornecedor:</label>
    <input type='text' name='NOME_FORNECEDOR' id='NOME_FORNECEDOR' value="<?= $NOME_FORNECEDOR ?>">
    <br>
    <label for="CNPJ">CNPJ:</label>
    <input type='text' name='CNPJ' id='CNPJ' value="<?= $CNPJ ?>">
    <br>
    <label for="ENDERECO">Endereço:</label>
    <input type='text' name='ENDERECO' id='ENDERECO' value="<?= $ENDERECO ?>">
    <br>
    <label for="CEP">CEP:</label>
    <input type='text' name='CEP' id='CEP' value="<?= $CEP ?>">
    <br>
    <label for="TELEFONE">Telefone:</label>
    <input type='tel' name='TELEFONE' id='TELEFONE' value="<?= $TELEFONE ?>">
    <br>
    <input type='submit' value='<?= $botao ?>'>
</form>

<a href="<?= base_url('Fornecedor/') ?>">Voltar</a>

<?php
$this->endSection();
?>