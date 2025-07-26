<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function homepage()
    {
        return view('pages.homepage');
    }

    public function contactUs()
    {
        return view('pages.contact-us');
    }

    public function projects()
    {
        return view('pages.projects');
    }

    public function pricing()
    {
        return view('pages.pricing');
    }

    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function jobs()
    {
        return view('pages.jobs');
    }

    public function assetLibrary()
    {
        return view('pages.asset-library');
    }

    public function courses()
    {
        return view('pages.courses');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function marketing()
    {
        return view('pages.marketing');
    }

    public function architecturalVisualization()
    {
        return view('pages.architectural-visualization');
    }

    public function gtcs()
    {
        return view('pages.gtcs');
    }

    public function impressum()
    {
        return view('pages.impressum');
    }

    // Project Pages
    public function caronParisProject()
    {
        return view('pages.projects.caron-paris');
    }

    public function gdivineVisualizationProject()
    {
        return view('pages.projects.gdivine-visualization');
    }

    public function tomFordProject()
    {
        return view('pages.projects.tom-ford');
    }

    public function bois1920Project()
    {
        return view('pages.projects.bois-1920');
    }

    public function gdivineAnimationProject()
    {
        return view('pages.projects.gdivine-animation');
    }

    public function hyaluronceProject()
    {
        return view('pages.projects.hyaluronce');
    }
}
