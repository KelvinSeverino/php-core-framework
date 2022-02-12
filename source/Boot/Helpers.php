<?php
/** Arquivo Helpers com funcoes para auxilio na programacao da aplicacao **/

/**
 * ###############
 * ###   URL   ###
 * ###############
 */
/**
 * Funcao para compor a URL do https:// até a raiz do projeto
 * @return string
 */
function url(string $path = null): string
{
    //Verificando se esta em ambiente de teste
    //colocar localhost ou 127.0.0.1
    if(strpos($_SERVER['HTTP_HOST'], "localhost" ) || $_SERVER['HTTP_HOST'] == "localhost")
    {
        //Verificando caminho
        if($path)
        {
            //Voltando teste e validando o path informado
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        //Vontando URL teste
        return CONF_URL_TEST;
    }

    //Verificando caminho
    if($path)
    {
        //voltando com URL de producao
        return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE;
}

/**
 * Funcao para retornar para a pagina anterior
 * @return string
 */
function url_back(): string
{
    return ($_SERVER['HTTP_REFERER'] ?? url());
}