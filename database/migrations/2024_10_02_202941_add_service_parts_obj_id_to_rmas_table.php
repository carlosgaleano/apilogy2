<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServicePartsObjIdToRmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rmas', function (Blueprint $table) {
            if (!Schema::hasColumn('rmas', 'service_parts_obj_id')) {
                $table->foreignId('service_parts_obj_id')->nullable()->constrained('service_parts_obj')->onDelete('set null');
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
            $table->dropForeign(['service_parts_obj_id']);
            $table->dropColumn('service_parts_obj_id');
        });
    }
}
