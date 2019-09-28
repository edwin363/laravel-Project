<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use DB;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $careers = DB::table('careers')->select()->get();
            if($careers->count() > 0){
                return $careers;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }

    public function careerByUniversityId(Request $request, $id){
        $request->all();
        $careers = DB::table('careers')->where('university_id', $id)->get();
        return $careers;
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
        try {
            $request->all();
            $careers = new Career;
            $careers->career = $request->input('career');
            $careers->university_id = $request->input('university_id');
            if($careers->save()){
                return 'Se guardo correctamente';
            }
        } catch (Exception $e) {
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
            $career = Career::findOrFail($id);
            if($career->count() > 0){
                $career->career = $request->input('career');
                $return = DB::table('careers')->where('id', $id)->update([
                    'career' => $career->career
                ]);
                if($return){
                    return 'Se actualizo correctamente';
                }
            }
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
            $career = Career::findOrFail($id);
            if($career->count() > 0){
                $return = DB::table('careers')->where('id', '=', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        } catch (\Throwable $th) {
            return var_dump($e->getMessage());
        }
    }
}
