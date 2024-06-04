<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        // Obtener el ID del grupo del usuario autenticado
        $groupId = Auth::user()->group_id;

        // Obtener los usuarios del grupo correspondiente
        $users = Group::find($groupId)->users;

        // Puedes pasar los usuarios a una vista para mostrarlos
        return view('home', compact('users'));
    }
}
