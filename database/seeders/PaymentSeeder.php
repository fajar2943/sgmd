<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $midtrans_detail = [
            ['name' => 'is_production', 'label' => 'Production mode?', 'type' => 'bool', 'value' => true],
            ['type' => 'code', 'value' => '<h3 class="text-center">Production</h3>'],
            ['name' => 'merchant_id', 'label' => 'Merchant Id', 'type' => 'string', 'value' => 'G486095108'],
            ['name' => 'client_key', 'label' => 'Client Key', 'type' => 'string', 'value' => 'Mid-client-N_Nb1VKmobobSxae'],
            ['name' => 'server_key', 'label' => 'Server Key', 'type' => 'string', 'value' => 'Mid-server-HYN6DftxoueAyPy55VvrTz5z'],
            ['type' => 'code', 'value' => '<h3 class="text-center">Demo/Sandbox</h3>'],
            ['name' => 'sandbox_merchant_id', 'label' => 'Merchant Id', 'type' => 'string', 'value' => 'G486095108'],
            ['name' => 'sandbox_client_key', 'label' => 'Client Key', 'type' => 'string', 'value' => 'SB-Mid-client-6F1g65JmfgyJ5FKT'],
            ['name' => 'sandbox_server_key', 'label' => 'Server Key', 'type' => 'string', 'value' => 'SB-Mid-server-4QrU5yAGM2a2FdZ4Zv5pOfC5'],
        ];
        $duitku_detail = [
            ['name' => 'is_production', 'label' => 'Production mode?', 'type' => 'bool', 'value' => true],
            ['type' => 'code', 'value' => '<h3 class="text-center">Production</h3>'],
            ['name' => 'merchant_code', 'label' => 'Merchant Code', 'type' => 'string', 'value' => 'D13763'],
            ['name' => 'api_key', 'label' => 'Api Key / Merchant Key', 'type' => 'string', 'value' => '2f499a2afcf3113b5dd8fac443ab864f'],
            ['type' => 'code', 'value' => '<h3 class="text-center">Demo/Sandbox</h3>'],
            ['name' => 'sandbox_merchant_code', 'label' => 'Merchant Code', 'type' => 'string', 'value' => 'DS18117'],
            ['name' => 'sandbox_api_key', 'label' => 'Api Key / Merchant Key', 'type' => 'string', 'value' => '7f4fd67b7d744ab1655271a82b4e9378'],
        ];
        $xendit_detail = [
            ['name' => 'is_production', 'label' => 'Production mode?', 'type' => 'bool', 'value' => true],
            ['type' => 'code', 'value' => '<h3 class="text-center">Production</h3>'],
            ['name' => 'api_key', 'label' => 'Api Key', 'type' => 'string', 'value' => 'xnd_production_myXvqG2TOfNgqY28QYIHT2oLYGv8jMlq9oMBYAZCqDP0ILXH0GPihrH2ngPekpx'],
            ['name' => 'webhook_token', 'label' => 'Webhook Verification Token', 'type' => 'string', 'value' => 'rbBzg6tlvf4DEGz6O72HrnoblOUbbEmhbKDSeXswRzAnWWsS'],
            ['type' => 'code', 'value' => '<h3 class="text-center">Demo/Sandbox</h3>'],
            ['name' => 'sandbox_api_key', 'label' => 'Api Key', 'type' => 'string', 'value' => 'xnd_development_6iADNCk0tQbW4pvQMGkLV5QkhcDG2HVG5FGbv65g22fmtFNLjTNHhYaJhja'],
            ['name' => 'webhook_token', 'label' => 'Webhook Verification Token', 'type' => 'string', 'value' => 'lu7iF4QObOAzQ6q6sYA2dMiIPs0lFiSgCmaN8QinT6CXelDz'],
        ];

        Payment::insert([
            ['name' => 'MIDTRANS', 'detail' => json_encode($midtrans_detail)],
            ['name' => 'DUITKU', 'detail' => json_encode($duitku_detail)],
            ['name' => 'XENDIT', 'detail' => json_encode($xendit_detail)],
        ]);
    }
}
