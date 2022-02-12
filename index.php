<?php
//Controlando manualmente o cache da aplicacao, fazendo ter um unico output em toda a aplicacao, assim otimizando recurso
ob_start();

//Iniciando estrutura
require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */
use CoffeeCode\Router\Router;

//Inicializando rota pela classe Router passando os parametros:
//da funcao url() do helpers.php com o separador :
$route = new Router(url(), ":");

//Informando localizacao dos controladores
$route->namespace("Source\Controllers");

/**
 * WEB ROUTER - Rotas de consumo do usuario
 */
//Grupo das rotas
$route->group(null);
//Pagina home do intranet
//Pega a URL a partir da / sendo esse caso a Home
$route->get("/", "Web:home");




/**
 * ERROR ROUTES - as Rotas de erro, 400,404,405,500
 */
$route->namespace("Source\Controllers")->group("/ops");
//Leva o codigo de erro com {errcode} para controlador
$route->get("/{errcode}", "Web:error");


/**
 * ROUTE - DISPACHA AS ROTAS CRIADAS ACIMA
 */
$route->dispatch();


/**
 * ERROR REDIRECT - SE O dispatch não conseguir redirecionar para a rota, cai abaixo
 */
//var_dump($route->error());exit;
if($route->error())
{
    $route->redirect("/ops/{$route->error()}");
}

//Dando output e desarmazenando o cache para entregar ao usuario
ob_end_flush();