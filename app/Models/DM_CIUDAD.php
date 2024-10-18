<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DM_CIUDAD extends Model
{
    // Nombre de la tabla
    protected $table = 'DM_CIUDAD';

    // Clave primaria
    protected $primaryKey = 'id_ciudad';

    // Desactivar marcas de tiempo automáticas (created_at, updated_at)
    public $timestamps = false;

    // Los campos que se pueden llenar
    protected $fillable = [
        'ciudad',
    ];
}
