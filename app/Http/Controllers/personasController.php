<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\personas;
class personasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic', ['only'=>['store','update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showAll()
    {
    
    }



    public function index()
    {
       // return "Mostrando la lista de pesonas";

        // return personas::All();

        return response()->json(['datos'=>personas::All()]);


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Mostrando menu para craer una persona";


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->get('nombre') || !$request->get('apellido') || !$request->get('rut') || !$request->get('fecha'))
        {
          return response()->json(['mensaje'=>'Datos invalidos o incompletos']);
        }
        
        personas::create($request->all());
        return response()->json(['mensaje'=>'La persona ha sido creada']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "Mostrando persona con id $id";

        $persona=personas::find($id);
        if (!$persona){
             return response(['mensaje'=>'No se encuentra la persona en la BD']);
        }
        return response(['datos'=>$persona]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Mostrando formulario para editar personas";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $metodo=$request->method();
        $personas=personas::find($id);
        if($metodo==="PATCH")
        {
            $nombre=$request->get('nombre');
            if($nombre!=null && $nombre!=''){
                $personas->nombre=$nombre;
            }
            $apellido=$request->get('apellido');
            if($apellido!=null && $apellido!=''){
                $personas->apellido=$apellido;
            // return "EStoy en PATCH";
            }
            $rut=$request->get('rut');
            if($rut!=null && $rut!=''){
                $personas->rut=$rut;
            // return "EStoy en PATCH";
            }
            $fecha=$request->get('fecha');
            if($fecha!=null && $fecha!=''){
                $personas->fecha=$fecha;
            // return "EStoy en PATCH";
            }
            $personas->save();
            return "Registro editado con PATCH";
        }
            
            $nombre=$request->get('nombre');
            $apellido=$request->get('apellido');
            $rut=$request->get('rut');
            $fecha=$request->get('fecha');
            if(!$nombre || !$apellido || !$rut || !$fecha)
            {
                return "error";
            }
        
            $personas->nombre=$nombre;
            $personas->apellido=$apellido;
            $personas->rut=$rut;
            $personas->fecha=$fecha;
            $personas->save();

            return "Grabado con PUT correctamente :)";
        // return "Mostrando formulario para actualizar personas";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personas=personas::find($id);
        if(!$personas)
        {
            return response()->json(['mensaje'=>'La persona nose encuentra en la Base de datos']);
        }
        $personas->delete();
        return response()->json(['mensaje'=>'Se ha eliminado el registro']);

        // return "Mostrando formulario para eliminar personas";
    }
}
