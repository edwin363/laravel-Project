<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship_detail;
use DB;
class ScholarshipDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $scholarship_detail = DB::table('scholarships_detail')->select()->get();
            if($scholarship_detail->count() > 0){
                return $scholarship_detail;
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
            $scholarship_detail = new Scholarship_detail;
            $scholarship_detail->information = $request->input('information');
            $scholarship_detail->territory_id = $request->input('territory_id');
            $scholarship_detail->scholarship_type_id = $request->input('scholarship_type_id');
            $scholarship_detail->country_id = $request->input('country_id');
            $scholarship_detail->university_id = $request->input('university_id');
            $scholarship_detail->career_id = $request->input('career_id');
            if($scholarship_detail->save()){
                $id = $scholarship_detail->id;
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
            $scholarship_detail = Scholarship_detail::findOrFAil($id);
            $scholarship_detail->information = $request->input('information');
            $scholarship_detail->territory_id = $request->input('territory_id');
            $scholarship_detail->scholarship_type_id = $request->input('scholarship_type_id');
            $scholarship_detail->country_id = $request->input('country_id');
            $scholarship_detail->university_id = $request->input('university_id');
            $scholarship_detail->career_id = $request->input('career_id');
            $return = DB::table('scholarships_detail')->where('id',$id)->update([
                'information' => $scholarship_detail->information,
                'territory_id' => $scholarship_detail->territory_id,
                'scholarship_type_id' => $scholarship_detail->scholarship_type_id,
                'country_id' => $scholarship_detail->country_id,
                'university_id' => $scholarship_detail->university_id,
                'career_id' => $scholarship_detail->career_id,
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
            $scholarship_detail = Scholarship_detail::findOrFail($id);
            $return = DB::table('scholarships_detail')->where('id', '=', $id)->delete();
            if($return){
                return 'Eliminado correctamente';
            }
        }
        catch(Excepcion $e){
            return var_dump($e->getMessage());
        }
    }
}
