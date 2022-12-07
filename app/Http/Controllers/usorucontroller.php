<?php

namespace App\Http\Controllers;
use App\Models\usoru;
use Illuminate\Http\Request;

class usorucontroller extends Controller
{

public function index(){
     $usoru = usoru::latest()->paginate(5);
    
    return view('usoru.usoru-list',compact('usoru'))
        ->with('i', (request()->input('page', 1) - 1) * 5); 
    }
   
public function create()
    {
           return view('usoru.usoru-create');  
    }
public function store(Request $request)
    {
              $request->validate([
        'soru' => 'required',
        'dosya' => 'required',
    ]);

    usoru::create($request->all());
 
    return redirect()->route('usoru.usoru-list')
                    ->with('success','User created successfully.');
    }
public function show(usoru $usoru)
    {
              return view('usoru.usoru-list',compact('usoru'));
    }
public function edit(Product $product)
    {
        
    }
public function update(Request $request, Product $product)
    {
         
    }
public function destroy(Product $product)
    {
         
    }

}

