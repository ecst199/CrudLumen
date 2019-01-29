<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception;
use App\Persona;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersonaController extends Controller
{

    function get(Request $data)
    {
       $id = $data['id'];
       if ($id == null) {
          return response()->json(Persona::get(),200);
       } else {
          return response()->json(Persona::findOrFail($id),200);
       }
    }
    function paginate(Request $data)
    {
       $size = $data['size'];
       return response()->json(Persona::paginate($size),200);
    }
    function post(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $persona = Persona::create([
             'nombre'=>$result['nombre'],             
             'estado'=>$result['estado'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($persona,200);
    }
    function put(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $persona = Persona::where('id',$result['id'])->update([
             'nombre'=>$result['nombre'],
             'estado'=>$result['estado'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($persona,200);
    }
    function delete(Request $data)
    {
       $result = $data->json()->all();
       $id = $result['id'];
       return Persona::destroy($id);
    }
    function sp()
    {
       return "Hola";
    }
}