<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateEntryRequest;
use App\Http\Controllers\Controller;

use App\User;

class EntriesController extends Controller 
{
    public function index(User $user)
    {
        return response()->json([
            'entries' => $user->entries
        ]);
    }
}
