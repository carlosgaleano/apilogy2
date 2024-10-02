<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestVerifoneTsaApiTable extends Migration
{
    public function up()
    {
        Schema::create('request_verifone_tsa_api', function (Blueprint $table) {
            $table->id(); // Esto crea una columna 'id' auto incremental
            $table->string('point', 100);
            $table->longText('request')->nullable();
            $table->dateTime('creation')->nullable();
            $table->string('aspnetusersid', 450)->nullable();
            $table->boolean('procesado')->default(0);
            $table->string('partrequestheaderid', 100)->nullable();
            $table->boolean('status')->default(1);
            $table->string('partrequestdetailnumber', 5000)->default('0');
            $table->longText('response')->nullable();

           // $table->primary('id'); // Establecer la clave primaria
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_verifone_tsa_api');
    }
}
