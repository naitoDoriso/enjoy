<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');

$routes->get('/', 'Home::index');
//Fornecedor
$routes->get('/Fornecedor', 'Fornecedor::index');
$routes->get('/Fornecedor/add', 'Fornecedor::Adicionar');
$routes->post('/Fornecedor/add', 'Fornecedor::Adicionar');
$routes->get('/Fornecedor/del/(:num)', 'Fornecedor::remove/$1');
$routes->get('/Fornecedor/edit/(:num)', 'Fornecedor::editar/$1');
$routes->post('/Fornecedor/edit/(:num)', 'Fornecedor::editar/$1');

//Vendedor
$routes->get('/Vendedor', 'Vendedor::index');
$routes->get('/Vendedor/add', 'Vendedor::adicionar');
$routes->post('/Vendedor/add', 'Vendedor::adicionar');
$routes->get('/Vendedor/del/(:num)', 'Vendedor::remove/$1');
$routes->get('/Vendedor/edit/(:num)', 'Vendedor::editar/$1');
$routes->post('/Vendedor/edit/(:num)', 'Vendedor::editar/$1');

//Cliente
$routes->get('/Cliente', 'Cliente::index');
$routes->get('/Cliente/add', 'Cliente::adicionar');
$routes->post('/Cliente/add', 'Cliente::adicionar');
$routes->get('/Cliente/del/(:any)', 'Cliente::remove/$1');
$routes->get('/Cliente/edit/(:any)', 'Cliente::editar/$1');
$routes->post('/Cliente/edit/(:any)', 'Cliente::editar/$1');

//Produto
$routes->get('/Produto', 'Produto::index');
$routes->get('/Produto/add', 'Produto::adicionar');
$routes->post('/Produto/add', 'Produto::adicionar');
$routes->get('/Produto/del/(:num)', 'Produto::remove/$1');
$routes->get('/Produto/edit/(:num)', 'Produto::editar/$1');
$routes->post('/Produto/edit/(:num)', 'Produto::editar/$1');

//Venda
$routes->get('/Venda', 'Venda::index');
$routes->get('/Venda/add', 'Venda::adicionar');
$routes->post('/Venda/add', 'Venda::adicionar');
$routes->get('Venda/relatorio_mes', 'Venda::gerarRelatorio/mes');
$routes->get('Venda/relatorio_produto', 'Venda::gerarRelatorio/produto');
$routes->get('Venda/relatorio_vendedor', 'Venda::gerarRelatorio/vendedor');
$routes->get('/Venda/del/(:num)', 'Venda::remove/$1');

//Estoque
$routes->get('/Estoque', 'Estoque::index');
$routes->get('/Estoque/add', 'Estoque::adicionar');
$routes->post('/Estoque/add', 'Estoque::adicionar');
$routes->get('/Estoque/del/(:num)', 'Estoque::remove/$1');
$routes->get('/Estoque/edit/(:num)', 'Estoque::editar/$1');
$routes->post('/Estoque/edit/(:num)', 'Estoque::editar/$1');

//Language
$routes->get('/lang/es', 'Language::index/es');
$routes->get('/lang/(:any)', 'Language::index/(:any)');
$routes->get('/contraste', 'Contraste::index');

//Refresh
$routes->post('/Produto/refresh', 'Refresh::produto');
$routes->get('/Produto/refresh', 'Refresh::produto');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
