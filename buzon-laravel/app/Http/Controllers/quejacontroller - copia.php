<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cambiar;
use DB;

class quejacontroller extends Controller
{
    public function index()
    {
                $data = Cambiar::where('estatus','=',1)->get();
        $quejas = [];
        foreach($data as $key => $value){
           $quejas[$key] = [
                'id'=>$value['id'],
                'Nombrecompleto'=>$value['Nombrecompleto'],
                'Telefono'=>$value['Telefono'],
                'Correo '=>$value['Correo '],
                'Queja'=>$value['Queja'],
                'Departamento'=>$value['Departamento'],
                'estatus'=>$value['estatus'],
            ];
        }
        return response()->json($quejas);
    }

    public function store(Request $request)
    {
        //
        $datos = $request->all();
        DB::beginTransaction();
        try {
            
            $quejas = new Cambiar();
            $quejas->Nombrecompleto =  $datos['Nombrecompleto'];
            $quejas->Telefono =  $datos['Telefono'];
            $quejas->Correo =  $datos['Correo'];
            $quejas->Queja =  $datos['Queja'];
            $quejas->Departamento =  $datos['Departamento'];
            $quejas->estatus=1;
            $quejas->save();

            DB::commit();
            return response()->json(array('success' => true));
        }catch (Exception $e) {
            DB::rollBack();
            return response()->json(array('success' => false));
        }
    }

    public function edit($id)
    {
        //
        $otraVar = cambiar::find($id);
        
        $masvar = [
            'id'=>$otraVar['id'],
            'Nombrecompleto'=>$otraVar['Nombrecompleto'],
            'Telefono'=>$otraVar['Telefono'],
            'Correo'=>$otraVar['Correo'],
            'Queja'=>$otraVar['Queja'],
            'Departamento'=>$otraVar['Departamento']
        ];
        return response()->json($masvar);        
    }

    public function update(Request $request, $id)
    {
        //
        $datos = $request->all();
        DB::beginTransaction();
        try {
            $quejas = cambiar::find($id);
            $quejas->Nombrecompleto =  $datos['Nombrecompleto'];
            $quejas->Telefono =  $datos['Telefono'];
            $quejas->Correo =  $datos['Correo'];
            $quejas->Queja =  $datos['Queja'];
            $quejas->Departamento =  $datos['Departamento'];
            $quejas->update();

            DB::commit();
            return response()->json(array('success' => true));
        }catch (Exception $e) {
            DB::rollBack();
            return response()->json(array('success' => false));
        }

    }

    public function destroy($id)
    {
        
        $quejas = Cambiar::find($id);
        $quejas->estatus=0;
        $quejas->update();
        return response()->json(array('success' => true));
    }
}
