<?php

namespace Source\Controllers;

use Source\Core\Controller;

class Web extends Controller
{
    //Construtor geral das paginas WEB
    public function __construct()
    {
        //Componente para enviar dados para a classe herdada - Controller
        parent::__construct();
    }

    /**
     * METODO DE HOME
     * @param null|array $data
     */
    public function home(?array $data): void
    {
        $content = "Esta é a rota Home...";

        //Passando dados para o arquivo da view auth-login.php
        echo $this->view->show("home", $data = [
            "content" => $content
        ]);
    }

    /**
     * MÉTODO DA ROTA ERRORS
     */
    public function error(array $data): void
    {
        //Instanciando stdClass
        $error = new \stdClass();

        //Validando tipo de erro
        switch ($data['errcode'])
        {
            //Metodos que usarem redirect("/ops/problemas") cairam abaixo
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                break;
            
            //Metodos que usarem redirect("/ops/manutencao") cairam abaixo
            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo!";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                //Pegando variavel $data que vem atras do argumento acima
                $error->code = $data['errcode'];
                $error->title = "Ooops. Contéudo indisponivel :/";
                $error->message = "Sentimos muito, mas essa página encontra-se indisponível no momento!";
                $error->linkMessage = "Retornar para página anterior.";
                //Leva o usuario para a pagina anterior
                $error->link = url_back();
                break;
        }

        //Passando dados para o arquivo da view error.php
        echo $this->view->show('error', $data = [
            "error" => $error
        ]);
    }
}