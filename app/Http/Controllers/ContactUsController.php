<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required' , 'string'],
            'email' => ['required' , 'email'],
            'content' => ['required' , 'string'],
        ]);

        ContactUs::create($validated);
        return back()->with('success' , 'ok') ;
    }
}
