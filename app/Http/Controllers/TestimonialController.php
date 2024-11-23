<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function index(){
        $testimonials = Testimonial::all();
        return view('admin.testimoni.index', compact('testimonials'));
    }
    public function store(Request $request){
        Testimonial::create($request->all());
        return redirect()->back()->with('Success', 'Data berhasil disimpan');
    }
    public function update(Request $request, $id){
        $testimonials = Testimonial::find($id);    
        $testimonials->update($request->all());
        return redirect()->back()->with('Success', 'Data berhasil di update');
    }
    public function destroy($id){
        $testimonials = Testimonial::find($id);
        $testimonials->delete();
        return redirect()->back()->with('Success', 'Data berhasil di hapus');
    }
}
