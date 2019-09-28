<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repository;
use DB;

class RepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $repositories = DB::table('repositories')->select()->get();
            if($repositories->count() > 0){
                return $repositories;
            }
            return 'No se han encontrado registros';
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
            $repository = new Repository;
            $repository->paes = $request->input('paes');
            $repository->title_high_school = $request->input('title_high_school');
            $repository->title_academic = $request->input('title_academic');
            if($repository->save()){
                return 'Se guardo correctamente';
            }
            return 'Error al guardar';
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
            $repository = Repository::findOrFail($id);
            if($repository->count() > 0){
                $repository->paes = $request->input('paes');
                $repository->title_high_school = $request->input('title_high_school');
                $repository->title_academic = $request->input('title_academic');
                $return = DB::table('repositories')->where('id', $id)->update([
                    'paes' => $repository->paes,
                    'title_high_school' => $repository->title_high_school,
                    'title_academic' => $repository->title_academic
                ]);
                if($return){
                    return 'Se actializo correctamente';
                }
            }
            return 'Se actualizo correctamente';
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
            $repository = Repository::findOrFail($id);
            if($repository->count() > 0){
                $return = DB::table('repositories')->where('id', '=', $id)->delete();
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
