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
use Auth;
// use Redirect;
// use App\Http\Requests\LoginRequest;
// use App\Http\Controllers\Auth\AuthController;

class UserController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getRegister(){
        return view('auth/register');
    }

    public function postRegister(Request $request){
    	$input = $request->all();
    	$user = new Users;
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

    	return response()->json(['done'=>true]);
    }

    public function getLogin(){
        return view('auth/login');
    }

    public function getLogout(){
        Auth::logout();
        return 'Log out Successful';
    }

    public function postLogin(Request $request){
 
        $input = $request->all();
        $credentials = [
            'userEmail' => $input['userEmail'],
            'password' => $input['userPassword'],
        ];
        if (Auth::attempt($credentials)){
            return 'Success!';
        }
        else{
            return 'Failed';
        }
        // return ($this->authentication($request));
    }

    public function getUser(){
        if(Auth::check()){
            return Auth::user();
        }else{
            return 'Didn\'t log in';
        }
    }


    public function get(){
        return $this->getLogin();
    }

    public function post(Request $request){
        return $this->postLogin($request);
    }

}
