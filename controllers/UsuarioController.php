<?php

namespace Controllers;

use Model\ActiveRecord;
use MVC\Router;

class UsuarioController extends ActiveRecord {

    public function paginausuario(Router $router){
        $router->render('usuarios/usuario', []);
    }
}