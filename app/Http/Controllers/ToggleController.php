<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ToggleController extends Controller
{
    public function toggleTheme(Request $request)
    {
        $theme = $request->input('theme');

        // Simpan status toggle ke dalam cookie
        Cookie::queue('theme_mode', $theme, 60 * 24 * 30); // Cookie akan berakhir dalam 30 hari (opsional)

        return response()->json(['success' => true]);
    }
}
