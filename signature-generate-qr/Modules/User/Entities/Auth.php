<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $fillable = ['email','name','address','password'];

    public function getPosts()
    {
        return $this->hasMany('Modules\Post\Entities\Post', 'user_id', 'id');
    }
}
