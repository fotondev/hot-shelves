<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;
use App\Entities\Repositories\ShelfRepository;

class CustomAuthController extends Controller
{
    /**
    * The shelf repository implementation.
    *
    * @var ShelfRepository
    */
    protected $shelfRepo;

    public function index()
    {
        return view('auth.login' );
    }

    public function store(LoginRequest $request)
    {
        $request->autenticate();
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::HOME)->with('message', 'Вход выполнен');
    }

    public function dashboard()
    {
        
        if (Auth::check()) {
            return view('admin.dashboard');
        }
        return redirect('login')->with('message', 'Доступ запрещен');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('login')->with('message', 'Выход выполнен');
    }
}
