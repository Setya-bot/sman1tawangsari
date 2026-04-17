<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\SchoolProfile;
use App\Models\Extracurricular;

class PublicController extends Controller
{
    public function home()
    {
        $profile = SchoolProfile::first();
        $extras = Extracurricular::latest()->take(6)->get();
        $carousels = Carousel::where('is_active', 1)
                                ->orderBy('order')
                                ->get();

        return view('public.home', compact('profile', 'extras', 'carousels'));
    }

    public function profile()
    {
        $profile = SchoolProfile::first();

        return view('public.profile', compact('profile'));
    }

    public function ekstrakurikuler()
    {
        $extras = Extracurricular::latest()->get();

        return view('public.ekstrakurikuler', compact('extras'));
    }
}