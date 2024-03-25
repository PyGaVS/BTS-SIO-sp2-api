<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(User $user)
    {
        $user->region = Region::find($user->region);
        return response()->json($user);
    }

    public function account(Request $request){
        $user = $request->user();
        $user->region = Region::find($user->region);
        return response()->json($user);
    }
}
