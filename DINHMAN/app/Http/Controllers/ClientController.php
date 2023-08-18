<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientComent;
use App\Models\CateModel;
use Illuminate\Http\Request;

use App\Models\ProductModel;
use Illuminate\Support\Facades\Redis;

class ClientController extends Controller
{
    private $prd; 
    private $cate; 
    public function __construct() {
       $this->prd  = new ProductModel();
       $this->cate = new CateModel();
    }

    // Product
    // goi trang chu hien thi
    public function listAll(){
        $list  = $this->cate->list();
        $quanity = \Cart::getTotalQuantity();
        $listprd  = $this->prd->listallsp();
        $listnew = $this->prd->listnew();
        
        return view('client.index', compact('listprd', 'listnew', 'list', 'quanity'));
    }
    public function detailProduct(Request $request){
        // dd($request->id);
        $quanity = \Cart::getTotalQuantity();
        $list  = $this->cate->list();
       $oneproduct =  $this->prd->detailproduct($request->id);
       $displaycomment = $this->prd->displaycomment();
        return view('client.details', compact('oneproduct', 'list', 'displaycomment', 'quanity'));
    }
    public function listCategory(Request $request){
        $cates = $this->cate->cate_Prd($request->id);
        $list  = $this->cate->list();
        $quanity = \Cart::getTotalQuantity();
        return view('client.category', compact('cates','list', 'quanity' ));
    }
    public function findProduct(Request $request){
        // dd($request->all());
        $quanity = \Cart::getTotalQuantity();
        $rule = [
            'keyfind' => 'required'
        ];
        $messages = [
            'required'=> 'Ban can nhap tu khoa tim kiem'
        ];
        // $listprd  = $this->prd->listallsp();
        $request->validate($rule, $messages);
        $list  = $this->cate->list();
        $keyword = $request->keyfind;
        $prdsearch = $this->prd->findproduct($request->keyfind);
        // dd($prdsearch);
       return view("client.search", compact('prdsearch', 'list', 'keyword', 'quanity'));
    }
    public function commentPrd(Request $request, ClientComent $validComent){
        
        $validComent->validated();
        $data= [
            'email'=>$request->email,
            'name'=>$request->name,
            'comments'=>$request->comment,
            'id_prd_com' =>$request->id
        ];
        $this->prd->commentproduct($data);
        return back()
        ->with('mess', "Bạn comment thành công!");
    }
}
