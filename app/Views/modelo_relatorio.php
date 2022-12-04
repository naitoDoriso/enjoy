<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= empty($title) ? "Relatório" : $title ?></title>
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

<body class="m-4">
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
                dom: 'Bfrltip',
                buttons: [{
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        },
                        customize: (doc) => {
                            doc.styles.tableHeader.color = "#000";
                            doc.styles.tableHeader.fillColor = "#FFF";
                            let numcol = doc.content[1].table.body[0].length;
                            let perc = (100 / numcol).toFixed(2);
                            let widths = [];

                            for (let i = 0; i < numcol; i++) {
                                widths.push(perc + "%");
                            }
                            doc.content[1].table.widths = widths;
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                aLengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
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
                    },
                    "buttons": {
                        'copy': '<?= lang("dataTables.copy") ?>',
                        'copyTitle': '<?= lang("dataTables.copyTitle") ?>',
                        'copySuccess': {
                            _: '<?= lang("dataTables._") ?>',
                            1: '<?= lang("dataTables.1") ?>a'
                        },
                        'csv': 'CSV',
                        'excel': 'Excel',
                        'pdf': 'PDF',
                        'print': '<?= lang("dataTables.print") ?>',
                        'colvis': '<?= lang("dataTables.colvis") ?>'
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
    <script>
        let interval = setInterval(() => {
            if ($(".dt-buttons")[0] !== undefined) {
                $(".dt-buttons").css("display", "flex");
                $(".dt-buttons").css("align-items", "center");
                $(".dt-buttons button").addClass("btn btn-outline-success");
                $(".dt-buttons")[0].insertAdjacentHTML('beforeend', `
                <a href="<?= base_url("/Venda"); ?>" class="w-100">
                    <button type="button" class="btn btn-outline-success float-end" style="padding-left: 3px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 12 16">
                            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                        </svg>
                        <?= lang('list/lista_relatorio.back') ?>
                    </button>
                </a>`);
                clearInterval(interval);
            }
        }, 100);
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