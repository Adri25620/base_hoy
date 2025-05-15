<?php

namespace Controllers;

use Model\ActiveRecord;
use MVC\Router;

class UsuarioController extends ActiveRecord {

    public function paginausuario(Router $router){
        $router->render('usuarios/index', []);
    }

    public static function guardarAPI() {
        getHeadersApi();

        echo json_encode('llegue hasta guardar');
        return;
    }
}