<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    
    public function index()
    {
         $users = User::all();
    return view('admin.users', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('admin.show', compact('user'));
    }
    public function destroy(User $user)
    {
        $user->delete();
       return redirect(route('admin.index'));


    }
}   