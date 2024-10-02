<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtendedWarrantyObjIdToRmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rmas', function (Blueprint $table) {
            if (!Schema::hasColumn('rmas', 'extended_warranty_obj_id')) {
                $table->foreignId('extended_warranty_obj_id')->nullable()->constrained('extended_warranty_obj')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rmas', function (Blueprint $table) {
            $table->dropForeign(['extended_warranty_obj_id']);
            $table->dropColumn('extended_warranty_obj_id');
        });
    }
}

