<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientComent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use App\Models\CartModel;
use App\Models\CateModel;
use App\Models\ProductModel;
use App\Models\User;
use PDO;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    public function index(){
        $prd = new ProductModel();
        $count = $prd->listallspadmin()->count();

        $users = DB::table('table_user')->get();
        $total = $users->count();

        $coment = new ProductModel();
        $countcoment = $coment->displaycomment()->count();

        $cate = new CateModel();
        $countcate = $cate->list()->count();

        $Cartcheck =  new CartModel();
        $cartadmin = $Cartcheck->listCartAdmin()->count();

        return view('admin.index', compact('count', 'countcoment', 'countcate', 'total', 'cartadmin')); //Home admin
    }
    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $request,LoginRequest $logvalidate ){
            $logvalidate->validated();
            $data= [
                'email'=>$request->email,
                'password'=>$request->password,
            ];
            $user = Auth::attempt($data);
            if($user){
                $users = User::where('email', $request->email)
                ->where('level', 1)
                ->first();
                if($users){
                    return redirect()->route('admin.home');
                }else{
                    return redirect()->route('home.home');
                }
            }else{
                return back()->with('mess', 'Ban nhap sai email/username hoac password!');
            }
        
    }
    public function getformSign(){
        return view('register');
    }
    public function postSign(Request $request){
        // dd($request);
        $rule = [
            'name'=> 'required|min:6',
            'email'=> 'required|email|unique:table_user',
            'password'=> 'required|min:8',
        ];
        $message = [
            'required'=> 'Ban can nhap truong :attribute nay!',
            'min' => 'Ban can nhap truong :attribute nay du :min!',
            'email' => 'Ban can nhap dung dinh danh email!',    
            'unique'=> 'Tai khoan nay da  ton tai!',
        ];
        $request->validate($rule, $message);
        
        $data = [
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'email'=>$request->email
        ];
        
        // Login
        $datas = [
            'password'=>$request->password,
            'email'=>$request->email,
        ];
        $user = new User;
        $user->insert($data);
        // dd(Auth::attempt($datas)); // Kiem tra dieu 
        if(Auth::attempt($datas)){
            $userLogin = User::where('email', $request->email)
            ->first();
            Auth::login($userLogin);
            return redirect()->route('home.home');  
        }
    }
    public function error403(){
    return view('403.error');
   }
}
