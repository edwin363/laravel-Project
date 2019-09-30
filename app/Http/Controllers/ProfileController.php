<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use DB;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $profile = DB::table('profiles')->select()->get();
            if($profile->count() > 0){
                return $profile;
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
            $profile = new Profile;
            $profile->names = $request->input('names');
            $profile->sumames = $request->input('sumames');
            $profile->user_id = $request->input('user_id');
            $profile->repository_id = $request->input('repository_id'); 
            if($profile->save()){
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
            $profile = Profile::findOrFAil($id);
            $profile->names = $request->input('names');
            $profile->sumames = $request->input('sumames');
            $profile->user_id = $request->input('user_id');
            $profile->repository_id = $request->input('repository_id'); 
            $return = DB::table('profiles')->where('id',$id)->update([
                'names' => $profile->names,
                'sumames' => $profile->sumames,
                'user_id' => $profile->user_id,
                'repository_id' => $profile->repository_id
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
            $profile = Profile::findOrFail($id);
            $return = DB::table('profiles')->where('id', '=', $id)->delete();
            if($return){
                return 'Eliminado correctamente';
            }
        }
        catch(Excepcion $e){
            return var_dump($e->getMessage());
        }
    }
}
