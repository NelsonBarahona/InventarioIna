<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_usuarios'; // 🔥 Especifica el nombre correcto de la tabla

    protected $primaryKey = 'ID_USUARIO';

    protected $fillable = [
        'NOM_USUARIO',
        'CONTRASENA',
        'FK_COD_ROL',
        'FEC_ULTIMA_CONEXION',
        'COD_ESTADO'
    ];

    protected $hidden = [
        'CONTRASENA',
    ];

    public function getAuthPassword()
    {
        return $this->CONTRASENA; // 🔥 Laravel usará este campo como la contraseña
    }
}