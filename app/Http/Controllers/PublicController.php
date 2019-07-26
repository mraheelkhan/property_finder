<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Slider;
class PublicController extends Controller
{
    public function index(){
        $slides = Slider::where('status', 'active')->get();
        $listings = Listing::where('status', 'active')->with('user')->with('area')->get();
        return view('public.home', compact('listings', 'slides'));
    }

    public function renting(){
        $rentsfeatured = Listing::where('status', 'active')->where('type', 'rent')->with('user')->with('area')->get();
        $rents = Listing::where('status', 'active')->where('type', 'rent')->with('user')->with('area')->get();
        return view('rents.index', compact('rents', 'rentsfeatured'));
    }
    public function sales(){
        $salesfeatured = Listing::where('status', 'active')->where('type', 'sale')->with('user')->with('area')->get();
        $sales = Listing::where('status', 'active')->where('type', 'sale')->with('user')->with('area')->get();
        return view('sales.index', compact('sales', 'salesfeatured'));
    }


}
