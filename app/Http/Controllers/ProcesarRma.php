<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rma;
use App\Models\rmas_state;
use App\Models\ta_equipos;



class ProcesarRma extends Controller
{

    //
    //
    public function procesar(Request $request)
    {

        $data = $request->all();
        $id_rma = $data['id_rma'];
        $rma = Rma::where('id', '=', $id_rma)->first();

        $estado = rmas_state::where('rma_id', '=', $id_rma)->first();

        if ($estado->id_state == 1) {
            $estado->id_state = 1;
            $estado->state = 'En proceso';
            $estado->update();
        }

        $equipo = ta_equipos::where('id_imei', '=', $rma->incomingUnitSerialNumber)->first();

        if (!$equipo) {

            $newEquipo = ta_equipos::create([

                'id_imei' => $rma->incomingUnitSerialNumber,

            ]);
        } else {

            $equipo->id_imei = $rma->incomingUnitSerialNumber;
            $equipo->update();
        }








        return response()->json([
            'message' => 'Procesar RMA2',
            'data' => $rma,
            'estado' => $estado
        ], 200);
    }
}
