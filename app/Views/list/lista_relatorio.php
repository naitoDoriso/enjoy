<?= $this->extend('modelo_relatorio'); ?>
<?= $this->section('lista'); ?>
<?php
if ($Tipo == "mes") {
?>
   <table class="table table-hover table-bordered">
      <thead>
         <tr>
            <th>Mês e Ano</th>
            <th>Quantidade Vendida</th>
         </tr>
      </thead>
      <tbody>
         <?php
         foreach ($Resultados as $Resultado) {
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
   if (!empty($Link) && $Link == 'true') {
      echo "<a tabindex='1' href='" . base_url('/Venda') . "'>Voltar vendas</a>";
   }
}
?>
<?php
if ($Tipo == "produto") {
?>
   <table class="table table-hover table-bordered">
      <thead>
         <tr>
            <th>Produto</th>
            <th>Quantidade Vendida</th>
            <th>Unidades Vendidas</th>
         </tr>
      </thead>
      <tbody>
         <?php
         foreach ($Resultados as $Resultado) {
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
   <br>
<?php
   if (!empty($Link) && $Link == 'true') {
      echo "<a tabindex='1' href='" . base_url('/Venda') . "'>Voltar vendas</a>";
   }
}
?>
<?php
if ($Tipo == "vendedor") {
?>
   <table class="table table-hover table-bordered">
      <thead>
         <tr>
            <th>Funcionario</th>
            <th>Quantidade Vendida</th>
         </tr>
      </thead>
      <tbody>
         <?php
         foreach ($Resultados as $Resultado) {
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
   <br>
<?php
   if (!empty($Link) && $Link == 'true') {
      echo "<a tabindex='1' href='" . base_url('/Venda') . "'>Voltar vendas</a>";
   }
}
?>
<?= $this->endSection(); ?>