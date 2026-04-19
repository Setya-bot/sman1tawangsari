<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\SchoolProfile;
use App\Models\Ekskul;

class PublicController extends Controller
{
    public function home()
    {
        $profile = SchoolProfile::first();
        $ekskuls = Ekskul::latest()->take(6)->get();
        $carousels = Carousel::where('is_active', 1)
                                ->orderBy('order')
                                ->get();

        return view('public.home', compact('profile', 'ekskuls', 'carousels'));
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

    public function ekskul()
    {
        $ekskuls = Ekskul::latest()->get();

        return view('public.ekskul', compact('ekskuls'));
    }

    public function detailEkskul($id)
    {
        $profile = SchoolProfile::first();

        $ekskul = Ekskul::findOrFail($id);

        $others = Ekskul::where('id', '!=', $id)
                    ->latest()
                    ->take(3)
                    ->get();

        return view('public.ekskul_detail', compact('profile', 'ekskul', 'others'));
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

    public function sarana()
    {
        return view('public.sarana');
    }
    
    public function saranaDetail()
    {
        return view('public.sarana_detail');
    }

    public function spmb()
    {
        return view('public.spmb');
    }

    public function achievment()
    {
        return view('public.achievment');
    }

    public function alumni()
    {
        return view('public.alumni');
    }
}