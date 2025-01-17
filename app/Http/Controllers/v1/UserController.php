<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(User $user)
    {
        $user->region = Region::find($user->region);
        $user->nb_followers = count($user->followers()->get());
        $user->nb_following = count($user->following()->get());
        return response()->json($user);
    }

    public function account(Request $request){
        $user = $request->user();
        $user->region = Region::find($user->region);
        $user->nb_followers = count($user->followers()->get());
        $user->nb_following = count($user->following()->get());
        $user->followers = $user->followers()->get();
        $user->following = $user->following()->get();
        return response()->json($user);
    }

    public function index(string $search=''){

        $firstUsers = User::where('username', 'like', "$search%")->get();
        $lastUsers = User::where('username', 'like', "%$search%")->where('username', 'not like', "$search%")->get();
        return response()->json([...$firstUsers, ...$lastUsers]);
    }
}
