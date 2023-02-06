<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
     /**
     * Show all roles and permissons
     */
    public function index(): View
    {
        return view('admin.roles.roles-list', [
            'roles' => Role::all()
        ]);
    }
}
