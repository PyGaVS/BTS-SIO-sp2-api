<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\User;

class UserController extends Controller
{
    public function show(int $id)
    {
        $user = User::find($id);
        $user->region = Region::find($user->region);
        return response()->json($user);
    }
}
