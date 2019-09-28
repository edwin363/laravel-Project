<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_type;
use DB;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $usertypes = DB::table('users_type')->select()->get();
            if($usertypes->count() > 0){
                return $usertypes;
            }
            return 'No se encuentran registros';
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
            $usertype = new User_type;
            $usertype->user_type = $request->input('user_type');
            if($usertype->save()){
                return 'Se guardo correctamente';
            }
            return 'A ocurrido un error al guardar';
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
            $territory = User_type::findOrFail($id);
            if($territory->count() > 0){
                $territory->user_type = $request->input('user_type');
                $return = DB::table('users_type')->where('id', $id)->update(['user_type' => $territory->user_type]);
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
            $usertype = User_type::findOrFail($id);
            if($usertype->count() > 0){
                $return = DB::table('users_type')->where('id', '=', $id)->delete();
                if($return){
                    return 'Se elimino correctamente';
                }
            }
            return 'No hay registro de ese id ' + $id;
        } catch (Exception $e) {
            return var_dump($e->getMessage());            
        }
    }
}
