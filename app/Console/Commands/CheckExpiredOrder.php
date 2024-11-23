<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Console\Command;

class CheckExpiredOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:expired-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scanning Expire Order and update status to Expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(config('app.env') == 'local'){
            Order::whereStatus('Process')->where('created_at', '<=' , now()->subMinutes(5))->update(['status' => 'Expired']);
            Voucher::whereStatus('Process')->where('order_date', '<=' , now()->subMinutes(5))->update(['status' => 'Available']);
        }else{
            Order::whereStatus('Process')->where('created_at', '<=' , now()->subDay())->update(['status' => 'Expired']);
            Voucher::whereStatus('Process')->where('order_date', '<=' , now()->subDay())->update(['status' => 'Available']);
        }
    }
}
