<?php

use App\Models\Booking;
use App\Models\Setting;
use App\Models\Voucher;

function rupiah($amount){
    return 'Rp '.number_format($amount, 0, ',', '.');
}
function tanggal($tanggal){
    return date('d M Y', strtotime($tanggal));
}
function tgltime($tanggal){
    return date('d M Y H:i', strtotime($tanggal));
}
function hari($start, $finish){
    $day = strtotime(date('Y-m-d', strtotime($finish))) - strtotime(date('Y-m-d', strtotime($start)));
    return ($day / 60 / 60 / 24) + 1;
}
function angka($amount){
    return number_format($amount, 0, ',', '.');
}
function page($currentPage, $lastPage){
    return view('layouts.partials._paginate', compact('currentPage', 'lastPage'));
}
function isRole($role){
    if(!auth()->user()){
        return false;
    }elseif(auth()->user()->role == $role){
        return true;
    }
    return false;
}
function checkPlan($name, $status){
    return Voucher::wherePlan($name)->whereStatus($status)->count();
}
function getSetting($name, $param){
    return Setting::whereName($name)->value($param);
}

function formatPhone($phone){
    // kadang ada penulisan no hp 0811 239 345
    $phone = str_replace(" ","",$phone);
    // kadang ada penulisan no hp (0274) 778787
    $phone = str_replace("(","",$phone);
    // kadang ada penulisan no hp (0274) 778787
    $phone = str_replace(")","",$phone);
    // kadang ada penulisan no hp 0811.239.345
    $phone = str_replace(".","",$phone);

    $hp = $phone;

    // cek apakah no hp mengandung karakter + dan 0-9
    if(!preg_match('/[^+0-9]/',trim($phone))){
        // cek apakah no hp karakter 1-3 adalah +62
        if(substr(trim($phone), 0, 3)=='+62'){
            // $hp = trim($phone);
            $hp = substr(trim($phone), 3);
        }
        // cek apakah no hp karakter 1-2 adalah 62
        elseif(substr(trim($phone), 0, 2)=='62'){
            // $hp = '+62'.substr(trim($phone), 1);
            $hp = substr(trim($phone), 2);
        }
        // cek apakah no hp karakter 1 adalah 0
        elseif(substr(trim($phone), 0, 1)=='0'){
            // $hp = '+62'.substr(trim($phone), 1);
            $hp = substr(trim($phone), 1);
        }
    }
    return $hp;
}