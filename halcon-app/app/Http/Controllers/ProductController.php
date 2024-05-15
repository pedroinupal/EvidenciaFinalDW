<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductController extends Controller
{
    public function index()
    {
    
    $products = Product::todos_los_productos();
    
    return view('products.index',compact('products'));

    }

    public function create()
    {
        return view('products.create')
            ->with('products', Product::todos_los_productos());    
    }

    public function store(Request $request)
    {
        Product::create([
            'supplier_id'=>$request->supplier_id,
            'product_name'=>$request->product_name,
            'available_quantity'=>$request->available_quantity
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product successfully created');
    }

    public function show($id)
    {
        return view('products.show')
            ->with('products', Product::producto_por_id($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit')
            ->with('products', Product::producto_por_id($id))
            ->with('suppliers', Supplier::todos_los_suppliers());
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::producto_por_id($id);

        $products->update([
            'supplier_id' =>  $request->supplier_id,
            'available_quantity'   => $request->available_quantity,
            'product_name'   =>  $request->product_name
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::producto_por_id($id);

        $products->update([
            'active'     =>  false,
        ]);
        

        return redirect()->route('products.index');
    }
}