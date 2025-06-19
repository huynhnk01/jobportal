<?php

namespace App\Http\Controllers\Profile;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;
use App\Models\User;

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
        $data['education_level'] = 'high-school'; // Default value if not provided
        $candidate = Candidate::create($data);
        
        $user = User::find(Auth::id());
        $user->init_profile = true;
        $user->save();

        return redirect()->route('profile.candidate.info');
    }
}
