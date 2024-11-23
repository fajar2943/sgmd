<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Plan;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index(){
        $vouchers = Voucher::whereNotIn('status', ['Deleted'])->orderBy('id', 'desc')->paginate(20);
        $plans = Plan::pluck('name', 'id');
        return view('admin.voucher.index', compact('vouchers', 'plans'));
    }
    public function store(Request $request){
        $plan = Plan::find($request->plan_id);
        $request->request->add(['plan' => $plan->name, 'price' => $plan->price, 'status' => 'Available']);
        Voucher::create($request->except(['plan_id']));
        return redirect()->back()->with('Success', 'Data berhasil dibuat.');
    }
    public function update(Request $request, $id){
        $plan = Plan::find($request->plan_id);
        $request->request->add(['plan' => $plan->name, 'price' => $plan->price]);
        Voucher::find($id)->update($request->except(['plan_id']));
        return redirect()->back()->with('Success', 'Data berhasil di update.');
    }
    public function destroy($id){
        $voucher = Voucher::find($id);
        if($voucher->orders->count()){
            $voucher->update(['status' => 'Deleted']);
        }else{
            $voucher->delete();
        }
        return redirect()->back()->with('Success', 'Data berhasil di hapus');
    }
}
