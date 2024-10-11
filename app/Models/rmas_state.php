<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rmas_state extends Model
{
    use HasFactory;

    protected $table = 'rmas_states';  // Nombre de la tabla

    protected $fillable = [
        'rma_id',
        'id_state',
        'state',
    ];
}
