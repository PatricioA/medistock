<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
         return view('users.index', compact('users'));
         //forma 2 
        //  return view('users.index')
        // ->with('users', User::all());
    }

    public function editar($id)
    {
        $users = User::findOrFail($id);
        return view('users.usuario-editar', compact('users'));
    }

    public function update(Request $request, $id)
    {

        $userUpdate = User::findOrFail($id);
        $userUpdate->name = $request->nombre;
        $userUpdate->email = $request->email;
        
        $userUpdate->save();

        // return view('users.index');

        return back();

    }
}


