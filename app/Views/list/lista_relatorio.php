<?= $this->extend('modelo'); ?>
<?= $this->section('lista'); ?>
<?php
if ($Tipo == "mes") {
?>
   <table>
      <tr>
         <th>Mês e Ano</th>
         <th>Quantidade Vendida</th>
      </tr>
      <?php
      foreach ($Resultados as $Resultado) {
      ?>
         <tr>
            <td> <?= $Resultado->MES_E_ANO ?> </td>
            <td> <?= $Resultado->QTD ?> </td>
            <td></td>
         </tr>
      <?php
      }
      ?>
   </table>
<?php
   if (!empty($Link) && $Link == 'true') {
      echo "<a href='" . base_url('Venda/relatorio_mes/salvar') . "'>Gerar Relatorio</a>
         <br>
         <a href='" . base_url('/Venda') . "'>Voltar vendas</a>";
   }
}
?>
<?php
if ($Tipo == "produto") {
?>
   <table>
      <tr>
         <th>Produto</th>
         <th>Quantidade Vendida</th>
         <th>Unidades Vendidas</th>
      </tr>
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
   </table>
   <br>
<?php
   if (!empty($Link) && $Link == 'true') {
      echo "<a href='" . base_url('Venda/relatorio_produto/salvar') . "'>Gerar Relatorio</a>
         <br>
         <a href='" . base_url('/Venda') . "'>Voltar vendas</a>";
   }
}
?>
<?php
if ($Tipo == "vendedor") {
?>
   <table>
      <tr>
         <th>Funcionario</th>
         <th>Quantidade Vendida</th>
      </tr>
      <?php
      foreach ($Resultados as $Resultado) {
      ?>
         <tr>
            <td> <?= $Resultado->NOME_VENDEDOR ?> </td>
            <td> <?= $Resultado->QTD ?> </td>
            <td></td>
         </tr>
      <?php
      }
      ?>
   </table>
   <br>
<?php
   if (!empty($Link) && $Link == 'true') {
      echo "<a href='" . base_url('Venda/relatorio_vendedor/salvar') . "'>Gerar Relatorio</a>
         <br>
         <a href='" . base_url('/Venda') . "'>Voltar vendas</a>";
   }
}
?>
<?= $this->endSection(); ?>