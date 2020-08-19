<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {

        $data = validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        if ($data->fails()) {
            return response()->json(['error' => $data->errors()], 401);
        }
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_no' => $request->input('phone_no'),
            'digital_address' => $request->input('digital_address'),
            'location' => $request->input('location'),
            'password' => Hash::make($request->input('password'), ),
        ]);
        
        $response['token'] = $token = JWTAuth::fromUser($user);

        return response()->json(['success' => true, 'message' => 'Registration Successfull', 'user' => $user, 'token' => $token,], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if ($token = Auth::attempt($credentials)) {

        return response()->json(['success' => true,'message' => "Login Successful",'user' => Auth::user(), 'token' => $token]);
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
        return response()->json(Auth()->User());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        if (!$user = Auth()->setRequest($request)->user())
        { return response()->json(['success' => false, 'message' =>  'Unauthorized' ]); }

        Auth()->logout();

        return response()->json(['success' => true,'message' => 'Successfully logged out']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request): Response
    {
        return $this->sendResetLinkEmail($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param 
     * @return \Illuminate\Http\Response
     */
    protected function sendResetLinkResponse($response): Response
    {
        return $this->response-array(['message'=>'password reset email sent']);
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param
    * @return \Illuminate\Http\Response
     */
    protected function sendResetLinkFailedResponse(Request $request, $response): Response
    {
        return $this->response->errorInternal('Email could not be sent to this email address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }
}