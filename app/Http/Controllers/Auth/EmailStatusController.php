<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class EmailStatusController extends Controller
{
    public function check()
    {
        return response()->json([
            'verified' => Auth::check() && Auth::user()->email_verified_at !== null,
        ]);
    }
}
