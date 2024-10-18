<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TA_PERSONAS extends Model
{
    use HasFactory;

    protected $table = 'TA_PERSONAS';  // Nombre de la tabla

    // Clave primaria
    protected $primaryKey = 'id_persona';

    // Desactivar marcas de tiempo automáticas (created_at, updated_at)
    public $timestamps = false;

    // Los campos que se pueden llenar
    protected $fillable = [
        'id_persona',
        'num_document',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'e_mail',
        'fecha_ingreso',
        'direccion',
        'comuna',
        'telefono',
        'activo',
        'id_equipo',
        'telefono2',
        'id_ciudad',
        'id_rmas',
    ];

    // Relaciones
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }


}
