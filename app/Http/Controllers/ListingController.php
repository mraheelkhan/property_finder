<<<<<<< HEAD
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\ListingArea;
use App\Comment;
use Auth;
use Session;
use Gate;
use App\User;
class ListingController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        $this->middleware('auth')->except('show');
    }
	// index function by default
    public function index(){
        $user_id = Auth::user()->id;
        $listings = Listing::where('user_id', $user_id)->with('area')->get();
        $areas = ListingArea::where('status', 'active')->with('sector')->get();
        return view('listing.my_listing')->with('listings', $listings)->with('areas', $areas);
    }

    // add new listing from create function
    public function create(){
        $areas = ListingArea::where('status', 'active')->with('sector')->get();
    	return view('listing.create')->with('areas', $areas);
    }

     //store the new listing
    public function store(Request $request){
        $userid = Auth::user()->id;
        $listing = new Listing;
        $validated = $request->validate([   
            "title" => 'required|max:50',
            "description" => 'required|max:200',
            "street" => 'max:100',
            "house" => 'required|max:50',
            "listing_area_id" => 'required|max:100',
            "ad_type" => 'required',
            "price" => 'required|numeric',
            "pricing_type" => 'required',
            "contact1" => 'nullable|numeric',
            "contact2" => 'nullable|numeric',
            "garages" => 'nullable|numeric',
            "bedrooms" => 'required|numeric',
            "washrooms" => 'required|numeric',
            "siderooms" => 'nullable|numeric',
            "floors" => 'nullable|numeric',
            "kitchens" => 'nullable|numeric',
            "comment" => 'max:150',
            "description" => 'max:1000',
            "featured_image" => 'required|mimes:jpeg,jpg,png'
        ]);
         if ($request->hasFile('featured_image')) { 
            $image = $request->file('featured_image'); 
            $image_name = time().'_'.$image->getClientOriginalName(); 
            $destinationPath = public_path().'/images'; 
            $upload = $image->move($destinationPath, $image_name); 
         }
        $listing->user_id = $userid;
        $listing->title = $request->title;
        $listing->description = $request->description;
        $listing->street_name = $request->street;
        $listing->house = $request->house;
        $listing->listing_area_id = $request->listing_area_id;
        $listing->type = $request->ad_type;
        $listing->price = $request->price;
        $listing->price_type = $request->pricing_type;
        $listing->contact1 = $request->contact1;
        $listing->contact2 = $request->contact2;
        $listing->garages = $request->garages;
        $listing->bedrooms = $request->bedrooms;
        $listing->bathroom = $request->washrooms;
        $listing->siderooms = $request->siderooms;
        $listing->floors = $request->floors;
        $listing->kitchens = $request->kitchens;
        $listing->featured_image = $image_name;
        $listing->comment = $request->comment;
        $listing->status = 'active';
        $listing->save();
        Session::flash('message', 'Your Ad is submitted. <script>swal("success","Submitted","Your Ad is submitted Successfully");</script>'); 
        return redirect('submit/create');
    }

    

    // show single listing 
    public function show($id){
        $listing = Listing::findorFail($id);
        $comments = Comment::where('listing_id', $id)->with('user')->where('status', 'active')->orderBy('id', 'desc')->get();
        
        return view('listing.single')->with('data', $listing)->with('comments', $comments);
    }

    // editing page listing 
    public function edit($id){

    }

    // update and save the edited listing
    public function update(Request $request){

    }

    // destroy or delete the listing
    public function delete($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $listing = Listing::findorFail($id);
                $listing->delete();
                Session::flash('message', 'Area deleted. <script>swal.fire("success","Delete","Area Deleted");</script>'); 
                return redirect('/submited');
        } else{
            return view('forbidden');
        }
        
    }

    // deactivate the listing 
    public function deactivate($id){
        $listing = Listing::findorFail($id);
        if(Auth::user()->id == $listing->user_id){
            $listing->status = "inactive";
            $listing->update();
            Session::flash('message', 'Ad Deactivated. <script>swal.fire("success","Deactivated","Ad Deactivated");</script>'); 
            if(Auth::user()->role == 'admin'){
                return redirect()->back();
            }
        }
                return redirect()->back();
    }

    // activate the listing 
    public function activate($id){
        $listing = Listing::findorFail($id);
        if(Auth::user()->id == $listing->user_id){
            $listing->status = "active";
            $listing->update();
            Session::flash('message', 'Ad Activated. <script>swal.fire("success","Activated","Ad Activated");</script>'); 
            if(Auth::user()->role == 'admin'){
                return redirect()->back();
            }
        }
                return redirect()->back();
    }

    //admin view of all list
    public function listinglist(){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $lists = Listing::all();
            return view('listing.listinglist', compact('lists'));
        } 
        return view('forbidden');
    }


}
=======
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\ListingArea;
use App\Comment;
use Auth;
use Session;
use Gate;
use App\User;
class ListingController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        $this->middleware('auth')->except('show');
    }
	// index function by default
    public function index(){
        $user_id = Auth::user()->id;
        $listings = Listing::where('user_id', $user_id)->with('area')->get();
        $areas = ListingArea::where('status', 'active')->with('sector')->get();
        return view('listing.my_listing')->with('listings', $listings)->with('areas', $areas);
    }

    // add new listing from create function
    public function create(){
        $areas = ListingArea::where('status', 'active')->with('sector')->get();
    	return view('listing.create')->with('areas', $areas);
    }

     //store the new listing
    public function store(Request $request){
        $userid = Auth::user()->id;
        $listing = new Listing;
        $validated = $request->validate([   
            "title" => 'required|max:50',
            "description" => 'required|max:200',
            "street" => 'max:100',
            "house" => 'required|max:50',
            "listing_area_id" => 'required|max:100',
            "ad_type" => 'required',
            "price" => 'required|numeric',
            "pricing_type" => 'required',
            "contact1" => 'nullable|numeric',
            "contact2" => 'nullable|numeric',
            "garages" => 'nullable|numeric',
            "bedrooms" => 'required|numeric',
            "washrooms" => 'required|numeric',
            "siderooms" => 'nullable|numeric',
            "floors" => 'nullable|numeric',
            "kitchens" => 'nullable|numeric',
            "comment" => 'max:150',
            "description" => 'max:1000',
            "featured_image" => 'required|mimes:jpeg,jpg,png'
        ]);
         if ($request->hasFile('featured_image')) { 
            $image = $request->file('featured_image'); 
            $image_name = time().'_'.$image->getClientOriginalName(); 
            $destinationPath = public_path().'/images'; 
            $upload = $image->move($destinationPath, $image_name); 
         }
        $listing->user_id = $userid;
        $listing->title = $request->title;
        $listing->description = $request->description;
        $listing->street_name = $request->street;
        $listing->house = $request->house;
        $listing->listing_area_id = $request->listing_area_id;
        $listing->type = $request->ad_type;
        $listing->price = $request->price;
        $listing->price_type = $request->pricing_type;
        $listing->contact1 = $request->contact1;
        $listing->contact2 = $request->contact2;
        $listing->garages = $request->garages;
        $listing->bedrooms = $request->bedrooms;
        $listing->bathroom = $request->washrooms;
        $listing->siderooms = $request->siderooms;
        $listing->floors = $request->floors;
        $listing->kitchens = $request->kitchens;
        $listing->featured_image = $image_name;
        $listing->comment = $request->comment;
        $listing->status = 'active';
        $listing->save();
        Session::flash('message', 'Your Ad is submitted. <script>swal("success","Submitted","Your Ad is submitted Successfully");</script>'); 
        return redirect('submit/create');
    }

    

    // show single listing 
    public function show($id){
        $listing = Listing::findorFail($id);
        $areas = ListingArea::where('status', 'active')->with('sector')->get();
        $comments = Comment::where('listing_id', $id)->with('user')->where('status', 'active')->get();
        
        return view('listing.single')->with('data', $listing)->with('comments', $comments)->with('areas', $areas);
    }

    // editing page listing 
    public function edit($id){
        
    }

    // update and save the edited listing
    public function update(Request $request){
        $userid = Auth::user()->id;
        $ad_id = $request->ad_id;
        $listing = Listing::findOrFail($ad_id);
        $validated = $request->validate([   
            "title" => 'required|max:50',
            "description" => 'required|max:200',
            "street" => 'max:100',
            "house" => 'required|max:50',
            "listing_area_id" => 'required|max:100',
            "ad_type" => 'required',
            "price" => 'required|numeric',
            "pricing_type" => 'required',
            "contact1" => 'nullable|numeric',
            "contact2" => 'nullable|numeric',
            "garages" => 'nullable|numeric',
            "bedrooms" => 'required|numeric',
            "washrooms" => 'required|numeric',
            "siderooms" => 'nullable|numeric',
            "floors" => 'nullable|numeric',
            "kitchens" => 'nullable|numeric',
            "comment" => 'max:150',
            "description" => 'max:1000',
            "featured_image" => 'required|mimes:jpeg,jpg,png'
        ]);
         if ($request->hasFile('featured_image')) { 
            $image = $request->file('featured_image'); 
            $image_name = time().'_'.$image->getClientOriginalName(); 
            $destinationPath = public_path().'/images'; 
            $upload = $image->move($destinationPath, $image_name); 
         }
        $listing->user_id = $userid;
        $listing->title = $request->title;
        $listing->description = $request->description;
        $listing->street_name = $request->street;
        $listing->house = $request->house;
        $listing->listing_area_id = $request->listing_area_id;
        $listing->type = $request->ad_type;
        $listing->price = $request->price;
        $listing->price_type = $request->pricing_type;
        $listing->contact1 = $request->contact1;
        $listing->contact2 = $request->contact2;
        $listing->garages = $request->garages;
        $listing->bedrooms = $request->bedrooms;
        $listing->bathroom = $request->washrooms;
        $listing->siderooms = $request->siderooms;
        $listing->floors = $request->floors;
        $listing->kitchens = $request->kitchens;
        $listing->featured_image = $image_name;
        $listing->comment = $request->comment;
        $listing->status = 'active';
        $listing->save();
        Session::flash('message', 'Your Ad is Updated. <script>swal("success","Updated","Your Ad is Updated Successfully");</script>'); 
        return redirect('submit/create');
    }

    // destroy or delete the listing
    public function delete($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $listing = Listing::findorFail($id);
                $listing->delete();
                Session::flash('message', 'Area deleted. <script>swal.fire("success","Delete","Area Deleted");</script>'); 
                return redirect('/submited');
        } else{
            return view('forbidden');
        }
        
    }

    // deactivate the listing 
    public function deactivate($id){
        $listing = Listing::findorFail($id);
        if(Auth::user()->id == $listing->user_id){
            $listing->status = "inactive";
            $listing->update();
            Session::flash('message', 'Ad Deactivated. <script>swal.fire("success","Deactivated","Ad Deactivated");</script>'); 
            if(Auth::user()->role == 'admin'){
                return redirect()->back();
            }
        }
                return redirect()->back();
    }

    // activate the listing 
    public function activate($id){
        $listing = Listing::findorFail($id);
        if(Auth::user()->id == $listing->user_id){
            $listing->status = "active";
            $listing->update();
            Session::flash('message', 'Ad Activated. <script>swal.fire("success","Activated","Ad Activated");</script>'); 
            if(Auth::user()->role == 'admin'){
                return redirect()->back();
            }
        }
                return redirect()->back();
    }

    //admin view of all list
    public function listinglist(){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $lists = Listing::all();
            return view('listing.listinglist', compact('lists'));
        } 
        return view('forbidden');
    }


}
>>>>>>> 7ff8dc08c8c40aefdc678b0d223e6673d8659d6a
