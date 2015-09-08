<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users;
use Hash;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getRegister(){
        return view('register');
    }

    public function postRegister(Request $request){
    	$input = $request->all();
    	$user = new Users;
        // $user->userID
        $user->userName = $input['userName'];
        $user->userSurname = $input['userSurname'];
        $user->userPhone = $input['userPhone'];
        $user->userEmail = $input['userEmail'];
        $user->userPassword = Hash::make($input['password']);
        $user->userKind = $input['userKind'];
        $user->userOrganization = $input['userOrganization'];
        $user->userCountry = $input['userCountry'];

        $user->mailConfirm = 0;
    	$user->mailSubscribe = 0;
    	$user->save();

    	return response()->json('done'=>true);
        // return $input;

    }

    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $input = $request->all();

        
    }

}
