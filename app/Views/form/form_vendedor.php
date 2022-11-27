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
    <label for="NOME_VENDEDOR">Nome Vendedor:</label>
    <input type='text' name='NOME_VENDEDOR' id='NOME_VENDEDOR' value="<?= $NOME_VENDEDOR ?>">
    <br>
    <label for="DATA_NASC">Data de nascimento:</label>
    <input type='date' name='DATA_NASC' id='DATA_NASC' value="<?= $DATA_NASC ?>">
    <br>
    <label for="CPF">CPF:</label>
    <input type='text' name='CPF' id='CPF' value="<?= $CPF ?>">
    <br>
    <label for="EMAIL">EMAIL:</label>
    <input type='text' name='EMAIL' id='EMAIL' value="<?= $EMAIL ?>">
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

<a href="<?= base_url('Vendedor/') ?>">Voltar</a>

<?php
$this->endSection();
?>