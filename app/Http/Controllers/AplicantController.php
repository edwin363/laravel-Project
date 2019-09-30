<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use DB;
class AplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $applicant = DB::table('applicants')->select()->get();
            if($applicant->count() > 0){
                return $applicant;
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
            $applicant = new Applicant;
            $applicant->profile_id = $request->input('profile_id');
            $applicant->state = $request->input('state');
            $applicant->scholarship_id = $request->input('scholarship_id');
            if($applicant->save()){
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
            $applicant = Applicant::findOrFAil($id);
            $applicant->profile_id = $request->input('profile_id');
            $applicant->state = $request->input('state');
            $applicant->scholarship_id = $request->input('scholarship_id');
            $return = DB::table('applicants')->where('id',$id)->update([
                'profile_id' => $applicant->profile_id,
                'state' => $applicant->state,
                'scholarship_id' => $applicant->scholarship_id
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
            $applicant = Home::findOrFail($id);
            $return = DB::table('applicants')->where('id', '=', $id)->delete();
            if($return){
                return 'Eliminado correctamente';
            }
        }
        catch(Excepcion $e){
            return var_dump($e->getMessage());
        }
    }
}
