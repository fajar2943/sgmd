<?php

namespace App\Http\Controllers;

use App\Mail\Checkout;
use App\Mail\Invoice;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Voucher;
use Exception;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Xendit\Configuration;

class SiteController extends Controller
{
    public function index(){
        $testimonials = Testimonial::all();
        return view('site.index', compact('testimonials'));
    }
    public function voucher(){
        $plans = Plan::all();
        $testimonials = Testimonial::all();
        return view('site.voucher', compact('plans', 'testimonials'));
    }
    public function checkout($name){
        $plan = Plan::whereName($name)->first();
        if(!$plan or !Voucher::wherePlan($name)->whereStatus('Available')->count()){
            return view('site.unavailable');
        }
        return view('site.checkout', compact('plan'));
    }
    public function order(Request $request){
        $this->validate($request,['wa' => 'required|max:50', 'plan' => 'required|max:50', 'name' => 'required|max:50']);
        $plan = Plan::whereName($request->plan)->first();
        $voucher = Voucher::wherePlan($request->plan)->whereStatus('Available')->first();
        if(!$plan or !$voucher){
            return redirect('/voucher#pricing')->with('Failed', "Mohon maaf, voucher yang anda pilih tidak tersedia/habis.");
        }
        $code = uniqid();
        $wa = '62'.formatPhone($request->wa);
        $payment = Setting::whereName('payment')->value('value');
        if($payment == 'MIDTRANS'){
            $midtrans = json_decode(Payment::whereName('MIDTRANS')->value('detail'));
            Config::$serverKey = ($midtrans[0]->value) ? $midtrans[4]->value : $midtrans[8]->value;
            Config::$isProduction = $midtrans[0]->value;
            Config::$isSanitized = true;
            Config::$is3ds = true;
            Config::$overrideNotifUrl = config('app.url').'/api/midtrans-callback';
    
            $params = array(
                'transaction_details' => array(
                    'order_id' => $code,
                    'gross_amount' => $plan->price,
                ),
                'customer_details' => array(
                    'first_name' => $request->name,
                    'last_name' => '',
                    'email' => null,
                    'phone' => $wa,
                ),
                "callbacks"=> array(
                  "finish" => config('app.url').'/invoice/'.$code
                )
            );
            $token = Snap::getSnapToken($params);
        }else if($payment == 'DUITKU'){
            $duitku = json_decode(Payment::whereName('DUITKU')->value('detail'));

            $duitkuConfig = new \Duitku\Config(($duitku[0]->value) ? $duitku[3]->value : $duitku[6]->value, ($duitku[0]->value) ? $duitku[2]->value : $duitku[5]->value);
            $duitkuConfig->setSandboxMode(!$duitku[0]->value);
            $duitkuConfig->setSanitizedMode(false);
            $duitkuConfig->setDuitkuLogs(false);
            
            $params = array(
                'paymentAmount'     => $plan->price,
                'merchantOrderId'   => $code,
                'productDetails'    => 'Pembelian Voucher Internet',
                'additionalParam'   => '',
                'merchantUserInfo'  => '',
                'customerVaName'    => $request->name,
                'email'             => null,
                'phoneNumber'       => $wa,
                'itemDetails'       => [
                    ['name' => $plan->name, 'price' => $plan->price, 'quantity' => 1]
                ],
                'customerDetail'    => [
                    'firstName' => $request->name, 'lastName' => '', 'email' => null, 'phoneNumber' => $wa, 
                    'billingAddress' => [
                        'firstName' => $request->name, 'lastName' => '', 'address' => '', 'city' => '', 'postalCode' => '', 'phone' => $wa, 'countryCode' => '62'
                    ], 
                    'shippingAddress' => [
                        'firstName' => $request->name, 'lastName' => '', 'address' => '', 'city' => '', 'postalCode' => '', 'phone' => $wa, 'countryCode' => '62'
                    ],
                ],
                'callbackUrl'       => config('app.url').'/api/duitku-callback',
                'returnUrl'         => config('app.url').'/invoice/'.$code,
                'expiryPeriod'      => 60
            );
            $responseDuitkuPop = json_decode(\Duitku\Pop::createInvoice($params, $duitkuConfig));
            $token = $responseDuitkuPop->reference;
        }else{
            $xendit = json_decode(Payment::whereName('XENDIT')->value('detail'));
            $xendit_api_key = $xendit[0]->value ? $xendit[2]->value : $xendit[5]->value;

            Configuration::setXenditKey($xendit_api_key);
            $apiInstance = new \Xendit\Invoice\InvoiceApi();

            $createInvoiceRequest = new \Xendit\Invoice\CreateInvoiceRequest([
                'external_id' => $code,
                'description' => 'nama : '. $request->name . ', wa: '. $wa . ', plan: '. $request->plan,
                'amount' => $plan->price,
                'success_redirect_url' => config('app.url').'/invoice/'.$code,
                'invoice_url' => config('app.url').'/invoice/'.$code,
            ]);
            // dd($createInvoiceRequest);

            $createInvoice = $apiInstance->createInvoice($createInvoiceRequest);

            $token = $createInvoice['invoice_url'];
        }
        
        $order = Order::create([
            'voucher_id' => $voucher->id, 'code' => $code, 'name' => $request->name, 'wa' => $request->wa, 'plan_name' => $plan->name,
            'total_payment' => $plan->price,'status' => 'Process', 'snap_token' => $token, 'payment' => $payment
        ]);
        $voucher->update(['status' => 'Process', 'order_date' => now()]);
        $order->update(['inv' => date('dmy').$order->id]);
        
        $sendWa = Http::withOptions(["verify"=>false])->withHeader('Authorization', getSetting('wa_token', 'value'))->post('https://api.fonnte.com/send', [
            'target' => $wa,
            'message' => "*Pesanan berhasil dibuat.* \n\nNo.Pesanan\t: ".$order->inv." \nNama Paket\t\t: ".$request->plan.
                    " \nNama \t: ".$request->name." \nHarga \t\t: ".rupiah($order->total_payment).
                    " \nStatus \t\t: Belum Dibayar \n\nUntuk melihat detail pesanan silahkan buka tautan dibawah ini, Terimakasih. \n\n ".
                    config('app.url'). "/invoice/$order->code \n\n\n_". config('app.name')." Team_"
        ]);
        return redirect('/invoice/'.$order->code);
    }
    public function invoice($code){
        $order = Order::whereCode($code)->first();
        if($order->status == 'Process'){
            if($order->payment == 'MIDTRANS'){
                $midtrans = json_decode(Payment::whereName('MIDTRANS')->value('detail'));
                $client_key = ($midtrans[0]->value) ? $midtrans[3]->value : $midtrans[7]->value;
                $snap_url = ($midtrans[0]->value) ? config('midtrans.snap_url') : config('midtrans.sandbox_snap_url');
                return view('site.payment', compact('order', 'client_key', 'snap_url'));
            }if($order->payment == 'DUITKU'){
                $duitku = json_decode(Payment::whereName('DUITKU')->value('detail'));
                $js_url = ($duitku[0]->value) ? config('duitku.js_url') : config('duitku.sandbox_js_url');
                return view('site.duitku', compact('order', 'js_url'));
            }else{
                return view('site.xendit', compact('order'));
            }
        }elseif($order->status == 'Success'){
            return view('site.invoice', compact('order'));
        }elseif($order->status == 'Expired'){
            return view('site.expired', compact('order'));
        }elseif($order->status == 'Cancel'){
            return view('site.cancel', compact('order'));
        }elseif($order->status == 'Refund'){
            return view('site.refund', compact('order'));
        }
    }
    public function cancel($code){
        $order = Order::whereCode($code)->first();
        if($order->status != 'Process'){
            return redirect()->back()->with('Failed', 'Tidak dapat melakukan pembatalan');
        }
        $order->update(['status' => 'Cancel']);
        Voucher::find($order->voucher_id)->update(['status' => 'Available']);
        return redirect()->back();
    }

    public function callback(Request $request){
        $midtrans = json_decode(Payment::whereName('MIDTRANS')->value('detail'));
        $serverKey = ($midtrans[0]->value) ? $midtrans[4]->value : $midtrans[8]->value;
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if($hashed == $request->signature_key){
            $order = Order::whereCode($request->order_id)->first();
            $voucher = Voucher::find($order->voucher_id);

            if(($request->transaction_status == 'capture' && $request->payment_type == 'credit_card' && $request->fraud_status == 'accept') or $request->transaction_status == 'settlement'){
                $this->_success_payment($order, $voucher);
            }elseif($request->transaction_status == 'expire'){
                $this->_expire_payment($order, $voucher);              
            }elseif($request->transaction_status == 'refund'){
                $order->update(['status' => 'Refund']);
                $voucher->update(['status' => 'Refund']);                
            }
            return $request->transaction_status;
        }
        return 'Kode Hash Salah';
    }
    public function duitkuCallback(Request $request){
        Log::channel('famsnet')->info('API Duitku', $request->all());
        
        $duitku = json_decode(Payment::whereName('DUITKU')->value('detail'));
        $apiKey = ($duitku[0]->value) ? $duitku[3]->value : $duitku[6]->value; // API key anda

        if($request->merchantCode && $request->amount && $request->merchantOrderId && $request->signature){
            $params = $request->merchantCode . $request->amount . $request->merchantOrderId . $apiKey;
            $calcSignature = md5($params);

            if($request->signature == $calcSignature){
                $order = Order::whereCode($request->merchantOrderId)->first();
                $voucher = Voucher::find($order->voucher_id);
                if ($request->resultCode == "00"){
                    $this->_success_payment($order, $voucher);
                }else if ($request->resultCode == "01"){
                    $this->_expire_payment($order, $voucher);   
                }
            }else{
                Log::channel('famsnet')->info('API Duitku Bad Signature', $request->all());
                throw new Exception('Bad Signature');
            }
        }else{
            Log::channel('famsnet')->info('API Duitku Bad Parameter', $request->all());
            throw new Exception('Bad Parameter');
        }
    }
    public function xenditCallback(Request $request){
        $xendit = json_decode(Payment::whereName('XENDIT')->value('detail'));
        $webhook_token = $xendit[0]->value ? $xendit[3]->value : $xendit[6]->value;
        if($request->header('X-CALLBACK-TOKEN') == $webhook_token){
            $order = Order::whereCode($request->external_id)->first();
            $voucher = Voucher::find($order->voucher_id);
            if($request->status == 'PAID'){
                $this->_success_payment($order, $voucher);
            }elseif($request->status == 'EXPIRED' or $request->status == 'Expired'){
                $this->_expire_payment($order, $voucher);
            }
            return 'Success';
        }
        return 'Failed';
    }

    private function _success_payment(Order $order, Voucher $voucher){
        $order->update(['status' => 'Success']);
        $voucher->update(['status' => 'Sold']);
        $sendWa = Http::withOptions(["verify"=>false])->withHeader('Authorization', getSetting('wa_token', 'value'))->post('https://api.fonnte.com/send', [
            'target' => $order->wa,
            'message' => "*Pembayaran Berhasil.* \n\nNo.Pesanan \t: ".$order->inv." \nNama Paket \t: ".$order->plan_name.
                    " \nNama \t\t\t\t\t: ".$order->name." \nHarga \t\t\t\t\t: ".rupiah($order->total_payment).
                    " \nStatus \t\t\t\t\t: Lunas \nLogin \t\t\t\t\t: ".$voucher->login." \nPassword \t: ".$voucher->password." \n\nUntuk melihat detail pesanan silahkan buka tautan dibawah ini, Terimakasih. \n\n ".
                    config('app.url'). "/invoice/$order->code \n\n\n_". config('app.name')." Team_"
        ]);
        return;
    }
    private function _expire_payment(Order $order, Voucher $voucher){      
        $order->update(['status' => 'Expired']);
        $voucher->update(['status' => 'Available']); 
        return;
    }
}
