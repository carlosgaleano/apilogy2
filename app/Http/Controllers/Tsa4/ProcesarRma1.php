<?php

namespace App\Http\Controllers\Tsa4;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rma;

class ProcesarRma1 extends Controller
{
   public function procesar(Request $request){

    $data=$request->all();
    $id_rma=$data['id_rma'];
    $rma=Rma::where('rma_id','=',$id_rma)->first();

    return response()->json([
        'message' => 'Procesar RMA1',
         'data'=>$rma
    ], 200);
}
}
