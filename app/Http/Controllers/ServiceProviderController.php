<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceProvider;
use Auth;
class ServiceProviderController extends Controller
{
    public function services(){
        $user = Auth::user();
        $data = ServiceProvider::where('user_id', $user->id)->first();
        return view('profile.serviceprovider')->withData($data)->withUser($user);
    }

    public function toggle($sp, $service_id, $status){
        $user_id = Auth::user()->id;
        $service = ServiceProvider::findorFail($sp);

        switch($service_id){
            case 1: 
                // electrical systems
                $service->electrical_systems = $status;
                break;
            case 2:
                //concrete
                $service->concrete = $status;
                break;
            case 3:
                //concrete
                $service->steel_frames = $status;
                break;
            case 4:
                //concrete
                $service->ceiling = $status;
                break;
            case 5:
                //concrete
                $service->masonry = $status;
                break;
            case 6:
                //concrete
                $service->plumbing = $status;
                break;
            case 7:
                //concrete
                $service->windows = $status;
                break;
            case 8:
                //concrete
                $service->labour = $status;
                break;
            case 9:
                //concrete
                $service->transport = $status;
                break;
            default:
                return "nothing is changed";
                break;
        }
        $service->update();
        $array = array( 'msg' => 'successfully updated');
        return response($array);
    }
}
