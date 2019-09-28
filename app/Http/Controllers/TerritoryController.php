<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Territory;
use DB;

class TerritoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $territories = DB::table('territories')->select()->get();
            if($territories->count() > 0){
                return $territories;
            }
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
            $territory = new Territory;
            $territory->territory = $request->input('territory');
            if($territory->save()){
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
            $territory = Territory::findOrFail($id);
            if($territory->count() > 0){
                $territory->territory = $request->input('territory');
                $return = DB::table('territories')->where('id', $id)->update(['territory' => $territory->territory]);
                if($return){
                    return 'Se actualizo correctamente';
                }
            }
            return 'No hay registro de ese id ' + $id;
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
            $territory = Territory::findOrFail($id);
            if($territory->count() > 0){
                $return = DB::table('territories')->where('id', '=', $id)->delete();
                if($return){
                    return 'Se elimino correctamente';
                }
            }
            return 'No hay registro con ese id ' + $id;
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }
}
