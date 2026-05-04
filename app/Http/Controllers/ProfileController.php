<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\CvContent;
use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function view()
    {
        $success = Session::get('success');
        $error = Session::get('error');
        $user = Auth::user();
        $user_information = $user->information;
        $user_cv_content = $user->cv->cvContents;
        $evaluation = $user->evaluation_recipient;
        return view('profile.view' , compact('user' , 'user_information' , 'user_cv_content' , 'success' , 'error' , 'evaluation'));
    }

    public function viewTo(User $user)
    {
        $evaluation = $user->evaluation_recipient;
        $user_information = $user->information;
        $user_cv_content = $user->cv->cvContents;
        $evaluations_sender = Auth::user()->evaluations_sender;
        return view('profile.view-to' , compact('user' , 'user_information' , 'user_cv_content' , 'evaluations_sender' , 'evaluation'));
    }
}
