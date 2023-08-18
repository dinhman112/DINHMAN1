<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\Models\CateModel;
use App\Http\Requests\Category;
use App\Http\Requests\ClientComent;
use App\Models\ProductModel;
use App\Http\Requests\ProductRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{

    private $cate;
    private $prd;
    public function __construct(){
        $this->cate = new CateModel();
        $this->prd = new ProductModel();
    }
    // Logout account
    public function logOut(){
        Auth::logout();
        return view('login');
    }

    // Product
    public function listProduct(Request $request){
        $listprd  = $this->prd->listallsp();
        return view('admin.product', compact('listprd'));
    } // Ok
    public function getFormProduct(){
        $listcate = $this->cate->list();

        return view('admin.addproduct', compact('listcate'));
    } // OK
    public function postProduct(Request $request, ProductRequest $valiProduct){
        $valiProduct->validated();
        $fileName = time() . '.' . $request->file('img')->getClientOriginalExtension();
        $data = [
            'name_product'=>$request->name,
            'slug'=>$request->name,
            'price'=>$request->price,
            'warranty'=>$request->warranty,
            'img'=> $fileName,
            'accessories'=>$request->accessories,
            'condition'=>$request->condition,
            'promotion'=>$request->promotion,
            'status'=>$request->status,
            'description'=>$request->description,
            'featured'=>$request->featured,
            'id_cate'=>$request->cate,
        ];
        // $request->image->storeAs('images');
        $this->prd->postProduct($data);
        $request->file('img')->storeAs('public/images', $fileName);
       
        return back()->with('mess', "Bạn Đã Thêm Sản Phẩm Thành Công!");
    }
    public function editProduct(Request $request){
       $getoneprd =  $this->prd-> getoneProduct($request->id);
        return view('admin.editproduct', compact('getoneprd'));
    }
    public function updateProduct(Request $request){
        $rules =[
            'name'=> 'required| min:6|unique:productmaigrate,name_product,'.$request->id,
            'price'=> 'required|integer',
            'img'=> 'required|image|mimes:jpeg,png,jpg,gif',
            'accessories'=> 'required',
            'promotion'=> 'required|min:6',
            'condition'=> 'required',
            'description'=> 'required| min:50',
        ];
        $message = [
            'min' => 'Bạn phải nhập ít nhất :min trong trường :attribute này!',
            'integer' => 'Bạn phải nhập đúng kiểu dữ liệu :integer trong trường :attrubute này!',
            'img'=> "Bạn phải thêm file :image vào trong trường :attribute này! ",
            'required'=> "Bạn phải nhập đầy đủ trường :attribute này!",
        ];
        $request->validate($rules, $message);
        $id =  $request->id;
        $fileName = time() . '.' . $request->file('img')->getClientOriginalExtension();
        $data = [
            'name_product'=>$request->name,
            'id'=> $id,
            'slug'=>$request->name,
            'price'=>$request->price,
            'accessories'=>$request->accessories,
            'warranty'=>$request->warranty,
            'img'=> $fileName,
            'promotion'=>$request->promotion,
            'condition'=>$request->condition,
            'status'=>$request->status,
            'description'=>$request->description,
            'id_cate'=>$request->cate,
            'featured'=>$request->featured,
        ];
        if(isset($id)){
            $this->prd->updateproduct($data);
            $request->file('img')->storeAs('public/images', $fileName);
            return back()->with('mess', "Bạn Đã Update Thành Công Sản Phẩm!");
        }else{
            return back()->with('mess', "Bạn không thể Update");
        }
    }

    public function deleteProduct(Request $request){
            $getimg = $this->prd->detailProduct($request->id);
            foreach($getimg as $item){
                // dd($item->img);
                if(Storage::exists($item->img)){
                    Storage::delete($item->img);
                }
            }
            $this->prd->deleteProduct($request->id);
            return back()->with('mess', "Ban Da Xoa Thanh Cong San Pham");
    }
    public function commentUser(){
        $displaycoment= $this->prd->displaycomment();
        return view('admin.comment  ', compact('displaycoment'));
    }    
    public function editComment(Request $request){
        $displaycomentone = $this->prd->editcomment($request->id);
        return view('admin.editcomment', compact('displaycomentone'));
    }    
    public function updateComment(Request $request,ClientComent $valiComent ){
        $valiComent->validated();
        $data = [
        'id'=>$request->id,
        'email'=>$request->email,
        'name'=>$request->name,
        'comments'=>$request->comment
        ];
         $this->prd->updatecomment($data);
        return back()->with('mess', 'Bạn Đã UpDate Thành Công!!');
    }   
    public function deleteComment(Request $request){
        $this->prd->deletecomment($request->id);
        return back()->with('mess', "Bạn đã Delete Success");
    } 





    // Category
    public function listCategory(){
        // $cate = new CateModel();
        $list  = $this->cate->list();
        return view('admin.category', compact('list'));
    }
    public function postCategory(Request $request, Category $valiCate){
        $valiCate->validated();

        $this->cate->postCategory( $request->name);
        return back()->with('mes', 'Add Success');
    }
    public function editCategory(Request $request){
        $id  = $request->id ;
         $cateone =  $this->cate->listone($id);
        return view('admin.editCategory',  compact('cateone'));
    }
    public function updateCategory(Request $request){
        $rules = [
            'name'=> 'required|min:6|unique:table_category,name_category,'. $request->id
        ];
        $message = [
            'required'=> 'Ban can nhap :attribute nay',
            'min'=>'Ban can nhap it nhat :min ki tu',
            'unique'=> ':attribute da ton tai. Xin vui long them :attribute khac! '
        ];
        $request->validate($rules, $message);
     
        $data = [
            'id'=>$request->id,
            'name'=> $request->name
        ];
         $this->cate->updateCategory($data);
         return back()->with('mess', 'Update success');
    }
    public function deleteCategory(Request $request){
        // dd($request);
        $id = $request->id;
        $this->cate-> deleteCategory ($id);
        return back()->with('mes', "Delete Success");
    }
}
