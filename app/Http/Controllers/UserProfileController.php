<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Queries\CreatedContent;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Show the user profile page.
     */
    public function show(string $slug)
    {
        $user = User::where('slug', '=', $slug)->first();
        $content = (new CreatedContent)-> getContent($user);
        // dd($content);
        return view('admin.profiles.show', [
            'user' => $user,
            'content' => $content
        ]);
    }
}
