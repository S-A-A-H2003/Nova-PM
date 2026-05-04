<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Change the application language and store it in session
     */
    public function switch(Request $request, string $locale)
    {
        // Validate the locale (only allow 'ar' and 'en')
        if (!in_array($locale, ['ar', 'en'])) {
            abort(400, 'Invalid locale');
        }

        // Store the locale in session
        session(['locale' => $locale]);

        // Set the application locale
        app()->setLocale($locale);

        // Redirect back to the previous page
        return redirect()->back();
    }
}
