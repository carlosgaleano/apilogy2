<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rma;

class ShipToAddress extends Model
{
    use HasFactory;

    protected $table = 'ship_to_address';  // Nombre de la tabla

    protected $fillable = [
        'country',
        'address1',
        'address2',
        'address3',
        'city',
        'state',
        'postalcode',
        'sitename',
        'siteid',
        'contact',
        'phoneno'
    ];


    // Relación con RMA
    public function rma()
    {
        return $this->hasMany(Rma::class, 'ship_to_address_id');
    }
}

