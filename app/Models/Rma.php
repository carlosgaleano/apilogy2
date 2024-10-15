<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rma extends Model
{
    use HasFactory;

    protected $table = 'rmas';  // Nombre de la tabla

    protected $fillable = [
       'PONumber',
        'outgoingUnitPartNumber',
        'looper',
        'reRepairRule',
        'customerItemNumber',
        'outgoingUnitPartNumberDescription',
        'PRDetailNotes',
        'shipVia',
        'messageType',
        'headerNotes',
        'incomingQTY',
        'contractID',
        'PRStatus',
        'PRCreationDate',
        'serviceCenter',
        'incomingUnitPartNumberDescription',
        'partRequestHeaderID',
        'summary',
        'mkey',
        'incomingUnitSerialNumber',
        'reportedProblem',
        'requestType',
        'repairStatus',
        'billingAccountNumber',
        'MRACode',
        'incomingUnitPartNumber',
        'messageId',
        'productCodeDescription',
        'priority',
        'shipToCow',
        'TID',
        'carrier',
        'productCode',
        'internalDepartmentNumber',
        'partRequestDetailNumber',
        'supplyCow',
        'appID',
        'billToSiteOperatingUnit',
        'externalOrderNumber',
        'unitWarrantyType',
        'repairNotes',
        'outgoingQTY',
        'cancellationAuthorizationNumber',
        'problemFound',
        'cancellationDate',
        'shipToAddress_id',
        'billToAddress_id',
        'extended_warranty_obj_id',
        'service_parts_obj_id',
        // Esto puede ser null si BillToAddress está vacío
    ];

    // Relación con BillToAddress
    public function billToAddress()
    {
        return $this->belongsTo(BillToAddress::class, 'billToAddress_id');
    }

    // Relación con ShipToAddress
    public function shipToAddress()
    {
        return $this->belongsTo(ShipToAddress::class, 'shipToAddress_id');
    }

    public function rmas_state()
    {
        return $this->hasMany(rmas_state::class, 'rma_id');
    }

    public function DmEquipoModelo()
    {
        return $this->hasMany(DmEquipoModelo::class,'cod_modelo' ,'incomingUnitPartNumber');
    }
}
