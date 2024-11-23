<?php

namespace App\Http\Controllers;

use App\Models\Import;
use App\Models\Voucher;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function index(){
        $imports = Import::latest()->paginate(10);
        return view('admin.import.index', compact('imports'));
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'csv' => 'mimes:csv',
        ]);
        $csv = [];
        $handle = fopen($request->File('csv'), "r");
        $row1 = fgetcsv($handle);
        if($row1[0] == 'Login' && $row1[1] == 'Password' && $row1[2] == 'Plan' && $row1[3] == 'Validity' && $row1[5] == 'Bandwidth' && $row1[6] == 'Price' && $row1[8] == 'Type' && $row1[9] == 'Created'){      
            $import = Import::create(['file_name' => $request->File('csv')->getClientOriginalName(), 'total_rollback' => 0, 'status' => 'Imported']);
            while (($data = fgetcsv($handle)) !== FALSE) {
                $csv[] = [
                    'import_id' => $import->id, 'login' => $data[0], 'password' => $data[1], 'plan' => $data[2], 'validity' => $data[3],
                    'bandwidth' => $data[5], 'price' => $data[6], 'type' => $data[8], 'status' => 'Available', 'created_at' => $data[9]
                ];
            }
            // array_splice($csv, 0, 1); //potong baris/array pertama
            $import->update(['total_import' => count($csv)]);
        }else{
            return redirect()->back()->with('Failed', 'Format CSV tidak sesuai');
        }
        Voucher::insert($csv);
        return redirect()->back()->with('Success', 'Data berhasil di import.');
    }

    public function update(Request $request, $id){
        $available = Voucher::whereImportId($id)->whereNull('order_date')->count();
        Voucher::whereImportId($id)->whereNull('order_date')->delete();
        Import::find($id)->update(['status' => 'Rollback', 'total_rollback' => $available]);
        return redirect()->back()->with('Success', 'Data berhasil di rollback');
    }
}
