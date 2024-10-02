<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PRAttribute extends Model
{
    use HasFactory;

    protected $table = 'p_r_attributes';  // Nombre de la tabla

    protected $fillable = [
        'Name',
        'Value',
    ];
}
