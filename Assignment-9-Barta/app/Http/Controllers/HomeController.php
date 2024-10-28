<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        $user  = User::find(Auth::id());
        return view('pages.index', compact('posts', 'user'));
    }

    public function search(Request $request)
    {

        $request->validate([
            'search' => 'required|max:255',
        ]);

        $search_input = $request->search;

        if (str_starts_with($search_input, '@')) {
            $search_input = ltrim($search_input, '@'); // Remove "@" for searching
        }

        $users = User::where('username', 'like', '%' . $search_input . '%')
            ->orWhere('email', 'like', '%' . $search_input . '%')
            ->orWhereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ['%' . $search_input . '%'])
            ->get();

        $userIds = $users->pluck('id');

        $posts = Post::with('user')->whereIn('user_id', $userIds)->get();
        $user  = User::find(Auth::id());

        return view('pages.index', compact('posts', 'user'));
    }
}
