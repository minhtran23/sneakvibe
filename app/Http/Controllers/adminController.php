<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\tbl_customers;
use App\Models\tbl_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\User;


class adminController extends Controller
{
    public function index(){

        $product_count = tbl_product::count();
        $customer_count= tbl_customers::count();
        $order_count = order::where('status','!=',0)->count();
        
      
         return view('admin.index',compact('product_count','customer_count','order_count'));
    }
    public function login(){

        // User::create([
        //     'email'=>'minhtranvan2310@gmail.com',
        //     'password'=>bcrypt(123456),
        //     'name'=>'minh trần'
        // ]);
        
        return view('admin.login');
    }
    public function check_login(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.exists'=>'Email không tồn tại',
            'email.email'=>'Email nhập sai cú pháp',
            'password.required'=>'Vui lòng nhập mật khẩu'
        ]);
        $data = $request->only('email','password');
        $check = auth()->attempt($data);
        if($check){
            return redirect('/admin')->with('ok','Đăng nhập thành công');
        }
        return redirect()->back()->with('no','Tên hoặc mật khẩu không đúng');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login')->with('ok','Đăng xuất thành công');
    }
    
}
    