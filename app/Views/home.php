<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="<?= base_url('css/style.css'); ?>" />
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
                    <a class="titulo-menu" href="#">Menu</a>
            </li>
            <li>
                <a href="#">Cliente</a>
                    <ul>
                        <li>
                            <a href="<?= Base_url('Cliente');?>">Cadastrar Cliente</a>
                        </li>
                    </ul>
            </li>
            <li>
                <a href="#">Fornecedor</a>
                    <ul>
                        <li>
                            <a href="<?= Base_url('Fornecedor');?>">Cadastrar Fornecedor</a>
                        </li>
                    </ul>
            </li>
            <li>
                <a href="#">Vendedor</a>
                <ul>
                    <li>
                        <a href="<?= Base_url('Vendedor');?>">Cadastrar Vendedor</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Venda</a>
                <ul>
                    <li>
                        <a href="<?= Base_url('Venda');?>">Cadastrar Venda</a>
                    </li>
                </ul>
            </li>
<li>
                <a href="#">Produto</a>
                <ul>
                    <li>
                        <a href="<?= Base_url('Produto');?>">Cadastrar Produto</a>
                    </li>
                </ul>
            </li>
<li>
                <a href="#">Estoque</a>
                <ul>
                    <li>
                        <a href="<?= Base_url('Estoque');?>">Cadastrar Estoque</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
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
