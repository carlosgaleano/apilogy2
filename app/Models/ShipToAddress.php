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
        'Country',
        'Address1',
        'Address2',
        'Address3',
        'City',
        'State',
        'PostalCode',
        'SiteName',
        'SiteID',
        'Contact',
        'PhoneNo'
    ];


    // Relación con RMA
    public function rma()
    {
        return $this->hasMany(Rma::class, 'ship_to_address_id');
    }
}

