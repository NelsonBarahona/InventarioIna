<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    use HasFactory;

    protected $table = 'TBL_USUARIOS';

    protected $primaryKey = 'ID_USUARIO';

    protected $fillable = [
        'NOM_USUARIO',
        'CONTRASENA',
        'FK_COD_ROL',
        'FEC_ULTIMA_CONEXION',
        'COD_ESTADO'
    ];

    public $timestamps = false;
/*
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'FK_COD_ROL');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'COD_ESTADO');
      }
*/

      public function usuario()
    {
        return $this->belongsTo(usuario::class, 'CONTRASENA');
    }
}

