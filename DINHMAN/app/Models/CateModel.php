<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CateModel extends Model
{
    use HasFactory;
    protected $table = 'table_category';
    protected $tables = 'productmaigrate';
    public function list (){
       return DB::table($this->table)->get();
    }
    public function listone ($id){
      return DB::table($this->table)
      ->where('id', '=',$id )
      ->first();
    }
    public function updateCategory ($data){
      return DB::table($this->table)
      ->where('id', $data['id'])
      ->update(['name_category'=> $data['name'] ]);
    }
    public function deleteCategory ($id){
      return DB::table($this->table)
      ->where('id',$id)
      ->delete();
    }
    
    public function postCategory($name){
       return  DB::table($this->table)->insert([
            'name_category'=>$name,
            'slug'=>Str::slug($name),
        ]);
    }
    public function cate_Prd($id){
      return DB::table($this->table)
      ->join($this->tables, function(JoinClause $join) use($id){
            $join->on(''.$this->table.'.id', ''.$this->tables.'.id_cate')
            ->where(''.$this->table.'.id', $id);
      })
      ->paginate(8);
    }
}
