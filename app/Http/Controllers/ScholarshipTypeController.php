<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship_type;
use DB;

class ScholarshipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $scholartype = DB::table('scholarships_type')->select()->get();
            if($scholartype->count() > 0){
                return $scholartype;
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
            $scholarshiptype = new Scholarship_type;
            $scholarshiptype->scholarship_type = $request->input('scholarship_type');
            //$return = DB::table('scholarships_type')->insert(['scholarship_type' => $scholarshiptype->scholarship_type]);
            if($scholarshiptype->save()){
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
        try {
            
            $scholarshiptype = Scholarship_type::findOrFail($id);
            if($scholarshiptype->count() > 0){
                $scholarshiptype->scholarship_type = $request->input('scholarship_type');
                $return = DB::table('scholarships_type')->where('id', $id)->update(['scholarship_type' => $scholarshiptype->scholarship_type]);
                if($return){
                    return 'Se actualizo correctamente';
                }
            }
            return 'No hay registro de ese id';
        } catch (Exception $e) {
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
        try {
            $scholarshiptype = Scholarship_type::findOrFail($id);
            if($scholarshiptype->count() > 0){
                $return = DB::table('scholarships_type')->where('id', '=', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                } 
            }               
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
