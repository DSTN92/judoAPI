<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model{

    protected $table = 'personal';
    public $timestamps = false;

    protected $informations = [
        'pe_id',
        'u_id',
        'name',
        'prename',
        'age',
        'member_since',
        'council',
        'image',
        'trainer',
        'contact'
    ];

    protected $hidden = [];

}
