<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public $student, $voucher;
    public function __construct(Student $student, Voucher $voucher)
    {
        $this->student = $student;
        $this->voucher = $voucher;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = $this->student::all();
        return response()->json($student);
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
        $data = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required' ,
            'mobile' => 'required|min:10' ,
        ]);
        if ($data->fails()) {
            return response()->json(['error' => $data->errors()], 401);
        }

        $data = $request->all();

        $data['password'] = Hash::make(123456);
        $data['slug'] = Str::slug($request->firstname.' '.$request->lastname);
        $student = $this->student::create($data);
        $response['token'] = $token = JWTAuth::fromUser($student);


        $student->vouchers()->attach($request->voucher_id);
        $student->details()->create(['school_id' => $request->school_id]);
        $this->voucher::find($request->voucher_id)->update(['sold_out' => 1]);


        return response()->json($response);

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
        //
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
}
