<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TA_EQUIPOS', function (Blueprint $table) {
            $table->id('id_equipo'); // Primary key
            $table->integer('id_cliente')->nullable();
            $table->integer('id_persona')->nullable();
            $table->integer('numero_ot')->nullable();
            $table->integer('id_origen_ot')->nullable();
            $table->dateTime('fecha_inicio_ot')->nullable();
            $table->dateTime('fecha_termino_ot')->nullable();
            $table->string('id_imei', 100)->nullable();
            $table->string('numero_pcs', 20)->nullable();
            $table->integer('id_marca')->nullable();
            $table->integer('id_modelo')->nullable();
            $table->integer('id_garantia')->nullable();
            $table->dateTime('fch_fabricacion')->nullable();
            $table->dateTime('fch_activacion')->nullable();
            $table->integer('id_check_list_ini')->nullable();
            $table->integer('id_check_list_fin')->nullable();
            $table->string('glosa_cliente', 2000)->nullable();
            $table->dateTime('fecha_ingreso')->default(DB::raw('GETDATE()'))->nullable();
            $table->string('codigo_equipo', 100)->nullable();
            $table->integer('id_sucursal')->nullable();
            $table->decimal('presupuesto_preaprobado', 18, 0)->nullable();
            $table->string('color', 100)->nullable();
            $table->string('msn', 100)->nullable();
            $table->text('observacion')->nullable();
            $table->integer('id_contrato')->nullable();
            $table->text('glosa_tecnico')->nullable();
            $table->integer('id_tecnico')->nullable();
            $table->integer('ultimo_estado')->nullable();
            $table->string('ref_compra', 20)->nullable();
            $table->integer('meses_garantia')->default(0)->nullable();
            $table->text('glosa_falla')->nullable();
            $table->smallInteger('pierde_garantia')->default(0)->nullable();
            $table->integer('id_color')->nullable();
            $table->smallInteger('prioridad')->nullable();
            $table->boolean('tiene_diagnostico')->default(0)->nullable();
            $table->dateTime('fecha_diagnostico')->nullable();
            $table->boolean('tiene_prestamo')->default(0)->nullable();
            $table->integer('id_etapa')->default(0)->nullable();
            $table->boolean('tiene_calidad')->default(0)->nullable();
            $table->smallInteger('presupuesto_aprobado')->nullable();
            $table->smallInteger('equipo_activo')->default(1)->nullable();
            $table->char('tipo_garantia', 1)->nullable();
            $table->dateTime('fecha_entrega')->nullable();
            $table->boolean('bounce')->default(0)->nullable();
            $table->boolean('bounce_valido')->default(0)->nullable();
            $table->integer('id_grupo_trabajo')->nullable();
            $table->string('codigo_vid', 30)->nullable();
            $table->integer('id_usuario')->nullable();
            $table->integer('bounce_id')->nullable();
            $table->integer('id_usuario_entrega')->nullable();
            $table->integer('escalamiento_id')->default(0)->nullable();
            $table->dateTime('f_escalamiento1')->nullable();
            $table->dateTime('f_escalamiento2')->nullable();
            $table->dateTime('f_escalamiento3')->nullable();
            $table->dateTime('f_escalamiento4')->nullable();
            $table->dateTime('f_escalamiento5')->nullable();
            $table->integer('tiempo_resolucion')->nullable();
            $table->decimal('tiempo_consumido', 8, 2)->nullable();
            $table->integer('tiene_doa')->default(0)->nullable();
            $table->integer('id_sucursal_original')->default(0)->nullable();
            $table->string('codigo_imagen', 50)->nullable();
            $table->integer('id_estado_reparacion')->nullable();
            $table->string('entrega_obs', 200)->nullable();
            $table->string('entrega_retira', 200)->nullable();
            $table->string('entrega_ref_pago', 100)->nullable();
            $table->integer('entrega_monto_pago')->nullable();
            $table->string('cedula_retira', 20)->nullable();
            $table->integer('imei_int_ext')->nullable();
            $table->string('imei_salida', 20)->nullable();
            $table->integer('id_usuario_cancelacion')->nullable();
            $table->dateTime('fecha_cancelacion')->nullable();
            $table->dateTime('presupuesto_fecha_aprobado')->nullable();
            $table->integer('presupuesto_id_usuario_aprobado')->nullable();
            $table->string('presupuesto_accion', 30)->nullable();
            $table->integer('id_case')->nullable();
            $table->dateTime('msn_fecha')->nullable();
            $table->string('tipo_msn_fecha', 10)->nullable();
            $table->boolean('revisado_administracion_tecnica')->nullable();
            $table->integer('id_tecnico_calidad')->nullable();
            $table->integer('ultimo_estado_anterior')->nullable();
            $table->integer('descuento')->nullable();
            $table->string('pajarera_pos', 20)->nullable();
            $table->integer('captura_asignacion')->nullable();
            $table->integer('captura_reasignacion')->nullable();
            $table->integer('bounce_interno')->nullable();
            $table->string('bounce_comentario', 200)->nullable();
            $table->boolean('esBackClaro')->nullable();
            $table->decimal('CostoTotal_Back', 18, 0)->nullable();
            $table->string('BoletaSAP_Back', 50)->nullable();
            $table->decimal('CostoSubsidiado_back', 18, 0)->nullable();
            $table->integer('id_marca_back')->nullable();
            $table->integer('id_modelo_back')->nullable();
            $table->string('imei_back', 50)->nullable();
            $table->string('msn_back', 50)->nullable();
            $table->integer('estado_back')->nullable();
            $table->string('comentario_reparacion_back', 250)->nullable();
            $table->boolean('Cliente_Aprobo_presupuesto')->nullable();
            $table->integer('id_usuario_aprobo_presupuesto')->nullable();
            $table->boolean('recepcion_calidad')->nullable();
            $table->integer('id_calidad_motivo')->nullable();
            $table->string('calidad_comentario', 200)->nullable();
            $table->integer('en_sucursal')->nullable();
            $table->string('part_number', 50)->nullable();
            $table->string('id_one', 50)->nullable();
            $table->string('observacion_aprobacion', 250)->nullable();
            $table->string('gd_cencosud', 100)->nullable();
            $table->decimal('monto_reparacion_sub', 19, 0)->nullable();

            // Definición de llaves foráneas
            $table->foreign('id_calidad_motivo')->references('id_calidad_motivo')->on('TA_CALIDAD_MOTIVO');
            $table->foreign('id_cliente')->references('id_cliente')->on('TA_CLIENTES');
            $table->foreign('id_sucursal')->references('id_sucursal')->on('TA_SUCURSAL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ta_equipos');
    }
}
