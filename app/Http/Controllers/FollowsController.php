<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        if (auth()->user() == null) {
            return response()->json(['error' => 'Unauthenticated.','status' => 401], 401);
        }
        return auth()->user()->following()->toggle($user->profile);
    }
}
