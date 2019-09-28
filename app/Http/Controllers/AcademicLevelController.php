<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Academic_level;
use DB;

class AcademicLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $academic = DB::table('academic_levels')->select()->get();
            if($academic->count() > 0){
                return $academic;
            }
        }
        catch(Exception $e){
            return 'No hay registros para mostrar';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->all();
            $academic = new Academic_level;
            $academic->academic_level = $request->input('academic_level');
            if($academic->save()){
                return 'Se guardo correctamente';
            }
        }
        catch(Exception $e){
            return var_dump($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        try{
            $academic = Academic_level::findOrFail($id);
            $academic->academic_level = $request->input('academic_level');
            $return = DB::table('academic_levels')->where('id', $id)->update(['academic_level' => $academic->academic_level]);
            if($return){
                return 'Actualizado correctamente';
            }
        }
        catch(Exception $e){
            return var_dump($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{            
            $academic = Academic_level::findOrFail($id);
            $return = DB::table('academic_levels')->where('id', '=', $id)->delete();
            if($return){
                return 'Eliminado correctamente';
            }
        }
        catch(Exception $e){
            return var_dump($e->getMessage());
        }
    }
}
