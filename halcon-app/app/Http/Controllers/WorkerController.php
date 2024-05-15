<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Role;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::todos_los_empleados();
    
        return view('workers.index',compact('workers'));

    }

    public function create()
    {
        return view('workers.create')
            ->with('roles', Role::todos_los_roles());
    }
    
    public function store(Request $request)
    {
        Worker::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>$request->password,
            'role_id'=>$request->role_id
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'Empleado creado exitosamente');
    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('workers.show')
            ->with('workers', Worker::employee_por_id($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('workers.edit')
            ->with('workers', Worker::employee_por_id($id))
            ->with('roles', Role::todos_los_roles());
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

        $workers = Worker::employee_por_id($id);

        $workers->update([
            'role_id' =>  $request->role_id,
            'name'   => $request->name,
            'username'   =>  $request->username,
            'password'=>$request->password
        ]);

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workers = Worker::employee_por_id($id);

        $workers->update([
            'active'     =>  false,
        ]);
        

        return redirect()->route('employees.index');
    }
}
