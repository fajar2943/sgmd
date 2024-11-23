<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(){
        $payments = Payment::all();
        $payment_active = Setting::whereName('payment')->value('value');
        return view('admin.payment.index', compact('payments', 'payment_active'));
    }
    public function setPayment($payment){
        Setting::whereName('payment')->update(['value' => $payment]);
        return redirect()->back()->with('Success', $payment.' berhasil di aktifkan.');
    }
    public function update(Request $request, $id){
        $payment = Payment::find($id);
        $details = json_decode($payment->detail);
        foreach ($details as $i => $detail) {
            foreach($request->except(['_token', '_method']) as $key => $newDetail){
                if(isset($detail->name) && $detail->name == $key){
                    $details[$i]->value = $newDetail;
                }
            }
        }
        $payment->update(['detail' => json_encode($details)]);
        return redirect()->back()->with('Success',  'Data '.$payment->name.' berhasil di update.');
    }
}
