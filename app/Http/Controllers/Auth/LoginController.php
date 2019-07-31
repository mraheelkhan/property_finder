<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';
    public function redirectTo(){
        
        // User role
        $role = Auth::user()->role; 
        $status = Auth::user()->status;

        if($status != 'active'){
            Auth::logout();
            Session::flash('message', 'Your new Sector is added successfully. <script>swal.firePP("success","Added","Your Sector is Added Successfully");</script>'); 
        
            Session::flash('message', 'Your Account is not yet Activated, Please contact your Administrator<script>swal.firePP("Your not Authorize","Your Account is not yet Activated, Please contact your Administrator","error"); Your Account is not yet Activated, Please contact your Administrator</script>'); 
            return '/'; 
        }
        // Check user role
        switch ($role) {
            case 'admin':
                    return '/listings';
                break;
            case 'user':
                    return '/submited';
                break; 
            default:
                    return '/'; 
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
