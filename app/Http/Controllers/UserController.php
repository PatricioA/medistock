<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
         return view('users.index', compact('users'));
         //forma 2 
        //  return view('users.index')
        // ->with('users', User::all());
    }
}
