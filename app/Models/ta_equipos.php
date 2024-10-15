<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ta_equipos extends Model
{
    use HasFactory;

    protected $table = 'ta_equipos';  // Nombre de la tabla

    protected $primaryKey = 'id_equipo';
    // Indicar si no estás usando timestamps automáticos
    public $timestamps = false;


    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'id_cliente',
        'id_persona',
        'numero_ot',
        'id_origen_ot',
        'fecha_inicio_ot',
        'fecha_termino_ot',
        'id_imei',
        'numero_pcs',
        'id_marca',
        'id_modelo',
        'id_garantia',
        'fch_fabricacion',
        'fch_activacion',
        'id_check_list_ini',
        'id_check_list_fin',
        'glosa_cliente',
        'fecha_ingreso',
        'codigo_equipo',
        'id_sucursal',
        'presupuesto_preaprobado',
        'color',
        'msn',
        'observacion',
        'id_contrato',
        'glosa_tecnico',
        'id_tecnico',
        'ultimo_estado',
        'ref_compra',
        'meses_garantia',
        'glosa_falla',
        'pierde_garantia',
        'id_color',
        'prioridad',
        'tiene_diagnostico',
        'fecha_diagnostico',
        'tiene_prestamo',
        'id_etapa',
        'tiene_calidad',
        'presupuesto_aprobado',
        'equipo_activo',
        'tipo_garantia',
        'fecha_entrega',
        'bounce',
        'bounce_valido',
        'id_grupo_trabajo',
        'codigo_vid',
        'id_usuario',
        'bounce_id',
        'id_usuario_entrega',
        'escalamiento_id',
        'f_escalamiento1',
        'f_escalamiento2',
        'f_escalamiento3',
        'f_escalamiento4',
        'f_escalamiento5',
        'tiempo_resolucion',
        'tiempo_consumido',
        'tiene_doa',
        'id_sucursal_original',
        'codigo_imagen',
        'id_estado_reparacion',
        'entrega_obs',
        'entrega_retira',
        'entrega_ref_pago',
        'entrega_monto_pago',
        'cedula_retira',
        'imei_int_ext',
        'imei_salida',
        'id_usuario_cancelacion',
        'fecha_cancelacion',
        'presupuesto_fecha_aprobado',
        'presupuesto_id_usuario_aprobado',
        'presupuesto_accion',
        'id_case',
        'msn_fecha',
        'tipo_msn_fecha',
        'revisado_administracion_tecnica',
        'id_tecnico_calidad',
        'ultimo_estado_anterior',
        'descuento',
        'pajarera_pos',
        'captura_asignacion',
        'captura_reasignacion',
        'bounce_interno',
        'bounce_comentario',
        'esBackClaro',
        'CostoTotal_Back',
        'BoletaSAP_Back',
        'CostoSubsidiado_back',
        'id_marca_back',
        'id_modelo_back',
        'imei_back',
        'msn_back',
        'estado_back',
        'comentario_reparacion_back',
        'Cliente_Aprobo_presupuesto',
        'id_usuario_aprobo_presupuesto',
        'recepcion_calidad',
        'id_calidad_motivo',
        'calidad_comentario',
        'en_sucursal',
        'part_number',
        'id_one',
        'observacion_aprobacion',
        'gd_cencosud',
        'monto_reparacion_sub',
    ];

    // Definir las relaciones con otras tablas, si las tienes
   /*  public function calidadMotivo()
    {
        return $this->belongsTo(TACalidadMotivo::class, 'id_calidad_motivo');
    }

    public function cliente()
    {
        return $this->belongsTo(TACliente::class, 'id_cliente');
    }

    public function sucursal()
    {
        return $this->belongsTo(TASucursal::class, 'id_sucursal');
    } */
}
