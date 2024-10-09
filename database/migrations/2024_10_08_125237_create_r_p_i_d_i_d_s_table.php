<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRPIDIDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpidid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rmas_id')->constrained('rmas')->onDelete('cascade');
            $table->string('RPIDDescription');
            $table->string('RPIDID');
            $table->string('RPIDType');
            $table->string('RPIDWarrantyType');
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
        Schema::dropIfExists('rpidid');
    }
}
