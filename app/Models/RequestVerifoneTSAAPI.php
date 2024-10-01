<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestVerifoneTSAAPI extends Model
{
    use HasFactory;

    // Especifica la tabla correspondiente
    protected $table = 'request_verifone_tsa_api';

     // Especifica la clave primaria (opcional, si no es 'id')
     protected $primaryKey = 'id';

     // Si 'id' es auto incremental, no es necesario especificar 'incrementing'
     public $incrementing = true;

     // Especifica si la tabla usa timestamps (created_at y updated_at)
     public $timestamps = false;



    // Define los atributos que son asignables en masa
    protected $fillable = [
        'point',
        'request',
        'creation',
        'aspnetusersid',
        'procesado',
        'partrequestheaderid',
        'status',
        'partrequestdetailnumber',
        'response',
    ];
}
