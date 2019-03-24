<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Gate;
use Session;
use App\User;
use App\Sector;
use App\City;

class CityController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        $this->middleware('auth');
    }
    public function index(){
        return view('cities.create');
    }

    // add new listing from create function
    public function create(){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $cities = City::all();
            return view('cities.create', compact('cities'));  
        } else{
            return view('forbidden');
        }

    }
    //store the created area
    public function store(Request $request){
        $userId = Auth::user()->id;
        $validated = $request->validate([   
            "city_name" => 'required|max:200',
            "status" => 'required|max:50',
            ]);
            
        City::create([
            'city_name' => request('city_name'),
            'status' => request('status')
        ]);
        Session::flash('message', 'Your new City is added successfully. <script>swal.firePP("success","Added","Your City is Added Successfully");</script>'); 
        return redirect('/city/create');
    }
    // show single listing 
    public function show($id){
        if(Gate::allows('onlyAdmin', $user)){
            $city = City::findorFail($id);
            return view('cities.single')->with('data', $city); 
        } else{
            return view('forbidden');
        }
    }

    public function delete($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $city = City::findorFail($id);
                $city->delete();
                Session::flash('message', 'Sector deleted. <script>swal.fire("success","Delete","Sector Deleted");</script>'); 
                return redirect('/sector/create');
        } else{
            return view('forbidden');
        }
        
    }
    public function activate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
                $city = City::findorFail($id);
                $city->status = "active";
                $city->update();
                Session::flash('message', 'City Activated. <script>swal.fire("success","Activated","City Activated");</script>'); 
                return redirect('/city/create');
        } else{
            return view('forbidden');
        }
        
    }
    public function deactivate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $city = City::findorFail($id);
            $city->status = "inactive";
            $city->update();
                Session::flash('message', 'City Deactivated. <script>swal.fire("success","Deactivated","City Deactivated");</script>'); 
                return redirect('/city/create');
        } else{
            return view('forbidden');
        }
        
    }

}
