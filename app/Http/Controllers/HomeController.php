<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Slider;
use Gate;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function slideImages(){
        $slides = Slider::all();
        return view('admin.slider', compact('slides'));
    }

    public function storeSlideImages(Request $request){
        $userid = Auth::user()->id;
        $slider = new Slider;
        if ($request->hasFile('slider_image')) { 
            $image = $request->file('slider_image'); 
            $image_name = time().'_'.$image->getClientOriginalName(); 
            $destinationPath = public_path().'/images/sliders'; 
            $upload = $image->move($destinationPath, $image_name); 
        }

        $slider->slider_name = $image_name;
        $slider->user_id = $userid;
        $slider->status = $request->status;

        $slider->save();
        Session::flash('message', 'Your slider is updated. <script>swal("success","Updated","Your Slider is Updated Successfully");</script>'); 
        return redirect('/sliders');
    }

    public function delete($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $slide = Slider::findorFail($id);
            $slide->delete();
            Session::flash('message', 'slider deleted. <script>swal.fire("success","Delete","slider Deleted");</script>'); 
            return redirect('/sliders');
                
        } else{
            return view('forbidden');
        }
        
    }
    public function activate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
                $slide = Slider::findorFail($id);
                $slide->status = "active";
                $slide->update();
                Session::flash('message', 'slider Activated. <script>swal.fire("success","Activated","slider Activated");</script>'); 
                return redirect('/sliders');
        } else{
            return view('forbidden');
        }
        
    }
    public function deactivate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $slide = Slider::findorFail($id);
            $slide->status = "inactive";
            $slide->update();
                Session::flash('message', 'slider Deactivated. <script>swal.fire("success","Deactivated","slider Deactivated");</script>'); 
                return redirect('/sliders');
        } else{
            return view('forbidden');
        }
        
    }
    
}
