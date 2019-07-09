<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Category;
use App\Role;


class UserController extends Controller
{
    public function show(){
        $user = Auth::user();
        $categories = Category::all();

        if($user->role_id == 1){
           return view('admin')->with('user', $user)->with('categories', $categories);
        }else{
            return view('profile')->with('user', $user);
        }

    }

    protected function update(Request $data){

        $rules = [
            'name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'phone' => ['numeric'],
            'birthday'=>['date']

          ];

          $messages = [
            'string' => 'El campo :attribute debe contener solo letras',
            'max' => 'El campo :attribute debe tener como máximo :max caracteres',
            'numeric'=> 'Ingrese solo números',
            'date'=>'Ingrese una fecha válida'
          ];

         $this->validate($data, $rules, $messages);
        $user = User::find($data->id);
         if($data->name != null){
            $user->name = $data->name;
         }
         if($data->last_name != null){
            $user->last_name = $data->last_name;
         }
        $user->phone = $data->phone;
        $user->birthday = $data->birthday;

        $user->save();

        return redirect("/profile");
    }

    protected function index(){
        $users = User::paginate(20);

        return view('userslist')->with('users', $users);
    }

    protected function edit($id){
        $user =User::find($id);
        $roles = Role::all();
        return view('edituser')->with('user', $user)->with('roles', $roles);

    }

    protected function adminupdate(Request $data){
        $user = User::find($data->id);
        if($data->name != null){
            $user->name = $data->name;
         }
         if($data->last_name != null){
            $user->last_name = $data->last_name;
         }
         if($data->role_id != null){
            $user->role_id = $data->role_id;
         }
        $user->phone = $data->phone;
        $user->birthday = $data->birthday;
        $user->save();

        return redirect('/admin/userslist');

    }

}
