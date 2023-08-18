<?php

namespace App\Models;

use Dflydev\DotAccessData\Data;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PharIo\Version\BuildMetaData;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Return_;
use Psy\Command\WhereamiCommand;
use Termwind\Components\Dd;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'productmaigrate';
    protected $tables = 'table_category';
    protected $tablecoment = 'table_commnet_prd';
   
   // lay tat ca san pham
   public function listallspadmin (){
      return DB::table($this->table)
      ->orderBy('id', 'desc')
      ->get();
   }
   public function listallsp (){
      return DB::table($this->table)
      ->orderBy('id', 'desc')
      ->paginate(8);
   }
   // Lay tat ca san pham moi trong database voi id lon
   public function listnew(){
      return DB::table($this->table)
      ->orderBy('featured',"Desc")
      ->where('featured', 1)
      ->paginate(4);
   }
   // post product
   public function postProduct($data){
      return  DB::table($this->table)->insert($data);
   }// post ok

   // Update
   public function getoneProduct($id){
    return DB::table($this->table)
      ->select(''.$this->table.'.*', ''.$this->tables.'.id as cateid', ''.$this->tables.'.name_category')
      ->join($this->tables, function (JoinClause $join) use($id){
         $join->on(''.$this->table.'.id_cate',''.$this->tables.'.id')
         ->where(''.$this->table.'.id', $id);
      })
      ->first();
   }

   public function updateproduct ($data){
      // dd($data);
      return DB::table($this->table)
      ->where('id', $data['id'])
      ->update($data);
   }
   public function deleteProduct ($id){
   return DB::table($this->table)
   ->where('id',$id)
   ->delete();
   }
   
   // chi tiet san pham
   public function detailproduct($id){
     return DB::table($this->table)
      ->where('id' , $id)
      ->get();
      
   }
   // Find product 
   public function findproduct($keyfind){
      DB::enableQueryLog();
      $find =  DB::table($this->table)
      ->select(''.$this->table.'.*')
      ->join(''.$this->tables.'',''.$this->table.'.id_cate', ''.$this->tables.'.id')
      ->where('name_product', 'like','%'.$keyfind.'%')
      ->orWhere('name_category', 'like','%'.$keyfind.'%')
      ->paginate(8);
      // // $sql = DB::getQueryLog();
      // dd($sql);
      // dd($find);
      return $find;
   }

   // Comment product 
   public function commentproduct($data){
      // dd($data);
     if(!empty($data)){
      return DB::table($this->tablecoment)
      ->insert($data);
     }else{
      return "Ban khong the comment san pham!";
     }
   }
   public function displaycomment(){
      return DB::table($this->tablecoment)
      ->orderBy('id', 'desc')
      ->get();
  }
   public function editcomment($id){
      return DB::table($this->tablecoment)
      ->where('id', $id)
      ->first();
  }
   public function updateComment($data){
      return DB::table($this->tablecoment)
      ->where('id', $data['id'])
      ->update($data);
  }
   public function deletecomment($id){
      return DB::table($this->tablecoment)
      ->where('id', $id)
      ->delete();
  }
}