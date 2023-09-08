<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevolucionController extends Controller
{
    public function devolver()
    {
        $users = User::findOrFail($id);
        return view('users.usuario-editar', compact('users'));
    }
}
