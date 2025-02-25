<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'TBL_EQUIPOS';

    protected $primaryKey = 'ID_EQUIPO';

    protected $fillable = [
        'ID_EQUIPO',
        'TIPO_EQUIPO',
        'MARCA_MODELO',
        'FICHA',
        'INVENTARIO',
        'OFICINA',
        'ESTADO',
        'DISCO_DURO',
        'RAM',
        'OBSERVACIONES',
        'SERVICE_TAG',
    ];

   
  
}
