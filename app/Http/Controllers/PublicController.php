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

    public function history()
    {
        $profile = SchoolProfile::first();

        return view('public.history', compact('profile'));
    }

    public function service()
    {
        return view('public.service');
    }

    public function studentship()
    {
        return view('public.studentship');
    }

    public function ekstrakurikuler()
    {
        $extras = Extracurricular::latest()->get();

        return view('public.ekstrakurikuler', compact('extras'));
    }

    public function detailEkstrakurikuler($id)
    {
        $profile = SchoolProfile::first();

        $extra = Extracurricular::findOrFail($id);

        $others = Extracurricular::where('id', '!=', $id)
                    ->latest()
                    ->take(3)
                    ->get();

        return view('public.ekstrakurikuler_detail', compact('profile', 'extra', 'others'));
    }

    public function academic()
    {
        return view('public.academic');
    }
    public function gtk()
    {
        return view('public.gtk');
    }

    public function opening()
    {
        return view('public.opening');
    }
}