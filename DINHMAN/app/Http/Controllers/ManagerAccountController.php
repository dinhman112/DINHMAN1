<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class ManagerAccountController extends Controller
{
    public function listUser(){
        $users = DB::table('table_user')->paginate('4');
        // dd($total);
        // dd($users);
        return  view('admin.manageruser', compact('users'));
    }
    public function editUser(Request $request){
        // dd($request->id);
        $users = DB::table('table_user')->where('id',$request->id )->first();
        return  view('admin.edituser', compact('users'));
    }
    public function updateUser(Request $request){
        // dd($request->all());
        // dd($request->id);
        $rules = [
            'email'=> 'required|email|unique:table_user,email,'.$request->id,
            'name'=> 'required|min:6',
            'password'=> 'required|min:8',
        ];
        $messages = [
            'required'=> 'Ban can nhap :attribute nay',
            'min'=>'Ban can nhap it nhat :min ki tu',
            'unique'=> ':attribute da ton tai. Xin vui long them :attribute khac!',
        ];
        $request->validate($rules, $messages);
        $data =  [
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
        ];
        $users = DB::table('table_user')
        ->where('id',$request->id )
        ->update($data);
        return back()->with('mess', 'Ban da update nguoi dung thanh cong');
    }
    public function deleteUser(Request $request){
        DB::table('table_user')
        ->where('id',$request->id)
        ->delete();
        return back()->with('mess', 'Bạn đã xóa thành công người dùng!');
    }
}
