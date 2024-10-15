<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rma;
use App\Models\rmas_state;
use App\Models\ta_equipos;
use App\Models\DmEquipoModelo;



class ProcesarRma extends Controller
{

    //
    //
    public function procesar(Request $request)
    {

        $data = $request->all();
        $id_rma = $data['id_rma'];
        $rma = Rma::where('id', '=', $id_rma)->first();

        $rmas = rmas_state::from('rmas_states as rs1')
            ->join('rmas as r', 'r.id', '=', 'rs1.rma_id')
            ->select('r.*', 'rs1.*')
            ->get();

        $rmas = Rma::with('DmEquipoModelo','rmas_state')
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

           // var_dump($equipo);

            if (!$equipo) {

                $newEquipo = ta_equipos::create([

                    'id_imei' => $rma->incomingUnitSerialNumber,

                ]);
            } else {

               // $equipo->id_imei = $rma->incomingUnitSerialNumber;
                $equipo->id_modelo = $modeloRma[0]->id_modelo;
                $equipo->id_marca = $modeloRma[0]->id_marca;
                $equipo->update();
            }







            return response()->json([
                'message' => 'Procesar RMA2',
                'data' => $rma,
                'estado' => $estado,
                'consulta' => $rmas,

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
