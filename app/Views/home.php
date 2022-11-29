<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>" />
    <link rel="icon" href="<?= base_url("img/favicon.png") ?>">
    <title>Página Inicial</title>
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
            <p>Acessibilidade</p>
            <p>Contraste</p>
            <p>Espanhol</p>
        </div>
    </div>
    <nav>
        <ul class="menu">
            <li>
                <a tabindex="1" class="titulo-menu" href="#">Menu</a>
            </li>
            <li>
                <a tabindex="2" href="#">Cliente</a>
                <ul>
                    <li>
                        <a tabindex="3" href="<?= Base_url('Cliente'); ?>">Cadastrar Cliente</a>
                    </li>
                </ul>
            </li>
            <li>
                <a tabindex="4" href="#">Fornecedor</a>
                <ul>
                    <li>
                        <a tabindex="5" href="<?= Base_url('Fornecedor'); ?>">Cadastrar Fornecedor</a>
                    </li>
                </ul>
            </li>
            <li>
                <a tabindex="6" href="#">Vendedor</a>
                <ul>
                    <li>
                        <a tabindex="7" href="<?= Base_url('Vendedor'); ?>">Cadastrar Vendedor</a>
                    </li>
                </ul>
            </li>
            <li>
                <a tabindex="8" href="#">Venda</a>
                <ul>
                    <li>
                        <a tabindex="9" href="<?= Base_url('Venda'); ?>">Cadastrar Venda</a>
                    </li>
                </ul>
            </li>
            <li>
                <a tabindex="10" href="#">Produto</a>
                <ul>
                    <li>
                        <a tabindex="11" href="<?= Base_url('Produto'); ?>">Cadastrar Produto</a>
                    </li>
                </ul>
            </li>
            <li>
                <a tabindex="12" href="#">Estoque</a>
                <ul>
                    <li>
                        <a tabindex="13" href="<?= Base_url('Estoque'); ?>">Cadastrar Estoque</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <script>
        (() => {
            [...document.querySelectorAll("ul>li>ul>li>a")].map((elm) => {
                elm.addEventListener("focus", () => {
                    console.log("focado");
                    elm.closest("ul").style.opacity = "1";
                });
                elm.addEventListener("blur", () => {
                    elm.closest("ul").style.opacity = "0";
                });
            });
        })();
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

<!--

<ul class="menu">
		<li><a href="#">Home</a></li>
		<li><a href="#">Sobre</a></li>
	  		<li><a href="#">O que fazemos?</a>
	         	<ul>
	                  <li><a href="#">Web Design</a></li>
	                  <li><a href="#">SEO</a></li>
	                  <li><a href="#">Design</a></li>
	       		</ul>
			</li>
		<li><a href="#">Links</a></li>
		<li><a href="#">Contato</a></li>
</ul>
</nav>
-->