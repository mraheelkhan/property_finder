<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
class PublicController extends Controller
{
    public function index(){
    	return view('public.home');
    }

    public function renting(){
        $rentsfeatured = Listing::where('status', 'active')->where('type', 'rent')->with('user')->with('area')->limit(2)->get();
        $rents = Listing::where('status', 'active')->where('type', 'rent')->with('user')->with('area')->get();
        return view('rents.index', compact('rents', 'rentsfeatured'));
    }
    public function sales(){
        $salesfeatured = Listing::where('status', 'active')->where('type', 'sale')->with('user')->with('area')->limit(2)->get();
        $sales = Listing::where('status', 'active')->where('type', 'sale')->with('user')->with('area')->get();
        return view('sales.index', compact('sales', 'salesfeatured'));
    }

}
