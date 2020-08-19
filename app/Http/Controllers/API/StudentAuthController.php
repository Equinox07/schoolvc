<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if ($token = Auth::guard('student')->attempt($credentials)) {

            $user = $request->user('student');

        return response()->json(['success' => true,'message' => "Login Successful",'user' => $user , 'token' => $token]);
        }
        return response()->json(['error' => 'Please Check Credentials and Try Again...'], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        return response()->json(Auth::guard('student')->user());
    }
}
