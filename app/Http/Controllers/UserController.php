<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show all users
     */
    public function index(): View
    {
       $users = User::with('roles')->get();
        return view('admin.users.users-list', [
            'users' => $users
        ]);
    }

    
    /**
     * Edit user
     */
    public function edit(User $user)
    {
        return view('admin.users.user-card', [
            'user' => $user,
        ]);
    }
}
