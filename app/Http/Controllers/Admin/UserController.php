<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    public function ShowUsers(){
        $users = DB::table('users')->orderBy('id', 'desc')
        ->get();
        $totalUsers=count($users);
        return view('backend.user' , compact('users','totalUsers'));

    }
}
