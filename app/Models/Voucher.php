<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';
    protected $fillable = ['serial_no', 'voucher_code', 'sold_out'];



    public function scopeNotSold($query)
    {
        return $query->where('sold_out', 0);
    }

    public function scopeSoldOut($query)
    {
        return $query->where('sold_out', 1);
    }
}
