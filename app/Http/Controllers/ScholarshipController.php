<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use DB;
class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $scholarship = DB::table('scholarships')->select()->get();
            if($scholarship->count() > 0){
                return $scholarship;
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
            $scholarship = new Scholarship;
            $scholarship->title = $request->input('title');
            $scholarship->requirements_id = $request->input('requirements_id');
            $scholarship->scholarship_detail_id = $request->input('scholarship_detail_id');
            $scholarship->state = $request->input('state');
            $scholarship->quotas = $request->input('quotas');
            $scholarship->scholar_id = $request->input('scholar_id');
            if($scholarship->save()){
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
            $scholarship = Scholarship::findOrFAil($id);
            $scholarship->title = $request->input('title');
            $scholarship->requirements_id = $request->input('requirements_id');
            $scholarship->scholarship_detail_id = $request->input('scholarship_detail_id');
            $scholarship->state = $request->input('state');
            $scholarship->quotas = $request->input('quotas');
            $scholarship->scholar_id = $request->input('scholar_id');
            $return = DB::table('scholarships')->where('id',$id)->update([
                'title' => $scholarship->title,
                'requirements_id' => $scholarship->requirements_id,
                'scholarship_detail_id' => $scholarship->scholarship_detail_id,
                'state' => $scholarship->state,
                'quotas' => $scholarship->quotas,
                'scholar_id' => $scholarship->scholar_id
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
            $scholarship = Scholarship::findOrFail($id);
            $return = DB::table('scholarships')->where('id', '=', $id)->delete();
            if($return){
                return 'Eliminado correctamente';
            }
        }
        catch(Excepcion $e){
            return var_dump($e->getMessage());
        }
    }
}
