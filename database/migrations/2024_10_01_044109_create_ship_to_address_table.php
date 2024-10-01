<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipToAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_to_address', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('Country'); // País
            $table->string('Address1'); // Dirección 1
            $table->string('Address2')->nullable(); // Dirección 2
            $table->string('Address3')->nullable(); // Dirección 3
            $table->string('City'); // Ciudad
            $table->string('State'); // Estado
            $table->string('PostalCode'); // Código postal
            $table->string('SiteName'); // Nombre del sitio
            $table->string('SiteID'); // ID del sitio
            $table->string('Contact'); // Contacto
            $table->string('PhoneNo'); // Número de teléfono
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
        Schema::dropIfExists('ship_to_address');
    }
}
