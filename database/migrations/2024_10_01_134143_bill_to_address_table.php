<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillToAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_to_address', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('country'); // País
            $table->string('address1'); // Dirección 1
            $table->string('address2')->nullable(); // Dirección 2
            $table->string('address3')->nullable(); // Dirección 3
            $table->string('city'); // Ciudad
            $table->string('state'); // Estado
            $table->string('postalcode'); // Código postal
            $table->string('sitename'); // Nombre del sitio
            $table->string('siteid'); // ID del sitio
            $table->string('contact'); // Contacto
            $table->string('phoneno'); // Número de teléfono
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
        Schema::dropIfExists('bill_to_address');
    }
}
