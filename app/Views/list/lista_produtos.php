<?= $this->extend('modelo'); ?>

<?= $this->section('lista'); ?>
<div class="botao">
  <a href=" <?= base_url('Produto/add'); ?> "><button type="button" class="btn btn-outline-success">
      <svg class="adicionar" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
      </svg> Adicionar</button> </a>
  <a href=" <?= base_url(); ?> " class="float-end" class="menu">
    <button type="button" class="btn btn-outline-success">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
      </svg>
      <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
      </svg> Voltar ao menu
    </button></a>
</div>
<div>
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Nome Produto</th>
        <th>Marca</th>
        <th>Quantidade</th>
        <th>Valor</th>
        <th>Fornecedor</th>
        <th>Editar</th>
        <th>Apagar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($produtos as $produto) {
      ?>
        <tr>
          <td> <?= $produto->ID_PRODUTO ?> </td>
          <td> <?= $produto->NOME_PRODUTO ?> </td>
          <td> <?= $produto->MARCA ?> </td>
          <td> <?= $produto->QUANTIDADE ?> </td>
          <td> <?= $produto->VALOR ?> </td>
          <td> <?= $fornecedor->where("ID_FORNECEDOR", $produto->ID_FORNECEDOR)->findAll()[0]->NOME_FORNECEDOR ?> </td>
          <td><a href=" <?= base_url('Produto/edit/' . $produto->ID_PRODUTO) ?> "><svg class="caneta" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
              </svg></a></td>
          <td><a href=" <?= base_url('Produto/del/' . $produto->ID_PRODUTO) ?> "><svg class="lixeira" xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
              </svg></a></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

</div>

<?= $this->endSection(); ?>