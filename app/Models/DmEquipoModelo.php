<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DmEquipoModelo extends Model
{
    use HasFactory;

    protected $table = 'DM_EQUIPOS_MODELO';

    // Clave primaria de la tabla
    protected $primaryKey = 'id_modelo';

    // Deshabilitar timestamps si no los tienes (created_at, updated_at)
    public $timestamps = false;

    // Indicar que la clave primaria no es autoincremental si usas otra columna
    public $incrementing = true;

    // Tipo de datos de la clave primaria
    protected $keyType = 'int';

    // Columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'id_marca',
        'cod_modelo',
        'glosa_modelo',
        'cod_color',
        'foto',
        'imei_largo',
        'ind_activo',
        'fecha_ingreso',
        'id_responsable_creacion',
        'id_responsable_modificacion',
        'fecha_modificacion',
        'cod_externo',
        'cod_fullstar',
        'valor',
        'nombre_homologacion',
        'codigo_claims',
        'codigoTrancever',
        'ValorUnitario',
        'modelo_comercial',
        'cod_centroIngreso',
        'valorMaterial',
        'cod_sap',
        'id_color',
        'meses_garantia'
    ];
}
