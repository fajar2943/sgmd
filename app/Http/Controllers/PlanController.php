<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index(){
        $plans = Plan::all();
        // $plan_vouchers = DB::table('vouchers')
        // ->select('plan')
        // ->groupByRaw('plan')
        // ->get();
        return view('admin.plan.index', compact('plans'));
    }
    public function store(Request $request){
        $request['detail'] = $this->_detail($request->detail ?? []);
        if(Plan::whereName($request->name)->count()) return back()->with('Failed', 'Plan sudah terdaftar.');
        Plan::create($request->all());
        return redirect()->back()->with('Success', 'Data berhasil disimpan');
    }
    public function update(Request $request, $id){
        $request['detail'] = $this->_detail($request->detail ?? []);
        Plan::find($id)->update($request->all());
        return redirect()->back()->with('Success', 'Data berhasil di update');
    }
    public function destroy($id){
        Plan::find($id)->delete();
        return redirect()->back()->with('Success', 'Data berhasil di hapus');
    }

    private function _detail($detail){
        $result = [];
        foreach($detail as $key => $value){
            $result[] = $value;
        }
        return json_encode($result);
    }
}
