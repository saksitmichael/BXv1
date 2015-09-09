<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Users extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'Users';
    protected $primaryKey = 'userID';
    protected $hidden = ['userPassword', 'remember_token'];

    public function getPasswordAttribute(){
        return $this->userPassword;
    }

}

