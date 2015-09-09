<?php namespace App\Http\Requests;
      use Illuminate\Foundation\Http\FormRequest;
class LoginRequest extends FormRequest {
 
      public function rules(){
           return [
             'userEmail' => 'required|email',
             'userPassword' => 'required'
            ];
      }
 
      public function authorize(){
           return true;
      }
}
