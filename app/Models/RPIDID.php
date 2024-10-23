<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPIDID extends Model
{
    use HasFactory;


    protected $table = 'rpidid';


    protected $fillable = [
        'RPIDDescription',
        'RPIDID',
        'RPIDType',
        'RPIDWarrantyType',
        'rmas_id',
    ];

}
