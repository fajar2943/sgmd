<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function import(){
        return $this->belongsTo(Import::class);
    }
}
