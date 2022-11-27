<?= $this->extend('modelo'); ?>

<?= $this->section('lista'); ?>
<div class="botao">
  <a href="<?= base_url('Venda/add') ?>">
    <button type="button" class="btn btn-outline-success">
      <svg class="adicionar" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
      </svg> Adicionar
    </button>
  </a>

  <div class="relatorios">
    <a href="<?= base_url('Venda/relatorio_mes') ?>">vendas por mes</a>
    <a href="<?= base_url('Venda/relatorio_produto') ?>">vendas por produto</a>
    <a href="<?= base_url('Venda/relatorio_vendedor') ?>">vendas por vendedor</a>
  </div>

  <a href=" <?= base_url(); ?> ">
    <button type="button" class="btn btn-outline-success">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
      </svg>
      <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
      </svg> Voltar ao menu
    </button>
  </a>
</div>
<div>
  <table class="table table-hover table-bordered">
    <tr>
      <th>#</th>
      <th>Data da Venda</th>
      <th>Quantidade Vendida</th>
      <th>Produto Vendido</th>
      <th>Vendedor</th>
      <th>Cliente</th>
      <th>Apagar</th>
    </tr>
    <?php
    foreach ($Vendas as $Venda) {
    ?>
      <tr>
        <td> <?= $Venda->ID_VENDA ?> </td>
        <td> <?= $Venda->DATA_VENDA ?> </td>
        <td> <?= $Venda->QUANTIDADE_VENDA ?> </td>
        <td> <?= $Venda->NOME_PRODUTO ?> </td>
        <td> <?= $Venda->NOME_VENDEDOR ?> </td>
        <td> <?= $Venda->NOME ?> </td>
        <td><a href=" <?= base_url('Venda/del/' . $Venda->ID_VENDA) ?> "><svg class="lixeira" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
            </svg></a></td>
      </tr>
    <?php
    }
    ?>
  </table>
  <?= $links ?>
</div>


<?= $this->endSection(); ?>