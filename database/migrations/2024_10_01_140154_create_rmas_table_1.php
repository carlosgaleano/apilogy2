<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRmasTable1 extends Migration
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
            $table->string('PONumber');
            $table->string('outgoingUnitPartNumber')->nullable();
            $table->string('looper')->nullable();
            $table->string('reRepairRule')->nullable();
            $table->string('customerItemNumber')->nullable();
            $table->string('outgoingUnitPartNumberDescription')->nullable();
            $table->string('PRDetailNotes')->nullable();
            $table->string('shipVia')->nullable();
            $table->string('messageType')->nullable();
            $table->string('headerNotes')->nullable();
            $table->integer('incomingQTY')->nullable();
            $table->string('contractID')->nullable();
            $table->string('PRStatus')->nullable();
            $table->dateTime('PRCreationDate')->nullable();
            $table->string('serviceCenter')->nullable();
            $table->string('incomingUnitPartNumberDescription')->nullable();
            $table->string('partRequestHeaderID')->nullable();
            $table->string('summary')->nullable();
            $table->string('mkey')->nullable();
            $table->string('incomingUnitSerialNumber')->nullable();
            $table->string('reportedProblem')->nullable();
            $table->string('requestType')->nullable();
            $table->string('repairStatus')->nullable();
            $table->string('billingAccountNumber')->nullable();
            $table->string('MRACode')->nullable();
            $table->string('incomingUnitPartNumber')->nullable();
            $table->string('messageId')->nullable();
            $table->string('productCodeDescription')->nullable();
            $table->string('priority')->nullable();
            $table->string('shipToCow')->nullable();
            $table->string('TID')->nullable();
            $table->string('carrier')->nullable();
            $table->string('productCode')->nullable();
            $table->string('internalDepartmentNumber')->nullable();
            $table->string('partRequestDetailNumber')->nullable();
            $table->string('supplyCow')->nullable();
            $table->string('appID')->nullable();
            $table->string('billToSiteOperatingUnit')->nullable();
            $table->string('externalOrderNumber')->nullable();
            $table->string('unitWarrantyType')->nullable();
            $table->string('repairNotes')->nullable();
            $table->integer('outgoingQTY')->nullable();
            $table->string('cancellationAuthorizationNumber')->nullable();
            $table->string('problemFound')->nullable();
            $table->dateTime('cancellationDate')->nullable();

            // Claves foráneas para las relaciones
            $table->foreignId('shipToAddress_id')->nullable()->constrained('ship_to_address')->onDelete('set null');
            $table->foreignId('billToAddress_id')->nullable()->constrained('bill_to_address')->onDelete('set null');

            $table->timestamps();
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

