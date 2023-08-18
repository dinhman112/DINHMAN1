<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartModel extends Model
{
    use HasFactory;
    protected $table = 'table_check_carts';
    public function listCart($email){
        return DB::table($this->table)
        ->where('mail', $email)
        ->get();
    }
    public function listCartAdmin(){
        return DB::table($this->table)->get();
    }
    public function getOneCartAdmin($id){
        return DB::table($this->table)
        ->where('id', $id)
        ->first();
    }
    public function postVerifyCartAdmin($data){
        // dd($data['id']);
        return DB::table($this->table)
        ->where('id', $data['id'])
        ->update($data);
    }
    public function postCart($data){
        // dd($data);
        return DB::table($this->table)
        ->insert($data);
    }
    public function DeleteCartAdmin($id){
        return DB::table($this->table)->where('id',$id )->delete();
    }
}
