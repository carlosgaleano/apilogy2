<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePartsObj extends Model
{
    use HasFactory;

    protected $table = 'service_parts_objs';  // Nombre de la tabla

    protected $fillable = [
        'ServiceEndDate',
        'ServicePartDescription',
        'ServicePartNumber',
        'ServiceProductCode',
    ];

    // Relación con RMA
    public function rma()
    {
        return $this->hasMany(Rma::class, 'service_parts_obj_id');
    }
}
