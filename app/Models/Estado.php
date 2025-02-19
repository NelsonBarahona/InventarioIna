<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'TBL_ESTADO';

    protected $primaryKey = 'COD_ESTADO';

    protected $fillable = [
        'DESCRIPCION',
    ];

    public $timestamps = false;
}
