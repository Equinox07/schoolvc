<?php

namespace App\Http\Controllers\API;

use Keygen\Keygen;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenerateVoucherContoller extends Controller
{
    public $voucher;
    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }
    public function generateVoucher()
    {
        $splitStrings = function ($key) {
            return \join('-', str_split($key, 4));
        };

        $strToUpper = function ($key) {
            return \strtoupper($key);
        };

        do {
            $codeGen = Keygen::alphanum(16)->generate($splitStrings, $strToUpper);
        } while (Voucher::where("voucher_code", $codeGen)->count() > 0);


        $voucher = $this->voucher::create([
            'serial_no' => Str::uuid(),
            'voucher_code' => $codeGen
        ]);

        return response()->json($voucher);

    }
}
