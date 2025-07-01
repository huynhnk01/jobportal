<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class VerifyEmailStatusController extends Controller
{
    /**
     * Check if the authenticated user's email is verified.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function check()
    {
        return response()->json([
            'verified' => Auth::check() && Auth::user()->email_verified_at !== null,
        ]);
    }
}
