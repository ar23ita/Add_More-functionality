<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductStock; 
use Illuminate\Validation\Rule; 


class ProductAddMoreController extends Controller
{
     public function addMore()
    {
         return view('addMore');

     }

     public function saveData(Request $request){
        $request->validate([
            'addmore.*.name' => 'required|string|max:255',
            'addmore.*.gender' => ['required', Rule::in(['Male', 'Female'])], 
            'addmore.*.qualification' => 'required|string|max:255',
        ]);
                 $data = $request->input('addmore');
                 //dd($request);
                 foreach ($data as $item) {
                        ProductStock::create([
                            'name' => $item['name'],
                         'gender' => $item['gender'],
                       'qualification' => $item['qualification'],
                        ]);
                    }
                     return redirect()->back()->with('success', 'Data has been successfully stored in the database.');

     }

    public function getData()
    {
        $data = []; 

        return response()->json($data);
    }
}
