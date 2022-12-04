<?= $this->extend('modelo_relatorio'); ?>
<?= $this->section('lista'); ?>
<?php
if ($Tipo == "mes") {
?>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th><?= lang("list/lista_relatorio.date") ?></th>
				<th><?= lang("list/lista_relatorio.qntvd") ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($Resultados as $Resultado) {
			?>
				<tr>
					<td> <?= $Resultado->MES_E_ANO ?> </td>
					<td> <?= $Resultado->QTD ?> </td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>

<?php
}
if ($Tipo == "produto") {
?>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th><?= lang("list/lista_relatorio.prod") ?></th>
				<th><?= lang("list/lista_relatorio.qntvd") ?></th>
				<th><?= lang("list/lista_relatorio.unvd") ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($Resultados as $Resultado) {
			?>
				<tr>
					<td> <?= $Resultado->NOME_PRODUTO ?> </td>
					<td> <?= $Resultado->QTD ?> </td>
					<td> <?= $Resultado->TOTAL_VENDA ?> </td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	
<?php
}
if ($Tipo == "vendedor") {
?>
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th><?= lang("list/lista_relatorio.func") ?></th>
				<th><?= lang("list/lista_relatorio.qntvd") ?></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($Resultados as $Resultado) {
			?>
				<tr>
					<td> <?= $Resultado->NOME_VENDEDOR ?> </td>
					<td> <?= $Resultado->QTD ?> </td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
<?php } ?>
<?= $this->endSection(); ?>