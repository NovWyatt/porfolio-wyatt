<?php

namespace App\Http\Controllers;

use App\Models\AboutMe;
use App\Models\Contact;
use App\Models\Footer;
use App\Models\Social;
use App\Models\Work;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $socials = Social::orderBy('sort_order', 'asc')->get();
        $aboutMe = AboutMe::first();
        $contacts = Contact::active()->ordered()->get();
        $footer = Footer::first();
        $works = Work::active()->ordered()->get();
        return view('portfolio', compact('socials','aboutMe','contacts','footer','works'));
    }
}
