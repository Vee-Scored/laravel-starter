<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index () {
        $u = new User();
        $users = $u->paginate(5);
        return view("user.index",compact("users"));
    }

    public function search (Request $request) {
        $query = $request->input("query");
        $users = User::where("name","LIKE","%$query%")->orWhere("email","LIKE","%$query%")->get();
        return view("user.index",compact("users"));
    }
}


