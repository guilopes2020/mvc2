<?php
namespace src\controllers;

use \core\Controller;
use \src\models\Cliente;

class HomeController extends Controller {

    public function index() {
        if ($this->logado) {
            $name = 'Admnistrador';
        } else {
            $name = 'Visitante';
        }
        $dados = Cliente::select()->execute();

        $dadosCinema = file_get_contents('https://api.b7web.com.br/cinema');
        $dadosCinemaJson = json_decode($dadosCinema, true);

        $this->render('home', [
            'dadosCinemaJson' => $dadosCinemaJson,
            'name' => $name,
            'dados' => $dados,
            'logado' => $this->logado,
        ]);
    }

    

}