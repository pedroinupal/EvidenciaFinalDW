<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded=[];

    static function todos_los_suppliers(){
        return Supplier::where('active', true)->get();
    }

    static function supplier_por_id($id){
        return Supplier::where('id', $id)
            ->where('active', true)
            ->firstOrFail();
    }
}
