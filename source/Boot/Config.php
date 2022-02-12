<?php
/**
 * BANCO DE DADOS
 */
//Verificando se esta em ambiente de homologacao
//colocar localhost ou 127.0.0.1
if(strpos($_SERVER['HTTP_HOST'], "localhost" ) || $_SERVER['HTTP_HOST'] == "localhost")
{
    //Valores globais de conexão com o BD
    define("CONF_DB_HOST", "localhost");
    define("CONF_DB_USER", "root");
    define("CONF_DB_PASS", "");
    define("CONF_DB_NAME", "");
}
//Caso contrário, significa que é ambiente de producao
else
{
    //Valores globais de conexão com o BD
    define("CONF_DB_HOST", "localhost");
    define("CONF_DB_USER", "root");
    define("CONF_DB_PASS", "");
    define("CONF_DB_NAME", "");
}


/**
 * URL
 */
//URLs do Projeto
//URL base é a URL do projeto rodando no servidor de producao
define("CONF_URL_BASE", "https://");
define("CONF_URL_TEST", "http://localhost/php-mvc");


/**
 * BASE SITE
 */
define("CONF_SITE_NAME", "PHP MVC");
define("CONF_SITE_TITLE", "PHP MVC");


/**
 * DATAS
 */
//Data padrao nacional
define("CONF_DATE_BR", "d/m/Y H:i:s");
//Data padrao aplicacao (comunicacao com BD)
define("CONF_DATE_APP", "Y-m-d H:i:s");


/**
 * VIEWS
 */
//Nome do tema que esta sendo utilizado na aplicacao
define("CONF_VIEW_THEME", "php-mvc");
//Localizacao de onde está os arquivos de Views
define("CONF_VIEW_PATH", __DIR__. "../../../views/");
//Extensao dos arquivos de Views
define("CONF_VIEW_EXT", "php");



/**
 * UPLOADs DIR
 */
//Diretorios de armazenamento para os Uploads
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");
