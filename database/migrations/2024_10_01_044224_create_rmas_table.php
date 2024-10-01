<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rmas', function (Blueprint $table) {
            $table->id();  // Clave primaria
            $table->string('PONumber'); // Número de orden de compra
            $table->string('outgoingUnitPartNumber')->nullable(); // Número de parte de la unidad saliente
            $table->string('looper')->nullable(); // Looper
            $table->string('reRepairRule')->nullable(); // Regla de reparación
            $table->string('customerItemNumber')->nullable(); // Número de artículo del cliente
            $table->string('outgoingUnitPartNumberDescription')->nullable(); // Descripción del número de parte de la unidad saliente
            $table->string('PRDetailNotes')->nullable(); // Notas de detalle de PR
            $table->string('shipVia')->nullable(); // Método de envío
            $table->string('messageType')->nullable(); // Tipo de mensaje
            $table->string('headerNotes')->nullable(); // Notas del encabezado
            $table->integer('incomingQTY')->nullable(); // Cantidad entrante
            $table->string('contractID')->nullable(); // ID del contrato
            $table->string('PRStatus')->nullable(); // Estado de PR
            $table->dateTime('PRCreationDate')->nullable(); // Fecha de creación de PR
            $table->string('serviceCenter')->nullable(); // Centro de servicio
            $table->string('incomingUnitPartNumberDescription')->nullable(); // Descripción del número de parte de la unidad entrante
            $table->string('partRequestHeaderID')->nullable(); // ID del encabezado de solicitud de parte
            $table->string('summary')->nullable(); // Resumen
            $table->string('mkey')->nullable(); // Clave m
            $table->string('incomingUnitSerialNumber')->nullable(); // Número de serie de la unidad entrante
            $table->string('reportedProblem')->nullable(); // Problema reportado
            $table->string('requestType')->nullable(); // Tipo de solicitud
            $table->string('repairStatus')->nullable(); // Estado de reparación
            $table->string('billingAccountNumber')->nullable(); // Número de cuenta de facturación
            $table->string('MRACode')->nullable(); // Código MRA
            $table->string('incomingUnitPartNumber')->nullable(); // Número de parte de la unidad entrante
            $table->string('messageId')->nullable(); // ID del mensaje
            $table->string('productCodeDescription')->nullable(); // Descripción del código de producto
            $table->string('priority')->nullable(); // Prioridad
            $table->string('shipToCow')->nullable(); // Envío a COW
            $table->string('TID')->nullable(); // TID
            $table->string('carrier')->nullable(); // Transportista
            $table->string('productCode')->nullable(); // Código de producto
            $table->string('internalDepartmentNumber')->nullable(); // Número de departamento interno
            $table->string('partRequestDetailNumber')->nullable(); // Número de detalle de solicitud de parte
            $table->string('supplyCow')->nullable(); // Suministro COW
            $table->string('appID')->nullable(); // ID de la aplicación
            $table->string('billToSiteOperatingUnit')->nullable(); // Unidad operativa del sitio de facturación
            $table->string('externalOrderNumber')->nullable(); // Número de pedido externo
            $table->string('unitWarrantyType')->nullable(); // Tipo de garantía de unidad
            $table->string('repairNotes')->nullable(); // Notas de reparación
            $table->integer('outgoingQTY')->nullable(); // Cantidad saliente
            $table->string('cancellationAuthorizationNumber')->nullable(); // Número de autorización de cancelación
            $table->string('problemFound')->nullable(); // Problema encontrado
            $table->dateTime('cancellationDate')->nullable(); // Fecha de cancelación

            // Claves foráneas para las relaciones
            $table->foreignId('shipToAddress_id')->nullable()->constrained('ship_to_address')->onDelete('set null');
            $table->foreignId('billToAddress_id')->nullable()->constrained('bill_to_address')->onDelete('set null');

            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rmas');
    }
}
