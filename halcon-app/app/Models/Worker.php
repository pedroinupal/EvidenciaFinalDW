<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $guarded=[];

    static function todos_los_empleados(){
        return Worker::join('roles','roles.id', '=','workers.role_id')
            ->select('workers.role_id','workers.id','name','username','roles.role')
            ->where('workers.active', true)
            ->orderby('workers.id','asc')
            ->get();
    }

    static function employee_por_id($id){
        return Worker::where('id', $id)
            ->where('active', true)
            ->firstOrFail();
    }
}
