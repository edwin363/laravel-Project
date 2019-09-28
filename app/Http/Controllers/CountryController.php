<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $countries = DB::table('countries')->select()->get();
            if($countries->count() > 0){
                return $countries;
            }
            return 'No hay registros para mostrar';
        } catch (Exception $e) {
            return var_dump($e->getMessage());
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
        try {
            $request->all();
            $country = new Country;
            $country->country = $request->input('country');
            if($country->save()){
                return 'Se guardo correctamente';
            }
            return 'Problema al guardar';
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
            $country = Country::findOrFail($id);
            if($country->count() > 0){
                $return  = DB::table('countries')->where('id', $id)->update();
                if($return){
                    return 'Se actualizo correctamente';
                }
            } 
            return 'No se encotro registro con ese id ' + $id;
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
            $country = Country::findOrFail($id);
            if($country->count() > 0){
                $return = DB::table('countries')->where('id', '=', $id)->delete();
                if($return){
                    return 'Se elimino correctamente';
                }
            }
            return 'No hay registros con ese id ' + $id; 
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
