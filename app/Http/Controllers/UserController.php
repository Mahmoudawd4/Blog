<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function register()
    {

        return view('admins.register');
    }
    public function handelRegister(Request $request)
    {
        $request->validate([
            'username'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:5|max:50'
        ]);

        User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        //Auth::login($admin);

        return redirect(route('admin.all'));
    }

    public function login()
    {
        return view('admins.login');
    }

    public function handelLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:5|max:50'
        ]);
      $is_login=Auth::attempt(['email'=>$request->email ,'password'=>$request->password]);

      if(! $is_login)
      {
          return redirect(route('admin.login'));

      }

      return redirect(route('post.all'));
    }

    public function edit($id)
    {
        $admin=User::findOrFail($id);
        return view('admins.edit',compact('admin'));

    }

    public function update($id ,Request $request)
    {
        $request->validate([
            'username'=>'required|string|max:100',
            'email'=>'required|email|max:100',
        ]);

        $admin=User::findOrFail($id);
        $admin->update([
            'username'=>$request->username,
            'email'=>$request->email,
        ]);

        return redirect(route('admin.edit',$id));

    }

    public function delete($id)
    {
        $admin=User::findOrFail($id);
        $admin->delete();
        return ;
    }


    public function allAdmin()
    {
        $admins=User::get();
        return view('admins.all',[
            'Admins'=>$admins
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('post.all'));
    }


}
