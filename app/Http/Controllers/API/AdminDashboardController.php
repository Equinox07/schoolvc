<?php

namespace App\Http\Controllers\API;

use App\Models\Schools;
use App\Models\Student;
use App\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public $school, $voucher, $student;
    public function __construct(Schools $school, Voucher $voucher, Student $student)
    {
        $this->voucher = $voucher;
        $this->school = $school;
        $this->student = $student;
    }

    public function loadStats()
    {
        $schools = $this->school::all();
        $voucher = $this->voucher::all();
        $student = $this->student::all();
        $sold_out = $this->voucher->soldOut()->get();

        $data['schools']['data'] = $schools;
        $data['schools']['count'] = $schools->count();
        $data['voucher']['data'] = $voucher;
        $data['voucher']['count'] = $voucher->count();
        $data['student']['data'] = $student;
        $data['student']['count'] = $student->count();
        $data['sold_out']['data'] = $sold_out;
        $data['sold_out']['count'] = $sold_out->count();

        return response()->json($data, 200);
    }
}
