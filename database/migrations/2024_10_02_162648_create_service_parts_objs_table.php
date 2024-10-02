<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePartsObjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_parts_objs', function (Blueprint $table) {
            $table->id();
            $table->string('ServiceEndDate');
            $table->string('ServicePartDescription');
            $table->string('ServicePartNumber');
            $table->string('ServiceProductCode');
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
        Schema::dropIfExists('service_parts_objs');
    }
}
