<?php

namespace Source\Core;

//Classe responsavel por tratar das requisições de Views
class View
{
    //Propriedade responsavel receber o caminho das views enviadas no parent::__construct("\\Caminho_View\") de cada Controlador
    protected $pathToViews;

    public function __construct(?string $pathToViews)
    {
        //Pegando Caminho do Tema enviado pelo Controller
        $this->pathToViews = $pathToViews; 
    }

    //Funcao para Carregar a View e mandar conteudo do backend para o frontend
    public function show($viewName, $data = [])
    {
        //Extraindo os Indices do Array e transformando em variaveis
        extract($data);

        //Verifica se o PathToViews é do tema base ou de um tema passado via parent::__construct() nos controladores;
        if($this->getPathToViews() == null)
        {
            //Requisitando arquivo View
            require_once(__DIR__. "/../../views/" . CONF_VIEW_THEME . "/" . $viewName . "." . CONF_VIEW_EXT);
        }
        else
        {
            //Requisitando arquivo View
            //require_once($this->getPathToViews() . $viewName . "." . CONF_VIEW_EXT);  
            //die();
        }
    }

    public function bufferHtml($viewName, $data = []): string
    {
        //Extraindo os Indices do Array e transformando em variaveis
        extract($data);

        //iniciar o buffer de saida para guardar o conteudo do html
        ob_start(); 

        //requisita o arquivo html
        require_once($this->getPathToViews() . $viewName . "." . CONF_VIEW_EXT); 

        //pega o html que está no buffer e depois limpa o buffer
        $html = ob_get_clean(); 

        //retorna o conteudo do html
        return $html; 
    }
    
    /** Metodo para setar o caminho do tema
     * @param  string $pathToViews
     * @return void
     */
    public function setPathToViews($pathToViews)
    {
        $pathToViews = $this->pathToViews;
    }
        
    /** Metodo para pegar o caminho do tema
     * @return void
     */
    public function getPathToViews()
    {
        return $this->pathToViews;
    }
}