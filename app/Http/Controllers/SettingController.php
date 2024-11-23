<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::all();
        $payments = Payment::all();
        return view('admin.setting.index', compact('settings', 'payments'));
    }
    public function store(Request $request){
        Setting::whereName('email')->update(['value' => $request->email]);
        Setting::whereName('phone')->update(['value' => $request->phone]);
        Setting::whereName('wa')->update(['value' => $request->wa]);
        Setting::whereName('fb')->update(['value' => $request->fb]);
        Setting::whereName('x')->update(['value' => $request->x]);
        Setting::whereName('ig')->update(['value' => $request->ig]);
        Setting::whereName('open')->update(['value' => $request->open]);
        Setting::whereName('address')->update(['value' => $request->address]);
        Setting::whereName('wa_token')->update(['value' => $request->wa_token]);
        return redirect()->back()->with('Success', 'Pengaturan Berhasil Diperbarui.');
    }
    public function password(Request $request){
        $user = User::find(auth()->user()->id);        
        if(!Hash::check($request->old_password, $user->password)){
            return redirect()->back()->with('Failed', 'Password Lama Tidak Sesuai');
        }
        if($request->new_password != $request->confirm_password){
            return redirect()->back()->with('Failed', 'Konfirmasi Password Tidak Sesuai');
        }
        $user->update(['password' => $request->new_password]);
        return redirect()->back()->with('Success', 'Password Berhasil Diubah');
    }
}
