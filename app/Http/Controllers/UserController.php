<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        $user = new User;
        $user->name = $request->nombre;
        $user->email =  $request->email;
        //$user->rol =  $request->rol;
        $user->password = bcrypt($request->password);
        $user->status = $request->estado;
        $user->save();
        return redirect('users');
    }
    public function edit($id){
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->nombre;
        $user->email =  $request->email;
        //$user->rol =  $request->rol;
        $user->status = $request->estado;
        $user->save();
        return redirect('users');
    }
    public function delete($id){
        $user = User::find($id)->delete();
        return redirect('users');
    }
}
