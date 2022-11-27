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
        <label for="CPF"> CPF:</label>
        <input type="text" name="CPF" id="CPF" value="<?= $CPF ?>">
    </p>
    <p>
        <label for="NOME"> Nome:</label>
        <input type="text" name="NOME" id="NOME" value="<?= $NOME ?>">
    </p>
    <p>
        <label for="ENDERECO"> Endereco:</label>
        <input type="text" name="ENDERECO" id="ENDERECO" value="<?= $ENDERECO ?>">
    </p>
    <p>
        <label for="TELEFONE"> Telefone:</label>
        <input type="text" name="TELEFONE" id="TELEFONE" value="<?= $TELEFONE ?>">
    </p>
    <p>
        <input type='submit' value='<?= $botao ?>'>
    </p>
</form>

<a href="<?= base_url('Cliente/'); ?>">Voltar</a>

<?php
$this->endSection();
?>