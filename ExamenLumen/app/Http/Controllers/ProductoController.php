<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception;
use App\Producto;
use App\Genero;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductoController extends Controller
{

    function get(Request $data)
    {
       $id = $data['id'];
       if ($id == null) {
          return response()->json(Genero::get(),200);
       } else {
          return response()->json(Genero::findOrFail($id),200);
       }
    }

    function post()
    {
   
        $dataForm = [
            'nombre'=>'Galletas',             
            'categoria'=>'Golosina',
        ];

        $genero = Genero::find(1);

        $insertProducto = $genero->productos()->create($dataForm);
        var_dump($insertProducto->nombre);

       
    }

    function traer()
    {
        $posts = Producto::has('generos')->get();
    }
    function ins(){
        try{
            DB::beginTransaction();            
            $producto = Producto::create([
               'nombre'=>'Galletas',             
               'categoria'=>'S2',
               'generos_id'=>1,
            ]);
            DB::commit();
         } catch (Exception $e) {
            return response()->json($e,400);
         }
         return response()->json($producto,200);
    }
    function inse(){
        try{
            DB::beginTransaction();            
            $genero = Genero::create([
               'ngen'=>'Masculino',        
            ]);
            DB::commit();
         } catch (Exception $e) {
            return response()->json($e,400);
         }
         return response()->json($genero,200);
    }
    
}