<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use Session;
use App\City;
use App\User;
use App\Sector;
use App\ListingArea;

class SectorController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        $this->middleware('auth');
    }
    public function index(){
        return view('sectors.create');
    }

    // add new listing from create function
    public function create(){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $sectors = Sector::all();
            $cities = City::where('status', 'active')->get();
            return view('sectors.create', compact('sectors', 'cities'));  
        } else{
            //return "you are not authorize to this action";
            return view('forbidden');
        }

    }
    //store the created area
    public function store(Request $request){
        $userId = Auth::user()->id;
        $validated = $request->validate([   
            "sector_name" => 'required|max:200',
            "city_id" => 'required|max:100',
            "status" => 'required|max:50',
            ]);
            
        Sector::create([
            'sector_name' => request('sector_name'),
            'city_id' => request('city_id'),
            'status' => request('status')
        ]);
        Session::flash('message', 'Your new Sector is added successfully. <script>swal.firePP("success","Added","Your Sector is Added Successfully");</script>'); 
        return redirect('/sector/create');
    }
    // show single listing 
    public function show($id){
        if(Gate::allows('onlyAdmin', $user)){
            $sector = Sector::findorFail($id);
            return view('sectors.single')->with('data', $sector); 
        } else{
            return view('forbidden');
        }
    }

    public function delete($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $sector = Sector::findorFail($id);
            $areas = ListingArea::where('sector_name', $id)->count();
            if($areas <= 0){
                $sector->delete();
                Session::flash('message', 'Sector deleted. <script>swal.fire("success","Delete","Sector Deleted");</script>'); 
                return redirect('/sector/create');
                
            } 
            Session::flash('error', 'Sector cannot deleted.  because it has other records. <script>swal.fire("Cannot","Sector Cannot Deleted because it has other records.","error");</script>'); 
             return redirect('/sector/create');
                
        } else{
            return view('forbidden');
        }
        
    }
    public function activate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
                $sector = Sector::findorFail($id);
                $sector->status = "active";
                $sector->update();
                Session::flash('message', 'Sector Activated. <script>swal.fire("success","Activated","Sector Activated");</script>'); 
                return redirect('/sector/create');
        } else{
            return view('forbidden');
        }
        
    }
    public function deactivate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $sector = Sector::findorFail($id);
            $sector->status = "inactive";
            $sector->update();
                Session::flash('message', 'Sector Deactivated. <script>swal.fire("success","Deactivated","Sector Deactivated");</script>'); 
                return redirect('/sector/create');
        } else{
            return view('forbidden');
        }
        
    }


}
