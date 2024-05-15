<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
    
    $customers = Customer::todos_los_clientes();
    
    return view('customers.index',compact('customers'));

    }
    
    public function create()
    {
        return view('customers.newcustomer')
            ->with('customers', Customer::todos_los_clientes());    
    }

    public function store(Request $request)
    {
        Customer::create([
            'name' =>$request->name,
            'username' =>$request->username,
            'password' =>$request->password,
            'rfc' =>$request->rfc
        ]);

        return redirect()->route('customers.index')
            ->with('success', 'Cliente creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('customers.show')
            ->with('customers', Customer::cliente_por_id($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('customers.edit')
            ->with('customers', Customer::cliente_por_id($id));
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

        $customers = Customer::cliente_por_id($id);

        $customers->update([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>$request->password,
            'rfc'=>$request->rfc
        ]);

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customers = Customer::cliente_por_id($id);

        $customers->update([
            'active'     =>  false,
        ]);
        

        return redirect()->route('customers.index');
    }
}