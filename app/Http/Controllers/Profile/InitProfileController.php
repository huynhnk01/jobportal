<?php

namespace App\Http\Controllers\Profile;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;

class InitProfileController extends Controller
{
    /**
     * Show the initial profile setup page.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('profile.init-profile');
    }

    public function store(CandidateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = Auth::user()->id;
        $candidate = Candidate::create($data);

        return redirect()->route('profile.candidate.info');
    }
}
