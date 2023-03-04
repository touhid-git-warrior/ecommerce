<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{

    public function AdminDashboardView(){

       return view('admin.index');
    }

    public function LoginView(){

        if(Auth::guard('admins')->check()){

            return redirect()->route('admin.dashboardview');
        }

        return view('admin.auth.login');
    }

    public function DoLogin(Request $request){

        // return $request->all();

         $request->validate([
            'email'=>'required',
            'password'=>'required',
            
        ]);

        if(Auth::guard('admins')->attempt(['email'=>$request->email,'password'=>$request->password])){

            return redirect()->route('admin.dashboardview');

        }else{


             $message = [
                
                'key'=>255,
                'status'=>'err'

        ];

        
        return redirect()->back()->with($message);

            
        }
    }

    

    public function RegisterView(){

        return view('admin.auth.register');
    }

    public function DoRegister(Request $request){


        $request->validate([
            'email'=>'required|unique:admins',
            'password'=>'required|min:9|max:15',
            'cpassword'=>'required|same:password',
            'status'=>'required'
        ],[
            'cpassword.required'=>'confirm password field is required.'
        ]);

         // $messag = [

         //        'key'=>255,
         //        'status'=>'err'

         //    ];

        Admin::insert([
            'name'=>'Admin',
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'status'=>$request->status,
            'created_at'=>Carbon::now()


        ]);

        $message = [

                'key'=>200,
                'status'=>'success'

        ];

        
        return redirect()->back()->with($message);

    }


    
    public function DoLogout(Request $request){

        Auth::guard('admins')->logout();

        return redirect()->route('admin.loginview');

    }


    public function AddAdminView(){

        if(Auth::guard('admins')->user()->status != 1 ){

            return redirect()->back();
        }

        return view('admin.component.addadmin');
    }




}
