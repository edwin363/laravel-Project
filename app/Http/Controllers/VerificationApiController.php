<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class VerificationApiController extends Controller
{
    use VerifiesEmails;

    public function show()
    {

    }

    public function verify(Request $request)
    {
        $id = $request['id'];
        $user = User::findOrFail($id);

        $date = date("Y-m-d g:i:s");
        $user->email_verified_at = $date;

        $user->save();

        return response()->json([
            'message' => 'Email verified!'
        ]);
    }

    public function resend(Request $request)
    {
        if($request->user()->hasVerifiedEmail()){
            return response()->json([
                'message' => 'User already have verified email!'
            ], 422);
        }
        $request->user()->sendEmailVerificationNotification();
        return response()->json([
            'message' => 'The notification has been resubmitted'
        ]);
    }
}
