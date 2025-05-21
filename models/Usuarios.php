<?php
namespace Model;

class Usuarios extends ActiveRecord{

    public static $tabla = 'usuarios';
    public static $columnasDB = [
        'us_nombre',
        'us_apellidos',
        'us_nit',
        'us_telefono',
        'us_correo',
        'us_estado',
        'us_situacion'
    ];
    public static $idTabla = 'us_id';

    public $us_id;
    public $us_nombre;
    public $us_apellidos;
    public $us_nit;
    public $us_telefono;
    public $us_correo;
    public $us_estado;
    public $us_situacion;


    public function __construct($args = []){
        $this->us_id = $args['us_id'] ?? null;
        $this->us_nombre = $args['us_nombre'] ?? '';
        $this->us_apellidos = $args['us_apellidos'] ?? '';
        $this->us_nit = $args['us_nit'] ?? 0;
        $this->us_telefono = $args['us_telefono'] ?? 0;
        $this->us_correo = $args['us_correo'] ?? 0;
        $this->us_estado = $args['us_estado'] ?? 0;
        $this->us_situacion = $args['us_situacion'] ?? 1;
        
    }

    public static function EliminarUsuarios($id){

        $sql = "DELETE FROM usuarios WHERE us_id = $id";

        return self::SQL($sql);
    }
}