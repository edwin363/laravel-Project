<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requirement;
use DB;
class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $requirement = DB::table('requirements')->select()->get();
            if($requirement->count() > 0){
                return $requirement;
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
        //
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
            $requirement = new Requirement;
            $requirement->academic_level_id = $request->input('academic_level_id');
            $requirement->paes_note = $request->input('paes_note');
            if($requirement->save()){
                $id = $requirement->id;
                return $id;
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
        //
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
            $requirement = Requirement::findOrFAil($id);
            $requirement->academic_level_id = $request->input('academic_level_id');
            $requirement->paes_note = $request->input('paes_note');
            $return = DB::table('requirements')->where('id',$id)->update([
                'academic_level_id' => $requirement->academic_level_id,
                'paes_note' => $requirement->paes_note
                ]);
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
            $requirement = Requirement::findOrFail($id);
            $return = DB::table('requirements')->where('id', '=', $id)->delete();
            if($return){
                return 'Eliminado correctamente';
            }
        }
        catch(Excepcion $e){
            return var_dump($e->getMessage());
        }
    }
}
