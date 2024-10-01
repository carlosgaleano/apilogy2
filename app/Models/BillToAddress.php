<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rma;


class BillToAddress extends Model
{
    use HasFactory;

    protected $table = 'bill_to_address';  // Nombre de la tabla

    protected $fillable = [
        'country',
        'address1',
        'address2',
        'address3',
        'city',
        'contact',
        'postal_code',
        'site_name',
        'site_id',
        'state',
        'phone_no',
    ];


     // Relación con RMS
     public function rms()
     {
         return $this->hasMany(Rma::class, 'bill_to_address_id');
     }


}
