<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= empty($title) ? "Cadastro" : $title ?></title>
	<link rel="icon" href="<?= base_url("img/favicon.png") ?>">

	<?php
	$session = \Config\Services::session();
	$contraste = $session->get("contraste");
	if ($contraste) {
		echo "<script src='" . base_url('js/contraste.js') . "'></script>";
	}
	?>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"> </script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.css" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/datatables.min.js"></script>

	<link rel="stylesheet" href="<?= base_url('css/tabelas.css') ?>">
	<link rel="stylesheet" href="<?= base_url('css/formularios.css') ?>">
</head>

<body class="m-4" style="overflow: hidden;">
	<div class="loading">
		<div class="loadingio-spinner-rolling-jnhaguefrsr">
			<div class="ldio-pd3ftmktrcr">
				<div></div>
			</div>
		</div>
	</div>
	<?php
	$this->renderSection('lista');
	$this->renderSection('form');
	?>
	<script>
		$().ready(() => {
			$('table').DataTable({
				dom: 'frltip',
				aLengthMenu: [
					[10, 25, 50, 100, -1],
					[10, 25, 50, 100, "All"]
				],
				columnDefs: [{
					targets: "no-order",
					orderable: false
				}],
				language: {
					"decimal": ",",
					"emptyTable": "<?= lang("dataTables.emptyTable") ?>",
					"info": "<?= lang("dataTables.info") ?>",
					"infoEmpty": "<?= lang("dataTables.infoEmpty") ?>",
					"infoFiltered": "<?= lang("dataTables.infoFiltered") ?>",
					"infoPostFix": "",
					"thousands": ".",
					"lengthMenu": "<?= lang("dataTables.lengthMenu") ?>",
					"loadingRecords": "<?= lang("dataTables.loadingRecords") ?>",
					"processing": "",
					"search": "<?= lang("dataTables.search") ?>",
					"zeroRecords": "<?= lang("dataTables.zeroRecords") ?>",
					"paginate": {
						"first": "First",
						"last": "Last",
						"next": ">",
						"previous": "<"
					},
					"aria": {
						"sortAscending": "<?= lang("dataTables.sortAscending") ?>",
						"sortDescending": "<?= lang("dataTables.sortDescending") ?>"
					}
				}
			});
			$(".loading").css("opacity", "0");
			setTimeout(() => {
				$("body").css("overflow", "");
				$(".loading").remove();
			}, 600);
		});
	</script>

	<div vw class="enabled">
		<div vw-access-button class="active"></div>
		<div vw-plugin-wrapper>
			<div class="vw-plugin-top-wrapper"></div>
		</div>
	</div>
	<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
	<script>
		new window.VLibras.Widget('https://vlibras.gov.br/app');
	</script>

</body>

</html>