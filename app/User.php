<?php

namespace App;

// use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract{

    use Authenticatable, Authorizable;

    protected $table = 'user';
    public $timestamps = false;

    protected $fillable = ['name', 'api_token', 'role'];

    protected $hidden = ['password'];

    /**
    * Get the identifier that will be stored in the subject claim of the JWT.
    *
    * @return mixed
    *
    *  public function getJWTIdentifier(){
    * return $this->getKey();
    *}

    *
    * Return a key value array, containing any custom claims to be added to the JWT.
    *
    * @return array
    *
    * public function getJWTCustomClaims(){
    *   return [];
    *}
    */
}
