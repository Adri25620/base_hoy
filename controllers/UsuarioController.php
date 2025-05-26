<?php

namespace Controllers;

use Exception;
use Model\Usuarios;
use Model\ActiveRecord;
use MVC\Router;

class UsuarioController extends ActiveRecord
{

    public function paginausuario(Router $router)
    {
        $router->render('usuarios/index', []);
    }

    public static function guardarAPI()
    {

        getHeadersApi();


        $_POST['us_apellidos'] = htmlspecialchars($_POST['us_apellidos']);

        $cantidad_apellidos = strlen($_POST['us_apellidos']);

        if ($cantidad_apellidos < 2) {

            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'La cantidad de digitos que debe de contener el apellido debe de ser mayor a dos'
            ]);
            return;
        }

        $_POST['us_nombre'] = htmlspecialchars($_POST['us_nombre']);

        $cantidad_nombres = strlen($_POST['us_nombre']);


        if ($cantidad_nombres < 2) {

            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mennsaje' => 'La cantidad de digitos que debe de contener el nombre debe de ser mayor a dos'
            ]);
            return;
        }

        $_POST['us_telefono'] = filter_var($_POST['us_telefono'], FILTER_VALIDATE_INT);

        if (strlen($_POST['us_telefono']) != 8) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mennsaje' => 'La cantidad de digitos de telefono debe de ser igual a 8'
            ]);
            return;
        }

        $_POST['us_nit'] = filter_var($_POST['us_nit'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['us_correo'] = filter_var($_POST['us_correo'], FILTER_SANITIZE_EMAIL);
        $_POST['us_fecha'] = date('Y-m-d H:i', strtotime($_POST['us_fecha']));

        if (!filter_var($_POST['us_correo'], FILTER_SANITIZE_EMAIL)) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mennsaje' => 'El correo electronico ingresado es invalido'
            ]);
            return;
        }
        $_POST['us_estado'] = htmlspecialchars($_POST['us_estado']);

        $estado = $_POST['us_estado'];

        if ($estado == "P" || $estado == "F" || $estado == "C") {


            try {


                // $data = new Usuarios();

                $data = new Usuarios([
                    'us_nombre' => $_POST['us_nombre'],
                    'us_apellidos' => $_POST['us_apellidos'],
                    'us_nit' => $_POST['us_nit'],
                    'us_telefono' => $_POST['us_telefono'],
                    'us_correo' => $_POST['us_correo'],
                    'us_estado' => $_POST['us_estado'],
                    'us_fecha' => $_POST['us_fecha'],
                    'us_situacion' => 1
                ]);

                $crear = $data->crear();
            

                http_response_code(200);
                echo json_encode([
                    'codigo' => 1,
                    'mensaje' => 'Exito el usuario ha sido registrado correctamente'
                ]);
            } catch (Exception $e) {
                http_response_code(400);
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Error al guardar',
                    'detalle' => $e->getMessage(),
                ]);
            }
        } else {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mennsaje' => 'Los detinos solo puedes ser "P, F, C"'
            ]);
            return;
        }
    }

    public static function buscarAPI()
{
    try {
        // Capturar fechas desde los parámetros GET
        $fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : null;
        $fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : null;

        // Condición base
        $condiciones = ["us_situacion = 1"];

        // Agregar condiciones si las fechas están definidas
        if ($fecha_inicio) {
            $condiciones[] = "us_fecha >= '{$fecha_inicio} 00:00'";
        }

        if ($fecha_fin) {
            $condiciones[] = "us_fecha <= '{$fecha_fin} 23:59'";
        }

        // Combinar todas las condiciones en un WHERE
        $where = implode(" AND ", $condiciones);

        // Consulta final
        $sql = "SELECT * FROM usuarios WHERE $where";
        $data = self::fetchArray($sql);

        http_response_code(200);
        echo json_encode([
            'codigo' => 1,
            'mensaje' => 'Usuarios obtenidos correctamente',
            'data' => $data
        ]);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode([
            'codigo' => 0,
            'mensaje' => 'Error al obtener los usuarios',
            'detalle' => $e->getMessage(),
        ]);
    }
}



    public static function modificarAPI()
    {

        getHeadersApi();

        $id = $_POST['us_id'];
        $_POST['us_apellidos'] = htmlspecialchars($_POST['us_apellidos']);

        $cantidad_apellidos = strlen($_POST['us_apellidos']);

        if ($cantidad_apellidos < 2) {

            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'La cantidad de digitos que debe de contener el apellido debe de ser mayor a dos'
            ]);
            return;
        }

        $_POST['us_nombre'] = htmlspecialchars($_POST['us_nombre']);

        $cantidad_nombres = strlen($_POST['us_nombre']);


        if ($cantidad_nombres < 2) {

            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mennsaje' => 'La cantidad de digitos que debe de contener el nombre debe de ser mayor a dos'
            ]);
            return;
        }

        $_POST['us_telefono'] = filter_var($_POST['us_telefono'], FILTER_VALIDATE_INT);

        if (strlen($_POST['us_telefono']) != 8) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mennsaje' => 'La cantidad de digitos de telefono debe de ser igual a 8'
            ]);
            return;
        }

        $_POST['us_nit'] = filter_var($_POST['us_nit'], FILTER_SANITIZE_NUMBER_INT);
        $_POST['us_correo'] = filter_var($_POST['us_correo'], FILTER_SANITIZE_EMAIL);
        $_POST['us_fecha'] = date('Y-m-d H:i', strtotime($_POST['us_fecha']));

        if (!filter_var($_POST['us_correo'], FILTER_SANITIZE_EMAIL)) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mennsaje' => 'El correo electronico ingresado es invalido'
            ]);
            return;
        }
        $_POST['us_estado'] = htmlspecialchars($_POST['us_estado']);

        $estado = $_POST['us_estado'];

        if ($estado == "P" || $estado == "F" || $estado == "C") {


            try {


                $data = Usuarios::find($id);
                // $data->sincronizar($_POST);
                $data->sincronizar([
                    'us_nombre' => $_POST['us_nombre'],
                    'us_apellidos' => $_POST['us_apellidos'],
                    'us_nit' => $_POST['us_nit'],
                    'us_telefono' => $_POST['us_telefono'],
                    'us_correo' => $_POST['us_correo'],
                    'us_estado' => $_POST['us_estado'],  
                    'us_fecha' => $_POST['us_fecha'],
                    'us_situacion' => 1
                ]);
                $data->actualizar();

                http_response_code(200);
                echo json_encode([
                    'codigo' => 1,
                    'mensaje' => 'La informacion del usuario ha sido modificada exitosamente'
                ]);
            } catch (Exception $e) {
                http_response_code(400);
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Error al guardar',
                    'detalle' => $e->getMessage(),
                ]);
            }
        } else {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mennsaje' => 'Los detinos solo puedes ser "P, F, C"'
            ]);
            return;
        }
    }

     public static function EliminarAPI()
    {

        try {

            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


            $ejecutar = Usuarios::EliminarUsuarios($id);


            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'El registro ha sido eliminado correctamente'
            ]);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al Eliminar',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}
