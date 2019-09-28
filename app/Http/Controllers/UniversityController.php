<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use DB;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $universities = DB::table('universities')->select()->get();
            if($universities->count() > 0){
                return $universities;
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }

    public function universityByCountryId(Request $request, $id){
        $request->all();
        $universities = DB::table('universities')->where('country_id', $id)->get();
        return $universities;
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
            $university = new University;
            $university->university = $request->input('university');
            $university->country_id = $request->input('country_id');
            if($university->save()){
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
            $university = University::findOrFail($id);
            if($university->count() > 0){
                $university->university = $request->input('university');
                $university->country = $request->input('country_id');
                $return = DB::table('universities')->where('id', $id)->update([
                    'university' => $university->university,
                    'country_id' => $university->country
                ]);
                if($return){
                    return 'Actualizado correctamente';
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
            $university = University::findOrFail($id);
            if($university->count() > 0){
                $return = DB::table(universities)->where('id', '=', $id)->delete();
                if($return){
                    return 'Eliminado correctamente';
                }
            }
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
