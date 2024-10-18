<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rma;
use App\Models\rmas_state;
use App\Models\ta_equipos;
use App\Models\DmEquipoModelo;
use App\Models\BillToAddress;
use App\Models\DM_CIUDAD;
use App\Models\TA_PERSONAS;



class ProcesarRma extends Controller
{

    //
    //
    public function procesar(Request $request)
    {

        $data = $request->all();
        $id_rma = $data['id_rma'];
        $rma = Rma::where('id', '=', $id_rma)->first();

       /*  $rmas = rmas_state::from('rmas_states as rs1')
            ->join('rmas as r', 'r.id', '=', 'rs1.rma_id')
            ->select('r.*', 'rs1.*')
            ->get(); */

        $rmas = Rma::with('DmEquipoModelo','rmas_state','BillToAddress')
            ->where('id', '=', $id_rma)
            ->first();


        if ($rmas) {



            $estado = rmas_state::where('rma_id', '=', $id_rma)->first();
            $estado->id_state = 1;
            $estado->state = 'En proceso';
            $estado->update();


            $equipo = ta_equipos::where('id_imei', '=', $rma->incomingUnitSerialNumber)->first();

            $estadoRma =  json_decode($rmas->rmas_state);
            $modeloRma = json_decode($rmas->DmEquipoModelo);
            $rmas_data = json_decode($rmas);

          // var_dump($rmas_data->bill_to_address->city);


           $persona=TA_PERSONAS::where('id_rmas', '=', $id_rma)->first();

            if(!isset($persona->id_persona)){

                $ciudad = DM_CIUDAD::where('ciudad','=', $rmas_data->bill_to_address->city)->first();


                    $persona=TA_PERSONAS::CREATE([

                        'nombre'=>$rmas_data->bill_to_address->contact,
                        'id_ciudad'=>$ciudad->id_ciudad,
                        'telefono'=>$rmas_data->bill_to_address->phoneno,
                        'fecha_ingreso'=>date('Y-m-d H:i:s'),
                        'activo'=>1,
                        'direccion'=>$rmas_data->bill_to_address->address1,
                        'id_rmas'=>$rma->id,

                    ]);

            }



            if (!$equipo) {

                $newEquipo = ta_equipos::create([

                    'id_imei' => $rma->incomingUnitSerialNumber,

                ]);
            } else {

               // $equipo->id_imei = $rma->incomingUnitSerialNumber;
                $equipo->id_modelo = $modeloRma[0]->id_modelo;
                $equipo->id_marca = $modeloRma[0]->id_marca;
                $equipo->id_cliente=4;
                $equipo->numero_ot=0;
                $equipo->id_origen_ot=0;
                $equipo->id_persona=$persona->id_persona;

                $equipo->update();
            }







            return response()->json([
                'message' => 'Procesar RMA2',
                'data' => $rma,
                'estado' => $estado,
                'consulta' => $rmas,
                'ciudad' => $rmas_data->bill_to_address->city

            ], 200);
        } else {

            return response()->json([
                'message' => 'No se encontro el estado',
                'data' => null,
                'estado' => 201,
                'consulta' => null,

            ], 201);
        }
    }
}
