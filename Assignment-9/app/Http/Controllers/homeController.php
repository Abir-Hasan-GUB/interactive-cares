<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index() {
        $posts = Post::with('user')->get();
        $user = User::find(Auth::id());
        return view('pages.index', compact('posts', 'user'));
    }
}
