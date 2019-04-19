<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use App\User;
use App\ServiceProvider;
use Gate;
use Session;
class AdminController extends Controller
{
    public function __construct()
    {
        $user = Auth::user();
        $this->middleware('auth');
    }
    public function index(){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $users = User::all();
            return view('admin.create')->withUsers($users);
        } else{
            return view('forbidden');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'address' => ['string', 'max:255'],
            'phone' => ['required','unique:users', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $data)
    {
        $validated =$data->validate([  
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required','unique:users', 'string', 'max:255'],
            'address' => ['string', 'max:255'],
            'phone' => ['required', 'unique:users',  'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $newAddedUser = User::create([
            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'status' => $data['status'],
            'password' => Hash::make($data['password']),
        ]);
        if( $newAddedUser->role == 'sp' ){
            $sp = ServiceProvider::create([
                'user_id' => $newAddedUser->id,
                'electrical_systems' => '0',
                'concrete' => '0',
                'steel_frames' => '0',
                'ceiling' => '0',
                'masonry' => '0',
                'plumbing' => '0',
                'windows' => '0',
                'labour' => '0',
                'transport' => '0',
                'comment' => 'new use added',
            ]);
        }
        Session::flash('message', 'User Added Successfully. <script>swal.fire("Added","User Added","success");</script>'); 
        return back();
    }

    public function activate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
                $user = User::findorFail($id);
                $user->status = "active";
                $user->update();
                Session::flash('message', 'User Activated. <script>swal.fire("Activated","User Activated","successUser Activated");</script>'); 
                return redirect('/admin/users');
        } else{
            return view('forbidden');
        }
        
    }
    public function deactivate($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $user = User::findorFail($id);
            $user->status = "inactive";
            $user->update();
                Session::flash('message', 'User Deactivated. <script>swal.fire("success","User Deactivated","success");</script>'); 
                return redirect('/admin/users');
        } else{
            return view('forbidden');
        }
        
    }

    public function delete($id){
        $user = User::class;
        if(Gate::allows('onlyAdmin', $user)){
            $user = User::findorFail($id);
            if($user->id == Auth::user()->id){
                return view('forbidden');
            }
            $user->delete();
                Session::flash('message', 'User Deleted. <script>swal.fire("Deleted","User Deleted","success");</script>'); 
                return redirect('/admin/users');
        } else{
            return view('forbidden');
        }
        

    }
}
