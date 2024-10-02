<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_r_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Value');
            // Clave foránea que referencia a la tabla 'rmas'
            $table->foreignId('rmas_id')->constrained('rmas')->onDelete('cascade');
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
        Schema::dropIfExists('p_r_attributes');
    }
}
