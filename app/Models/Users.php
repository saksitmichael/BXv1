<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'User';

    // protected $v = $Validator::make($data, [
    // 		'Name' => 'required',
    // 		'Surname' => 'required',
    // 		'Phone' =>  'required',
    // 		'Email' => 'required|email|unique:User',
    // 		'Password' => 'required|confirmed',
    // 		'Confirm Password' => 'required',
    // 		'Organization' => 'required'
    // 	]);

    // protected $hidden = ['password', 'remember_token'];

}
