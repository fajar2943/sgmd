<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\Voucher;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = ($request->inv) ? Order::where('inv', 'LIKE', '%' . $request->inv . '%')->orderBy('id', 'desc')->paginate(5) : Order::orderBy('id', 'desc')->paginate(20);
        $plans = Plan::all();
        return view('admin.order.index', compact('orders', 'plans'));
    }
    public function store(Request $request){        
        $plan = Plan::whereName($request->plan)->first();
        $voucher = Voucher::wherePlan($request->plan)->whereStatus('Available')->first();
        if(!$plan or !$voucher){
            return redirect()->back()->with('Failed', 'Paket Tidak Tersedia');
        }
        $order = Order::create([
            'voucher_id' => $voucher->id, 'code' => uniqid(), 'email' => env('MAIL_FROM_ADDRESS'), 'plan_name' => $plan->name,
            'total_payment' => $plan->price,'status' => 'Success', 'snap_token' => 'Manual'
        ]);
        $order->update(['inv' => date('dmy').$order->id]);
        $voucher->update(['status' => 'Sold', 'order_date' => now()]);
        return redirect()->back()->with('Success', $plan->name.' Berhasil Dibuat!')->with('Inv', $order->inv)->with('Login', $voucher->login)->with('Password', $voucher->password);
    }
    public function update(Request $request, $id){
        $order = Order::find($id);
        $plan = Plan::whereName($request->plan)->first();
        $voucher = ($order->plan_name == $request->plan) ? $order->voucher : Voucher::wherePlan($request->plan)->whereStatus('Available')->first();
        if(!$plan or !$voucher){
            return redirect()->back()->with('Failed', 'Paket Tidak Tersedia');
        }
        if($order->plan_name != $request->plan){
            $voucher->update(['status' => 'Sold', 'order_date' => now()]);
            $order->voucher->update(['status' => 'Available']);
        }
        $order->update(['voucher_id' => $voucher->id, 'plan_name' => $plan->name, 'total_payment' => $plan->price]); 
        return redirect()->back()->with('Success', 'Berhasil diupdate, ' . $plan->name)->with('Inv', $order->inv)->with('Login', $voucher->login)->with('Password', $voucher->password);    
    }
}
