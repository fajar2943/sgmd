<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vouchers(){
        return $this->hasMany(Voucher::class);
    }
}
