<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use Session;
use App\User;
use App\City;
use App\Sector;
use App\ListingArea;
use App\Listing;

class ListingAreaController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        $this->middleware('auth');
    }
    public function index(){
        return view('listingarea.listingarea');
    }

    // add new listing from create function
    public function create(){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $areas = ListingArea::where('status', 'active')->get();
            $sectors = Sector::where('status', 'active')->get();
            $cities = City::where('status', 'active')->get();
            return view('listingarea.create', compact('areas', 'sectors', 'cities'));  
        } else{
            return view('forbidden');
        }

    }
    //store the created area
    public function store(Request $request){
        $userId = Auth::user()->id;
        $validated = $request->validate([   
            "area_name" => 'required|max:50',
            "sector_name" => 'required|max:200',
            "city_id" => 'required|max:100',
            "status" => 'required|max:50',
            ]);
            
        
        ListingArea::create([
            'area_name' => request('area_name'),
            'sector_name' => request('sector_name'),
            'city_id' => request('city_id'),
            'status' => request('status')
        ]);
        Session::flash('message', 'Your new Area is added successfully. <script>swal.firePP("success","Added","Your Area is Added Successfully");</script>'); 
        return redirect('/area/create');
    }
    // show single listing 
    public function show($id){
        if(Gate::allows('onlyAdmin', $user)){
            $listing = ListingArea::findorFail($id);
            return view('listingarea.single')->with('data', $listing); 
        } else{
            return view('forbidden');
        }
    }

    public function delete($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $area = ListingArea::findorFail($id);
            $listing = Listing::where('listing_area_id', $id)->count();
            if($listing <= 0){
                $area->delete();
                Session::flash('message', 'Area deleted. <script>swal.fire("success","Delete","Area Deleted");</script>'); 
                return redirect('/area/create');
                
            } 
            Session::flash('error', 'Sector cannot deleted.  because it has other records. <script>swal.fire("Cannot","Sector Cannot Deleted because it has other records.","error");</script>'); 
            return redirect('/area/create');
               
        } else{
            return view('forbidden');
        }
        
    }
    public function activate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
                $area = ListingArea::findorFail($id);
                $area->status = "active";
                $area->update();
                Session::flash('message', 'Area Activated. <script>swal.fire("success","Activated","Area Activated");</script>'); 
                return redirect('/area/create');
        } else{
            return view('forbidden');
        }
        
    }
    public function deactivate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $area = ListingArea::findorFail($id);
            $area->status = "inactive";
            $area->update();
                Session::flash('message', 'Area Deactivated. <script>swal.fire("success","Deactivated","Area Deactivated");</script>'); 
                return redirect('/area/create');
        } else{
            return view('forbidden');
        }
        
    }


}
