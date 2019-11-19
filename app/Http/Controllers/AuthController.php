<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Mail;

class AuthController extends Controller
{

    use VerifiesEmails;

    public function signup(Request $request)
    {        
        $request->validate([
            'user'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'role_id'  => 'required|int',
            'password' => 'required|string|confirmed'
        ]);

        
        $user = new User;                           
        $user->user = $request->user;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        
        if($user->save()){
            Mail::send('mails.email', ['user' => $user], function ($m) use ($user){
                $m->from('fedwin363@gmail.com', 'Becatel');
                $m->to('from@example.com', $user->id)->subject('Verificacion de e-mail');
            });
            return response()->json([
                'message' => 'Successfully created user, Please confirm yourself your email'
            ], 201);
        }

        return response()->json([
            'message' => 'Error! to save in AuthController'
        ], 404);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean'
        ]);
        
        $credentials = ['email', 'password'];
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        if($user->email_verified_at !== null){
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            
            if($request->remember_me){
                $token->expires_at = Carbon::now()->addWeeks(1);
            }

            $token->save();

            return response()->json([
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);
        }
        return response()->json([
            'message' => 'Please Verify Email'
        ], 401);
        
    }

    public function logout(Resquest $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
