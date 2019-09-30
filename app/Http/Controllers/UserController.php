<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Role;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $users = DB::table('users')->select()->get();
            if($users->count() > 0){
                return $users;
            }
            return 'No hay registros para mostrar';
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request){
        try {
            $request->all();
            $us = $request->input('user');

            /*$name = $request->input('user');
            $user = User::where('user', $name)->get();
            $id = $user[0]->id;
            $role = UserRole::where('user_id', $id)->get();
            $iduserType = $role[0]['role_id'];
            $userType = Role::findOrFail($iduserType); 
            return $userType->name;*/
            $rolId = DB::table('users')->where('user', $us)->value('role_id');
            if($rolId != 0){
                $rol = DB::table('roles')->where('id', $rolId)->value('name');
                return $rol;
            }
            return "Error no se encontro el rol";          
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
            $user = new User;
            $user->user = $request->input('user');
            $user->email = $request->input('email');
            $user->role_id = $request->input('role_id');
            $user->password = bcrypt($request->input('password'));            
            if($user->save()){
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
        try{
            $country = User::findOrFile($id);
            if($country->count() > 0){
                $user->title = $request->input('title');
                $user->user = $request->input('user');
                $user->state = $request->input('state');
                $user->password = $request->input('password');
                $user->user_type_id = $request->input('user_type_id');
                $return = DB::table('users')->where('id', $id)->update([
                    'title' => $user->title,
                    'user' => $user->user,
                    'state' => $user->state,
                    'password' => $user->password,
                    'user_type_id' => $user->user_type_id
                ]);
                if($return){
                    return 'Se actualizo correctamente';
                }
            }
            return 'No se encontro registro con ese id ' + $id;
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
            $user = User::findOrFail($id);
            if($user->count() > 0){
                $return = DB::table('users')->where('id', '=', $id)->delete();
                if($return){
                    return 'Se elimino correctamente';
                }
            }
            return 'No hay registros con ese id ' + $id;
        }
        catch(Exception $e){
            return var_dump($e->getMessage());
        }
    }
}
