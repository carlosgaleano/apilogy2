<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtendedWarrantyObj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('extended_warranty_obj')) {
            Schema::create('extended_warranty_obj', function (Blueprint $table) {
                $table->id();
                $table->string('PartDescription');
                $table->string('PartNumber');
                $table->string('ProductCode');
                $table->string('WarrantyEndDate');
                $table->timestamps();
            });
        } else {
            Schema::table('extended_warranty_obj', function (Blueprint $table) {
                if (!Schema::hasColumn('extended_warranty_obj', 'PartDescription')) {
                    $table->string('PartDescription');
                }
                if (!Schema::hasColumn('extended_warranty_obj', 'PartNumber')) {
                    $table->string('PartNumber');
                }
                if (!Schema::hasColumn('extended_warranty_obj', 'ProductCode')) {
                    $table->string('ProductCode');
                }
                if (!Schema::hasColumn('extended_warranty_obj', 'WarrantyEndDate')) {
                    $table->string('WarrantyEndDate');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('extended_warranty_obj');
    }
}
