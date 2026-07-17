<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserPreferenceController extends Controller
{
    public function updateTheme(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:dark,light',
        ]);

        $request->user()->preferences()->updateOrCreate(
            ['user_id' => $request->user()->id],
            ['theme' => $request->theme]
        );

        return back()->with('success', 'Theme updated successfully.');
    }
}
