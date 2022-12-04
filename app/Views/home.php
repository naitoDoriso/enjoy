<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>" />
	<link rel="icon" href="<?= base_url("img/favicon.png") ?>">
	<title><?= lang('home.pagetitle') ?></title>
	<?php
	if ($contraste) {
		echo "<script src='js/contraste.js'></script>";
	}
	?>
</head>

<body>
	<div class="top">
		<div class="logo">
			<img src="<?= base_url('img/logo-sf.png'); ?>"></img>
		</div>
		<div class="acessibilidade">
			<p>A+</p>
			<p>A</p>
			<p>A-</p>
			<a href="contraste" tabindex="1">
				<p><?= lang('home.nav2') ?></p>
			</a>
			<a href="lang/pt-br" tabindex="1">
				<p><?= lang('home.langpt') ?></p>
			</a>
			<a href="lang/es" tabindex="1">
				<p><?= lang('home.langes') ?></p>
			</a>
		</div>
	</div>
	<nav>
		<ul class="menu">
			<li>
				<a class="titulo-menu" tabindex="1"><?= lang('home.title') ?></a>
			</li>
			<li>
				<a tabindex="2"><?= lang('home.li1') ?></a>
				<ul>
					<li>
						<a tabindex="3" href="<?= Base_url('Cliente'); ?>"><?= lang('home.list1') ?></a>
					</li>
				</ul>
			</li>
			<li>
				<a tabindex="4"><?= lang('home.li2') ?></a>
				<ul>
					<li>
						<a tabindex="5" href="<?= Base_url('Fornecedor'); ?>"><?= lang('home.list2') ?></a>
					</li>
				</ul>
			</li>
			<li>
				<a tabindex="6"><?= lang('home.li3') ?></a>
				<ul>
					<li>
						<a tabindex="7" href="<?= Base_url('Vendedor'); ?>"><?= lang('home.list3') ?></a>
					</li>
				</ul>
			</li>
			<li>
				<a tabindex="8"><?= lang('home.li5') ?></a>
				<ul>
					<li>
						<a tabindex="9" href="<?= Base_url('Produto'); ?>"><?= lang('home.list5') ?></a>
					</li>
				</ul>
			</li>
			<li>
				<a tabindex="10"><?= lang('home.li4') ?></a>
				<ul>
					<li>
						<a tabindex="11" href="<?= Base_url('Venda'); ?>"><?= lang('home.list4') ?></a>
					</li>
				</ul>
			</li>
			<li>
				<a tabindex="12"><?= lang('home.li6') ?></a>
				<ul>
					<li>
						<a tabindex="13" href="<?= Base_url('Estoque'); ?>"><?= lang('home.list6') ?></a>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
	<script>
		[...document.querySelectorAll("li ul a")].map((j) => {
			j.onfocus = function() {
				j.closest("ul").style.opacity = 1;
			}
		});

		[...document.querySelectorAll("li ul a")].map((j) => {
			j.onblur = function() {
				console.log("blured");
				j.closest("ul").removeAttribute("style");
			}
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