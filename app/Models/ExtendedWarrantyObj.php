<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rma;

class ExtendedWarrantyObj extends Model
{
    use HasFactory;

    protected $table = 'extended_warranty_obj';  // Nombre de la tabla

    protected $fillable = [
        'PartDescription',
        'PartNumber',
        'ProductCode',
        'WarrantyEndDate',
    ];

    // Relación con RMA
    public function rma()
    {
        return $this->hasMany(Rma::class, 'extended_warranty_obj_id');
    }

}
