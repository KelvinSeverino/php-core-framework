<?php

namespace Source\Core;

//Camada controladora, ele tem funcoes nativas para compartilhar com controladores mais especificos
class Controller
{
    //Camada de visao
    /** @var View */
    protected $view;

    //Contrutor que está extendendo as classes
    /**
     * Controller constructor
     * @param string|null $pathToViews
     */
    public function __construct(?string $pathToViews = null) //Informando que o $pathToViews pode ter um valor string ou null
    {
        $this->view = new View($pathToViews); //Passando o $pathToViews para a classe View
    }
}
