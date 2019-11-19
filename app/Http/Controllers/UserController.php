<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
// Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Role;
use DB;
use Mail;
use DateTime;

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
            $pass = $request->input('password');
            $user = DB::table('users')->select('user', 'password', 'email_verified_at')->where('user', $us)->get();      
            if(Hash::check($pass, $user[0]->password) && $user[0]->email_verified_at != null){
                $rolId = DB::table('users')->where('user', $us)->value('role_id');
                if($rolId != 0){
                    $rol = DB::table('roles')->where('id', $rolId)->value('name');
                    return $rol;
                }
            }
            return 'No existe el usuario';
        } catch (Exception $e) {
            return var_dump($e->getMessage());
        }
    }

    public function getUserId($us){
        try {
            $user = DB::table('users')->where('user', $us)->get();
            return $user[0]->id;
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
                    Mail::send('mails.email', ['user' => $user], function ($m) use ($user){
                    $m->from('fedwin363@gmail.com', 'Becatel');
                    $m->to($user->email, $user->id)->subject('Verificacion de e-mail');
                });
                return 'Se envio un email a tu correo, verificalo para poder ingresarl al sitio';              
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
            $user = User::findOrFile($id);
            if($user->count() > 0){
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

    public function timeDate(Request $request)
    {   
        $request->all();
        $id = $request->input('id');
        $users = User::findOrFail($id);                                   
        if($users->count() > 0){
            $rol = DB::table('roles')->where('id', $users->role_id)->value('name');
            $state = ($rol == 'becario') ? "en proceso":"activo";
            $dt = new DateTime();
            $dt->format('Y-m-d H:i:s');
            $users->email_verified_at = $dt;
            $users->state = $state;
            $return = DB::table('users')->where('id', $id)->update([
                'email_verified_at' => $users->email_verified_at,
                'state' => $users->state
            ]);
            if($return){
                return $rol;
            }            
        }
        return 'No hay registros con ese id ' + $id;        
    }

    public function getUsersInProcess()
    {
        try
        {
            $users = DB::table('users')->select('id', 'user', 'email', 'state')->where('state', 'en proceso')->get();
            if($users->count() > 0){
                return $users;
            }
            return 'no hay registros en proceso';
        }
        catch(Exeption $e)
        {
            return var_dump($e->getMessage());
        }
    }

    public function acceptUser(Request $request)
    {
        try {
            $request->all();
            $id = $request->input('id');
            $users = User::findOrFail($id);
            $users->state = 'activo';
            if($users->count() > 0){
                $return = DB::table('users')->where('id', $id)->update([
                    'state' => $users->state
                ]);
                if($return){
                    return 'becario aceptado';
                }    
            }
            return 'NO hay usuario con ese id ' + $id;
        } catch (Exeption $e) {
            return var_dump($e->getMessage());
        }
    }
}
